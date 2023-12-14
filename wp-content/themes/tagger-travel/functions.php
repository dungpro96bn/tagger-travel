<?php
remove_action('wp_head', 'wp_generator');

//サイトナビゲーション用
register_nav_menus(array('gnav' => 'ナビゲーション'));

//アイキャッチ有効
add_theme_support('post-thumbnails');

//ショートコード
function uploadPath() { return content_url() . '/uploads/'; }
add_shortcode('uploadPath', 'uploadPath');

function homePath() { return home_url() . '/'; }
add_shortcode('homePath', 'homePath');

//ウィジェット
function my_theme_widgets_init() {
  register_sidebar( array(
    'name' => 'ウィジェットエリア',
    'id' => 'widgets',
    'before_widget' => '<div class="widget-item">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'
  ));
}
add_action('widgets_init', 'my_theme_widgets_init');

function pine_add_page_slug_body_class( $classes ) {
    global $post;

    if ( isset( $post ) ) {
        $classes[] = 'page-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'pine_add_page_slug_body_class' );

//パンくずリスト
function breadcrumb($divOption = array("id" => "breadcrumb", "class" => "breadcrumb")){
	global $post;
	global $homeName;
	if ($homeName == '') {
		$homeName = 'HOME';
	}
	$str ='';
	if(!is_home()&&!is_admin()){
		$tagAttribute = '';
		foreach($divOption as $attrName => $attrValue){
			$tagAttribute .= sprintf(' %s="%s"', $attrName, $attrValue);
		}
		$str.= '<div'. $tagAttribute .'>';
		$str.= '<ol>';
		$str.= '<li><a href="'. home_url() .'/">' . $homeName . '</a></li>';

		if(is_category()) {
			$cat = get_queried_object();
			if($cat -> parent != 0){
				$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
				foreach($ancestors as $ancestor){
					$str.='<li><a href="'. get_category_link($ancestor) .'">'. get_cat_name($ancestor) .'</a></li>';
				}
			}
			$str.='<li>'. $cat -> name . '</li>';
		} elseif(is_single()){
			$categories = get_the_category($post->ID);
			$cat = $categories[0];
			if($cat -> parent != 0){
				$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
				foreach($ancestors as $ancestor){
					$str.='<li><a href="'. get_category_link($ancestor).'">'. get_cat_name($ancestor). '</a></li>';
				}
			}
			$str.='<li><a href="'. get_category_link($cat -> term_id). '">'. $cat-> cat_name . '</a></li>';
			$str.= '<li>'. $post -> post_title .'</li>';
		} elseif(is_page()){
			if($post -> post_parent != 0 ){
				$ancestors = array_reverse(get_post_ancestors( $post->ID ));
				foreach($ancestors as $ancestor){
					$str.='<li><a href="'. get_permalink($ancestor).'">'. get_the_title($ancestor) .'</a></li>';
				}
			}
			$str.= '<li>'. $post -> post_title .'</li>';
		} elseif(is_date()){
			if(get_query_var('day') != 0){
				$str.='<li><a href="'. get_year_link(get_query_var('year')). '">' . get_query_var('year'). '年</a></li>';
				$str.='<li><a href="'. get_month_link(get_query_var('year'), get_query_var('monthnum')). '">'. get_query_var('monthnum') .'月</a></li>';
				$str.='<li>'. get_query_var('day'). '日</li>';
			} elseif(get_query_var('monthnum') != 0){
				$str.='<li><a href="'. get_year_link(get_query_var('year')) .'">'. get_query_var('year') .'年</a></li>';
				$str.='<li>'. get_query_var('monthnum'). '月</li>';
			} else {
				$str.='<li>'. get_query_var('year') .'年</li>';
			}
		} elseif(is_search()) {
			$str.='<li>「'. get_search_query() .'」で検索した結果</li>';
		} elseif(is_author()){
			$str .='<li>投稿者 : '. get_the_author_meta('display_name', get_query_var('author')).'</li>';
		} elseif(is_tag()){
			$str.='<li>タグ : '. single_tag_title( '' , false ). '</li>';
		} elseif(is_attachment()){
			$str.= '<li>'. $post -> post_title .'</li>';
		} elseif(is_404()){
			$str.='<li>ページがみつかりません。</li>';
		} else{
			$str.='<li>'. wp_title('', true) .'</li>';
		}
		$str.='</ol>';
		$str.='</div>';
	}
	echo $str;
}


register_sidebar(array(
    'name' => 'Footer menu bottom ja',
    'id' => 'footer-menu-bottom-ja',
    'class' => 'footer__navSub',
    'description' => 'Add widgets here to appear in your SideBar.',
    'before_widget' => '<nav class="footer__navList">',
    'after_widget' => '</nav>',
));

register_sidebar(array(
    'name' => 'Footer menu bottom vi',
    'id' => 'footer-menu-bottom-vi',
    'class' => 'footer__navSub',
    'description' => 'Add widgets here to appear in your SideBar.',
    'before_widget' => '<nav class="footer__navList">',
    'after_widget' => '</nav>',
));

register_sidebar(array(
    'name' => 'Footer menu bottom en',
    'id' => 'footer-menu-bottom-en',
    'class' => 'footer__navSub',
    'description' => 'Add widgets here to appear in your SideBar.',
    'before_widget' => '<nav class="footer__navList">',
    'after_widget' => '</nav>',
));


function languageString ()
{
    global $sitepress;
    $current_language = $sitepress->get_current_language();

    $br = "<br/>";
    $brSp = "<br class='sp-br'/>";
    $brPc = "<br class='pc-br'/>";

    if ($current_language == 'vi') {
        $var['btn_contact_header'] = "Liên hệ";
        $var['btn_contact'] = "Xem thêm";
        $var['text_privacy'] = "Chính sách bảo mật";
        $var['language_option_title'] = "Ngôn ngữ";
        $var['contact_note_click_tel'] = "Bạn có thể thực hiện cuộc gọi bằng cách nhấn vào số";
        $var['service_sub_title'] = "Dịch vụ";
        $var['company_sub_title'] = "Tổng quan công ty";
        $var['contact_sub_title'] = "Liên Hệ";

    } elseif ($current_language == 'en'){
        $var['btn_contact_header'] = "CONTACT";
        $var['btn_contact'] = "VIEW MORE";
        $var['text_privacy'] = "Privacy policy";
        $var['language_option_title'] = "LANGUAGE";
        $var['contact_note_click_tel'] = "You can make a call by tapping the number";
        $var['service_sub_title'] = "Our Service";
        $var['company_sub_title'] = "Overview";
        $var['contact_sub_title'] = "Contact us";

    } else{
        $var['btn_contact_header'] = "お問い合わせ";
        $var['btn_contact'] = "VIEW MORE";
        $var['text_privacy'] = "プライバシーポリシー";
        $var['language_option_title'] = "LANGUAGE";
        $var['contact_note_click_tel'] = "番号タップでお電話かけられます";
        $var['service_sub_title'] = "私たちのサービスについて";
        $var['company_sub_title'] = "会社情報";
        $var['contact_sub_title'] = "お問い合わせ";

    }

    return $var;
}

add_shortcode("urlLanguage", "urlLanguage");
function urlLanguage (){
    global $sitepress;
    $current_language = $sitepress->get_current_language();
    if($current_language != 'ja'):
        echo $urlLanguage = home_url().$current_language;
    else:
        echo $urlLanguage = home_url();
    endif;
}


function my_error_message( $error, $key ) {
    if ( $key === 'full-name' || $key === 'email' || $key === 'tel' ) {
        return '必須項目に入力してください';
    }

    return $error;
}
add_filter( 'mwform_error_message_mw-wp-form-70', 'my_error_message', 10, 3 );