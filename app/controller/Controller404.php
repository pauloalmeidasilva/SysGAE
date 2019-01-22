<?php

namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class Controller404 extends ClassRender implements InterfaceView{
    public function __construct()
    {
        $this->setTitle("Página não Encontrada!");
        $this->setDescription("Caso esta página tenha sido apresentada, contate a empresa.");
        $this->setKeywords("sysgae, gerenciamento escolar, sistema, 404, pagina inexistente");
        $this->setDir("404");
        $this->renderLayout();
    }

    // public function geraHash($valor)
    // {
    // 	$valor = md5($valor);
    // 	$valor = sha1($valor);
    // 	$valor = md5($valor);
    // 	echo sha1($valor);
    // }
}

?>