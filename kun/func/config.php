<?
# 점심메뉴
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

#유저 아이피
$user_ip = $_SERVER['REMOTE_ADDR'];
?>