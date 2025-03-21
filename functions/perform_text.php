<?php
function perform_text($update) {
  // Метод
  $update->method[0] = 'sendMessage';
  // Chat Id
  $update->post_fields[0]->chat_id = $update->message->chat->id;
  // Текст возвращаемого в чат сообщения
  // - просто весь объект целиком
  $update->post_fields[0]->text = print_r($update, TRUE);
      
}