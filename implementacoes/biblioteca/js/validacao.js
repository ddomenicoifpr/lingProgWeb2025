function validarCampos() {
    //Capturar os valores informados pelo usuário
    var titulo = document.getElementById('titulo').value;
    var autor  = document.querySelector('#autor').value;
    var genero = document.getElementById('genero').value;
    var paginas = document.getElementById('paginas').value;

    //alert(titulo + ' - ' + autor + ' - ' + genero + ' - ' + paginas);
    erros = [];
    if(titulo == '')
        erros.push('Informe o título!');
    if(autor == '')
        erros.push('Informe o autor!');
    if(genero == '')
        erros.push('Informe o gênero!');
    if(paginas == '')
        erros.push('Informe o número do páginas!');
    
    if(erros.length > 0) {
        //alert(erros.join("\n"));
        document.getElementById('divErro').innerHTML = 
                            erros.join("<br>");
        return false;
    }

    return true;
}