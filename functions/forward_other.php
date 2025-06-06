<?php
function forward_other($update) {
    // Метод
    $update->method[0] = 'sendMessage';

    // Chat Id
    // https://core.telegram.org/bots/api#update

    // эта цепочка $update->message->chat->id используется,
    // когда используется тип данных message
    //
    // $update->post_fields[0]->chat_id = $update->message->chat->id;

    // Когда используется тип данных callback_query,
    // используется другая цепочка
    // $update->callbackQuery->message->chat->id
    $update->post_fields[0]->chat_id = $update->callback_query->message->chat->id;


    // Текст возвращаемого в чат сообщения
    $update->post_fields[0]->text = "Please describe your problem and I will forward your message.";
    // Этот текст будет возвращён как сообщение, требующее ответа
    $update->post_fields[0]->reply_markup = json_encode(array(
        'force_reply' => true
        ));

    // В документации просят вызывать answerCallbackQuery
    // после того, как пользователь нажмет кнопку обратного вызова,
    // т.к. будет отображаться индикатор выполнения (сияние на нажатой кнопке)
    // https://core.telegram.org/bots/api#callbackquery

    $update->post_fields[1] = new \stdClass();
    $update->method[1] = 'answerCallbackQuery';
    $update->post_fields[1]->callback_query_id = $update->callback_query->id;
    
}