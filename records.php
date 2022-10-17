<!DOCTYPE html>
<html lang="en">

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
    $file = 'records';
    include './components/header.php';
    ?>

    <main class="d-flex align-items-center p-3">

        <div class="container-lg records p-3">

            <?php
            include_once __DIR__ . '/app/Result.php';

            if (!empty($_POST)) {
                if ($_POST['nickname'] != '') {
                    $r = new Result(100, $_POST['nickname'], $_POST['result']);
                    $r->add();
                    $all = Result::all();
                    // var_dump($all);
                    while (count($all) > 10) {
                        $all[0]->remove();
                        $all = Result::all();
                    }
                    // var_dump($all);
                    // header('HTTP/1.1 303 See Other');
                    header('Location: ./records.php');
                    die();
                }
            }
            ?>

            <h2 id="top_players">Top 10 players</h2>
            <div class="records-wrapper">
                <div class="player mb-3 p-2 border-bottom border-dark">
                    <span class="ps-2">Nickname</span>
                </div>
                <div class="points mb-3 p-2 border-bottom border-dark">
                    <span>Punteggio</span>
                </div>
                <?php
                $r = Result::records();
                foreach ($r as $key => $el) {
                ?>
                    <div class="player">
                        <span class="key">
                            <?= $key + 1 ?>.
                        </span>
                        <span class="ps-2 name"><?= $el->nickname ?></span>
                    </div>
                    <div class="points">
                        <span><?= $el->points ?></span>
                    </div>
                <?php
                }
                ?>
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