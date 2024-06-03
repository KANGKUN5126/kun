<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/controller/UserController.php';

$user_id = $_POST['user_id'] ?? '';
$password = $_POST['password'] ?? '';
$user_name = $_POST['user_name'] ?? '';
$user_ip = $_POST['user_ip'] ?? '';
$time = $_POST['sign_date'] ?? '';
$mode = ($_POST['mode']) ? $_POST['mode'] : $_GET['mode'];

$userController = new UserController($connect);

switch ($mode) {
    case 'regist' :
        $userController->registerUser($user_id, $password, $user_name, $user_ip, $time);
        break;

    case 'login':
        $userController->loginUser($user_id, $password, $user_name);
        break;

    case 'logout':
        $userController->logoutUser();
        break;
}

?>