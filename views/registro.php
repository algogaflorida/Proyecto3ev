<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Mis Series</title>
    <style>
        body { 
            font-family: 'Segoe UI', sans-serif; 
            background-color: #f4f4f9; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
        }
        .register-card { 
            background: white; 
            padding: 40px; 
            border-radius: 10px; 
            box-shadow: 0 4px 20px rgba(0,0,0,0.1); 
            width: 100%;
            max-width: 400px; 
        }
        h2 { 
            text-align: center; 
            color: #333; 
            margin-bottom: 30px; 
            border-bottom: 2px solid #28a745;
            padding-bottom: 10px;
        }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; color: #555; }
        input { 
            width: 100%; 
            padding: 12px; 
            border: 1px solid #ddd; 
            border-radius: 6px; 
            box-sizing: border-box; 
            font-size: 16px;
        }
        .btn-register { 
            width: 100%; 
            background-color: #28a745; 
            color: white; 
            padding: 12px; 
            border: none; 
            border-radius: 6px; 
            cursor: pointer; 
            font-size: 16px; 
            font-weight: bold; 
            transition: background 0.3s;
        }
        .btn-register:hover { background-color: #218838; }
        .footer-links { 
            text-align: center; 
            margin-top: 20px; 
            font-size: 14px; 
            color: #666;
        }
        .footer-links a { color: #007bff; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

<div class="register-card">
    <h2>Crear Cuenta</h2>
    
    <form action="index.php?accion=registro" method="POST">
        <div class="form-group">

        <div class="form-group">
            <label>Correo Electrónico</label>
            <input type="email" name="email" placeholder="ejemplo@correo.com" required>
        </div>

        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="pwd" placeholder="Mínimo 6 caracteres" required>
        </div>

        <button type="submit" class="btn-register">Registrarme ahora</button>
    </form>

    <div class="footer-links">
        ¿Ya tienes cuenta? <a href="index.php?accion=login">Inicia sesión aquí</a>
    </div>
</div>

</body>
</html>