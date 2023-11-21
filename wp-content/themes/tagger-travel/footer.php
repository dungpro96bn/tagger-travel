    </main>

    <?php
    global $sitepress;
    $var = languageString();
    $current_language = $sitepress->get_current_language();
    ?>

    <div id="page-top" class="page-top">
        <a href="#" class="page-top-anchor en">
            <svg id="btn_pagetop" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64">
                <g id="Subtraction_28" data-name="Subtraction 28" transform="translate(3194 3)" fill="none">
                    <path d="M-3147,61h-47V-3h64V44l-17,17Z" stroke="none"/>
                    <path d="M -3147.413818359375 60.00020599365234 L -3131.000244140625 43.58678436279297 L -3131.000244140625 -1.999694466590881 L -3193.000244140625 -1.999694466590881 L -3193.000244140625 60.00020599365234 L -3147.413818359375 60.00020599365234 M -3146.99951171875 61.00020599365234 L -3194.000244140625 61.00020599365234 L -3194.000244140625 -2.999694347381592 L -3130.000244140625 -2.999694347381592 L -3130.000244140625 44.00100708007812 L -3146.99951171875 61.00020599365234 Z" stroke="none" fill="#000"/>
                </g>
                <text id="PAGE" transform="translate(32 33.25)" stroke="#000" stroke-width="1" font-size="16" font-family="CenturyGothicPro, Century Gothic Pro"><tspan x="-21.328" y="0">PAGE</tspan></text>
                <text id="TOP" transform="translate(32 51.25)" stroke="#000" stroke-width="1" font-size="16" font-family="CenturyGothicPro, Century Gothic Pro"><tspan x="-15.096" y="0">TOP</tspan></text>
                <path id="Path_118" data-name="Path 118" d="M651.956,1456.73l5.358,5.358,5.358-5.358" transform="translate(689.314 1470.838) rotate(180)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
            </svg>
        </a>
    </div>

    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="inner footer-inner-top">
                <div class="footer-logo">
                    <a href="<?php echo home_url(); ?>">
                        <picture>
                            <source srcset="<?php bloginfo('template_directory'); ?>/assets/images/logo_header.svg">
                            <img class="sizes" width="281" src="<?php bloginfo('template_directory'); ?>/assets/images/logo_header.svg" alt="<?php bloginfo('name'); ?>">
                        </picture>
                    </a>
                </div>
                <div class="footer-menu">
                    <?php
                    if ($current_language == "vi") {
                        dynamic_sidebar('footer-menu-bottom-vi');
                    } elseif ($current_language == "en") {
                        dynamic_sidebar('footer-menu-bottom-en');
                    } else {
                        dynamic_sidebar('footer-menu-bottom-ja');
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="inner footer-inner-bottom">
                <div class="privacy-link">
                    <a target="_blank" href="<?php if ($current_language == "vi") {
                        echo "/vi";
                    } elseif ($current_language == "en") {
                        echo "/en";
                    } ?>/privacy-policy/"><?php echo $var['text_privacy']; ?></a>
                </div>
                <div class="copyright">
                    <p>© TAGGER TRAVEL Co., Ltd.</p>
                </div>
            </div>
        </div>
    </footer><!-- #footer -->

  </div><!-- .outer -->

<?php wp_footer(); ?>

</body>
</html>