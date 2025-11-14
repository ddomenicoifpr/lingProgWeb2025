const selCurso = document.querySelector("#selCurso");
const selDisc = document.querySelector("#selDisciplina");
const divErro = document.getElementById("divMsgErro");

const URL_BASE = document.querySelector("#confUrlBase").dataset.urlBase;
//console.log(URL_BASE);

//carregarDisciplinasSincrono();
carregarDisciplinas();

function carregarDisciplinas() {
    //Apagar as options já existentes
    selDisc.innerHTML = "";

    //Criar um option com o valor 0 (Selecione)
    var selecione = {"id": 0, "codigo": "---", "nome": "Selecione - ---"};
    adicionarOptionDisciplina(selecione);
    
    //Enviar a requisição AJAX
    var url = URL_BASE + 
        "/api/disciplinas_por_curso.php?idCurso=" 
            + selCurso.value;
    
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", url);

    //Função de callback (será executada quando chegar a resposta da requisição)
    xhttp.onload = function() {
        var json = xhttp.responseText;

        //Criar as options com base na resposta recebida em JSON
        var disciplinas = JSON.parse(json);
        disciplinas.forEach(d => {
            //console.log(d.id + " - " + d.nome);
            adicionarOptionDisciplina(d);
        });
    }

    xhttp.send();
}

function carregarDisciplinasSincrono() {
    //Apagar as options já existentes
    selDisc.innerHTML = "";

    //Criar um option com o valor 0 (Selecione)
    var selecione = {"id": 0, "codigo": "---", "nome": "Selecione - ---"};
    adicionarOptionDisciplina(selecione);
    
    //Enviar a requisição AJAX
    var url = 
        "/sistema_academico/api/disciplinas_por_curso.php?idCurso=" 
            + selCurso.value;
    
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", url, false);
    xhttp.send();

    var json = xhttp.responseText;
    
    //Criar as options com base na resposta recebida em JSON
    var disciplinas = JSON.parse(json);
    disciplinas.forEach(d => {
        //console.log(d.id + " - " + d.nome);
        adicionarOptionDisciplina(d);
    });
}

function adicionarOptionDisciplina(disciplina) {
    var option = document.createElement("option");
    option.value = disciplina.id;
    option.innerHTML = disciplina.codigo + " - " + disciplina.nome;

    //Marcar o option que já estava selecionado
    const idSelecionado = selDisc.getAttribute("idSelecionado");
    if(idSelecionado == disciplina.id)
        option.selected = true;

    selDisc.appendChild(option);
}

function salvarTurma() {
    //Capturar os dados do formulário
    const ano = document.querySelector("#txtAno").value;
    const curso = selCurso.value;
    const disciplina = selDisc.value;
    //alert(ano + " - " + curso + " - " + disciplina);

    const dados = new FormData();
    dados.append("ano", ano);
    dados.append("idCurso", curso);
    dados.append("idDisc", disciplina);

    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", URL_BASE + "/api/turmas_salvar.php");
    xhttp.onload = function() {
        //console.log(xhttp.responseText);
        const erros = xhttp.responseText;
        if(erros) {
            //Exibir os erros
            divErro.innerHTML = erros;
            divErro.style.display = "block";
        } else {
            //Salvou a turma, redirecionar para o listar
            window.location = "listar.php";
        }

    }

    xhttp.send(dados);
}