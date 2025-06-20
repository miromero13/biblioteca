<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f8fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 2rem 3rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            width: 320px;
            text-align: center;
        }
        h1 {
            margin-bottom: 1.5rem;
            color: #333;
        }
        .login-container input[type="email"],
        .login-container input[type="password"],
        .login-container .password-wrapper input {
            width: 100%;
            padding: 0.6rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            margin-bottom: 1rem;
        }
        .password-wrapper {
            position: relative;
            margin-bottom: 1rem;
        }
        .password-wrapper input {
            padding-right: 2.5rem;
        }
        .toggle-password {
            position: absolute;
            top: 50%;
            right: 0px;
            transform: translateY(-90%);
            cursor: pointer;
            color: #888;
        }
        button {
            width: 100%;
            background-color: #3490dc;
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #2779bd;
        }
        .errors {
            color: #e3342f;
            margin-bottom: 1rem;
            text-align: left;
        }
        ul {
            padding-left: 1.2rem;
            margin: 0;
        }
        .remember-me {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 1rem;
        }
        .remember-me input {
            width: auto;
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Iniciar sesión</h1>

        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Escribir correo..." required autofocus>
            
            <div class="password-wrapper">
                <input type="password" name="password" id="password" placeholder="Contraseña" required>
                <i class="fas fa-eye toggle-password" id="togglePassword"></i>
            </div>

            <div class="remember-me">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Recordarme</label>
            </div>
            <button type="submit">Entrar</button>
        </form>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
