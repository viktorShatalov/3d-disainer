<!-- footer -->
<footer id="footer">
    <div class="container">
        <div class="footer__signature">
            <p>
                © Copyright by Anna 3D <?= date('Y') ?> г.<br>
                Все права защищены
            </p>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="#adout" class="active">обо мне</a></li>
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
</footer>

<?php wp_footer(); ?>

</body>
</html>