<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Professor
 *
 * @author Marcelo
 */
class Professor extends Pessoa{
    
    private $salario;
    
    function getSalario() {
        return $this->salario;
    }

    function setSalario($salario) {
        $this->salario = $salario;
    }
}
