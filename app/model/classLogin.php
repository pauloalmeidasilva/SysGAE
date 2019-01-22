<?php
namespace App\Model;

use App\Model\ClassConexao;

class ClassLogin extends ClassConexao{

    private $Db;

    #Retorna o Usuário e senha
public function selecionaUsuario($Prontuario)
{
    $Array;
    $BFetch=$this->Db=$this->conexaoDB()->prepare("select * from funcionario where fun_codigo = :prontuario");
    $BFetch->bindParam(":prontuario",$Prontuario,\PDO::PARAM_STR);
    $BFetch->execute();

    $I=0;
    while($Fetch=$BFetch->fetch(\PDO::FETCH_ASSOC)){
        $Array[$I]=[
            'nome'=>$Fetch['fun_nome'],
            'nascimento'=>$Fetch['fun_nascimento'],
            'sexo'=>$Fetch['fun_sexo'],
            'certidao'=>$Fetch['fun_certidao'],
            'rg'=>$Fetch['fun_rg'],
            'cpf'=>$Fetch['fun_cpf'],
            'mae'=>$Fetch['fun_mae'],
            'pai'=>$Fetch['fun_pai'],
            'telefone'=>$Fetch['fun_telefone'],
            'email'=>$Fetch['fun_email'],
            'senha'=>$Fetch['fun_senha']
        ];
        $I++;
    }
    return $Array;
}

}
?>