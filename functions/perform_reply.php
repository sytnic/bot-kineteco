<?php
function perform_reply($update) {
  // Метод
  $update->method[0] = 'sendMessage';
  // Id чата, куда вернётся ответ
  $update->post_fields[0]->chat_id = $update->message->chat->id;

  // Отслеживание ответа и возвращаемый текст

  
  switch ($update->message->reply_to_message->text) {
    // здесь идёт отслеживание ответа на команду /gethelp
    // если был этот запрос бота, то ищем ответ пользователя 
    case ('What kind of help would you like? Type "tech", "billing", or "other".'):
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
    break;

    // если был этот запрос бота
    case ("Please describe your problem and I will forward your message."):
        // Id чата, куда вернётся ответ
        $update->post_fields[0]->chat_id = CUSTOMER_SERVICE_ID;
        // Возвращаемый текст
        $update->post_fields[0]->text = 
           "You received the following question:\n\n".
            $update->message->text.
            "\n\nIt was sent by\n\n".
            print_r($update->message->from, TRUE);
    break;

  }
}
