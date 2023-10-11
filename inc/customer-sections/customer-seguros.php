<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<div class="fman-single-item fman-finan-info">
	<h3>
		Seguros
		<div class="fman-chevicon-header">
			<?php echo $chev_icn; ?>
		</div>
	</h3>

	<div class="fman-table">
		<!-- titular -->
		<table border="1" class="titular">
		    <tr class="has-gray-bg">
		        <th colspan="5"><h5>Gastos Médicos</h5></th>
		        <th colspan="4" class="has-text-center">Primas</th>
		        <th></th>
		    </tr>
		    <tr class="has-gray-bg">
		    	<th>Titular</th>
		    	<th>Compañía</th>
		    	<th>Monto</th>
		    	<th>Deducible</th>
		    	<th>Tipo de Seguro</th>

		    	<th>Mensual</th>
		    	<th>Trimestral</th>
		    	<th>Semestral</th>
		    	<th>Anual</th>

		    	<th>Total Anual</th>
		    </tr>

		    <?php 
		    	if($gastos_medicos){
		    		foreach ($gastos_medicos as $gmedicos) {
		    ?>
		    <tr>
		    	<td><?php echo $gmedicos['titular'] ?></td>
		    	<td><?php echo $gmedicos['compania'] ?></td>
		    	<td><?php echo $gmedicos['monto'] ?></td>
		    	<td><?php echo ($gmedicos['deducible'] == 1) ? 'Yes' : 'N/A' ?></td>
		    	<td><?php echo $gmedicos['tipo_de_seguro'] ?></td>
		    	<td><?php echo $gmedicos['primas_mensual'] ?></td>
		    	<td><?php echo $gmedicos['primas_trimestral'] ?></td>
		    	<td><?php echo $gmedicos['primas_semestral'] ?></td>
		    	<td><?php echo $gmedicos['primas_anual'] ?></td>
		    	<td><?php echo ($gmedicos['primas_mensual'] * 12) + ($gmedicos['primas_trimestral'] * 4) + ($gmedicos['primas_semestral'] * 2) + $gmedicos['primas_anual'] ?></td>
		    </tr>
			<?php }} ?>

			<tr>
				<th>¿Fuma?</th>
				<td><?php echo ($fuma_tit == 1) ? 'Yes' : 'No' ?></td>
			</tr>
		</table>

		<!-- conyuge -->
		<table border="1" class="conyuge">
		    <tr class="has-gray-bg">
		        <th colspan="5"><h5>Gastos Médicos</h5></th>
		        <th colspan="4" class="has-text-center">Primas</th>
		        <th></th>
		    </tr>
		    <tr class="has-gray-bg">
		    	<th>Titular</th>
		    	<th>Compañía</th>
		    	<th>Monto</th>
		    	<th>Deducible</th>
		    	<th>Tipo de Seguro</th>

		    	<th>Mensual</th>
		    	<th>Trimestral</th>
		    	<th>Semestral</th>
		    	<th>Anual</th>

		    	<th>Total Anual</th>
		    </tr>

		    <?php 
		    	if($gastos_medicos_c){
		    		foreach ($gastos_medicos_c as $gmedicos_c) {
		    ?>
		    <tr>
		    	<td><?php echo $gmedicos_c['conyuge'] ?></td>
		    	<td><?php echo $gmedicos_c['compania'] ?></td>
		    	<td><?php echo $gmedicos_c['monto'] ?></td>
		    	<td><?php echo ($gmedicos_c['deducible'] == 1) ? 'Yes' : 'N/A' ?></td>
		    	<td><?php echo $gmedicos_c['tipo_de_seguro'] ?></td>
		    	<td><?php echo $gmedicos_c['primas_mensual'] ?></td>
		    	<td><?php echo $gmedicos_c['primas_trimestral'] ?></td>
		    	<td><?php echo $gmedicos_c['primas_semestral'] ?></td>
		    	<td><?php echo $gmedicos_c['primas_anual'] ?></td>
		    	<td><?php echo ($gmedicos_c['primas_mensual'] * 12) + ($gmedicos_c['primas_trimestral'] * 4) + ($gmedicos_c['primas_semestral'] * 2) + $gmedicos_c['primas_anual'] ?></td>
		    </tr>
			<?php }} ?>

			<tr>
				<th>¿Fuma?</th>
				<td><?php echo ($fuma_cony == 1) ? 'Yes' : 'No' ?></td>
			</tr>
		</table>


		<!-- plan-de-retiro -->
		<table border="1" class="plan-de-retiro">
		    <tr class="has-gray-bg">
		        <th colspan="10" class="has-text-center"><h5>Plan de Retiro</h5></th>
		    </tr>
		    <tr class="has-gray-bg">
		    	<th>Retiro</th>
		    	<th>Compañía</th>
		    	<th>Valor del Aporte</th>
		    	<th>Frecuencia de Pago</th>
		    	<th>Total aportado</th>

		    	<th>Plazo Contratado</th>
		    	<th>Fecha de Incio</th>
		    	<th>Valor del Plan</th>
		    	<th>Valor de Rescate</th>
		    	<th>% de rentabilidad</th>
		    </tr>
		    <?php 
		    $plan_de_rati_total = 0;
		    if($plan_de_retiro['retiro']){
		    	foreach ($plan_de_retiro['retiro'] as $retiro) {
					$fecha_de_incio = $retiro['fecha_de_incio'];
					$valor_del_aporte = $retiro['valor_del_aporte'];
					$today = new DateTime();
					$dateQ26 = new DateTime($fecha_de_incio);
					$daysDifference = $today->diff($dateQ26)->days;
					$total_aportado = ($daysDifference / 30) * $valor_del_aporte;
					$plan_de_rati_total += $retiro['valor_del_plan'];
		    ?>
		    <tr>
		    	<td><?php echo $retiro['retiro'] ?></td>
		    	<td><?php echo $retiro['compania'] ?></td>
		    	<td><?php echo $valor_del_aporte ?></td>
		    	<td><?php echo $retiro['frecuencia_de_pago'] ?></td>

		    	<td><?php echo $total_aportado; ?></td>

		    	<td><?php echo $retiro['plazo_contratado'] ?></td>
		    	<td><?php echo $fecha_de_incio ?></td>
		    	<td><?php echo $retiro['valor_del_plan'] ?></td>
		    	<td><?php echo $retiro['valor_de_rescate'] ?></td>
		    	<td><?php echo $retiro['%_de_rentabilidad'] ?></td>
		    </tr>
			<?php }} ?>
		</table>

		<!-- Vida - Protección de Ingresos -->
		<table border="1" class="vida-Ingresos">
		    <tr class="has-gray-bg">
		        <th colspan="5" class="has-text-center"><h5>Vida - Protección de Ingresos</h5></th>
		        <th colspan="4" class="has-text-center"><small>Primas</small></th>
		        <th colspan="2"></th>
		    </tr>

		    <tr class="has-gray-bg">
		    	<th>Vida</th>
		    	<th>Compañía</th>
		    	<th>Monto</th>
		    	<th>Deducible</th>
		    	<th>Tipo de Seguro</th>

		    	<th>Mensual</th>
		    	<th>Trimestral</th>
		    	<th>Semestral</th>
		    	<th>Anual</th>

		    	<th>Total Anual</th>
		    	<th>Valor de Rescate</th>
		    </tr>
		    <?php 
		    $vida_inge_resct_total = 0;
		    if($vida_prot_ingr['vida']){
		    	foreach ($vida_prot_ingr['vida'] as $vida) {
		    		$primas_mensual = $vida['primas_mensual'];
		    		$primas_trimestral = $vida['primas_trimestral'];
		    		$primas_semestral = $vida['primas_semestral'];
		    		$primas_anual = $vida['primas_anual'];
		    		$total_anual = (($primas_mensual*12) + ($primas_trimestral * 4) + ($primas_semestral * 2) + $primas_anual);
		    		$vida_inge_resct_total += $vida['valor_de_rescate'];
		    ?>
		    <tr>
		    	<td><?php echo $vida['vida'] ?></td>
		    	<td><?php echo $vida['compania'] ?></td>
		    	<td><?php echo $vida['monto'] ?></td>
		    	<td><?php echo $vida['deducible'] ?></td>
		    	<td><?php echo $vida['tipo_de_seguro'] ?></td>

		    	<td><?php echo $vida['primas_mensual'] ?></td>
		    	<td><?php echo $vida['primas_trimestral'] ?></td>
		    	<td><?php echo $vida['primas_semestral'] ?></td>
		    	<td><?php echo $vida['primas_anual'] ?></td>

		    	<td><?php echo $total_anual; ?></td>

		    	<td><?php echo $vida['valor_de_rescate'] ?></td>
		    </tr>
			<?php }} ?>
		</table>

		<!-- Vida - Deuda -->
		<table border="1" class="vida-Deuda">
		    <tr class="has-gray-bg">
		        <th colspan="5" class="has-text-center"><h5>Vida - Deuda</h5></th>
		        <th colspan="4" class="has-text-center"><small>Primas</small></th>
		        <th colspan="2"></th>
		    </tr>

		    <tr class="has-gray-bg">
		    	<th>Vida</th>
		    	<th>Compañía</th>
		    	<th>Monto</th>
		    	<th>Deducible</th>
		    	<th>Tipo de Seguro</th>

		    	<th>Mensual</th>
		    	<th>Trimestral</th>
		    	<th>Semestral</th>
		    	<th>Anual</th>

		    	<th>Total Anual</th>
		    	<th>Valor de Rescate</th>
		    </tr>
		    <?php 
		    $vida_dud_resct_total = 0;
		    if($vida_deuda['vida']){
		    	foreach ($vida_deuda['vida'] as $vida) {
		    		$primas_mensual = $vida['primas_mensual'];
		    		$primas_trimestral = $vida['primas_trimestral'];
		    		$primas_semestral = $vida['primas_semestral'];
		    		$primas_anual = $vida['primas_anual'];
		    		$total_anual = (($primas_mensual*12) + ($primas_trimestral * 4) + ($primas_semestral * 2) + $primas_anual);
		    		$vida_dud_resct_total += $vida['valor_de_rescate'];
		    ?>
		    <tr>
		    	<td><?php echo $vida['vida'] ?></td>
		    	<td><?php echo $vida['compania'] ?></td>
		    	<td><?php echo $vida['monto'] ?></td>
		    	<td><?php echo $vida['deducible'] ?></td>
		    	<td><?php echo $vida['tipo_de_seguro'] ?></td>

		    	<td><?php echo $vida['primas_mensual'] ?></td>
		    	<td><?php echo $vida['primas_trimestral'] ?></td>
		    	<td><?php echo $vida['primas_semestral'] ?></td>
		    	<td><?php echo $vida['primas_anual'] ?></td>

		    	<td><?php echo $total_anual; ?></td>

		    	<td><?php echo $vida['valor_de_rescate'] ?></td>
		    </tr>
			<?php }} ?>
		</table>

		<!-- Daños Residenciales -->
		<table border="1" class="vida-resi">
		    <tr class="has-gray-bg">
		        <th colspan="4" class="has-text-center"><h5>Daños Residenciales</h5></th>
		        <th colspan="4" class="has-text-center"><small>Primas</small></th>
		        <th colspan="1"></th>
		    </tr>

		    <tr class="has-gray-bg">
		    	<th>Info</th>
		    	<th>Compañía</th>
		    	<th>Monto</th>
		    	<th>Deducible</th>

		    	<th>Mensual</th>
		    	<th>Trimestral</th>
		    	<th>Semestral</th>
		    	<th>Anual</th>

		    	<th>Total Anual</th>
		    </tr>
		    <?php if($danos_residenciales['residenciales']){
		    	foreach ($danos_residenciales['residenciales'] as $dresi) {
		    		$primas_mensual = $dresi['primas_mensual'];
		    		$primas_trimestral = $dresi['primas_trimestral'];
		    		$primas_semestral = $dresi['primas_semestral'];
		    		$primas_anual = $dresi['primas_anual'];		
		    		$total_anu_dano = (($primas_mensual * 12) + ($primas_trimestral * 4) + ($primas_semestral * 2) +$primas_anual);
		    ?>
		    <tr>
		    	<td><?php echo $dresi['residencia'] ?></td>
		    	<td><?php echo $dresi['compania'] ?></td>
		    	<td><?php echo $dresi['monto'] ?></td>
		    	<td><?php echo $dresi['deducible'] ?></td>

		    	<td><?php echo $primas_mensual ?></td>
		    	<td><?php echo $primas_trimestral ?></td>
		    	<td><?php echo $primas_semestral ?></td>
		    	<td><?php echo $primas_anual ?></td>

		    	<td><?php echo $total_anu_dano ?></td>
		    </tr>
			<?php }} ?>
		</table>

		<!-- Vehículos -->
		<table border="1" class="vida-vehicle">
		    <tr class="has-gray-bg">
		        <th colspan="4" class="has-text-center"><h5>Vehículos</h5></th>
		        <th colspan="4" class="has-text-center"><small>Primas</small></th>
		        <th colspan="1"></th>
		    </tr>

		    <tr class="has-gray-bg">
		    	<th>Info</th>
		    	<th>Compañía</th>
		    	<th>Monto</th>
		    	<th>Deducible</th>

		    	<th>Mensual</th>
		    	<th>Trimestral</th>
		    	<th>Semestral</th>
		    	<th>Anual</th>

		    	<th>Total Anual</th>
		    </tr>

		    <?php if($seg_vehiculos['vehiculos']){
		    	foreach ($seg_vehiculos['vehiculos'] as $su_vehic) {
		    		$primas_mensual = $su_vehic['primas_mensual'];
		    		$primas_trimestral = $su_vehic['primas_trimestral'];
		    		$primas_semestral = $su_vehic['primas_semestral'];
		    		$primas_anual = $su_vehic['primas_anual'];		
		    		$total_anu_dano = (($primas_mensual * 12) + ($primas_trimestral * 4) + ($primas_semestral * 2) +$primas_anual);
		    ?>
		    <tr>
		    	<td><?php echo $su_vehic['vehiculo'] ?></td>
		    	<td><?php echo $su_vehic['compania'] ?></td>
		    	<td><?php echo $su_vehic['monto'] ?></td>
		    	<td><?php echo $su_vehic['deducible'] ?></td>

		    	<td><?php echo $primas_mensual ?></td>
		    	<td><?php echo $primas_trimestral ?></td>
		    	<td><?php echo $primas_semestral ?></td>
		    	<td><?php echo $primas_anual ?></td>

		    	<td><?php echo $total_anu_dano ?></td>
		    </tr>
			<?php }} ?>
		</table>

		<!-- Legal -->
		<table border="1" class="vida-Deuda">
		    <tr class="has-gray-bg">
		        <th colspan="2" class="has-text-center"><h5>Legal</h5></th>
		    </tr>

		    <tr class="has-gray-bg">
		    	<th width="50%">¿Posee testamento?</th>
		    	<td width="50%"><?php echo ($seg_legal['¿posee_testamento'] == 1) ? 'Yes' : 'No' ?></td>
		    </tr>
		    <tr class="has-gray-bg">
		    	<th width="50%">¿Posee sociedad?</th>
		    	<td width="50%"><?php echo ($seg_legal['¿posee_sociedad'] == 1) ? 'Yes' : 'No' ?></td>
		    </tr>
		    <tr class="has-gray-bg">
		    	<th width="50%">¿Posee poder?</th>
		    	<td width="50%"><?php echo ($seg_legal['¿posee_poder'] == 1) ? 'Yes' : 'No' ?></td>
		    </tr>
		</table>
		<table border="1" class="dependiente">
		    <tr class="has-gray-bg">
		        <th>Note</th>
		    </tr>
		    <tr>
				<td><?php echo $note_seguros; ?></td>
		    </tr>
		</table>
	</div>
</div>