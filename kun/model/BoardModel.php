<?php

class BoardModel
{
    private $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function getList()
    {
        try {
            $select_query = "SELECT * FROM board WHERE del='N'";
            $stmt = $this->connect->prepare($select_query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log('Error: ' . $e->getMessage());
            return false;
        }
    }

    public function insert($user_sid , $writer , $password ,  $subject , $content , $time)
    {
        $insert_query = "insert into board set usid =:usid , writer=:writer , password=:password , subject=:subject , content=:content , sign_date=:sign_date";
        $stmt = $this->connect->prepare($insert_query);
        $stmt->bindParam(':usid', $user_sid);
        $stmt->bindParam(':writer', $writer);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':sign_date', $time);
        $stmt->execute();

        return true;

    }

    public function view($number)
    {
        try {
            $select_query = "SELECT * FROM board WHERE sid=:number and del='N'";
            $stmt = $this->connect->prepare($select_query);
            $stmt->bindParam(':number', $number);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Fetch only one row
        } catch (Exception $e) {
            error_log('Error: ' . $e->getMessage());
            return false;
        }
    }

    public function count($number)
    {
        $count_query = "update board set count = count+1 where sid=:number";

        $stmt = $this->connect->prepare($count_query);
        $stmt->bindParam(':number', $number);
        $stmt->execute();
    }

}

?>