<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/model/UserModel.php';

class UserController
{
    private $userModel;

    public function __construct($connect)
    {
        $this->userModel = new UserModel($connect);
    }

    public function registerUser($user_id, $password, $user_name, $user_ip, $time)
    {
        $success = $this->userModel->insertUser($user_id, $password, $user_name, $user_ip, $time);
        
        if ($success) {
            echo '가입에 성공하셨습니다.';
            exit();
        } else {
            echo '가입에 실패하였습니다. 다시 시도해주세요.';
            exit();
        }

    }
}

?>