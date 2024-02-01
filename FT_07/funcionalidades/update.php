<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FT_07</title>
</head>

<?php

    if(isset($_POST["submit"])){

        $id = $_POST["id"];

        include ("../include/ligacao.inc");
        
        $query = "SELECT * FROM utilizadores WHERE id_Utilizador = '$id'";

        $resultado = mysqli_query($conexao, $query) or die("Erro SQL");

        $registos = mysqli_num_rows($resultado);

        if($registos == 0){
            echo '<script>alert("Utilizador com o ID ' .$id .' não existe")</script>';
            echo "<meta http-equiv='refresh' content='0; ./update.php'>"; // Da refresh a página e depois vai para a página indicada

            return false;
        }else{
            $name = $_POST["nome"];
            $password = $_POST["pass"];

            $query = "UPDATE utilizadores SET Nome = '$name', Password = '$password' WHERE id_Utilizador = $id";

            mysqli_query($conexao, $query) or die ("Erro na atualização dos dados.");

            mysqli_close($conexao);

            echo '<script>alert("Utilizador com o ID ' .$id .' atualizado com sucesso")</script>';
            echo "<meta http-equiv='refresh' content='0; ./update.php'>"; // Da refresh a página e depois vai para a página indicada

        }

    }

?>

<body>
    <h1>Editar registos</h1>
    <hr>
    <br><br>
    <form method="POST">
        <label for="">ID:</label>
        <input type="number" min="1" name="id" required><br>

        <label for="">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="">Password:</label>
        <input type="password" name="pass" required><br>

        <input type="submit" name="submit"><br><br>

        <a href="http://web.colgaia.local/12tsi07/FT_07/">Voltar</a>
    </form>
</body>
</html>