<?php
get_header();

global $sitepress;
$var = languageString();
$current_language = $sitepress->get_current_language();
?>


<div id="homepage" class="">

    <div class="bannerHomepage">
        <h1 class="banner-heading <?php if ($current_language != "vi") { echo "en";}?>">
            <span class="t1"><?php echo get_field('make_happiness_title'); ?></span>
            <span class="t2"><?php echo get_field('make_happiness_subtitle'); ?></span>
        </h1>
    </div>

    <div id="service" class="service-block">
        <div class="bg-white"></div>
        <div class="inner">
            <h2 class="heading-block">
                <span class="ttl-en">SERVICE</span>
                <span class="ttl-ja"><?php echo $var['service_subHeading']; ?></span>
            </h2>
            <div class="serviceTab-scroll">
                <ul class="serviceList-tabScroll">
                    <?php
                    if( have_rows('service_tabs') ):?>
                        <?php $number=1; ?>
                        <?php while( have_rows('service_tabs') ) : the_row(); ?>
                        <?php $num = $number++; ?>
                            <li class="serviceItem-tabScroll">
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
                        <div id="service<?php echo "0".$num; ?>" class="serviceInfo-item item-<?php echo "0".$num; ?>">
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
                                <div class="contact-link">
                                    <a href="#contact" class="scroll btn-green btn-contact <?php if ($current_language != "vi") { echo "en";}?>"><?php echo $var['btn_contact']; ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div id="company" class="company-block">
        <div class="inner">
            <h2 class="heading-block">
                <span class="ttl-en">COMPANY</span>
                <span class="ttl-ja">会社情報</span>
            </h2>
            <div class="companyInfo">
                <ul class="companyInfo-list">
                    <?php
                    if( have_rows('company_infomation') ):?>
                        <?php $numberItem=1; ?>
                        <?php while( have_rows('company_infomation') ) : the_row(); ?>
                            <li class="companyInfo-item">
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
                        <div class="mapItem">
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
            <h2 class="heading-block">
                <span class="ttl-en">CONTACT</span>
                <span class="ttl-ja">お問い合わせ</span>
            </h2>
            <div class="contact-main">
                <div class="contact-title">
                    <picture class="icon">
                        <source media="(max-width: 767px)" srcset="/wp-content/uploads/contact_icon.png 2x">
                        <source media="(min-width: 768px)" srcset="/wp-content/uploads/contact_icon.png 2x">
                        <img class="sizes" src="/wp-content/uploads/contact_icon.png" alt="">
                    </picture>
                    <h3 class="title"><?php echo $var['contact_heading']; ?></h3>
                </div>
                <div class="form-main">
                    <?php
                    if ($current_language == "vi") {
                        echo do_shortcode('[mwform_formkey key="99"]');
                    } elseif ($current_language == "en"){
                        echo do_shortcode('[mwform_formkey key="101"]');
                    } else{
                        echo do_shortcode('[mwform_formkey key="70"]');
                    }?>
                </div>
                <div class="contactInfo">
                    <div class="leftContent">
                        <p class="icon-tel">
                            <svg id="Group_98" data-name="Group 98" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="39.475" viewBox="0 0 40 39.475">
                                <defs>
                                    <clipPath id="clip-path">
                                        <rect id="Rectangle_126" data-name="Rectangle 126" width="40" height="39.475" fill="none"/>
                                    </clipPath>
                                </defs>
                                <g id="Group_97" data-name="Group 97" transform="translate(0 0)" clip-path="url(#clip-path)">
                                    <path id="Path_69" data-name="Path 69" d="M36.5,39.475a38.114,38.114,0,0,1-9.949-1.862c-.839-.257-1.7-.569-2.6-.942A38.816,38.816,0,0,1,2.837,15.829c-.374-.882-.691-1.731-.96-2.586A36.975,36.975,0,0,1,0,3.5,3.488,3.488,0,0,1,3.485,0H9.8a3.467,3.467,0,0,1,3.486,3.44V8.433A3.439,3.439,0,0,1,10.9,11.7l-2.343.767a1.2,1.2,0,0,0-.712.627,1.089,1.089,0,0,0-.023.883,33.536,33.536,0,0,0,18,17.772,1.129,1.129,0,0,0,.433.088,1.194,1.194,0,0,0,1.114-.807l.777-2.312a3.477,3.477,0,0,1,3.308-2.357h5.059A3.467,3.467,0,0,1,40,29.8v6.234a3.472,3.472,0,0,1-3.463,3.44H36.5Z" transform="translate(0 0)"/>
                                </g>
                            </svg>
                        </p>
                        <p class="title"><?php echo $var['contactInfo_title']; ?></p>
                    </div>
                    <div class="rightContent">
                        <p class="tel en"><a href="tel:02838481390">(+84) 28-3848-1390</a></p>
                        <p class="note"><?php echo $var['contactInfo_note']; ?></p>
                        <p class="note-click"><img width="24" src="/wp-content/uploads/contact_icon_click.png" alt=""><span><?php echo $var['contact_note_click_tel']; ?></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


<?php
get_footer();