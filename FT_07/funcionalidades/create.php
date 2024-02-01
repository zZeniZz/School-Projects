<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FT_07</title>
</head>

<body>
<?php
if(isset($_POST["submit"])){
    if($_POST["nome"] <> "" AND $_POST["login"] <> "" AND $_POST["pass"] <> "" AND $_POST["data"] <> ""){
        $nome = $_POST["nome"];
        $nome_login = $_POST["login"];
        $pass = $_POST["pass"];
        $data = $_POST["data"];
        
        include ("../include/ligacao.inc");
        
        // Para ver se já existe algum utilizador com o nome de Login que utilizador escreveu
        $query = "SELECT * FROM utilizadores WHERE Login = '$nome_login'";
        
        $resultado = mysqli_query($conexao, $query) or die("Erro SQL"); // Executa a query
        
        $registos = mysqli_num_rows($resultado); // Obtem o número de registos selecionados
        
        if($registos > 0){
            echo '<script>alert("Este nome de login de utilizador já existe")</script>';  // Popup de erro
            echo "<meta http-equiv='refresh' content='0; ./create.php'>"; // Da refresh a página e depois vai para a página indicada
            
            return false; // para nao fazer mais nada abaixo
        }

        $sql = "INSERT INTO utilizadores (Nome, Login, Password, Data) VALUE ('$nome', '$nome_login', '$pass', '$data')";
    

        mysqli_query($conexao, $sql) or die ("Erro na inserção dos dados.");

        mysqli_close($conexao);

        echo ("Gravado com sucesso.");
        echo '<script>alert("Dados enviados com sucesso.")</script>';  // Popup de erro
        echo "<meta http-equiv='refresh' content='0; ./create.php'>"; // Da refresh a página e depois vai para a página indicada 

        echo "<a href='../index.php'>Voltar</a>";

    }else{
        echo '<script>alert("Dados inválidos, digite dados válidos")</script>';  // Popup de erro
        echo "<meta http-equiv='refresh' content='0; ./create.php'>"; // Da refresh a página e depois vai para a página indicada
    }
    


}else{
    ?>
    <h1>Inserção de dados</h1>
    <hr>
    <br><br>
    <form action="./create.php" method="post">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" maxlength="50" required><br>

        <label for="login">Login:</label>
        <input type="text" name="login" maxlength="8" required><br>

        <label for="pass">Password:</label>
        <input type="password" name="pass" maxlength="12" required><br>

        <label for="data">Data:</label>
        <input type="date" name="data" required><br>

        <input type="submit" value="Enviar" name="submit"><br><br>

        <a href="http://web.colgaia.local/12tsi07/FT_07/">Voltar</a>
    </form> <?php
}
?>
</body>
</html>
