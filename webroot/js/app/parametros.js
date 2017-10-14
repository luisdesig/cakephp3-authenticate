function obtParametrosTree() {
  $.ajax({
    type: 'GET',
    dataType: "json",
    async: true,
    data: {
      'tipo': 'threaded'
    },
    url: '/parametros/getParametros',
    success: function(data) {
      cargaDataParametros(data);
    },
    error: function(data) {}
  });
}

function filtrarArbol(){
  $.ajax({
    type: 'GET',
    dataType: "json",
    async: true,
    data: {
      'filtro': $('#txtfiltrarParam').val(),
    },
    url: '/parametros/filtrarParametros',
    success: function(data) {
      var tree = $('#treeParametro').fancytree('getTree');
      tree.reload(agregaRaizArbol(data));
    },
    error: function(data) {}
  });
};
$("#btnfiltrarParam").click(filtrarArbol);

obtParametrosTree();

glyph_opts = {
  map: {
    doc: "fa fa-th-list",
    docOpen: "fa fa-th-list",
    checkbox: "fa fa-square-o",
    checkboxSelected: "fa fa-check-square-o ",
    checkboxUnknown: "fa fa-share",
    dragHelper: "fa fa-play",
    dropMarker: "fa fa-hand-o-right",
    error: "fa fa-exclamation-triangle",
    expanderClosed: "fa fa-angle-right",
    expanderLazy: "fa fa-chevron-right",  // glyphicon-plus-sign
    expanderOpen: "fa fa-chevron-down",  // glyphicon-collapse-down
    folder: "fa fa-folder",
    folderOpen: "fa fa-folder-open",
    loading: "fa fa-refresh"
  }
};

function agregaRaizArbol(data){
  return [{'key':0, 'title':'Raíz', 'icon':'fa fa-home', 'children':data.data}];
}

function cargaDataParametros(dat) {
  dat = agregaRaizArbol(dat);

  $('#treeParametro').fancytree({
    source: dat,
    extensions: ["dnd5", "glyph"],
   // checkbox : 'radio',
    expanded : 'false',
    selectMode: 1,
    glyph: glyph_opts,
    Interactions: 'Draggable',
    wide: {
      iconWidth: "1em",       // Adjust this if @fancy-icon-width != "16px"
      iconSpacing: "0.5em",   // Adjust this if @fancy-icon-spacing != "3px"
      labelSpacing: "0.1em",  // Adjust this if padding between icon and label != "3px"
      levelOfs: "1.5em"       // Adjust this if ul padding != "16px"
    },
    icon: function(event, data){
      //if( data.node.isFolder() ) {
      //  return "glyphicon glyphicon-book";
      //}
    },
      click: function(event, data) {
        $('#spnewPos').text(data.node.title);
        $('#frmReubicacion #parent_id').val(data.node.key);
    },
    dnd5: {
      // autoExpandMS: 400,
      // preventForeignNodes: true,
      // preventNonNodes: true,
      // preventRecursiveMoves: true, // Prevent dropping nodes on own descendants
      // preventVoidMoves: true, // Prevent dropping nodes 'before self', etc.
      scroll: true,
      scrollSpeed: 7,
      scrollSensitivity: 10,
      // --- Drag-support:
      dragStart: function(node, data) {
        if(node.key != $('#id').val()){
          return false;
        }
        
        /* This function MUST be defined to enable dragging for the tree.
         *
         * Return false to cancel dragging of node.
         * data.dataTransfer.setData() and .setDragImage() is available
         * here.
         */
//          data.dataTransfer.setDragImage($("<div>hurz</div>").appendTo("body")[0], -10, -10);
        return true;
      },
      dragDrag: function(node, data) {
        data.dataTransfer.dropEffect = "move";
      },
      dragEnd: function(node, data) {
      },

      // --- Drop-support:
      dragEnter: function(node, data) {
        // node.debug("dragEnter", data);
        data.dataTransfer.dropEffect = "move";
        // data.dataTransfer.effectAllowed = "copy";
        return true;
      },
      dragOver: function(node, data) {
        data.dataTransfer.dropEffect = "move";
        // data.dataTransfer.effectAllowed = "copy";
      },
      dragLeave: function(node, data) {
        // alert(node.id);
      },

      dragDrop: function(node, data) {
        if ((node.parent.key).substr(0,4) == 'root'){
          msgNotify('Los parametros no se pueden mover a un nivel superior de la Raíz.','Cuidado', 4);
        }else{
          bootbox.confirm({
            title: "¿Desea Reubicar el Parametro?",
            message: "¿Desea mover el nodo <b>" + data.otherNode.title + "</b> hasta el nodo <b>" + node.title  + "</b> ?",
            buttons: {
              confirm: {
                label: 'Mover'
              },
              cancel: {
                label: 'Cancelar'
              }
            },
            callback: function (result) {
              if (result === true){
                  if( data.otherNode ) {
                  // Drop another Fancytree node from same frame
                  // (maybe from another tree however)
                  var sameTree = (data.otherNode.tree === data.tree);
      
                  data.otherNode.moveTo(node, data.hitMode);
                } else if( data.otherNodeData ) {
                  // Drop Fancytree node from different frame or window, so we only have
                  // JSON representation available
                  node.addChild(data.otherNodeData, data.hitMode);
                } else {
                  // Drop a non-node
                  node.addNode({
                    title: transfer.getData("text")
                  }, data.hitMode);
                }
                node.setExpanded();
                node.toggleSelected()
                $('#padreParametro').text(node.title);
                reubicarNodo(node.key);
              }
            }
          });            
        }

      }
    },
  });
  var tree = $("#treeParametro").fancytree("getTree"),
  node = tree.getNodeByKey($('#id').val());
  node.parent.toggleSelected()
  $('#padreParametro').text(node.parent.title);
  $("#treeParametro").fancytree("getTree").activateKey($('#id').val());
};


function reubicarNodo(){
  var data = {
      'id': $('#id').val(),
      'parent_id': $('#frmReubicacion #parent_id').val()
    };
    
  $.ajax({
    type: 'POST',
    dataType: "json",
    async: true,
    data: data,
    url: '/parametros/reubicarParametro',
    success: function(data) {
      location.reload();
    },
    error: function(data) {}
  });
};

function nuevoParametro(){
  $('#frmParametro')[0].reset();
};

function verReubicar(){
  $('#spActPos').text($('#padreParametro').text());
  $('#mdlMoverParametro').modal('show');
}
