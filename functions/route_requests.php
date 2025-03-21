<?php
// Основная функция, вызывает другие функции
function route_requests($update) {
// Этот код распознаёт сложную строку, наподобие "/echo Hello",
// и на выходе раскладывает слова, относящиеся к команде и обычной строке,
// по разным массивам command[] и parameters[]. 

  // если найдена бот-команда, то использовать код команды (функции)
  if (isset($update->message->entities[0]) && $update->message->entities[0]->type == 'bot_command') {
    $update->parameters = array();
    $update->command[0] = substr($update->message->text, 0, $update->message->entities[0]->length);
    $update->parameters[0] = substr($update->message->text, $update->message->entities[0]->length+1);
    
    switch ($update->command[0]) {
      // выдаёт данные о тебе
      case ('/whoami'):
        whoami($update);
        break;

      // зависит от того, идут ли строки после "/echo"
      case ('/echo'):
        echo_input($update);
        break;

      default:
        bad_request($update);
        break;
    }
    // если бот-команда не найдена
  } else {
    // выдаёт весь объект $update целиком
    perform_text($update);
  }
}