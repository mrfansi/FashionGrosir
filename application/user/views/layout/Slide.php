<!-- Slide Show -->
<?php if ($img_promos != NULL): ?>
    <div class="fotorama" data-fit="cover" data-autoplay="true">
        <?php foreach ($img_promos as $promo): ?>
            <img src="<?= base_url('upload/' . $promo->slide_promo_img); ?>"
                 data-caption="<?= $promo->slide_promo_caption; ?>"
                 alt="<?= $promo->slide_promo_img; ?>">
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<!-- End Slide Show -->