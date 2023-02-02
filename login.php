<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- MY CSS -->
    <link rel="stylesheet" href="./css/beta.css">
</head>
<body>
    <header>
        <div class="mycontainer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="mycard text-center text-secondary">
                            Effettua il Login
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
                        <div class="card-body text-secondary">
                            <form action="./index.php">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label fw-semibold">Inserisci la tua email per accedere</label>
                                    <input type="email" name="email" class="form-control" placeholder="Inserisci la mail">
                                </div>
                                <div class="mb-5">
                                    <label for="formGroupExampleInput2" class="form-label fw-semibold">Inserisci la tua password</label>
                                    <input type="text" name="password" class="form-control" placeholder="Inserisci la password">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>