<?php
// Основная функция, вызывает другие функции
function route_requests($update) {
  // Is it a callback query?
  // Этот вариант возникает при использовании на встроенных кнопках CallbackQuery
  // по пути sendMessage(метод)->reply_markup(свойство)(InlineKeyboardMarkup(тип))
  // ->InlineKeyboardButton(тип)->callback_data(свойство)->CallbackQuery(тип)
  if (isset($update->callback_query)) {
    perform_callback($update);
    return;
  }

  // Is it a command?
  // если найдена бот-команда
  if (isset($update->message->entities[0]) && $update->message->entities[0]->type == 'bot_command') {
    // Этот код распознаёт сложную строку, наподобие "/echo Hello",
    // и на выходе раскладывает слова, относящиеся к команде и обычной строке,
    // по разным массивам command[] и parameters[]. 
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

      // запускаем функцию
      case ('/photo');
        send_photo($update);
        break;

      default:
        bad_request($update);
        break;
    }
    // иначе, если бот-команда не найдена
  } else {
    // Is it a reply-to message?
    // если это был ответ(reply) пользователя на запрос бота,
    // то выполнить функцию ответа
    if (isset($update->message->reply_to_message)) {
        perform_reply($update);
    // иначе    
    } else {
        // Is it ordinary text?
        perform_text($update);
    }
    
  }
}