<?php
session_start();

// Lista de palabras para el juego
$palabras = ['elefante', 'jirafa', 'hipopotamo', 'rinoceronte', 'cocodrilo', 'camello', 'chimpance'];

// Inicializar el juego
if (!isset($_SESSION['palabra'])) {
    $_SESSION['palabra'] = $palabras[array_rand($palabras)];
    $_SESSION['vidas'] = 6; // Número máximo de vidas
    $_SESSION['letras_acertadas'] = str_repeat('?', strlen($_SESSION['palabra']));
    $_SESSION['letras_usadas'] = [];
}

// Procesar la letra enviada
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['letra'])) {
    $letra = strtolower($_POST['letra']);

    // Verificar si la letra ya se ha usado
    if (in_array($letra, $_SESSION['letras_usadas'])) {
        $aviso = "Ya has usado la letra '$letra'. Intenta con otra.";
    } else {
        // Añadir la letra a las usadas
        $_SESSION['letras_usadas'][] = $letra;

        // Verificar si la letra está en la palabra secreta
        if (strpos($_SESSION['palabra'], $letra) !== false) {
            for ($i = 0; $i < strlen($_SESSION['palabra']); $i++) {
                if ($_SESSION['palabra'][$i] == $letra) {
                    $_SESSION['letras_acertadas'][$i] = $letra;
                }
            }
        } else {
            $_SESSION['vidas']--;
        }
    }
}

// Comprobar si se ha ganado o perdido
if ($_SESSION['letras_acertadas'] == $_SESSION['palabra']) {
    echo "¡Enhorabuena! Has ganado :) La palabra era: " . $_SESSION['palabra'] . "<br>";
    session_destroy();
    echo '<a href="">Jugar de nuevo</a>';
    exit();
} elseif ($_SESSION['vidas'] <= 0) {
    echo "Lo siento, has perdido :( La palabra era: " . $_SESSION['palabra'] . "<br>";
    session_destroy();
    echo '<a href="">Jugar de nuevo</a>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahorcado</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<main class="tarjeta">
    <header class="cabecera">
        <h1>Juego del <span>Ahorcado</span></h1>
        <p class="subtitulo">Adivina el animal antes de quedarte sin vidas</p>
    </header>
    <?php if (isset($aviso)): ?>
        <p class="aviso"><?php echo $aviso; ?></p>
    <?php endif; ?>

    <!-- Palabra secreta: una casilla por letra -->
    <section class="palabra" aria-label="Palabra secreta">
        <?php foreach (str_split($_SESSION['letras_acertadas']) as $caracter): ?>
            <span class="casilla <?php echo $caracter != '?' ? 'acertada' : ''; ?>">
                <?php echo $caracter != '?' ? $caracter : ''; ?>
            </span>
        <?php endforeach; ?>
    </section>

    <!-- Vidas: un corazón por cada vida -->
    <section class="vidas">
        <?php for ($i = 0; $i < 6; $i++): ?>
            <span class="corazon <?php echo $i < $_SESSION['vidas'] ? '' : 'perdido'; ?>">&#10084;</span>
        <?php endfor; ?>
        <p>Vidas restantes: <strong><?php echo $_SESSION['vidas']; ?></strong></p>
    </section>

    <form method="post" class="formulario">
        <label for="letra">Introduce una letra:</label>
        <div class="fila">
            <input type="text" name="letra" id="letra" maxlength="1" required autofocus autocomplete="off">
            <button type="submit">Adivinar</button>
        </div>
    </form>

    <!-- Letras usadas como etiquetas -->
    <section class="letras-usadas">
        <h2>Letras usadas</h2>
        <div class="etiquetas">
            <?php if (empty($_SESSION['letras_usadas'])): ?>
                <span class="vacio">Todavía no has probado ninguna letra</span>
            <?php endif; ?>
            <?php foreach ($_SESSION['letras_usadas'] as $usada): ?>
                <span class="etiqueta <?php echo strpos($_SESSION['palabra'], $usada) !== false ? 'bien' : 'mal'; ?>">
                    <?php echo $usada; ?>
                </span>
            <?php endforeach; ?>
        </div>
    </section>
</main>
</body>
</html>
