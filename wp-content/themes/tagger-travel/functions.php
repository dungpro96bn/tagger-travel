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
        $var['btn_contact'] = "Liên hệ";
        $var['text_privacy'] = "Chính sách bảo mật";
        $var['service_subHeading'] = "Về dịch vụ của chúng tôi";
        $var['contact_heading'] = "Yêu cầu qua email";
        $var['contactInfo_title'] = "Truy vấn qua".$br."điện thoại";
        $var['contactInfo_note'] = "Thứ Hai đến Thứ Sáu 09:30 đến 12:30 / 13:30 đến 17:30 Thứ Bảy, Chủ Nhật và ngày lễ: Nghỉ";
        $var['language_option_title'] = "Ngôn ngữ";
        $var['contact_note_click_tel'] = "Bạn có thể thực hiện cuộc gọi bằng cách nhấn vào số";

    } elseif ($current_language == 'en'){
        $var['btn_contact'] = "CONTACT";
        $var['text_privacy'] = "Privacy policy";
        $var['service_subHeading'] = "About our services";
        $var['contact_heading'] = "Email inquiries";
        $var['contactInfo_title'] = "Inquiry by phone";
        $var['contactInfo_note'] = "Monday to Friday 09:30 to 12:30 / 13:30 to 17:30 Saturdays, Sundays, and holidays: Closed";
        $var['language_option_title'] = "LANGUAGE";
        $var['contact_note_click_tel'] = "You can make a call by tapping the number";

    } else{
        $var['btn_contact'] = "CONTACT";
        $var['text_privacy'] = "プライバシーポリシー";
        $var['service_subHeading'] = "私たちのサービスについて";
        $var['contact_heading'] = "メールでの問い合わせ";
        $var['contactInfo_title'] = "お電話での".$br."問い合わせ";
        $var['contactInfo_note'] = "月～金　09:30～12:30 / 13:30～17:30 　土・日・祝日：定休";
        $var['language_option_title'] = "LANGUAGE";
        $var['contact_note_click_tel'] = "番号タップでお電話かけられます";

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