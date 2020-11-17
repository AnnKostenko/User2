<?php

require_once ('User.php');


class Manager extends User
{
    public function __construct($user) {
        if ($user['role'] == 'client') {
            header('HTTP/1.0 403 Forbidden');exit();
        }
        parent::__construct($user);
    }

    public function getHello()
    {
        $result = '';
        switch ($this->lang) {
            case 'ru':
                $result = " Вы менеджер";
                break;
            case 'ua':
                $result = " Ви менеджер";
                break;
            case 'en':
                $result = " You are the manager";
                break;
            case 'it':
                $result = " Sei l'amministratore";
                break;
        }
        return parent::getHello() . $result;
    }
}