<?php   
    session_start();
    include('assets/incl/connect.php');
    if(isset($_SESSION['uid'])){
        $session_uid = $_SESSION['uid'];
        $sql = "SELECT * FROM users WHERE id = '$session_uid'";
        $result = $connect -> query($sql);
        $user = $result -> fetch_assoc();
        $userid = $user['id'];
    }

    if($_GET['do'] == 'exit'){
        session_unset();
        echo '<script>document.location.href="?page=auth"</script>';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Kodchasan:wght@400;600&family=Montserrat+Alternates:wght@400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/header/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="assets/slick/slick.css">
    <link rel="stylesheet" href="assets/slick/slick-theme.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
    <script src="assets/slick/slick.min.js" defer></script>
    <script src="assets/js/main.js" defer></script>
    <title>elegance avenue</title>
</head>
<body>
    <?php include('assets/incl/connect.php');?>
    <?php include('assets/incl/header.php');?>
    <?php
        if(isset($_GET['page'])){
            $page = $_GET['page'];

            if($page == 'auth'){
                include('assets/incl/auth.php');
            }
            if($page == 'courses'){
                include('assets/incl/courses.php');
            }
            if($page == 'courses__card'){
                include('assets/incl/courses__card.php');
            }
            if($page == 'reg'){
                include('assets/incl/reg.php');
            }
            if($page == 'add__course'){
                include('assets/incl/add__course.php');
            }
            if($page == 'edit__course'){
                include('assets/incl/edit__course.php');
            }
            if($page == 'delete__course'){
                include('assets/incl/delete__course.php');
            }
            if($page == 'confirm__delete'){
                include('assets/incl/confirm__delete.php');
            }
            if($page == 'profile'){
                include('assets/incl/profile.php');
            }
            if($page == 'edit'){
                include('assets/incl/edit.php');
            }
            if($page == 'sign'){
                include('assets/incl/sign__course.php');
            }
            if($page == 'delete_us'){
                include('assets/incl/delete_us.php');
            }
            if($page == 'add__teacher'){
                include('assets/incl/add__teacher.php');
            }
            if($page == 'edit__teacher'){
                include('assets/incl/edit__teacher.php');
            }
            if($page == 'delete__teacher'){
                include('assets/incl/delete__teacher.php');
            }
            if($page == 'publish'){
                include('assets/incl/publish.php');
            }
            if($page == 'unpublish'){
                include('assets/incl/unpublish.php');
            }
            if($page == 'accept'){
                include('assets/incl/accept.php');
            }
            if($page == 'decline'){
                include('assets/incl/decline.php');
            }
        }     
        else{
            include('assets/incl/main.php');
        }
    
    ?>
    <?php include('assets/incl/footer.php');?>
</body>
</html>