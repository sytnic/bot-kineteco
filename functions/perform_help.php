<?php
function perform_help($update) {
  // Метод
  $update->method[0] = 'sendMessage';
  // Далее идут поля (свойства) метода:
  // chat_id, text, reply_markup.
  // https://core.telegram.org/bots/api#sendmessage

  // Id чата, куда отправится ответ.
  $update->post_fields[0]->chat_id = $update->message->chat->id;

  // Возвращаемый текст.
  // Возвращаемый текст будет возвращён как сообщение, требующее ответа.
  $update->post_fields[0]->text = 'What kind of help would you like? Type "tech", "billing", or "other".';
 
 
  // Тип реакции.

  // Добавление массива клавиатуры.
  $keyboard = [
    [['text' => 'tech'], ['text' => 'billing']],
    [['text' => 'other']],
  ];
  
  $update->post_fields[0]->reply_markup = json_encode(array(
    'keyboard' => $keyboard,

  // на фоне появления кнопок force_reply не требуется, 
  // т.к. используется только один тип реакции из возможных
  // 'force_reply' => TRUE,
     
     // скрытие клавиатуры после использования 
     'one_time_keyboard' => true,
     // уменьшил размер кнопок:
     'resize_keyboard' => true
  ));
  
}
