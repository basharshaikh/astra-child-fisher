<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div class="fman-single-item fman-personal-info">
	<h3>
		Información Personal
		<div class="fman-chevicon-header">
			<?php echo $chev_icn; ?>
		</div>
	</h3>

	<div class="fman-table">
		<!-- Titular -->
		<table border="1" class="titular">
		    <tr class="has-gray-bg">
		        <th colspan="2">Titular</th>
		        <th colspan="2">Servicio</th>
		    </tr>
		    <tr>
		        <th width="25%">Nombres</th>
		        <td width="25%"><?php echo $titular['nombres'] ?></td>
		        <th width="25%">Profesión</th>
		        <td width="25%"><?php echo $titular['profesion'] ?></td>
		    </tr>
		    <tr>
		        <th>Apellidos</th>
		        <td><?php echo $titular['apellidos'] ?></td>
		        <th>Empleador</th>
		        <td><?php echo $titular['empleador'] ?></td>
		    </tr>
		    <tr>
		        <th>Fecha de nacimiento</th>
		        <td><?php echo $titular['fecha_de_nacimiento'] ?></td>
		        <th>Nombre del puesto</th>
		        <td><?php echo $titular['nombre_del_puesto'] ?></td>
		    </tr>
		    <tr>
		        <th>Estado civil</th>
		        <td><?php echo $titular['estado_civil'] ?></td>
		        <th>Teléfono casa</th>
		        <td><?php echo $titular['telefono_casa'] ?></td>
		    </tr>
		    <tr>
		        <th>País de nacimiento</th>
		        <td><?php echo $titular['pais_de_nacimiento'] ?></td>
		        <th>Teléfono oficina</th>
		        <td><?php echo $titular['telefono_oficina'] ?></td>
		    </tr>
		    <tr>
		        <th>Nacionalidad</th>
		        <td><?php echo $titular['nacionalidad'] ?></td>
		        <th>Teléfono celular</th>
		        <td><?php echo $titular['telefono_celular'] ?></td>
		    </tr>
		    <tr>
		        <th>DUI</th>
		        <td><?php echo $titular['dui'] ?></td>
		        <th>Correo electrónico</th>
		        <td><?php echo $titular['correo_electronico'] ?></td>
		    </tr>
		    <tr>
		        <th>NIT</th>
		        <td><?php echo $titular['nit'] ?></td>
		        <th>Sexo</th>
		        <td><?php echo $titular['sexo'] ?></td>
		    </tr>
		</table>


		<!-- Cónyuge -->
		<table border="1" class="conyuge">
		    <tr class="has-gray-bg">
		        <th colspan="2">Cónyuge</th>
		        <th colspan="2">Servicio</th>
		    </tr>
		    <tr>
		        <th width="25%">Nombres</th>
		        <td width="25%"><?php echo $conyuge['nombres'] ?></td>
		        <th width="25%">Profesión</th>
		        <td width="25%"><?php echo $conyuge['profesion'] ?></td>
		    </tr>
		    <tr>
		        <th>Apellidos</th>
		        <td><?php echo $conyuge['apellidos'] ?></td>
		        <th>Empleador</th>
		        <td><?php echo $conyuge['empleador'] ?></td>
		    </tr>
		    <tr>
		        <th>Fecha de nacimiento</th>
		        <td><?php echo $conyuge['fecha_de_nacimiento'] ?></td>
		        <th>Nombre del puesto</th>
		        <td><?php echo $conyuge['nombre_del_puesto'] ?></td>
		    </tr>
		    <tr>
		        <th>Estado civil</th>
		        <td><?php echo $conyuge['estado_civil'] ?></td>
		        <th>Teléfono casa</th>
		        <td><?php echo $conyuge['telefono_casa'] ?></td>
		    </tr>
		    <tr>
		        <th>País de nacimiento</th>
		        <td><?php echo $conyuge['pais_de_nacimiento'] ?></td>
		        <th>Teléfono oficina</th>
		        <td><?php echo $conyuge['telefono_oficina'] ?></td>
		    </tr>
		    <tr>
		        <th>Nacionalidad</th>
		        <td><?php echo $conyuge['nacionalidad'] ?></td>
		        <th>Teléfono celular</th>
		        <td><?php echo $conyuge['telefono_celular'] ?></td>
		    </tr>
		    <tr>
		        <th>DUI</th>
		        <td><?php echo $conyuge['dui'] ?></td>
		        <th>Correo electrónico</th>
		        <td><?php echo $conyuge['correo_electronico'] ?></td>
		    </tr>
		    <tr>
		        <th>NIT</th>
		        <td><?php echo $conyuge['nit'] ?></td>
		        <th>Sexo</th>
		        <td><?php echo $conyuge['sexo'] ?></td>
		    </tr>
		</table>

		<!-- Dependiente -->
		<?php 
		$i = 0;
		if($dependientes['dependientes']){
		foreach ($dependientes['dependientes'] as $dependiente) { 
			$i++;
			$dep_age   = fman_get_age_from_adate($dependiente['fecha_de_nacimiento']);
			if($dep_age){
				$dep_gradu = fman_graduation_status_from_age($dep_age);
			} else {
				$dep_gradu = '';
			}
			
		?>
		<table border="1" class="dependiente">
		    <tr class="has-gray-bg">
		        <th colspan="4">Dependiente <?php echo $i ?></th>
		    </tr>
		    <tr>
		        <th width="25%">Nombres</th>
		        <td width="25%"><?php echo $dependiente['nombres'] ?></td>
		        <th width="25%">Institución</th>
		        <td width="25%"><?php echo $dependiente['institucion'] ?></td>
		    </tr>
		    <tr>
		        <th>Apellidos</th>
		        <td><?php echo $dependiente['apellidos'] ?></td>
		        <th>Nivel</th>
		        <td><?php echo $dependiente['nivel'] ?></td>
		    </tr>
		    <tr>
		        <th>Fecha de nacimiento</th>
		        <td><?php echo $dependiente['fecha_de_nacimiento'] ?></td>
		        <th>Año de graduación</th>
		        <td><?php echo $dep_gradu ?></td>
		    </tr>
		    <tr>
		        <th>Edad</th>
		        <td><?php echo $dep_age; ?></td>
		        <th>¿Estudiará fuera del país?</th>
		        <td><?php echo $dependiente['estudiara_fuera_del_pais'] ?></td>
		    </tr>
		    <tr>
		        <th>¿Dependiente?</th>
		        <td><?php echo $dependiente['dependiente'] ?></td>
		</table>
		<?php }} ?>
		
		<table border="1" class="dependiente">
		    <tr class="has-gray-bg">
		        <th>Note</th>
		    </tr>
		    <tr>
				<td><?php echo $note_personal_info; ?></td>
		    </tr>
		</table>
	</div>
</div>