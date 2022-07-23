<?php 
/**
 * Plugin Name:       CV Portal
 * Plugin URI:        https://github.com/Mohib04/CV-Portal
 * Description:       The best WordPress Plugin for manage CV list.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Mohibbulla Munshi
 * Author URI:        https://in.linkedin.com/in/mohib5g
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       cv
 * Domain Path:       /languages
 */
?>
<?php

defined('ABSPATH') or die('No Script Available');
/* 
    Enqueue Style and Scripts into backend
*/
function sel_admin_style(){
    wp_enqueue_style( 'bootstrap', plugin_dir_url( __FILE__ ).'assets/css/bootstrap.min.css' );
    wp_enqueue_script( 'bootstrap',  plugin_dir_url( __FILE__ ).'assets/js/bootstrap.min.js', array('jquery') );
}
add_action('admin_enqueue_scripts', 'sel_admin_style' );

/* 
    Enqueue Style and Scripts into frontend
*/
function sel_frontend_style(){
    wp_enqueue_style( 'bootstrap', plugin_dir_url( __FILE__ ).'assets/css/bootstrap.min.css' );
    wp_enqueue_script( 'bootstrap',  plugin_dir_url( __FILE__ ).'assets/js/bootstrap.min.js', array('jquery') );
}
add_action('wp_enqueue_scripts', 'sel_frontend_style' );


/* 
    activation hook
*/
function sel_activated(){
       
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'sel_activated');

/* 
    deactivate hook
*/
function sel_deactivated(){
    
}
register_deactivation_hook(__FILE__, 'sel_deactivated');

// Short Code Registration
function cv_shortcode(){
    ob_start();
    $name = "";
?>
<!-- Short Code Output goes here -->

<div class="">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Full Name</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="name"
                placeholder="Enter Full Name" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="file">Attached CV (PDF)</label>
            <input name="file" type="file" class="form-control" id="file" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php
        echo $_POST['name'];
    
    ?>
</div>

</div>
<?php return ob_get_clean();

}

add_shortcode('cv', 'cv_shortcode') ?>