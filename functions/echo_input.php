<?php
function echo_input($update) {
  // Using the Telegram Bot API method "sendMessage",
  // https://core.telegram.org/bots/api#sendmessage
  $update->method[0] = 'sendMessage';

  // It's going back to the same chat where it came from
  // Оно возвращается в тот же чат, откуда пришло
  $update->post_fields[0]->chat_id = $update->message->chat->id;

  // The text being returned is just the whole object
  // Возвращаемый текст 
  // - просто весь объект целиком
  //$update->post_fields[0]->text = print_r($update, TRUE);

  // вывести только параметры, т.е. строку без впереди идущей команды,
  // например, в команде "/echo Hello bot" 
  // $update->post_fields[0]->text = $update->parameters[0];

  // мои улучшения для команды "/echo" без параметров
  if (empty($update->parameters[0])) {
    // если параметры (строка после /echo) пустые, то выдать всё
    $update->post_fields[0]->text = print_r($update, TRUE);
  } else {
    // иначе выдать только параметры (строку после /echo)
    $update->post_fields[0]->text = $update->parameters[0];
  }

}
    
