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

    public function view()
    {
        $plus_count_query = "update board set count+1 where sid=:sid";
        $stmt = $this->connect->prepare($plus_count_query);
        $stmt->execute();
    }

    public function update()
    {
        $update_query = "update count from board set count+1";
        $stmt = $this->connect->prepare($plus_count_query);
        $stmt->execute();
    }

}

?>