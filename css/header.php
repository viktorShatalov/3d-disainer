<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php wp_head(); ?>
</head>

<body>
    <!-- modal -->
    <div class="modal " id="modal">
        <div class="modal-body">
            <div data-close-button class="close-button">
                <span></span>
            </div>
            <div class="content">
            <?= get_the_content( '', '', 3 ); ?>
            </div>
        </div>
    </div>
    <div id="overlay"></div>
<!-- header -->
<header id="header">
    <div class="container">
    <div class="burger"><span></span></div>
        <picture class="logo">
            <img src="<?= get_template_directory_uri() ?>/assets/img/logo.png" alt="логотип сайта">
        </picture>
        <nav class="menu">
            <ul>
                <li><a href="#about" class="">обо мне</a></li>
                <li><a href="#price">прайс</a></li>
                <li><a href="#portfolio">портфолио</a></li>
                <li><a href="#company">клиенты</a></li>
                <li><a href="#contacts__form">контакты</a></li>
            </ul>
        </nav>
        <address class="contacts">
	        <?php $contacts = get_field('kontakty', 2);
	        ?>
            <a href="tel:<?= $contacts['phone'] ?>" ><?= $contacts['phone'] ?></a><br>
            <a href="mailto:<?= $contacts['e-mail'] ?>" target="_blank">info @ anna - 3D.ru</a>
        </address>
    </div>
</header>
	
