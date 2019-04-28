<?php
/**
*@package shaju-newsletter-plugin
*/
/*
Plugin Name: Shaju's News letter Plugin
Description: Assignment Test.
Author: SHaju Kunhiveetil
*/
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi  This plugin will not do when called directly.';
	exit;
}

/*
  Create newsletter form and save submitted data to database  

*/

function loadNewsletterForm()
{
	$content='';
	$content .= '<div id="newsletterwidget" class=""><p>Subscribe for latest news. </p><div ><form method="post" action="">';
    $content .='<div ><label>Full Name * </label><input  type="text" name="full_name" required="" pattern="[a-zA-Z0-9 ]+" ></div>
                <div ><label>E-mail * </label><input  type="email" name="email_addr" required=""></div>
                <label> &nbsp;</label>
               <div ><input  type="submit" name="subscribe_submit_btn" value="Subscribe now!"></div>';
    $content .='</form></div></div>';
   return $content;

}


function  saveNewsletterForm()
{
	if(array_key_exists('subscribe_submit_btn', $_POST) && isset( $_POST['subscribe_submit_btn'] ))
	{
     $full_name = sanitize_text_field($_POST['full_name']);
     $email = sanitize_email($_POST['email_addr']);
     if(empty($full_name) || empty($email) )
     	return null;

     global $wpdb;
            $table = wp_newsletters;
            $data = array(
                'newsletter_subscriber_name' => $full_name ,
                'newsletter_subscriber_email'    => $email,               
                
            );
            $format = array(
                '%s',
                '%s'
            );

           $usercount = $wpdb->get_var("SELECT count(*) FROM $table WHERE newsletter_subscriber_email = '".$email."'");
                    
           if($usercount > 0)  {
           	echo '<div style="color: #D8000C; background-color: #FFD2D2;"> <span> Sorry ! This Email has used for subscription before ,Please try with another Email address.</span></div>' ; 
           	return false;
           }

            $success=$wpdb->insert( $table, $data, $format );
            if($success){
            echo '<div class="notice notice-success is-dismissible" style=" color: #4F8A10;background-color: #DFF2BF;"> <p><strong> Thank you ! You have been Successfully Subscribed.</strong></p></div>' ; 
            }
            else
            	echo '<div style="color: #D8000C; background-color: #FFD2D2;"> <span> Sorry !  Something went wrong ,Please try again .</span></div>' ; 

	}
}


function newsletterForm() {
	ob_start();	
	saveNewsletterForm();
	echo loadNewsletterForm();
	return ob_get_clean();
}

add_shortcode('newsletter_form','newsletterForm');


/*
  Here is the code for creating a menu 'Newsletter' in the admin panel and  has a page for listing all subscribed  users 

*/
function show_admin_menu_newsletter()
{
	add_menu_page('shajus Newsletter pluggin','Newsletter','manage_options','newsletter-admin-menu','newsletter_admin_page','dashicons-admin-customizer',200);
}

function newsletter_admin_page()
{
	 global $wpdb;
	 $table = wp_newsletters;
     $contents_parts = "";
    $results_from_db = $wpdb->get_results("SELECT * FROM $table ORDER BY  newsletter_subscribed_date DESC ");
    
    foreach ($results_from_db as $result) {
    	$contents_parts .= '<tr><td>'. $result->newsletter_subscriber_name.'</td><td> '.$result->newsletter_subscriber_email.' </td><td> '.$result->newsletter_subscribed_date.' </td></tr>';
    	
    }

	$contents= "";
	$contents .= '<div class="tablenav top"></div><h2 class="">Subscribers list</h2><table class="wp-list-table widefat fixed striped comments"> <thead>';
	$contents .= '<tr><td>Name </td><td>Email </td><td> Subscribed Date </td></tr></thead>';
	$contents .= '<tbody>' . $contents_parts.'</tbody>';
    $contents .= '</table> ';
    echo $contents;
}

add_action('admin_menu','show_admin_menu_newsletter');


function inline_css() {
  echo "<style>.site-header{display: none;}</style>";
}
add_action( 'wp_head', 'inline_css', 0 );