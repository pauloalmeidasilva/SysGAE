<?php

namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerLogin extends ClassRender implements InterfaceView{
    public function __construct()
    {
        $this->setTitle("Login");
        $this->setDescription("Página inicial do sistema");
        $this->setKeywords("");
        $this->setDir("login");
        $this->renderLayout();
    }
}

?>