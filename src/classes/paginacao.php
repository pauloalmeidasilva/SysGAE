<?php

class Paginacao{
    private $pagina;
    private $total;
    private $quantidade;
    private $url;
    private $parametros;
 
    public function __construct($pagina, $total_registros, $quantidade){
        $this->pagina = $pagina;
        $this->total  = $total_registros;
        $this->quantidade = $quantidade;
    }
    public function setUrl($url){
        $this->url = $url;
    }
    public function setParametros($param){
        $this->parametros = $param;
    }
 
    public function getTotalPorPagina(){
        return  ceil($this->total/$this->quantidade);
    }
 
    function gerarPaginacao($echo = true){
        $param = (is_array($this->parametros) && count($this->parametros) > 0) ? '&'.http_build_query($this->parametros) : '';
        $result =   '<ul class="paginacao">';
        for($i = 1; $i <= $this->getTotalPorPagina(); $i++){
            if($this->pagina == $i){
                $result .=   sprintf('<li><a href="#" class="pagiAtiva">%s</a></li>', $i);
            }else{
                $result .= sprintf('<li><a href="%s?pag=%s%s">%s</a></li>', $this->url, $i, $param, $i);
            }
        }
        $result .= '</ul>';
        if(!$echo){
            return $result;
        }
        echo $result;
    }
 
}
 
?>