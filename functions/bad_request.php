<?php
function bad_request($update) {
    // Метод
    $update->method[0] = 'sendMessage';
    // Chat Id
    $update->post_fields[0]->chat_id = $update->message->chat->id;
    // Текст возвращаемого в чат сообщения
    $update->post_fields[0]->text = "I didn't understand that. Try again";
}