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
<div id="errornombre" class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El campo del nombre no puede estar vacio.</b>
</div>
<div id="errorapellido" class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El campo del apellido no puede estar vacio.</b>
</div>
<div id="errorcorreo" class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El formato del campo correo no es el correcto.</b>
</div>
<div id="errorusuario" class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El campo del usuario no puede estar vacio.</b>
</div>
<div id="errorpass1" class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El campo del password no puede estar vacio.</b>
</div>
<div id="errorpass2" class="alert alert-danger alert-dismissable">
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
	                            	   class="form-control" id="nombre" 
	                            	   value="<?php if(isset($proyecto['nombre'])) echo $proyecto['nombre']?>" placeholder="">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Estado:</label>
	                            <input type="text" name="estado" 
	                            	   class="form-control" id="estado" 
	                            	   value="<?php if(isset($proyecto['nombre'])) echo $proyecto['nombre']?>" placeholder="">
	                        </div>
							<div class="form-group">
                                <label for="txtImagenPrincipal">Imagen principal</label>
                                <input type="file" id="txtImagenPrincipal">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Descripción:</label>
	                            <input type="text" name="descripcion" 
	                            	   class="form-control" id="descripcion" 
	                            	   value="<?php if(isset($proyecto['descripcion'])) echo $proyecto['descripcion']?>" placeholder="">
	                        </div>
							<div class="form-group">
                                <label for="txtLogo">Logo</label>
                                <input type="file" id="txtLogo">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Dirección:</label>
	                            <input type="text" name="direccion" 
	                            	   class="form-control" id="direccion" 
	                            	   value="<?php if(isset($proyecto['nombre'])) echo $proyecto['nombre']?>" placeholder="">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Correo electr&oacute;niico:</label>
	                            <input type="text" name="email" class="form-control" 
	                            id="email" 
	                            value="<?php if(isset($proyecto['email'])) echo $proyecto['email']?>" placeholder="">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Teléfono:</label>
	                            <input type="text" name="telefono" 
	                            	   class="form-control" id="telefono" 
	                            	   value="<?php if(isset($proyecto['telefono'])) echo $proyecto['telefono']?>" placeholder="">
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