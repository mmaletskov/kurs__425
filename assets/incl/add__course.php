<?php
    if(isset($_POST['add__course'])){
        $title = $_POST['title'];
        $descr = $_POST['descr'];
        $price = $_POST['price'];
        $file = 'assets/images/'.time().$_FILES['photo']['name'];
        
        if(!copy($_FILES['photo']['tmp_name'],$file)){
            echo'Ошибка загрузки';
        }
        move_uploaded_file($_FILES['photo']['tmp_name'], $file);

        if(empty($title)){
            $err .= '<h3 class="err__tile">Заполните поле с названием!</h3><br>';
        }
        if(empty($descr)){
            $err .= '<h3 class="err__tile">Заполните поле с описанием!</h3><br>';
        }
        if(empty($price)){
            $err .= '<h3 class="err__tile">Заполните поле с ценой!</h3><br>';
        }
        
    if(empty($err)){
        $insert_sql = "INSERT INTO courses (title,descr,price,img)
         VALUES ('$title','$descr','$price','$file')";
        $connect -> query($insert_sql);
        echo '<script>document.location.href="?page=courses"</script>';
    }
    }
?>

<!-- main -->   
<main class="main">
    <section class="add__course">
        <div class="container">
            <div class="add__course-inner">
                <h2 class="course__inner-title">ДОБАВЛЕНИЕ КУРСА</h2>
                <?php echo $err;?>
                <form method="POST" class="form__add" name="add__course" enctype="multipart/form-data">
                    <div class="input__inner">
                        <label for="">название</label>
                        <input name="title" type="text" placeholder="">
                        
                    </div>

                    <div class="input__inner">
                        <label for="">описание</label>
                        <input name="descr" type="text" placeholder="">
          
                    </div>

                    <div class="input__inner">
                        <label for="">цена</label>
                        <input name="price" type="text" placeholder="">
  
                    </div>

                    <div class="input__inner">
                        <label for="">загрузите изображение</label>
                        <input name="photo" type="file" id="photo">
                    </div>

                    <input class="form__add-btn" type="submit" name="add__course" value="добавить">
                </form>
            </div>
        </div>
    </section>
</main>
<!-- main-end -->