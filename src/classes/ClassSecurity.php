<?php
namespace Src\Classes;


class ClassSecurity{

	#Método para gerar Hash
    public function geraHash($valor){
    	return md5(sha1(md5(sha1($valor))));
    }

    #Método para criptografar
    public function encSenha($senha, $chave){
		/*
		# Esse método tem um erro de reconhecimento no valor do caracter ascii
		*/

    	$senhaCript = "";
    	$J = 0;

    	for ($I = 0; $I <= strlen($senha) - 1; $I++) {
    		if (ord($senha[$I]) == 32)
    			continue;
    		$senhaCript += chr((ord($senha[$I]) + ord($chave[$J]) - 2 * 65) % 26 + 65);
    		$J = ($J + 1) % strLen($chave);
    	}

    	return $senhaCript;
    }

    #Método para criptografar
    public function decSenha($senha, $chave){
    	/*
		# Esse método não foi testado ainda, talvez tenha o mesmo erro do
		# método encSenha()
		*/
		
    	$senhaDecript = "";
    	$J = 0;

    	for ($I = 0; $I < strlen($senha); $I++) {
    		$senhaDecript += ($senha[$I] - $chave[$J] + 26) % 26 + 65;
    		$J = ($J + 1) % strLen($chave);
    	}

    	return $senhaDecript;
    }
}

?>