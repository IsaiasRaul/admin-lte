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
            beforeSend: function() {
              //Mostrar el loading
              //$(".loader").show();
            },    
            success:function(response){
                //$(".loader").fadeOut("slow");        
                if(response.success == 'Ok'){
                  Lobibox.notify(
                    'success',  // Available types 'warning', 'info', 'success', 'error'
                    {
                      title: true,
                      size: 'normal',
                      icon: false,
                      msg: 'Guardado con éxito',
                      closeOnClick: true,
                      delay: 5000,
                      sound: false,
                      position: "bottom center"
                    }
                );               
                }
                //console.log(response.success);
            },
            error: function(response) {
              console.log("ERROR");
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
          next: "Guardar y Continuar",
          previous: "Anterior",
          loading: "Cargando..."
        }        
        
    });

});