<?php 
    include __DIR__. './functions.php';

    // RECUPERO I DATI DAL FILE JSON
    $list_Todo = file_get_contents('./todo_list.json');
    
    // FACCIO IN MODO DI POTER LAVORARCI
    $list_Todo = json_decode($list_Todo, true);

    // PUSHO UNA NUOVA TASK
    if(isset($_POST['item'])) {
        $list_Todo = pushTask($_POST['item'], $list_Todo);
    }

    // MODIFICO TRA COMPLETATO E NON
    if(isset($_POST['index'])) {
        $list_Todo = isCompleted($_POST['index'], $list_Todo);
    }

    // RIMUOVO LA TASK
    if(isset($_POST['removeIndex'])) {
        $list_Todo = removeTask($_POST['removeIndex'], $list_Todo);
    }

    // RIEDITO LA TASK
    if(isset($_POST['edit'])) {
        $list_Todo = reEditTask($_POST['edit'], $list_Todo);
    }

    // RICAMBIO IN JSON E STAMPO
    $list_Todo = json_encode($list_Todo, JSON_PRETTY_PRINT);
    file_put_contents('./todo_list.json', $list_Todo);

    header('Content-Type: application/json');
    echo $list_Todo;
?>