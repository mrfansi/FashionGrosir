<?php
include "../layout/Header.php";
?>
    <div class="container">
        <p>Hai, <?= $nama; ?></p>
        <p>Selamat datang di <?= $brandname; ?>, berikut dibawah ini tautan untuk mengaktifkan akun anda :</p>
        <p><a href="<?= site_url('akun_konfirmasi/' . $guid); ?>"></a></p>
    </div>

<?php
?>