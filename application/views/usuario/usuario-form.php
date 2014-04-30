<aside class="right-side">
    <section class="content-header">
    
        <h1>
            <?php echo $titulo?> de usuario
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
<?php
if(isset($proceso_form) and $proceso_form === FALSE){
	print_r($error);
}
?>
<div id="errorNombre" class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El campo del nombre no puede estar vacio.</b>
</div>
<div id="errorApellido" class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El campo del apellido no puede estar vacio.</b>
</div>
<div id="errorCorreo" class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El formato del campo correo no es el correcto.</b>
</div>
<div id="errorUsuario" class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El campo del usuario no puede estar vacio.</b>
</div>
<div id="errorPass1" class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El campo del password no puede estar vacio.</b>
</div>
<div id="errorPass2" class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El campo de la confirmación del password no puede estar vacio y debe coincidir con el password.</b>
</div>
        <div class="row">
	        <div class="col-md-12">
	            <!-- general form elements -->
	            <div class="box box-primary"><!-- /.box-header -->
	                <!-- form start -->
	                <form id="formRegistroUsuario" action="<?php echo site_url($url_form);?>" 
	                	  role="form" 
	                	  method="post">
	                    <div class="box-body">
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Nombre:</label>
	                            <input type="text" name="nombre" 
	                            	   class="form-control" id="exampleInputEmail1" 
	                            	   value="<?php if(isset($usuario['nombre'])) echo $usuario['nombre']?>" placeholder="">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Apellidos:</label>
	                            <input type="text" name="apellido" 
	                            	   class="form-control" id="exampleInputEmail1" 
	                            	   value="<?php if(isset($usuario['apellido'])) echo $usuario['apellido']?>" placeholder="">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Correo electr&oacute;niico:</label>
	                            <input type="text" name="email" class="form-control" 
	                            id="exampleInputEmail1" 
	                            value="<?php if(isset($usuario['email'])) echo $usuario['email']?>" placeholder="">
	                        </div>
	                        
	          
	                        <?php if(!isset($id)):?>
	                        
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Usuario:</label>
	                            <input type="text" name="usuario" class="form-control" id="exampleInputEmail1" placeholder="">
	                        </div>
	                        <?php else:?>
	                        
	                        <input type="hidden" 
	                        	   name="id_usuario" value="<?php echo $id?>">
	                        
	                        <?php endif;?>
	                        
	                        <div class="form-group">
	                            <label for="exampleInputPassword1">Contrase&ntilde;a</label>
	                            <input type="password" name="password" 
	                            	   class="form-control" id="exampleInputPassword1" 
	                            	   value="<?php if(isset($usuario['password'])) echo $usuario['password']?>" placeholder="">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputPassword1">Confirmar contrase&ntilde;a</label>
	                            <input type="password" name="confirm_password" 
	                            class="form-control" id="exampleInputPassword1" 
	                            value="<?php if(isset($usuario['password'])) echo $usuario['password']?>" placeholder="">
	                        </div>
	                    </div><!-- /.box-body -->

	                    <div class="box-footer">
	                        <button id="btnUsuarioRegistro" type="submit" class="btn btn-primary">Enviar</button>
	                    </div>
	                </form>
	            </div>
	        </div>
		</div>
    </section>
</aside>