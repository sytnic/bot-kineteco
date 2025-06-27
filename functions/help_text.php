<?php
function help_text($update) {
    // Метод
    $update->method[0] = 'sendMessage';
    // Чат
    $update->post_fields[0]->chat_id = $update->message->chat->id;
    // Текст
    $update->post_fields[0]->text = 
    "
    Welcome to the Kineteco help bot! Commands are:
    /gethelp - Get billing and tech FAQs, or connect to customer Service
    /help - Get this help text
    /whoami - Get your own Telegram identity (could help us to help you)
    ";
}