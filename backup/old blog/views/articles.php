<main class="row">
    <section class="main_top">
<!--        <h2 class="text-center">Fitness blog 2000</h2>-->
    </section>
    <div class="container">
        <div class="row">
            <?php foreach ($articles as $a): ?>
                <div class="article col-lg-12">
                    <h3><a href="article.php?id=<?= $a['id'] ?>"><?= $a['title'] ?></a></h3>
                    <p class="article_trimmed"><?= articles_intro($a['content']) ?></p>
                    <em class="creation_date">Создано : <?= $a['data_created'] ?></em>
                    <em>Изменено : <?= $a['data_updated'] ?></em>
                </div>

            <?php endforeach ?>

        </div>
    </div>
    <script>
        $('.owl-carousel').owl-carousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    </script>
</main>

