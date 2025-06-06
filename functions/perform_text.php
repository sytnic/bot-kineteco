<?php
function perform_text($update) {
    // Метод
    $update->method[0] = 'sendMessage';
    // Chat Id
    $update->post_fields[0]->chat_id = $update->message->chat->id;

    /* Здесь отслеживается ответ пользователя после команды /gethelp 
       и подготавливается ответ ему.  */
    /*
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
    */

    /* Упрощение функции после внедрения inline кнопок.
       Теперь по кнопкам совершается переход по url и свой вызов по кнопке other. 
    */
    switch ($update->message->text) {
      default:
        bad_request($update);
        break;
    }

}