<?php
function forward_other($update) {
    // Метод
    $update->method[0] = 'sendMessage';
    // Chat Id
    $update->post_fields[0]->chat_id = $update->message->chat->id;
    // Текст возвращаемого в чат сообщения
    $update->post_fields[0]->text = "Please describe your problem and I will forward your message.";
    // Этот текст будет возвращён как сообщение, требующее ответа
    $update->post_fields[0]->reply_markup = json_encode(array(
        'force_reply' => true
        ));
    
}