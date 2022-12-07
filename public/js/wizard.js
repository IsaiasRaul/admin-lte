$(function ()
{  
    $("#wizard").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        stepsOrientation: "vertical",
        transitionEffectSpeed: 200,
        autoFocus: true,

        onStepChanging: function (event, currStepIndex, nextStepIndex) {
          var errorHeader = '<span class="fa fa-times-circle fa-2x" '
          +    'style="vertical-align:middle;color:#e10000;">'
          + '</span> Error Plataforma Ayudas Técnicas';
          
          var validar = false;
          var form = $('#enviar').serialize();

          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

          $.ajax({
            url: '/guardar_postulacion',
            method: 'POST',
            data: form, // prefer use serialize method
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
              //Mostrar el loading
              //$(".loader").show();
            },    
            success:function(response){
                //$(".loader").fadeOut("slow");        
                console.log(response);
            },
            error: function(response) {
            }            
          });

          return true;
        },
        /* Labels */
        labels: {
          cancel: "Cancelar",
          current: "current step:",
          pagination: "Paginación",
          finish: "Finalizar",
          next: "Siguiente",
          previous: "Anterior",
          loading: "Cargando..."
        }        
        
    });

});