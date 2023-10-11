<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<!-- balance general -->
<div class="fman-single-item fman-finan-info">
	<h3>
		Guía para Ingreso - Soltero
		<div class="fman-chevicon-header">
			<?php echo $chev_icn; ?>
		</div>
	</h3>


	<div class="fman-table">

		<!-- Activos balanace -->
		<table>
			<tr>
				<th class="has-gray-bg" colspan="16">Categorías de Gastos</th>
			</tr>

			<tr>
				<th>Ingresos Anuales</th>
				<th>-$10,000</th>
				<th>$15,000</th>
				<th>$20,000</th>
				<th>$25,000</th>
				<th>$30,000</th>
				<th>$35,000</th>
				<th>$40,000</th>
				<th>$45,000</th>
				<th>$50,000</th>
				<th>$60,000</th>
				<th>$70,000</th>
				<th>$80,000</th>
				<th>$90,000</th>
				<th>$100,000</th>
				<th>$100,000+</th>
			</tr>

			<?php 
				$soltero_10000_total = 0;
				$soltero_15000_total = 0;
				$soltero_20000_total = 0;
				$soltero_25000_total = 0;
				$soltero_30000_total = 0;
				$soltero_35000_total = 0;
				$soltero_40000_total = 0;
				$soltero_45000_total = 0;
				$soltero_50000_total = 0;
				$soltero_60000_total = 0;
				$soltero_70000_total = 0;
				$soltero_80000_total = 0;
				$soltero_90000_total = 0;
				$soltero_100000_total = 0;
				$soltero_100000pl_total = 0;
				if($guia_ingreso_soltero){
				foreach ($guia_ingreso_soltero as $soltero) {
					$soltero_10000_total += $soltero['-10000'];
					$soltero_15000_total += $soltero['15000'];
					$soltero_20000_total += $soltero['20000'];
					$soltero_25000_total += $soltero['25000'];
					$soltero_30000_total += $soltero['30000'];
					$soltero_35000_total += $soltero['35000'];
					$soltero_40000_total += $soltero['40000'];
					$soltero_45000_total += $soltero['45000'];
					$soltero_50000_total += $soltero['50000'];
					$soltero_60000_total += $soltero['60000'];
					$soltero_70000_total += $soltero['70000'];
					$soltero_80000_total += $soltero['80000'];
					$soltero_90000_total += $soltero['90000'];
					$soltero_100000_total += $soltero['100000'];
					$soltero_100000pl_total += $soltero['100000+'];
			?>
			<tr>
				<td><?php echo $soltero['categorias_de_gastos'] ?></td>
				<td><?php echo $soltero['-10000'] ?></td>
				<td><?php echo $soltero['15000'] ?></td>
				<td><?php echo $soltero['20000'] ?></td>
				<td><?php echo $soltero['25000'] ?></td>
				<td><?php echo $soltero['30000'] ?></td>
				<td><?php echo $soltero['35000'] ?></td>
				<td><?php echo $soltero['40000'] ?></td>
				<td><?php echo $soltero['45000'] ?></td>
				<td><?php echo $soltero['50000'] ?></td>
				<td><?php echo $soltero['60000'] ?></td>
				<td><?php echo $soltero['70000'] ?></td>
				<td><?php echo $soltero['80000'] ?></td>
				<td><?php echo $soltero['90000'] ?></td>
				<td><?php echo $soltero['100000'] ?></td>
				<td><?php echo $soltero['100000+'] ?></td>
			</tr>
			<?php }} ?>

			<tr>
				<th>Total Gastos</th>
				<th><?php echo $soltero_10000_total ?></th>
				<th><?php echo $soltero_15000_total ?></th>
				<th><?php echo $soltero_20000_total ?></th>
				<th><?php echo $soltero_25000_total ?></th>
				<th><?php echo $soltero_30000_total ?></th>
				<th><?php echo $soltero_35000_total ?></th>
				<th><?php echo $soltero_40000_total ?></th>
				<th><?php echo $soltero_45000_total ?></th>
				<th><?php echo $soltero_50000_total ?></th>
				<th><?php echo $soltero_60000_total ?></th>
				<th><?php echo $soltero_70000_total ?></th>
				<th><?php echo $soltero_80000_total ?></th>
				<th><?php echo $soltero_90000_total ?></th>
				<th><?php echo $soltero_100000_total ?></th>
				<th><?php echo $soltero_100000pl_total ?></th>
			</tr>


		</table>
		
	</div>	
</div>