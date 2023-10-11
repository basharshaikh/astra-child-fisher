<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<div class="fman-single-item fman-finan-info">
	<h3>
		Posesiones Varias
		<div class="fman-chevicon-header">
			<?php echo $chev_icn; ?>
		</div>
	</h3>


	<div class="fman-table">
		<!-- Electrodomésticos -->
		<table>
			<tr class="has-gray-bg">
				<th>Concepto</th>
				<th>Precio Compra</th>
				<th>Cantidad</th>
				<th>Años para cambio</th>
			</tr>

			<tr class="has-gray-bg">
				<th>Electrodomésticos</th>
				<th colspan="3"><?php echo number_format($precio_compra_ttl, 2) ?></th>
			</tr>

			<tr class="has-gray-bg">
				<th>Sala</th>
				<th colspan="3"><?php echo number_format($precio_compra_ttl, 2) ?></th>
			</tr>

			<?php 
				if($posesiones__sala_arr){
				foreach ($posesiones__sala_arr as $sala) {
			?>
			<tr>
				<td><?php echo $sala['concepto'] ?></td>
				<td><?php echo $sala['precio_compra'] ?></td>
				<td><?php echo $sala['cantidad'] ?></td>
				<td><?php echo $sala['anos_para_cambio'] ?></td>
			</tr>
			<?php }} ?>
			
		</table>

	</div>	
</div>