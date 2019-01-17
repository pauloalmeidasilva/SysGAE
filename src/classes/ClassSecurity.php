<?php
namespace Src\Classes;


class ClassSecurity{

    #Método para gerar Hash
    public function geraHash($valor){
        echo password_hash ($valor , PASSWORD_DEFAULT); 
    }
}

?>