<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div class="fman-single-item fman-finan-info">
	<h3>
		Información Financiera
		<div class="fman-chevicon-header">
			<?php echo $chev_icn; ?>
		</div>
	</h3>

	<div class="fman-table">
		<!-- residencia -->
		<table border="1" class="residencia">
		    <tr class="has-gray-bg">
		        <th colspan="5">Residencia</th>
		    </tr>
		    <tr>
		    	<th>Dirección</th>
		    	<td colspan="4"><?php echo $residencia['direccion'] ?></td>
		    </tr>
		    <tr>
		    	<th>Country</th>
		    	<td><?php echo $residencia['country'] ?></td>
		    	<th>City</th>
		    	<td colspan="2"><?php echo $residencia['city'] ?></td>
		    </tr>
		    <tr>
		    	<th>State</th>
		    	<td colspan="4"><?php echo $residencia['state'] ?></td>
		    </tr>
		    <tr>
		    	<td colspan="5"></td>
		    </tr>


		    <tr>
		    	<th></th>
		    	<th></th>
		    	<th>Valor de Mercado</th>
		    	<th>Cuota</th>
		    	<th>Retorno/Costo</th>
		    </tr>

		    <tr>
		    	<th width="20%">Casa Propia</th>
		    	<td width="20%"><?php echo ($residencia['casa_propia']['casa_propia'] == 1) ? 'Yes' : 'No'; ?></td>
		    	<td width="20%"><?php echo $casa_prop_val_markedo; ?></td>
		    	<td width="20%"><?php echo $casa_prop_quota; ?></td>
		    	<td width="20%"><?php echo number_format($casa_prop_ret_const, 2) ?>%</td>
		    </tr> 

		    <tr>
		    	<th>Casa Familiar</th>
		    	<td><?php echo ($residencia['casa_familiar']['casa_familiar'] == 1) ? 'Yes' : 'No'; ?></td>
		    	<td><?php echo $casa_fam_val_markedo ?></td>
		    	<td><?php echo $casa_fam_quota ?></td>
		    	<td><?php echo number_format($casa_fam_ret_const, 2) ?>%</td>
		    </tr> 

		    <tr>
		    	<th>Casa Familiar</th>
		    	<td><?php echo ($residencia['casa_familiar']['casa_familiar'] == 1) ? 'Yes' : 'No'; ?></td>
		    	<td><?php echo $casa_aqui_val_markedo ?></td>
		    	<td><?php echo $casa_aqui_quota ?></td>
		    	<td><?php echo number_format($casa_aqui_ret_const, 2) ?>%</td>
		    </tr> 

		</table>


		<!-- Otros Inmuebles -->
		<table border="1" class="otrosInmuebles">
		    <tr class="has-gray-bg">
		        <th colspan="8" class="has-text-center">Otros Inmuebles</th>
		    </tr>
		    <tr class="has-gray-bg">
		        <th width="12.5%">Tipo (Casa/Lote/ Terreno/Otros)</th>
		        <th width="12.5%">Ubicación</th>
		        <th width="12.5%">Alquiler mensual</th>
		        <th width="12.5%">Valor de Mercado</th>
		        <th width="12.5%">Tipo</th>
		        <th width="12.5%">Porcentaje de Participación</th>
		        <th width="12.5%">Valor</th>
		        <th width="12.5%">Retorno/Costo</th>
		    </tr>

		    <?php 
		    $total_otros_inmuebles = 0;
		    if($otros_inmuebles){
		    	foreach($otros_inmuebles as $otros){

		    		$valor_de_mercado = $otros['valor_de_mercado'];
		    		$porcentaje_de_participacion = $otros['porcentaje_de_participacion'];
		    		$alquiler_mensual = $otros['alquiler_mensual'];

		    		$valor = ($valor_de_mercado * $porcentaje_de_participacion) / 100;
		    		$retornocosto = (($alquiler_mensual * 12) / $valor_de_mercado) * 100;

		    		$total_otros_inmuebles += $valor;
		    ?>
		    <tr>
		    	<td><?php echo $otros['tipo_casalote_terrenootros'] ?></td>
		    	<td><?php echo $otros['ubicacion'] ?></td>
		    	<td><?php echo $alquiler_mensual ?>.00</td>
		    	<td><?php echo $valor_de_mercado ?>.00</td>
		    	<td><?php echo $otros['tipo'] ?></td>
		    	<td><?php echo $porcentaje_de_participacion ?>%</td>
		    	<td><?php echo $valor ?></td>
		    	<td><?php echo $retornocosto ?>%</td>
		    </tr>
		    <?php }} ?>
		</table>

		<!-- Vehículos -->
		<table border="1" class="otros">
		    <tr class="has-gray-bg">
		        <th colspan="7" class="has-text-center"><h5>Vehículos</h5></th>
		    </tr>
		    <tr class="has-gray-bg">
		        <th width="14.2%">Marca - Modelo</th>
		        <th width="14.2%">Año del carro</th>
		        <th width="14.2%">A nombre de</th>
		        <th width="14.2%">Año de compra</th>
		        <th width="14.2%">Precio de compra</th>
		        <th width="14.2%">Valor de mercado</th>
		    </tr>

		    <?php 
		    $valor_de_mercado_total = 0;
		    if($vehiculos){
		    	foreach($vehiculos as $vehicul){
		    		if($vehicul['precio_de_compra']){
		    			$O33 = $vehicul['precio_de_compra'];
		    		} else {
		    			$O33 = 0;
		    		}

		    		if($vehicul['ano_de_compra']){
		    			$M33 = $vehicul['ano_de_compra'];
		    		} else {
		    			$M33 = 0;
		    		}
				
					$currentYear = date("Y");
					$valor_de_mercado = ($O33 - (0.1 * $O33) * ($currentYear - $M33));
					$valor_de_mercado_total += $valor_de_mercado;
		    ?>
		    <tr>
		    	<td><?php echo $vehicul['marca'] ?></td>
		    	<td><?php echo $vehicul['ano_del_carro'] ?></td>
		    	<td><?php echo $vehicul['a_nombre_de'] ?></td>
		    	<td><?php echo $vehicul['ano_de_compra'] ?></td>
		    	<td><?php echo $vehicul['precio_de_compra'] ?>.00</td>
		    	<td><?php echo $valor_de_mercado ?></td>
		    </tr>
		    <?php }} ?>
		</table>

		<!-- Otros (Posesiones Varias) -->
		<table border="1" class="otros">
		    <tr class="has-gray-bg">
		        <th colspan="2" class="has-text-center"><h5>Otros (Posesiones Varias)</h5></th>
		    </tr>

		    <tr class="has-gray-bg">
		    	<th width="50%">Info</th>
		    	<th width="50%">Valor de Mercado</th>
		    </tr>

		    <tr>
		    	<td>Muebles</td>
		    	<td><?php echo $otros_pos_var['muebles'] ?>.00</td>
		    </tr>
		    <tr>
		    	<td>Electrodomésticos</td>
		    	<td><?php echo $otros_pos_var['electrodomesticos'] ?>.00</td>
		    </tr>
		    <tr>
		    	<td>Artículos Deportivos</td>
		    	<td><?php echo $otros_pos_var['articulos_deportivos'] ?>.00</td>
		    </tr>
		    <tr>
		    	<td>Joyas</td>
		    	<td><?php echo $otros_pos_var['joyas'] ?>.00</td>
		    </tr>
		    <tr>
		    	<td>Obras de Arte</td>
		    	<td><?php echo $otros_pos_var['obras_de_arte'] ?>.00</td>
		    </tr>
		    <tr>
		    	<td>Otros</td>
		    	<td><?php echo $otros_pos_var['otros'] ?>.00</td>
		    </tr>
		    <tr>
		    	<th class="has-gray-bg">Total</th>
		    	<td>
		    		<?php
		    		$otros_pose_var_total = (intval($otros_pos_var['muebles']) + intval($otros_pos_var['electrodomesticos']) + intval($otros_pos_var['articulos_deportivos']) + intval($otros_pos_var['joyas']) + intval($otros_pos_var['obras_de_arte']) + intval($otros_pos_var['otros']));
			    	 echo $otros_pose_var_total ?>.00</td>
		    </tr>
		</table>

		<!-- Saldo de AFP -->
		<table border="1" class="otros">
		    <tr class="has-gray-bg">
		        <th colspan="3" class="has-text-center"><h5>Saldo de AFP</h5></th>
		    </tr>

		    <tr>
		    	<th width="33%"></th>
			    <?php if($saldo_afp_arr){
			    	foreach ($saldo_afp_arr as $afp) {
			    ?>	
			    	<th width="33%" class="has-text-center"><?php echo $afp['holder'] ?></th>
				<?php } } else { ?>
					<th width="33%"></th>
					<th width="33%"></th>
				<?php } ?>
			</tr>

		    <tr>
		    	<th>Años para retirarse</th>
			    <?php if($saldo_afp_arr){
			    	foreach ($saldo_afp_arr as $afp) {
			    ?>
			    	<td><?php echo $afp['retire_year_ag'] ?></td>
				<?php } } else { ?>
					<td></td>
					<td></td>
				<?php } ?>
			</tr>

		    <tr>
		    	<?php 
		    	$total_valor = 0;
		    	if($saldo_afp_arr){
		    		foreach ($saldo_afp_arr as $afp) {
		    			$total_valor += $afp['valor'];
		    		}
		    	}
		    	?>
		    	<th>Valor - <small>Total:</small> <?php echo $total_valor ?></th>
			    <?php if($saldo_afp_arr){
			    	foreach ($saldo_afp_arr as $afp) {
			    ?>
			    	<td><?php echo $afp['valor'] ?></td>
				<?php } } else { ?>
					<td></td>
					<td></td>
				<?php } ?>
			</tr>

		    <tr>
		    	<th>Ya realizó el retiro del AFP</th>
			    <?php if($saldo_afp_arr){
			    	foreach ($saldo_afp_arr as $afp) {
			    ?>
			    	<td><?php echo $afp['ya_realizo_afp'] ?></td>
				<?php } } else { ?>
					<td></td>
					<td></td>
				<?php } ?>
			</tr>
		    <tr>
		    	<th>Ha cotizado 10 años el AFP</th>
			    <?php if($saldo_afp_arr){
			    	foreach ($saldo_afp_arr as $afp) {
			    ?>
			    	<td><?php echo $afp['ha_cotizad_afp'] ?></td>
				<?php } } else { ?>
					<td></td>
					<td></td>
				<?php } ?>
			</tr>
		    <tr>
		    	<th>Acceso al 25% de AFP</th>
			    <td></td>
			    <td></td>
			</tr>
			<tr>
				<th>Monto a retirar</th>
				<td></td>
				<td></td>
			</tr>

		</table>


		<!-- Cuentas Bancarias y Efectivo -->
		<table border="1" class="Efectivo">
		    <tr class="has-gray-bg">
		        <th colspan="8" class="has-text-center"><h5>Cuentas Bancarias y Efectivo</h5></th>
		    </tr>
		    <tr class="has-gray-bg">
		        <th width="10%">Banco / Institución</th>
		        <th width="5%">Titular</th>
		        <th width="5%">Cónyuge</th>
		        <th width="10%">Planillera</th>
		        <th width="10%">Ahorro</th>
		        <th width="10%">Corriente</th>
		        <th width="10%">Pais</th>
		        <th width="10%">Región</th>
		    </tr>

		    <?php 
		    if($cuentas_banca_efect['cuentas']){
		    	foreach($cuentas_banca_efect['cuentas'] as $cuentas){
		    ?>
		    <tr>
		    	<td><?php echo $cuentas['banco__institucion'] ?></td>
		    	<td><?php echo ($cuentas['titular'] == 1) ? 'Yes' : 'No' ?></td>
		    	<td><?php echo ($cuentas['conyuge'] == 1) ? 'Yes' : 'No' ?></td>

		    	<td><?php echo $cuentas['planillera'] ?>.00</td>
		    	<td><?php echo $cuentas['ahorro'] ?>.00</td>
		    	<td><?php echo $cuentas['corriente'] ?>.00</td>
		    	<td><?php echo $cuentas['pais'] ?></td>
		    	<td><?php echo $cuentas['region'] ?></td>
		    </tr>
		    <?php }} ?>
		</table>

		<!-- Depósitos e Inversiones  -->
		<table border="1" class="Efectivo">
		    <tr class="has-gray-bg">
		        <th colspan="15" class="has-text-center"><h5>Depósitos e Inversiones </h5></th>
		    </tr>
		    <tr class="has-gray-bg">
		        <th width="10%">Nombre</th>
		        <th width="5%">Titular</th>
		        <th width="5%">Cónyuge</th>
		        <th width="10%">Sector</th>
		        <th width="10%">Inversión Inicial</th>
		        <th width="10%">Valor actual</th>
		        <th width="10%">Retorno %</th>
		        <th width="10%">Retorno Anual $</th>
		        <th width="10%">Retorno Mensual $</th>
		        <th width="10%">Riesgo</th>
		        <th width="10%">Plazo (meses)</th>
		        <th width="10%">Fecha de vencimiento</th>
		        <th width="10%">Región</th>
		        <th width="10%">Tipo</th>
		        <th width="10%">Liquidez (5-1)</th>
		    </tr>

		    <?php 
		    if($deposit_inve['depositos_e_inversiones_']){
		    	foreach($deposit_inve['depositos_e_inversiones_'] as $dep_inv){
		    ?>
		    <tr>
		    	<td><?php echo $dep_inv['nombre'] ?></td>
		    	<td><?php echo ($dep_inv['titular'] == 1) ? 'Yes' : 'No' ?></td>
		    	<td><?php echo ($dep_inv['conyuge'] == 1) ? 'Yes' : 'No' ?></td>

		    	<td><?php echo $dep_inv['sector'] ?></td>
		    	<td><?php echo $dep_inv['inversion_inicial'] ?>.00</td>
		    	<td><?php echo $dep_inv['valor_actual'] ?>.00</td>
		    	<td><?php echo $dep_inv['retorno_%'] ?>%</td>
		    	<!-- anual return -->
		    	<td><?php echo (intval($dep_inv['retorno_%']) * intval($dep_inv['valor_actual'])) / 100 ?></td>
		    	<!-- mensual return -->
		    	<td><?php echo round((((intval($dep_inv['retorno_%']) * intval($dep_inv['valor_actual'])) / 100)) / 12, 3) ?></td>
		    	<td><?php echo $dep_inv['riesgo'] ?></td>
		    	<td><?php echo $dep_inv['plazo_meses'] ?></td>
		    	<td><?php echo $dep_inv['fecha_de_vencimiento'] ?></td>
		    	<td><?php echo $dep_inv['region'] ?></td>
		    	<td><?php echo $dep_inv['tipo'] ?></td>
		    	<td><?php echo $dep_inv['liquidez_5-1'] ?></td>
		    </tr>
		    <?php }} ?>
		</table>
		<table border="1" class="dependiente">
		    <tr class="has-gray-bg">
		        <th>Note</th>
		    </tr>
		    <tr>
				<td><?php echo $note_financial_info; ?></td>
		    </tr>
		</table>
	</div>
</div>