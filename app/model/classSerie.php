<?php
namespace App\Model;

use App\Model\ClassConexao;

class ClassSerie extends ClassConexao{

    private $Db;

    #Cadastrará os clientes no sistema
    protected function cadastrarEscola($nome, $endereco, $bairro, $cidade, $estado, $telefone, $email)
    {
        $this->Db=$this->conexaoDB()->prepare("INSERT INTO escola (esc_nome, esc_rua, esc_bairro, esc_cidade, esc_uf, esc_telefone, esc_email) VALUES (:nome, :endereco, :bairro, :cidade, :estado, :telefone, :email)");
        $this->Db->bindParam(":nome",$nome,\PDO::PARAM_STR);
        $this->Db->bindParam(":endereco",$endereco,\PDO::PARAM_STR);
        $this->Db->bindParam(":bairro",$bairro,\PDO::PARAM_STR);
        $this->Db->bindParam(":cidade",$Cidade,\PDO::PARAM_STR);
        $this->Db->bindParam(":estado",$estado,\PDO::PARAM_STR);
        $this->Db->bindParam(":telefone",$telefone,\PDO::PARAM_STR);
        $this->Db->bindParam(":email",$email,\PDO::PARAM_STR);
        $this->Db->execute();
    }

    #Acesso ao banco de dados com seleção
protected function selecionaClientes($Nome , $Sexo , $Cidade)
{
    $Nome='%'.$Nome.'%';
    $Sexo='%'.$Sexo.'%';
    $Cidade='%'.$Cidade.'%';
    $BFetch=$this->Db=$this->conexaoDB()->prepare("select * from teste where Nome like :nome and Sexo like :sexo and Cidade like :cidade");
    $BFetch->bindParam(":nome",$Nome,\PDO::PARAM_STR);
    $BFetch->bindParam(":sexo",$Sexo,\PDO::PARAM_STR);
    $BFetch->bindParam(":cidade",$Cidade,\PDO::PARAM_STR);
    $BFetch->execute();

    $I=0;
    while($Fetch=$BFetch->fetch(\PDO::FETCH_ASSOC)){
        $Array[$I]=['Id'=>$Fetch['Id'],'Nome'=>$Fetch['Nome'],'Sexo'=>$Fetch['Sexo'],'Cidade'=>$Fetch['Cidade']];
        $I++;
    }
    return $Array;
}

#Deletar direto no banco
protected function deletarClientes($Id)
{
    $BFetch=$this->Db=$this->conexaoDB()->prepare("delete from teste where Id=:id");
    $BFetch->bindParam(":id",$Id,\PDO::PARAM_INT);
    $BFetch->execute();
}
}
?>