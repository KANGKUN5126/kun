<?php

class UserModel
{
    private $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function insertUser($user_id, $password, $user_name, $user_ip, $time)
    {
        try {
            $select_query = "select count(*) from user_binfo where user_id = :user_id and user_name = :user_name";
            $stmt = $this->connect->prepare($select_query);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':user_name', $user_name);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            if ($count == 0) {
                $query = "INSERT INTO user_binfo SET user_id = :user_id, password = :password, user_name = :user_name, user_ip = :user_ip, sign_date= :sign_date";
                $stmt = $this->connect->prepare($query);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':user_name', $user_name);
                $stmt->bindParam(':user_ip', $user_ip);
                $stmt->bindParam(':sign_date', $time);
                $success = $stmt->execute();

                if (!$success) {
                    throw new Exception("User registration failed");
                }
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            error_log('Error: ' . $e->getMessage());
            return false;
        }
    }

    public function loginUser($user_id, $password, $user_name)
    {
        try {
            $select_query = "select count(*) from user_binfo where user_id = :user_id and user_name = :user_name and password = :password";
            $stmt = $this->connect->prepare($select_query);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':user_name', $user_name);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            if ($count !== 0) {

                if (!$success) {
                    throw new Exception("User registration failed");
                }
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            error_log('Error: ' . $e->getMessage());
            return false;
        }
    }

}

?>