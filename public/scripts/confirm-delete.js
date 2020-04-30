//JQuery por Luis Rojas
$(document).ready(function(){
      $('.btn-delete').on('click', function(){
        
        var id=(this.id);
        $.confirm({
                    theme: 'modern',
                    closeIcon: true,
                    animation: 'scale',
                    type: 'red',
                    title: 'Est&aacute; Seguro.?',
                    content: 'Se dispone a Eliminar un Registro de la Base de Datos. <br> Accion irreversible',
                    icon: 'fa fa-question-circle',
                    animation: 'scale',
                    closeAnimation: 'scale',
                    opacity: 0.5,
                    buttons: {
                        'confirm': {
                            text: 'Aceptar',
                            btnClass: 'btn-red',
                            action: function () {
                          
                                $.confirm({
                                    title: 'Esto puede ser Critico',
                                    content: 'El Registro será Eliminado despues de confirmar.',
                                    icon: 'fa fa-warning',
                                    animation: 'scale',
                                    closeAnimation: 'zoom',
                                    buttons: {
                                        confirm: {
                                            text: 'Si, seguro!',
                                            btnClass: 'btn-orange',
                                            action: function () {
                                                $("#form-destroy-"+id).submit();
                                                }
                                        },
                                        cancel: function () {
                                            }
                                    }
                                });
                            
                            }
                        },
                        cancel: function () {
                        //$.alert('you clicked on <strong>cancel</strong>');
                        },
                    }
                });
   
      });

      $('.btn-denied').on('click', function(){
        $.confirm({
                    theme: 'modern',
                    closeIcon: true,
                    animation: 'scale',
                    type: 'red',
                    title: 'Accion Denegada',
                    content: 'Usted no tiene permisos para Realizar esta Accion',
                    icon: 'fa fa-times-circle',
                    animation: 'scale',
                    closeAnimation: 'scale',
                    opacity: 0.5,
                    buttons: {
                        'confirm': {
                            text: 'Aceptar',
                            btnClass: 'btn-red',
                            action: function () {
                          
                            }
                        },
                    }
                });
      });

});