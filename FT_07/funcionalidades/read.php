<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FT_07</title>
</head>

<body>
<?php
    $sql = "SELECT * FROM utilizadores";
    
    include ("../include/ligacao.inc");

    $tab_virtual = mysqli_query($conexao, $sql) or die ("Erro na inserção dos dados.");

    mysqli_close($conexao);

    echo '<h1>Lista de todos os registos da tabela</h1>';
    echo '<hr>';
    echo '<br>';
    echo '<br>';

    while($linha = mysqli_fetch_array($tab_virtual)){
        echo "ID: ". $linha["id_Utilizador"];
        echo "<br>";
        echo "Nome: ". $linha["Nome"];
        echo "<br>";
        echo "Data: ". $linha["Data"];
        echo "<br>";
        echo "<br>";
    }
    echo '<a href="http://web.colgaia.local/12tsi07/FT_07/">Voltar</a>';
?>
</body>
</html>