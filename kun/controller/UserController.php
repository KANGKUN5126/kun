<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/model/UserModel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/func/include.function.php';

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
            PutMessageLocation("가입이 완료되었습니다." , "/");
        } else {
            PutMessageBack("가입에 실패하였습니다. 다시한번 확인해주세요.");
        }

    }

    public function loginUser($user_id, $password, $user_name)
    {
        $success = $this->userModel->loginUser($user_id, $password, $user_name);
        if ($success) {
            PutMessageLocation("로그인되었습니다." , "/");
        } else {
            PutMessageBack("로그인에 실패하였습니다. 다시한번 확인해주세요.");
        }

    }

    public function logoutUser()
    {
        unset($_SESSION['user_level']);
        unset($_SESSION['login']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_sid']);
        putMessageBack("로그아웃 되었습니다.");
        exit;
    }

    public function getUser($user_sid)
    {
        $user = $this->userModel->getUser($user_sid);
        return $user;
    }


}

?>