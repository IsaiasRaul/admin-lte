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

    
      //guardar nuevo colaborador
      $('#guardarnuevo').click(function(){
                             
        rut=$('#rut').val();
        estamento=$('#estamento').val();
        calidad_contractual=$('#calidad_contractual').val();
        jornanda_laboral=$('#jornanda_laboral').val();
        monto_remuneracion=$('#monto_remuneracion').val();
        verificador_cumplimiento=$('#verificador_cumplimiento').val();
        genero=$('#genero').val();
        fecha_ingreso_institucion=$('#fecha_ingreso_institucion').val();
        periodo_contratacion_desde=$('#periodo_contratacion_desde').val();
        periodo_contratacion_hasta=$('#periodo_contratacion_hasta').val();
        idregistro=$('#idregistro').val();
        
          $.ajax({
            url: '/guardar_persona_discapacidad',
            method: 'POST',
            async: false,
            data: {rut:rut,estamento:estamento,
                  calidad_contractual:calidad_contractual,
                  jornanda_laboral:jornanda_laboral,
                  monto_remuneracion:monto_remuneracion,
                  verificador_cumplimiento:verificador_cumplimiento,
                  genero:genero,
                  fecha_ingreso_institucion:fecha_ingreso_institucion,
                  periodo_contratacion_desde:periodo_contratacion_desde,
                  periodo_contratacion_hasta:periodo_contratacion_hasta,
                  idregistro:idregistro
                }, // prefer use serialize method            
            beforeSend: function() {
              //Mostrar el loading
              //$(".loader").show();
            },    
            success:function(response){
                //$(".loader").fadeOut("slow");        
                if(response.success === true ){    
                  //res = true;               
                  //validar.push(res);
                  $('.alert-danger').hide();
                  actualizadatostabla(idregistro);
                  $(".messages").fadeOut("slow");
                  $("#modalNuevo").fadeOut("slow");
                  $('#modalNuevo').modal('toggle');
                  

                  Lobibox.notify(
                    'success',  // Available types 'warning', 'info', 'success', 'error'
                    {
                      title: "Guardado",
                      size: 'normal',
                      icon: false,
                      msg: 'Persona guardada con éxito',
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
            error: function(xhr, status, error) {
              
              $("#rut").focus();
              data = JSON.parse(xhr.responseText).errors
              $.each(data, function(key, value){                
                $('.alert-danger').show();
                $('.alert-danger').append('<li>'+value+'</li>');
              });

              Lobibox.alert(
                'error',  // Available types 'warning', 'info', 'success', 'error'
                {
                  title: "Error",
                  size: 'normal',
                  icon: false,
                  msg: 'Problema al guardar persona, por favor revise los errores y corrija.',
                  closeOnClick: true,
                  sound: false,
                  position: "bottom left"
                }
              );
            }
          });
      });


      $('a.remove').click(function(e) {
        e.target.closest('tr').remove();
      });
});

// Script para iniciar llamada a validacion RUN
function revisarRun(){
      $("#rut").attr("autocomplete", "off");			
      $('#rut').rut({
      fn_error : function(input){                
          Lobibox.notify(
          'error',  // Available types 'warning', 'info', 'success', 'error'
          {
            title: "Error",
            size: 'normal',
            icon: false,
            msg: 'RUN no es válido o formato incorrecto.',
            closeOnClick: true,
            delay: 3000,
            sound: false,
            position: "bottom center"
          }
          );
          input.val("");
      },
      placeholder: false
  });
}     

//Actualizar datos colaborador
function actualizadatostabla(idregistro){  
  $.ajax({
    url: '/obtener_persona_discapacidad',
    method: 'POST',    
    data: {idregistro:idregistro}, // prefer use serialize method            
    dataType: "JSON",
    beforeSend: function() {
      //Mostrar el loading
      //$(".loader").show();
    },    
    success:function(data){      
      var html = '';

      for(var i = 0; i < data.data.length; i++){
        //console.log(data.data[i].rut)
        html += '<tr id="'+data.data[i].id+'" >' +
        '<td>' + data.data[i].rut + '</td>' +
        '<td>' + data.data[i].periodo_contratacion_desde + '</td>';

        if(data.data[i].periodo_contratacion_hasta == null){
          html += '<td>INDEFINIDO</td>';
        }else{
          html += '<td>' + data.data[i].periodo_contratacion_hasta + '</td>';
        }
        html += '<td><i class="fa-solid fa-user-pen"></i></td>' +
        '<td><a title="Eliminar este colaborador con discapacidad" class="remove" onclick="eliminarColaboradorDiscapacidad('+data.data[i].id+')" href="#">'+
        '<i class="fa-solid fa-trash"></i></a></td>' +
        '</tr>';        
      }
      $('#DataResult').empty('').append(html);            
    },
    error: function(data) {
      Lobibox.notify(
        'error',  // Available types 'warning', 'info', 'success', 'error'
        {
          title: "Error",
          size: 'normal',
          icon: false,
          msg: 'Problema al guardar persona',
          closeOnClick: true,
          delay: 3000,
          sound: false,
          position: "bottom left"
        }
      );
    }
  });
}

function eliminarColaboradorDiscapacidad(id){
  idregistro=$('#idregistro').val();

  $.ajax({
    url: '/delete_persona_discapacidad',
    method: 'POST',
    async: false,
    data: {
          id:id,
          idregistro:idregistro
          }, // prefer use serialize method            
    beforeSend: function() {
      //Mostrar el loading
      //$(".loader").show();
    },    
    success:function(response){
        //$(".loader").fadeOut("slow");        
        if(response.success === true ){    
          //res = true;               
          //validar.push(res);
          
          actualizadatostabla(idregistro);
          
          Lobibox.notify(
            'info',  // Available types 'warning', 'info', 'success', 'error'
            {
              title: "Eliminado",
              size: 'normal',
              icon: false,
              msg: 'Persona guardada con éxito',
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
    error: function(xhr, status, error) {
      
      
      data = JSON.parse(xhr.responseText).errors
      $.each(data, function(key, value){                
        $('.alert-danger').show();
        $('.alert-danger').append('<li>'+value+'</li>');
      });

      Lobibox.alert(
        'error',  // Available types 'warning', 'info', 'success', 'error'
        {
          title: "Error",
          size: 'normal',
          icon: false,
          msg: 'Problema al eliminar persona, por favor contáctese con el administrador del sistema.',
          closeOnClick: true,
          sound: false,
          position: "bottom left"
        }
      );
    }
  });

}
