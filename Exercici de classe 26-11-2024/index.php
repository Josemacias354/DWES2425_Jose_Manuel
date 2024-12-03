<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="login.php" method="post">
    <fieldset>
      <legend>Login</legend>
      <div><span class="error"> <?php global $error; echo $error?> </span></div>
      <div class="fila">
      <label for="ususario">Usuario:</label> <br>
        <input type="text" name="inputUsuario" id="usuario" maxlength="50" /><br>
      </div>
        <div class="fila">
        <label for="password">Contraseña:</label> <br>
        <input type="password" name="inputPassword"  id="password" maxlength="50"><br>
        </div>
        <div class="fila">
        <button type="submit" name="enviar" value="Enviar">Enviar</button>
        </div>
    </fieldset>
</form>

</body>
</html>