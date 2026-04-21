<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listado de Pokemons</h1>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>PS</th>
                <th>Defensa</th>
                <th>Ataque</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pokemons as $p): ?>
            <tr>
                <td><?= $p->getNombre() ?></td>
                <td><?= ($p instanceof Agua) ? "Agua" : (( $p instanceof Fuego) ? "Fuego" : "Planta")?></td>
                <td><?= $p->getPS() ?></td>
                <td><?= $p->getDefensa() ?></td>
                <td><?= $p->getAtaque() ?></td>
                <td><a href="index.php?accion=editar&id=<?= $p->getId() ?>">Editar</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
</body>
</html>