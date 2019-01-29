<?php
namespace App\Controller;

use Src\Classes\ClassRender;
use App\Model\ClassCargo;
use Src\Classes\ClassPagination;

class ControllerCargo extends ClassCargo {

    protected $id;
    protected $nome;
    protected $descricao;

    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        session_start();
        $Render=new ClassRender();
        if(count($this->parseUrl())==1) {
            $Render->setTitle("Cargos");
            $Render->setDescription("Cadastre seus cargos.");
            $Render->setKeywords("cadastro de cargos, cadastro, escolas");
            $Render->setDir("cargo");
            $Render->renderLayout();
            $this->selecionar();
        }
        $Render->setDir("cargo");
        $Render->renderLayout();
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
    }

    //Selecionar e exibir os dados do banco de dados
    public function selecionar($pagina = 1)
    {
        $registro = 5;
        $paginacao = new ClassPagination();
        $reginicial = ($registro * $pagina) - $registro;
        $caminho = DIRPAGE.'cargo/selecionar';

        $list=$this->listarCargos($reginicial, $registro);
        $totalreg=$this->contarCargos();

        if (!is_null($list)) {
            $_SESSION['tabela'] = "<table class='table table-sm table-hover'><thead class='thead-light'><tr><th class='text-center' scope='col' style='width:10%'>ID</th><th class='text-left' scope='col' style='width:70%'>Nome</th><th class='text-center' scope='col' style='width:40%'>Ação</th></tr></thead>";            
            
            foreach($list as $item){
                $_SESSION['tabela'] .= "<tbody><tr><th class='text-center' scope='row' >$item[Id]</th><td>$item[Nome]</td><td class='text-center'><button type='button' id='cst$item[Id]' class='btn btn-info btn-sm' data-toggle='modal' data-target='#visualizar' data-nome='$item[Nome]' data-descricao='$item[Descricao]' onclick='consultarCargo($item[Id])'><i class='fas fa-search'></i></button>";

                $_SESSION['tabela'] .= "<button type='button' id='alt$item[Id]' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#alterar' data-nome='$item[Nome]' data-descricao='$item[Descricao]' onclick='alterarCargo($item[Id])'><i class='fas fa-edit'></i></button>";

                $_SESSION['tabela'] .= "<button type='button' id='del$item[Id]' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#delete' data-nome='$item[Nome]' onclick='deletarCargo($item[Id])'><i class='fas fa-trash-alt'></i></button></td></tr>";
            }

            $_SESSION['tabela'] .= "</tbody></table>";

            $_SESSION['paginacao'] = $paginacao->gerarPaginacao($pagina, ceil($totalreg/$registro), $caminho);
            //var_dump($_SESSION['paginacao']);
        }
        else {
            $_SESSION['tabela'] = "<div class='alert alert-danger text-center' role='alert'>Nenhum cargo encontrado</div>";
        }
    }

    //Chamar o método de cadastro da ClassCadastro
    public function alterar()
    {
        $this->recuperarVar();

        $array = array('id'  => $this->id, 'nome' => $this->nome, 'descricao' => $this->descricao);

        $this->alterarCargo($array);
        $_SESSION['aviso']="<div class='alert alert-success' role='alert' style='width: 300px; margin-left: auto; margin-right: auto; text-align: center;'>Cadastro realizado com sucesso! <a href=".DIRPAGE."cargo>Clique aqui</a> para atualizar a página.</div>";
    }

    //Deletar dados do DB
    public function deletar()
    {
        $this->recuperarVar();
        $this->deletarCargos($this->id);

        $_SESSION['aviso']="<div class='alert alert-success' role='alert' style='width: 300px; margin-left: auto; margin-right: auto; text-align: center;'>Cargo excluído com sucesso! <a href=".DIRPAGE."cargo>Clique aqui</a> para atualizar a página.</div>";

        //header('Location:'.DIRPAGE.'cargo');
    }
}
?>