<?php
  // Iniciar a sessão
  session_start();

  session_unset();

  // Destroy the session
  session_destroy();

  // Redirect to login page
  header("location: index.php");
  exit;
  ?>
