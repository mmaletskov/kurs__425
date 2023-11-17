<?php
    include('assets/incl/connect.php');
    session_start();
    if(!isset($_SESSION['uid'])){
        echo '<script>document.location.href="?page=auth"</script>';
    }
?>

<?php
    if($user['role'] == 0){?>
         <div class="ban-block">
            <h2 class="ban-title">Вы были заблокированы. Все вопросы Вы можете написать администратору на почту <a class="admin-mail" href="admin@mail.ru"><span>admin@mail.ru</span></a></h2>
            <div class="btn_b">
                <a href="?do=exit">Вернуться назад</a>
            </div>
        </div>
<?}?>

<?php
    if($user['role'] == 1){?>
        <section class="user__info">
          <div class="container">
            <div class="user__info-inner">
                <h2 class="user__info-title">ЛИЧНЫЙ КАБИНЕТ</h2>
                <div class="user__info-descr">
                    <div class="descr__img">
                        <img src="<?=$user['img']?>" alt="">
                    </div>
                    <div class="descr__user">
                        <div class="descr__sn">
                            <p class="descr__surname"><?=$user['surname']?></p>
                            <p class="descr__name"><?=$user['name']?></p>
                        </div>
                        <p class="descr__email"><?=$user['email']?></p>
                    </div>
                    <hr class="descr__line">
                    <div class="descr__btn">
                        <a class="edit__profile-link" href="?page=edit&id=<?=$user['id']?>">
                            <div class="edit__profile">
                                <img src="assets/images/profile/edit_profile.svg" alt="">
                                <p>редактировать</p>
                            </div>
                        </a>
                        <a href="?do=exit">
                            <div class="exit__profile">
                                <img src="assets/images/profile/exit_profile.svg" alt="">
                                <p>выйти</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
          </div>
        </section>

        <section class="my__courses">
            <div class="container">
                <div class="my__courses-inner">
                    <h3 class="my__courses-title">мои курсы</h3>
                    <div class="courses__section">
                        <div class="courses__menu">
                            <ul class="courses__menu-list">
                                <li class="courses__menu-item">
                                    <a href="#" class="courses__menu-link">все</a>
                                </li>
                                <li class="courses__menu-item">
                                    <a href="#" class="courses__menu-link">в процессе</a>
                                </li>
                                <li class="courses__menu-item">
                                    <a href="#" class="courses__menu-link">завершенные</a>
                                </li>
                            </ul>
                        </div>
                        <hr class="courses__section-line">
                         <div class="courses__section-list">
                            <?php
                                $sql2 = "SELECT * FROM request WHERE id_user = $userid";
                                $res = $connect -> query($sql2); 
                                while($curs = $res -> fetch_assoc()){
                                    $userr = $curs['id_user'];
                                    $curss = $curs['id_courses'];
                                    $sql_courses = "SELECT * FROM courses WHERE id = $curss";
                                    $result_courses = $connect -> query($sql_courses);
                                    $courses = $result_courses -> fetch_assoc();
                                ?>
                                    <div class="courses__item-prof">
                                        <img class="courses__img" src="<?=$courses['img']?>" alt="">
                                        <div class="courses__item-descr">
                                            <p class="courses__name"><?=$courses['title']?></p>
                                            <a href="?page=courses__card&id=<?=$courses['id']?>" class="courses__btn">подробнее</a>
                                        </div>
                                    </div>
                                <?}?>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?}
    
    if($user['role'] == 2){?>
       <section class="admin__info">
        <div class="container">
            <div class="admin__info-inner">
                <h2 class="admin__info-title">АДМИН ПАНЕЛЬ</h2>
                <div class="admin__info-descr">
                    <div class="descr__img">
                        <img src="<?=$user['img']?>" alt="">
                    </div>
                    <div class="descr__admin">
                    <div class="descr__sn">
                            <p class="descr__surname"><?=$user['surname']?></p>
                            <p class="descr__name"><?=$user['name']?></p>
                        </div>
                        <p class="descr__email"><?=$user['email']?></p>
                        <div class="descr__btn-admin">
                            <a href="?page=edit&id=<?=$userid?>">
                                <div class="edit__profile">
                                    <img src="assets/images/profile/edit_profile.svg" alt="">
                                </div>
                            </a>
                            <a href="?do=exit">
                                <div class="exit__profile">
                                    <img src="assets/images/profile/exit_profile.svg" alt="">
                                </div>
                            </a>
                        </div>
                    </div>
                    <hr class="descr__line">
                    <div class="descr__menu">
                        <h3 class="descr__menu-title">навигация:</h3>
                        <ul class="descr__menu-list">
                            <li class="descr__menu-item">
                                <a href="#user__list" class="descr__menu-link">список пользователей</a>
                            </li>
                            <li class="descr__menu-item">
                                <a href="#applications" class="descr__menu-link">заявки</a>
                            </li>
                            <li class="descr__menu-item">
                                <a href="#moderation__reviews" class="descr__menu-link">модерация отзывов</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- user__list -->
    <section class="user__list" id="user__list">
        <div class="container">
            <div class="user__list-inner">
                <div class="user__list-title">
                    <h2 class="list-title">список пользователей</h2>
                    <div class="button"><img src="assets/images/admin/arrow-more.svg" alt=""></div>
                
                </div>
                <div class="user__list-list">

                        <ul class="accordion">

                            <?php
                                $sql = "SELECT * FROM users";
                                $result = $connect -> query($sql);
                                while($users_list = $result -> fetch_assoc()){
                                    if($users_list['role'] < 2){?>
                                        <div class="user__list-item">
                                            <div class="list__item-id">
                                                <h3 class="item__id"><?=$users_list['id']?></h3>
                                            </div>
                                            <div class="list__item-name">
                                                <h3 class="item__name"><?=$users_list['surname']?></h3>
                                                <h3 class="item__name"><?=$users_list['name']?></h3>
                                            </div>
                                            <div class="list__item-email">
                                                <h3 class="item__email"><?=$users_list['email']?></h3>
                                            </div>
                                            <div class="list__item-delete">
                                                <a href="?page=delete_us&id=<?=$users_list['id']?>"><img src="assets/images/admin/del.svg" alt="delete"></a>
                                            </div>
                                        </div>
                                    <?}
                                }?>

                        </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- user__list-end -->


    <!-- applications -->
    <section class="applications" id="applications">
        <div class="container">
            <div class="applications__inner">
                <h2 class="applications__title">заявки</h2>

                <div class="application__nav">
                    <a class="application__nav-link" href="?page=profile&category=2">новые</a>
                    <a class="application__nav-link" href="?page=profile&category=3">принятые</a>
                    <a class="application__nav-link" href="?page=profile&category=1">отклоненные</a>
                </div>

                <?php
                    if(isset($_GET['category'])){
                        $category = $_GET['category'];
                        $cat = "WHERE status_id = '$category'";
                    }else{
                        $cat = "WHERE status_id = '2'";
                    }
                ?>

                <div class="applicaton__user">
                    <?php
                        $sql_req = "SELECT * FROM request $cat";
                        $result_req = $connect -> query($sql_req);
                        
                        while($request = $result_req -> fetch_assoc()){
                            $id = $request['id'];
                            $name = $request['id_user'];
                            $cours = $request['id_courses'];

                            $sql_us = "SELECT * FROM users WHERE id = $name";
                            $result_us = $connect -> query($sql_us);
                            $usus = $result_us -> fetch_assoc();

                            $sql_us = "SELECT * FROM courses WHERE id = $cours";
                            $result_us = $connect -> query($sql_us);
                            $c = $result_us -> fetch_assoc();?>

                            
                            <div class="application__user-item">
                                <div class="user__item-id">
                                    <h3><?=$request['id']?></h3>
                                </div>
                                <div class="user__item-name">
                                    <h3><?=$usus['surname']?></h3>
                                    <h3><?=$usus['name']?></h3>
                                    <h3></h3>
                                </div>
                                <div class="user__item-course">
                                    <h3><?=$c['title']?></h3>
                                </div>
                                <div class="user__item-btns">
                                    <?php
                                        if($request['status_id'] == 2){?>
                                            <a class="item__btns-confirm" href="?page=accept&id=<?=$id?>">принять</a>
                                            <a class="item__btns-discard" href="?page=decline&id=<?=$id?>">отклонить</a>   
                                        <?}
                                        else if($request['status_id'] == 1){?>
                                            <a class="item__btns-confirm" href="?page=accept&id=<?=$id?>">принять</a>
                                        <?}
                                        else{?>
                                            <a class="item__btns-discard" href="?page=decline&id=<?=$id?>">отклонить</a>  
                                        <?}?>             
                                </div>
                            </div>
                        <?}?>
                </div>

            </div>
        </div>
    </section>
    <!-- applications-end -->


    <!-- moderation__reviews -->
    <section class="moderation__reviews" id="moderation__reviews">
        <div class="container">
            <div class="moderation__reviews-inner">
                <h2 class="moderation__reviews-title">модерация отзывов</h2>
                <div class="moderation__reviews-list">
                  <?php
                    $sql_rev = "SELECT * FROM reviews";
                    $result_rev = $connect -> query($sql_rev);
                    while($rev = $result_rev -> fetch_assoc()){
                        if($rev['status'] == 2){?>
                            <div class="moderation__reviews-item">
                            <div class="reviews__item">
                                <h3 class="reviews__item-name"><?=$rev['name']?></h3>
                                <h4 class="reviews__item-course"><?=$rev['cours']?></h4>
                                <p class="reviews__item-text"><?=$rev['descr']?></p>
                                <h4 class="reviews__item-date"><?=$rev['date']?></h4>
                            </div>
                            <div class="reviews__btns">
                                <a href="?page=publish&id=<?=$rev['id']?>" class="reviews__btns-publish">опубликовать</a>
                                <a href="?page=unpublish&id=<?=$rev['id']?>" class="reviews__btns-discard">отклонить</a>
                            </div>
                        </div>
                        
                    <?}
                }?>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- moderation__reviews-end --> 
    <?}?>


<!-- main -->
<main class="main">

    </main>
    <!-- main-end -->