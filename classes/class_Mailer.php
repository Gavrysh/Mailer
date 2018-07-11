<?php

class Mailer
{
    //Обробка даних від користувача (текст листа)
    static function mailMessage($text)
    {
        $text .= ' Best regals!';
        return $text;
    }

    //Вибір способу відправки (протоколу) листа
    function setTransport()
    {
        $tp = [

        ];
        return 'HI';
    }

    //Відправка листа
    static function send($email, $text)
    {
        $subject = 'Only test';
        $headers = [
            'From' => 'webmaster@example.com',
            'Reply-To' => 'webmaster@example.com',
            'X-Mailer' => 'PHP'
        ];

        //Вибираємо протокол відправки
        //echo self::setTransport($transport);

        //Обробляємо дані від користувача

        //Сама відправка
        return mail($email, $subject, self::mailMessage($text), $headers);
    }
}