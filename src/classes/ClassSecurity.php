<?php
namespace Src\Classes;


class ClassSecurity{

	#Método para gerar Hash
    public function geraHash($valor){
        //return password_hash($valor, PASSWORD_DEFAULT);
    	return md5(sha1(md5(sha1($valor))));
    }

    // #Método para gerar Hash
    // public function geraHash($valor){
    //     return password_hash($valor, PASSWORD_DEFAULT);
    // }

    // #Método para verificar Hash
    // public function verificaHash($valor, $hash){
    //     return password_verify($valor, $hash);
    // }

    #Método para criptografar
    public function encSenha($senha){
		
    	return base64_encode(base64_encode($senha));
    }

    #Método para criptografar
    public function decSenha($senha){

    	return base64_decode(base64_decode($senha));
    }
}

?>