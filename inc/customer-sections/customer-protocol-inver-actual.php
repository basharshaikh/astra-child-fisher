<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<div class="fman-single-item fman-finan-info">
	<h3>
		Protocolo de inversión actual
		<div class="fman-chevicon-header">
			<?php echo $chev_icn; ?>
		</div>
	</h3>

	<div class="fman-table">
		
		<!-- Categorías de inversión -->
		<table border="1" class="deudas">
		    <tr class="has-gray-bg">
		        <th colspan="12" class="has-text-center">Información del Cliente</th>
		    </tr>

		    <tr class="has-gray-bg">
		    	<th>Detalle</th>
		    	<th></th>
		    	<th>Montos</th>
		    	<th></th>
		    	<th></th>
		    	<th></th>
		    	<th></th>
		    	<th></th>
		    	<th></th>
		    	<th></th>
		    	<th></th>
		    	<th></th>
		    </tr>

		    <tr>
		    	<td>Efectivo</td>
		    	<td></td>
		    	<td><?php echo $ctas_total; ?></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>
		    <tr>
		    	<td>Inversiones</td>
		    	<td></td>
		    	<td>
		    		<?php // from customer-balance-general.php
		    			$activo_invers_total = ($bl_depinv_ttl + $valor_rescate_seg_vida_total + $plan_de_rati_total + $total_valor);
		    			echo $activo_invers_total;
		    		?>
		    	</td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>
		    <tr>
		    	<td>Activo Fijo</td>
		    	<td></td>
		    	<td>
		    		<?php // from customer-balance-genral.php
		    			$activo_fiz_total = ($residencia_actio_fij + $total_otros_inmuebles + $valor_de_mercado_total + $otros_pose_var_total);

						if ($activo_fiz_total < 0) {
						    $formatted_activo_fiz_total = '-$' . number_format(abs($activo_fiz_total), 2);
						} else {
						    $formatted_activo_fiz_total = '$' . number_format($activo_fiz_total, 2);
						}
		    			echo $formatted_activo_fiz_total;
		    		 ?>
		    	</td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>
		    <tr><td colspan="12"></td></tr>




		    <tr class="has-gray-bg">
		        <th>Categorías de inversión</th>
		        <th>Sector</th>
		        <th>Monto</th>
		        <th>Retorno Anual(%)</th>
		        <th>Retorno Anual($)</th>
		        <th>Retorno Mensual ($)</th>
		        <th>Riesgo</th>
		        <th>Plazo</th>
		        <th>Fecha de vencimiento</th>
		        <th>Región</th>
		        <th>Tipo</th>
		        <th>Liquidez(5-1)</th>
		    </tr>

		    <tr>
		    	<td>Activo circulante</td>
		    	<td>Efectivo</td>
		    	<td><?php echo $ctas_total; ?></td>
		    	<td>0.25%</td>
		    	<td>
		    		<?php 
		    			$acti_ret_anu = ($ctas_total/0.25);
		    			echo $acti_ret_anu;
		    		?>
		    	</td>
		    	<td>
		    		<?php 
		    			$actv_cur_monto = ($ctas_total/0.25)/12;
		    			echo  $actv_cur_monto;
		    		?>
		    	</td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>
		    <tr><td colspan="12"></td></tr>

		    <?php // from customer-financial-info.php
		    $proto_inv_valor_act_total = 0;
		    $proto_inv_ret_anu_act_total = 0;
		    $proto_inv_ret_mans_act_total = 0;
		    if($deposit_inve['depositos_e_inversiones_']){
		    	foreach($deposit_inve['depositos_e_inversiones_'] as $dep_inv){
		    		$proto_inv_ret_anu_act = ($dep_inv['retorno_%'])*($dep_inv['valor_actual']);
		    		$proto_inv_ret_mensu_act = $proto_inv_ret_anu_act / 12;
		    		$proto_inv_valor_act_total += $dep_inv['valor_actual'];
				    $proto_inv_ret_anu_act_total += $proto_inv_ret_anu_act;
				    $proto_inv_ret_mans_act_total += $proto_inv_ret_mensu_act;
		    ?>
		    <tr>
		    	<td><?php echo $dep_inv['nombre'] ?></td>
		    	<td><?php echo $dep_inv['sector'] ?></td>
		    	<td><?php echo $dep_inv['valor_actual'] ?>.00</td>
		    	<td><?php echo $dep_inv['retorno_%'] ?>%</td>
		    	<td><?php echo $proto_inv_ret_anu_act; ?></td>
		    	<td><?php echo number_format($proto_inv_ret_mensu_act, 2) ?></td>
		    	<td></td>
		    	<td></td>
		    	
		    	<td><?php echo $dep_inv['fecha_de_vencimiento'] ?></td>
		    	<td><?php echo $dep_inv['region'] ?></td>
		    	<td><?php echo $dep_inv['tipo'] ?></td>
		    	<td><?php echo $dep_inv['liquidez_5-1'] ?></td>
		    </tr>
		    <?php }} ?>
		    <tr><td colspan="12"></td></tr>

			<!-- bl - Valor de rescate seguro de vida -->
		    <tr>
		    	<td>Valor de rescate seguro de vida</td>
		    	<td>Portafolio de inversión</td>
		    	<td>
		    	<?php 
		    		// $vida_inge_resct_total customer-seguros.php - 205
		    		// $vida_dud_resct_total customer-seguros.php - 258
		    		$valor_rescate_seg_vida_total = $vida_inge_resct_total + $vida_dud_resct_total;
		    		echo $valor_rescate_seg_vida_total;
		    	?>.00
		    	</td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>
			<!-- bl - Plan de retiro -->
		    <tr>
		    	<td>Plan de retiro</td>
		    	<td>Portafolio de inversión</td>
		    	<td><?php echo $plan_de_rati_total; //customer-seguros.php - 154 ?>.00</td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>

			<!-- bl - saldo de AFP -->
		    <tr>
		    	<td>Saldo de AFP</td>
		    	<td>Portafolio de inversión</td>
		    	<td><?php echo $total_valor //customer-financial-info.php - 224 ?>.00</td>
		    	<td>1.92%</td>
		    	<td>
		    		<?php 
		    			$prot_inv_saldo_ret_anu = ($total_valor)*1.92;
		    			echo $prot_inv_saldo_ret_anu;
		    		?>
		    	</td>
		    	<td>
		    		<?php 
		    			$prot_inv_saldo_ret_mens = (($total_valor)*1.92)/12;
		    			echo $prot_inv_saldo_ret_mens;
		    		?>
		    	</td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>
		    <tr><td colspan="12"></td></tr>

		    <tr>
		    	<td>Residencia</td>
		    	<td>BR - Residencial</td>
		    	<td>
		    		<?php 
		    			// customer-financial-info.php - 62
		    			if (isset($residencia['valor'][0]['valor_de_mercado'])) {
		    				$residencia_actio_fij = $residencia['valor'][0]['valor_de_mercado'];
		    			} else {
		    				$residencia_actio_fij = 0;
		    			}
		    			echo $residencia_actio_fij;
		    		?>
		    	</td>
		    	<td>0.00%</td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>
		    <tr><td colspan="12"></td></tr>

			<?php 
		    $total_otros_inmuebles = 0;
		    $prot_inv_inm_ret_anu = 0;
		    $prot_inv_inm_ret_mns = 0;
		    if($otros_inmuebles){
		    	foreach($otros_inmuebles as $otros){

		    		$valor_de_mercado = $otros['valor_de_mercado'];
		    		$porcentaje_de_participacion = $otros['porcentaje_de_participacion'];
		    		$alquiler_mensual = $otros['alquiler_mensual'];

		    		$valor = ($valor_de_mercado * $porcentaje_de_participacion) / 100;
		    		$retornocosto = (($alquiler_mensual * 12) / $valor_de_mercado) * 100;

		    		$total_otros_inmuebles += $valor;

				    $prot_inv_inm_ret_anu += ($valor*$retornocosto);
				    $prot_inv_inm_ret_mns += ($valor*$retornocosto)/12;
		    ?>
		    <tr>
		    	<td><?php echo $otros['tipo_casalote_terrenootros'] ?></td>
		    	<td><?php echo $otros['tipo'] ?></td>
		    	<td><?php echo $valor ?></td>
		    	<td><?php echo $retornocosto ?>%</td>    	
		    	<td><?php echo ($valor*$retornocosto); ?></td>
		    	<td><?php echo ($valor*$retornocosto)/12; ?></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>
		    <?php }} ?>
		    <tr><td colspan="12"></td></tr>


		    <!-- Préstamos Hipotecarios..................... -->
			<tr>
		    	<td width="50%">Préstamos Hipotecarios</td>
		    	<td></td>
		    	<td><?php echo number_format($pro_inv_act_hipo_monto, 2) ?>.00</td>
		    	<td><?php echo number_format($deuda_hipo_efec_average, 2); ?>%</td>
		    	<td><?php echo number_format($pro_inv_act_hipo_ret_anu_, 2); ?></td>
		    	<td><?php echo number_format($pro_inv_act_hipo_ret_men_, 2); ?></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>

		    <tr>
		    	<td>Préstamos Personales</td>
		    	<td></td>
		    	<td><?php echo number_format($pro_inv_act_perso_monto, 2) ?>.00</td>
		    	<td><?php echo number_format($deud_perso_efec_average, 2); ?>%</td>
		    	<td><?php echo number_format($pro_inv_act_perso_ret_anu_, 2); ?></td>
		    	<td><?php echo number_format($pro_inv_act_perso_ret_men_, 2); ?></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>

		    <tr>
		    	<td>Tarjetas de Crédito</td>
		    	<td></td>
		    	<td><?php echo number_format($pro_inv_act_terj_monto, 2) ?>.00</td>
		    	<td><?php echo number_format($deu_terj_tasa_avg, 2); ?>%</td>
		    	<td><?php echo number_format($pro_inv_act_terj_ret_anu_, 2); ?></td>
		    	<td><?php echo number_format($pro_inv_act_terj_ret_men_, 2); ?></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>

		    <tr>
		    	<td>Extrafinanciamientos/ Compras a plazos</td>
		    	<td></td>
		    	<td><?php echo number_format($pro_inv_act_ext_monto, 2) ?>.00</td>
		    	<td><?php echo number_format($deu_ext_tasa_avg, 2); ?>%</td>
		    	<td><?php echo number_format($pro_inv_act_ext_ret_anu_, 2); ?></td>
		    	<td><?php echo number_format($pro_inv_act_ext_ret_men_, 2); ?></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>

		    <tr>
		    	<td>Préstamos Vehículos</td>
		    	<td></td>
		    	<td><?php echo number_format($pro_inv_act_vhc_monto, 2) ?>.00</td>
		    	<td><?php echo number_format($deu_vhcl_tasa_avg, 2); ?>%</td>
		    	<td><?php echo number_format($pro_inv_act_vhc_ret_anu_, 2); ?></td>
		    	<td><?php echo number_format($pro_inv_act_vhc_ret_men_, 2); ?></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>

		    <tr>
		    	<td>Préstamos Otros</td>
		    	<td></td>
		    	<td><?php echo number_format($pro_inv_act_otr_monto, 2) ?>.00</td>
		    	<td><?php echo number_format($deu_otr_tasa_avg, 2); ?>%</td>
		    	<td><?php echo number_format($pro_inv_act_otr_ret_anu_, 2); ?></td>
		    	<td><?php echo number_format($pro_inv_act_otr_ret_men_, 2); ?></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>
		    <tr><td colspan="12"></td></tr>

		    <tr>
		    	<td>Vehículos</td>
		    	<td>Otros</td>
		    	<td><?php echo number_format($valor_de_mercado_total, 2) ?></td>
		    	<td>0.00%</td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>
		    <tr>
		    	<td>Otros</td>
		    	<td>Otros</td>
		    	<td><?php echo number_format($otros_pose_var_total, 2) ?></td>
		    	<td>0.00%</td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>

		    <!-- Totals -->
			<?php 
				$protoc_inv_monto_total = (
					$ctas_total 
					+ $activo_invers_total 
					+ $activo_fiz_total 
					+ $actv_cur_monto 
					+ $proto_inv_valor_act_total 
					+ $valor_rescate_seg_vida_total 
					+ $plan_de_rati_total 
					+ $total_valor 
					+ $residencia_actio_fij 
					+ $total_otros_inmuebles 
					+ $pro_inv_act_hipo_monto 
					+ $pro_inv_act_perso_monto 
					+ $pro_inv_act_terj_monto 
					+ $pro_inv_act_ext_monto 
					+ $pro_inv_act_vhc_monto 
					+ $pro_inv_act_otr_monto 
					+ $valor_de_mercado_total 
					+ $otros_pose_var_total
				);

				$protoc_inv_ret_anu_total = (
					$acti_ret_anu 
					+ $proto_inv_ret_anu_act_total
					+ $prot_inv_saldo_ret_anu
					+ $prot_inv_inm_ret_anu
					+ $pro_inv_act_hipo_ret_anu_
					+ $pro_inv_act_perso_ret_anu_
					+ $pro_inv_act_terj_ret_anu_
					+ $pro_inv_act_ext_ret_anu_
					+ $pro_inv_act_vhc_ret_anu_
					+ $pro_inv_act_otr_ret_anu_
				);

				$protoc_inv_ret_mensu_total = (
					$actv_cur_monto
					+ $proto_inv_ret_mans_act_total
					+ $prot_inv_saldo_ret_mens
					+ $prot_inv_inm_ret_mns
					+ $pro_inv_act_hipo_ret_men_
					+ $pro_inv_act_perso_ret_men_
					+ $pro_inv_act_terj_ret_men_
					+ $pro_inv_act_ext_ret_men_
					+ $pro_inv_act_vhc_ret_men_
					+ $pro_inv_act_otr_ret_men_
				);
			?>
		    <tr>
		    	<th class="has-gray-bg" colspan="2">Total</th>
		    	<th><?php echo number_format($protoc_inv_monto_total, 2); ?></th>
		    	<th></th>
		    	<th><?php echo number_format($protoc_inv_ret_anu_total, 2) ?></th>
		    	<th><?php echo number_format($protoc_inv_ret_mensu_total, 2) ?></th>
		    	
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>
		</table>

	</div>
</div>