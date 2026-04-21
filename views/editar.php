<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>

    <form method="POST">
        NOMBRE:<br>
        <input type="text" name="nombre" value="<?= $criatura->getNombre() ?>" required><br><br>

        PS:<br>
        <input type="number" step="1" name="PS" value="<?= $criatura->getPS() ?>" required><br><br>

        DEFENSA:<br>
        <input type="number" step="1" name="defensa" value="<?= $criatura->getDefensa() ?>" required><br><br>

        ATAQUE:<br>
        <input type="number" step="1" name="ataque" value="<?= $criatura->getAtaque() ?>" required><br><br>
        <br>

        <button type="submit">Actualizar Pokémon</button>
    </form>

    <br>
    <a href="index.php">Volver</a>
</body>
</html>