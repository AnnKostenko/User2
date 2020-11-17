<?php

require_once ('User.php');


class Admin extends User
{
    public function __construct($user) {
        if ($user['role'] != 'admin') {
            header('HTTP/1.0 403 Forbidden');exit();
        }
        parent::__construct($user);
    }

    public function getHello()
    {
        $result = '';
        switch ($this->lang) {
            case 'ru':
                $result = " Вы администратор";
                break;
            case 'ua':
                $result = " Ви адміністратор";
                break;
            case 'en':
                $result = " You are the administrator";
                break;
            case 'it':
                $result = " Sei l'amministratore";
                break;
        }
        return parent::getHello() . $result;
    }
}