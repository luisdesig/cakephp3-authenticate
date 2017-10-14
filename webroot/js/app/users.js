function activarusuario(idUsuario){
  var data = {
      'id': idUsuario
    };
    
  $.ajax({
    type: 'POST',
    dataType: "json",
    data: data,
    url: '/users/activarusuario',
    success: function(data) {
      location.reload();
    },
    error: function(data) {}
  });
};

function recuperarusuario(idUsuario){
  var data = {
      'id': idUsuario
    };
    
  $.ajax({
    type: 'POST',
    dataType: "json",
    data: data,
    url: '/users/recuperarusuario',
    success: function(data) {
      location.reload();
    },
    error: function(data) {}
  });
};