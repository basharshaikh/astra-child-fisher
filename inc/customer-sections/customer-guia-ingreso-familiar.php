<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<!-- balance general -->
<div class="fman-single-item fman-finan-info">
	<h3>
		Guía para Ingreso - Casado
		<div class="fman-chevicon-header">
			<?php echo $chev_icn; ?>
		</div>
	</h3>


	<div class="fman-table">

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
				$familiar_10000_total = 0;
				$familiar_15000_total = 0;
				$familiar_20000_total = 0;
				$familiar_25000_total = 0;
				$familiar_30000_total = 0;
				$familiar_35000_total = 0;
				$familiar_40000_total = 0;
				$familiar_45000_total = 0;
				$familiar_50000_total = 0;
				$familiar_60000_total = 0;
				$familiar_70000_total = 0;
				$familiar_80000_total = 0;
				$familiar_90000_total = 0;
				$familiar_100000_total = 0;
				$familiar_100000pl_total = 0;
				if($guia_ingreso_familiar){
				foreach ($guia_ingreso_familiar as $familiar) {
					$familiar_10000_total += $familiar['-10000'];
					$familiar_15000_total += $familiar['15000'];
					$familiar_20000_total += $familiar['20000'];
					$familiar_25000_total += $familiar['25000'];
					$familiar_30000_total += $familiar['30000'];
					$familiar_35000_total += $familiar['35000'];
					$familiar_40000_total += $familiar['40000'];
					$familiar_45000_total += $familiar['45000'];
					$familiar_50000_total += $familiar['50000'];
					$familiar_60000_total += $familiar['60000'];
					$familiar_70000_total += $familiar['70000'];
					$familiar_80000_total += $familiar['80000'];
					$familiar_90000_total += $familiar['90000'];
					$familiar_100000_total += $familiar['100000'];
					$familiar_100000pl_total += $familiar['100000+'];
			?>
			<tr>
				<td><?php echo $familiar['categorias_de_gastos'] ?></td>
				<td><?php echo $familiar['-10000'] ?></td>
				<td><?php echo $familiar['15000'] ?></td>
				<td><?php echo $familiar['20000'] ?></td>
				<td><?php echo $familiar['25000'] ?></td>
				<td><?php echo $familiar['30000'] ?></td>
				<td><?php echo $familiar['35000'] ?></td>
				<td><?php echo $familiar['40000'] ?></td>
				<td><?php echo $familiar['45000'] ?></td>
				<td><?php echo $familiar['50000'] ?></td>
				<td><?php echo $familiar['60000'] ?></td>
				<td><?php echo $familiar['70000'] ?></td>
				<td><?php echo $familiar['80000'] ?></td>
				<td><?php echo $familiar['90000'] ?></td>
				<td><?php echo $familiar['100000'] ?></td>
				<td><?php echo $familiar['100000+'] ?></td>
			</tr>
			<?php }} ?>

			<tr>
				<th>Total Gastos</th>
				<th><?php echo $familiar_10000_total ?></th>
				<th><?php echo $familiar_15000_total ?></th>
				<th><?php echo $familiar_20000_total ?></th>
				<th><?php echo $familiar_25000_total ?></th>
				<th><?php echo $familiar_30000_total ?></th>
				<th><?php echo $familiar_35000_total ?></th>
				<th><?php echo $familiar_40000_total ?></th>
				<th><?php echo $familiar_45000_total ?></th>
				<th><?php echo $familiar_50000_total ?></th>
				<th><?php echo $familiar_60000_total ?></th>
				<th><?php echo $familiar_70000_total ?></th>
				<th><?php echo $familiar_80000_total ?></th>
				<th><?php echo $familiar_90000_total ?></th>
				<th><?php echo $familiar_100000_total ?></th>
				<th><?php echo $familiar_100000pl_total ?></th>
			</tr>


		</table>
		
	</div>	
</div>