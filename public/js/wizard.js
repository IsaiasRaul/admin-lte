$(function () { 
  stepsWizard = $("#wizard").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        stepsOrientation: "vertical",
        transitionEffectSpeed: 200,
        autoFocus: true,
        labels: {
          cancel: "Cancelar",
          current: "current step:",
          pagination: "Paginación",
          finish: "Finalizar",
          next: "Guardar y Continuar",
          previous: "Anterior",
          loading: "Cargando..."
        },     
        onStepChanging: function (event, currStepIndex, nextStepIndex) {
            
            //Carga de tabla para agregar colaboradores con discapacidad
            if(nextStepIndex == 3 ) //Medidas de accesibilidad en procesos de seleccion (paso 4)
            {              
              //console.log(nextStepIndex);
              $("#element").show();
            }


            var validar = [];            
            var form = $('#enviar').serialize();
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
              url: '/guardar_postulacion',
              method: 'POST',
              async: false,
              data: form, // prefer use serialize method            
              beforeSend: function() {
                //Mostrar el loading
                //$(".loader").show();
              },    
              success:function(response){
                  //$(".loader").fadeOut("slow");        
                  if(response.success === true ){    
                    res = true;               
                    validar.push(res);
                    
                    $(".messages").fadeOut("slow");

                    Lobibox.notify(
                      'success',  // Available types 'warning', 'info', 'success', 'error'
                      {
                        title: "Guardado",
                        size: 'normal',
                        icon: false,
                        msg: 'Guardado con éxito',
                        closeOnClick: true,
                        delay: 3000,
                        sound: false,
                        position: "bottom center"
                      }
                    );
                  }                         
                  //console.log('succes: '+validar+'\n');
                  //console.log(response.success);
              },
              error: function(response) {
                if( response.status === 422 ) {
                  res = false;
                  validar.push(res);                
                  var errors = response.responseJSON.errors;

                  var errorsHtml = '<div class="alert alert-danger"><ul>';

                  $.each( errors, function( key, value ) {
                      errorsHtml += '<li>'+ value[0] + '</li>';
                  });
                  errorsHtml += '</ul></div>';

                  $('.messages').html(errorsHtml);
                }
              }            
            });
           
          if (validar == null) {
            validarFinal = true;
          }else{
            var validarFinal = $.parseJSON(validar);
          }

          //console.log(validarFinal);
          return validarFinal;   
        },
        onStepChanged: function (event, currentIndex, newIndex) {
          //$('#wizard').steps("setStep", 3);
        },onFinished: function () {
          ///more code
      }
    });
});