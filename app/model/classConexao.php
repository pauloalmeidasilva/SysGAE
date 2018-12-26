<?php
	namespace App\Model;

	abstract class ClassConexao{
    	#Realiza a conexao com o banco de dados
    	public function conexaoDB()
    	{
        	try{
        	    $Con=new \PDO("mysql:host=".HOST.";dbname=".DB."","".USER."","".PASS."");
        	    return $Con;
        	}catch (\PDOException $Erro){
        	    return $Erro->getMessage();
        	}
    	}
	}
?>