<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice Web</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            position: relative;
        }
        .background-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }
        .background-animation span {
            position: absolute;
            font-size: 20px;
            color: rgba(255, 255, 255, 0.1);
            animation: float 10s linear infinite;
        }
        @keyframes float {
            0% {
                transform: translateY(-100%);
            }
            100% {
                transform: translateY(100vh);
            }
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            z-index: 2;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #fff;
        }
        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input[type="text"], select {
            padding: 12px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            outline: none;
            transition: background 0.3s ease;
        }
        input[type="text"]::placeholder, select {
            color: rgba(255, 255, 255, 0.7);
        }
        input[type="text"]:focus, select:focus {
            background: rgba(255, 255, 255, 0.3);
        }
        input[type="submit"] {
            padding: 12px;
            background: #007BFF;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
        .icon {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="background-animation" id="backgroundAnimation"></div>
    <div class="container">
        <h1><i class="fas fa-calculator icon"></i> Calculatrice 4 Opérations</h1>
        <img src="calculatrice.jpg" alt="Calculatrice">
        <h2>Saisir un nombre, choisir un signe, saisir un second nombre, puis cliquer sur <b>=</b></h2>
        <form method="post" action="calculatrice2.php">
            <input type="text" name="nombre1" placeholder="Premier nombre" required>
            <select name="signe">
                <option value="addition">+ Addition</option>
                <option value="soustraction">- Soustraction</option>
                <option value="multiplication">× Multiplication</option>
                <option value="division">÷ Division</option>
            </select>
            <input type="text" name="nombre2" placeholder="Deuxième nombre" required>
            <input type="submit" value="Calculer">
        </form>
    </div>

    <script>
        function generateRandomNumber() {
            const operators = ['+', '-', '×', '÷'];
            const num1 = Math.floor(Math.random() * 100);
            const num2 = Math.floor(Math.random() * 100);
            const operator = operators[Math.floor(Math.random() * operators.length)];
            return `${num1} ${operator} ${num2}`;
        }

        function createBackgroundAnimation() {
            const backgroundAnimation = document.getElementById('backgroundAnimation');
            for (let i = 0; i < 50; i++) {
                const span = document.createElement('span');
                span.textContent = generateRandomNumber();
                span.style.left = `${Math.random() * 100}%`;
                span.style.animationDelay = `${Math.random() * 10}s`;
                backgroundAnimation.appendChild(span);
            }
        }

        createBackgroundAnimation();
    </script>
</body>

</html>