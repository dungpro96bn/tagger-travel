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

<script>
    var checkSubmit = localStorage.getItem('sendmail');
    if(!checkSubmit){
        $(".contact-block").remove();
    } else {
        setTimeout((function() {
                localStorage.removeItem('sendmail');
            }
        ), 2000);
    }
</script>

<?php get_footer(); ?>