<?php 
    // RECUPERO I DATI DAL FILE JSON
    $list_Todo = file_get_contents('./todo_list.json');

    // LI CONTROLLO E STAMPO
    header('Content-Type: application/json');
    echo $list_Todo;
?>