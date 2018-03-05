<html>
<head>
    <title></title>
</head>
<body>
<table>
    <thead>

    </thead>
    <tbody>
    <?php foreach ($data as $hasil): ?>
        <tr>
            <td><?= $hasil->item_kode ?></td>
            <td><?= $hasil->item_nama ?></td>
            <td><?= $hasil->item_harga1 ?></td>
            <td><?= $hasil->item_harga2 ?></td>
            <td><?= $hasil->item_harga3 ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>