<?php

require_once 'conexion.php';

$query = mysqli_query($conexion, "SELECT e.tarea_id,t.id,t.nombreT, GROUP_CONCAT(c.nombreC) FROM tareas t, entradas e, categorias c WHERE t.id = e.tarea_id and c.id = e.categoria_id GROUP BY t.id");

echo '<div class="table-responsive mt-5">
<table  class="table">
  <thead>
    <tr>
      <th scope="col">Tarea </th>
      <th scope="col">Categoría</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>';
   
while($consulta= mysqli_fetch_assoc($query)){
  
    echo '<tr>';
    echo '<td>'.$consulta['nombreT'].'</td>';
    echo '<td><span class="badge badge-secondary">'.$consulta['GROUP_CONCAT(c.nombreC)'].'</span></td>';
    echo '<td>
				<a class="btn btn-danger delete mx-1" tarea_id='.$consulta['tarea_id'].'>X</a>
			</td>';
   echo '</tr>';
}
echo '</tbody></table>';


?>