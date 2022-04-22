<?php

class Usuarios
{
    private $mysql;
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function adicionarusuario(  string $Nome, string $Email, string $Statuss, string $Senha) : void 
    {
        $insereUsuario = $this->mysql->prepare('INSERT INTO usuarios ( Nome, Email, Statuss, Senha) VALUES(?,?,?,?);');
        $insereUsuario->bind_param('ssss', $Nome, $Email, $Statuss, $Senha);
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