<?php
include ('../Modelo/Usuario.php');

interface UsuarioDAO
{
    public function guardaUsuario(Usuario $usuario);

    public function borrarUsuario($usuario);

    public function login($usuario,$pass);
}