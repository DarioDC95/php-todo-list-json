<?php 
    // RECUPERO I DATI DAL FILE JSON
    $list_Todo = file_get_contents('./todo_list.json');
    
    // FACCIO IN MODO DI POTER LAVORARCI
    $list_Todo = json_decode($list_Todo, true);

    if(isset($_POST['item'])) {
        $item = $_POST['item'];
        $done = $_POST['done'];
        $obj = [
            "item" => $item,
            "done" => $done
        ];


        array_push($list_Todo['data'], $obj);
        $list_Todo = json_encode($list_Todo, JSON_PRETTY_PRINT);
        file_put_contents('./todo_list.json', $list_Todo);
        $list_Todo = file_get_contents('./todo_list.json');
        $list_Todo = json_decode($list_Todo, true);
    }

    // RICAMBIO IN JSON, LI CONTROLLO E STAMPO
    $list_Todo = json_encode($list_Todo);

    header('Content-Type: application/json');
    echo $list_Todo;
?>