<?php
get_header();
if (is_user_logged_in()){
$usrid = get_current_user_id();
$autid = get_query_var('author');
if($usrid == $autid || current_user_can('administrator')){

?>
<div class="main-wrap">

<?php 
// customer all variables
include_once(get_stylesheet_directory() . '/inc/customer-sections/author-all-vars.php');



// customer personal info
include_once(get_stylesheet_directory() . '/inc/customer-sections/customer-personal-info.php');


// customer financial info
include_once(get_stylesheet_directory() . '/inc/customer-sections/customer-financial-info.php');

// customer posesiones varias
include_once(get_stylesheet_directory() . '/inc/customer-sections/customer-posesiones-varias.php');

// customer seguros info
include_once(get_stylesheet_directory() . '/inc/customer-sections/customer-seguros.php');

// customer deudas info
include_once(get_stylesheet_directory() . '/inc/customer-sections/customer-deudas-info.php');

// customer balance
include_once(get_stylesheet_directory() . '/inc/customer-sections/customer-balance-general.php');

// Protocolo de inversion actual
include_once(get_stylesheet_directory() . '/inc/customer-sections/customer-protocol-inver-actual.php');

// information ingresos
include_once(get_stylesheet_directory() . '/inc/customer-sections/customer-information-ingresos.php');

// information ingresos gastos actual
include_once(get_stylesheet_directory() . '/inc/customer-sections/customer-ingresos-gastos-actual.php');


// calculo de provisiones
include_once(get_stylesheet_directory() . '/inc/customer-sections/customer-calculo-de-provisiones.php');





// guia-ingreso-sltero
include_once(get_stylesheet_directory() . '/inc/customer-sections/customer-guia-ingreso-sltero.php');
// guia-ingreso-familiar
include_once(get_stylesheet_directory() . '/inc/customer-sections/customer-guia-ingreso-familiar.php');



?>











</div>
<style>
.archive.author .ast-container {
    display: block;
    max-width: 100%;
}


.fman-single-item {
    margin-top: 20px;
}

.fman-single-item h3 {
    margin-bottom: 20px;
    border: 1px solid #f1f1f1;
    padding: 10px;
    padding-bottom: 15px;
    position: relative;
    cursor: pointer;
}

.fman-chevicon-header {
    width: 30px;
    position: absolute;
    right: 10px;
    top: 13px;
    transition: .3s;
}

.fman-chevicon-header.active {
   transform: rotate(180deg);
    top: 8px;
}

.fman-has-two-table {
    display: flex;
   flex-wrap: wrap;
    gap: 15px;
}
.fman-has-two-table table {
   flex: 0 0 calc(50% - 10px)
}

.fman-table {
    text-align: left;
    display: none;
}

.fman-table.selected {
      display: block;
}
.fman-table.fman-has-two-table.selected {
      display: flex;
}

.has-gray-bg {
   background: #f1f1f1;
}

.has-text-center {
   text-align: center;
}

.fisher-chart-header {
    text-align: center;
    border-bottom: 1px solid #f1f1f1;
    padding: 10px;
}
</style>

<script type="text/javascript">
jQuery(document).ready(function($){
   $('.fman-single-item h3').on('click', function(e){
      $(this).closest(".fman-single-item").find(".fman-table").toggleClass("selected");
      $(this).closest(".fman-single-item").find(".fman-chevicon-header").toggleClass("active");
   })
})
</script>
<?php 
} else {
   echo "Only Owner can see info";
}
} else {
   echo "You should login first";
}
get_footer(); ?>













