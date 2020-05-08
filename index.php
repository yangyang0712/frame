<?php

include_once 'require.php';

$db = new DB();
$user = $db->select('aa','aaa')->where(['aaa','!=',11],['aaaa','=',2222]);


$demo = new Demo();
var_dump($demo->index()->update());
