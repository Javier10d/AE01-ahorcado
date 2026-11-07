<?php
// Página que se muestra cuando el jugador se queda sin vidas
$palabra = isset($_GET['palabra']) ? htmlspecialchars($_GET['palabra']) : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Has perdido - Ahorcado</title>
    <link rel="stylesheet" href="resultado.css">
</head>
<body>
<main class="tarjeta perdido">
    <div class="icono">💀</div>
    <h1>Lo siento, has perdido</h1>
    <p class="mensaje">
        Te has quedado sin vidas. ¡No pasa nada, seguro que a la próxima lo consigues!
    </p>
    <?php if ($palabra != ''): ?>
        <p class="mensaje">La palabra secreta era:</p>
        <div class="palabra-final"><?php echo $palabra; ?></div><br>
    <?php endif; ?>
    <a class="boton" href="index.php">Jugar de nuevo</a>
</main>
</body>
</html>
