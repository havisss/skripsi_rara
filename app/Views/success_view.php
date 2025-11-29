<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Berhasil</title>
    <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            background: #f0f7ff;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .success-card {
            background: white;
            padding: 50px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 500px;
        }

        .icon-check {
            font-size: 60px;
            color: #22c55e;
            margin-bottom: 20px;
        }

        .invoice-box {
            background: #f1f5f9;
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
            font-family: monospace;
            font-size: 18px;
            color: #333;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>

    <div class="success-card">
        <i class="fa-solid fa-circle-check icon-check"></i>
        <h2>Permintaan Diterima!</h2>
        <p>Terima kasih, data dokumen Anda berhasil kami terima. Tim kami akan segera melakukan verifikasi.</p>

        <p>Nomor Invoice Anda:</p>
        <div class="invoice-box"><?= $invoice; ?></div>

        <a href="/" class="btn-primary">Kembali ke Beranda</a>
    </div>

</body>

</html>