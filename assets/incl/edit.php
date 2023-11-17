<?php
    if(isset($_GET['id'])){
        $get_id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = '$get_id'";
        $result = $connect -> query($sql);
        $users = $result -> fetch_assoc();

        if(isset($_POST['edit'])){
            $surname = $_POST['surname'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $file = 'assets/images/'.time().$_FILES['photo']['name'];
            if(!copy($_FILES['photo']['tmp_name'],$file)){
                echo 'Ошибка загрузки';
            }
            move_uploaded_file($_FILES['photo']['tmp_name'],$file);

            if(empty($surname)){
                $err .= '<h3 class="err__title">Заполните поле с фамилией!</h3><br>';
            }
            if(empty($name)){
                $err .= '<h3 class="err__title">Заполните поле с именем!</h3><br>';
            }
            if(empty($email)){
                $err .= '<h3 class="err__title">Заполните поле с почтой!</h3><br>';
            }

            $update = "UPDATE users SET
                        surname = '$surname',
                        name = '$name',
                        email = '$email',
                        img = '$file'
                        WHERE id = '$get_id'";
            $connect -> query($update);
            echo '<script>document.location.href="?page=profile"</script>';
        }
    }
?>
<main class="main">
    <section class="edit__prof">
        <div class="container">
            <div class="edit__prof-inner">
                <h2 class="prof__inner-title">РЕДАКТИРОВАНИЕ</h2>
                <?php echo $err;?>
                <form method="POST" class="form__edit" enctype="multipart/form-data" name="edit">
                    <div class="input__inner">
                        <label for="">фамилия</label>
                        <input name="surname" type="text" value="<?=$users['surname']?>">
                    </div>

                    <div class="input__inner">
                        <label for="">имя</label>
                        <input name="name" type="text" value="<?=$users['name']?>">
                    </div>

                    <div class="input__inner">
                        <label for="">email</label>
                        <input name="email" type="text" value="<?=$users['email']?>">
                    </div>


                    <div class="input__inner">
                        <label for="">загрузите изображение</label>
                        <input name="photo" id="photo" type="file" value="<?=$users['img']?>">
                    </div>

                    <input class="form__edit-btn" type="submit" name="edit" value="отправить">
                </form>
            </div>
        </div>
    </section>
</main>