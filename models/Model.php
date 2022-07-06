<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

class Model {
    private $games;
    private $commands;

    public function __construct(){
        $this->games = (new MongoDB\Client())->football_champ->games;
        $this->commands = (new MongoDB\Client())->football_champ->commands;
    }
    public function get_commands() {
        return $this->commands->distinct("name");
    }
    public function get_leagues() {
        return $this->games->distinct("league");
    }
    public function get_leagues_data($league) {
        return $this->games->find(['league' => $league])->toArray();
    }
    public function get_players($command) {
        return $this->commands->find(['name' => $command])->toArray()[0]['group'];
    }
    public function get_games_by_command($command) {
    return $this->games->find(['commands' => ['name' => $command]])->toArray();
    }
}