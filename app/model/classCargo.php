<?php
    namespace App\Model;

    use App\Model\ClassConexao;

    class ClassCargo extends ClassConexao{

        private $Db;

        #Cadastro de um novo Cargo
        protected function cadastrarCargo($nome, $descricao)
        {
            $this->Db=$this->conexaoDB()->prepare("insert into cargo (crg_nome, crg_descricao) values (:nome, :descricao)");
            $this->Db->bindParam(":nome",$nome,\PDO::PARAM_STR);
            $this->Db->bindParam(":descricao",$descricao,\PDO::PARAM_STR);
            $this->Db->execute();
        }

        #Consulta dos cargos para tabela
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

        #Alteração de dados de um determinado Cargo
        protected function alterarCargo($Array)
        {
            $BFetch=$this->Db=$this->conexaoDB()->prepare("update cargo det crg_nome = :nome, crg_descricao = :descricao where crg_codigo = :id");
            $this->Db->bindParam(":id",$Array['id'],\PDO::PARAM_INT);
            $this->Db->bindParam(":nome",$Array['nome'],\PDO::PARAM_STR);
            $this->Db->bindParam(":descricao",$Array['descricao'],\PDO::PARAM_STR);
            $BFetch->execute();
        }

        #Deletar direto no banco
        protected function deletarCargos($id)
        {
            var_dump($id);
            $BFetch=$this->Db=$this->conexaoDB()->prepare("delete from cargos where (crg_codigo = :id)");
            $this->Db->bindParam(":id",$id,\PDO::PARAM_INT);
            $BFetch->execute();
            var_dump($BFetch);
        }
    }
?>