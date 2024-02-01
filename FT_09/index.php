<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <h1 class="text-center pt-2">Login</h1>
    <div class="col"> 
        <hr class="col-3 mx-auto border border-primary border-2 opacity-75 mt-2">
    </div>
    <div class="container">
        <form class="mt-4 pt-5" action="login.php" method="post">
            <div class="mb-3">
                <label class="form-label">Nome de login</label>
                <input type="text" class="form-control" name="login" required>
                <div class="form-text">Digite o seu nome de utilizador aqui.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
        </form>
    </div>
</body>
</html>