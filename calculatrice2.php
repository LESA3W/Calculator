<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice Web - Résultat</title>
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
        h2 {
            font-size: 24px;
            color: #fff;
        }
        .result {
            color: #28a745;
        }
        .error {
            color: #dc3545;
        }
        .icon {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="background-animation" id="backgroundAnimation"></div>
    <div class="container">
        <h1><i class="fas fa-calculator icon"></i> Calculatrice 4 Opérations - Résultat</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre1 = $_POST['nombre1'];
            $nombre2 = $_POST['nombre2'];
            $signe = $_POST['signe'];

            if (is_numeric($nombre1) && is_numeric($nombre2)) {
                switch ($signe) {
                    case 'addition':
                        $resultat = $nombre1 + $nombre2;
                        echo "<h2 class='result'>$nombre1 + $nombre2 = $resultat</h2>";
                        break;
                    case 'soustraction':
                        $resultat = $nombre1 - $nombre2;
                        echo "<h2 class='result'>$nombre1 - $nombre2 = $resultat</h2>";
                        break;
                    case 'multiplication':
                        $resultat = $nombre1 * $nombre2;
                        echo "<h2 class='result'>$nombre1 × $nombre2 = $resultat</h2>";
                        break;
                    case 'division':
                        if ($nombre2 != 0) {
                            $resultat = $nombre1 / $nombre2;
                            echo "<h2 class='result'>$nombre1 ÷ $nombre2 = $resultat</h2>";
                        } else {
                            echo "<h2 class='error'>Erreur : Division par zéro impossible.</h2>";
                        }
                        break;
                    default:
                        echo "<h2 class='error'>Opération non reconnue.</h2>";
                }
            } else {
                echo "<h2 class='error'>Veuillez entrer des nombres valides.</h2>";
            }
        }
        ?>
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