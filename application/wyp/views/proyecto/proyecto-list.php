<aside class="right-side">
    <section class="content-header">
        <h1>
            Listado de proyectos
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
	        <div class="col-md-12">
                <div id="superiorList">
                    <div class="btn-group-vertical">
                        <?php echo anchor('proyecto/registrar_proyecto','Agregar','class="btn btn-primary btn-flat"'); ?>
                    </div>
                </div>
				<div class="box">
                    <div class="box-header">
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tbody>
                            	<tr>
	                                <th style="width: 10px">#</th>
	                                <th>Proyecto</th>
	                                <th>Estado</th>
	                                <th>Correo</th>
	                                <th style="width: 160px">Acciones</th>
                            	</tr>
                            <?php for($i = 0 ; $i < count($proyectos); $i++):?>
                            <tr>
                             	<td>1.</td>
                                <td><?php echo $proyectos[$i]['nombre']?></td>
                                <td>
                                    <?php 
                                        if($proyectos[$i]['estado'] == 1):
                                            echo '<span class="btn btn-success disabled">Activo</span>';
                                        else:
                                            echo '<span class="btn btn-danger disabled">Inactivo</span>';
                                        endif;
                                    ?>
                                </td>
                                <td><?php echo $proyectos[$i]['correo']?></td>
                                <td>
                                    <?php 
                                    echo anchor('proyecto/registrar_proyecto/'.$proyectos[$i]['id_proyecto'],'Editar','class="btn btn-info btn-sm"');
                                    if($proyectos[$i]['estado'] == 1):
                                        echo anchor('proyecto/deshabilitar_proyecto/'.$proyectos[$i]['id_proyecto'].'/'.$pagina,'Deshabilitar','class="btn btn-danger btn-sm"'); 
                                    else:
                                        echo anchor('proyecto/habilitar_proyecto/'.$proyectos[$i]['id_proyecto'].'/'.$pagina,'Habilitar','class="btn btn-success btn-sm"');
                                    endif;
                                    ?>
                                </td>
                            </tr>
                            
                            <?php endfor;?>
                        </tbody></table>
                        
                        <?php echo $paginacion?>
                    </div><!-- /.box-body -->
                </div>
	        </div>
		</div>
    </section>
</aside>