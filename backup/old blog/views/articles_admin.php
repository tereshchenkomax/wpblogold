<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Блог для задания</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
</head>
<body>
<div class="container-fluid">
    <h2 class="admin_head">Панель администратора</h2>
    <a href="index.php?action=add" class="btn btn-large">Добавить статью</a>
    <div>
        <table class="admin-table" style="width: 100%">
            <tr>
                <th>Заголовок</th>
                <th>Добавлено</th>
                <th>Обновлено</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($articles as $a): ?>
                <tr>
                    <td><?= $a['title'] ?></td>
                    <td><?= $a['data_created'] ?></td>
                    <td><?= $a['data_updated'] ?></td>
                    <td><a href="index.php?action=edit&id=<?= $a['id'] ?>">Редактировать</a></td>
                    <td><a href="index.php?action=delete&id=<?= $a['id'] ?>">Удалить</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script> 
</script>
</body>
</html>