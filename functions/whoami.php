<?php
function whoami($update) {
    // Метод
    $update->method[0] = 'sendMessage';
    // Chat ID
    $update->post_fields[0]->chat_id = $update->message->chat->id;

    // Создание ответного текста.

    // Сначала собираем информацию. 
    // Подчиненную JSON структуру можно посмотреть в Json Dump Bot
    $firstname = $update->message->from->first_name;
    $lastname = $update->message->from->last_name;
    $username = $update->message->from->username;
    $user_id = $update->message->from->id;

    $update->post_fields[0]->text = 
    "Hello $firstname $lastname!
Your username is $username and your user ID is $user_id.";

}