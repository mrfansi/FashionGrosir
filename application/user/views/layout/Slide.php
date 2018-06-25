<!-- Slide Show -->
<?php if ($img_promos != NULL): ?>
<div id="carouselExampleSlidesOnly" class="carousel slide f-z-slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner f-carousel">
        <?php foreach ($img_promos as $promo): ?>
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?= base_url('upload/' . $promo->slide_promo_img); ?>"
                     alt="<?= $promo->slide_promo_img; ?>">
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>
<!-- End Slide Show -->