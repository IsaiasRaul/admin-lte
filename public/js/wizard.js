$(function ()
{  
    $("#wizard").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        transitionEffectSpeed: 200,

        onStepChanging: function (event, currStepIndex, nextStepIndex) {
          var errorHeader = '<span class="fa fa-times-circle fa-2x" '
          +    'style="vertical-align:middle;color:#e10000;">'
          + '</span> Error Plataforma Ayudas Técnicas';
          
          var validar = false;
          var form = $('#enviar').serialize();
          // Ajustar según los pasos que tiene el sistema
          // paso 1
          /*if (nextStepIndex == 1){ 
            var run_postulante = $("#run_postulante_9").val();
            if (run_postulante.length<1) {
              validar=true;
            } else{
              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
            
              $.ajax({
                url: '/guardar_postulacion',
                method: 'post',
                data: form, // prefer use serialize method
                beforeSend: function() {
                  //Mostrar el loading
                  $(".loader").show();
                },    
                success:function(data){
                    $(".loader").fadeOut("slow");        
                    //console.log(data);

                    if(data === 99){
                      alertify.alert(errorHeader,'No es posible iniciar su postulación, no cumple con estar registrado en el Registro Social De Hogares.');                  
                      return false;              
                    }else{
                      if(data === true){
                        return true;
                      }else{
                        alertify.alert(errorHeader,'No es posible iniciar su postulación, no cumple con los requisitos');                  
                        return false;
                      }
                    }                    
                }       
              });
            }
              
          }*/

         /* if(validar == true){
            alertify.alert(errorHeader,'RUN No puede ser vacio.');                  
            return false;
          }*/

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