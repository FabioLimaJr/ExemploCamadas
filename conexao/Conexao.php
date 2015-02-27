<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexao
 *
 * @author Daniele
 */



class Conexao {
 
 const nomeBanco = 'projeto';   
 const nomeServidor = 'localhost';
 const nomeUsuario = 'root';
 const senhaUsuario = '123456';

 
 public $conexao;
 public $nomeBanco;

 
 public function __construct() {
     
     $this->setNomeBanco();
     if(!$this->criarConexao())
     {
         throw  new Exception ('Impossível criar uma conexão com o banco de dados');
     }
 }

 public function getNomeBanco() {
     return $this->nomeBanco;
 }

 public function setNomeBanco() {
     $this->nomeBanco = self::nomeBanco;
 }

 
 public function getConexao() {
     return $this->conexao;
 }

 public function setConexao($conexao) {
     $this->conexao = $conexao;
 }


 private function criarConexao()
 {
   $this->setConexao(new mysqli(self::nomeServidor, self::nomeUsuario, self::senhaUsuario));
   if($this->getConexao()->connect_error)
   {
       return FALSE;
   }
   else 
   {
       return TRUE;    
   }
 }


}

?>
