<?php 

function enqueue_jquery() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('chartjs', get_stylesheet_directory_uri() . '/assets/js/chart-js.js', array(), '2.9.3', true);
}
add_action('wp_enqueue_scripts', 'enqueue_jquery');


// get age from a date
function fman_get_age_from_adate($a_date){
	$dateStr = $a_date;
	$date = DateTime::createFromFormat('F d, Y', $dateStr);

	if ($date !== false) {
	    $currentDate = new DateTime();
	    $interval = $currentDate->diff($date);
	    $years = $interval->y + $interval->m / 12 + $interval->d / 365;
	    $years = number_format($years, 2, '.', '');
	    return $years;
	} else {
		return;
	}
}

// get graduation status from from age
function fman_graduation_status_from_age($age){
	$c39 = $age; // Replace this with your actual value

	if ($c39 >= 18.5) {
	    $result = "Colegio finalizado";
	} else {
	    $years_remaining = (6.5 - $c39) + 12;
	    $days_remaining = $years_remaining * 365;
	    $current_date = new DateTime();
	    $current_date_str = $current_date->format('Y-m-d');
	    $result = date('Y', strtotime("+$days_remaining days", strtotime($current_date_str)));
	}

	return $result;
}


// Load admin style and script
function custom_admin_styles() {
    wp_enqueue_style('custom-admin-css', get_stylesheet_directory_uri() . '/admin-assets/custom-admin.css');
    wp_enqueue_script('custom-admin-js', get_stylesheet_directory_uri() . '/admin-assets/custom-admin.js', array('jquery'), null, true);



	if(isset($_GET['user_id'])){
		$fish_cust_id = $_GET['user_id'];
	} else {
		$fish_cust_id = get_current_user_id();
	}
	$car_model_val = get_field('child_select', 'user_'.$fish_cust_id);
    wp_localize_script('custom-admin-js', 'php_vars', array(
        'car_model_val' => $car_model_val
    ));
}
add_action('admin_enqueue_scripts', 'custom_admin_styles');









// add custom role to admin
function add_custom_role() {
    add_role('customer', 'Customer', array(
        'read' => true,
        'level_0' => true,
        'level_1' => true, 
        'level_2' => true, 
        'level_3' => true, 
        'level_4' => true,  
        'level_5' => true, 
        'level_6' => true, 
        'level_7' => true,  
        'level_8' => true, 
        'level_9' => true,  
        'level_10' => true, 
    ));
}

add_action('init', 'add_custom_role');

















