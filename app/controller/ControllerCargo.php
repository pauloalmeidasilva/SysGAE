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
        if(isset($_POST['codigo-cargo'])){ $this->id=$_POST['codigo-cargo']; }
        if(isset($_POST['nome-cargo'])){ $this->nome=filter_input(INPUT_POST, 'nome-cargo', FILTER_SANITIZE_SPECIAL_CHARS); }
        if(isset($_POST['des-cargo'])){ $this->descricao=filter_input(INPUT_POST, 'des-cargo', FILTER_SANITIZE_SPECIAL_CHARS); }
    }

    //Chamar o método de cadastro da ClassCadastro
    public function cadastrar()
    {
        $this->recuperarVar();
        $this->cadastrarCargo($this->nome, $this->descricao);
        $_SESSION['aviso']="<div class='alert alert-success' role='alert' style='width: 300px; margin-left: auto; margin-right: auto; text-align: center;'>Cadastro realizado com sucesso! <a href=".DIRPAGE."cargo>Clique aqui</a> para atualizar a página.</div>";
        
        header('Location:'.DIRPAGE.'cargo');
    }

    //Selecionar e exibir os dados do banco de dados
    public function selecionar()
    {
        $list=$this->listarCargos();

        if (!is_null($list)) {
            $_SESSION['tabela'] = "<table class='table table-hover'><thead><tr><th scope='col'>ID</th><th scope='col'>Nome</th><th scope='col'>Ação</th></tr></thead>";            
            
            foreach($list as $item){
                $_SESSION['tabela'] .= "<tbody><tr><th>$item[Id]</th><td>$item[Nome]</td><td><button type='button' id='cst$item[Id]' class='btn btn-info btn-sm' data-toggle='modal' data-target='#visualizar' data-nome='$item[Nome]' data-descricao='$item[Descricao]' onclick='consultarCargo($item[Id])'><i class='fas fa-search'></i></button>";

                $_SESSION['tabela'] .= "<button type='button' id='alt$item[Id]' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#alterar' data-nome='$item[Nome]' data-descricao='$item[Descricao]' onclick='alterarCargo($item[Id])'><i class='fas fa-edit'></i></button>";

                $_SESSION['tabela'] .= "<button type='button' id='del$item[Id]' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#delete' data-nome='$item[Nome]' onclick='deletarCargo($item[Id])'><i class='fas fa-trash-alt'></i></button></td></tr>";
            }

            $_SESSION['tabela'] .= "</tbody></table>";
        }
        else {
            $_SESSION['tabela'] = "<div class='alert alert-danger text-center' role='alert'>Nenhum cargo encontrado</div>";
        }
    }

    //Chamar o método de cadastro da ClassCadastro
    public function alterar()
    {
        $this->recuperarVar();

        $array = array('id'  => $id, 'nome' => $nome, 'descricao' => $descricao);

        $this->alterarCargo($array);
        $_SESSION['aviso']="<div class='alert alert-success' role='alert' style='width: 300px; margin-left: auto; margin-right: auto; text-align: center;'>Cadastro realizado com sucesso! <a href=".DIRPAGE."cargo>Clique aqui</a> para atualizar a página.</div>";
        
        header('Location:'.DIRPAGE.'cargo');
    }

    //Deletar dados do DB
    public function deletar()
    {
        // Está com problemas de guardar o valor do post na variável id
        //$this->recuperarVar();
        var_dump($_POST['codigo-cargo']);
        $this->deletarCargos($_POST['codigo-cargo']); //$id

        $_SESSION['aviso']="<div class='alert alert-success' role='alert' style='width: 300px; margin-left: auto; margin-right: auto; text-align: center;'>Cargo excluído com sucesso! <a href=".DIRPAGE."cargo>Clique aqui</a> para atualizar a página.</div>";

        //header('Location:'.DIRPAGE.'cargo');
    }
}
?>