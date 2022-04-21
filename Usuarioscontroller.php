<?php

class Usuarios
{
    private $mysql;
    public function __construtct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function adicionarusuario(string $Nome, string $Email, string $Status) : void 
    {
        $insereUsuario = $this->mysql->prepare('INSERT INTO usuarios (Nome, Email, Status) VALUES(?,?);');
        $insereUsuario->bind_param('sss', $Nome, $Email, $Status);
        $insereUsuario->execute();
    }

    public function exibirTodos(): array
    {

        $resultado = $this->mysql->query('SELECT ID, Nome, Email FROM usuarios');   
             
        $usuarios = $resultado->fetch_all(MYSQLI_ASSOC);

        return $usuarios;

    }

    public function encontrarPorId(string $id) : array
    {
        $selecionaUsuario = $this->mysql->prepare("SELECT ID, Nome, Email FROM usuarios WHERE id= ?");
        $selecionaUsuario->bind_param('s', $id);
        $selecionaUsuario->execute();
        $usuario = $selecionaUsuario->get_result()->fetch_assoc();
        return $usuario;
    }


    
}