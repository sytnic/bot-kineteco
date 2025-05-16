<?php
function perform_text($update) {
    // Метод
    $update->method[0] = 'sendMessage';
    // Chat Id
    $update->post_fields[0]->chat_id = $update->message->chat->id;


    /* Эта часть будет заменена на case на фоне введения кнопок в бот
    // Текст возвращаемого в чат сообщения
    // - просто весь объект целиком
    $update->post_fields[0]->text = print_r($update, TRUE);
    */

    // здесь идёт отслеживание ответа на команду /gethelp
    // если был этот запрос бота, то ищем ответ пользователя 
    switch ($update->message->text) {
      case 'tech':
        $update->post_fields[0]->text = "Tech info here.";
        break;
      case 'billing':
        $update->post_fields[0]->text = "Billing info here.";
        break;
      // в ответ на 'other' пользователя
      case 'other':
        // был текстовый ответ:
        // $update->post_fields[0]->text = "I'll forward your message.";
        // теперь в ответ - функция
        forward_other($update);
        break;
      default:
        $update->post_fields[0]->text = "I didn't understand that.";
        break;
    }

}