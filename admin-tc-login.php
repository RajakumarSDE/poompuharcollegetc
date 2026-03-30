<?php
session_start();
// FIXED LOGIN DETAILS
$valid_email = "admin@poompuharcollege.ac.in";
$valid_password = "admin1234";
// HANDLE LOGIN
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email === $valid_email && $password === $valid_password) {
        $_SESSION['user'] = $email;
        // REDIRECT AFTER LOGIN
        header("Location: https://poompuharcollege.fwh.is/tc/home01.html");
        exit();
    } else {
        $error = "Invalid Email or Password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login – Poompuhar College TC Portal</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --navy: #0f2044;
      --navy-deep: #08152d;
      --gold: #c8961e;
      --gold-light: #f0b429;
      --white: #ffffff;
      --error: #ff6b6b;
    }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--navy-deep);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    /* Background layers */
    .bg {
      position: fixed; inset: 0; z-index: 0;
      background:
        radial-gradient(ellipse 70% 60% at 15% 0%, rgba(200,150,30,0.13) 0%, transparent 55%),
        radial-gradient(ellipse 50% 70% at 85% 100%, rgba(26,62,114,0.4) 0%, transparent 60%),
        linear-gradient(150deg, #08152d 0%, #0f2044 60%, #162b5a 100%);
    }
    .bg-grid {
      position: fixed; inset: 0; z-index: 0; opacity: 0.035;
      background-image:
        linear-gradient(var(--gold) 1px, transparent 1px),
        linear-gradient(90deg, var(--gold) 1px, transparent 1px);
      background-size: 48px 48px;
    }

    /* Floating orbs */
    .orb {
      position: fixed; z-index: 0; border-radius: 50%;
      filter: blur(80px); pointer-events: none;
    }
    .orb1 {
      width: 400px; height: 400px;
      background: rgba(200,150,30,0.08);
      top: -100px; left: -100px;
      animation: drift 8s ease-in-out infinite alternate;
    }
    .orb2 {
      width: 300px; height: 300px;
      background: rgba(26,62,114,0.2);
      bottom: -80px; right: -80px;
      animation: drift 10s ease-in-out infinite alternate-reverse;
    }
    @keyframes drift {
      from { transform: translate(0, 0); }
      to   { transform: translate(30px, 20px); }
    }

    /* Card */
    .card {
      position: relative; z-index: 1;
      width: 100%; max-width: 420px;
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(200,150,30,0.25);
      border-radius: 24px;
      padding: 48px 44px;
      backdrop-filter: blur(20px);
      box-shadow: 0 32px 80px rgba(0,0,0,0.5), 0 0 0 1px rgba(255,255,255,0.04) inset;
      animation: slideUp 0.7s cubic-bezier(0.16,1,0.3,1) both;
      margin: 20px;
    }
    @keyframes slideUp {
      from { opacity: 0; transform: translateY(40px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* Top accent line */
    .card::before {
      content: '';
      position: absolute;
      top: 0; left: 10%; right: 10%;
      height: 2px;
      background: linear-gradient(90deg, transparent, var(--gold), transparent);
      border-radius: 2px;
    }

    /* Emblem */
    .emblem {
      width: 72px; height: 72px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--gold), var(--gold-light));
      display: flex; align-items: center; justify-content: center;
      font-size: 30px;
      margin: 0 auto 20px;
      box-shadow: 0 0 0 6px rgba(200,150,30,0.15), 0 8px 24px rgba(200,150,30,0.3);
      animation: slideUp 0.7s 0.1s cubic-bezier(0.16,1,0.3,1) both;
    }

    .college {
      text-align: center;
      margin-bottom: 32px;
      animation: slideUp 0.7s 0.15s cubic-bezier(0.16,1,0.3,1) both;
    }
    .college h1 {
      font-family: 'Playfair Display', serif;
      font-size: 18px;
      font-weight: 700;
      color: var(--white);
      line-height: 1.3;
    }
    .college p {
      font-size: 11px;
      color: rgba(255,255,255,0.4);
      letter-spacing: 0.1em;
      text-transform: uppercase;
      margin-top: 4px;
    }

    .divider {
      width: 48px; height: 1.5px;
      background: linear-gradient(90deg, transparent, var(--gold), transparent);
      margin: 12px auto 28px;
    }

    .login-label {
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--gold);
      text-align: center;
      margin-bottom: 24px;
      animation: slideUp 0.7s 0.2s cubic-bezier(0.16,1,0.3,1) both;
    }

    /* Error */
    .error-box {
      background: rgba(255,107,107,0.12);
      border: 1px solid rgba(255,107,107,0.35);
      border-radius: 10px;
      padding: 12px 16px;
      font-size: 13px;
      color: var(--error);
      text-align: center;
      margin-bottom: 20px;
      display: flex; align-items: center; gap: 8px; justify-content: center;
      animation: shake 0.4s ease;
    }
    @keyframes shake {
      0%,100% { transform: translateX(0); }
      20%,60%  { transform: translateX(-6px); }
      40%,80%  { transform: translateX(6px); }
    }

    /* Form */
    .field {
      margin-bottom: 18px;
      animation: slideUp 0.7s 0.25s cubic-bezier(0.16,1,0.3,1) both;
    }
    .field:last-of-type { animation-delay: 0.3s; }

    label {
      display: block;
      font-size: 11.5px;
      font-weight: 600;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: rgba(255,255,255,0.5);
      margin-bottom: 8px;
    }

    .input-wrap {
      position: relative;
    }
    .input-icon {
      position: absolute;
      left: 14px; top: 50%; transform: translateY(-50%);
      font-size: 16px; opacity: 0.45;
      pointer-events: none;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 13px 16px 13px 42px;
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: 12px;
      color: var(--white);
      font-family: 'DM Sans', sans-serif;
      font-size: 14px;
      outline: none;
      transition: border-color 0.25s, background 0.25s, box-shadow 0.25s;
    }
    input::placeholder { color: rgba(255,255,255,0.25); }
    input:focus {
      border-color: rgba(200,150,30,0.6);
      background: rgba(255,255,255,0.09);
      box-shadow: 0 0 0 3px rgba(200,150,30,0.12);
    }

    /* Show password toggle */
    .toggle-pw {
      position: absolute;
      right: 14px; top: 50%; transform: translateY(-50%);
      background: none; border: none;
      color: rgba(255,255,255,0.3);
      cursor: pointer; font-size: 15px;
      transition: color 0.2s;
    }
    .toggle-pw:hover { color: var(--gold); }

    /* Submit */
    .btn {
      width: 100%;
      padding: 14px;
      margin-top: 8px;
      background: linear-gradient(135deg, var(--gold), var(--gold-light));
      color: var(--navy-deep);
      font-family: 'DM Sans', sans-serif;
      font-size: 14px;
      font-weight: 700;
      letter-spacing: 0.06em;
      text-transform: uppercase;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      transition: transform 0.2s, box-shadow 0.2s, filter 0.2s;
      box-shadow: 0 8px 24px rgba(200,150,30,0.35);
      animation: slideUp 0.7s 0.35s cubic-bezier(0.16,1,0.3,1) both;
    }
    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 32px rgba(200,150,30,0.45);
      filter: brightness(1.08);
    }
    .btn:active { transform: translateY(0); }

    /* Footer note */
    .card-footer {
      text-align: center;
      margin-top: 28px;
      font-size: 11.5px;
      color: rgba(255,255,255,0.25);
      animation: slideUp 0.7s 0.4s cubic-bezier(0.16,1,0.3,1) both;
    }
    .card-footer span { color: rgba(200,150,30,0.6); }
  </style>
</head>
<body>

<div class="bg"></div>
<div class="bg-grid"></div>
<div class="orb orb1"></div>
<div class="orb orb2"></div>

<div class="card">

  <div class="emblem">🎓</div>

  <div class="college">
    <h1>Poompuhar College (Autonomous)</h1>
    <p>Transfer Certificate Portal</p>
  </div>
  <div class="divider"></div>

  <div class="login-label">🔐 Admin Login</div>

  <?php if (isset($error)): ?>
  <div class="error-box">⚠️ <?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="POST" autocomplete="off">

    <div class="field">
      <label>Email Address</label>
      <div class="input-wrap">
        <span class="input-icon">✉️</span>
        <input type="email" name="email" placeholder="Enter your email" required
               value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
      </div>
    </div>

    <div class="field">
      <label>Password</label>
      <div class="input-wrap">
        <span class="input-icon">🔑</span>
        <input type="password" name="password" id="pw" placeholder="Enter your password" required>
        <button type="button" class="toggle-pw" onclick="togglePw()" title="Show/Hide Password">👁️</button>
      </div>
    </div>

    <button type="submit" class="btn">Sign In →</button>

  </form>

  <div class="card-footer">
    © 2025 <span>Poompuhar College</span> · Melaiyur – 609 107
  </div>

</div>

<script>
  function togglePw() {
    const pw = document.getElementById('pw');
    pw.type = pw.type === 'password' ? 'text' : 'password';
  }
</script>

</body>
</html>