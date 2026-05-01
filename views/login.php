<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Mis Series</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f4f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 350px; }
        h2 { text-align: center; color: #333; margin-bottom: 20px; }
        input[type="email"], input[type="password"] { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        .btn-login { width: 100%; background-color: #007bff; color: white; padding: 12px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold; }
        .btn-login:hover { background-color: #0056b3; }
        .links { text-align: center; margin-top: 15px; font-size: 14px; }
        .links a { color: #007bff; text-decoration: none; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form action="index.php?accion=login" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="pwd" placeholder="Contraseña" required>
            <label style="font-size: 14px;"><input type="checkbox" name="recordar"> Recordarme</label>
            <button type="submit" class="btn-login">Entrar</button>
        </form>
        <div class="links">
            ¿No tienes cuenta? <a href="index.php?accion=registro">Regístrate aquí</a>
        </div>
    </div>
</body>
</html>