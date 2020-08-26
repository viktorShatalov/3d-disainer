<?php
/*
Template Name: Главная страница
*/
?>
<?php get_header() ?>
    <!-- main -->
    <main>
        <!-- first__screen -->
        <article id="first__screen">
            <div class="container">
                <div class="heading">
                    <h1><?php $first_screen = get_field('pervyj_blok', 2); echo $first_screen['zagolovok'] ?></h1>
                </div>
                <div class="first__screen-slider" style="background-image: url('<?= $first_screen['zadnij_fon'] ?>')">
                    <div class="slider__item left">
                        <picture class="slider__img">
                            <img src="<?= $first_screen['ikonki']['ikonka_1'] ?>"
                                 alt="Высокое качество">
                        </picture>
                        <div class="slider__description">
                            <span><?= $first_screen['ikonki']['tekst_1'] ?></span>
                        </div>
                    </div>
                    <div class="slider__item center">
                        <picture class="slider__img">
                            <img src="<?= $first_screen['ikonki']['ikonka_2'] ?>"
                                 alt="Низкие цены">
                        </picture>
                        <div class="slider__description">
                            <span><?= $first_screen['ikonki']['tekst_2'] ?></span>
                        </div>
                    </div>
                    <div class="slider__item right">
                        <picture class="slider__img">
                            <img src="<?= wp_get_attachment_url($first_screen['ikonki']['ikonka_3']) ?>"
                                 alt="Быстрый результат">
                        </picture>
                        <div class="slider__description">
                            <span><?= $first_screen['ikonki']['tekst_3'] ?></span>
                        </div>
                    </div>
                </div>
                <div class="btn">
                    <a class="pink__btn" href="#contacts__form">оценить проект</a>
                </div>
            </div>
        </article>
        <!-- about -->
        <article id="about">
            <div class="container">
                <div class="heading">
                    <h2><?php $about = get_field( 'obo_mne', 2 );
                    echo $about['zagolovok']
                    ?></h2>
                    <span class="heading__description"><?= $about['podzagolovok'] ?></span>
                </div>
                <div class="about__content">
                    <picture class="about__content-img">
                        <img src="<?php
						echo $about['foto_about'];
						?>" alt="фото">
                    </picture>
                    <div class="about__content-description">
						<?= $about['obo_mne_content'] ?>
                    </div>
                </div>
            </div>
        </article>
        <!-- price -->
        <article id="price">
            <div class="container">
                <div class="heading">
                    <h2><?php $price = get_field('prajs', 2); echo $price['zagolovok'] ?></h2>
                    <span class="heading__description"><?= $price['podzagolovok'] ?></span>
                </div>
                <div class="price__content-items">
                    <div class="item left">
                        <picture class="item__img">
                            <img src="<?php the_field('kartinka_1') ?>" alt="картинка коровы 1">
                        </picture>
                        <div class="item__description">
                            <h3 class="head"><?php the_field( 'zagolovok_price_1' ) ?></h3>
                            <p class="text">
								<?php the_field( 'tekst_price_1' ) ?>
                            </p>
                            <div class="btn">
                                <a class="pink__btn" href="#contacts__form">оценить проект</a>
                            </div>
                            <p class="item__price">
                                <span><?php the_field( 'czena_price_1' ) ?></span>
                                <span><?php the_field( 'day_price_1' ) ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="item center">
                        <picture class="item__img">
                            <img src="<?php the_field('kartinka_2') ?>" alt="картинка коровы 2">
                        </picture>
                        <div class="item__description">
                            <h3 class="head"><?php the_field( 'zagolovok_price_2' ) ?></h3>
                            <p class="text">
								<?php the_field( 'tekst_price_2' ) ?>
                            </p>
                            <div class="btn">
                                <a class="pink__btn" href="#contacts__form">оценить проект</a>
                            </div>
                            <p class="item__price">
                                <span><?php the_field( 'czena_price_2' ) ?></span>
                                <span><?php the_field( 'day_price_2' ) ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="item right">
                        <picture class="item__img">
                            <img src="<?= get_template_directory_uri() ?>/assets/img/cow3.png" alt="картинка коровы 3">
                        </picture>
                        <div class="item__description">
                            <h3 class="head"><?php the_field( 'zagolovok_price_3' ) ?></h3>
                            <p class="text">
								<?php the_field( 'tekst_price_3' ) ?>
                            </p>
                            <div class="btn">
                                <a class="pink__btn" href="#contacts__form">оценить проект</a>
                            </div>
                            <p class="item__price">
                                <span><?php the_field( 'czena_price_3' ) ?></span>
                                <span><?php the_field( 'day_price_3' ) ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <!-- portfolio -->
        <article id="portfolio">
            <div class="container">
                <div class="heading">
                    <h2><?= get_cat_name(2) ?></h2>
                    <span class="heading__description"><?= category_description(2) ?></span>
                </div>
                <div class="portfolio__content-items">
					<?php $posts = get_posts( [
						'category'    => 2,
						'orderby'     => 'date',
						'order'       => 'ASC',
						'numberposts' => 3
					] );
					foreach ($posts as $post):
					?>
                    <div class="item big">
                        <?php $photos = carbon_get_post_meta($post->ID, 'crb_slider');
                        foreach ($photos as $photo):
                            if (!next($photos)): ?>
                                <a data-fancybox="gallery<?= $post->ID ?>" href="<?= wp_get_attachment_url($photo['photo']) ?>"></a>
                            <?php else: ?>
                                <a data-fancybox="gallery<?= $post->ID ?>" href="<?= wp_get_attachment_url($photo['photo']) ?>">
                                    <picture class="item__img">
                                        <img src="<?= wp_get_attachment_url($photo['photo']) ?>"
                                             alt="<?= $post->post_title ?>">
                                    </picture>
                                </a>
                            <?php endif;
                        endforeach;
                        ?>
                        <div class="item__descripton">
                            <span><?= $post->post_title ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>

	                <?php $posts = get_posts( [
		                'category'    => 2,
		                'orderby'     => 'date',
		                'order'       => 'ASC',
		                'numberposts' => 4,
                        'offset'      => 3,
	                ] );
	                foreach ($posts as $post):
		                ?>
                        <div class="item small">
			                <?php $photos = carbon_get_post_meta($post->ID, 'crb_slider');
			                foreach ($photos as $photo):
				                if (!next($photos)): ?>
                                    <a data-fancybox="gallery<?= $post->ID ?>" href="<?= wp_get_attachment_url($photo['photo']) ?>"></a>
				                <?php else: ?>
                                    <a data-fancybox="gallery<?= $post->ID ?>" href="<?= wp_get_attachment_url($photo['photo']) ?>">
                                        <picture class="item__img">
                                            <img src="<?= wp_get_attachment_url($photo['photo']) ?>"
                                                 alt="<?= $post->post_title ?>">
                                        </picture>
                                    </a>
				                <?php endif;
			                endforeach;
			                ?>
                            <div class="item__descripton">
                                <span><?= $post->post_title ?></span>
                            </div>
                        </div>
	                <?php endforeach; ?>

	                <?php $posts = get_posts( [
		                'category'    => 2,
		                'orderby'     => 'date',
		                'order'       => 'ASC',
		                'numberposts' => 4,
		                'offset'      => 7,
	                ] );
	                foreach ($posts as $post):
		                ?>
                        <div class="item small last">
			                <?php $photos = carbon_get_post_meta($post->ID, 'crb_slider');
			                foreach ($photos as $photo):
				                if (!next($photos)): ?>
                                    <a data-fancybox="gallery<?= $post->ID ?>" href="<?= wp_get_attachment_url($photo['photo']) ?>"></a>
				                <?php else: ?>
                                    <a data-fancybox="gallery<?= $post->ID ?>" href="<?= wp_get_attachment_url($photo['photo']) ?>">
                                        <picture class="item__img">
                                            <img src="<?= wp_get_attachment_url($photo['photo']) ?>"
                                                 alt="<?= $post->post_title ?>">
                                        </picture>
                                    </a>
				                <?php endif;
			                endforeach;
			                ?>
                            <div class="item__descripton">
                                <span><?= $post->post_title ?></span>
                            </div>
                        </div>
	                <?php endforeach; ?>

                </div>
                <div class="portfolio__btn">
                    <div class="btn">
                        <a class="pink__btn" href="">смотреть больше работ</a>
                    </div>
                    <div class="btn">
                        <a class="blue__btn" href="#contacts__form">хочу заказать услугу</a>
                    </div>
                </div>
            </div>
        </article>
        <!-- company -->
        <article id="company">
            <div class="container">
                <div class="heading">
                    <h2><?= get_cat_name(3) ?></h2>
                    <span class="heading__description"><?= category_description(3) ?></span>
                </div>
                <div class="company__content">
                    <ul class="tab">
                        <li class="tablinks" datat-tab-name="tab-1"><span>Онлайн игры</span>
                            <ul class="tabs__content tab-1">
                                <?php $online = carbon_get_post_meta(145, 'company_photos');
                                foreach ($online as $item):
                                ?>
                                <li>
                                    <picture><img src="<?= $item['photo'] ?>" alt="<?= $item['name'] ?>"></picture>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="tablinks" datat-tab-name="tab-2"><span>3D - проекты</span>
                            <ul class="tabs__content tab-2">
	                            <?php $three_dproject = carbon_get_post_meta(148, 'company_photos');
	                            foreach ($three_dproject as $item):
		                            ?>
                                    <li>
                                        <picture><img src="<?= $item['photo'] ?>" alt="<?= $item['name'] ?>"></picture>
                                    </li>
	                            <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="tablinks active" datat-tab-name="tab-3"><span>Букмекерские конторы</span>
                            <ul class="tabs__content tab-3 active">
	                            <?php $bookmek = carbon_get_post_meta(150, 'company_photos');
	                            foreach ($bookmek as $item):
		                            ?>
                                    <li>
                                        <picture><img src="<?= $item['photo'] ?>" alt="<?= $item['name'] ?>"></picture>
                                    </li>
	                            <?php endforeach; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </article>
        <!-- contacts__form -->
        <article id="contacts__form">
            <div class="container">
                <div class="heading">
                    <h2><?php $form_head = get_field('obratnaya_svyaz_forma', 2); echo $form_head['zagolovok'] ?></h2>
                    <span class="heading__description"><?= $form_head['podzagolovok'] ?></span>
                </div>
                <div class="contacts__form-content">
                    <section class="content__form">
                        <?= do_shortcode('[contact-form-7 id="161" title="Заявка"]') ?>
                    </section>
                </div>
            </div>
        </article>
        <!-- contants -->
        <article id="contacts">
            <div class="container">
                <div class="contacts__content-items">
                    <div class="item">
                        <?php $contacts = get_field('kontakty', 2);
                        ?>
                        <span>контакты:</span>
                    </div>
                    <address class="item social">
                        <p>
                            <span>Телефон / Telegram / WhatsApp:</span><br>
                            <a href="tel:<?= $contacts['phone'] ?>" ><?= $contacts['phone'] ?></a>
                        </p>
                        <p>
                            <span>E-mail:</span><br>
                            <a href="mailto:<?= $contacts['e-mail'] ?>" target="_blank"><?= $contacts['e-mail'] ?></a>
                        </p>
                    </address>
                    <adress class="item address">
                        <p>
                            <span>Мы работаем:<br>
                                <?= $contacts['my_rabotaem'] ?></span>
                        </p>
                        <p>
                            <span><?= $contacts['adres'] ?></span>
                        </p>
                    </adress>
                </div>
            </div>
        </article>
    </main>
<?php get_footer() ?>