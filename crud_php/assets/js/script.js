$('#tarefasForm').submit(function(e) {
    e.preventDefault();

    const BASE_URL = 'http://localhost/crud_php/';
    const nome = $('#inputName').val();
    const sobrenome = $('#inputSobrenome').val();
    const tarefa = $('#textareaTarefa').val();
    const dataInicio = $('#inputInicio').val();
    const dataFim = $('#inputFim').val();

    $.ajax({
        url: BASE_URL + 'Form',
        type: 'POST',
        data: {nome:nome, sobrenome:sobrenome, tarefa:tarefa, dataInicio:dataInicio, dataFim:dataFim},
        success: function(response) {
          
           $('#inputName').val('');
           $('#inputSobrenome').val('');
           $('#textareaTarefa').val('');
           $('#inputInicio').val('');
           $('#inputFim').val('');

           $('#tarefasForm').html(response);
           $('#tarefasForm').find('.title_page_cad').remove();
            
           e.preventDefault();
        },
        error: function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
    return false;
});

