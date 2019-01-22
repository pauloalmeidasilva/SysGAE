<?php
namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Classes\ClassSecurity;
use App\Model\ClassLogin;
use Src\Interfaces\InterfaceView;


class ControllerLogin extends ClassRender implements InterfaceView{

    protected $prontuario;
    protected $senha;
    protected $hash;

    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        if(count($this->parseUrl())==1) {
            $Render=new ClassRender();
            $this->setTitle("Página Inicial");
            $this->setDescription("Esse é o site do Sistema SysGAE");
            $this->setKeywords("sysgae, gerenciamento escolar, sistema");
            $this->setDir("login");
            $this->renderLayout();
        }
    }

    #Função responsável por recuperar os dados informados pelo usuário.
    private function recuperaVar()
    {
        if(isset($_POST['prontuario'])){ $this->prontuario = $_POST['prontuario']; }
        if(isset($_POST['senha'])){ $this->senha=filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS); }
    }

    public function autenticar()
    {
        $user = new ClassLogin();
        $this->recuperaVar();
        $dados = $user->selecionaUsuario($this->prontuario);
        
        if ($senha == $dados['fun_senha']) {
            header('Location:'.DIRPAGE.'dashboard');
        }
    }
 
}

?>