<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Private_clinic
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width">
  <meta name="format-detection" content="telephone=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="header">
	<? if(is_home() || is_front_page()) : ?>
	  <div class="orbits">
		<div class="orbit"><div class="moon"></div></div>
		<div class="orbit"><div class="moon"></div></div>
		<div class="orbit"><div class="moon"></div></div>
		<div class="orbit"><div class="moon"></div></div>
		<div class="orbit"><div class="moon"></div></div>
		<div class="orbit"><div class="moon"></div></div>
		<div class="orbit"><div class="moon"></div></div>
		<div class="orbit"><div class="moon"></div></div>
		<div class="orbit"><div class="moon"></div></div>
		<div class="orbit"><div class="moon"></div></div>
		<div class="orbit"><div class="moon"></div></div>
	  </div>
	<? endif; ?>
  <div id="burger">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <div class="header_block">
    <div class="header_block_menu">
      <?
        wp_nav_menu( array(
            'items_wrap'     => '%3$s',
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
            'container'      => 'nav',
            'container_class' => '',
        ) );
      ?>
    </div>
    <div class="header_block_contacts">
      <p>номер телефона</p>
	  <p class="phone"><span>(347) 294-14-16</span></p>
      <p class="recall"><span class="link link_white" id="modal" data-modal-id="recall">Перезвоните мне</span></p>
      <div class="btn btn_light" id="modal" data-modal-id="rec" data-btn-text="запись на приём">запись на приём</div>
    </div>
  </div>
</header>
