<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Estoy en el login...!</h1>
    <form name="autenticar" action="index.php" method="POST">
        
        <div>
            <label for="" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="ingrese el email">
        </div>

        <div>
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="ingrese el password">
        </div>

        <input type="submit" value="Autenticar">
        <input type="hidden" name="action" value="autenticar">
    </form>
</body>
</html>