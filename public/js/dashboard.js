function consultarCargo(id) {
	var idbutton = "cst"+id;
	document.getElementById('cst-nome-cargo').innerHTML = document.getElementById(idbutton).getAttribute('data-nome');
	document.getElementById('cst-des-cargo').innerHTML = document.getElementById(idbutton).getAttribute('data-descricao');
	return false;
}

function alterarCargo(id) {
	var idbutton = "alt"+id;
	document.getElementById('alt-id-cargo').value = id;
	document.getElementById('alt-nome-cargo').value = document.getElementById(idbutton).getAttribute('data-nome');
	document.getElementById('alt-des-cargo').value = document.getElementById(idbutton).getAttribute('data-descricao');
	return false;
}

function deletarCargo(id) {
	var idbutton = "del"+id;
	document.getElementById('del-id-cargo').value = id;
	document.getElementById('del-nome-cargo').innerHTML = document.getElementById(idbutton).getAttribute('data-nome');
	return false;
}