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
    localStorage.removeItem('backForm');
    var checkSubmit = localStorage.getItem('sendmail');
    if(!checkSubmit){
        $(".contact-block").remove();
        setTimeout((function() {
                var strHref = window.location.href,
                    href = strHref.replace('complete/', '');
                window.location.replace(href);
            }
        ), 1000);
    } else {
        setTimeout((function() {
                localStorage.removeItem('sendmail');
            }
        ), 2000);
    }
</script>

<?php get_footer(); ?>