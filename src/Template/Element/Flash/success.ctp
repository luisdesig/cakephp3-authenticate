<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message success" onclick="this.classList.add('hidden')"><?= $message ?></div>


<script type="text/javascript" src="">
    
     $.notify({
    'icon': 'fa fa-times-circle',
    'title': ' <strong> titulo </strong> ',
    'message': ' aca ira el mensaje'
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
    
    
</script>