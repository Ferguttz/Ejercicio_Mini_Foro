<?php

function usuarioOk($usuario, $contraseña) :bool {
   $verificar = false;

   if (comprobarUsuario($usuario)) {
      if ($contraseña == strrev($usuario)) {
         $verificar = true;
      }
   }


   return $verificar;  
}

function comprobarUsuario($usuario) : bool {
   $usuario = trim($usuario);
   return (strlen($usuario) >= 8);
}
?>