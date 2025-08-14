<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Internal Styling -->
    <style>
        body {
            background: linear-gradient(135deg, #a18cd1, #fbc2eb); /* biru ungu */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            background: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            border-top: 8px solid #6a0dad; /* aksen ungu */
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #4b0082; /* ungu tua */
        }

        .login-box label {
            font-weight: 500;
            margin-top: 10px;
            color: #333;
        }

        .login-box input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease;
        }

        .login-box input:focus {
            border-color: #ffd700; /* kuning */
            outline: none;
            box-shadow: 0 0 5px #ffd700;
        }

        .login-box button {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            background: linear-gradient(90deg, #6a0dad, #007bff); /* ungu ke biru */
            border: none;
            border-radius: 6px;
            color: white;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .login-box button:hover {
            background: linear-gradient(90deg, #5b00b1, #0056b3); /* efek hover */
        }

        .error-message {
            color: #ff4d4f;
            margin-top: 10px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>Login Admin</h2>

        <?php if ($this->session->flashdata('error')): ?>
            <p class="error-message"><?php echo $this->session->flashdata('error'); ?></p>
        <?php endif; ?>

        <form method="post" action="<?= site_url('admin/do_login'); ?>">
            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukan username" required>
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukan password" required>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>