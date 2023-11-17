<?php
    if(isset($_POST['reg'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $re_pass = $_POST['re_pass'];
        $pass_md5 = md5($pass);
        $role = 1;
        $file = 'assets/images/'.time().$_FILES['photo']['name'];
        if(!copy($_FILES['photo']['tmp_name'],$file)){
            echo 'Ошибка загрузки';
        }
        move_uploaded_file($_FILES['photo']['tmp_name'],$file);

        if(empty($surname)){
            $err .= '<h3 class="err__tile">Заполните поле с фамилией!</h3><br>'; 
        }
        if(empty($name)){
            $err .= '<h3 class="err__tile">Заполните поле с именем!</h3><br>'; 
        }
        if(empty($email)){
            $err .= '<h3 class="err__tile">Заполните поле с почтой!</h3><br>';
        }
        if(empty($pass)){
            $err .= '<h3 class="err__tile">Заполните поле с паролем!</h3><br>';
        }
        if($pass != $re_pass){
            $err .= '<h3 class="err__tile">Пароли не совпадают!</h3><br>';
        }

        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = $connect -> query($query);
        $verify = $result -> fetch_assoc();

        if($verify){
            $err .= '<h3 class="err__title">Пользователь уже зарегистрирован</h3>';
        }

        if(empty($err)){
            $insert = "INSERT INTO users (name,surname,email,pass,role,img)
            VALUES ('$name','$surname','$email','$pass_md5','$role','$file')";
            $connect -> query($insert);
            echo '<script>document.location.href="?page=profile"</script>';
        }
    }
?>

<!-- main -->   
<main class="main">
    <section class="registration">
        <div class="container">
            <div class="registration__inner">
                <h2 class="registration__inner-title">РЕГИСТРАЦИЯ</h2>
                <?php echo $err;?>
                <form method="POST" name="reg" enctype="multipart/form-data" class="form__reg">
                    <div class="input__inner">
                        <label for="">фамилия</label>
                        <input name="surname" type="text" value="<?=$_POST['surname']?>">
                    </div>

                    <div class="input__inner">
                        <label for="">имя</label>
                        <input name="name" type="text" value="<?=$_POST['name']?>">
                    </div>

                    <div class="input__inner">
                        <label for="">email</label>
                        <input name="email" type="text" value="<?=$_POST['email']?>">
                    </div>

                    
                    <div class="input__inner">
                        <label for="">пароль</label>
                        <input name="pass" type="password" value="<?=$_POST['pass']?>">
                    </div>

                    
                    <div class="input__inner">
                        <label for="">подтверждение пароля</label>
                        <input name="re_pass" type="password" value="<?=$_POST['re_pass']?>">
                    </div>

                    <div class="input__inner">
                        <label for="">загрузите изображение</label>
                        <input name="photo" id="photo" type="file">
                    </div>

                    <input class="form__reg-btn" type="submit" name="reg" value="отправить">
                </form>

                <p class="registration__inner-link">уже зарегистрированы? авторизуйтесь <a href="?page=auth">здесь</a></p>
            </div>
        </div>
    </section>
</main>
<!-- main-end -->