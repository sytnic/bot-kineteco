<?php
function start_text($update) {
    // Метод
    $update->method[0] = 'sendPhoto';
    // Чат получения
    $update->post_fields[0]->chat_id = $update->message->chat->id;
    // Фото
    $update->post_fields[0]->photo = COMPANY_LOGO;
    help_text($update);
}