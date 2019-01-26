<?php
namespace App\Model;

use App\Model\ClassConexao;

class ClassEndereco extends ClassConexao{

    private $Db;

    #Cadastrará os clientes no sistema
    protected function cadastrarEndereco($rua, $numero, $complemento, $bairro, $cidade, $cep, $estado)
    {
        $this->Db=$this->conexaoDB()->prepare("INSERT INTO endereco(end_rua, end_numero, end_complemento, end_bairro, end_cidade, end_cep, end_uf) VALUES (:rua, :numero, :complemento, :bairro, :cidade, :cep, :estado)");
        $this->Db->bindParam(":rua",$rua,\PDO::PARAM_STR);
        $this->Db->bindParam(":numero",$numero,\PDO::PARAM_STR);
        $this->Db->bindParam(":complemento",$complemento,\PDO::PARAM_STR);
        $this->Db->bindParam(":bairro",$bairro,\PDO::PARAM_STR);
        $this->Db->bindParam(":cidade",$cidade,\PDO::PARAM_STR);
        $this->Db->bindParam(":cep",$cep,\PDO::PARAM_STR);
        $this->Db->bindParam(":estado",$estado,\PDO::PARAM_STR);
        $this->Db->execute();
    }

    #Acesso ao banco de dados com seleção
    protected function selecionaendereco($rua, $numero, $complemento)
    {
        $BFetch=$this->Db=$this->conexaoDB()->prepare("select * from endereco where end_rua = :rua and numero = :numero and complemento like :complemento");
        $BFetch->bindParam(":rua",$rua,\PDO::PARAM_STR);
        $BFetch->bindParam(":numero",$numero,\PDO::PARAM_STR);
        $BFetch->bindParam(":complemento",$complemento,\PDO::PARAM_STR);
        $BFetch->execute();

        $I=0;
        while($Fetch=$BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$I]=['Id'=>$Fetch['end_codigo'],'Rua'=>$Fetch['end_rua'],'Numero'=>$Fetch['end_numero'],'Complemento'=>$Fetch['end_complemento'],'Bairro'=>$Fetch['end_bairro'],'Cidade'=>$Fetch['end_cidade'],'CEP'=>$Fetch['end_cep'],'UF'=>$Fetch['end_uf']];
            $I++;
        }
        return $Array;
    }

    // #Busca ID do Endereço
    // protected function selecionaendereco($rua, $numero, $complemento)
    // {
    //     $BFetch=$this->Db=$this->conexaoDB()->prepare("select * from endereco where end_rua = :rua and numero = :numero and complemento like :complemento");
    //     $BFetch->bindParam(":rua",$rua,\PDO::PARAM_STR);
    //     $BFetch->bindParam(":numero",$numero,\PDO::PARAM_STR);
    //     $BFetch->bindParam(":complemento",$complemento,\PDO::PARAM_STR);
    //     $BFetch->execute();

    //     $I=0;
    //     while($Fetch=$BFetch->fetch(\PDO::FETCH_ASSOC)){
    //         $Array[$I]=['Id'=>$Fetch['end_codigo'],'Rua'=>$Fetch['end_rua'],'Numero'=>$Fetch['end_numero'],'Complemento'=>$Fetch['end_complemento'],'Bairro'=>$Fetch['end_bairro'],'Cidade'=>$Fetch['end_cidade'],'CEP'=>$Fetch['end_cep'],'UF'=>$Fetch['end_uf']];
    //         $I++;
    //     }
    //     return $Array;
    // }

#Deletar direto no banco
protected function deletarClientes($Id)
{
    $BFetch=$this->Db=$this->conexaoDB()->prepare("delete from teste where Id=:id");
    $BFetch->bindParam(":id",$Id,\PDO::PARAM_INT);
    $BFetch->execute();
}
}
?>