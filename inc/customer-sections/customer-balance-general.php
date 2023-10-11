<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<!-- balance general -->
<div class="fman-single-item fman-finan-info">
	<h3>
		Balance General
		<div class="fman-chevicon-header">
			<?php echo $chev_icn; ?>
		</div>
	</h3>


	<div class="fman-table fman-has-two-table">

		<!-- Activos balanace -->
		<table>
		    <tr class="has-gray-bg">
		        <th colspan="2" class="has-text-center">ACTIVOS - <small>ACTIVO CIRCULANTE</small></th>
		    </tr>

		    <tr>
		    	<th width="50%" class="has-gray-bg">Ctas. Planilleras</th>
		    	<td width="50%"><?php echo $ctas_planill_total ?>.00</td>
		    </tr>

		    <tr>
		    	<th class="has-gray-bg">Ctas. Ahorro</th>
		    	<td><?php echo $ctas_ahorr_total ?>.00</td>
		    </tr>

		    <tr>
		    	<th class="has-gray-bg">Ctas. Corrientes</th>
		    	<td><?php echo $ctas_corrient_total ?>.00</td>
		    </tr>

		    <tr class="has-gray-bg">
		    	<th>TOTAL</th>
		    	<td>$
		    	<?php echo $ctas_total ?>.00</td>
		    </tr>

		    <!-- Inversions --------------------------------------------------------------------------->
		    <tr class="has-gray-bg">
		        <th colspan="2" class="has-text-center">ACTIVOS - <small>INVERSIONES</small></th>
		    </tr>
		    <?php 
		    $bl_depinv_ttl = 0;
		    $bl_depinv_valor_actualttl = 0;
		    if($bl_deop_inves['depositos_e_inversiones_']){
		    	foreach ($bl_deop_inves['depositos_e_inversiones_'] as $bl_depinv) {
		    		$bl_depinv_ttl += $bl_depinv['valor_actual'];
		    ?>
		    <tr>
		    	<td><?php echo $bl_depinv['nombre'] ?></td>
		    	<td><?php echo $bl_depinv['valor_actual'] ?>.00</td>
		    </tr>
			<?php }} ?>
			<!-- bl - Valor de rescate seguro de vida -->
		    <tr>
		    	<td>Valor de rescate seguro de vida</td>
		    	<td>
		    	<?php 
		    		// $vida_inge_resct_total customer-seguros.php - 205
		    		// $vida_dud_resct_total customer-seguros.php - 258
		    		$valor_rescate_seg_vida_total = $vida_inge_resct_total + $vida_dud_resct_total;
		    		echo $valor_rescate_seg_vida_total;
		    	?>.00
		    	</td>
		    </tr>
			<!-- bl - Plan de retiro -->
		    <tr>
		    	<td>Plan de retiro</td>
		    	<td><?php echo $plan_de_rati_total; //customer-seguros.php - 154 ?>.00</td>
		    </tr>
			<!-- bl - saldo de AFP -->
		    <tr>
		    	<td>Saldo de AFP</td>
		    	<td><?php echo $total_valor //customer-financial-info.php - 224 ?>.00</td>
		    </tr>


		    <tr class="has-gray-bg">
		    	<th>Total</th>
		    	<td>$
		    		<?php 
		    			$activo_invers_total = ($bl_depinv_ttl + $valor_rescate_seg_vida_total + $plan_de_rati_total + $total_valor);
		    			echo $activo_invers_total;
		    		?>
		    	</td>
		    </tr>

		    <!-- ACTIVO FIJO  ----------------------------------------------------------->
		    <tr class="has-gray-bg">
		        <th colspan="2" class="has-text-center">ACTIVOS - <small>ACTIVO FIJO</small></th>
		    </tr>

		    <tr>
		    	<td>Residencia</td>
		    	<td>
		    		<?php 
		    			// customer-financial-info.php - 62
		    			if (isset($residencia['valor'][0]['valor_de_mercado'])) {
		    				$residencia_actio_fij = $residencia['valor'][0]['valor_de_mercado'];
		    			} else {
		    				$residencia_actio_fij = 0;
		    			}
		    			echo $residencia_actio_fij;
		    		?>.00
		    	</td>
		    </tr>
		    <tr>
		    	<td>Otros Inmuebles</td>
		    	<td>
		    		<?php echo $total_otros_inmuebles ?>
		    	</td>
		    </tr>
		    <tr>
		    	<td>Vehículos</td>
		    	<td><?php echo $valor_de_mercado_total //customer-financial-info.php - 159 ?>.00</td>
		    </tr>
		    <tr>
		    	<td>Otros</td>
		    	<td><?php echo $otros_pose_var_total //customer-financial-info.php - 212 ?>.00</td>
		    </tr>

		    <tr class="has-gray-bg">
		    	<th>TOTAL</th>
		    	<td>
		    		<?php 
		    			$activo_fiz_total = ($residencia_actio_fij + $total_otros_inmuebles + $valor_de_mercado_total + $otros_pose_var_total);

						if ($activo_fiz_total < 0) {
						    $formatted_activo_fiz_total = '-$' . number_format(abs($activo_fiz_total), 2);
						} else {
						    $formatted_activo_fiz_total = '$' . number_format($activo_fiz_total, 2);
						}
		    			echo $formatted_activo_fiz_total;
		    		 ?>
		    	</td>
		    </tr>
		    <tr class="has-gray-bg">
		    	<th>TOTAL DE ACTIVOS:</th>
		    	<td>$<?php 
		    			$total_de_activos = ($ctas_total + $activo_invers_total + $activo_fiz_total);
		    			echo $total_de_activos;
		    		?>
		    	</td>
		    </tr>
		</table>


		<!-- Pasivos balance -->
		<table>
		    <tr class="has-gray-bg">
		        <th colspan="2" class="has-text-center">PASIVOS - Deudas</th>
		    </tr>

		    <tr>
		    	<th width="50%" class="has-gray-bg">Préstamos - Hipotecarios</th>
		    	<td width="50%">
		    		<?php echo $saldo_hipotec_total //  ?>.00
		    	</td>
		    </tr>

		    <tr>
		    	<th class="has-gray-bg">Préstamos - Personales</th>
		    	<td><?php echo $saldo_personal_total ?>.00</td>
		    </tr>

		    <tr>
		    	<th class="has-gray-bg">Tarjetas de Crédito</th>
		    	<td><?php echo $saldo_terjetas_total ?>.00</td>
		    </tr>

		    <tr>
		    	<th class="has-gray-bg">Extrafinanciamientos/ Compras a plazos</th>
		    	<td><?php echo $saldo_amiento_total ?>.00</td>
		    </tr>

		    <tr>
		    	<th class="has-gray-bg">Vehículo</th>
		    	<td><?php echo $saldo_vehicle_total ?>.00</td>
		    </tr>

		    <tr>
		    	<th class="has-gray-bg">Otros</th>
		    	<td><?php echo $saldo_otros_total ?>.00</td>
		    </tr>
		    <?php 
		    	$total_deudas_pasivos = ($saldo_hipotec_total + $saldo_personal_total + $saldo_terjetas_total + $saldo_amiento_total + $saldo_vehicle_total + $saldo_otros_total)
		    ?>
		    <tr class="has-gray-bg">
		    	<th>TOTAL</th>
		    	<td>$<?php echo $total_deudas_pasivos ?></td>
		    </tr>

		    <tr class="has-gray-bg">
		    	<th>TOTAL PASIVOS:</th>
		    	<td>$<?php echo $total_deudas_pasivos ?></td>
		    </tr>

		    <tr class="has-gray-bg">
		    	<th>TOTAL DE PATRIMONIO</th>
		    	<td>$<?php 
		    		$total_patrimonio = ($total_de_activos - $total_deudas_pasivos);
		    		echo $total_patrimonio;
		    	 ?></td>
		    </tr>
		</table>
		<table border="1" class="dependiente">
			<tr class="has-gray-bg">
				<th>Note</th>
			</tr>
			<tr>
				<td><?php echo $group_balance_genral['note-balance-personal']; ?></td>
			</tr>
		</table>		
	</div>	



	<div class="fman-table fman-has-two-table">
		<!-- Distribución de Activos -->
		<?php 
			$chart_act_circulante = ($ctas_total / $total_de_activos)*100;
			$chart_invers = ($activo_invers_total / $total_de_activos)*100;
			$chart_acti_fijo = ($activo_fiz_total / $total_de_activos)*100;
		?>
		<table>			
		<tr><td>
			<h4 class="fisher-chart-header">Distribución de Activos</h4>
			<div class="distribution-activos-chart">
			    <canvas id="distri-activo-chart"></canvas>
			</div>
		</td></tr>
		</table>


		<!-- Distribución de Pasivos vs Activos -->
		<?php 
			$chart_act_pasiv_hipo = ($saldo_hipotec_total / $total_de_activos)*100;
			$chart_act_pasiv_perso = ($saldo_personal_total / $total_de_activos)*100;
			$chart_act_pasiv_credit = ($saldo_terjetas_total / $total_de_activos)*100;
			$chart_act_pasiv_extra = ($saldo_amiento_total / $total_de_activos)*100;
			$chart_act_pasiv_vehi = ($saldo_vehicle_total / $total_de_activos)*100;
			$chart_act_pasiv_otro = ($saldo_otros_total / $total_de_activos)*100;
		?>
		<table>			
		<tr><td>
			<h4 class="fisher-chart-header">Distribución de Pasivos vs Activos</h4>
			<div class="circle-chart-container">
			    <canvas id="pasivo-vs-actiovo"></canvas>
			</div>
		</td></tr>
		</table>




	</div>
</div>


<script>
    jQuery(document).ready(function($) {
    	//------------------------------------------
    	// distri-activo-chart
        var ctxDistActiv = document.getElementById('distri-activo-chart').getContext('2d');
        var dataDistActiv = {
            datasets: [{
                data: [
                	<?php echo $chart_act_circulante ?>, 
                	<?php echo $chart_invers ?>, 
                	<?php echo $chart_acti_fijo ?>
                ],
                backgroundColor: ['#4F81BD', '#C0504D', '#9BBB59'],
            }],
            labels: ['Activo Circulante', 'Inversiones', 'Activo Fijo'],
        };
        var optionsDistActiv = {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 80,
        };
        var distActivoChart = new Chart(ctxDistActiv, {
            type: 'pie',
            data: dataDistActiv,
            options: optionsDistActiv
        });

        //-----------------------------------------------
        // Distribución de Pasivos vs Activos
        var ctxPasivsAct = document.getElementById('pasivo-vs-actiovo').getContext('2d');
        var dataPasivsAct = {
            datasets: [{
                data: [
                	<?php echo $chart_act_pasiv_hipo ?>, 
                	<?php echo $chart_act_pasiv_perso ?>, 
                	<?php echo $chart_act_pasiv_credit ?>,
                	<?php echo $chart_act_pasiv_extra ?>,
                	<?php echo $chart_act_pasiv_vehi ?>,
                	<?php echo $chart_act_pasiv_otro ?>,
                ],
                backgroundColor: [
                	'#4F81BD', 
                	'#C0504D',
                	'#9BBB59',
                	'#8064A2',
                	'#4BACC6',
                	'#F79646',
                ],
            }],
            labels: [
            	'Préstamos - Hipotecarios', 
            	'Préstamos - Personales',
            	'Tarjetas de Crédito',
            	'Extrafinanciamientos/ Compras a plazos',
            	'Vehiculo',
            	'Otros'
            ],
        };
        var optionsPasivsAct = {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 80,
        };
        var distActivoChart = new Chart(ctxPasivsAct, {
            type: 'pie',
            data: dataPasivsAct,
            options: optionsPasivsAct
        });
    });
</script>