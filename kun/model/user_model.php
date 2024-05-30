<?

    $user_query = "select * from user_binfo where user_ip=:user_ip";
    $stmt = $connect->prepare($user_query);
    $stmt->bindParam(":user_ip", $user_ip);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

?>