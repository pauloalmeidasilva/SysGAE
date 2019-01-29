<?php
    namespace Src\Classes;

    class ClassPagination 
    { 
        public function gerarPaginacao($pagatual, $totalpag, $caminho)
        {
            $numlinks = 2;

            $paginacao = "<nav aria-label='paginacao'><ul class='pagination pagination-sm justify-content-center'><li class='page-item'><span class='page-link'><a href='$caminho'>Primeira</a></span></li>";

            for($pagant = $pagatual - $numlinks; $pagant < $pagatual; $pagant++)
                if ($pagant >= 1)
                    $paginacao .= "<li class='page-item'><a class='page-link' href='$caminho/$pagant'>$pagant</a></li>";

            $paginacao .= "<li class='page-item active'><span class='page-link'>$pagatual</span>";

            for($pagpos = $pagatual + 1; $pagpos <= $pagatual + $numlinks; $pagpos++)
                if ($pagpos <= $totalpag)
                    $paginacao .= "<li class='page-item'><a class='page-link' href='$caminho/$pagpos'>$pagpos</a></li>";

            $paginacao .= "<li class='page-item'><span class='page-link'><a href='$caminho/$totalpag'>Ultima</a></span></li></ul></nav>";

            return $paginacao;
        }

    }

?>