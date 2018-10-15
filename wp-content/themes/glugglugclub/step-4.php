<?php 
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
/** Template Name: Step 4 */
// This template is for confirming their taste profile and registering
//@TODO ADD CHECK IF LOGGED IN/HAVENT ALREADY DONE THIS STEP? SO WE DON'T KEEP DOING IT.
// in functions file, we are executing ggc_step4InstantSave() to save the details to the user as backup for if they leave the page for whatever reason
echo ggc_step4InstantSave();
get_header(); ?>
<main class="main-page-content registering_steps" role="main">
<?php include('includes/registration/step4.php');?>
</main>

<?php get_footer(); ?>
