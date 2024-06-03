<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/controller/UserController.php';

$user_id = $_POST['user_id'] ?? '';
$password = $_POST['password'] ?? '';
$user_name = $_POST['user_name'] ?? '';
$user_ip = $_POST['user_ip'] ?? '';
$time = $_POST['sign_date'] ?? '';


switch ($mode) {
    case 'regist' :
        $userController = new UserController($connect);
        $userController->registerUser($user_id, $password, $user_name, $user_ip, $time);
        break;

    case 'login':
        $loginController = new loginUser($connect);
        $loginController->registerUser($user_id, $password, $user_name);
        break;

}

?>