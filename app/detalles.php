<div>
<b> Detalles:</b><br>
<table>
<tr><td>Longitud:          </td><td><?= strlen($_REQUEST['comentario']) ?></td></tr>
<tr><td>Nº de palabras:    </td><td><?= NumPalabras($_REQUEST['comentario']) ?></td></tr>
<tr><td>Letra + repetida:  </td><td><?= letraMasRepetida($_REQUEST['comentario']) ?></td></tr>
<tr><td>Palabra + repetida:</td><td><?= palabraMasRepetida($_REQUEST['comentario']) ?></td></tr>
</table>
</div>

<?php
function NumPalabras($comentario) : string {
    htmlspecialchars($comentario);

    //Limpiar espacios al principio y al final del string
    $comentario = trim($comentario);

    //Remplazar múltiples espacios por solo 1 espacio
    $comentario = preg_replace('/\s\s+/', ' ', $comentario);

    //contar numero de ocurrecias de espacios
    $num = substr_count($comentario," ") + 1;
    
    return $num;
}

function letraMasRepetida($comentario) : string {
    htmlspecialchars($comentario);
    
    //eliminar todos los espacios
    $comentario = str_replace(" ","",$comentario);

    //Array de numero de ocurrencias por cada letra
    $aux = count_chars($comentario,1);
    arsort($aux);
    $letra = chr(array_key_first($aux));

    return $letra;
}

function palabraMasRepetida($comentario) : string {
    htmlspecialchars($comentario);

    $comentario = trim($comentario);
    $comentario = preg_replace('/\s\s+/', ' ', $comentario);

    //Convertir el string en array con el espacio de separador
    $comentario = explode(" ", $comentario);

    //Array que cuenta el numero de repeticiones de las palabras
    $comentario = array_count_values($comentario);
    arsort($comentario);

    $palabra = array_key_first($comentario);

    return $palabra;
}
?>

