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
        $this->seleciona();
    }
    }

    #Função responsável por recuperar os dados informados pelo usuário.
    private function recuperaVar()
    {
        if(isset($_POST['codigo'])){ $this->id=$_POST['codigo']; }
        if(isset($_POST['nome'])){ $this->nome=filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS); }
        if(isset($_POST['descricao'])){ $this->descricao=filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS); }
    }

    #Chamar o método de cadastro da ClassCadastro
    public function cadastrar()
    {
        //$this->recuperaVar();
        $this->cadastrarCargo($_POST['nome'], $_POST['descricao']); //$this->nome, $this->descricao
        $_SESSION['aviso']="<div class='alert alert-success' role='alert' style='width: 300px; margin-left: auto; margin-right: auto; text-align: center;'>Cadastro realizado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        
        header('Location:'.DIRPAGE.'cargo');
    }

    #Selecionar e exibir os dados do banco de dados
    public function seleciona()
    {
        //$this->recVariaveis();
        $list=$this->listarCargos();



        $_SESSION['tabela'] = "<table class='table table-hover'><thead><tr><th scope='col'>ID</th><th scope='col'>Nome</th><th scope='col'>Ação</th></tr></thead>";
        
        foreach($list as $item){
            $_SESSION['tabela'] .= "<tbody><tr><th>$item[Id]</th><td>$item[Nome]</td><td>$item[Descricao]</td></tr>";
        }

        $_SESSION['tabela'] .= "</tbody></table>";

    }

#Deletar dados do DB
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