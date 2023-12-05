$('#login-button').click(function(){
    $('#login-button').fadeOut("slow",function(){
      $("#container").fadeIn();
      TweenMax.from("#container", .4, { scale: 0, ease:Sine.easeInOut});
      TweenMax.to("#container", .4, { scale: 1, ease:Sine.easeInOut});
    });
  });
  
  $(".close-btn").click(function(){
    TweenMax.from("#container", .4, { scale: 1, ease:Sine.easeInOut});
    TweenMax.to("#container", .4, { left:"0px", scale: 0, ease:Sine.easeInOut});
    $("#container, #forgotten-container").fadeOut(800, function(){
      $("#login-button").fadeIn(800);
    });
  });
  
  /* Forgotten Password */
  $('#forgotten').click(function(){
    $("#container").fadeOut(function(){
      $("#forgotten-container").fadeIn();
    });
  });
  
$('#btn-access').click(function (e) {
    e.preventDefault();
    var usuario = $.trim($("#usuario").val());
    var clave = $.trim($("#clave").val());
    if (usuario == "" || clave == "") {
        Swal.fire({
            type: 'warning',
            title: 'Ingrese un usuario y/o contraseña',
        });
        return false;
    } else {
        $.ajax({
            url: "validate.php",
            type: "post",
            datatype: "json",
            data: { usuario: usuario, clave: clave },
            success: function (data) {
                console.log(data);
                if (data == 'null') {
                    Swal.fire({
                        type: 'error',
                        title: 'Usuario y/o clave incorrecta',
                    });
                    return false;
                } else {
                    Swal.fire({
                        type: 'success',
                        title: '¡Conexión exitosa!',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ingresar'
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = '/proyectoVeterinaria/';
                        }
                    })
                }
            }
        });
    }
});