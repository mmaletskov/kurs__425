<main class="main">
        <section class="models block">
            <div class="container">
                <div class="models__inner">
                    <h1 class="models__inner-title">ELEGANCE AVENUE</h1>
                    <h2 class="model__inner-subtitle">ШКОЛА МОДЕЛЕЙ</h2>
                    <div class="models__tabs">
                        <div class="tabs__header">
                            <div class="tabs__header-button">Мужчины</div>
                            <div class="tabs__header-button button__active">Женщины</div>
                        </div>

                        <div class="tabs__body">
                            <div class="tabs__body-item">
                                <div class="item__img">
                                    <img src="assets/images/main/models/man_model.png" alt="">
                                </div>
                                <p class="item__author">Дмитрий Кравцов</p>
                            </div>
                            <div class="tabs__body-item">
                                <div class="item__img">
                                    <img src="assets/images/main//models/man_model-two.png" alt="">
                                </div>
                                <p class="item__author">Александр Вош</p>
                            </div>
                            <div class="tabs__body-item">
                                <div class="item__img">
                                    <img src="assets/images/main//models/man_model-three.png" alt="">
                                </div>
                                <p class="item__author">Данил Шлаков</p>
                            </div>
                        </div>
                        <div class="tabs__body body__active">
                            <div class="tabs__body-item">
                                <div class="item__img">
                                    <img src="assets/images/main//models/woman_model.png" alt="">
                                </div>
                                <p class="item__author">Елизавета Плющенко</p>
                            </div>
                            <div class="tabs__body-item">
                                <div class="item__img">
                                    <img src="assets/images/main//models/woman_model-two.png" alt="">
                                </div>
                                <p class="item__author">Оксана Воронская</p>
                            </div>
                            <div class="tabs__body-item">
                                <div class="item__img">
                                    <img src="assets/images/main//models/woman_model-three.png" alt="">
                                </div>
                                <p class="item__author">Елена Кислая</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="about__school block">
            <div class="container">
                <div class="about__school-inner">
                    <div class="school__img">
                        <img src="assets/images/main/modelwalk.png" alt="">
                    </div>
                    <div class="school__text">
                        <h3 class="school__text-title">кратко о школе</h3>
                        <p class="school__text-descr">В модельной школе вас научат вести себя на сцене и подиуме, разбираться в стилях одежды, обучат основам визажа и диетологии. На каждом курсе есть актерское мастерство и уроки поведения перед камерой.</p>
                    </div>
                </div>
            </div>
        </section>


        <section class="teachers">
            <div class="container">
                <div class="teachers__inner">
                    <h2 class="teachers__inner-title">наши преподаватели</h2>
                    <div class="teachers__list">
                        <?php
                            $sql_t = "SELECT * FROM teachers";
                            $result_t = $connect -> query($sql_t);
                            while($teachers = $result_t -> fetch_assoc()){?>
                                <div class="teachers__item">
                                    <img src="<?=$teachers['img']?>" alt="">
            
                                    <div class="teachers__initials">
                                        <h3 class="teachers__item-name"><?=$teachers['name']?></h3>
                                        <p class="teachers__item-surname"><?=$teachers['surname']?></p>
                                    </div>
                                               
                                    <p class="teachers__item-direction"><?=$teachers['direction']?></p>
                                    <?php
                                        if($user['role'] == 2){?>
                                            <a href="?page=edit__teacher&id=<?=$teachers['id']?>" class="edit__teacher-edit">редактировать</a>
                                            <a href="?page=delete__teacher&id=<?=$teachers['id']?>" class="edit__teacher-delete">удалить</a>
                                        <?}?>
                                </div>
                            <?}
                        ?>
                     
                        <!-- <div class="teachers__item">
                            <img src="assets/images/main/teacher-two.png" alt="">
                            <h3 class="teachers__item-title">Николаева Дарья</h3>
                            <p class="teachers__item-subtitle">Преподаватель фотопозирования и визажа</p>
                        </div>
                        <div class="teachers__item">
                            <img src="assets/images/main/teacher-three.png" alt="">
                            <h3 class="teachers__item-title">Романов Александр</h3>
                            <p class="teachers__item-subtitle">Преподаватель актерского мастерства</p>
                        </div> -->
                    </div>
                    <?php
                        if($user['role'] == 2){?>
                            <a class="add__teach-btn" href="?page=add__teacher"><img src="assets/images/courses/add_course.svg" alt=""></a>
                        <?}?>
                </div>
            </div>
        </section>


        <section class="reviews">
            <!-- <div class="container"> -->
                <div class="reviews__inner">
                    <h3 class="reviews__title">отзывы</h3>
                    <div class="slider">
                        <?php
                            $sql = "SELECT * FROM reviews";
                            $result = $connect -> query($sql);
                            while($reviews = $result -> fetch_assoc()){
                            if($reviews['status'] == 3){?>
                                <div class="slider__item">
                                    <h3 class="slider__item-name"><?=$reviews['name']?></h3>
                                    <h4 class="slider__item-course"><?=$reviews['cours']?></h4>
                                    <div class="slider__item-text"><?=$reviews['descr']?></div>
                                    <h4 class="slider__item-date"><?=$reviews['date']?></h4>
                                </div>
                            <?}
                        }?>
                                 
                
                    </div>
                </div>
            <!-- </div> -->
        </section>

        <!-- <div class="setTimeout">
            <h2 class="setTimeout__title">Отложенный вызов</h2>
        </div> -->

    </main>