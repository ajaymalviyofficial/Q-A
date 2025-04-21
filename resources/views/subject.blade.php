<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Subject | Quiz Game</title>
    <style>
        body {
            background: linear-gradient(135deg,rgb(29, 205, 211),rgb(53, 207, 212));
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .form-box {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
            text-align: center;
            transition: all 0.3s ease-in-out;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        select {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
            margin-bottom: 20px;
            transition: all 0.3s ease-in-out;
        }

        select:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            max-width: 180px;
        }
    .footer{
         text-align: center;
        margin-top: 37px;
    
        }
    </style>
</head>
<body>

    <div class="form-box">
       <div class="header">
    <div class="logo">
        <img src="{{ asset('images/image.webp') }}" alt="Logo">
    </div>
   
@if (session('username'))
    <p><strong>Name:</strong> {{ session('username') }}</p>
@endif

    </div>
        <h2>Select a Subject</h2>
        <form method="POST" action="/start-quiz">
            @csrf
           
            <select name="subject" id="subject" required>
                <option value="">-- Select --</option>
                <option value="laravel">Laravel</option>
                <option value="react">React</option>
                <option value="flutter">Flutter</option>
            </select>
            <button type="submit">Start Quiz</button>
        </form>
        <div class="footer">
          Powered by <strong>Phoneo</strong> | www.phoneo.in
        </div>
    </div>
  

</body>
</html>
