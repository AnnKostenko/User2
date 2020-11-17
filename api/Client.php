<?php

require_once ('User.php');


class Client extends User
{
    public function __construct($user) {
        if ($user['role'] == 'manager') {
            header('HTTP/1.0 403 Forbidden');exit();
        }
        parent::__construct($user);
    }

    public function getHello()
    {
        $result = '';
        switch ($this->lang) {
            case 'ru':
                $result = " Вы клиент";
                break;
            case 'ua':
                $result = " Ви клієнт";
                break;
            case 'en':
                $result = " You are a client";
                break;
            case 'it':
                $result = " Sei un cliente";
                break;
        }
        return parent::getHello() . $result;
    }
}