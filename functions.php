<?php
//
// imposta la larghezza del contenuto per il tema
if (!isset ($content_width))
	$content_width = 500;

//imposta il tema
add_action ('after_setup_theme', 'simpleblog_themesetup');
function simpleblog_themesetup(){
	//link automatici dei feed


	add_theme_support('automatic-feed-links');

	//aggiunge la funzione di navigazione nei menu all'hook "init"
	add_action('init', 'simpleblog_register_menus');

	//aggiunge la funzione della sidebar all'hook "widgets_init"

	add_action('widgets_init', 'simpleblog_register_sidebars');
	//carica file javascript sull'hook "wp_enqueue_scripts"
	add_action('wp_enqueue_scripts','simpleblog_load_scripts');
}

//menu registrato

function simpleblog_register_menus(){
	register_nav_menus(
		array( 
				'top-navigator' =>'Top navigation',
				'bottom-navigation' => 'Bottom navigation',
				'test-menu'=>'Tessttt Mennnu'

			)
		);

}

//registra le aree dei widget

function simpleblog_register_sidebars(){
	//area dei widget nella colonna di destra

	register_sidebar(array(
			'name'=> 'Right column',
			'id' =>'right-column',
			'before_widget' =>'<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',


		));


}
//carica javascript
function simpleblog_load_scripts(){
//carica javascript per i thread dei commenti se ablitati

	if ( is_singular() &&get_option('thread_comments') && comments_open()) {
		wp_enqueue_script('comment-reply');
	}

}

function hellomate(){
	echo 'Ehi, come va?';
}

function Promotion ($content) { if (!is_feed()&& !is_home()) { $content.= '<div class="promotion">'; $content.= '<h4> Per non perdere un colpo! </h4>'; $content.= '<p> promozioni</p>'; $content.= '</div>'; } return $content;
}

//add_filter('the_content', 'Promotion');

add_action('widget_init','smashing_register_sidebars');
function smashing_register_sidebars(){
	register_sidebar();
}
//registrazione widget personalizzabile

add_action ('after_setup_theme', 'simpleblog_theme_setup');
	function simpleblog_theme_setup(){
	add_theme_support('post-thumbnails');
	 // add_theme_support ('custom-logo');
	add_image_size('top-feature', 500,255);
}
register_nav_menus (array('test-menu2' => 'test mMenu'));

//aggiungere il support per gli header personalizzati
$defaults= array(
	'default-image'=>'',
	'rendom-default'=>false,
	'width'=> 0,
	'height'=> 0,
	'flex-height'=>false,
	'flex-width'=>false,
	'default-text-color'=>'#000000',
	'header-test'=> true,
	'uploads'=>true,
	'wp-head-callback'=>'',
	'admin-head-callback'=>'',
	'admin-preview-callback'=>'',

	);
add_theme_support ('custom-header',$defaults);
add_theme_support ('custom-background');


// aggiunta della scelta della visualizazzione del footer
function simpleblog_theme_settings($wp_customize){
$wp_customize-> add_section(
	'simpleblog_footer', array(
		'title'=> 'Footer Details',
		'description'=>"Custmoize your site footer",

		)
	);
$wp_customize-> add_setting(
	'simpleblog_footer_copyright', array(
		'default'=>'&copy;',

		)

	);
$wp_customize->add_control('simpleblog_footer_copyright', array(
			'label'=>'Text in the footer',
			'type'=>'text',
			'section'=>'simpleblog_footer',

		)
	);

$wp_customize-> add_setting(
	'simpleblog_footer_enable',
		array(
		'default'=>0,
		)
	);
$wp_customize-> add_control('simpleblog_footer_enable', array(
			'label'=> 'Enable or disable copyright',
			'type'=>'checkbox',
			'section'=>'simpleblog_footer',



			)


	);

}

add_action('customize_register', 'simpleblog_theme_settings', 11);



// funzione che controlla la pagina caricata e se è nella lista del menu inserisce lo stile
function imelab_is_active_page($title){
$attiva =0;
switch ($title){
	case About:
		$attiva=1;
echo $title;
		return $attiva;
	break;
	
}
}

//filtro per le variabili passate tramite get su URL


function add_query_vars_filter($vars){

$vars[]="serial";
return $vars;

}
add_filter ('query_vars','add_query_vars_filter');

//funzione chiamata nel menu nav per aggiungere l'effetto nel menu corrispondente alla pagina in cui si è

function nav_pagina_attuale($label_menu){
	
	$pagina_attuale=get_the_title();
	if ($pagina_attuale == $label_menu){
		echo "menu_page_active";
	}

}
?>