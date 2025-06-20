<?php
function send_location($update) {
    // Метод
    $update->method[0] = 'sendLocation';
    // Чат
    $update->post_fields[0]->chat_id = $update->message->chat->id;
    // Локация
    $update->post_fields[0]->latitude  = '52.4';
    $update->post_fields[0]->longitude = '4.9';
}