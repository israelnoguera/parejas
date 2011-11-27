$('document').ready(function(){
    
    var form = $('#registroForm');
    if(form.length > 0){
        $('#usuario_perfiles_pais').change(function(){
            
            $('#usuario_perfiles_pais option:selected').each(function () {
                id_pais = $(this).val();
            }); 
            
            $.ajax({
                type: "POST",
                url: "/webservices/getProvinciasByIdPais",
                async:false,
                dataType: 'json',
                data: "id="+id_pais,
                success: function(data){
                    var prov = form.find('#usuario_perfiles_provincia');
                    prov.html('');

                    $.each( data, function(k, v){
                       prov.append('<option value="'+v.id+'">'+v.provincia+'</option>');
                    });
                }
            });            

        });
        
        $('#usuario_perfiles_provincia').change(function(){
            
            $('#usuario_perfiles_provincia option:selected').each(function () {
                id_provincia = $(this).val();
            }); 
            
            $.ajax({
                type: "POST",
                url: "/webservices/getLocalidadesByIdProvincia",
                async:false,
                dataType: 'json',
                data: "id="+id_provincia,
                success: function(data){
                    var prov = form.find('#usuario_perfiles_localidad');
                    prov.html('');

                    $.each( data, function(k, v){
                       prov.append('<option value="'+v.id+'">'+v.localidad+'</option>');
                    });
                }
            });            

        });        

  
    }    
    


});

