<?php
get_header();

global $sitepress;
$var = languageString();
$current_language = $sitepress->get_current_language();
?>

<?php
if (have_posts()) : while (have_posts()) : the_post();
    remove_filter('the_content', 'wpautop');
    the_content();
endwhile;
endif;
?>

<?php get_footer(); ?>