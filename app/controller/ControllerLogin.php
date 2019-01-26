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
            if(isset($_POST['prontuario'])){ $this->prontuario = $_POST['prontuario']; }

            // Essa linha que não funciona direito
            // preciso descobrir o porquê
            if(isset($_POST['teste'])){ $this->senha = filter_input( INPUT_POST, 'teste', FILTER_SANITIZE_SPECIAL_CHARS); }
        } catch (Exception $e) {
            
        }
        

    }

    public function autenticar()
    {
        $user = new ClassLogin();
        $this->recuperaVar();
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