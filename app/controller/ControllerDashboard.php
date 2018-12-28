<?php
namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerDashboard extends ClassRender implements InterfaceView{
    public function __construct()
    {
        $this->setTitle("Dashboard");
        $this->setDescription("Painel Principal do Sistema");
        $this->setKeywords("dashboard, painel principal, sistema");
        $this->setDir("dashboard");
        $this->renderLayout();
    }
}
?>