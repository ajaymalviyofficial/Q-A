<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Result</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg,rgb(29, 205, 211),rgb(53, 207, 212));
            padding: 40px;
            margin: 0;
        }

        .result-container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 40px 50px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 28px;
        }

        .score {
            text-align: center;
            font-size: 24px;
            margin-bottom: 30px;
            font-weight: bold;
            color: #2e8b57;
        }

        ol {
            padding-left: 20px;
        }

        li {
            margin-bottom: 15px;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 10px;
            transition: background 0.3s ease;
        }

        li:hover {
            background: #e1f5fe;
        }

        .correct {
            color: green;
            font-weight: bold;
        }

        .incorrect {
            color: red;
            font-weight: bold;
        }

        a.button {
            display: inline-block;
            margin-top: 30px;
            padding: 14px 28px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            text-align: center;
        }

        a.button:hover {
            background-color: #0056b3;
        }
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            max-width: 180px;
        }

    </style>
</head>
<body>
 
    
    <div class="result-container">
        <div class="logo">
                <img src="{{ asset('images/image.webp') }}" alt="Logo">
        </div>
        <h3>Quiz Result</h3>
        <div class="score">Your Score: {{ $score }}/10</div>
        
        <ol>
        @foreach ($answers as $index => $ans)
            <li>
                <strong>Q{{ $index + 1 }}:</strong><br>
                Your Answer: {{ $ans['given'] }}<br>
                Correct Answer: {{ $ans['correct'] }}<br>
                Result:
                @if ($ans['given'] === $ans['correct'])
                    <span class="correct">✅ Correct</span>
                @else
                    <span class="incorrect">❌ Incorrect</span>
                @endif
            </li>
        @endforeach
    </ol>

    <div style="text-align: center;">
        <a href="/subject" class="button">Take Another Quiz</a>
    </div>
</div>

</body>
</html>
