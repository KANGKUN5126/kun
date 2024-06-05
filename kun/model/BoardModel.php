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

    public function update($writer , $password ,  $subject , $content , $time , $number)
    {



        try {
            $select_query = "SELECT count(*) FROM board WHERE password=:password and del='N' and sid=:number";
            $stmt = $this->connect->prepare($select_query);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':number', $number);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            if($count > 0){
                $update_query = "update board set writer=:writer , subject=:subject , content=:content , modify_date=:modify_date where sid=:number";
                $stmt = $this->connect->prepare($update_query);
                $stmt->bindParam(':writer', $writer);
                $stmt->bindParam(':subject', $subject);
                $stmt->bindParam(':content', $content);
                $stmt->bindParam(':modify_date', $time);
                $stmt->bindParam(':number', $number);
                try {
                    $stmt->execute();
                } catch (PDOException $e) {
                    echo 'Error: ' . $e->getMessage();
                }
                return true;
            }
        } catch (Exception $e) {
            error_log('Error: ' . $e->getMessage());
            return false;
        }
    }

    public function delete($number)
    {
        $delete_query = "update board set del='Y' where sid=:number";
        $stmt = $this->connect->prepare($delete_query);
        $stmt->bindParam(':number', $number);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return true;
    }

}

?>