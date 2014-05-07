<aside class="right-side">
    <section class="content-header">
    
        <h1>
            <?php echo $titulo?> de Proyecto
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
	                	  enctype="multipart/form-data" 
	                	  method="post">
	                    <div class="box-body">
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Nombre:</label>
	                            <input type="text" name="nombre" 
	                            	   class="form-control" id="nombre" 
	                            	   value="<?php if(isset($proyecto['nombre'])) echo $proyecto['nombre']?>" placeholder="">
	                        </div>
							<div class="form-group">
                                <label for="txtImagenPrincipal">Imagen principal</label>
                                <input type="file" name="img_principal" id="txtImagenPrincipal">
                                <p class="help-block">
                                 <?php if(isset($proyecto['img_principal']) && strlen($proyecto['img_principal']) > 0):?>
                                 <a target="_blank" href="<?php echo base_url('upload/proyecto/'.$proyecto['img_principal'])?>">Ver Im&aacute;gen principal</a>
                                 <?php endif;?>
                                 Example block-level help text here.
                                </p>
                            </div>
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Descripci&oacute;n:</label>
	                            <input type="text" name="descripcion" 
	                            	   class="form-control" id="descripcion" 
	                            	   value="<?php if(isset($proyecto['descripcion'])) echo $proyecto['descripcion']?>" placeholder="">
	                        </div>
							<div class="form-group">
                                <label for="txtLogo">Logo</label>
                                <input type="file" name="img_logo" id="txtLogo">
                                <p class="help-block">
                                <?php if(isset($proyecto['img_logo']) && strlen($proyecto['img_logo']) > 0):?>
                                 <a target="_blank" href="<?php echo base_url('upload/proyecto/'.$proyecto['img_logo'])?>">Ver el logo</a>
                                 <?php endif;?>
                                Example block-level help text here.
                                </p>
                            </div>
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Direcci&oacute;n:</label>
	                            <input type="text" name="direccion" 
	                            	   class="form-control" id="direccion" 
	                            	   value="<?php if(isset($proyecto['direccion'])) echo $proyecto['direccion']?>" placeholder="">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Correo electr&oacute;nico:</label>
	                            <input type="text" name="email" class="form-control" 
	                            id="email" 
	                            value="<?php if(isset($proyecto['email_contacto'])) echo $proyecto['email_contacto']?>" placeholder="">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Tel&eacute;fono:</label>
	                            <input type="text" name="telefono" 
	                            	   class="form-control" id="telefono" 
	                            	   value="<?php if(isset($proyecto['telefono_contacto'])) echo $proyecto['telefono_contacto']?>" placeholder="">
	                        </div>
	                    </div><!-- /.box-body -->

	                    <div class="box-footer">
	                        <button id="btnUsuarioRegistro" type="submit" class="btn btn-primary">Enviar</button>
	                    </div>
	                    <?php if(isset($id)):?>
	                    
	                    <input type="hidden" name="id_proyecto" 
	                    	   value="<?php echo $id;?>">
	                    
	                    <?php endif;?>
	                </form>
	            </div>
	        </div>
		</div>
    </section>
</aside>