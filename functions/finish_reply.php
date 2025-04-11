<?php
function finish_reply($update) {

    // Forward the message
    // Отправка сообщения в службу поддержки
    
    // Id чата, куда вернётся ответ
    $update->post_fields[0]->chat_id = CUSTOMER_SERVICE_ID;
    // Возвращаемый текст
    $update->post_fields[0]->text = 
        "You received the following question:\n\n".
        $update->message->text.
        "\n\nIt was sent by\n\n".
        print_r($update->message->from, TRUE);


    // Confirm that the message has been forwarded
    // Отправка пользователю сообщения, что его сообщение отправлено в техподдержку

    // Инициализация второго класса под поля,
    // первый был инициализирован в index.php
    $update->post_fields[1] = new \stdClass();
    $update->method[1] = 'sendMessage';
    $update->post_fields[1]->chat_id = $update->message->chat->id;
    $update->post_fields[1]->text = 
    'Your help request has been forwarded. You should get a response within 24 hours.';

}