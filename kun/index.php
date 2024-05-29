<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/connect.php';
$user_ip = $_SERVER['REMOTE_ADDR'];
$query = "SELECT user_ip FROM user_binfo WHERE user_ip = :user_ip";
$stmt = $connect->prepare($query);
$stmt->bindParam(":user_ip", $user_ip);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row) {
    $user_ip = $row['user_ip'];
} else {
    echo '아이피가 존재하지 않습니다.';
}

$lunch_menu_arr = [];
$lunch_menu_arr = [
    '1' => '짜장면',
    '2' => '냉면',
    '3' => '김치찌개',
    '4' => '돈가스',
    '5' => '된장찌개',
    '6' => '해장국',
    '7' => '햄버거',
    '8' => '초밥'
];
$lunch_menu = array_rand($lunch_menu_arr);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
오늘의 점심메뉴 추천 :
<?=$lunch_menu_arr[$lunch_menu]?>
<body>
</body>
</html>