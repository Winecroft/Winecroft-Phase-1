<?php 
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
/** Template Name: Step 3 */
// This template is for questions of step 3 of registering.

// If they are already signed in then we skip this step and go straight to step 4.
if(is_user_logged_in()):
wp_redirect(site_url().'/getting-started/step-4' );
else:
get_header(); ?>
<main class="main-page-content registering_steps" role="main">
<?php include('includes/registration/step3.php');?>
</main>
<?php get_footer(); ?>
<?php endif;?>
