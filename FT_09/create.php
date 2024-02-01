<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FT_09</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<?php
if(isset($_POST["submit"])){
    if($_POST["nome"] <> "" AND $_POST["login"] <> "" AND $_POST["pass"] <> "" AND $_POST["data"] <> ""){
        $nome = $_POST["nome"];
        $nome_login = $_POST["login"];
        $pass = $_POST["pass"];
        $data = $_POST["data"];
        $nome_temp = $_FILES["file"]["tmp_name"];
        $nome_real = $_FILES["file"]["name"];

        // Extraia a extensão do arquivo
        $extensao = pathinfo($nome_real, PATHINFO_EXTENSION);

        // Gere um nome de arquivo único
        $nome_unico = uniqid() . '.' . $extensao;

        // Copie o arquivo para o diretório de imagens com o novo nome
        copy($nome_temp, "images/$nome_unico");
        
        include ("include/ligacao.php");
        
        // Para ver se já existe algum utilizador com o nome de Login que utilizador escreveu
        $query = "SELECT * FROM utilizadores WHERE Login = '$nome_login'";
        
        $resultado = mysqli_query($conexao, $query) or die("Erro SQL"); // Executa a query
        
        $registos = mysqli_num_rows($resultado); // Obtem o número de registos selecionados
        
        if($registos > 0){
            echo '<script>alert("Este nome de login de utilizador já existe")</script>';  // Popup de erro
            echo "<meta http-equiv='refresh' content='0; create.php'>"; // Da refresh a página e depois vai para a página indicada
            
            return false; // para nao fazer mais nada abaixo
        }

        $sql = "INSERT INTO utilizadores (Nome, Login, Password, Data, Foto) VALUE ('$nome', '$nome_login', '$pass', '$data', '$nome_unico')";
    

        mysqli_query($conexao, $sql) or die ("Erro na inserção dos dados.");

        mysqli_close($conexao);

        echo ("Gravado com sucesso.");
        echo '<script>alert("Dados enviados com sucesso.")</script>';  // Popup de erro
        echo "<meta http-equiv='refresh' content='0; logado.php'>"; // Da refresh a página e depois vai para a página indicada 

        echo "<a href='../index.php'>Voltar</a>";

    }else{
        echo '<script>alert("Dados inválidos, digite dados válidos")</script>';  // Popup de erro
        echo "<meta http-equiv='refresh' content='0; create.php'>"; // Da refresh a página e depois vai para a página indicada
    }
    


}else{
    ?>
    <h1 class="text-center pt-2">Criar utilizador</h1>
    <div class="col"> 
        <hr class="col-3 mx-auto border border-primary border-2 opacity-75 mt-2">
    </div>
    <div class="container">
        <form class="mt-4 pt-5" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" maxlength="50" required><br>
            </div>
            <div class="mb-3">
                <label for="login">Login:</label>
                <input type="text" class="form-control" name="login" maxlength="8" required><br>
            </div>
                <div class="mb-3">
                <label for="pass">Password:</label>
                <input type="password" class="form-control" name="pass" maxlength="12" required><br>
                </div>
            <div class="mb-3">
                <label for="data">Data:</label>
                <input type="date" class="form-control" name="data" required><br>
            </div>
            <div class="mb-3">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control" name="file"><br>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
        </form>
    </div><?php
}
?>
</body>
</html>
