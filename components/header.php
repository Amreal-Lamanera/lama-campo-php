<header class="">
    <nav class="navbar navbar-expand-lg navbar-light main-nav main-nav">

        <div class="container-fluid">

            <div class="logo d-flex align-items-center">

                <a href="./" class="me-3">
                    <img src="img/lama.PNG" alt="My Logo">
                </a>

                <h1 class="text-uppercase fw-bold text-white">Campo Minato</h1>

            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#my-navbar_dropdown" aria-controls="my-navbar_dropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="my-navbar_dropdown">

                <ul class="navbar-nav">

                    <li class="nav-item dropdown">

                        <div class="btns pt-3 pt-lg-0">
                            <a href="<?= $file == 'records' ? './' : './records.php' ?>">
                                <input type="button" value="<?= $file == 'records' ? 'Home' : 'Classifica' ?>">
                            </a>
                            <?php
                            if ($file != 'records') {
                            ?>
                                <span class="me-3 text-white">Difficoltà:</span>
                                <select id="difficulty">
                                    <option value="10">Easy</option>
                                    <option value="14">Medium</option>
                                    <option value="22">Hard</option>
                                </select>
                                <input type="submit" value="Play">
                            <?php
                            }
                            ?>
                        </div>

                    </li>


                </ul>

            </div>
        </div>
    </nav>

</header>