<?
require_once dirname(__FILE__) . '/models/model.php';
$model = new Model();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Football</title>
</head>
<body>
<form id="form-league">
    <label for="league">Лига:</label>
    <select name="league" id="league">
        <option value="" selected disabled>Не выбрано</option>
        <? foreach ($model->get_leagues() as $id => $league) { ?>
            <option value="<?= $league ?>"><?= $league ?></option>
        <? } ?>
    </select>
    <table id="table"></table>
</form>
<br>
<form id="form-command">
    <label for="team">Команда:</label>
    <select name="team" id="team">
        <option value="" selected disabled>Не выбрано</option>
        <? foreach ($model->get_commands() as $id => $command) { ?>
            <option value="<?= $command ?>"><?= $command ?></option>
        <? } ?>
    </select>
    <ul id="list"></ul>
</form>
<form id="form-games">
    <label for="team">Команда:</label>
    <select name="team" id="team">
        <option value="" selected disabled>Не выбрано</option>
        <? foreach ($model->get_commands() as $id => $command) { ?>
            <option value="<?= $command ?>"><?= $command ?></option>
        <? } ?>
    </select>
    <ul id="list"></ul>
</form>

<script src="script.js" defer></script>
</body>
</html>