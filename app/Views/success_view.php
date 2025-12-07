<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menunggu Pembayaran - Bali Fantastic</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
    :root {
        --primary: #2563eb;
        --success: #22c55e;
        --warning: #f59e0b;
        --bg-color: #f1f5f9;
        --card-bg: #ffffff;
        --text-dark: #1e293b;
        --text-gray: #64748b;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: var(--bg-color);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .payment-card {
        background: var(--card-bg);
        width: 100%;
        max-width: 450px;
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        animation: fadeUp 0.6s ease-out;
    }

    /* Header Section */
    .card-header {
        background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
        padding: 40px 30px;
        text-align: center;
        border-bottom: 1px dashed #e2e8f0;
    }

    .status-icon-wrapper {
        width: 70px;
        height: 70px;
        background: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        box-shadow: 0 4px 10px rgba(245, 158, 11, 0.2);
    }

    .status-icon {
        font-size: 32px;
        color: var(--warning);
        animation: pulse 2s infinite;
    }

    .card-header h2 {
        color: var(--text-dark);
        font-size: 22px;
        margin-bottom: 5px;
    }

    .card-header p {
        color: var(--text-gray);
        font-size: 14px;
    }

    /* Body Section */
    .card-body {
        padding: 30px;
    }

    .amount-section {
        text-align: center;
        margin-bottom: 30px;
    }

    .label-text {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--text-gray);
        font-weight: 600;
    }

    .amount-value {
        font-size: 36px;
        font-weight: 800;
        color: var(--primary);
        margin-top: 5px;
        letter-spacing: -1px;
    }

    /* Bank Info Box */
    .bank-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 25px;
        position: relative;
    }

    .bank-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .bank-name {
        font-weight: 700;
        color: var(--text-dark);
    }

    .account-number-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #fff;
        padding: 10px 15px;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
    }

    .account-number {
        font-family: 'Courier New', monospace;
        font-size: 18px;
        font-weight: bold;
        color: var(--text-dark);
        letter-spacing: 1px;
    }

    .btn-copy {
        background: none;
        border: none;
        color: var(--primary);
        font-weight: 600;
        cursor: pointer;
        font-size: 13px;
        transition: 0.2s;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .btn-copy:hover {
        background: #eff6ff;
    }

    .account-owner {
        font-size: 12px;
        color: var(--text-gray);
        margin-top: 10px;
        text-align: center;
    }

    /* Details List */
    .detail-list {
        margin-bottom: 30px;
    }

    .detail-item {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #f1f5f9;
        font-size: 14px;
    }

    .detail-item:last-child {
        border-bottom: none;
    }

    .detail-label {
        color: var(--text-gray);
    }

    .detail-value {
        font-weight: 600;
        color: var(--text-dark);
        text-align: right;
    }

    /* Actions */
    .btn-whatsapp {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        background: #25D366;
        color: white;
        padding: 16px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 16px;
        box-shadow: 0 10px 20px rgba(37, 211, 102, 0.2);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .btn-whatsapp:hover {
        background: #1ebd56;
        transform: translateY(-2px);
        box-shadow: 0 15px 25px rgba(37, 211, 102, 0.3);
    }

    .btn-home {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: var(--text-gray);
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: color 0.2s;
    }

    .btn-home:hover {
        color: var(--primary);
    }

    /* Animations */
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }
    </style>
</head>

<body>

    <div class="payment-card">
        <div class="card-header">
            <div class="status-icon-wrapper">
                <i class="fa-regular fa-clock status-icon"></i>
            </div>
            <h2>Menunggu Pembayaran</h2>
            <p>Order Anda berhasil dibuat, selesaikan pembayaran.</p>
        </div>

        <div class="card-body">

            <div class="amount-section">
                <div class="label-text">Total Tagihan</div>
                <div class="amount-value">Rp <?= number_format($trx['price'], 0, ',', '.') ?></div>
            </div>

            <div class="bank-box">
                <div class="bank-header">
                    <span class="bank-name">BANK BCA</span>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" height="15"
                        alt="BCA Logo">
                </div>

                <div class="account-number-wrapper">
                    <span class="account-number" id="accNum">1234567890</span>
                    <button class="btn-copy" onclick="copyToClipboard(this)">
                        <i class="far fa-copy"></i> Salin
                    </button>
                </div>

                <div class="account-owner">
                    a.n <strong>PT. Bali Fantastic Visas</strong>
                </div>
            </div>

            <div class="detail-list">
                <div class="detail-item">
                    <span class="detail-label">No. Invoice</span>
                    <span class="detail-value">#<?= $trx['invoice_number'] ?></span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Layanan</span>
                    <span class="detail-value"><?= $trx['visa_name'] ?></span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Nama Pemohon</span>
                    <span class="detail-value"><?= $trx['full_name'] ?></span>
                </div>
            </div>

            <a href="<?= $waLink ?>" target="_blank" class="btn-whatsapp">
                <i class="fab fa-whatsapp" style="font-size: 20px;"></i>
                Konfirmasi Pembayaran
            </a>

            <a href="/" class="btn-home">Kembali ke Beranda</a>
        </div>
    </div>

    <script>
    function copyToClipboard(btnElement) {
        const accNum = document.getElementById('accNum').innerText;

        navigator.clipboard.writeText(accNum).then(() => {
            // Feedback visual saat berhasil copy
            const originalContent = btnElement.innerHTML;

            btnElement.innerHTML = '<i class="fas fa-check"></i> Disalin!';
            btnElement.style.color = '#22c55e'; // Warna hijau

            // Kembalikan ke text asal setelah 2 detik
            setTimeout(() => {
                btnElement.innerHTML = originalContent;
                btnElement.style.color = ''; // Reset warna
            }, 2000);
        }).catch(err => {
            console.error('Gagal menyalin: ', err);
            alert('Gagal menyalin nomor rekening.');
        });
    }
    </script>

</body>

</html>