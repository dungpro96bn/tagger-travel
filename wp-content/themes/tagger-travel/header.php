<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <!--[if lt IE 10]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <![endif]-->
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1">
    <title><?php
        global $page, $paged;
        wp_title('|', true, 'right');
        bloginfo('name');
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page())) {
            echo " | $site_description";
        }
        if ($paged >= 2 || $page >= 2) {
            echo ' | ' . sprintf(__('Page %s', 'cTpl'), max($paged, $page));
        }
        ?></title>

    <script>
        (function(d) {
            var config = {
                    kitId: 'awg6uyv',
                    scriptTimeout: 3000,
                    async: true
                },
                h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
        })(document);
    </script>

    <!-- css file-->
    <link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/assets/css/all.min.css">
    <link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/assets/css/aos.css" rel="stylesheet">
    <link rel="stylesheet" media="all" href="<?php bloginfo('stylesheet_url'); ?>?ver=<?php echo rand(); ?>">
    <link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/assets/css/custom.css">
    <link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/assets/css/homepage-kv.css">
    <link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/assets/css/homepage.css">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <script src="<?php bloginfo('template_directory'); ?>/assets/js/pro.js" crossorigin="anonymous"></script>
    <?php
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), '2.2.4');
    wp_head();
    ?>

    <!--file js-->
    <script src="<?php bloginfo('template_directory'); ?>/assets/js/aos.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/js/main.js"></script>

    <?php if (is_admin_bar_showing()): ?>
        <style type="text/css" media="screen">
            #header-menu .header-nav.scroll-header{
                top: 32px !important;
            }
            @media screen and (max-width: 782px) {
                #header-menu .header-nav.scroll-header{
                    top: 46px !important;
                }
            }
        </style>
    <?php endif; ?>

</head>

<?php
global $sitepress;
$var = languageString();
$current_language = $sitepress->get_current_language();
?>

<body <?php body_class(); ?>>
<div class="outer">
    <div class="bg-headerOpen"></div>
    <header id="header-menu" class="header-menu">
        <div class="header-nav">
            <div class="header-logo">
                <a class="link-logo" href="<?php echo home_url(); ?>">
                    <picture class="">
                        <source srcset="<?php bloginfo('template_directory'); ?>/assets/images/logo_header.svg">
                        <img class="sizes" src="<?php bloginfo('template_directory'); ?>/assets/images/logo_header.svg" alt="<?php bloginfo('name'); ?>">
                    </picture>
                </a>
            </div><!-- .header-logo -->
            <div class="right-header header-megamenu">
                <?php wp_nav_menu(
                    array(
                        'menu_class'      => 'navMenu',
                        'menu_id'         => 'navList-menu',
                        'container'       => 'div',
                        'container_id'    => 'nav-container'
                    )
                ); ?>
                <p class="language-title <?php if ($current_language != "vi") { echo "en";}?>"><?php echo $var['language_option_title']; ?></p>
                <div class="language-site">
                    <div class="list-language">
                        <label class="item-language <?php if($current_language == "ja"){echo "item-checked";} ?>">
                            <input type="radio" name="language" <?php if($current_language == "ja"){echo "checked";} ?> onchange="doGTranslate(this);" value="ja|ja" placeholder="JA">
                            <span class="name-language en">JP</span>
                        </label>
                        <label class="item-language <?php if($current_language == "vi"){echo "item-checked";} ?>">
                            <input type="radio" name="language" <?php if($current_language == "vi"){echo "checked";} ?> onchange="doGTranslate(this);" value="ja|vi" placeholder="VI">
                            <span class="name-language en">VI</span>
                        </label>
                        <label class="item-language <?php if($current_language == "en"){echo "item-checked";} ?>">
                            <input type="radio" name="language" <?php if($current_language == "en"){echo "checked";} ?> onchange="doGTranslate(this);" value="ja|en" placeholder="EN">
                            <span class="name-language en">EN</span>
                        </label>
                    </div>
                </div>
                <script type="text/javascript">
                    function doGTranslate(lang_pair) {
                        if(lang_pair.value)lang_pair=lang_pair.value;
                        if(lang_pair=='')
                            return;
                        var lang=lang_pair.split('|')[1];
                        var plang=location.pathname.split('/')[1];
                        if(plang != "" && plang != "en" && plang != "vi"){
                            location.href = location.protocol + '//' + location.host + '/' + lang + location.pathname;
                        } else if(lang == "ja" && (plang == "en" || plang == "vi")){
                            location.href = location.protocol + '//' + location.host + '/' + location.pathname.replace('/' + plang + '/', '/') + location.search;
                        } else{
                            location.href = location.protocol + '//' + location.host + '/' + lang + location.pathname.replace('/' + plang + '/', '/') + location.search;
                        }
                    }
                </script>
                <div class="contact-action">
                    <a class="scroll contact-btn btn-green <?php if ($current_language == "en") { echo "en";}?>" href="#contact"><?php echo $var['btn_contact_header']; ?></a>
                </div>
            </div>
            <div class="btn-openMenu">
                <div class="toggle-btn">
                    <span></span>
                </div>
            </div>

        </div><!-- .header-nav -->
    </header><!-- #header-menu -->

    <main role="main">