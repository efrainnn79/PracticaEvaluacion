<div class="container">
  <div class="row">
    <div class="col-md-12">

<h1>Lista de estudiantes deshabilitados</h1>

    <?php echo form_open_multipart('estudiante/index'); ?>
    <button type="submit" name="buton2" class="btn btn-primary">VER ESTUDIANTES HABILIDOS</button>
    <?php echo form_close(); ?>

    <br>
   
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Primer Apellido</th>
      <th scope="col">Segundo Apelldio</th>
      <th scope="col">Nota</th>
      <th scope="col">Habilitar</th>
    </tr>
  </thead>
  <tbody>


<?php
$indice=1;
foreach ($estudiantes->result() as $row)
{
    ?>
     <tr>
      <th scope="row"><?php echo $indice; ?></th>
      <td><?php echo $row->nombre; ?></td>
      <td><?php echo $row->primerApellido; ?></td>
      <td><?php echo $row->segundoApellido; ?></td>
      <td><?php echo $row->nota; ?></td>
      
      

      <td>
        <?php echo form_open_multipart("estudiante/habilitarbd"); ?>
        <input type="hidden" name="idestudiante" value="<?php echo $row->idEstudiante; ?>">
        <input type="submit" name="buttonz" value="habilitar" class="btn btn-warning">
        <?php echo form_close(); ?>
      </td>

    </tr>
    <?php
    $indice++;
}
?>



    
    
    
  </tbody>
</table>


    </div>
  </div>
</div>