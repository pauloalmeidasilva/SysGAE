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
        if(isset($_POST['codigo-cargo'])){ $this->id=filter_input( INPUT_POST, 'codigo-cargo', FILTER_SANITIZE_NUMBER_INT); }
        if(isset($_POST['nome-cargo'])){ $this->nome=filter_input(INPUT_POST, 'nome-cargo', FILTER_SANITIZE_STRING); }
        if(isset($_POST['desc-cargo'])){ $this->descricao=filter_input(INPUT_POST, 'desc-cargo', FILTER_SANITIZE_STRING); }
    }

    //Chamar o método de cadastro da ClassCadastro
    public function cadastrar()
    {
        $this->recuperarVar();
        $this->cadastrarCargo($this->nome, $this->descricao);
        echo "<div class='col-sm-10 offset-sm-2'><div class='alert alert-success' role='alert' style='width: 300px; margin-left: auto; margin-right: auto; text-align: center;'>Cadastro realizado com sucesso! <a href=".DIRPAGE."cargo>Clique aqui</a> para atualizar a página.</div></div>";
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
            $tabela = "<div class='col-sm-10 offset-sm-2'><div class='container'><table class='table table-sm table-hover'><thead class='thead-light'><tr><th class='text-center' scope='col' style='width:10%'>ID</th><th class='text-left' scope='col' style='width:70%'>Nome</th><th class='text-center' scope='col' style='width:40%'>Ação</th></tr></thead>";            
            
            foreach($list as $item){
                $tabela .= "<tbody><tr><th class='text-center' scope='row' >$item[Id]</th><td>$item[Nome]</td><td class='text-center'><button type='button' id='cst$item[Id]' class='btn btn-info btn-sm' data-toggle='modal' data-target='#visualizar' data-nome='$item[Nome]' data-descricao='$item[Descricao]' onclick='consultarCargo($item[Id])'><i class='fas fa-search'></i></button>";

                $tabela .= "<button type='button' id='alt$item[Id]' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#alterar' data-nome='$item[Nome]' data-descricao='$item[Descricao]' onclick='alterarCargo($item[Id])'><i class='fas fa-edit'></i></button>";

                $tabela .= "<button type='button' id='del$item[Id]' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#delete' data-nome='$item[Nome]' onclick='deletarCargo($item[Id])'><i class='fas fa-trash-alt'></i></button></td></tr>";
            }

            $tabela .= "</tbody></table><br>";

            $tabela .= $paginacao->gerarPaginacao($pagina, ceil($totalreg/$registro), $caminho);

            $tabela .= "</div></div>";

            echo $tabela;
        }
        else {
            ECHO "<div class='col-sm-10 offset-sm-2'><div class='alert alert-danger text-center' role='alert' style='width: 300px; margin-left: auto; margin-right: auto; text-align: center;'>Nenhum cargo encontrado</div></div>";
        }
    }

    //Chamar o método de cadastro da ClassCadastro
    public function alterar()
    {
        $this->recuperarVar();

        $array = array('id'  => $this->id, 'nome' => $this->nome, 'descricao' => $this->descricao);

        $this->alterarCargo($array);
        echo "<div class='col-sm-10 offset-sm-2'><div class='alert alert-success' role='alert' style='width: 300px; margin-left: auto; margin-right: auto; text-align: center;'>Cargo alterado com sucesso! <a href=".DIRPAGE."cargo>Clique aqui</a> para atualizar a página.</div></div>";
    }

    //Deletar dados do DB
    public function deletar()
    {
        $this->recuperarVar();
        $this->deletarCargos($this->id);

        echo "<div class='col-sm-10 offset-sm-2'><div class='alert alert-success' role='alert' style='width: 300px; margin-left: auto; margin-right: auto; text-align: center;'>Cargo excluído com sucesso! <a href=".DIRPAGE."cargo>Clique aqui</a> para atualizar a página.</div></div>";
    }
}
?>