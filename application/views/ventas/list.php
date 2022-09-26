<!-- Begin Page Content -->
<div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Administrador de ventas</h1>
            <p class="mb-4">En esta tabla se mostrara todas las ventas realizadas por cada distrbuidor </p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Listado de ventas</h6>
                </div>
                            
    <div class="card-body">
                            <span class="float-right" data-toggle="tooltip" data-placement="top" title="Nuevo usuario">
                                <button type="button" class="btn float-left bg-primary text-white" data-toggle="modal" data-target="#insertarUsuario">
                                <i class="fas fa-plus"></i> 
                                </button>
                            </span>
                            <br>
                            <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Precio Venta</th>
                        <th>Cantidad</th>
                        <th>Fecha Registro</th>
                        <th>Cliente</th>
                        <th>Monto Recaudado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Precio Venta</th>
                        <th>Cantidad</th>
                        <th>Fecha Registro</th>
                        <th>Cliente</th>
                        <th>Monto Recaudado</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                <tbody>
                                    <?php
                                    $num = 1;
                                    foreach ($infoVentas->result() as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $num;?></td>
                                            <td>
                                              <?php
                                              $foto=$row->imagen;
                                              $precio2=$row->precioVenta;
                                              $cantidad2=$row->cantidad;
                                              if($foto==""){
                                                //mostrar imagen por defecto
                                                ?>
                                                <img width="100" src="<?php echo base_url(); ?>/uploads/personal/perfil.png" alt="">

                                                <?php

                                               
                                              }else{
                                                //mostrar la foto del usuario
                                                ?>
                                                <img width="100" src="<?php echo base_url(); ?>/uploads/personal/<?php echo $foto; ?>" alt="">
                                                <?php

                                              }
                                              ?>
                                            </td>
                                            <td><?php echo $row->nombres; ?></td>
                                            <td><?php echo $row->apellidopat; ?></td>
                                            <td><?php echo $row->apellidomat; ?></td>
                                            <td><?php echo $row->precioVenta; ?></td>
                                            <td><?php echo $row->cantidad; ?></td>
                                            <td ><?php echo formatearFecha($row->Fecha); ?></td>
                                             <td><?php echo $row->nombreCliente; ?></td>
                                             <td><?php echo $precio2 * $cantidad2; ?></td>
                                             <td>
                                                    <div class="row">
                                                    <div class="col-md-6 col-6">
                                                        <!--<button class="btn btn-block btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></button>-->
                                                        <span data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <button type="button" class="btn btn-block btn-sm btn-info" data-toggle="modal" data-target="#editarUsuario<?php echo $row->cantidad; ?>">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-6 col-6">
                                                        <?php
                                                        if ($row->cantidad == "1") {
                                                        ?>
                                                            <!--<button class="btn btn-block btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash-alt"></i></button>-->
                                                            <span data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                                <button type="button" class="btn btn-block btn-sm btn-danger" data-toggle="modal" data-target="#eliminarUsuario<?php echo $row->cantidad; ?>">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </span>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <!--<button class="btn btn-block btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Restaurar"><i class="fas fa-trash-restore"></i></button>-->
                                                            <span data-toggle="tooltip" data-placement="top" title="Restaurar">
                                                                <button type="button" class="btn btn-block btn-sm btn-success" data-toggle="modal" data-target="#restaurarUsuario<?php echo $row->cantidad; ?>">
                                                                    <i class="fas fa-trash-restore"></i>
                                                                </button>
                                                            </span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </td>
                                                                      
                                        </tr>
                                    <?php
                                    $num++;
                                    }

                                    ?>
                                </tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

   

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->