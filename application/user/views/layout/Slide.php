<!-- Slide Show -->
<div class="container">
    <?php if ($img_promos != NULL): ?>
        <div class="fotorama" data-fit="cover" data-width="100%" data-autoplay="true">
            <?php foreach ($img_promos as $promo): ?>
                <img src="<?= base_url('upload/' . $promo->slide_promo_img); ?>"
                     data-caption="<?= $promo->slide_promo_caption; ?>"
                     alt="<?= $promo->slide_promo_img; ?>">
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<!-- End Slide Show -->