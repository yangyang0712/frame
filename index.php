<?php

include_once 'require.php';

$db = new DB();
$user = $db->table('bsz_users')
    ->get();

var_dump($user);

//dd($user);
//$demo = new Demo();
//var_dump($user);
