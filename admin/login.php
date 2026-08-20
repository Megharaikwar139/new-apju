<?php
session_start();
require_once '../db.php';

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: index.php");
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = 'Please enter both username and password.';
    } else {
        $stmt = $pdo->prepare("SELECT id, username, password_hash FROM admins WHERE username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password_hash'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $admin['username'];
            header("Location: index.php");
            exit;
        } else {
            $error = 'Invalid username or password.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Executive Login - Dr. APJ Abdul Kalam University Indore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', system-ui, sans-serif;
            min-height: 100vh;
            background: radial-gradient(circle at 10% 20%, rgba(212, 175, 55, 0.15) 0%, transparent 40%),
                        radial-gradient(circle at 90% 80%, rgba(88, 8, 19, 0.35) 0%, transparent 50%),
                        linear-gradient(135deg, #2b040a 0%, #4a0710 50%, #1e0207 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #ffffff;
        }

        .login-card {
            width: 100%;
            max-width: 440px;
            background: rgba(255, 255, 255, 0.96);
            border-radius: 20px;
            border: 1px solid rgba(212, 175, 55, 0.4);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            padding: 40px 36px;
            color: #221417;
            backdrop-filter: blur(10px);
            position: relative;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 20px;
            right: 20px;
            height: 4px;
            background: linear-gradient(90deg, #580813 0%, #d4af37 50%, #580813 100%);
            border-radius: 0 0 8px 8px;
        }

        .login-logo {
            text-align: center;
            margin-bottom: 24px;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #ebdcd4;
            padding: 12px 16px;
            font-size: 0.95rem;
            transition: all 0.2s;
        }

        .form-control:focus {
            border-color: #d4af37;
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.15);
        }

        .btn-login {
            background: linear-gradient(135deg, #580813 0%, #3b050d 100%);
            border: none;
            color: #ffffff;
            font-weight: 700;
            letter-spacing: 0.05em;
            padding: 13px 20px;
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.25s;
            box-shadow: 0 4px 14px rgba(88, 8, 19, 0.35);
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #721320 0%, #580813 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(88, 8, 19, 0.45);
            color: #ffffff;
        }
    </style>
</head>
<body>

    <div class="login-card">
        
        <div class="login-logo">
            <img src="../assets/lovable/aku-logo.jpeg" alt="Logo" class="rounded mb-2" style="height: 52px; width: auto; border: 1px solid #d4af37; padding: 2px; background: white;" />
            <h3 class="font-serif fw-bold mb-0" style="font-family: 'Cormorant Garamond', serif; font-size: 1.6rem; color: #580813;">Dr. APJ Abdul Kalam University</h3>
            <p class="text-uppercase small mb-0" style="font-size: 0.68rem; letter-spacing: 0.18em; color: #d4af37; font-weight: 700;">Executive CMS Admin Portal</p>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger py-2 small rounded-3 d-flex align-items-center gap-2 mb-3" role="alert">
                <i class="fa-solid fa-circle-exclamation fs-6"></i>
                <div><?php echo htmlspecialchars($error); ?></div>
            </div>
        <?php endif; ?>

        <form method="post" action="login.php">
            <div class="mb-3">
                <label class="form-label small fw-bold text-dark">Admin Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="username" class="form-control border-start-0 ps-0" placeholder="Enter username" required autofocus>
                </div>
            </div>
            
            <div class="mb-4">
                <label class="form-label small fw-bold text-dark">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" id="login_pass" class="form-control border-start-0 border-end-0 ps-0" placeholder="••••••••" required>
                    <button class="btn btn-outline-secondary border-start-0" type="button" onclick="const p = document.getElementById('login_pass'); p.type = (p.type === 'password' ? 'text' : 'password');"><i class="fa-regular fa-eye"></i></button>
                </div>
            </div>

            <button type="submit" class="btn btn-login w-100 mb-3">
                <i class="fa-solid fa-right-to-bracket me-1.5"></i> Secure Sign In
            </button>
            
            <div class="text-center pt-2 border-top">
                <a href="../index.php" class="text-decoration-none small text-muted hover-gold">
                    <i class="fa-solid fa-arrow-left me-1"></i> Return to University Website
                </a>
            </div>
        </form>

    </div>

</body>
</html>
