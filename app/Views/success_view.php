<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menunggu Pembayaran - Bali Fantastic</title>
    <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            background: #f0f7ff;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

        .payment-card {
            background: white;
            width: 100%;
            max-width: 500px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: #fbbf24;
            padding: 30px;
            text-align: center;
            color: #333;
        }

        .card-body {
            padding: 30px;
        }

        .amount-box {
            text-align: center;
            margin-bottom: 30px;
        }

        .amount-label {
            font-size: 14px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .amount-value {
            font-size: 32px;
            font-weight: bold;
            color: #2563eb;
            margin-top: 5px;
        }

        .bank-info {
            background: #f8fafc;
            border: 1px dashed #cbd5e1;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .bank-name {
            font-weight: bold;
            font-size: 16px;
            color: #1e293b;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .bank-number {
            font-size: 20px;
            letter-spacing: 1px;
            color: #333;
            margin-top: 5px;
            font-family: monospace;
        }

        .copy-btn {
            background: none;
            border: none;
            color: #2563eb;
            cursor: pointer;
            font-size: 14px;
        }

        .invoice-detail {
            margin-bottom: 30px;
            font-size: 14px;
            color: #475569;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 10px;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .btn-whatsapp {
            display: block;
            width: 100%;
            background: #25D366;
            color: white;
            text-align: center;
            padding: 15px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
            transition: 0.3s;
        }

        .btn-whatsapp:hover {
            background: #1ebd56;
            transform: translateY(-2px);
        }

        .back-home {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 14px;
        }

        .back-home:hover {
            color: #2563eb;
        }
    </style>
</head>

<body>

    <div class="payment-card">
        <div class="card-header">
            <i class="fa-solid fa-clock" style="font-size: 40px; margin-bottom: 10px; opacity: 0.8;"></i>
            <h2>Menunggu Pembayaran</h2>
            <p style="margin:0; opacity: 0.9;">Order Anda berhasil dibuat!</p>
        </div>

        <div class="card-body">

            <div class="amount-box">
                <div class="amount-label">Total Tagihan</div>
                <div class="amount-value">Rp <?= number_format($trx['price'], 0, ',', '.') ?></div>
            </div>

            <div class="bank-info">
                <div class="bank-name">
                    <span>BANK BCA</span>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" height="15"
                        alt="BCA">
                </div>
                <div class="bank-number">
                    123 456 7890
                    <button class="copy-btn"
                        onclick="navigator.clipboard.writeText('1234567890'); alert('Nomor rekening disalin!')"><i
                            class="far fa-copy"></i> Salin</button>
                </div>
                <div style="font-size: 13px; margin-top: 5px; color: #64748b;">a.n PT Visa Jaya Abadi</div>
            </div>

            <div class="invoice-detail">
                <div class="detail-row">
                    <span>No. Invoice</span>
                    <strong>#<?= $trx['invoice_number'] ?></strong>
                </div>
                <div class="detail-row">
                    <span>Layanan</span>
                    <span><?= $trx['visa_name'] ?></span>
                </div>
                <div class="detail-row">
                    <span>Nama Pemohon</span>
                    <span><?= $trx['full_name'] ?></span>
                </div>
            </div>

            <a href="<?= $waLink ?>" target="_blank" class="btn-whatsapp">
                <i class="fab fa-whatsapp"></i> Konfirmasi Pembayaran
            </a>

            <a href="/" class="back-home">Kembali ke Beranda</a>
        </div>
    </div>

</body>

</html>