<?php
    if(isset($_GET['id'])){                        
        $get_id = $_GET['id'];
        $get = '3';
        $cat = '2';
        $update_level = "UPDATE request SET status_id = $get WHERE id='$get_id' ";
        $connect -> query($update_level);

        echo '<script>document.location.href="?page=profile"</script>';
}?>