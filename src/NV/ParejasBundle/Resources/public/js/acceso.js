$('document').ready(function(){    

    if($('#registroForm').length > 0){
        var form = $('#registroForm');
        $('#usuario_perfiles_pais_id').change(function(){
            
            $('select#usuario_perfiles_provincia_id')
                .closest('td')
                .append('<img class="arrows16" style="float:right;margin:5px 3px 0 0;" src="/images/arrows16.gif" width="16" height="16" />')
            
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
                    
                    $('.arrows16').hide();
                }
            });            

        });
        
        $('#usuario_perfiles_provincia_id').change(function(){
            
            $('select#usuario_perfiles_localidad_id')
                .closest('td')
                .append('<img class="arrows16" style="float:right;margin:5px 3px 0 0;" src="/images/arrows16.gif" width="16" height="16" />')            
            
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
                    
                    $('.arrows16').hide();
                }
            });            

        });        
        
    }      
    
    
});    