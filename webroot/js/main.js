$(document).ready(function() {
  
  $(document).ajaxSend(function(event, request, settings) {
    $('#ajaxCargando').modal('show');
  });
  
  $(document).ajaxSuccess(function(event, request, settings) {
    //console.log(request);
  });
  
  $(document).ajaxError(function(event, request, settings) {

    if(request.status != undefined && request.status ==403){
      location.reload(true);
    }
  });
  
  $(document).ajaxComplete(function(event, request, settings) {
    $('#ajaxCargando').modal('hide');
  });


  $('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    autoclose: true,
    language: 'es'
  });

  $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
    checkboxClass: 'icheckbox_flat-blue',
    radioClass: 'iradio_minimal-blue'
  });

  $('.s2').select2({
    multiple: false
  });
  $('.s2Multiple').select2({
    multiple: true
  });
});

/**
 * 
 * @method GENERAR MENSAJES
 * @param {String} mensaje - mensaje
 * @param {String} titulo - titulo del mensaje
 * @param {Ingeter} tipo - 1 succes, , 2 info, 3 warning, 4 danger
*/
function msgNotify(mensaje, titulo, tipo){
  var type = '';
  var icon = '';
  mensaje = (mensaje == undefined ? '' : mensaje);
  tipo = (tipo == undefined ? 1 : tipo);

  switch(tipo) {
    case 1:
      icon = 'fa fa-check';
      type = 'success';
      break;
    case 2:
      icon = 'fa fa-info';
      type = 'info';
      break;
    case 3:
      icon = 'fa fa-exclamation-triangle';
      type = 'warning';
      break;
    case 4:
      icon = 'fa fa-times-circle';
      type = 'danger';
    break;
  }

  $.notify({
    'icon': icon,
    'title': ' <strong>' + titulo + '</strong> ',
    'message': ' ' + mensaje
  },
  {
    'newest_on_top': true,
    'animate': {
  		'enter': 'animated bounceInDown',
  		'exit': 'animated bounceOutUp'
  	  },
  	'type': type,
  	'delay': 5000
  	/*,
  	template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            		'<span data-notify="title">{1}</span>' +
            		'<span data-notify="message">{2}</span>' +
            	'</div>'*/
  });

};