<!DOCTYPE html>
<html>
<head>
    <title>Form Pengiriman</title>
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <style>
        .size-logo {
            width: 200px;
            height: 70px;
        }

        .margin-form {
            margin: 20px auto;
        }

        .padding-form {
            padding-top: 10px;
        }

        .no-invoice h4 {
            line-height: 70px;
        }

        table {
            width: 100%;
        }

        .t-kiri {
            width: 150px;
        }

        .border-right {
            border-right: 1px;
        }

        .bot {
            padding-bottom: 10px;
        }
        .f-my-width{
            width: 900px;
        }
        .f-margin-lala {
            margin-top: 200px;
        }
    </style>
</head>
<body>

<div class="container border margin-form f-my-width px-5 f-margin-lala">
<!--    <div class="row padding-form">-->
<!--        <div class="col-xl-10 col-lg-9 col-md-8">-->
<!--            <img src="--><?//= base_url('upload/' . $icon); ?><!--" class="rounded float-left size-logo" alt="...">-->
<!--        </div>-->
<!--        <div class="col-xl-2 col-lg-3 col-md-4 no-invoice">-->
<!--            <h4># 0031740045</h4>-->
<!--        </div>-->
<!--    </div>-->
<!--    <hr>-->

    <div class="row mt-4">
        <div class="col">
            <h5>Kepada</h5>
            <table cellpadding="5" style="margin-left: 20px;">
                <tr>
                    <td class="t-kiri">Nama</td>
                    <td>Harry Gons Drong</td>
                </tr>
                <tr>
                    <td class="t-kiri">Telpon/HP</td>
                    <td>081288770431</td>
                </tr>
                <tr>
                    <td class="t-kiri">Alamat</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio eius, provident natus, quidem
                        cupiditate quaerat nostrum ipsum ea dignissimos delectus, adipisci libero accusantium harum?
                        Unde voluptatem architecto, ipsa officiis
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <hr>
    <div class="row mb-4">
        <div class="col">
<!--            <h5>Pengirim</h5>-->
            <table cellpadding="5" style="margin-left: 20px;">
                <tr>
                    <td class="t-kanan"><?= $brandname; ?> / Jakarta</td>
                </tr>
                <tr>
                    <td class="t-">08123234345</td>
                </tr>
            </table>
        </div>
    </div>
<!--    <footer class="blockquote-footer bot">Trima Kasih atas kepercayaan Anda belanja di <cite title="Source Title">Fashion-Grosir.com</cite>-->
<!--    </footer>-->

</div>

</body>
</html>