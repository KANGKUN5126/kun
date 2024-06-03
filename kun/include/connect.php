<?php
    $dbHost = "localhost";    // 호스트 주소(localhost, 120.0.0.1)
    $dbName = "kun_db";      // 데이터 베이스(DataBase) 이름
    $dbUser = "toy";       // DB 아이디
    $dbPass = "rlarkdrjs1!"; // DB 패스워드
    $dbPort = 3306; // DB 포트

    try
    {
        $dsn = 'mysql:host=' . $dbHost . ';port=' . $dbPort . ';dbname=' . $dbName;
        $connect = new PDO($dsn,$dbUser,$dbPass);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException $ex)
    {
        echo "서버와의 연결 실패! : ".$ex->getMessage()."<br>";
    }
?>