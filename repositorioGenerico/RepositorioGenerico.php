<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RepositorioGenerico
 *
 * @author Daniele
 */


class RepositorioGenerico extends Conexao implements IRepositorioGenerico{
    
    
    public function __construct() {
        parent::__construct();
    }
    
    public function alterar($objeto) {
        echo var_dump($objeto);
    }

    public function excluir($objeto) {
        
    }
    
    private function inserirPessoa($pessoa)
    {
        $sql = "INSERT INTO pessoa values(null,'";
        $sql .= $pessoa->getNome()."','";
        $sql .= $pessoa->getCpf()."')";

        if( mysqli_query($this->getConexao(), $sql))
        {return TRUE;}
        else
        {return FALSE;}
    }
    
    
    public function inserir($objeto) {
    
        $idReturn = -1;
        
        
        if($objeto==null)
        {
           throw new Exception('Impossível salvar o objeto \''.$objeto.'\'. Objeto nulo.\n');
        }
        else 
        {
                 $sql="use ".$this->getNomeBanco();
            
             if ($this->getConexao()->query($sql) === TRUE) 
             {
                 echo "Banco '".$this->getNomeBanco()."' foi selecionado\n";
                 
                if(is_subclass_of ($objeto ,"Pessoa"))
                {                  
                    if(get_class($objeto)=='Aluno'){
                        $id = $objeto->getIdProfessor();
                        $sql = "SELECT idProfessor FROM professor WHERE idProfessor = '$id'";
                        $result = mysqli_query($this->getConexao(), $sql);
                        
                        if(mysqli_num_rows($result) > 0 ){
                           
                      
                            if($this->inserirPessoa($objeto))
                            {
                                $id = mysqli_insert_id($this->getConexao());
                                $tableName = strtolower(get_class($objeto));
                                $idReturn = $id;   
                             
                                
                                $sql = "INSERT INTO ".$tableName." values('";
                                $sql.= $id."','";
                                $sql.= $objeto->getIdProfessor()."','";
                                $sql.= $objeto->getOpiniao()."')";
                              
                              
                              
                               
                              
                              if( mysqli_query($this->getConexao(), $sql))
                              {
                                  echo $sql."\n";
                                  return TRUE;
                              }
                              else 
                              {
                                  throw new Exception("Impossível salvar o objeto ".get_class($objeto).": ".mysqli_error($this->getConexao()));
                                 //todo: delete parent
                              }

                                
                            }
                            else
                            {
                                throw new Exception("Impossível salvar o objeto ".get_class($objeto).": ".  mysqli_error($this->getConexao()));
                            }
                        }
                        else
                        {
                            throw  new Exception("Impossível salvar Aluno. O professor não existe no banco");
                        }
                    }
                    
                    if(get_class($objeto)=='Professor'){
                        
                            
                            if($this->inserirPessoa($objeto))
                            {
                                $id = mysqli_insert_id($this->getConexao());
                                $tableName = strtolower(get_class($objeto));
                                $idReturn = $id;

                                // $sql = "INSERT INTO ".$tableName."(idProfessor, salario) values(".$id.",".$objeto->getSalario().")";
                                $sql = "INSERT INTO ".$tableName." values('";
                                $sql.= $id."','";
                                $sql.= $objeto->getSalario()."')";
                                     

                                     if( mysqli_query($this->getConexao(), $sql))
                                     {
                                         echo $sql."\n";
                                         return TRUE;
                                     }
                                     else 
                                     {
                                         throw new Exception("Impossível salvar o objeto ".get_class($objeto).": ".mysqli_error($this->getConexao()));
                                         //todo: delete parent
                                     }
                            }
                            else
                            {
                                throw new Exception("Impossível salvar o objeto ".get_class($objeto).": ".  mysqli_error($this->getConexao()));
                            }
                    } 
            
                }
                else
                {
                    //codigo para as classes que não tem herança
                }
             } 
             else 
             {
                throw new Exception ("Erro em selecionar o banco ".$this->getNomeBanco().": " . $this->getConexao()->error."\n");
             }
        }
        
        return $idReturn;
    }
    
    
    
}

?>
