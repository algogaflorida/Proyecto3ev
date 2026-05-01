<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Serie</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f4f9; padding: 40px; }
        .form-container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px; margin-bottom: 20px; }
        .group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        .btn-save { background-color: #28a745; color: white; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold; width: 100%; }
        .btn-cancel { display: block; text-align: center; margin-top: 15px; color: #666; text-decoration: none; font-size: 14px; }
        .info-box { background-color: #e7f3ff; padding: 10px; border-radius: 5px; border-left: 4px solid #007bff; margin-bottom: 20px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2><?= isset($serie) ? "Editar Serie" : "Nueva Serie" ?></h2>
        
        <form action="index.php?accion=<?= isset($serie) ? 'editar' : 'crear' ?>" method="POST">
            <?php if(isset($serie)): ?>
                <input type="hidden" name="id" value="<?= $serie->getId() ?>">
            <?php endif; ?>

            <div class="group">
                <label>Título de la Serie</label>
                <input type="text" name="titulo" value="<?= isset($serie) ? $serie->getTitulo() : '' ?>" required>
            </div>

            <div class="group">
                <label>Año de Estreno</label>
                <input type="number" name="estreno" value="<?= isset($serie) ? $serie->getEstreno() : '' ?>" required>
            </div>

            <div class="group">
                <label>Género</label>
                <input type="text" name="genero" value="<?= isset($serie) ? $serie->getGenero() : '' ?>">
            </div>

            <?php if(!isset($serie)): ?>
                <div class="group">
                    <label>Tipo de Serie</label>
                    <select name="tipo_clase">
                        <option value="Drama">Drama</option>
                        <option value="Documental">Documental</option>
                        <option value="Animada">Animada</option>
                    </select>
                </div>
            <?php else: ?>
                <div class="info-box">
                    Tipo: <strong><?= $serie->getTipoClase() ?></strong> (No se puede cambiar)
                </div>
            <?php endif; ?>

            <div class="group">
                <label>Campo Específico (Calificación / Narrador / Estilo)</label>
                <?php 
                    $val = "";
                    if(isset($serie)) {
                        if ($serie instanceof Drama) $val = $serie->getCalificacion();
                        elseif ($serie instanceof Documental) $val = $serie->getNarrador();
                        else $val = $serie->getEstilo();
                    }
                ?>
                <input type="text" name="<?= isset($serie) ? ( ($serie instanceof Drama) ? 'calificacion_edad' : (($serie instanceof Documental) ? 'narrador' : 'estilo') ) : 'distintivo' ?>" value="<?= $val ?>">
            </div>

            <button type="submit" class="btn-save">Guardar Serie</button>
            <a href="index.php?accion=listar" class="btn-cancel">Cancelar y volver</a>
        </form>
    </div>
</body>
</html>