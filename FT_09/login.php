<?php

    session_start();
    include ("include/ligacao.php");

    if (isset($_POST["submit"])) {
        
        $login = $_POST["login"];
        $pass = $_POST["pass"];

        $sql = "SELECT * FROM utilizadores WHERE Login='$login' AND Password='$pass'";
        $result = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($result) == 1) {
            $query = mysqli_fetch_assoc($result);
            $_SESSION["nome"] = $query["Nome"];
            $_SESSION["Login"] = $query["Login"];
            $_SESSION["pass"] = $query["Password"];
            $_SESSION["file"] = $query["Foto"];
            header("Location: logado.php");
        } else {
            echo '<script>alert("Nome utilizador ou password incorretos");</script>';
            header("Refresh: 0");
        }

    } else {
        header("Location: index.php");
        exit;
    }

?>