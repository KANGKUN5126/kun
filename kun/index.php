<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.header.php';
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function updateRemainingTime() {
        var now = new Date();
        var endOfWorkTime = new Date(now);
        endOfWorkTime.setHours(18, 0, 0, 0); // 퇴근 시간을 설정합니다.

        var remainingMilliseconds = endOfWorkTime - now;

        if (remainingMilliseconds <= 0) {
            $('.time').text('퇴근 시간이 지났습니다.');
        } else {
            var remainingHours = Math.floor(remainingMilliseconds / (1000 * 60 * 60));
            remainingMilliseconds -= remainingHours * 1000 * 60 * 60;
            var remainingMinutes = Math.floor(remainingMilliseconds / (1000 * 60));
            remainingMilliseconds -= remainingMinutes * 1000 * 60;
            var remainingSeconds = Math.floor(remainingMilliseconds / 1000);

            var remainingTime = remainingHours + '시간 ' + remainingMinutes + '분 ' + remainingSeconds + '초';
            $('.time').text('남은 퇴근 시간: ' + remainingTime);
        }
    }

    // 매 초마다 퇴근 시간 업데이트
    setInterval(updateRemainingTime, 1000);
</script>
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
<br>

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

오늘의 점심메뉴 추천 :
<?= $_SESSION['lunch_menu'] ?>
    <div class="time">
        남은 퇴근 시간 :
    </div>
</body>
</html>
