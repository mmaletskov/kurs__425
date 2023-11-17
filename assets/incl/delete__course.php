<?php
    if(isset($_GET['id'])){
        if(empty($_GET['delete__course'])){
            $get_id = $_GET['id'];
            $delete = "DELETE FROM courses WHERE id = '$get_id'";
            $connect -> query($delete);
            echo '<script>document.location.href="?page=courses"</script>';
        }
        else{
            echo 'Курс не был удален';
        }
    }
    else{
        echo 'err';
    }
?>