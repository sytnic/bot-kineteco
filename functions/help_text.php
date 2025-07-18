<?php
function help_text($update) {
    // Используется ли нулевой слот или нет.
    // Это нужно чтобы /start и /help не конфликтовали, используя одинаковый шаблон текста.
    if (isset($update->method[0])) {
        $i = 1;
        $update->post_fields[1] = new \stdClass();
    } else {
        $i = 0;
    }


    // Метод
    $update->method[$i] = 'sendMessage';
    // Чат
    $update->post_fields[$i]->chat_id = $update->message->chat->id;
    // Текст
    $update->post_fields[$i]->text = 
    "
    <b>Welcome to the Kineteco help bot!</b> Commands are:
    /gethelp - Get billing and tech FAQs, or connect to customer Service
    /help - Get this help text
    /whoami - Get your own Telegram identity (could help us to help you)
    ";
    $update->post_fields[$i]->parse_mode = 'HTML'; 
}