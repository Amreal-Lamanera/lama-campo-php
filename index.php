<!doctype html>
<html lang='it'>

<head>

    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>

    <!-- Style -->
    <link rel='stylesheet' href='css/app.css'>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Manifest -->
    <link rel="manifest" href="site.webmanifest.json" />

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <title>Campo Minato Wannabe</title>

</head>

<body class="d-flex flex-column">

    <?php
    include './components/header.php';
    ?>

    <main class="main">

        <?php
        include_once __DIR__ . '/app/Result.php';

        if (count($_POST) > 0) {
            $r = new Result(100, $_POST['nickname'], $_POST['result']);
            $r->add();
            array_splice($_POST, 0);
        }
        ?>

        <div id="results">
        </div>

        <div class="container-lg p-5 d-flex flex-column align-items-center text-center">
            <p id="wannaPlay" class="text-primary fs-2">Wanna play? Click me! <br>
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
            </p>
            <img src="img/smile.png" alt="Status img" class="pb-3" id="statusImg">
            <div class="pb-4 fs-4 text-primary">
                <span class="d-none" id="toReveal">Caselle da rivelare: </span>
                <span id="bombsNum"></span>
            </div>
            <div id="timer-wrapper" class="mb-4 d-none">
                <span id="timer" class="border bg-black text-danger border-danger fs-1">00:00:00</span>
            </div>
            <div class="tableContainer pb-4 w-100"></div>
            <button id="flagBtn" class="d-none btn btn-primary">Flag &#9872; </button>
            </p>
            <div id="info-wrapper" class="text-primary fs-4">
                <p>
                    First time?
                    <i class="fas fa-arrow-right"></i>
                    <span id="info">
                        <i class="fas fa-info-circle"></i>
                    </span>
                </p>
            </div>
            <div id="info-layover" class="d-none">
                <div class="info-container">
                    <h2 class="text-center text-danger">Regole del gioco</h2>
                    <p class="text-start">
                        Gentile utente ti do il benvenuto!
                        Le regole di base del "Campo Minato" sono poche e semplici! <br>
                        <span id="desk-ver" class="d-none d-lg-block">
                            1. Cliccando col mouse tasto sinistro svelerai il contenuto della casella; <br>
                            2. Cliccando col mouse tasto destro marcherai la casella con una bandierina, cliccando
                            nuovamente la rimuoverai, ti servirà per ricordare dove ritieni ci sia una bomba; <br>
                            3. Se sarà contenuta una bomba avrai perso e il gioco terminerà; <br>
                            4. Se nei dintorni della casella non ci sono bombe, allora ti si sveleranno anche tutte
                            le caselle dintorno, finché non verrà svelata almeno una cella con bombe nei dintorni.
                            In ogni caso verranno segnati il numero di bombe adiacenti a tutte le caselle così
                            svelate; <br>
                            5. Se il contatore di "Caselle da svelare" arriverà a 0 avrai vinto e il gioco
                            terminerà; <br>
                            6. Al termine del gioco riceverai un punteggio che dipende da 3 parametri: il tempo
                            impiegato, la difficoltà e il numero di celle svelate, più un bonus in caso di vittoria.
                        </span>

                        <span id="mobi-ver" class="d-lg-none">
                            1. Toccando una casella in modalità "reveal" ne svelerai il contenuto; <br>
                            2. Toccando una casella in modalità "flag" apporrai una bandierina, toccandola
                            nuovamente la rimuoverai, ti servirà per ricordare dove ritieni ci sia una bomba; <br>
                            3. Se sarà contenuta una bomba avrai perso e il gioco terminerà; <br>
                            4. Se nei dintorni della casella non ci sono bombe, allora ti si sveleranno anche tutte
                            le caselle dintorno, finché non verrà svelata almeno una cella con bombe nei dintorni.
                            In ogni caso verranno segnati il numero di bombe adiacenti a tutte le caselle così
                            svelate; <br>
                            5. Se il contatore di "Caselle da svelare" arriverà a 0 avrai vinto e il gioco
                            terminerà; <br>
                            6. Al termine del gioco riceverai un punteggio che dipende da 3 parametri: il tempo
                            impiegato, la difficoltà e il numero di celle svelate, più un bonus in caso di vittoria.
                        </span>
                    </p>

                    <div id="exit">
                        X
                    </div>
                </div>
            </div>

        </div>

    </main>

    <?php
    include './components/footer.php';
    ?>

    <!-- Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
    <!-- FONT AWESOME -->
    <script src='https://kit.fontawesome.com/b0485a66c8.js' crossorigin='anonymous'></script>

    <script src='js/app.js'></script>


</body>

</html>