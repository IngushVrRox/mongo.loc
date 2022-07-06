<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/models/model.php';

$model = new Model();
$_POST = json_decode(file_get_contents('php://input'), true);
$res = '';

switch ($_POST['event']) {
    case 'league':
        $res = '<table id="table" border="2px" cellpadding="3px" width="700px"><tr><th>Лига</th><th>Дата</th><th>Место</th><th>Команды</th><th>Победитель</th></tr>';
        foreach ($model->get_leagues_data($_POST['league']) as $val) {
            $commands = '<ul>';
            foreach ($val['commands'] as $command) {
                $commands .= '<li>' . $command['name'] . '</li>';
            }
            $commands .= '</ul>';
            $res .= '<tr><td>' . $val['league'] . '</td><td>' . date('d.m.Y H:i', strtotime($val['date'])) . '</td><td>' . $val['place'] . '</td><td>' . $commands . '</td><td>' . $val['winner'] . '</td></tr>';
        }
        $res .= '</table>';
        break;
    case 'command':
        foreach ($model->get_players($_POST['command']) as $player) {
            $res .= '<li>' . $player['name'] . '</li>';
        }
        break;
    case 'games':
        foreach ($model->get_games_by_command($_POST['command']) as $game) {
            $commands = '';
            foreach ($game['commands'] as $command) {
                $commands .= $command['name'] . '; ';
            }
            $res .= '<li>Лига: ' . $game['league'] . '; Дата: ' . date('d.m.Y H:i', strtotime($game['date'])) . '; Место: ' . $game['place'] . '; Команды: ' . $commands . 'Победитель: ' . $game['winner'] . '</li>';
        }
        break;
}

echo json_encode($res);