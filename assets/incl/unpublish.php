<?php
    if(isset($_GET['id'])){                        
        $get_id = $_GET['id'];
        $update_level = "UPDATE reviews SET status='1' WHERE id='$get_id' ";
        $connect -> query($update_level);

        echo '<script>document.location.href="?page=profile"</script>';
}?>