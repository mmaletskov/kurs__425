<header class="header">
        <div class="container">
            <div class="header__inner">
                <a href="?" class="">
                <div class="logo">
                    <img src="assets/images/header/svg/logo.svg" alt="logo">
                </div>
                </a>
                <nav class="nav">
                    <ul class="menu__list">
                        <li class="menu__item">
                            <a href="?" class="menu__link">школа моделей</a>
                        </li>
                        <li class="menu__item">
                            <a href="?page=courses" class="menu__link">курсы</a>
                            <ul class="sub_menu">
                            <?php
                                $sql = "SELECT * FROM courses";
                                $result = $connect -> query($sql);
                                while($cours = $result -> fetch_assoc()){?>
                                    <li class="sub_menu-item"><a class="sub_menu-link" href="?page=courses__card&id=<?=$cours['id']?>"><?=$cours['title']?></a></li>
                              <?}?>
                            </ul>
                        </li>
                        <li class="menu__item">
                            <?php
                                if(isset($_SESSION['uid'])){?>
                                     <a href="?page=profile" class="menu__link">профиль</a>
                                <?}
                                else{?>
                                     <a href="?page=auth" class="menu__link">войти</a>
                                <?}
                            ?>
                           
                        </li>
                    </ul>
                </nav>
                <div class="burger-menu">
                    <a href="" class="burger-menu_button">
                      <spun class="burger-menu_lines"></spun>
                    </a>
                    <nav class="burger-menu_nav">
                        <a href="#" class="burger-menu_link">школа моделей</a>
                        <a href="?page=courses" class="burger-menu_link"">курсы</a>
                        <?php
                                if(isset($_SESSION['uid'])){?>
                                     <a href="?page=auth" class="burger-menu_link">профиль</a>
                                <?}
                                else{?>
                                     <a href="?page=auth" class="burger-menu_link">войти</a>
                                <?}
                            ?>
                    </nav>
                    <div class="burger-menu_overlay"></div>
                </div>
            </div>
        </div>
    </header>