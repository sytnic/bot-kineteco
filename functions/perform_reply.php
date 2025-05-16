<?php
function perform_reply($update) {
  // Метод
  $update->method[0] = 'sendMessage';

  // Id чата, куда вернётся ответ
  $update->post_fields[0]->chat_id = $update->message->chat->id;

  // Отслеживание ответа и возвращаемый текст
  
  switch ($update->message->reply_to_message->text) {

    // следующий case будет улучшен в отдельной функции finish_reply()
    // для реализации нескольких одновременных ответов от бота в разные чаты,
    // например, в чат службы поддержки и пользователю.

    // если был этот запрос бота
    case ("Please describe your problem and I will forward your message."):
        // вызвать функцию
        finish_reply($update);
    break;


  }
}
