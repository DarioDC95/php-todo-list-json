<?php 
    // RECUPERO I DATI DAL FILE JSON
    $list_Todo = file_get_contents('./todo_list.json');
    
    // FACCIO IN MODO DI POTER LAVORARCI
    $list_Todo = json_decode($list_Todo, true);

    // PUSHO UNA NUOVA TASK
    if(isset($_POST['item'])) {
        $item = $_POST['item'];
        $done = false;
        $obj = [
            "item" => $item,
            "done" => $done
        ];

        array_push($list_Todo['data'], $obj);
    }

    // MODIFICO TRA COMPLETATO E NON
    if(isset($_POST['index'])) {
        $index = $_POST['index'];
        $list_Todo['data'][$index]['done'] = !$list_Todo['data'][$index]['done'];
    }

    // RIMUOVO LA TASK
    if(isset($_POST['removeIndex'])) {
        $index = $_POST['removeIndex'];
        array_splice($list_Todo['data'], $index, 1);
    }

    // RIEDITO LA TASK
    if(isset($_POST['editItem'])) {
        $index = $_POST['editIndex'];
        $string = $_POST['editItem'];
        $list_Todo['data'][$index]['item'] = $string;
    }

    // RICAMBIO IN JSON, LI CONTROLLO E STAMPO
    $list_Todo = json_encode($list_Todo, JSON_PRETTY_PRINT);
    file_put_contents('./todo_list.json', $list_Todo);
    $list_Todo = file_get_contents('./todo_list.json');

    header('Content-Type: application/json');
    echo $list_Todo;
?>