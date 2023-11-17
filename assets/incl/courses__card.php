<?php
    if(isset($_GET['id'])){
        $get_id = $_GET['id'];
        $sql = "SELECT * FROM courses WHERE id = '$get_id'";
        $result = $connect -> query($sql);
        $card = $result -> fetch_assoc();
    }
    else{
        echo 'id not working';
    }
?>
<!-- main -->   
<main class="main">
    <section class="courses__card">
      <div class="container">
        <div class="courses__card-inner">
            <h2 class="card__title"><?=$card['title']?></h2>
            <div class="card__descr">
               <div class="card__descr-info">
                <div class="card__descr-img">
                    <img src="<?=$card['img']?>" alt="">
                </div>
                <div class="card__descr-text">
                    <h3 class="descr__text-title">описание:</h3>
                    <div class="descr__text-list">
                        <p class="descr__text-item"><?=$card['descr']?></p>
                    </div>
                    <div class="descr__text-price">
                        <p class="price__title">цена</p>
                        <p class="price__price"><?=$card['price']?></p>
                        <p class="date__title">начало 29.10.23</p>
                    </div>
                    <!-- <div class="descr__text-date">
                        
                    </div> -->
                    <?php
                        if(isset($_SESSION['uid'])){
                        $sql2 = "SELECT * FROM request WHERE id_user = $userid AND id_courses = $get_id";
                        $result2 = $connect -> query($sql2);
                        $req = $result2 -> fetch_assoc();
                        $num = $result2 -> num_rows;
                        $status = $req['status_id'];
                        if($num == 0){?>
                            <div class="card__descr-btns">
                                <a href="?page=sign&id=<?=$card['id']?>" class="card__descr-btn">записаться на курс</a>
                            </div>
                        <?}else{
                            if($status == 1){?>
                                <p class="warning__title">заявка отклонена, запишитесь на курс повторно</p>
                                <a href="?page=sign&id=<?=$card['id']?>" class="card__descr-btn">записаться на курс</a>
                            <?}
                            if($status == 2){?>
                               <p class="warning__title">заявка в модерации</p>
                            <?}
                            if($status == 3){?>
                               <p class="warning__title">вы приняты на курс</p>
                            <?}
                        }
                        }
                        else{?>
                            <p class="warning__title">необходимо авторизоваться, чтобы записаться на курс</p>
                        <?}?>
                </div>
               </div>
               
               <?php
                if(isset($_SESSION['uid'])){?>
                    <div class="card__descr-reviews">
                        <h3 class="descr__reviews-title">оставить отзыв</h3>

                        <?php
                        if(isset($_POST['add__review'])){
                            $name = $user['name'];
                            $descr = $_POST['descr'];
                            $date = $_POST['date'];
                            $course = $card['title'];
                            $status = 2;


                            if(empty($descr)){
                                $err= "Нельзя оставлять это поле пустым";
                            }
                            if(empty($date)){
                                $err= "Выберите дату";
                            }

                            if(empty($err)){
                                $insert_sql = "INSERT INTO reviews (name,cours,descr,date,status)
                                VALUES ('$name','$course','$descr','$date','$status')";
                                $connect -> query($insert_sql);
                                echo'<script>document.location.href="?"</script>';
                            }
                        }
                        ?>

                    <form method="POST" class="descr__reviews-form" name="add__review">
                        <textarea name="descr" id="" cols="30" rows="10"></textarea>
                        <input name="date" class="descr__reviews-date" type="date" id="date" placeholder="выберите дату">
                        <input class="descr__reviews-btn" type="submit" name="add__review" value="отправить">
                    </form>

                    </div>
                <?}?>
               
            </div>
        </div>
      </div>
    </section>
</main>
<!-- main-end -->