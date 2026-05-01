<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Series</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f9; color: #333; padding: 20px; }
        .container { max-width: 1000px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .btn-nuevo { background-color: #28a745; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; font-weight: bold; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #343a40; color: white; text-transform: uppercase; font-size: 14px; }
        
        .nota-alta { background-color: #d4edda !important; } 
        .nota-media { background-color: #fff3cd !important; }  
        .nota-baja { background-color: #f8d7da !important; }   
        
        .acciones a { text-decoration: none; padding: 5px 10px; border-radius: 4px; font-size: 13px; margin-right: 5px; color: white; }
        .btn-edit { background-color: #17a2b8; }
        .btn-borrar { background-color: #dc3545; }
        
        .form-votar { display: flex; gap: 5px; align-items: center; }
        select { padding: 4px; border-radius: 4px; border: 1px solid #ccc; }
        .btn-ok { background-color: #007bff; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer; }

        .navbar {
            background-color: #343a40;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .user-info {
            font-size: 14px;
        }

        .btn-logout {
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 13px;
            transition: background 0.3s;
        }

        .btn-logout:hover {
            background-color: #a71d2a;
        }
    </style>
</head>
<body>

<div class="container">
    <nav class="navbar">
    <div class="user-info">
        <?php if (isset($_SESSION['usuario_email'])): ?>
            Hola, <strong><?= $_SESSION['usuario_email'] ?></strong>
        <?php else: ?>
            <span>Bienvenido, <strong>Invitado</strong></span>
        <?php endif; ?>
    </div>

    <div>
        <?php if (isset($_SESSION['usuario_email'])): ?>
            <a href="index.php?accion=logout" class="btn-logout">Cerrar Sesión</a>
        <?php else: ?>
            <a href="index.php?accion=login" class="btn-login-nav">Iniciar Sesión</a>
        <?php endif; ?>
    </div>
    </nav>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Estreno</th>
                <th>Tipo</th>
                <th>Nota</th>
                <th>Dato Adicional  </th>
                <th>Votar</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($series as $s): 
                $n = $s->getNota();
                $clase_color = "";

                if ($n >= 8) { $clase_color = "nota-alta"; }
                elseif ($n >= 5) { $clase_color = "nota-media"; }
                elseif ($n > 0) { $clase_color = "nota-baja"; }
            ?>
            <tr class="<?= $clase_color ?>">
                <td><strong><?= $s->getTitulo() ?></strong></td>
                <td><?= $s->getEstreno() ?></td>
                <td><?= $s->getTipoClase() ?></td>
                <td style="font-size: 18px; font-weight: bold;"><?= $n ?></td> 
                <td>
            <?php 
        
                if ($s instanceof Drama) {
                    echo "Calificación: " . $s->getCalificacion();
                } elseif ($s instanceof Documental) {
                    echo "Narrador: " . $s->getNarrador();
                } elseif ($s instanceof Animada) {
                    echo "Estilo: " . $s->getEstilo();
                }
            ?>
                </td>
                <td>
                    <form action="index.php?accion=votar" method="POST" class="form-votar"> 
                        <input type="hidden" name="id" value="<?= $s->getId() ?>">
                        <select name="nota">
                            <?php for($i=1; $i<=10; $i++): ?>
                                <option value="<?= $i ?>" <?= ($i == (int)$n) ? 'selected' : '' ?>><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                        <button type="submit" class="btn-ok">Ok</button>
                    </form>
                </td>

                <td class="acciones">
                    <a href="index.php?accion=editar&id=<?= $s->getId() ?>" class="btn-edit">Editar</a>
                    <a href="index.php?accion=eliminar&id=<?= $s->getId() ?>" class="btn-borrar" onclick="return confirm('¿Borrar serie?')">Borrar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>