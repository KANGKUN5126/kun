<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.header.php';
?>
<?
    $query = "SELECT user_ip FROM user_binfo WHERE user_ip = :user_ip";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(":user_ip", $user_ip);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $user_ip = $row['user_ip'];
        echo "당신의 IP는 " . $user_ip . "입니다.";

    } else {
        $insert_query = "insert into user_binfo set user_ip = :user_ip";
        $stmt = $connect->prepare($insert_query);
        $stmt->bindParam(":user_ip", $user_ip);
        $stmt->execute();
    }
?>

<body>
<?
    $visit_query = "select count(distinct user_ip) as ip_count from user_binfo ";
    $stmt = $connect->prepare($visit_query);
    $stmt->execute();
    $visit_count = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<p>
    총 방문자 수 : <?= $visit_count['ip_count'] ?>
</p>

<p>
    오늘의 점심메뉴 추천 :<?= $_SESSION['lunch_menu'] ?>
</p>

<div class="time">
    남은 퇴근 시간 :
</div>

</body>
</html>

<button><a href="/view/join.php">회원가입하기</a>
