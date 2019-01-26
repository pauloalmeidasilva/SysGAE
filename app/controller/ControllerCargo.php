<?php
namespace App\Controller;

use Src\Classes\ClassRender;
use App\Model\ClassCargo;

class ControllerCargo extends ClassCargo{

    protected $id;
    protected $nome;
    protected $descricao;

    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        session_start();
        if(count($this->parseUrl())==1) {
            $Render=new ClassRender();
            $Render->setTitle("Cargos");
            $Render->setDescription("Cadastre seus cargos.");
            $Render->setKeywords("cadastro de cargos, cadastro, escolas");
            $Render->setDir("cargo");
            $Render->renderLayout();
        }
        $this->selecionar();
    }

    //Função responsável por recuperar os dados informados pelo usuário.
    private function recuperarVar()
    {
        if(isset($_POST['codigo'])){ $this->id=$_POST['codigo']; }
        if(isset($_POST['nome-cargo'])){ $this->nome=filter_input(INPUT_POST, 'nome-cargo', FILTER_SANITIZE_SPECIAL_CHARS); }
        if(isset($_POST['des-cargo'])){ $this->descricao=filter_input(INPUT_POST, 'des-cargo', FILTER_SANITIZE_SPECIAL_CHARS); }
    }

    //Chamar o método de cadastro da ClassCadastro
    public function cadastrar()
    {
        $this->recuperarVar();
        $this->cadastrarCargo($this->nome, $this->descricao); //$this->nome, $this->descricao
        $_SESSION['aviso']="<div class='alert alert-success' role='alert' style='width: 300px; margin-left: auto; margin-right: auto; text-align: center;'>Cadastro realizado com sucesso! <a href=".DIRPAGE."cargo>Clique aqui</a> para atualizar a página.</div>";
        
        header('Location:'.DIRPAGE.'cargo');
    }

    //Selecionar e exibir os dados do banco de dados
    public function selecionar()
    {
        $list=$this->listarCargos();
        var_dump(is_null($list));

        if (!is_null($list)) {
            $_SESSION['tabela'] = "<table class='table table-hover'><thead><tr><th scope='col'>ID</th><th scope='col'>Nome</th><th scope='col'>Ação</th></tr></thead>";            
            
            foreach($list as $item){
                $_SESSION['tabela'] .= "<tbody><tr><th>$item[Id]</th><td>$item[Nome]</td><td><button type='button' class='btn btn-info btn-sm'><i class='fas fa-search'></i></button> <button type='button' class='btn btn-warning btn-sm'><i class='fas fa-edit'></i></button> <button type='button' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button></td></tr>";
            }

            $_SESSION['tabela'] .= "</tbody></table>";
        }
        else {
            $_SESSION['tabela'] = "<div class='alert alert-danger text-center' role='alert'>Nenhum cargo encontrado</div>";
        }
    }

    //Deletar dados do DB
    public function deletar()
    {
        $this->recVariaveis();
        foreach($this->Id as $IdDeletar)
        {
            $this->deletarClientes($IdDeletar);
        }
    }
}
?>