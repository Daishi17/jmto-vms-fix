<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cek_terundang as $key => $value) { ?>
                <tr>
                    <td></td>
                    <td scope="row"><?= $value['nama_rup'] ?></td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>
</body>

</html>