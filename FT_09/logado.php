<?php

session_start();

if(!isset($_SESSION["Login"])){
    header("Location: index.php");
    exit();
}

if(!isset($_SESSION["file"]) | $_SESSION["file"] == ''){
    $_SESSION["file"] = "default.png";
}
?>
    <?php
        include("include/ligacao.php");

        $data = date("Y-m-d");
        $sql = "UPDATE utilizadores SET Data = '$data' WHERE Login='{$_SESSION['Login']}'";
        $result = mysqli_query($conexao, $sql);
        mysqli_close($conexao);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bem-Vindo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <h1 class="text-center pt-2">Bem vindo <?php echo $_SESSION["nome"] ?></h1>
        <center>
            <img width="200" style='align: center;' src='images/<?php echo $_SESSION["file"];?>'>
        </center>
        <div class="col"> 
            <hr class="col-3 mx-auto border border-primary border-2 opacity-75 mt-2">
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href='assets/logout.php'" class="btn btn-primary btn-lg mt-3">Logout</button>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href='create.php'" class="btn btn-primary btn-lg mt-3">Criar novo utilizador</button>
        </div>
    </body>
    </html>