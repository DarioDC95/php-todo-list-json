<?php    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List with myAPI</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- MY CSS -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div id="app">
        <header>
            <div class="mycontainer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="mycard text-center text-secondary">
                                Todo List
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="mycontainer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card-body text-center text-secondary">
                                <ul class="list-group">
                                    <li v-for="(value, index) in list" ::key="index" class="list-group-item d-flex justify-content-between align-items-center">
                                        <span v-if="value.item" @click="DoneTask(index)" :class="value.done ? 'text-decoration-line-through' : ''" class="flex-grow-1 text-start">{{ value.item }}</span>
                                        <input v-else v-model="editItem" @keyup.enter="editTask(index, editItem)" type="text" :placeholder="errorEdit != '' ? errorEdit : 'Modifica e premi invio'" class="form-control me-4">
                                        <div class="d-flex align-items-center">
                                            <button @click="openEdit(index)" class="btn btn-warning me-1"><i class="fa-solid fa-pen-to-square"></i></button>
                                            <button @click="removeTask(index)" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div class="mycontainer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="mycard text-center text-secondary">
                                <div class="input-group mb-3">
                                    <input v-model="newTask" type="text" class="form-control" :placeholder="errorMessage != '' ? errorMessage : 'Inserisci una nuova Task'" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button @click="addTask()" class="btn btn-outline-warning" type="button" id="button-addon2">Inserisci</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- VUE JS -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <!-- AXIOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.0/axios.min.js" integrity="sha512-A6BG70odTHAJYENyMrDN6Rq+Zezdk+dFiFFN6jH1sB+uJT3SYMV4zDSVR+7VawJzvq7/IrT/2K3YWVKRqOyN0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- MY SCRIPT -->
    <script type="text/javascript" src="./js/script.js"></script>
</body>
</html>