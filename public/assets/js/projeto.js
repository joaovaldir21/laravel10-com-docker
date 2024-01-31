function deleteRegistroPaginacao(rotaUrl, idDoRegistro) {
    if (confirm('Deseja confirmar a exclusão?')) {
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                id: idDoRegistro
            },
            beforeSend: function () {
                $.blockUI({
                    message: 'Carregando...',
                    timeout: 2000,
                });
            },
        }).done(function (data) {
            $.unblockUI();
            if (data.success == true) {
                window.location.reload();
                alert('Produto excluido com sucesso!');
            } else {
                alert('Não foi possivel excluir!');
            }
        }).fail(function (data) {
            $.unblockUI();
            alert('Não foi possivel buscar os dados!');
        });
    }
}

// Remove as FLASH MESSAGES em 4 segundos
$("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 4000 ); // 4 secs

});

// Input Mask
$('#mascara_valor').mask('#.##0,00', { reverse: true})