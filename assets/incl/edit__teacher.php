<?php
   if(isset($_GET['id'])){
    $get_id = $_GET['id'];
    $sql = "SELECT * FROM teachers WHERE id = '$get_id'";
    $result = $connect -> query($sql);
    $cat = $result -> fetch_assoc();

    if(isset($_POST['edit__teacher'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $direction = $_POST['direction'];
        $file = 'assets/images/'.time().$_FILES['photo']['name'];
        if(!copy($_FILES['photo']['tmp_name'],$file)){
            echo 'Ошибка загрузки';
        }
        move_uploaded_file($_FILES['photo']['tmp_name'],$file);

        if(empty($name)){
            $err .= '<h3 class="err__tile">Заполните поле с именем!</h3><br>';
        }
        if(empty($surname)){
            $err .= '<h3 class="err__tile">Заполните поле с фамилией!</h3><br>';
        }
        if(empty($direction)){
            $err .= '<h3 class="err__tile">Заполните поле с направлением!</h3><br>';
        }

        $update = "UPDATE teachers SET
                    name = '$name',
                    surname = '$surname',
                    direction = '$direction',
                    img = '$file'
                    WHERE id = '$get_id'";
        $connect -> query($update);
        echo '<script>document.location.href="?"</script>';
    }
}
?>

<section class="edit__teacher">
        <div class="container">
            <div class="edit__teacher-inner">
                <h2 class="teacher__inner-title">РЕДАКТИРОВАТЬ</h2>
                <?php echo $err;?>
                <form method="POST" class="form__add" name="edit__teacher" enctype="multipart/form-data">
                    <div class="input__inner">
                        <label for="">имя</label>
                        <input name="name" type="text" value="<?=$cat['name']?>">
                        
                    </div>

                    <div class="input__inner">
                        <label for="">фамилия</label>
                        <input name="surname" type="text" value="<?=$cat['surname']?>">
          
                    </div>

                    <div class="input__inner">
                        <label for="">направление</label>
                        <input name="direction" type="text" value="<?=$cat['direction']?>">
  
                    </div>

                    <div class="input__inner">
                        <label for="">загрузите изображение</label>
                        <input name="photo" type="file" id="photo">
                    </div>

                    <input class="form__add-btn" type="submit" name="edit__teacher" value="добавить">
                </form>
            </div>
        </div>
    </section>