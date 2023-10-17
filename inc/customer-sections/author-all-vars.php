<?php 
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

$chev_icn = '
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
</svg>
';
/*
|---------------------------------------------------------------------
| personal info vars
|---------------------------------------------------------------------
*/ 
$titular     = get_field('titular', 'user_'.$autid);
$conyuge     = get_field('conyuge', 'user_'.$autid);
$dependientes = get_field('dependiente', 'user_'.$autid);
$note_personal_info = get_field('note-personal-info', 'user_'.$autid);



/*
|---------------------------------------------------------------------
| finalcial info vars
|---------------------------------------------------------------------
*/ 
$residencia      = get_field('residencia', 'user_'.$autid);




function casa_return_cost($mark_val, $quota){
  if($mark_val > 0){
    return (($quota * 12) / $mark_val) * 100;
  } else {
    return 0;
  }
}
$casa_prop_val_markedo = intval($residencia['casa_propia']['valor_de_mercado']);
$casa_prop_quota       = intval($residencia['casa_propia']['quota']);
$casa_prop_ret_const   = casa_return_cost($casa_prop_val_markedo, $casa_prop_quota);


$casa_fam_val_markedo = intval($residencia['casa_familiar']['valor_de_mercado']);
$casa_fam_quota       = intval($residencia['casa_familiar']['quota']);
$casa_fam_ret_const   = casa_return_cost($casa_fam_val_markedo, $casa_fam_quota);

$casa_aqui_val_markedo = intval($residencia['alquilada']['valor_de_mercado']);
$casa_aqui_quota       = intval($residencia['alquilada']['quota']);
$casa_aqui_ret_const   = casa_return_cost($casa_aqui_val_markedo, $casa_aqui_quota);




$otros_inmuebles = get_field('otros_inmuebles', 'user_'.$autid);
$otros_inmuebles = $otros_inmuebles['inmuebles'];

$vehiculos       = get_field('vehiculos_info_fina', 'user_'.$autid);
$vehiculos       = $vehiculos['vehiculoss'];


$otros_pos_var   = get_field('otros_posesiones_varias', 'user_'.$autid);
$cuentas_banca_efect  = get_field('cuentas_bancarias_y_efectivo', 'user_'.$autid);


$deposit_inve  = get_field('depositos_e_inversiones', 'user_'.$autid);


$saldo_de_afp  = get_field('saldo_de_afp', 'user_'.$autid);

$titular_birthday = $titular['fecha_de_nacimiento'];
$titular_age = fman_get_age_from_adate($titular_birthday);
$titular_retire_year = (60 - $titular_age);

$conyuge_birthday = $conyuge['fecha_de_nacimiento'];
$conyuge_age = fman_get_age_from_adate($conyuge_birthday);
$conyuge_retire_year = (55 - $conyuge_age);

$saldo_afp_arr = [];
$saldo_afp_valor_ttl = 0;
if($saldo_de_afp['afps']){
    foreach ($saldo_de_afp['afps'] as $afp) {
    if($afp['holder'] == 'Titular'){
        $retire_year_ag = $titular_retire_year;
    } elseif ($afp['holder'] == 'Cónyuge') {
        $retire_year_ag = $conyuge_retire_year;
    }

    $saldo_afp_items = [
        'holder' => $afp['holder'],
        'valor' => $afp['valor'],
        'retire_year_ag' => $retire_year_ag,
        'ya_realizo_afp' => $afp['ya_realizo_el_retiro_del_afp'],
        'ha_cotizad_afp' => $afp['ha_cotizado_10_anos_el_afp'],
    ];
    $saldo_afp_arr[] = $saldo_afp_items;
    $saldo_afp_valor_ttl += intval($afp['valor']);
}}

$note_financial_info = get_field('note-financial-info', 'user_'.$autid);





/*
|---------------------------------------------------------------------
| posesiones varias
|---------------------------------------------------------------------
*/ 
$posesiones__sala = get_field('posesiones__sala', 'user_'.$autid);

$posesiones__sala_arr = [];
$precio_compra_ttl = 0;
$provision_ttl = 0;
if($posesiones__sala['posesiones__sala']){
foreach ($posesiones__sala['posesiones__sala'] as $sala) {
  $precio_compra_ttl += intval($sala['precio_compra']);
  $provision_ttl += intval($sala['provision']);
  $calc_prov_ttl_a_prov = (intval($sala['precio_compra']) * intval($sala['cantidad']));
  $calc_prov_frequ_meses = (intval($sala['anos_para_cambio']) * 12);
  $posesiones__sala_item = [
    'concepto' => $sala['concepto'],
    'precio_compra' => $sala['precio_compra'],
    'cantidad' => $sala['cantidad'],
    'anos_para_cambio' => $sala['anos_para_cambio'],
    'provision' => $sala['provision'],
    'provision_mensual' => $sala['provision_mensual'],
    'calc_prov_ttl_a_prov' => $calc_prov_ttl_a_prov,
    'calc_prov_frequ_meses' => $calc_prov_frequ_meses,
  ];
  $posesiones__sala_arr[] = $posesiones__sala_item;
}}














/*
|---------------------------------------------------------------------
| seguros vars
|---------------------------------------------------------------------
*/ 
$gastos_medicos = get_field('gastos_medicos', 'user_'.$autid);
$gastos_medicos_c = $gastos_medicos['gastos_conyuge'];

$fuma_tit = $gastos_medicos['¿fuma_tit'];
$fuma_cony = $gastos_medicos['¿fuma_con'];
$gastos_medicos = $gastos_medicos['gastos'];

$plan_de_retiro = get_field('plan_de_retiro', 'user_'.$autid);
$vida_prot_ingr = get_field('vida_-_proteccion_de_ingresos', 'user_'.$autid);
$vida_deuda = get_field('vida_-_deuda', 'user_'.$autid);
$danos_residenciales = get_field('danos_residenciales', 'user_'.$autid);
$seg_vehiculos = get_field('vehiculos', 'user_'.$autid);

$seg_legal = get_field('legal', 'user_'.$autid);

$note_seguros = get_field('note-seguros', 'user_'.$autid);




/*
|---------------------------------------------------------------------
|  deudas info vars
|---------------------------------------------------------------------
*/ 
$prestamos_hipotecarios = get_field('prestamos_-_hipotecarios', 'user_'.$autid);
$prestamos_personales   = get_field('prestamos_-_personales', 'user_'.$autid);
$tarjeta_credito   = get_field('tarjetastarjetas_de_credito', 'user_'.$autid);
$extrafinanciamientos   = get_field('extrafinanciamientos_compras_a_plazos', 'user_'.$autid);
$vehiculoss   = get_field('vehiculo', 'user_'.$autid);
$otrosss   = get_field('otros', 'user_'.$autid);

$note_deudas_info = get_field('note-deudas-detail', 'user_'.$autid);
$group_deudas_strategy = get_field('estrategia_de_deudas', 'user_'.$autid);





/*
|---------------------------------------------------------------------
| balance personal
|---------------------------------------------------------------------
*/ 
$bl_cuentas_banca_efect  = get_field('cuentas_bancarias_y_efectivo', 'user_'.$autid);
$ctas_planill_total = 0;
$ctas_ahorr_total = 0;
$ctas_corrient_total = 0;
if($bl_cuentas_banca_efect['cuentas']){
  foreach ($bl_cuentas_banca_efect['cuentas'] as $cuentas) {
    $ctas_planill_total += $cuentas['planillera'];
    $ctas_ahorr_total   += $cuentas['ahorro'];
    $ctas_corrient_total   += $cuentas['corriente'];
  }
}

$ctas_total = ($ctas_planill_total + $ctas_ahorr_total + $ctas_corrient_total);

$bl_deop_inves  = get_field('depositos_e_inversiones', 'user_'.$autid);


$group_balance_genral = get_field('balance_personal', 'user_'.$autid);

// // distribution de activos chart vals
// $activo_circulante_chart = ($ctas_total / );
// $inversiones_chart = 0;
// $activo_fijo_chart = 0;




/*
|---------------------------------------------------------------------
| Protocol de inversion actual
|---------------------------------------------------------------------
*/ 

// Avarage- detail de deuda - Hipotecarios - tasa efectiva
$deuda_count_tasa_ef = 0;
$deuda_count_tasa_total = 0;
$saldo_hipotec_total = 0;
if($prestamos_hipotecarios['prestamos']){
foreach ($prestamos_hipotecarios['prestamos'] as $prestamos) {
  $deuda_count_tasa_total += $prestamos['tasa_efectiva'];
  $saldo_hipotec_total += $prestamos['saldo_a_la_fecha'];
  $deuda_count_tasa_ef++;
}}

$deuda_hipo_efec_average = ($deuda_count_tasa_ef > 0) ? ($deuda_count_tasa_total / $deuda_count_tasa_ef) : 0;
$pro_inv_act_hipo_monto = ($saldo_hipotec_total * -1);
$pro_inv_act_hipo_ret_anu_ = $deuda_hipo_efec_average * $pro_inv_act_hipo_monto;
$pro_inv_act_hipo_ret_men_ = $pro_inv_act_hipo_ret_anu_ / 12;





// Avarage- detail de deuda - Personales - tasa efectiva
$deuda_pers_tasa_ef = 0;
$deuda_pers_tasa_total = 0;
$saldo_personal_total = 0;
if($prestamos_personales['prestamos']){
foreach ($prestamos_personales['prestamos'] as $prestamos) {
  $deuda_pers_tasa_ef += $prestamos['tasa_efectiva'];
  $saldo_personal_total += $prestamos['saldo_a_la_fecha'];
  $deuda_pers_tasa_total++;
}}

$deud_perso_efec_average = ($deuda_pers_tasa_ef > 0) ? ($deuda_pers_tasa_total / $deuda_pers_tasa_ef) : 0;
$pro_inv_act_perso_monto = ($saldo_personal_total * -1);
$pro_inv_act_perso_ret_anu_ = $deud_perso_efec_average * $pro_inv_act_perso_monto;
$pro_inv_act_perso_ret_men_ = $pro_inv_act_perso_ret_anu_ / 12;







// Avarage- detail de deuda - Tarje - tasa efectiva
$deu_terj_tasa_total = 0;
$deu_terj_tasa_count = 0;
$saldo_terjetas_total = 0;
if($tarjeta_credito['tarjetas']){
foreach ($tarjeta_credito['tarjetas'] as $tarjetas) {
  $deu_terj_tasa_total += $tarjetas['tasa_efectiva'];
  $saldo_terjetas_total += $tarjetas['saldo_a_la_fecha'];
  $deu_terj_tasa_count++;
}}
$deu_terj_tasa_avg = ($deu_terj_tasa_total > 0) ? ($deu_terj_tasa_count / $deu_terj_tasa_total) : 0;
$pro_inv_act_terj_monto = ($saldo_terjetas_total * -1);
$pro_inv_act_terj_ret_anu_ = $deu_terj_tasa_avg * $pro_inv_act_terj_monto;
$pro_inv_act_terj_ret_men_ = $pro_inv_act_terj_ret_anu_ / 12;


// Avarage- detail de deuda - extra - tasa efectiva
$deu_ext_tasa_total = 0;
$deu_ext_tasa_count = 0;
$saldo_amiento_total = 0;
if($extrafinanciamientos['extrafinanciamientos']){
foreach ($extrafinanciamientos['extrafinanciamientos'] as $mientos) {
  $deu_ext_tasa_total += $mientos['tasa_efectiva'];
  $saldo_amiento_total += $mientos['saldo_a_la_fecha'];
  $deu_ext_tasa_count++;
}}
$deu_ext_tasa_avg = ($deu_ext_tasa_total > 0) ? ($deu_ext_tasa_count / $deu_ext_tasa_total) : 0;
$pro_inv_act_ext_monto = ($saldo_amiento_total * -1);
$pro_inv_act_ext_ret_anu_ = $deu_ext_tasa_avg * $pro_inv_act_ext_monto;
$pro_inv_act_ext_ret_men_ = $pro_inv_act_ext_ret_anu_ / 12;



// Avarage- detail de deuda - vhcl - tasa efectiva
$deu_vehicl_tasa_total = 0;
$deu_vehicl_tasa_count = 0;
$saldo_vehicle_total = 0;
if($vehiculoss['vehiculos']){
foreach ($vehiculoss['vehiculos'] as $vehiculo) {
  $deu_vehicl_tasa_total += $vehiculo['tasa_efectiva'];
  $saldo_vehicle_total += $vehiculo['saldo_a_la_fecha'];
  $deu_vehicl_tasa_count++;
}}

$deu_vhcl_tasa_avg = ($deu_vehicl_tasa_total > 0) ? ($deu_vehicl_tasa_count / $deu_vehicl_tasa_total) : 0;
$pro_inv_act_vhc_monto = ($saldo_vehicle_total * -1);
$pro_inv_act_vhc_ret_anu_ = $deu_vhcl_tasa_avg * $pro_inv_act_vhc_monto;
$pro_inv_act_vhc_ret_men_ = $pro_inv_act_vhc_ret_anu_ / 12;



// Avarage- detail de deuda - otr - tasa efectiva
$deu_otr_tasa_total = 0;
$deu_otr_tasa_count = 0;
$saldo_otros_total = 0;
if($otrosss['otros']){
foreach ($otrosss['otros'] as $otros) {
  $deu_otr_tasa_total += $otros['tasa_efectiva'];
  $saldo_otros_total += $otros['saldo_a_la_fecha'];
  $deu_otr_tasa_count++;
}}
$deu_otr_tasa_avg = ($deu_otr_tasa_total > 0) ? ($deu_otr_tasa_count / $deu_otr_tasa_total) : 0;
$pro_inv_act_otr_monto = ($saldo_otros_total * -1);
$pro_inv_act_otr_ret_anu_ = $deu_otr_tasa_avg * $pro_inv_act_otr_monto;
$pro_inv_act_otr_ret_men_ = $pro_inv_act_otr_ret_anu_ / 12;






/*
|-----------------------------------------------------------------
|  Information ingresos vars
|-----------------------------------------------------------------
*/
$salarios = get_field('salarios', 'user_'.$autid);
$servi_profes = get_field('servicios_profesionales', 'user_'.$autid);
$empresa = get_field('empresa');
$ingresos_otros = get_field('ingresos_-_otros_', 'user_'.$autid);
$calc_de_prestac = get_field('calculo_de_prestaciones', 'user_'.$autid);
$calc_de_prestac_adi = get_field('calculo_de_prestaciones_adi', 'user_'.$autid);





/*
|-----------------------------------------------------------------
|  Calculo de provisiones
|-----------------------------------------------------------------
*/
$provisiones__mantenim_repara = get_field('casa_provisiones', 'user_'.$autid);

$provi__manten_repa_arr = [];
$provi__manten_repa_total = 0;
if($provisiones__mantenim_repara['casa_provisiones']){
foreach ($provisiones__mantenim_repara['casa_provisiones'] as $mante_rep) {

  $total_provisio = ($mante_rep['gasto_proyectado'] * $mante_rep['no_de_personas_articulos']);
  $only_provisio  = ($total_provisio / $mante_rep['frecuencia_meses']);
  $provi__manten_repa_total += $only_provisio;
  $provi_manten_repa_item = [
      'concepto' => $mante_rep['concepto'],
      'gasto_proyectado' => $mante_rep['gasto_proyectado'],
      'no_de_personas_articulos' => $mante_rep['no_de_personas_articulos'],
      'total_provisio' => number_format($total_provisio, 2),
      'frecuencia_meses' => $mante_rep['frecuencia_meses'],
      'only_provisio' => number_format($only_provisio, 2),
      'provision_mensual' => $mante_rep['provision_mensual'],
  ];
  
  $provi__manten_repa_arr[] = $provi_manten_repa_item;
}}









/*
|-----------------------------------------------------------------
|  Ingresos-gastos actual
|-----------------------------------------------------------------
*/
// START : ingresos gastos actual - Salario mensual - titular conyuge
$ingr_Salario_tit  = intval($salarios['sueldo_mensual_bruto_titular']);
$ingr_Salario_cony = intval($salarios['sueldo_mensual_bruto_conyuge']);
// END  : ingresos gastos actual - Salario mensual - titular conyuge


// START : ingresos gastos actual - Comisiones - titular conyuge
$ingr_Comisiones_tit  = intval($salarios['comisiones_mensuales_brutas_titular']);
$ingr_Comisiones_cony = intval($salarios['comisiones_mensuales_brutas_conyuge']);
// END  : ingresos gastos actual - Comisiones - titular conyuge

// START: ingresos gastos actual - Aguinaldo - titular conyuge
$ingr_presta_ley_labo_cum_tit = $calc_de_prestac['ingresar_anos_de_laborar_titular']; //A20
$ingr_sala_seul_mes_tit = $calc_de_prestac['ingresar_anos_de_laborar_titular']; // A14
$fecha_inicio_labo_tit = $calc_de_prestac['fecha_inicio_de_labores_titular']; //A29
$ingr_gas_act_ingr_presta_adi_tit = $calc_de_prestac_adi['prestacio_aguinaldo_titular']; //I12

$ingr_presta_ley_labo_cum_cony = $calc_de_prestac['ingresar_anos_de_laborar_conyuge'];
$ingr_sala_seul_mes_cony = $calc_de_prestac['ingresar_anos_de_laborar_conyuge'];
$fecha_inicio_labo_cony = $calc_de_prestac['fecha_inicio_de_labores_conyuge'];
$ingr_gas_act_ingr_presta_adi_cony = $calc_de_prestac_adi['prestacio_aguinaldo_conygue'];


function calculate_ing_gas_act_cumplidos($A20, $A14) {
    if ($A20 > 1 && $A20 <= 3) {
        return ($A14 / 30) * 15;
    } elseif ($A20 > 3 && $A20 <= 10) {
        return ($A14 / 30) * 19;
    } elseif ($A20 > 10) {
        return ($A14 / 30) * 21;
    } else {
        return "Proporcional";
    }
}

$aguinaldo_por_anos_tit = calculate_ing_gas_act_cumplidos($ingr_presta_ley_labo_cum_tit, $ingr_sala_seul_mes_tit); // A26
$aguinaldo_por_anos_cony = calculate_ing_gas_act_cumplidos($ingr_presta_ley_labo_cum_cony, $ingr_sala_seul_mes_cony);

function aguianando_prorporcional($A14, $A29){
  $result = (15 / 365) * (intval($A14) / 30) * intval($A29);
  return $result;
}

$aguinaldo_prorp_tit = aguianando_prorporcional($ingr_sala_seul_mes_tit, $fecha_inicio_labo_tit); // A32
$aguinaldo_prorp_cony = aguianando_prorporcional($ingr_sala_seul_mes_cony, $fecha_inicio_labo_cony);

function calculate_ing_gas_act_aguinaldo($I12, $A26, $A32) {
    if ($I12 > 0) {
        return $I12 / 12;
    } else {
        if ($A26 === "Proporcional") {
            return $A32 / 12;
        } else {
            return $A26 / 12;
        }
    }
}

$ing_gas_act_aguinaldo_tit = calculate_ing_gas_act_aguinaldo($ingr_gas_act_ingr_presta_adi_tit, $aguinaldo_por_anos_tit, $aguinaldo_prorp_tit);
$ing_gas_act_aguinaldo_cony = calculate_ing_gas_act_aguinaldo($ingr_gas_act_ingr_presta_adi_cony, $aguinaldo_por_anos_cony, $aguinaldo_prorp_cony);
// END: ingresos gastos actual - Aguinaldo - titular conyuge


// START: ingresos gastos actual - Vacaciones - titular conyuge
function calculate_ing_gas_act_vacaciones($A14, $A20, $A29) {
    if ($A29 >= 200 || $A20 > 0) {
        return ($A14 / 2) * 0.30;
    } else {
        return 0;
    }
}

$calculate_ing_gas_act_vacaci_tit = calculate_ing_gas_act_vacaciones($ingr_sala_seul_mes_tit, $ingr_presta_ley_labo_cum_tit, $fecha_inicio_labo_tit); // A35
$calculate_ing_gas_act_vacaci_cony = calculate_ing_gas_act_vacaciones($ingr_sala_seul_mes_cony, $ingr_presta_ley_labo_cum_cony, $fecha_inicio_labo_cony);

$ingr_gas_act_ingr_presta_adi_vacaci_tit = $calc_de_prestac_adi['prestacio_vacaciones_titular']; //I13
$ingr_gas_act_ingr_presta_adi_vacaci_cony = $calc_de_prestac_adi['prestacio_vacaciones_conyuge'];

function calculate_ing_gas_act_vacaciones_main($I13, $A20, $A35) {
    if ($I13 > 0) {
        return $I13 / 12;
    } elseif ($A20 > 0) {
        return $A35 / 12;
    } else {
        return 0;
    }
}

$ing_gas_act_Vacaciones_tit = calculate_ing_gas_act_vacaciones_main($ingr_gas_act_ingr_presta_adi_vacaci_tit, $ingr_presta_ley_labo_cum_tit, $calculate_ing_gas_act_vacaci_tit);

$ing_gas_act_Vacaciones_cony = calculate_ing_gas_act_vacaciones_main($ingr_gas_act_ingr_presta_adi_vacaci_cony, $ingr_presta_ley_labo_cum_cony, $calculate_ing_gas_act_vacaci_cony);
// END  : ingresos gastos actual - Vacaciones - titular conyuge


// START : ingresos gastos actual - Servicios profesionales - titular conyuge
$ingr_serv_pro_ingbruto_tit = intval($servi_profes['ingresos_brutos_mensuales_titular']);
$ingr_serv_pro_ingbruto_cony = intval($servi_profes['ingresos_brutos_mensuales_conyuge']);
$ingr_Retencion_de_renta_tit = ($ingr_serv_pro_ingbruto_tit * 0.1);
$ingr_Retencion_de_renta_cony = ($ingr_serv_pro_ingbruto_cony * 0.1);

$ing_gas_act_servic_profe_tit = ($ingr_serv_pro_ingbruto_tit - $ingr_Retencion_de_renta_tit);
$ing_gas_act_servic_profe_cony = ($ingr_serv_pro_ingbruto_cony - $ingr_Retencion_de_renta_cony);
// END  : ingresos gastos actual - Servicios profesionales - titular conyuge




// START : ingresos gastos actual - Empresa - titular conyuge
$ingr_serv_pro_ingbruto_empr_tit = intval($empresa['empresa_ingresos_brutos_mensuales_titular']);
$ingr_serv_pro_ingbruto_empr_cony = intval($empresa['empresa_ingresos_brutos_mensuales_conyuge']);
$ingr_Retencion_de_renta_empr_tit = ($ingr_serv_pro_ingbruto_empr_tit * 0.1);
$ingr_Retencion_de_renta_empr_cony = ($ingr_serv_pro_ingbruto_empr_cony * 0.1);

$ing_gas_act_empresa_tit = ($ingr_serv_pro_ingbruto_empr_tit - $ingr_Retencion_de_renta_empr_tit);
$ing_gas_act_empresa_cony = ($ingr_serv_pro_ingbruto_empr_cony - $ingr_Retencion_de_renta_empr_cony);
// END  : ingresos gastos actual - Empresa - titular conyuge



// START : ingresos gastos actual - Dividendos - titular conyuge
$ingr_dividendos_anu_empr_tit = intval($empresa['empresa_dividendos_anuales_titular']);
$ingr_dividendos_anu_empr_cony = intval($empresa['empresa_dividendos_anuales_conyuge']);
$ingr_divid_eten_de_renta_empr_tit = ($ingr_dividendos_anu_empr_tit * 0.05);
$ingr_divid_eten_de_renta_empr_cony = ($ingr_dividendos_anu_empr_cony * 0.05);

$ing_gas_act_devidendos_tit = ($ingr_dividendos_anu_empr_tit - $ingr_divid_eten_de_renta_empr_tit)/12;
$ing_gas_act_devidendos_cony = ($ingr_dividendos_anu_empr_cony - $ingr_divid_eten_de_renta_empr_cony)/12;
// END  : ingresos gastos actual - Dividendos - titular conyuge


// START : ingresos gastos actual - Alquileres - titular conyuge
$ingr_Alquileres_tit  = intval($ingresos_otros['otros_alquileres_titular']);
$ingr_Alquileres_cony = intval($ingresos_otros['otros_alquileres_conyuge']);
// END  : ingresos gastos actual - Alquileres - titular conyuge


$ingresos_gastos_actual_Ingresos_total = (
  $ing_gas_act_aguinaldo_tit
  + $ing_gas_act_aguinaldo_cony
  + $ing_gas_act_Vacaciones_tit
  + $ing_gas_act_Vacaciones_cony
  + $ing_gas_act_servic_profe_tit
  + $ing_gas_act_servic_profe_cony
  + $ing_gas_act_empresa_tit
  + $ing_gas_act_empresa_cony
  + $ing_gas_act_devidendos_tit
  + $ing_gas_act_devidendos_cony
  + $ingr_Alquileres_tit
  + $ingr_Alquileres_cony
  + $ingr_Salario_tit
  + $ingr_Salario_cony
  + $ingr_Comisiones_tit
  + $ingr_Comisiones_cony
);



//------// GASTOS MENSUALES
$gastos_mensuales_grp = get_field('gastos_mensuales', 'user_'.$autid);


$gastos_mensu__cuota_presta = $casa_prop_quota;
$gastos_mensu__cuota_aquil  = $casa_aqui_quota;


$gastos_mensu__vigilancia = intval($gastos_mensuales_grp['vigilancia']);
$gastos_mensu__alcaldia = intval($gastos_mensuales_grp['alcaldia']);
$gastos_mensu__electricidad = intval($gastos_mensuales_grp['electricidad']);
$gastos_mensu__agua_potable = intval($gastos_mensuales_grp['agua_potable']);
$gastos_mensu__agua_embotellada_filtro = intval($gastos_mensuales_grp['agua_embotellada_filtro']);
$gastos_mensu__gas_propano = intval($gastos_mensuales_grp['gas_propano']);
$gastos_mensu__celular = intval($gastos_mensuales_grp['celular']);
$gastos_mensu__internet_fijo_cable = intval($gastos_mensuales_grp['internet_fijo_cable']);
$gastos_mensu__servicio_domestico = intval($gastos_mensuales_grp['servicio_domestico']);
$gastos_mensu__jardinero = intval($gastos_mensuales_grp['jardinero']);
$gastos_mensu__otros = intval($gastos_mensuales_grp['otros']);
$gastos_mensu__prov_agui_empl = intval($gastos_mensuales_grp['prov_aguinaldo_de_empleados']);


$gastos_mensu__prov_total = ($gastos_mensu__prov_agui_empl + $provi__manten_repa_total +$provision_ttl);
$gastos_mensu__casa_total = (
  $gastos_mensu__cuota_presta
  + $gastos_mensu__cuota_aquil
  + $gastos_mensu__vigilancia
  + $gastos_mensu__alcaldia
  + $gastos_mensu__electricidad
  + $gastos_mensu__agua_potable
  + $gastos_mensu__agua_embotellada_filtro
  + $gastos_mensu__gas_propano
  + $gastos_mensu__celular
  + $gastos_mensu__internet_fijo_cable
  + $gastos_mensu__servicio_domestico
  + $gastos_mensu__jardinero
  + $gastos_mensu__otros
  + $gastos_mensu__prov_total
);
      






/*
|-----------------------------------------------------------------
|  guia de ingreso soltero
|-----------------------------------------------------------------
*/
$guia_ingreso_soltero = get_field('guia_ingreso_soltero', 'user_'.$autid);
$guia_ingreso_soltero = $guia_ingreso_soltero['guia_ingreso_soltero'];


/*
|-----------------------------------------------------------------
|  guia de ingreso familiar
|-----------------------------------------------------------------
*/
$guia_ingreso_familiar = get_field('guia_ingreso_familiar', 'user_'.$autid);
$guia_ingreso_familiar = $guia_ingreso_familiar['guia_ingreso_familiar'];

























?>