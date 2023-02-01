<?php 
    // RECUPERO I DATI DAL FILE JSON
    $list_Todo = file_get_contents('./todo_list.json');

    var_dump($_POST);
    if(isset($_POST['obj'])) {
        // FACCIO IN MODO DI POTER LAVORARCI
        $list_Todo = json_decode($list_Todo, true);
    }

    die();
    // LI CONTROLLO E STAMPO
    header('Content-Type: application/json');
    echo $list_Todo;
?>