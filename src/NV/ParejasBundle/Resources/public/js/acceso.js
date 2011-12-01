$('document').ready(function(){    
    
    var form = $('#registroForm');
    if(form.length > 0){
        $('#usuario_perfiles_pais_id').change(function(){
            
            $('#usuario_perfiles_pais_id option:selected').each(function () {
                id_pais = $(this).val();
            }); 
            
            $.ajax({
                type: "POST",
                url: "/webservices/getProvinciasByIdPais",
                async:false,
                dataType: 'json',
                data: "id="+id_pais,
                success: function(data){
                    var prov = form.find('#usuario_perfiles_provincia_id');
                    prov.html('');

                    $.each( data, function(k, v){
                       prov.append('<option value="'+v.id+'">'+v.provincia+'</option>');
                    });
                }
            });            

        });
        
        $('#usuario_perfiles_provincia_id').change(function(){
            
            $('#usuario_perfiles_provincia_id option:selected').each(function () {
                id_provincia = $(this).val();
            }); 
            
            $.ajax({
                type: "POST",
                url: "/webservices/getLocalidadesByIdProvincia",
                async:false,
                dataType: 'json',
                data: "id="+id_provincia,
                success: function(data){
                    var prov = form.find('#usuario_perfiles_localidad_id');
                    prov.html('');

                    $.each( data, function(k, v){
                       prov.append('<option value="'+v.id+'">'+v.localidad+'</option>');
                    });
                }
            });            

        });        
        
    }      
    
    
});    