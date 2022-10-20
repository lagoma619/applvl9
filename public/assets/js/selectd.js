$(function (){

    function onSelectCliente() {
        var id_cliente = $(this).val();

        $.get('../api/sedes/'+id_cliente+'/selsede', function (data){

            var html_select = '<option value="">Seleccione una sede...</option>'
            for (var  i=0; i<data.length; ++i)
<<<<<<< HEAD
                html_select += '<option value="'+data[i].id+'">'+data[i].sede_nombre+'</option>';
=======
                html_select += '<option value="'+data[i].sede_id+'">'+data[i].sede_nombre+'</option>';
>>>>>>> parent of d81cb21d (AREA_OK)
            $('#area_id_sede').html(html_select);
           // console.log(data);
            }
        )
    }

    $('#area_id_cliente').on('change', onSelectCliente);
});
