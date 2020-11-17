<?php

session_start();


class User
{
    protected static $salt = 'Anna';

    protected static $users = [
        ['name' => 'Василий', 'surname' => 'Лоханкин', 'login' => 'Vasisualiy', 'password' => '12345', 'lang' => 'ru', 'role' => 'admin'],
        ['name' => 'Афанасий', 'surname' => 'Цукерберг', 'login' => 'Afanasiy', 'password' => '54321', 'lang' => 'en', 'role' => 'client'],
        ['login' => 'Petro', 'name' => 'Петр', 'surname' => 'Инкогнито', 'password' => 'EkUC42nzmu', 'lang' => 'ua', 'role' => 'manager'],
        ['login' => 'Pedrolus', 'name' => 'Педро', 'surname' => 'Миланов', 'password' => 'Cogito_ergo_sum', 'lang' => 'it', 'role' => 'client'],
        ['login' => 'Sasha', 'name' => 'Александр', 'surname' => 'Александров', 'password' => 'Ignorantia_non_excusat'],
    ];

    public $login;

    public $lang;

    protected $role;

    public $name;

    public $surname;

    protected function __construct($user) {
        $this->login = $user['login'];
        $this->lang = $_SESSION['lang']?$_SESSION['lang']:$user['lang'];
        $this->role = $user['role'];
        $this->name = $user['name'];
        $this->surname = $user['surname'];
    }

    public static function signIn($login, $password) {
        if (empty($login) || empty($password)) {
            return false;
        }
        foreach (self::$users as $id => $user) {
            if ($user['login'] == $login && $user['password'] == $password) {
                $_SESSION['userId'] = $id;
                return $user;
            }
        }
        return false;
    }

    public static function setLang($newLang) {
        $_SESSION['lang'] = $newLang;
        return true;
    }

    public static function getUsers() {
        return self::$users;
    }

    public function getHello() {
        $result = '';
        switch ($this->lang) {
            case 'ru':
                $result = "Приветствую, $this->surname $this->name.";
                break;
            case 'ua':
                $result = "Вітаю, $this->surname $this->name.";
                break;
            case 'en':
                $result = "Greetings $this->surname $this->name.";
                break;
            case 'it':
                $result = "Saluti $this->surname $this->name.";
                break;
        }

        return $result;
    }

    public function getLangTitle() {
        $result = '';
        switch ($this->lang) {
            case 'ru':
                $result = "Сменить язык";
                break;
            case 'ua':
                $result = "Змінити мову";
                break;
            case 'en':
                $result = "Change language";
                break;
            case 'it':
                $result = "Cambia lingua";
                break;
        }

        return $result;
    }

}