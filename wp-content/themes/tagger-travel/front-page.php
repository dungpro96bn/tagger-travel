<?php
get_header();

global $sitepress;
$var = languageString();
$current_language = $sitepress->get_current_language();
?>


<div id="homepage" class="">

    <div class="bannerHomepage">
        <h1 class="banner-heading">
            <div class="c-charsTitle c-kvTitle index_p-kvTitle js-charsTitle en" data-is-chars-title-playing="false">
                <div class="c-charsTitle__texts c-kvTitle__texts index_p-kvTitle__texts" aria-hidden="false">
                    <div class="c-charsTitle__line c-kvTitle__line index_p-kvTitle__line t1">
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">M</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">A</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">K</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">E</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">&nbsp;</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">H</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">A</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">P</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">P</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">I</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">N</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">E</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">S</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">S</span>
                    </div>
                    <div class="c-charsTitle__line c-kvTitle__line index_p-kvTitle__line t2">
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">T</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">O</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">G</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">E</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">T</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">H</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">E</span>
                        <span class="c-charsTitle__char c-kvTitle__char index_p-kvTitle__char">R</span>
                    </div>
                </div>
            </div>
        </h1>
<!--        <h1 class="banner-heading --><?php //if ($current_language != "vi") { echo "en";}?><!--">-->
<!--            <span class="t1">--><?php //echo get_field('make_happiness_title'); ?><!--</span>-->
<!--            <span class="t2">--><?php //echo get_field('make_happiness_subtitle'); ?><!--</span>-->
<!--        </h1>-->
    </div>

    <div id="service" class="service-block">
        <div class="bg-white"></div>
        <div class="inner">
            <h2 class="heading-block" data-aos="fade-up">
                <span class="ttl-en">SERVICE</span>
                <span class="ttl-ja"><?php echo $var['service_sub_title']; ?></span>
            </h2>
            <div class="serviceTab-scroll">
                <ul class="serviceList-tabScroll">
                    <?php
                    if( have_rows('service_tabs') ):?>
                        <?php $number=1; ?>
                        <?php while( have_rows('service_tabs') ) : the_row(); ?>
                        <?php $num = $number++; ?>
                            <li class="serviceItem-tabScroll <?php if ($current_language == "vi" || $current_language == "en") { echo "text-vi";} elseif ($current_language == "ja") {echo "text-ja";}?>" data-aos="fade-up">
                                <a class="scroll" href="#service<?php echo "0".$num; ?>">
                                    <div class="serviceItem-inner">
                                        <?php $service_image_tab = get_sub_field('image_iconTab'); ?>
                                        <picture class="icon">
                                            <source media="(max-width: 767px)" srcset="<?php echo esc_url($service_image_tab['url']); ?>">
                                            <source media="(min-width: 768px)" srcset="<?php echo esc_url($service_image_tab['url']); ?>">
                                            <img class="sizes" width="120" src="<?php echo esc_url($service_image_tab['url']); ?>" alt="">
                                        </picture>
                                        <p class="title"><?php echo get_sub_field('title_tab'); ?></p>
                                        <span class="icon-arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                                <g id="Group_54" data-name="Group 54" transform="translate(-637 -1439)">
                                                    <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(637 1439)" fill="none" stroke="#000" stroke-width="1">
                                                        <circle cx="16" cy="16" r="16" stroke="none"/>
                                                        <circle cx="16" cy="16" r="15.5" fill="none"/>
                                                    </g>
                                                    <path id="Path_18" data-name="Path 18" d="M651.956,1456.73l5.358,5.358,5.358-5.358" transform="translate(-4.456 -3.23)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="serviceContent-list">
                <?php
                if( have_rows('service_list_information') ):?>
                    <?php $numberItem=1; ?>
                    <?php while( have_rows('service_list_information') ) : the_row(); ?>
                    <?php $num = $numberItem++; ?>
                        <div id="service<?php echo "0".$num; ?>" class="serviceInfo-item item-<?php echo "0".$num; ?>" data-aos="fade-up">
                            <?php $service_image_item = get_sub_field('image_info'); ?>
                            <picture class="image">
                                <source media="(max-width: 767px)" srcset="<?php echo esc_url($service_image_item['url']); ?>">
                                <source media="(min-width: 768px)" srcset="<?php echo esc_url($service_image_item['url']); ?>">
                                <img class="sizes" src="<?php echo esc_url($service_image_item['url']); ?>" alt="">
                            </picture>
                            <div class="info">
                                <p class="info-title en">SERVICE <?php echo "0".$num; ?></p>
                                <dl>
                                    <dt class="ttl"><?php echo get_sub_field('title_info'); ?></dt>
                                    <dd class="text"><?php the_sub_field('description_info'); ?></dd>
                                </dl>
                                <?php if($num == 1): ?>
                                <div class="contact-link">
                                    <a target="_blank" href="https://tour-tagger-travel.vccdev.vn" class="btn-green btn-contact <?php if ($current_language != "vi") { echo "en";}?>"><?php echo $var['btn_contact']; ?></a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div id="company" class="company-block">
        <div class="inner">
            <h2 class="heading-block" data-aos="fade-up">
                <span class="ttl-en">COMPANY</span>
                <span class="ttl-ja"><?php echo $var['company_sub_title']; ?></span>
            </h2>
            <div class="companyInfo">
                <ul class="companyInfo-list">
                    <?php
                    if( have_rows('company_infomation') ):?>
                        <?php $numberItem=1; ?>
                        <?php while( have_rows('company_infomation') ) : the_row(); ?>
                            <li class="companyInfo-item" data-aos="fade-up">
                                <p class="ttl"><?php echo get_sub_field('title_company_info'); ?></p>
                                <p class="text"><?php echo get_sub_field('description_company_info'); ?></p>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="mapList">
                <?php
                if( have_rows('map') ):?>
                    <?php $numberItem=1; ?>
                    <?php while( have_rows('map') ) : the_row(); ?>
                        <div class="mapItem" data-aos="fade-up">
                            <p class="ttl"><i class="fa-regular fa-location-dot"></i><span><?php echo get_sub_field('title_address'); ?></span></p>
                            <p class="address"><?php echo get_sub_field('address_map'); ?></p>
                            <p class="tel"><?php echo get_sub_field('tel_map'); ?></p>
                            <div class="map">
                                <?php echo get_sub_field('iframe_map'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div id="contact" class="contact-block <?php if ($current_language == "vi" || $current_language == "en") { echo "vi_en";}?>">
        <div class="inner">
            <h2 class="heading-block" data-aos="fade-up">
                <span class="ttl-en">CONTACT</span>
                <span class="ttl-ja"><?php echo $var['contact_sub_title']; ?></span>
            </h2>
            <div class="contact-main">
                <div class="form-main">
                    <?php
                        $form_key = get_field('form_key');
                        echo do_shortcode($form_key);
                    ?>
                </div>
                <?php if( have_rows('contact_info') ): ?>
                    <?php while( have_rows('contact_info') ): the_row();?>
                        <div class="contactInfo" data-aos="fade-up">
                            <div class="leftContent">
                                <p class="icon-tel">
                                    <?php $contact_phone_icon = get_sub_field('phone_icon'); ?>
                                    <picture class="image">
                                        <source media="(max-width: 767px)" srcset="<?php echo esc_url($contact_phone_icon['url']); ?>">
                                        <source media="(min-width: 768px)" srcset="<?php echo esc_url($contact_phone_icon['url']); ?>">
                                        <img class="sizes" width="40" src="<?php echo esc_url($contact_phone_icon['url']); ?>" alt="">
                                    </picture>
                                </p>
                                <p class="title"><?php the_sub_field ('contact_info_title'); ?></p>
                            </div>
                            <div class="rightContent">
                                <p class="tel en"><a href="tel:02838481390"><?php the_sub_field('contact_phone'); ?></a></p>
                                <p class="note"><?php the_sub_field ('contact_business_day'); ?></p>
                                <p class="note-click"><img width="24" src="/wp-content/uploads/contact_icon_click.png" alt=""><span><?php echo $var['contact_note_click_tel']; ?></span></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>


</div>


<?php
get_footer();