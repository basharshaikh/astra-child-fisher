<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<!-- balance general -->
<div class="fman-single-item fman-finan-info">
	<h3>
		Ingresos gastos actual
		<div class="fman-chevicon-header">
			<?php echo $chev_icn; ?>
		</div>
	</h3>


	<div class="fman-table fman-has-two-table">

		<!-- INGRESOS TOTALES (Netos) -->
		<table>
			<tr>
				<th class="has-gray-bg" colspan="3">Información proporcionada por cliente</th>
			</tr>

			<tr>
				<th width="30%">Info</th>
				<th width="30%">Titular</th>
				<th width="30%">Cónyuge</th>
			</tr>

			<tr>
				<td>Salario mensual</td>
				<td><?php echo number_format($ingr_Salario_tit, 2) ?></td>
				<td><?php echo number_format($ingr_Salario_cony, 2) ?></td>
			</tr>
			<tr>
				<td>Comisiones</td>
				<td><?php echo number_format($ingr_Comisiones_tit, 2) ?></td>
				<td><?php echo number_format($ingr_Comisiones_cony, 2) ?></td>
			</tr>
			<tr>
				<td>Aguinaldo*</td>
				<td><?php echo number_format($ing_gas_act_aguinaldo_tit, 2) ?></td>
				<td><?php echo number_format($ing_gas_act_aguinaldo_cony, 2) ?></td>
			</tr>
			<tr>
				<td>Vacaciones*</td>
				<td><?php echo number_format($ing_gas_act_Vacaciones_tit, 2) ?></td>
				<td><?php echo number_format($ing_gas_act_Vacaciones_cony, 2) ?></td>
			</tr>
			<tr>
				<td>Bonos*</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Servicios profesionales</td>
				<td><?php echo number_format($ing_gas_act_servic_profe_tit, 2) ?></td>
				<td><?php echo number_format($ing_gas_act_servic_profe_cony, 2) ?></td>
			</tr>
			<tr>
				<td>Empresa</td>
				<td><?php echo number_format($ing_gas_act_empresa_tit, 2) ?></td>
				<td><?php echo number_format($ing_gas_act_empresa_cony, 2) ?></td>
			</tr>
			<tr>
				<td>Dividendos*</td>
				<td><?php echo number_format($ing_gas_act_devidendos_tit, 2) ?></td>
				<td><?php echo number_format($ing_gas_act_devidendos_cony, 2) ?></td>
			</tr>
			<tr>
				<td>Alquileres*</td>
				<td><?php echo number_format($ingr_Alquileres_tit, 2) ?></td>
				<td><?php echo number_format($ingr_Alquileres_cony, 2) ?></td>
			</tr>

			<tr>
				<th class="has-gray-bg">Ingresos Totales (Netos)</th>
				<th colspan="2" class="has-gray-bg">$<?php echo number_format($ingresos_gastos_actual_Ingresos_total, 2) ?></th>
			</tr>
		</table>


		<!-- GASTOS MENSUALES -->
		<table>
			<tr>
				<th class="has-gray-bg" colspan="3">GASTOS MENSUALES</th>
			</tr>

			<tr>
				<th width="10%">1</th>
				<th width="45%">CASA</th>
				<th width="45%"><?php echo number_format($gastos_mensu__casa_total, 2) ?></th>	
			</tr>

			<tr>
				<td>1.1</td>
				<td>Cuota: préstamo</td>
				<td><?php echo $gastos_mensu__cuota_presta ?></td>
			</tr>
			<tr>
				<td>1.2</td>
				<td>Cuota: Alquiler</td>
				<td><?php echo $gastos_mensu__cuota_aquil ?></td>
			</tr>
			<!-- ----- -->
			<tr>
				<td>1.3</td>
				<td>Vigilancia</td>
				<td><?php echo $gastos_mensu__vigilancia ?></td>
			</tr>
			<tr>
				<td>1.4</td>
				<td>Alcaldía</td>
				<td><?php echo $gastos_mensu__alcaldia ?></td>
			</tr>
			<tr>
				<td>1.5</td>
				<td>Electricidad</td>
				<td><?php echo $gastos_mensu__electricidad ?></td>
			</tr>
			<tr>
				<td>1.6</td>
				<td>Agua potable</td>
				<td><?php echo $gastos_mensu__agua_potable ?></td>
			</tr>
			<tr>
				<td>1.7</td>
				<td>Agua - Embotellada o Filtro</td>
				<td><?php echo $gastos_mensu__agua_embotellada_filtro ?></td>
			</tr>
			<tr>
				<td>1.8</td>
				<td>Gas propano</td>
				<td><?php echo $gastos_mensu__gas_propano ?></td>
			</tr>
			<tr>
				<td>1.9</td>
				<td>Celular</td>
				<td><?php echo $gastos_mensu__celular ?></td>
			</tr>
			<tr>
				<td>1.10</td>
				<td>Internet / Fijo / Cable</td>
				<td><?php echo $gastos_mensu__internet_fijo_cable ?></td>
			</tr>
			<tr>
				<td>1.11</td>
				<td>Servicio domestico</td>
				<td><?php echo $gastos_mensu__servicio_domestico ?></td>
			</tr>
			<tr>
				<td>1.12</td>
				<td>Jardinero</td>
				<td><?php echo $gastos_mensu__jardinero ?></td>
			</tr>
			<tr>
				<td>1.13</td>
				<td>Otros: </td>
				<td><?php echo $gastos_mensu__otros ?></td>
			</tr>
			<!-- -------------- -->
			<tr>
				<td>1.14</td>
				<td>Prov. Mantenimiento y Reparaciones</td>
				<td><?php echo number_format($provi__manten_repa_total, 2) ?></td>
			</tr>
			<tr>
				<td>1.15</td>
				<td>Prov. Compra de artículos del Hogar</td>
				<td><?php echo number_format($provision_ttl, 2) ?></td>
			</tr>
			<tr>
				<td>1.16</td>
				<td>Prov. Aguinaldo de empleados</td>
				<td><?php echo $gastos_mensu__prov_agui_empl ?></td>
			</tr>
			<tr class="has-gray-bg">
				<th colspan="2">Total Provisión de Casa</th>
				<td><?php echo number_format($gastos_mensu__prov_total, 2) ?></td>
			</tr>
		</table>
		
	</div>	
</div>
