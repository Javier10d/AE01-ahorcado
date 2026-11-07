<?php
// Página que se muestra cuando el jugador adivina la palabra
$palabra = isset($_GET['palabra']) ? htmlspecialchars($_GET['palabra']) : '';
$vidas = isset($_GET['vidas']) ? (int) $_GET['vidas'] : 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Has ganado! - Ahorcado</title>
    <link rel="stylesheet" href="resultado.css">
</head>
<body>
<main class="tarjeta ganado">
    <div class="icono">🏆</div>
    <h1>¡Enhorabuena, has ganado!</h1>
    <p class="mensaje">
        Has adivinado la palabra con <?php echo $vidas; ?>
        <?php echo $vidas == 1 ? 'vida' : 'vidas'; ?> de sobra.
    </p>
    <?php if ($palabra != ''): ?>
        <div class="palabra-final"><?php echo $palabra; ?></div><br>
    <?php endif; ?>
    <a class="boton" href="index.php">Jugar de nuevo</a>
</main>
</body>
</html>
