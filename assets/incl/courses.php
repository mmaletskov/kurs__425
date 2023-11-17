<!-- main -->
<main class="main">
        <section class="courses">
            <div class="container">
                <div class="courses__inner">
                    <h2 class="courses__inner-title">КУРСЫ</h2>

                        <?php
                            if(isset($_POST['search'])){
                                $text = $_POST['text'];
                            }
                        ?>

                        <form method="POST" name="search" class="form__search" >
                            <input name="text" class="search__input" type="seacrh" placeholder="поиск">
                            <input name="search" class="search__input-btn" type="submit" value="найти">
                        </form>

                    <div class="courses__list">

                    <?php
                        $sql = "SELECT * FROM courses WHERE title LIKE '%".$text."%'";
                        $result = $connect -> query($sql);
                        while($course = $result -> fetch_assoc()){?>
                        <div class="courses__item">
                            <img class="courses__img" src="<?=$course['img']?>" alt="">
                            <div class="courses__item-descr">
                                <p class="courses__name"><?=$course['title']?></p>
                                <a href="?page=courses__card&id=<?=$course['id']?>" class="courses__btn">подробнее</a>
                                <?php
                                    if($user['role'] == 2){?>
                                        <a href="?page=edit__course&id=<?=$course['id']?>" class="courses__btn">изменить</a>
                                        <a href="?page=confirm__delete&id=<?=$course['id']?>" class="courses__btn">удалить</a>
                                    <?}?>
                            </div>
                        </div>
                        <!-- <div class="courses__item">
                            <img src="assets/images/courses/courses__image-one.png" alt="">
                            <div class="courses__item-descr">
                                <p class="courses__name">фотопозирование и визаж</p>
                                <a href="?page=courses__card" class="courses__btn">подробнее</a>
                            </div>
                        </div>
                        <div class="courses__item">
                            <img src="assets/images/courses/courses__image-two.png" alt="">
                            <div class="courses__item-descr">
                                <p class="courses__name">актерское мастерство</p>
                                <a href="?page=courses__card" class="courses__btn">подробнее</a>
                            </div>
                        </div>
                        <div class="courses__item">
                            <img src="assets/images/courses/courses__image-three.png" alt="">
                            <div class="courses__item-descr">
                                <p class="courses__name">танцы Vogue</p>
                                <a href="?page=courses__card" class="courses__btn">подробнее</a>
                            </div>
                        </div>
                        <div class="courses__item">
                            <img src="assets/images/courses/courses__image-four.png" alt="">
                            <div class="courses__item-descr">
                                <p class="courses__name">фитнес и диетология</p>
                                <a href="?page=courses__card" class="courses__btn">подробнее</a>
                            </div>
                        </div> -->
                        <?}?>
                    </div>

                    <?php
                        if(isset($_SESSION['uid'])){
                            if($user['role'] == 2){?>
                            <a class="add__course-btn" href="?page=add__course"><img src="assets/images/courses/add_course.svg" alt=""></a>
                        <?}
                        }?>
                </div>
            </div>
        </section>
    </main>
    <!-- main-end -->