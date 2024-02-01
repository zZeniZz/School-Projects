<?php

    $hostname="localhost";
    $login="12tsi07";
    $password="12tsi07650c1dc343811";
    $database="12tsi07_Dados";

    // Faz a ligação ao sv SQL
    $conexao = mysqli_connect($hostname, $login, $password, $database) or die("erro ligação ao servidor");

    // Define o tipo de caracters da ligação para Português
    mysqli_set_charset($conexao, "utf8");

    // Faz a ligação a base de dados
    $sel_db = mysqli_select_db($conexao, $database) or die("Erro de ligação à base de dados");