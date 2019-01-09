<?php
namespace App\Controller;

use Src\Classes\ClassRender;
use App\Model\ClassTurma;

class ControllerTurma extends ClassTurma{

    protected $id;
    protected $nome;
    protected $endereco;
    protected $bairro;
    protected $cidade;
    protected $estado;
    protected $telefone;
    protected $email;

    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        if(count($this->parseUrl())==1) {
        $Render=new ClassRender();
        $Render->setTitle("Turma");
        $Render->setDescription("Cadastre suas turmas.");
        $Render->setKeywords("cadastro de turmas, cadastro, escolas");
        $Render->setDir("turma");
        $Render->renderLayout();
    }
    }

    #Função responsável por recuperar os dados informados pelo usuário.
    private function recuperaVar()
    {
        if(isset($_POST['id'])){ $this->Id=$_POST['Id']; }
        if(isset($_POST['nome'])){ $this->Nome=filter_input(INPUT_POST, 'Nome', FILTER_SANITIZE_SPECIAL_CHARS); }
        if(isset($_POST['endereco'])){ $this->endereco=filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS); }
        if(isset($_POST['bairro'])){ $this->bairro=filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS); }
        if(isset($_POST['cidade'])){ $this->cidade=filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS); }
        if(isset($_POST['estado'])){ $this->estado=filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS); }
        if(isset($_POST['telefone'])){ $this->telefone=filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS); }
        if(isset($_POST['email'])){ $this->email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS); }
    }

    #Chamar o método de cadastro da ClassCadastro
    public function cadastrar()
    {
        $this->recVariaveis();
        $this->cadastrarEscola($this->nome, $this->endereco, $this->bairro, $this->cidade, $this->estado, $this->telefone, $this->email);
        echo "<div class='alert alert-success' role='alert' style='width: 300px; margin-left: auto; margin-right: auto; text-align: center;'>Cadastro realizado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    }

    #Selecionar e exibir os dados do banco de dados
    public function seleciona()
{
    $this->recVariaveis();
    $B=$this->selecionaClientes($this->Nome, $this->Sexo,$this->Cidade);

    echo "
        <table border='1'>
            <tr>
                <td>Nome</td>
                <td>Sexo</td>
                <td>Cidade</td>
            </tr>
            ";
            foreach($B as $C){
            echo "
            <tr>
                <td>$C[Nome]</td>
                <td>$C[Sexo]</td>
                <td>$C[Cidade]</td>
            </tr>
            ";
            }
            echo "
        </table>
    ";
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