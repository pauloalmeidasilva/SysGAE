<?php
    namespace App\Model;

    use App\Model\ClassConexao;

    class ClassCargo extends ClassConexao{

        private $Db;

        #Cadastrará os clientes no sistema
        protected function cadastrarCargo($nome, $descricao)
        {
            $this->Db=$this->conexaoDB()->prepare("INSERT INTO cargo (crg_nome, crg_descricao) VALUES (:nome, :descricao)");
            $this->Db->bindParam(":nome",$nome,\PDO::PARAM_STR);
            $this->Db->bindParam(":descricao",$descricao,\PDO::PARAM_STR);
            $this->Db->execute();
        }

        #Acesso ao banco de dados com seleção
        protected function listarCargos()
        {
            $Array = null;
            $BFetch=$this->Db=$this->conexaoDB()->prepare("select * from cargo");
            $BFetch->execute();

            $I=0;
            while($Fetch=$BFetch->fetch(\PDO::FETCH_ASSOC)){
                $Array[$I]=['Id'=>$Fetch['crg_codigo'],'Nome'=>$Fetch['crg_nome'],'Descricao'=>$Fetch['crg_descricao']];
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