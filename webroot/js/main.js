$(document).ready(function() {
    $('.datepicker').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true,
      language: 'es'
    });
    
    //$(".datepicker").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

   $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_minimal-blue'
    });
    
    $('.select2').select2({multiple:true });

});
 

 