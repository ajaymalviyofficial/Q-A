<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Question {{ $qno }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg,rgb(29, 205, 211),rgb(53, 207, 212));
            margin: 0;
            padding: 30px;
        }

        .quiz-container {
            max-width: 640px;
            margin: auto;
            background: #fff;
            border-radius: 16px;
            padding: 40px 30px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
        }

        h3 {
            color: #2c3e50;
            margin-bottom: 25px;
        }

        .options label {
            display: block;
            background: #f5f5f5;
            margin: 12px 0;
            padding: 14px 16px;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.25s ease, transform 0.2s ease;
            border: 1px solid transparent;
        }

        .options input[type="radio"] {
            margin-right: 12px;
        }

        .options label:hover {
            background: #e3f2fd;
            border-color: #2196f3;
            transform: scale(1.01);
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 28px;
            border: none;
            border-radius: 10px;
            font-size: 17px;
            cursor: pointer;
            margin-top: 30px;
            width: 100%;
        }

        button:hover {
            background-color: #388e3c;
        }

        #timer {
            text-align: right;
            font-weight: bold;
            color: #d32f2f;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            max-width: 180px;
        }
        footer{
    text-align: center;
    margin-top: 37px;
}

    </style>
</head>
<body>
    <div class="quiz-container">
    <div class="header">
    <div class="logo">
        <img src="{{ asset('images/image.webp') }}" alt="Logo">
    </div>
    @if (session('username'))
        <div class="user-info">
            👤 {{ session('username') }} 
            @if(session('subject')) | 📚 Subject: {{ ucfirst(session('subject')) }} @endif
        </div>
    @endif
    </div>

        <div id="timer">30s</div>

        <form method="POST" action="/answer">
            @csrf
            <h3>Q{{ $qno }}. {{ $question['question'] }}</h3>

            <div class="options">
                @foreach ($question['options'] as $opt)
                    <label><input type="radio" name="answer" value="{{ $opt }}" required> {{ $opt }}</label>
                @endforeach
            </div>

            <input type="hidden" name="correct" value="{{ $question['answer'] }}">

            <button type="submit">Next</button>
        </form>
    </div>

    <script>
        let time = 30;
        let timer = setInterval(function () {
            time--;
            document.getElementById('timer').innerText = time + 's';
            if (time <= 0) {
                clearInterval(timer);
                document.forms[0].submit();
            }
        }, 1000);
    </script>
<footer>
    <div class="footer-note">
      Powered by <strong>Phoneo</strong> | www.phoneo.in
    </div>
</footer>
</body>
</html>
