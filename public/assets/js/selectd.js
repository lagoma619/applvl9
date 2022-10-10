$(function (){
    function onSelectCliente() {
        var id_cliente = $(this).val();

        $.get('../api/sedes/'+id_cliente+'/selsede', function (data){
            console.log(data);
            var html_select = '<option value="">Seleccione una sede</option>'
            for (var  i=0; i<data.length; ++i)
                html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
            $('#id_sede').html(html_select);

            }
        )
    }

    $('#sel_cliente').on('change', onSelectCliente);
})
