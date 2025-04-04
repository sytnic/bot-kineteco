<?php
// Основная функция, вызывает другие функции
function route_requests($update) {
// Этот код распознаёт сложную строку, наподобие "/echo Hello",
// и на выходе раскладывает слова, относящиеся к команде и обычной строке,
// по разным массивам command[] и parameters[]. 

  // если найдена бот-команда, 
  if (isset($update->message->entities[0]) && $update->message->entities[0]->type == 'bot_command') {
    $update->parameters = array();
    $update->command[0] = substr($update->message->text, 0, $update->message->entities[0]->length);
    $update->parameters[0] = substr($update->message->text, $update->message->entities[0]->length+1);
    
    // то использовать соответствующий команде код (функцию)
    switch ($update->command[0]) {
      // выдаёт данные о тебе
      case ('/whoami'):
        whoami($update);
        break;

      // зависит от того, идут ли строки после "/echo"
      case ('/echo'):
        echo_input($update);
        break;

      // запускаем функцию
      case ('/gethelp');
        perform_help($update);
        break;

      default:
        bad_request($update);
        break;
    }
    // иначе, если бот-команда не найдена
  } else {
    // если это был ответ(reply) пользователя на запрос бота,
    // то выполнить функцию ответа
    if (isset($update->message->reply_to_message)) {
        perform_reply($update);
    // иначе    
    } else {
        // выдать весь объект $update целиком
        perform_text($update);
    }
    
  }
}