<?php

namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerHome extends ClassRender implements InterfaceView{
    public function __construct()
    {
        $this->setTitle("Página Inicial");
        $this->setDescription("Esse é o site do Sistema SysGAE");
        $this->setKeywords("sysgae, gerenciamento escolar, sistema");
        $this->setDir("home");
        $this->renderLayout();
    }
}

?>