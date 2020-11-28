<?php

namespace App\Services;


class Messages
{
    // Mensagem padrao de erro
    private static $errorCad = "Erro ao cadastrar! ";
    private static $sucessCad = "Cadastrado com sucesso! ";
    private static $errorUpdate = "Erro ao alterar! ";
    private static $sucessUpdate = "Alterado com sucesso! ";

    // Titulo padrao para paginas
    private static $titleAltClient = "Alterar Cliente."; // Nao alterar, este texto serve como base para o blede welcome definir qual form ultilizar
    private static $titleCadClient = "Cadastrar Cliente.";
    
    // Metodos para retornar as mensagens de erro
    public static function getMessageErrorCad(){
        return self::$errorCad;
    }
    public static function getMessageSucessCad(){
        return self::$sucessCad;
    }
    public static function getMessageErrorUpdate(){
        return self::$errorUpdate;
    }
    public static function getMessageSucessUpdate(){
        return self::$sucessUpdate;
    }

    // Metodos para retornar os titulos
    public static function getTitleAltClient(){
        return self::$titleAltClient;
    }
    public static function getTitleCadClient(){
        return self::$titleCadClient;
    }

}
