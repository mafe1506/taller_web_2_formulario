<?php

$vista = isset($_GET['vista']) ? $_GET['vista'] : 'registro';


session_start();
$datos = isset($_SESSION['datos']) ? $_SESSION['datos'] : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Registro de Estudiantes</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="contenedor">
        <?php if ($vista === 'registro'): ?>
            <h1>Registro de Estudiantes</h1>
            <form action="procesar.php" method="POST">
                <label for="nombre">Nombre completo:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" min="10" max="100" required>

                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="curso">Curso de interés:</label>
                <select id="curso" name="curso" required>
                    <option value="">Seleccione...</option>
                    <option value="ciberseguridad">ciberseguridad</option>
                    <option value="software">software</option>
                    <option value="web">web</option>
                </select>

                <label for="genero">Género:</label>
                <input type="radio" id="masculino" name="genero" value="Masculino" required> Masculino
                <input type="radio" id="femenino" name="genero" value="Femenino" required> Femenino

                <label for="intereses">Áreas de interés:</label>
                <input type="checkbox" id="deportes" name="intereses[]" value="Deportes"> Deportes
                <input type="checkbox" id="arte" name="intereses[]" value="Arte"> Arte
                <input type="checkbox" id="musica" name="intereses[]" value="Música"> Música

                <button type="submit">Registrar</button>
            </form>
        <?php elseif ($vista === 'resultados' && $datos): ?>
            <h1>Resultados del Registro</h1>
            <p><strong>Nombre:</strong> <?= htmlspecialchars($datos['nombre']) ?></p>
            <p><strong>Edad:</strong> <?= htmlspecialchars($datos['edad']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($datos['email']) ?></p>
            <p><strong>Curso:</strong> <?= htmlspecialchars($datos['curso']) ?></p>
            <p><strong>Género:</strong> <?= htmlspecialchars($datos['genero']) ?></p>
            <p><strong>Intereses:</strong> <?= implode(', ', $datos['intereses']) ?></p>
            <a href="index.php?vista=registro">Nuevo registro</a>
        <?php else: ?>
            <h1>Error en el Registro</h1>
            <p>Por favor, complete todos los campos del formulario correctamente.</p>
            <a href="index.php?vista=registro">Intentar de nuevo</a>
        <?php endif; ?>
    </div>
</body>
</html>
