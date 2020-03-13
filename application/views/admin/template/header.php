<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <title><?php echo $title ?></title>
    <style>
        .badge {
            margin-left: 3px;
        }
    </style>
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/css/jquery.dataTables.min.css">
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" type="text/css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark" style="background-color: midnightblue">
        <a class="navbar-brand" href="<?= base_url(); ?>">Inventaris Lab JTI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="<?= base_url(); ?>transaksi">Data Transaksi</a>
                <a class="nav-item nav-link" href="<?= base_url(); ?>barang">Data Barang</a>
                <a class="nav-item nav-link" href="<?= base_url(); ?>mahasiswa">Data Mahasiswa</a>
                <a class="nav-item nav-link" href="<?= base_url(); ?>user/listUser">Data User</a>
                <a class="nav-item nav-link" href="<?= base_url(); ?>auth/logout">Logout</a>
            </div>
        </div>
    </nav>