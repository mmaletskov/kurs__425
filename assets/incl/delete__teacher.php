<?php
    if(isset($_GET['id'])){
        if(empty($_GET['delete__teacher'])){
            $get_id = $_GET['id'];
            $delete = "DELETE FROM teachers WHERE id = '$get_id'";
            $connect -> query($delete);
            echo '<script>document.location.href="?"</script>';
        }
        else{
            echo 'Пользователь не был удален';
        }
    }
    else{
        echo 'err';
    }
?>