<?php
    if(isset($_GET['id'])){
        $get_id = $_GET['id'];
        $sql = "SELECT * FROM courses WHERE id = '$get_id'";
        $result = $connect -> query($sql);
        $edit_course = $result -> fetch_assoc();

        if(isset($_POST['edit__course'])){
            $title = $_POST['title'];
            $descr = $_POST['descr'];
            $price = $_POST['price'];
            $file = 'assets/images/'.time().$_FILES['photo']['name'];
            var_dump($file);
            if(!copy($_FILES['photo']['tmp_name'],$file)){
                echo'Ошибка загрузки';
            }
            move_uploaded_file($_FILES['photo']['tmp_name'], $file);

            if(empty($title)){
                $err .= "Заполните поле с названием!<br>";
            }
            if(empty($descr)){
                $err .= "Заполните поле с описанием!<br>";
            }
            if(empty($price)){
                $err .= "Заполните поле с ценой!<br>";
            }

            if(empty($err)){
                $update = "UPDATE courses SET
                title = '$title',
                descr = '$descr',
                price = '$price',
                img = '$file'
                WHERE id = $get_id";

                $connect -> query($update);
                echo '<script>document.location.href="?page=courses"</script>';
            }
        }
    }
?>
<!-- main -->   
<main class="main">
    <section class="edit__course">
        <div class="container">
            <div class="edit__course-inner">
                <h2 class="course__inner-title">РЕДАКТОР КУРСА</h2>
                <form method="POST" class="form__edit" name="edit__course" enctype="multipart/form-data">
                    <div class="input__inner">
                        <label for="">название</label>
                        <input name="title" type="text" value="<?=$edit_course['title']?>">
                    </div>

                    <div class="input__inner">
                        <label for="">описание</label>
                        <input name="descr" type="text" value="<?=$edit_course['descr']?>">
                    </div>

                    <div class="input__inner">
                        <label for="">цена</label>
                        <input name="price" type="text" value="<?=$edit_course['price']?>">
                    </div>


                    <div class="input__inner">
                        <label for="">загрузите изображение</label>
                        <input name="photo" type="file" id="photo">
                    </div>

                    <input class="form__edit-btn" name="edit__course" type="submit" value="редактировать">
                </form>
            </div>
        </div>
    </section>
</main>
<!-- main-end -->