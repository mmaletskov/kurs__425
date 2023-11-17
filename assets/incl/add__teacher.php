<?php
    if(isset($_POST['add__teacher'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $direction = $_POST['direction'];
        $file = 'assets/images/'.time().$_FILES['photo']['name'];
        
        if(!copy($_FILES['photo']['tmp_name'],$file)){
            echo'Ошибка загрузки';
        }
        move_uploaded_file($_FILES['photo']['tmp_name'], $file);

        if(empty($name)){
            $err .= '<h3 class="err__tile">Заполните поле с именем!</h3><br>';
        }
        if(empty($surname)){
            $err .= '<h3 class="err__tile">Заполните поле с фамилией!</h3><br>';
        }
        if(empty($direction)){
            $err .= '<h3 class="err__tile">Заполните поле с направлением!</h3><br>';
        }
        
    if(empty($err)){
        $insert_sql = "INSERT INTO teachers (name,surname,direction,img)
         VALUES ('$name','$surname','$direction','$file')";
        $connect -> query($insert_sql);
        echo '<script>document.location.href="?"</script>';
    }
    }
?>

<section class="add__teacher">
        <div class="container">
            <div class="add__teacher-inner">
                <h2 class="teacher__inner-title">ДОБАВЛЕНИЕ ПРЕПОДАВАТЕЛЯ</h2>
                <?php echo $err;?>
                <form method="POST" class="form__add" name="add__teacher" enctype="multipart/form-data">
                    <div class="input__inner">
                        <label for="">имя</label>
                        <input name="name" type="text" placeholder="">
                        
                    </div>

                    <div class="input__inner">
                        <label for="">фамилия</label>
                        <input name="surname" type="text" placeholder="">
          
                    </div>

                    <div class="input__inner">
                        <label for="">направление</label>
                        <input name="direction" type="text" placeholder="">
  
                    </div>

                    <div class="input__inner">
                        <label for="">загрузите изображение</label>
                        <input name="photo" type="file" id="photo">
                    </div>

                    <input class="form__add-btn" type="submit" name="add__teacher" value="добавить">
                </form>
            </div>
        </div>
    </section>