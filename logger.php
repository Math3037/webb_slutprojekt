<?php

function console_log(string $message)
{
    $socket = socket_create(AF_INET, SOCK_STREAM, 0);
    
    socket_connect($socket, "localhost", 12345);
    
    $obj = new stdClass();
    $obj->type = 1;
    $obj->message = $message;
    $obj->time = time();

    socket_write($socket, json_encode($obj));

    socket_close($socket);
}

?>