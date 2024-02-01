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

        include("../include/ligacao.inc");

        $query = "SELECT * FROM utilizadores WHERE id_Utilizador = '$id'"; // Query(consulta) da base de dados

        $resultado = mysqli_query($conexao, $query) or die("Erro SQL"); // Executa a query

        $registos = mysqli_num_rows($resultado); // Obtem o número de registos selecionados

        if($registos == 1) {
            $query = "DELETE FROM utilizadores WHERE id_Utilizador = '$id'";  // Da delete ao utilizador com o id que foi escrito no input

            mysqli_query($conexao, $query) or die("Erro SQL");

            echo "Utilizador eliminado com sucesso";
        }else{
            echo '<script>alert("Não existe o ID do utilizador digitado")</script>';
            echo "<meta http-equiv='refresh' content='0; ./delete.php'>"; // Da refresh a página e depois vai para a página indicada

            return false; // Para o programa e não continua para baixo
        }

        mysqli_close($conexao);

        echo '<script>alert("Utilizador apagado com sucesso")</script>';
        echo "<meta http-equiv='refresh' content='0; ../index.php'>"; // Da refresh a página e depois vai para a página indicada
    }
?>
<body>
    <h1>Eliminação de um registo</h1>
    <hr>
    <br><br>
    <form action="./delete.php" method="POST">
        <label for="">Insira o ID do utilizador que pretende eliminar:</label>
        <input type="number" required name="id" min="1">
        <input type="submit" name="submit">
    </form>
    <br>
    <a href="http://web.colgaia.local/12tsi07/FT_07/">Voltar</a>
</body>
</html>