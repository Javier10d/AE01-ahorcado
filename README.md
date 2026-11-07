# Juego del Ahorcado 🎯

Versión en PHP del clásico juego del ahorcado, desarrollada para la actividad AE01 del módulo
**Despliegue de Aplicaciones Web** (2º DAW).

## Cómo se juega

1. Al abrir `index.php` se elige al azar un **animal** secreto. Cada letra aparece como una casilla vacía.
2. Escribe **una letra** en el recuadro y pulsa **Adivinar**.
3. Si la letra está en la palabra, aparece en todas las casillas donde se encuentra.
   Si no está, **pierdes una vida** (se apaga un corazón).
4. Empiezas con **6 vidas**. Las letras que ya has probado aparecen debajo:
   en verde si eran correctas y en rojo si no lo eran. Si repites una letra, el juego te avisa y no pierdes vida.
5. **Ganas** si descubres la palabra completa antes de quedarte sin vidas → se abre `ganado.php`.
6. **Pierdes** si llegas a 0 vidas → se abre `perdido.php`, donde se muestra la palabra secreta.
7. En ambas pantallas puedes pulsar **Jugar de nuevo** para empezar otra partida.

## Ficheros

| Fichero | Descripción |
|---|---|
| `index.php` | Lógica y pantalla principal del juego |
| `estilos.css` | Estilos de la pantalla de juego |
| `ganado.php` | Página de partida ganada |
| `perdido.php` | Página de partida perdida |
| `resultado.css` | Estilos de las páginas de fin de partida |

## Requisitos para ejecutarlo

- Un servidor web con **PHP 7.4 o superior** (Apache, Nginx + PHP-FPM, XAMPP…).
- En local, también sirve el servidor integrado de PHP:

```bash
php -S localhost:8000
```

y abrir <http://localhost:8000> en el navegador.
