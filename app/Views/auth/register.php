<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Bali Fantastic Visas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
    }

    .register-card {
        max-width: 500px;
        margin: 50px auto;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background: white;
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="register-card">
            <h3 class="text-center mb-4">Daftar Akun Baru</h3>

            <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
            <?php endif; ?>

            <form action="<?= base_url('/register/process') ?>" method="post">
                <div class="mb-3">
                    <label for="full_name" class="form-label">Nama Lengkap</label>
                    <input type="text" name="full_name" class="form-control" id="full_name"
                        value="<?= set_value('full_name') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?= set_value('email') ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Nomor WhatsApp/HP</label>
                    <input type="text" name="phone_number" class="form-control" id="phone_number"
                        value="<?= set_value('phone_number') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>

                <div class="mb-3">
                    <label for="confpassword" class="form-label">Konfirmasi Password</label>
                    <input type="password" name="confpassword" class="form-control" id="confpassword" required>
                </div>

                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-success">Daftar Sekarang</button>
                </div>
            </form>
            <hr>
            <div class="text-center">
                <small>Sudah punya akun? <a href="/login">Login disini</a></small>
            </div>
        </div>
    </div>

</body>

</html>