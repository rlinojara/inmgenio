<aside class="right-side">
    <section class="content-header">
        <h1>
            Perfil
            <small>Desde aquí podrás actualizar los diferentes campos de tu perfil</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
	        <div class="col-md-12">
	            <!-- general form elements -->
	            <div class="box box-primary">
	                <div class="box-header">
	                    <h3 class="box-title">Datos de perfil</h3>
	                </div><!-- /.box-header -->
	                <!-- form start -->
	                <form role="form" method="post" action="<?php echo site_url('usuario/set_editar_perfil')?>">
	                    <div class="box-body">
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Correo electr&oacute;nico:</label>
	                            <input type="text" class="form-control" id="exampleInputEmail1"
	                            	   name="email" 
	                            	   value="<?php echo $usuario['email']?>" placeholder="">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputPassword1">Contrase&ntilde;a antigua</label>
	                            <input type="password" name="password_actual" class="form-control" id="exampleInputPassword1" placeholder="">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputPassword1">Nueva contrase&ntilde;a</label>
	                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputPassword1">Confirmar nueva contrasee&ntilde;a</label>
	                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="">
	                        </div>
	                    </div><!-- /.box-body -->

	                    <div class="box-footer">
	                        <button type="submit" class="btn btn-primary">Enviar</button>
	                    </div>
	                </form>
	            </div>
	        </div>
		</div>
    </section>
</aside>