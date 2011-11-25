$('document').ready(function(){
    
    $.ajax({
        type: "POST",
        url: "/webservices/getProvinciasByIdPais",
        async:false,
        dataType: 'json',
        data: "id=25",
        success: function(data){
            $.each( data, function(k, v){
               alert( "Index #" + k + ": " + v.pais );
             });
        }
    });

});

