<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<div class="fman-single-item fman-finan-info">
	<h3>
		Calculo de provisiones
		<div class="fman-chevicon-header">
			<?php echo $chev_icn; ?>
		</div>
	</h3>


	<div class="fman-table">
		<!-- <tr><td colspan="7"></td></tr> -->
		<table>
			<tr>
				<th class="has-gray-bg">Concepto</th>
				<th class="has-gray-bg">Gasto proyectado</th>
				<th class="has-gray-bg">No. de personas o artículos</th>
				<th class="has-gray-bg">Total a provisionar</th>
				<th class="has-gray-bg">Frecuencia (Meses)</th>
				<th class="has-gray-bg">Provisión</th>
				<th class="has-gray-bg">Provisión mensual</th>
			</tr>

			<tr><td colspan="7"></td></tr>

			<tr class="has-gray-bg">
				<th colspan="5">Casa</th>
				<th>Provisión</th>
				<th>$</th>
			</tr>
			<tr>
				<th colspan="6">Mantenimiento y reparaciones</th>
				<th>$<?php echo number_format($provi__manten_repa_total, 2); ?></th>
			</tr>


			<?php 
			if($provi__manten_repa_arr){
				foreach ($provi__manten_repa_arr as $mante_rep) {
			?>
			<tr>
				<td><?php echo $mante_rep['concepto'] ?></td>
				<td><?php echo $mante_rep['gasto_proyectado'] ?></td>
				<td><?php echo $mante_rep['no_de_personas_articulos'] ?></td>
				<td><?php echo $mante_rep['total_provisio'] ?></td>
				<td><?php echo $mante_rep['frecuencia_meses'] ?></td>
				<td><?php echo $mante_rep['only_provisio'] ?></td>
				<td><?php echo $mante_rep['provision_mensual'] ?></td>
			</tr>
			<?php }} ?>
			<tr><td colspan="7"></td></tr>



			<!-- Reposición Art. De Hogar -->
			<tr class="has-gray-bg">
				<th colspan="6">Reposición Art. De Hogar</th>
				<th>$<?php echo number_format($provision_ttl, 2) ?></th>
			</tr>
			<tr class="has-gray-bg">
				<th colspan="6">Sala</th>
				<th></th>
			</tr>

			<?php 
				if($posesiones__sala_arr){
				foreach ($posesiones__sala_arr as $sala) {
			?>
			<tr>
				<td><?php echo $sala['concepto'] ?></td>
				<td><?php echo $sala['precio_compra'] ?></td>
				<td><?php echo $sala['cantidad'] ?></td>
				<td><?php echo $sala['calc_prov_ttl_a_prov'] ?></td>
				<td><?php echo $sala['calc_prov_frequ_meses'] ?></td>
				<td><?php echo $sala['provision'] ?></td>
				<td><?php echo $sala['provision_mensual'] ?></td>
			</tr>
			<?php }} ?>
			<tr><td colspan="7"></td></tr>
		</table>

	</div>	
</div>

