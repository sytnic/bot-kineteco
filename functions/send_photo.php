<?php 
function send_photo($update) {
    // Метод
    $update->method[0] = 'sendPhoto';
    // Чат
    $update->post_fields[0]->chat_id = $update->message->chat->id;
    // Фото
    $update->post_fields[0]->photo = COMPANY_LOGO;
    $update->post_fields[0]->caption = 'KinetEco Logo';
}


