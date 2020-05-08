<?php

function test()
{
    return "test";
}

function p($data)
{
    if (is_array($data)){
        $array = [];
        // 定义样式
        echo '<pre style="display: block;padding: 9.5px;margin: 44px 0 0 0;font-size: 13px;line-height: 1.42857;color: #333;word-break: break-all;word-wrap: break-word;background-color: #F5F5F5;border: 1px solid #CCC;border-radius: 4px;">';
        foreach($data as $key=>$value) {
            $array[$key] = json_decode(json_encode($value), true);
        }
        print_r($array);
        echo '</pre>';
    }else{
        echo '<pre style="display: block;padding: 9.5px;margin: 44px 0 0 0;font-size: 13px;line-height: 1.42857;color: #333;word-break: break-all;word-wrap: break-word;background-color: #F5F5F5;border: 1px solid #CCC;border-radius: 4px;">';
        print_r($data);
        echo '</pre>';
    }

}

function dd($data)
{
    p($data);
    die;
}

function db($name,$default = null)
{
    if (!$default){
        $array = file_get_contents(".db");
        $arr = explode("\n", $array);
        $array = array();
        foreach ($arr as $value){
            if (strpos($value,'=')){
                $new_array = explode('=',$value);
                $array[trim($new_array[0])] = trim($new_array[1]);
            }
        }
        return $array[$name] ?? $default;
    }else{
        return $default;
    }
}
