$('document').ready(function(){
    
    $(function() {
        //$("a[rel='overlay']").overlay({mask: '#000', effect: 'apple'});
    });

    /*FACEBOX WRAPPER*/
    $(".divPop").overlay({
        mask: {color: '#000',effect: 'apple',loadSpeed: 200,opacity: 0.8}, 
        onBeforeLoad: function() {
            $("DIV#wrapper").css("width","500px"); 
            // En esta caso el id del div overlay se obtiene por defecto del atributo REL del lanzador (trigger) 
            var wrap = this.getOverlay().find(".html");
            // Se obtiene la url del atributo href del lanzador, en este caso el elemento que contenga la clase divPop
            wrap.load(this.getTrigger().attr("href")); 
        },
        onClose:function() {
            //void
        } 
    });
    /*FACEBOX WRAPPER*/

});