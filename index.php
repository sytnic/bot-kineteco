<?php
// PHP example of a simple bot that spits a user's message back.

// Include functions
include_once 'constants.php';
include_once 'functions/bad_request.php';
include_once 'functions/echo_input.php';
include_once 'functions/send_response.php';
include_once 'functions/route_requests.php';
include_once 'functions/whoami.php';

// Grab the JSON input stream from Telegram, convert it to an object
// Возьмите входной поток JSON из Telegram, преобразуйте его в объект
$update = json_decode(file_get_contents('php://input'));

// Initialize two variables used to respond to Telegram.
// (Arrays allow for multiple responses to be sent to Telegram.)
// Инициализируем две переменные, используемые для отправки ответов в Telegram.
// (Массивы позволяют отправлять в Telegram несколько ответов.)
$update->method = array();
$update->post_fields = array();
// There will always be at least one response
// Всегда будет по крайней мере один ответ
$update->post_fields[0] = new \stdClass();

// Do the thing
// Основная функция, вызывает другие функции
route_requests($update);

// Send it all to Telegram's servers using HTTP POST
send_response($update);
