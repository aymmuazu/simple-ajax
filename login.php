<?php

include('connect.php');

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];

if (empty($name) && empty($mobile) && empty($password)) {
    sleep(1);
    echo json_encode(['code' => 1, 'msg' => 'All fields are required']);
}else{
    sleep(1);
    $query = "SELECT mobile FROM users WHERE mobile='".$mobile."'";
    $query_run = mysqli_query($con, $query);
    if ($query_num_rows = mysqli_num_rows($query_run) >= 1) {
        echo json_encode(['code' =>200, 'msg'=> 'Mobile Number Already exists']);
    }else{
        $query = "INSERT INTO users VALUES('', '".$name."', '".$mobile."', '".$password."')";
        if ($query_run = mysqli_query($con, $query)) {
            echo json_encode(['code' => 400, 'msg' => 'You just added an account']);
        }
    }
}