<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Serie</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f4f9; padding: 40px; margin: 0; }
        .form-container { max-width: 500px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #333; margin-top: 0; border-bottom: 2px solid #17a2b8; padding-bottom: 10px; }
        .group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        .btn-edit { background-color: #17a2b8; color: white; padding: 12px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold; width: 100%; }
        .btn-cancel { display: block; text-align: center; margin-top: 15px; color: #666; text-decoration: none; }
        .tipo-bloqueado { background-color: #eee; color: #888; font-style: italic; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Editar: <?= $serie->getTitulo() ?></h2>
        <form action="index.php?accion=editar" method="POST">
            <input type="hidden" name="id" value="<?= $serie->getId() ?>">

            <div class="group">
                <label>Título</label>
                <input type="text" name="titulo" value="<?= $serie->getTitulo() ?>" required>
            </div>
            <div class="group">
                <label>Año de Estreno</label>
                <input type="number" name="estreno" value="<?= $serie->getEstreno() ?>" required>
            </div>
            <div class="group">
                <label>Género</label>
                <input type="text" name="genero" value="<?= $serie->getGenero() ?>">
            </div>

            <div class="tipo-bloqueado">
                Tipo actual: <strong><?= $serie->getTipoClase() ?></strong>
            </div>

            <div class="group">
                <label>Dato específico</label>
                <?php 
                    $nombre_campo = "";
                    $valor = "";
                    if ($serie instanceof Drama) {
                        $nombre_campo = "calificacion_edad";
                        $valor = $serie->getCalificacion();
                    } elseif ($serie instanceof Documental) {
                        $nombre_campo = "narrador";
                        $valor = $serie->getNarrador();
                    } else {
                        $nombre_campo = "estilo";
                        $valor = $serie->getEstilo();
                    }
                ?>
                <input type="text" name="<?= $nombre_campo ?>" value="<?= $valor ?>">
            </div>

            <button type="submit" class="btn-edit">Actualizar Serie</button>
            <a href="index.php" class="btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>