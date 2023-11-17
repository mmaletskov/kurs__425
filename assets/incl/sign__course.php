<?php
if(isset($_GET['id'])){
    $get_id = $_GET['id'];
    $sql = "SELECT * FROM courses WHERE id = '$get_id'";
    $result = $connect -> query($sql);
    $card = $result -> fetch_assoc();
    $coursid = $card['id'];
}

$id = 2;
$category = 1;
$sql2 = "SELECT * FROM request WHERE id_user = $userid AND id_courses = $coursid AND  status_id = $id ";
$res = $connect -> query($sql2);
$num = $res -> num_rows;

if($num == 0){
   $sql = "INSERT INTO request (id_user, id_courses, status_id) VALUES ('$userid', '$coursid', '$id') ";
    $connect -> query($sql);
    echo('<script>document.location.href="?page=profile"</script>');
}else{
    echo("Ошибка");
}

?>