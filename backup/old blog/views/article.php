<?php update_counter($article['id'])?>
<div class="container">
    <div>
        <div class="article">
            <h3 class="title_article"><?= $article['title'] ?></h3>

            <p><?= $article['content'] ?></p>
            <em>Создано <?= $article['data_created'] ?></em>
            <em>Изменено <?= $article['data_updated'] ?></em>
            <p>Количество просмотров <?= get_counter($article['id']); ?></p>
        </div>
    </div>
    <a href="index.php"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
</div>


