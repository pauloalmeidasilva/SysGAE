$(document).ready(function(){
var DIRPAGE="http://"+document.location.hostname+"/";
$('#FormSelect').on('submit',function(event){
    event.preventDefault();
    var Dados=$(this).serialize();

    $.ajax({
        url: DIRPAGE+'cadastro/seleciona',
        method:'post',
        dataType:'html',
        data: Dados,
        success:function(Dados){
            $('.Resultado').html(Dados);
        }
    });
});
});