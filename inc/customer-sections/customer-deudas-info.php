<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div class="fman-single-item fman-finan-info">
	<h3>
		Detalle de Deudas
		<div class="fman-chevicon-header">
			<?php echo $chev_icn; ?>
		</div>
	</h3>

	<div class="fman-table">
		<!-- deudas -->
		<table border="1" class="deudas">
		    <tr class="has-gray-bg">
		        <th colspan="11" class="has-text-center">Préstamos - Hipotecarios</th>
		    </tr>

		    <tr class="has-gray-bg">
		    	<th width="6">Banco</th>
		    	<th width="7">Destino</th>
		    	<th width="10">Fecha Inicio</th>
		    	<th width="10">Monto Inicial</th>
		    	<th width="10">Saldo a la fecha</th>
		    	<th width="10">Tasa  Nominal</th>
		    	<th width="10">Tasa Efectiva</th>
		    	<th width="10">Cuota Préstamo</th>
		    	<th width="10">Meses Contratados</th>
		    	<th width="10">Tipo de Garantía</th>
		    	<th width="10">Responsable del Crédito</th>
		    </tr> 

		    <?php 
	    	$saldo_hipotec_total = 0;
	    	$cuota_prestamo_total = 0;
		    if($prestamos_hipotecarios['prestamos']){
		    	foreach ($prestamos_hipotecarios['prestamos'] as $prestamos) {
		    		$saldo_hipotec_total += $prestamos['saldo_a_la_fecha'];
		    		$cuota_prestamo_total += $prestamos['cuota_prestamo'];

		    ?>
		    	<tr>
		    		<td><?php echo $prestamos['banco'] ?></td>
		    		<td><?php echo $prestamos['destino'] ?></td>
		    		<td><?php echo $prestamos['fecha_inicio'] ?></td>
		    		<td><?php echo $prestamos['monto_inicial'] ?>.00</td>
		    		<td><?php echo $prestamos['saldo_a_la_fecha'] ?>.00</td>
		    		<td><?php echo $prestamos['tasa__nominal'] ?>%</td>
		    		<td><?php echo $prestamos['tasa_efectiva'] ?>%</td>
		    		<td><?php echo $prestamos['cuota_prestamo'] ?>.00</td>
		    		<td><?php echo $prestamos['meses_contratados'] ?></td>
		    		<td><?php echo $prestamos['tipo_de_garantia'] ?></td>
		    		<td><?php echo $prestamos['responsable_del_credito'] ?></td>
		    	</tr>
			<?php } ?>

			<tr>
				<td colspan="4"></td>
				<td class="has-gray-bg">$<?php echo $saldo_hipotec_total; ?></td>
				<td colspan="2"></td>
				<td class="has-gray-bg">$<?php echo $cuota_prestamo_total; ?></td>
				<td colspan="3"></td>
			</tr>
			<?php } ?>
		</table>



		<!-- Personales -->
		<table border="1" class="Personales">
		    <tr class="has-gray-bg">
		        <th colspan="11" class="has-text-center">Préstamos - Personales</th>
		    </tr>

		    <tr class="has-gray-bg">
		    	<th width="6">Banco</th>
		    	<th width="7">Tipo Préstamos (Destino)</th>
		    	<th width="10">Fecha Inicio</th>
		    	<th width="10">Monto Inicial</th>
		    	<th width="10">Saldo a la fecha</th>
		    	<th width="10">Tasa  Nominal</th>
		    	<th width="10">Tasa Efectiva</th>
		    	<th width="10">Cuota Préstamo</th>
		    	<th width="10">Meses Contratados</th>
		    	<th width="10">Tipo de Garantía</th>
		    	<th width="10">Responsable del Crédito</th>
		    </tr> 

		    <?php 
	    	$saldo_personal_total = 0;
	    	$cuota_prestamo_total = 0;
		    if($prestamos_personales['prestamos']){
		    	foreach ($prestamos_personales['prestamos'] as $prestamos) {
		    		$saldo_personal_total += $prestamos['saldo_a_la_fecha'];
		    		$cuota_prestamo_total += $prestamos['cuota_prestamo'];

		    ?>
		    	<tr>
		    		<td><?php echo $prestamos['banco'] ?></td>
		    		<td><?php echo $prestamos['tipo_prestamos_destino'] ?></td>
		    		<td><?php echo $prestamos['fecha_inicio'] ?></td>
		    		<td><?php echo $prestamos['monto_inicial'] ?>.00</td>
		    		<td><?php echo $prestamos['saldo_a_la_fecha'] ?>.00</td>
		    		<td><?php echo $prestamos['tasa__nominal'] ?>%</td>
		    		<td><?php echo $prestamos['tasa_efectiva'] ?>%</td>
		    		<td><?php echo $prestamos['cuota_prestamo'] ?>.00</td>
		    		<td><?php echo $prestamos['meses_contratados'] ?></td>
		    		<td><?php echo $prestamos['tipo_de_garantia'] ?></td>
		    		<td><?php echo $prestamos['responsable_del_credito'] ?></td>
		    	</tr>
			<?php } ?>

			<tr>
				<td colspan="4"></td>
				<td class="has-gray-bg">$<?php echo $saldo_personal_total; ?></td>
				<td colspan="2"></td>
				<td class="has-gray-bg">$<?php echo $cuota_prestamo_total; ?></td>
				<td colspan="3"></td>
			</tr>
			<?php } ?>
		</table>

		<!-- tarjeta_credito -->
		<table border="1" class="tarjeta_credito">
		    <tr class="has-gray-bg">
		        <th colspan="11" class="has-text-center">Tarjetas de Crédito</th>
		    </tr>

		    <tr class="has-gray-bg">
		    	<th width="10%">Emisor</th>
		    	<th width="10%">Tipo de Tarjeta</th>
		    	<th width="10%">Límite</th>
		    	<th width="10%">Saldo a la fecha</th>
		    	<th width="10%">Tasa  Nominal</th>
		    	<th width="10%">Tasa Efectiva</th>
		    	<th width="10%">Pago Mínimo</th>
		    	<th width="10%">Monto en Mora</th>
		    	<th width="10%">Extra financiamiento</th>
		    	<th width="10%">Responsable del Crédito</th>
		    </tr> 

		    <?php 
	    	$saldo_terjetas_total = 0;
	    	$pago_minimo_total = 0;
		    if($tarjeta_credito['tarjetas']){
		    	foreach ($tarjeta_credito['tarjetas'] as $tarjetas) {
		    		$saldo_terjetas_total += $tarjetas['saldo_a_la_fecha'];
		    		$pago_minimo_total += $tarjetas['pago_minimo'];

		    ?>
		    	<tr>
		    		<td><?php echo $tarjetas['emisor'] ?></td>
		    		<td><?php echo $tarjetas['tipo_de_tarjeta'] ?></td>
		    		<td><?php echo $tarjetas['limite'] ?>.00</td>
		    		<td><?php echo $tarjetas['saldo_a_la_fecha'] ?>.00</td>
		    		<td><?php echo $tarjetas['tasa__nominal'] ?>%</td>
		    		<td><?php echo $tarjetas['tasa_efectiva'] ?>%</td>
		    		<td><?php echo $tarjetas['pago_minimo'] ?>.00</td>
		    		<td><?php echo $tarjetas['monto_en_mora'] ?>.00</td>
		    		<td><?php echo $tarjetas['extra_financiamiento'] ?></td>
		    		<td><?php echo $tarjetas['responsable_del_credito'] ?></td>
		    	</tr>
			<?php } ?>

			<tr>
				<td colspan="3"></td>
				<td class="has-gray-bg">$<?php echo $saldo_terjetas_total; ?></td>
				<td colspan="2"></td>
				<td class="has-gray-bg">$<?php echo $pago_minimo_total; ?></td>
				<td colspan="3"></td>
			</tr>
			<?php } ?>
		</table>

		<!-- extrafinanciamientos -->
		<table border="1" class="extrafinanciamientos">
		    <tr class="has-gray-bg">
		        <th colspan="11" class="has-text-center">Extrafinanciamientos/ Compras a plazos</th>
		    </tr>

		    <tr class="has-gray-bg">
		    	<th width="5%">Emisor</th>
		    	<th width="7%">Destino</th>
		    	<th width="10%">Fecha Inicio</th>
		    	<th width="10%">Monto Inicial</th>
		    	<th width="10%">Saldo a la fecha</th>
		    	<th width="10%">Tasa  Nominal</th>
		    	<th width="10%">Tasa Efectiva</th>
		    	<th width="7%">Cuota</th>
		    	<th width="10%">Meses Contratados</th>
		    	<th width="10%">Responsable del Crédito</th>
		    	<th width="10%">Tip</th>
		    </tr> 

		    <?php 
	    	$saldo_amiento_total = 0;
	    	$cuota_total = 0;
		    if($extrafinanciamientos['extrafinanciamientos']){
		    	foreach ($extrafinanciamientos['extrafinanciamientos'] as $mientos) {
		    		$saldo_amiento_total += $mientos['saldo_a_la_fecha'];
		    		$cuota_total += $mientos['cuota'];

		    ?>
		    	<tr>
		    		<td><?php echo $mientos['emisor'] ?></td>
		    		<td><?php echo $mientos['destino'] ?></td>
		    		<td><?php echo $mientos['fecha_inicio'] ?></td>
		    		<td><?php echo $mientos['monto_inicial'] ?>.00</td>
		    		<td><?php echo $mientos['saldo_a_la_fecha'] ?>.00</td>
		    		<td><?php echo $mientos['tasa_nominal'] ?>%</td>
		    		<td><?php echo $mientos['tasa_efectiva'] ?>%</td>
		    		<td><?php echo $mientos['cuota'] ?>.00</td>
		    		<td><?php echo $mientos['meses_contratados'] ?></td>
		    		<td><?php echo $mientos['responsable_del_credito'] ?></td>
		    		<td><?php echo $mientos['tipo'] ?></td>
		    	</tr>
			<?php } ?>

			<tr>
				<td colspan="4"></td>
				<td class="has-gray-bg">$<?php echo $saldo_amiento_total; ?></td>
				<td colspan="2"></td>
				<td class="has-gray-bg">$<?php echo $cuota_total; ?></td>
				<td colspan="3"></td>
			</tr>
			<?php } ?>
		</table>

		<!-- vehicle -->
		<table border="1" class="vehicle">
		    <tr class="has-gray-bg">
		        <th colspan="11" class="has-text-center">Vehículo</th>
		    </tr>

		    <tr class="has-gray-bg">
		    	<th width="5%">Emisor</th>
		    	<th width="7%">Destino</th>
		    	<th width="10%">Fecha Inicio</th>
		    	<th width="10%">Monto Inicial</th>
		    	<th width="10%">Saldo a la fecha</th>
		    	<th width="10%">Tasa  Nominal</th>
		    	<th width="10%">Tasa Efectiva</th>
		    	<th width="7%">Cuota Préstamo</th>
		    	<th width="10%">Meses Contratados</th>
		    	<th width="10%">Tipo de Garantía</th>
		    	<th width="10%">Responsable del Crédito</th>
		    </tr> 

		    <?php 
	    	$saldo_vehicle_total = 0;
	    	$cuota_prestamo_total = 0;
		    if($vehiculoss['vehiculos']){
		    	foreach ($vehiculoss['vehiculos'] as $vehiculo) {
		    		$saldo_vehicle_total += $vehiculo['saldo_a_la_fecha'];
		    		$cuota_prestamo_total += $vehiculo['cuota_prestamo'];

		    ?>
		    	<tr>
		    		<td><?php echo $vehiculo['emisor'] ?></td>
		    		<td><?php echo $vehiculo['destino'] ?></td>
		    		<td><?php echo $vehiculo['fecha_inicio'] ?></td>
		    		<td><?php echo $vehiculo['monto_inicial'] ?>.00</td>
		    		<td><?php echo $vehiculo['saldo_a_la_fecha'] ?>.00</td>
		    		<td><?php echo $vehiculo['tasa__nominal'] ?>%</td>
		    		<td><?php echo $vehiculo['tasa_efectiva'] ?>%</td>
		    		<td><?php echo $vehiculo['cuota_prestamo'] ?>.00</td>
		    		<td><?php echo $vehiculo['meses_contratados'] ?></td>
		    		<td><?php echo $vehiculo['tipo_de_garantia'] ?></td>
		    		<td><?php echo $vehiculo['responsable_del_credito'] ?></td>
		    	</tr>
			<?php } ?>

			<tr>
				<td colspan="4"></td>
				<td class="has-gray-bg">$<?php echo $saldo_vehicle_total; ?></td>
				<td colspan="2"></td>
				<td class="has-gray-bg">$<?php echo $cuota_prestamo_total; ?></td>
				<td colspan="3"></td>
			</tr>
			<?php } ?>
		</table>

		<!-- otros -->
		<table border="1" class="otros">
		    <tr class="has-gray-bg">
		        <th colspan="11" class="has-text-center">Otros</th>
		    </tr>

		    <tr class="has-gray-bg">
		    	<th width="5%">Emisor</th>
		    	<th width="7%">Tipo Préstamos (Destino)</th>
		    	<th width="10%">Fecha Inicio</th>
		    	<th width="10%">Monto Inicial</th>
		    	<th width="10%">Saldo a la fecha</th>
		    	<th width="10%">Tasa  Nominal</th>
		    	<th width="10%">Tasa Efectiva</th>
		    	<th width="7%">Cuota Préstamo</th>
		    	<th width="10%">Meses Contratados</th>
		    	<th width="10%">Tipo de Garantía</th>
		    	<th width="10%">Responsable del Crédito</th>
		    </tr> 

		    <?php 
	    	$saldo_otros_total = 0;
	    	$cuota_prestamo_total = 0;
		    if($otrosss['otros']){
		    	foreach ($otrosss['otros'] as $otros) {
		    		$saldo_otros_total += $otros['saldo_a_la_fecha'];
		    		$cuota_prestamo_total += $otros['cuota_prestamo'];

		    ?>
		    	<tr>
		    		<td><?php echo $otros['emisor'] ?></td>
		    		<td><?php echo $otros['tipo_prestamos_destino'] ?></td>
		    		<td><?php echo $otros['fecha_inicio'] ?></td>
		    		<td><?php echo $otros['monto_inicial'] ?>.00</td>
		    		<td><?php echo $otros['saldo_a_la_fecha'] ?>.00</td>
		    		<td><?php echo $otros['tasa__nominal'] ?>%</td>
		    		<td><?php echo $otros['tasa_efectiva'] ?>%</td>
		    		<td><?php echo $otros['cuota_prestamo'] ?>.00</td>
		    		<td><?php echo $otros['meses_contratados'] ?></td>
		    		<td><?php echo $otros['tipo_de_garantia'] ?></td>
		    		<td><?php echo $otros['responsable_del_credito'] ?></td>
		    	</tr>
			<?php } ?>

			<tr>
				<td colspan="4"></td>
				<td class="has-gray-bg">$<?php echo $saldo_otros_total; ?></td>
				<td colspan="2"></td>
				<td class="has-gray-bg">$<?php echo $cuota_prestamo_total; ?></td>
				<td colspan="3"></td>
			</tr>
			<?php } ?>
		</table>
		<table border="1" class="dependiente">
		    <tr class="has-gray-bg">
		        <th>Note</th>
		    </tr>
		    <tr>
				<td><?php echo $note_deudas_info; ?></td>
		    </tr>
		</table>
	</div>
</div>





<!-- estrategia deudas -->
<div class="fman-single-item fman-finan-info">
	<h3>
		Estrategia de deudas
		<div class="fman-chevicon-header">
			<?php echo $chev_icn; ?>
		</div>
	</h3>

	<div class="fman-table">
		<!-- estrategia-deudas -->
		<table border="1" class="estrategia-deudas">

		    <tr class="has-gray-bg">
		    	<th width="6">Banco o Emisor de la deuda</th>
		    	<th width="10">Tipo de deuda</th>
		    	<th width="5%">Responsable</th>
		    	<th width="10">Monto Inicial o Limite de crédito</th>
		    	<th width="10">Saldo a la fecha</th>
		    	<th width="10">Cuota Préstamo o pago minimo</th>
		    	<th width="5%">80%</th>
		    	<th width="5%">60%</th>
		    	<th width="5%">40%</th>
		    </tr> 

		    <!-- estrategia hipotecarios -->
		    <?php if($prestamos_hipotecarios['prestamos']){
		    	foreach ($prestamos_hipotecarios['prestamos'] as $prestamos) {
		    ?>
		    <tr>
		    	<td><?php echo $prestamos['banco'] ?></td>
		    	<td>Crédito Hipotecario</td>
		    	<td><?php echo $prestamos['responsable_del_credito'] ?></td>
		    	<td><?php echo $prestamos['monto_inicial'] ?>.00</td>
		    	<td><?php echo $prestamos['saldo_a_la_fecha'] ?>.00</td>
		    	<td><?php echo $prestamos['cuota_prestamo'] ?>.00</td>
		    	<td><?php echo (($prestamos['saldo_a_la_fecha']*80) / 100) ?></td>
		    	<td><?php echo (($prestamos['saldo_a_la_fecha']*60) / 100) ?></td>
		    	<td><?php echo (($prestamos['saldo_a_la_fecha']*40) / 100) ?></td>
		    </tr>
			<?php }} ?>

		    <!-- estrategia personales -->
		    <?php if($prestamos_personales['prestamos']){
		    	foreach ($prestamos_personales['prestamos'] as $prestamos) {
		    ?>
		    <tr>
		    	<td><?php echo $prestamos['banco'] ?></td>
		    	<td>Crédito Personal</td>
		    	<td><?php echo $prestamos['responsable_del_credito'] ?></td>
		    	<td><?php echo $prestamos['monto_inicial'] ?>.00</td>
		    	<td><?php echo $prestamos['saldo_a_la_fecha'] ?>.00</td>
		    	<td><?php echo $prestamos['cuota_prestamo'] ?>.00</td>
		    	<td><?php echo (($prestamos['saldo_a_la_fecha']*80) / 100) ?></td>
		    	<td><?php echo (($prestamos['saldo_a_la_fecha']*60) / 100) ?></td>
		    	<td><?php echo (($prestamos['saldo_a_la_fecha']*40) / 100) ?></td>
		    </tr>
			<?php }} ?>

		    <!-- estrategia tarjetas -->
		    <?php if($tarjeta_credito['tarjetas']){
		    	foreach ($tarjeta_credito['tarjetas'] as $tarjetas) {
		    ?>
		    <tr>
		    	<td><?php echo $tarjetas['emisor'] ?></td>
		    	<td>Tarjeta de Crédito</td>
		    	<td><?php echo $tarjetas['responsable_del_credito'] ?></td>
		    	<td><?php echo $tarjetas['limite'] ?>.00</td>
		    	<td><?php echo $tarjetas['saldo_a_la_fecha'] ?>.00</td>
		    	<td><?php echo $tarjetas['pago_minimo'] ?>.00</td>
		    	<td><?php echo (($tarjetas['saldo_a_la_fecha']*80) / 100) ?></td>
		    	<td><?php echo (($tarjetas['saldo_a_la_fecha']*60) / 100) ?></td>
		    	<td><?php echo (($tarjetas['saldo_a_la_fecha']*40) / 100) ?></td>
		    </tr>
			<?php }} ?>

		    <!-- estrategia extrafinanciamientos -->
		    <?php if($extrafinanciamientos['extrafinanciamientos']){
		    	foreach ($extrafinanciamientos['extrafinanciamientos'] as $mientos) {
		    ?>
		    <tr>
		    	<td><?php echo $mientos['emisor'] ?></td>
		    	<td>Extrafinanciamiento o tasa cero</td>
		    	<td><?php echo $mientos['responsable_del_credito'] ?></td>
		    	<td><?php echo $mientos['monto_inicial'] ?>.00</td>
		    	<td><?php echo $mientos['saldo_a_la_fecha'] ?>.00</td>
		    	<td><?php echo $mientos['cuota'] ?>.00</td>
		    	<td><?php echo (($mientos['saldo_a_la_fecha']*80) / 100) ?></td>
		    	<td><?php echo (($mientos['saldo_a_la_fecha']*60) / 100) ?></td>
		    	<td><?php echo (($mientos['saldo_a_la_fecha']*40) / 100) ?></td>
		    </tr>
			<?php }} ?>

		    <!-- estrategia Vehiculo -->
		    <?php if($vehiculoss['vehiculos']){
		    	foreach ($vehiculoss['vehiculos'] as $vehiculo) {
		    ?>
		    <tr>
		    	<td><?php echo $vehiculo['emisor'] ?></td>
		    	<td>Vehículo</td>
		    	<td><?php echo $vehiculo['responsable_del_credito'] ?></td>
		    	<td><?php echo $vehiculo['monto_inicial'] ?>.00</td>
		    	<td><?php echo $vehiculo['saldo_a_la_fecha'] ?>.00</td>
		    	<td><?php echo $vehiculo['cuota_prestamo'] ?>.00</td>
		    	<td><?php echo (($vehiculo['saldo_a_la_fecha']*80) / 100) ?></td>
		    	<td><?php echo (($vehiculo['saldo_a_la_fecha']*60) / 100) ?></td>
		    	<td><?php echo (($vehiculo['saldo_a_la_fecha']*40) / 100) ?></td>
		    </tr>
			<?php }} ?>

		    <!-- estrategia otros -->
		    <?php if($otrosss['otros']){
		    	foreach ($otrosss['otros'] as $otro) {
		    ?>
		    <tr>
		    	<td><?php echo $otro['emisor'] ?></td>
		    	<td>Otros</td>
		    	<td><?php echo $otro['responsable_del_credito'] ?></td>
		    	<td><?php echo $otro['monto_inicial'] ?>.00</td>
		    	<td><?php echo $otro['saldo_a_la_fecha'] ?>.00</td>
		    	<td><?php echo $otro['cuota_prestamo'] ?>.00</td>
		    	<td><?php echo (($otro['saldo_a_la_fecha']*80) / 100) ?></td>
		    	<td><?php echo (($otro['saldo_a_la_fecha']*60) / 100) ?></td>
		    	<td><?php echo (($otro['saldo_a_la_fecha']*40) / 100) ?></td>
		    </tr>
			<?php }} ?>
		</table>
		<table border="1" class="dependiente">
		    <tr class="has-gray-bg">
		        <th>Note</th>
		    </tr>
		    <tr>
				<td><?php echo $group_deudas_strategy['note-estrategia-de-deudas']; ?></td>
		    </tr>
		</table>
	</div>
</div>
