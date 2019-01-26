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
        try {
            //var_dump($_POST['senha']);
            if(isset($_POST['user-prontuario'])){ $this->prontuario = $_POST['user-prontuario']; }

            // Essa linha que não funciona direito
            // preciso descobrir o porquê
            if(isset($_POST['user-senha'])){ $this->senha = filter_input( INPUT_POST, 'user-senha', FILTER_SANITIZE_SPECIAL_CHARS); }
        } catch (Exception $e) {
            echo "não deu certo";
        }
        

    }

    public function autenticar()
    {
        $user = new ClassLogin();
        $this->recuperaVar();
        var_dump($prontuario);
        var_dump($senha);
        $dados = $user->selecionaUsuario($this->prontuario);
        
        if ($senha == $dados[0]['senha']) {
            echo "estou dentro do if";
            //header('Location:'.DIRPAGE.'dashboard');
        }
        else {
            echo "estou dentro do else";
        }
    }
 
}

?>