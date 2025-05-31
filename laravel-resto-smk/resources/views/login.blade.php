<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #4facfe 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Floating orbs background */
        .bg-orbs {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            animation: float 20s infinite linear;
        }

        .orb:nth-child(1) {
            width: 80px;
            height: 80px;
            left: 10%;
            animation-delay: 0s;
        }

        .orb:nth-child(2) {
            width: 120px;
            height: 120px;
            left: 70%;
            animation-delay: -5s;
        }

        .orb:nth-child(3) {
            width: 60px;
            height: 60px;
            left: 40%;
            animation-delay: -10s;
        }

        .orb:nth-child(4) {
            width: 100px;
            height: 100px;
            left: 80%;
            animation-delay: -15s;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        .container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 
                0 25px 45px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(255, 255, 255, 0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 35px 60px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.1);
        }

        .card-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .card-header h2 {
            color: white;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-header p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-floating {
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            color: white;
            font-size: 16px;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .form-control:focus {
            border-color: rgba(255, 255, 255, 0.4);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .form-label {
            position: absolute;
            left: 20px;
            top: 16px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 16px;
            transition: all 0.3s ease;
            pointer-events: none;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            padding: 0 8px;
            border-radius: 8px;
        }

        .form-control:focus + .form-label,
        .form-control:not(:placeholder-shown) + .form-label {
            top: -12px;
            left: 16px;
            font-size: 14px;
            color: white;
            font-weight: 600;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin: 25px 0;
        }

        .checkbox-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .form-check-input {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.1);
            margin-right: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .form-check-input:checked {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-color: rgba(255, 255, 255, 0.8);
        }

        .form-check-input:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
            font-size: 12px;
        }

        .form-check-label {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            cursor: pointer;
            user-select: none;
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 16px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .forgot-password {
            text-align: center;
            margin-top: 20px;
        }

        .forgot-password a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .forgot-password a:hover {
            color: white;
            text-shadow: 0 0 8px rgba(255, 255, 255, 0.5);
        }

        /* Responsive design */
        @media (max-width: 480px) {
            .container {
                padding: 15px;
            }
            
            .login-card {
                padding: 30px 25px;
            }
            
            .card-header h2 {
                font-size: 28px;
            }
        }

        /* Loading animation */
        .btn-login.loading {
            pointer-events: none;
        }

        .btn-login.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: translateY(-50%) rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="bg-orbs">
        <div class="orb"></div>
        <div class="orb"></div>
        <div class="orb"></div>
        <div class="orb"></div>
    </div>

    <div class="container">
        <div class="login-card">
            <div class="card-header">
                <h2>Welcome Back</h2>
                <p>Sign in to your account</p>
            </div>

            <form id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder=" " required autofocus>
                        <label for="email" class="form-label">Email Address</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder=" " required>
                        <label for="password" class="form-label">Password</label>
                    </div>
                </div>

                <div class="remember-me">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    Sign In
                </button>
            </form>

            <div class="forgot-password">
                <a href="#" onclick="showForgotPassword()">Forgot your password?</a>
            </div>
        </div>
    </div>

    <script>
        // Form submission with loading animation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const btn = document.querySelector('.btn-login');
            btn.classList.add('loading');
            btn.textContent = 'Signing In...';
            
            // Let the form submit naturally to Laravel backend
            // The loading animation will show until page redirects
        });

        // Enhanced focus effects
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Forgot password function
        function showForgotPassword() {
            alert('Forgot password functionality would redirect to password reset page!');
        }

        // Add some interactive particles on click
        document.addEventListener('click', function(e) {
            createRipple(e.pageX, e.pageY);
        });

        function createRipple(x, y) {
            const ripple = document.createElement('div');
            ripple.style.position = 'fixed';
            ripple.style.left = x - 25 + 'px';
            ripple.style.top = y - 25 + 'px';
            ripple.style.width = '50px';
            ripple.style.height = '50px';
            ripple.style.borderRadius = '50%';
            ripple.style.border = '2px solid rgba(255, 255, 255, 0.3)';
            ripple.style.pointerEvents = 'none';
            ripple.style.animation = 'rippleEffect 0.6s ease-out forwards';
            ripple.style.zIndex = '1000';
            
            document.body.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        }

        // Add ripple effect keyframes
        const style = document.createElement('style');
        style.textContent = `
            @keyframes rippleEffect {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>