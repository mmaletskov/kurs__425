<?php
    if(isset($_GET['id'])){
        $get_id = $_GET['id'];
        $sql = "SELECT * FROM courses WHERE id = '$get_id'";
        $result = $connect -> query($sql);
        $delete = $result -> fetch_assoc();
    }
?>
<main>
    <section class="delete__course">
        <div class="container">
            <div class="delete__course-inner">
                <h2 class="delete__course-title">вы уверены, что хотите удалить?</h2>
                <div class="delete__course-btns">
                    <a href="?page=delete__course&id=<?=$delete['id']?>" class="delete__course-confirm">да</a>
                    <a href="?page=courses" class="delete__course-discard">нет</a>
                </div>
            </div>
        </div>
    </section>
</main>