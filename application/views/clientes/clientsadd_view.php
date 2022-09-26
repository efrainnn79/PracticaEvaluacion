<div class="page-wrapper">

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <form action="<?php echo base_url(); ?>index.php/institutos/insertarInstitutobd" method="post" class="needs-validation" autocomplete="off" novalidate>


                <div class="card shadow redondear-todo">
                        <div class="card-header text-center bg-primary redondear-arriba">
                            <h3 class="card-title text-white">INTRODUZCA DATOS DEL CLIENTE</h3>
                        </div>
                    <div class="card-body">
                            <div class="mb-3">
                                <label for="">Nombre del cliente:<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control text-uppercase" name="nombreInstituto" data-toggle="tooltip" data-placement="left" title="Nombre del cliente" placeholder="Nombre del cliente" required>
                                <div class="valid-feedback">OK.</div>
                                <div class="invalid-feedback">Es necesario el nombre del cliente.</div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                            <label for="">Apellido Paterno:</label>
                                            <input type="text" class="form-control text-uppercase" name="apellidoPaterno" 
                                                data-toggle="tooltip" data-placement="left" title="Apellidos" placeholder="Apellido paterno" required>
                                        <div class="valid-feedback">OK.</div>
                                        <div class="invalid-feedback">Es necesario el apellido paterno.</div>
                                    </div>
                                      <div class="col-md-6">
                                            <label for="">Apellido Materno:</label>
                                            <input type="text" class="form-control text-uppercase" name="apellidoMaterno" data-toggle="tooltip" 
                                                data-placement="left" title="Apellidos" placeholder="Apellido paterno">
                                        <div class="valid-feedback">OK.</div>
                                        <div class="invalid-feedback">Es necesario el apellido materno.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                        <div class="col-md-6">
                                             <label for="">Sexo:</label>
                                                <select class="form-control" name="Sexo" data-toggle="tooltip" data-placement="left" title="Sexo" required>
                                                    <option value selected>Seleccionar</option>
                                                        <option value="F">MASCULUNO</option>
                                                        <option value="M">FEMENINO</option>
                                                </select>
                                                    <div class="valid-feedback">OK.</div>
                                                    <div class="invalid-feedback">Es necesario seleccionar una opcion.</div>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="">Telefono:</label>
                                        <input type="text-uppercase" class="form-control text-uppercase" name="Telefono" data-toggle="tooltip" data-placement="left" title="Dirección" placeholder="Numero de telefono" required>
                                        <div class="valid-feedback">OK.</div>
                                         <div class="invalid-feedback">Es necesario el numero de telefono.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Correo:</label>
                                        <input type="text-uppercase" class="form-control text-uppercase" name="Correo" data-toggle="tooltip" data-placement="left" title="Correo" placeholder="Correo" required>
                                        <div class="valid-feedback">OK.</div>
                                         <div class="invalid-feedback">Es necesario el correo electronico.</div>
                                    </div>

                                    <div class="col-md-6">
                                             <label for="">Tipo Cliente:</label>
                                                <select class="form-control" name="Sexo" data-toggle="tooltip" data-placement="left" title="Sexo" required>
                                                    <option value selected>Seleccionar</option>
                                                        <option value="F">PUBLICO GENERAL</option>
                                                        <option value="M">EMPRESA</option>
                                                </select>
                                                    <div class="valid-feedback">OK.</div>
                                                    <div class="invalid-feedback">Es necesario seleccionar una opcion.</div>
                                    </div>
                                  
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="">DIRECCION DEL DOMICILIO:<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control text-uppercase" name="direccion" data-toggle="tooltip" data-placement="left" title="Nombre del cliente" placeholder="Direccion del domicilio" required>
                                <div class="valid-feedback">OK.</div>
                                <div class="invalid-feedback">Es necesario la direccion del domicilio.</div>
                            </div>
                            <div class="mb-3 float-right">
                                <button type="reset" class="btn btn-dark">Limpiar formulario</button>
                                <a href="<?php echo base_url(); ?>index.php/institutos/index" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Guardar</button>
                            </div>
                    
                    </div>

                    
            
                </div>






            </form>


            </div>
        </div>
    </div>