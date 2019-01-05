<?php

#Arquivos diretórios raízes
$PastaInterna="sysgae/";

define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}");

if(substr($_SERVER['DOCUMENT_ROOT'],-1)=='/') {
	define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$PastaInterna}");
}
else {
	define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}/{$PastaInterna}");
}

#Diretórios Específicos
define('DIRADMIN',DIRPAGE."public/admin/");
define('DIRAUDIO',DIRPAGE."public/audio/");
define('DIRCSS',DIRPAGE."public/css/");
define('DIRDSN',DIRPAGE."public/design/");
define('DIRFNT',DIRPAGE."public/fontes/");
define('DIRIMG',DIRPAGE."public/img/");
define('DIRJS',DIRPAGE."public/js/");
define('DIRVIDEO',DIRPAGE."public/video/");

#Acesso ao banco de dados
define('HOST',"localhost");
define('DB',"sysgae");
define('USER',"root");
define('PASS',"");

?>