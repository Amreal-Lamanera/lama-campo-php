<?php
include_once __DIR__ . '/app/Result.php';
$r = Result::all();
$params = $_POST['params'];
// $r[] = new Result(3, 'nuovo2', $params[0]);
// $r[count($r) - 1]->add();
// var_dump(count($r));

if (count($r) < 10 || $r[0]->points < $params[0]) {
    // var_dump($r[0]->points, $params[0]);
?>
    <div id="new_record">
        <h2>
            Nuovo Record!
        </h2>
        <div>
            <form action="records.php" method="POST">
                <label for="nickname">
                    Inserisci il tuo nome:
                </label>
                <input type="text" name="nickname" id="nickname">
                <label for="result">
                    Risultato:
                </label>
                <input type="hidden" name="result" id="result" value="<?= $params[0] ?>">
                <input type="submit" value="Salva">
            </form>

        </div>
    </div>
<?php
}
if (count($r) == 10)
    $r[0]->remove();
?>

<style type="text/css">
    #new_record {
        position: absolute;
        background-color: #242424;
        color: white;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: 0.5rem solid white;
        padding: 3rem;
        border-radius: 1rem;
    }
</style>