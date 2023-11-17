<?php session_start();?>
<?php
if(!isset($_SESSION['uid'])){?>

<?php
    if(isset($_POST['auth'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $pass_md5 = md5($pass);

        if(empty($email)){
            $err .= '<h3 class="err__title">Заполните поле с почтой!</h3>';
        }
        if(empty($pass)){
            $err .= '<h3 class="err__title">Заполните поле с паролем</h3>';
        }
        else{
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $connect -> query($sql);
            $num = $result -> num_rows;
            if($num == 0){
                $err .= '<h3 class="err__title">Вы не зарегистрированы</h3>';
            }
            else{
                $sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass_md5'";
                $result = $connect -> query($sql);
                $num = $result -> num_rows;
                if($num == 0){
                    $err .= '<h3 class="err__title">Неверный логин или пароль</h3>';
                }
            }
        }

        if(empty($err)){
            $row = $result -> fetch_assoc();
            $_SESSION['uid'] = $row['id'];
            echo '<script>document.location.href="?page=profile"</script>';
        }
        
    }
?>
<main class="main">
    <section class="auth">
        <div class="container">
            <div class="auth__inner">
                <h2 class="auth__inner-title">ВХОД</h2>
                <?php echo $err;?>
            
                <form class="form__auth" name="auth" method="POST">
                    <div class="input__inner">
                        <label for="">email</label>
                        <input name="email" type="text" value="<?=$_POST['email']?>">
                    </div>
                    
                    <div class="input__inner">
                        <label for="">пароль</label>
                        <input name="pass" type="password" value="<?=$_POST['pass']?>">
                    </div>
                    <input class="form__auth-btn" name="auth" type="submit" value="отправить">
                </form>

                <p class="auth__inner-link">еще не зарегистрировались?пройдите регистрацию <a href="?page=reg">здесь</a></p>
            </div>
        </div>
    </section>
</main>
<?}
    else{
        include('assets/incl/profile.php');
    }
?>