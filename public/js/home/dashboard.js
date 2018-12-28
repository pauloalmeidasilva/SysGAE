function menu(valor) {
	var id = valor.id
	$(id).click(function(){
		$(this).children('ul').slideToggle("slow");
				});
	return false
}