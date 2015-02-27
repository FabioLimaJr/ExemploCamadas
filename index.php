<?php

include('classesBasicas/Pessoa.php');
include('classesBasicas/Aluno.php'); 
include('classesBasicas/Professor.php');

 include ('conexao/Conexao.php');
 include('interfaceRepositorio/IRepositorioGenerico.php');
 include('repositorioGenerico/RepositorioGenerico.php');
 include('interfaceRepositorio/IRepositorioAluno.php');
 include('repositorio/RepositorioAluno.php');
 include('interfaceRepositorio/IRepositorioProfessor.php');
 include('repositorio/RepositorioProfessor.php');
 
 
 
 $professor = new Professor();
 $professor->setSalario(1500);
 $professor->setCpf('12345678912');
 $professor->setNome('Ricardo');
 
 $repositorioProfessor = new RepositorioProfessor();
 try {
   $id = $repositorioProfessor->inserir($professor);
} catch (Exception $exc) {
    echo $exc->getMessage();
}
 
 $aluno = new Aluno();
 $aluno->setIdProfessor($id);
 $aluno->setCpf('12379fj');
 $aluno->setNome('Marcos');
 $aluno->setOpiniao('teste opinião');
 
 $test = new RepositorioAluno();
 try
 {
   $test->inserir($aluno);
 }
 catch (Exception $e)
 {
     echo $e->getMessage();
 }
         
?>
