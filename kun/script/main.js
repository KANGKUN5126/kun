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