<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Quiz Game</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            box-sizing: border-box;
        }

        .form-box {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        body{
            background: linear-gradient(135deg,rgb(29, 215, 221),rgb(58, 175, 196));
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-form {
            background: #fff;
            padding: 40px 35px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 420px;
            text-align: center;
            animation: fadeIn 0.7s ease-in-out;
        }

        .login-form h2 {
            margin-bottom: 25px;
            color: #2c3e50;
            font-weight: 600;
        }

        .login-form input[type="text"] {
            width: 100%;
            padding: 14px 18px;
            margin: 18px 0;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 17px;
            transition: 0.3s ease;
        }

        .login-form input[type="text"]:focus {
            border-color: #4CAF50;
            outline: none;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.4);
        }

        .login-form button {
            background-color: #4CAF50;
            color: #fff;
            padding: 14px 22px;
            border: none;
            border-radius: 10px;
            font-size: 17px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .login-form button:hover {
            background-color: #388e3c;
        }

        .login-form p {
            margin-top: 15px;
            font-size: 14px;
            color: #666;
        }
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            max-width: 180px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        footer{
         text-align: center;
        margin-top: 37px;
        margin: 40px;
        }
    </style>
</head>
<body>
<div class="form-box">
    <form method="POST" action="/login" class="login-form">
        @csrf
        <div class="logo">
                <img src="{{ asset('images/image.webp') }}" alt="Logo">
            </div>
      
        <input type="text" name="username" placeholder="Enter your name" required>
        <button type="submit">Start Quiz</button>
        <p>Please enter your name to begin.</p>
    </form>
    </div>
    <footer>
    <div class="footer-note"><hr>
      Powered by <strong>Phoneo</strong> | www.phoneo.in
    </div>
    </footer>
</body>
</html>
