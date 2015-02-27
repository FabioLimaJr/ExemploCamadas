<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aluno
 *
 * @author Daniele
 */
class Aluno extends Pessoa
{
   //chave estrangeira
   private $idProfessor;
   
   private $opiniao;
   
   public function getIdProfessor() {
       return $this->idProfessor;
   }

   public function setIdProfessor($idProfessor) {
       $this->idProfessor = $idProfessor;
   }

   
   public function getOpiniao() {
       return $this->opiniao;
   }

   public function setOpiniao($opiniao) {
       $this->opiniao = $opiniao;
   }


}

?>
