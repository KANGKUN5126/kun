<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.header.php';

class MyClass
{

    public function getUserIp($connect, $user_ip)
    {
        $query = "SELECT user_ip FROM user_binfo WHERE user_ip = :user_ip";
        $stmt = $connect->prepare($query);
        $stmt->bindParam(":user_ip", $user_ip);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            $insert_query = "INSERT INTO user_binfo (user_ip) VALUES (:user_ip)";
            $stmt = $connect->prepare($insert_query);
            $stmt->bindParam(":user_ip", $user_ip);
            $stmt->execute();
        }

    }

    public function getVisitCount($connect){
        $visit_query = "SELECT COUNT(DISTINCT user_ip) AS ip_count FROM user_binfo";
        $stmt = $connect->prepare($visit_query);
        $stmt->execute();
        $visit_count = $stmt->fetch(PDO::FETCH_ASSOC);

        return $visit_count['ip_count'];
    }
}

?>