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
            personas_discapacidad_contrato_vigente=$('#personas_discapacidad_contrato_vigente_19').val();
            if(personas_discapacidad_contrato_vigente == 'Sí, 1 o más'){
              $("#element").show();
            }else{
              $("#element").hide();
            }
          }

          var validar = [];            
          var form = $('#enviar').serialize() + '&currStepIndex=' + currStepIndex;
          
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

                $('.messages').show();
                var errorsHtml = '<div class="alert alert-danger"><ul>';
                $.each( errors, function( key, value ) {                      
                    errorsHtml += '<li>'+ value[0] + '</li>';
                });
                errorsHtml += '</ul></div>';

                $('.messages').html(errorsHtml);

                $("html, body").animate({ scrollTop: 0 }, 600);
                
              }
            }            
          });

          /**Reload para el ultimo módulo */
          if(nextStepIndex == 5){
            console.log(nextStepIndex);
              idregistro=$('#idregistro').val();
              idconvocatoria=$('#idconvocatoria').val();
              //$('#finaliza').load("municipio.finalizar");

              $.ajax({
                url: '/finaliza_formulario',
                method: 'POST',
                async: false,
                data: {
                      idregistro:idregistro
                      }, // prefer use serialize method            
                beforeSend: function() {
                  //Mostrar el loading
                  //$(".loader").show();
                },    
                success:function(data){                      
                    $('#finaliza').empty('').append(data);                    
                    
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
                      msg: 'Problema al cargar, por favor contáctese con el administrador del sistema.',
                      closeOnClick: true,
                      sound: false,
                      position: "bottom left"
                    }
                  );
                }
              });
            }            


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

      //actualizar datos colaboradores
      $('#actualizar').click(function(){
        rut=$('#rut_edicion').val();
        estamento=$('#estamento_edicion').val();
        calidad_contractual=$('#calidad_contractual_edicion').val();
        jornanda_laboral=$('#jornanda_laboral_edicion').val();
        monto_remuneracion=$('#monto_remuneracion_edicion').val();
        verificador_cumplimiento=$('#verificador_cumplimiento_edicion').val();
        genero=$('#genero_edicion').val();
        fecha_ingreso_institucion=$('#fecha_ingreso_institucion_edicion').val();
        periodo_contratacion_desde=$('#periodo_contratacion_desde_edicion').val();
        periodo_contratacion_hasta=$('#periodo_contratacion_hasta_edicion').val();
        idregistro=$('#idregistro').val();
        id=$('#id').val();
        
          $.ajax({
            url: '/actualizar_persona_discapacidad',
            method: 'POST',
            async: false,
            data: {rut:rut,
                  estamento:estamento,
                  calidad_contractual:calidad_contractual,
                  jornanda_laboral:jornanda_laboral,
                  monto_remuneracion:monto_remuneracion,
                  verificador_cumplimiento:verificador_cumplimiento,
                  genero:genero,
                  fecha_ingreso_institucion:fecha_ingreso_institucion,
                  periodo_contratacion_desde:periodo_contratacion_desde,
                  periodo_contratacion_hasta:periodo_contratacion_hasta,
                  idregistro:idregistro,
                  id:id
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
                  $("#modalEditar").fadeOut("slow");
                  $('#modalEditar').modal('toggle');
                  

                  Lobibox.notify(
                    'success',  // Available types 'warning', 'info', 'success', 'error'
                    {
                      title: "Guardado",
                      size: 'normal',
                      icon: false,
                      msg: 'Persona actualiza con éxito',
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
              
              $("#rut_edicion").focus();
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
                  msg: 'Problema al actualizar persona, por favor revise los errores y corrija.',
                  closeOnClick: true,
                  sound: false,
                  position: "bottom left"
                }
              );
            }
          });
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
        html += '<td><a title="Editar este colaborador con discapacidad" href="#" data-toggle="modal" class="edit" onclick="vieweditarColaboradorDiscapacidad('+data.data[i].id+')"><i class="fa-solid fa-user-pen"></i></a></td>';
        html += '<td><a title="Visualizar colaborador con discapacidad" data-toggle="modal" class="vista" onclick="visualizarColaboradorDiscapacidad('+data.data[i].id+')" href="#"><i id="ver" class="fa-solid fa-eye"></i></a></td>';
        html += '<td><a title="Eliminar este colaborador con discapacidad" class="remove" onclick="eliminarColaboradorDiscapacidad('+data.data[i].id+')" href="#"><i class="fa-solid fa-trash"></i></a></td>';
        html += '</tr>';        
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

function vieweditarColaboradorDiscapacidad(id)
{
  idregistro=$('#idregistro').val();

  $.ajax({
    url: '/view_persona_discapacidad',
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
    success:function(data){

        //recorro los datos
        for(var i = 0; i < data.data.length; i++){
          $('#rut_edicion').val(data.data[i].rut);          
          $('#estamento_edicion').val(data.data[i].id_estamento);
          $('#calidad_contractual_edicion').val(data.data[i].id_calidad_contractual);
          $('#jornanda_laboral_edicion').val(data.data[i].id_jornada_laboral);
          $('#monto_remuneracion_edicion').val(data.data[i].monto_remuneracion_imponible);
          $('#verificador_cumplimiento_edicion').val(data.data[i].id_verificador_cumplimiento);
          $('#genero_edicion').val(data.data[i].genero);
          $('#fecha_ingreso_institucion_edicion').val(data.data[i].fecha_ingreso_institucion);
          $('#periodo_contratacion_desde_edicion').val(data.data[i].periodo_contratacion_desde);
          $('#periodo_contratacion_hasta_edicion').val(data.data[i].periodo_contratacion_hasta);
          $('#id').val(data.data[i].id);
        }      
        //lanzó el modal para edicion
        $("#modalEditar").modal("show");
        
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
          msg: 'Problema al cargar, por favor contáctese con el administrador del sistema.',
          closeOnClick: true,
          sound: false,
          position: "bottom left"
        }
      );
    }
  });
}

function visualizarColaboradorDiscapacidad(id)
{
  idregistro=$('#idregistro').val();

  $.ajax({
    url: '/ver_persona_discapacidad',
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
    success:function(data){

      var html = '';

      for(var i = 0; i < data.data.length; i++){
        //console.log(data.data[i].rut)
        html += '<tr id="'+data.data[i].id+'" >' +
        '<td>' + data.data[i].rut + '</td>' +
        '<td>' + data.data[i].estamentos.estamento+ '</td>'+
        '<td>' + data.data[i].calidad_contractual.calidad_contractual+ '</td>'+        
        '<td>' + data.data[i].jornada_laboral.jornada_laboral+ '</td>'+
        '<td>' + data.data[i].monto_remuneracion_imponible + '</td>'+
        '<td>' + data.data[i].verificador_cumplimiento.verificador_cumplimiento+ '</td>';
        if(data.data[i].genero == 'M'){
          html += '<td>Masculino</td>';
        }else if(data.data[i].genero == 'F'){
          html += '<td>Femenino</td>';
        }else{
          html += '<td>Otro</td>';
        }        
        html += '<td>' + data.data[i].periodo_contratacion_desde + '</td>'+
        '<td>' + data.data[i].periodo_contratacion_hasta + '</td>'+        
        '</tr>';
      }

        $('#DataResultVista').empty('').append(html);

        //lanzó el modal para edicion
        $("#modalVisualizar").modal("show");      
      
        
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
          msg: 'Problema al cargar, por favor contáctese con el administrador del sistema.',
          closeOnClick: true,
          sound: false,
          position: "bottom left"
        }
      );
    }
  });
}

function ocultar_pregunta(){
  personas_discapacidad_contrato_vigente=$('#personas_discapacidad_contrato_vigente_19').val();
  if(personas_discapacidad_contrato_vigente == 'Sí, 1 o más'){
    $("#element").fadeIn();
  }else{
    $("#element").fadeOut();
  }
}
