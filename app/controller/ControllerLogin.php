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
            if(isset($_POST['user-prontuario'])){ $this->prontuario = filter_input( INPUT_POST, 'user-prontuario', FILTER_SANITIZE_NUMBER_INT); }

            if(isset($_POST['user-senha'])){ $this->senha = filter_input( INPUT_POST, 'user-senha', FILTER_SANITIZE_STRING); }

    }

    public function autenticar()
    {
        $user = new ClassLogin();
        $this->recuperaVar();
        $dados = $user->selecionaUsuario($this->prontuario);
        var_dump($this->prontuario);
        var_dump($this->senha);
        var_dump($dados);

        
        if ($this->senha == $dados[0]['senha']) {
            echo "estou dentro do if";
            //header('Location:'.DIRPAGE.'dashboard');
        }
        else {
            echo "estou dentro do else";
        }
    }
 
}

?>