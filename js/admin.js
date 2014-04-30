$('#btnUsuarioRegistro').on('click',enviarFormularioUsuario);

function enviarFormularioUsuario(){

    $("#formRegistroUsuario").submit(function(event) {

        event.preventDefault();

        var $form = $( this ),
            nombre = $form.find( 'input[name="nombre"]' ).val(),
            apellido = $form.find( 'input[name="apellido"]' ).val(),
            mail = $form.find( 'input[name="email"]' ).val(),
            user = $form.find( 'input[name="usuario"]' ).val(),
            pass1 = $form.find( 'input[name="password"]' ).val(),
            pass2 = $form.find( 'input[name="confirm_password"]' ).val(),
            url = $form.attr( 'action' );

        var contador = 0;

        if(nombre == ''){
            $form.find( 'input[name="nombre"]' ).css('box-shadow','0 0 1px 1px #F45');
            contador++
            $('#errorNombre').show();
        }
        else{
            $form.find( 'input[name="nombre"]' ).css('box-shadow','0 0 2px 1px #aaa');
            $('#errorNombre').hide();
        }
        
        if(apellido == ''){
            $form.find( 'input[name="apellido"]' ).css('box-shadow','0 0 1px 1px #F45');
            contador++
            $('#errorApellido').show();
        }
        else{
            $form.find( 'input[name="apellido"]' ).css('box-shadow','0 0 2px 1px #aaa');
            $('#errorApellido').hide();
        }

        if(mail == '' || !ValidaMail(mail)){
            $form.find( 'input[name="email"]' ).css('box-shadow','0 0 1px 1px #F45');
            contador++
            $('#errorCorreo').show();
        }
        else{
            $form.find( 'input[name="email"]' ).css('box-shadow','0 0 2px 1px #aaa');
            $('#errorCorreo').hide();
        }

        if(user == ''){
            $form.find( 'input[name="usuario"]' ).css('box-shadow','0 0 1px 1px #F45');
            contador++
            $('#errorUsuario').show();
        }
        else{
            $form.find( 'input[name="usuario"]' ).css('box-shadow','0 0 2px 1px #aaa');
            $('#errorUsuario').hide();
        }

        if(pass1 == ''){
            $form.find( 'input[name="password"]' ).css('box-shadow','0 0 1px 1px #F45');
            contador++
            $('#errorPass1').show();
        }
        else{
            $form.find( 'input[name="password"]' ).css('box-shadow','0 0 2px 1px #aaa');
            $('#errorPass1').hide();
        }

        if(pass2 == '' || pass1 != pass2){
            $form.find( 'input[name="confirm_password"]' ).css('box-shadow','0 0 1px 1px #F45');
            contador++
            $('#errorPass2').show();
        }
        else{
            $form.find( 'input[name="confirm_password"]' ).css('box-shadow','0 0 2px 1px #aaa');
            $('#errorPass2').hide();
        }

        if(contador <= 0){
			$("#formRegistroUsuario").unbind('submit'); 
			console.log('bien');
        }
        else{
            console.log('Error');
        }
    });
}

function ValidaMail(mail) {
	var er = /^[0-9a-z_\-\.]+@([a-z0-9\-]+\.?)*[a-z0-9]+\.([a-z]{2,4}|travel)$/i;
	return er.test(mail);
}