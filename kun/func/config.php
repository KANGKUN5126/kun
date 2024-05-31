<?
session_set_cookie_params(86400); // 1일에 해당하는 초(60 * 60 * 24)
session_start();
# 점심메뉴
$lunch_menu_arr = [];
$lunch_menu_arr = [
    '1' => '중화요리',
    '2' => '냉면',
    '3' => '김치찌개',
    '4' => '돈가스',
    '5' => '된장찌개',
    '6' => '해장국',
    '7' => '햄버거',
    '8' => '초밥',
    '9' => '순대국',
    '10' => '제육볶음',
    '11' => '카레',
    '12' => '분식',
];
$lunch_menu = array_rand($lunch_menu_arr);
if (!isset($_SESSION['lunch_menu'])) {
    $_SESSION['lunch_menu'] = $lunch_menu_arr[$lunch_menu];
}

#유저 아이피
$user_ip = $_SERVER['REMOTE_ADDR'];
#시간
$time = time();
?>