<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<!-- balance general -->
<div class="fman-single-item fman-finan-info">
	<h3>
		Detalle de Ingresos
		<div class="fman-chevicon-header">
			<?php echo $chev_icn; ?>
		</div>
	</h3>


	<div class="fman-table">

		
		<table>
			<tr>
				<th class="has-gray-bg" colspan="3">Información proporcionada por cliente</th>
			</tr>
		</table>

		<!-- table - Salarios -->
		<table>
			<tr>
				<th width="30%" class="has-gray-bg">Salarios</th>
				<th width="30%" class="has-gray-bg">Titular</th>
				<th width="30%" class="has-gray-bg">Cónyuge</th>
			</tr>

			<tr>
				<td>Sueldo mensual bruto</td>
				<td><?php echo $salarios['sueldo_mensual_bruto_titular'] ?></td>
				<td><?php echo $salarios['sueldo_mensual_bruto_conyuge'] ?></td>
			</tr>
			<tr>
				<td>Comisiones mensuales brutas</td>
				<td><?php echo $salarios['comisiones_mensuales_brutas_titular'] ?></td>
				<td><?php echo $salarios['comisiones_mensuales_brutas_conyuge'] ?></td>
			</tr>
		</table>

		<!-- table - Servicios Profesionales -->
		<table>
			<tr>
				<th width="30%" class="has-gray-bg">Servicios Profesionales</th>
				<th width="30%" class="has-gray-bg">Titular</th>
				<th width="30%" class="has-gray-bg">Cónyuge</th>
			</tr>

			<tr>
				<td>Ingresos Brutos Mensuales</td>
				<td><?php echo $servi_profes['ingresos_brutos_mensuales_titular'] ?></td>
				<td><?php echo $servi_profes['ingresos_brutos_mensuales_conyuge'] ?></td>
			</tr>
		</table>

		<!-- table - Empresa	 -->
		<table>
			<tr>
				<th width="30%" class="has-gray-bg">Empresa</th>
				<th width="30%" class="has-gray-bg">Titular</th>
				<th width="30%" class="has-gray-bg">Cónyuge</th>
			</tr>

			<tr>
				<td>Ingresos Brutos Mensuales</td>
				<td><?php echo $empresa['empresa_ingresos_brutos_mensuales_titular'] ?></td>
				<td><?php echo $empresa['empresa_ingresos_brutos_mensuales_conyuge'] ?></td>
			</tr>
			<tr>
				<td>Dividendos anuales</td>
				<td><?php echo $empresa['empresa_dividendos_anuales_titular'] ?></td>
				<td><?php echo $empresa['empresa_dividendos_anuales_conyuge'] ?></td>
			</tr>
		</table>


		<!-- table - Otros		 -->
		<table>
			<tr>
				<th width="30%" class="has-gray-bg">Otros</th>
				<th width="30%" class="has-gray-bg">Titular</th>
				<th width="30%" class="has-gray-bg">Cónyuge</th>
			</tr>

			<tr>
				<td>Alquileres</td>
				<td><?php echo $ingresos_otros['otros_alquileres_titular'] ?></td>
				<td><?php echo $ingresos_otros['otros_alquileres_conyuge'] ?></td>
			</tr>
			<tr>
				<td>Ayuda familiar</td>
				<td><?php echo $ingresos_otros['otros_ayuda_familiar_titular'] ?></td>
				<td><?php echo $ingresos_otros['otros_ayuda_familiar_conyuge'] ?></td>
			</tr>
			<tr>
				<td>Intereses por inversiones</td>
				<td><?php echo $ingresos_otros['otros_intereses_por_inversiones_titular'] ?></td>
				<td><?php echo $ingresos_otros['otros_intereses_por_inversiones_conyuge'] ?></td>
			</tr>
		</table>
		

		<!-- table - Cálculo de Prestaciones de Ley			 -->
		<table>
			<tr>
				<th width="30%" class="has-gray-bg">Cálculo de Prestaciones de Ley</th>
				<th width="30%" class="has-gray-bg">Titular</th>
				<th width="30%" class="has-gray-bg">Cónyuge</th>
			</tr>

			<tr>
				<td>Alquileres</td>
				<td><?php echo $calc_de_prestac['ingresar_anos_de_laborar_titular'] ?></td>
				<td><?php echo $calc_de_prestac['ingresar_anos_de_laborar_conyuge'] ?></td>
			</tr>
			<tr>
				<td>Ayuda familiar</td>
				<td><?php echo $calc_de_prestac['fecha_inicio_de_labores_titular'] ?></td>
				<td><?php echo $calc_de_prestac['fecha_inicio_de_labores_conyuge'] ?></td>
			</tr>
		</table>



		<!-- table - Cálculo de Prestaciones adicionales			 -->
		<table>
			<tr>
				<th width="30%" class="has-gray-bg">Cálculo de Prestaciones adicionales</th>
				<th width="30%" class="has-gray-bg">Titular</th>
				<th width="30%" class="has-gray-bg">Cónyuge</th>
			</tr>

			<tr>
				<td>Aguinaldo</td>
				<td><?php echo $calc_de_prestac_adi['prestacio_aguinaldo_titular'] ?></td>
				<td><?php echo $calc_de_prestac_adi['prestacio_aguinaldo_conygue'] ?></td>
			</tr>
			<tr>
				<td>Vacaciones</td>
				<td><?php echo $calc_de_prestac_adi['prestacio_vacaciones_titular'] ?></td>
				<td><?php echo $calc_de_prestac_adi['prestacio_vacaciones_conyuge'] ?></td>
			</tr>
			<tr>
				<td>Bonos</td>
				<td><?php echo $calc_de_prestac_adi['prestacio_bonos_titular'] ?></td>
				<td><?php echo $calc_de_prestac_adi['prestacio_bonos_conyuge'] ?></td>
			</tr>
			<tr>
				<td>Celular</td>
				<td><?php echo $calc_de_prestac_adi['prestacio_celular_titular'] ?></td>
				<td><?php echo $calc_de_prestac_adi['prestacio_celular_conyuge'] ?></td>
			</tr>
			<tr>
				<td>Seguros</td>
				<td><?php echo $calc_de_prestac_adi['prestacio_seguros_titular'] ?></td>
				<td><?php echo $calc_de_prestac_adi['prestacio_seguros_conyuge'] ?></td>
			</tr>
			<tr>
				<td>Gasolina</td>
				<td><?php echo $calc_de_prestac_adi['prestacio_gasolina_titular'] ?></td>
				<td><?php echo $calc_de_prestac_adi['prestacio_gasolina_conyuge'] ?></td>
			</tr>
			<tr>
				<td>Otros</td>
				<td><?php echo $calc_de_prestac_adi['prestacio_otros_titular'] ?></td>
				<td><?php echo $calc_de_prestac_adi['prestacio_otros_conyuge'] ?></td>
			</tr>
		</table>
		
	</div>	
</div>