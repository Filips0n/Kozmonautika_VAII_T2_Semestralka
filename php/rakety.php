<?php
require "../classes/App.php";
$app = new App();
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rakety</title>
    <link rel="icon" href="../assets/icon.png">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand" href="../index.php">
            <img src="../assets/icon-crop.png" alt="logo" class="d-inline-block align-text-center"/>
            Kozmonautika
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0  mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="vesmirne-agentury.php">Vesmírne agentúry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="rakety.php">Rakety</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="kozmodromy.php">Kozmodrómy</a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-11">
            <?php for ($i = 1; $i <= intval($app->getNumberOfCountries()); ++$i) { ?>
                <?php if ($app->getAllRocketsFromCountry($i) == null) {
                    continue;
                } ?>
                <section class="rocket-section">
                    <a class="anchor" id="<?= $app->getAllAgencyNames()[$i-1] ?>"></a>
                    <h1><?= $app->getAllRocketPrefixesNames()[$i-1] ?> rakety</h1>
                    <?php if (count($app->getAllRocketsFromCountry($i)) < 4) { ?>
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php } elseif (count($app->getAllRocketsFromCountry($i)) < 13) { ?>
                        <div class="row row-cols-2 row-cols-md-4 g-4">
                    <?php } else { ?>
                        <div class="row row-cols-2 row-cols-md-6 g-4">
                    <?php } ?>
                    <?php foreach ($app->getAllRocketsFromCountry($i) as $rocket) { ?>
                        <div class="col">
                            <div class="card h-100 bg-dark mb-3">
                                <img src="../assets/rockets/<?= $rocket->getImage() ?>"
                                     class="card-img-top <?php if (count($app->getAllRocketsFromCountry($i)) < 4) { ?>other-rockets<?php } ?>"
                                     alt="<?= $rocket->getName() ?> rocket">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $rocket->getName() ?>
                                        <?php if ($rocket->isHumanRated() == 1) { ?>
                                        <i class="bi bi-people" title="Ľudská posádka"></i>
                                        <?php } ?></h5>
                                    <p class="card-text">
                                        <?php foreach ($app->getManufacturerById($rocket->getManufacturerId()) as $manufacturer) { ?>
                                            Výrobca: <?= $manufacturer->getName() ?><br>
                                        <?php break;} ?>
                                            Nosnosť LEO: <?= $rocket->getPayload() ?>t<br>
                                            Výška: <?= $rocket->getHeight() ?> m<br>
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <a href="?delete=<?= $rocket->getId() ?>" style="color: inherit;text-decoration: none;">
                                            <button type="button" class="bg-danger text-white">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </a>
                                        <a>
                                            <button type="button" class="bg-warning text-black rocket-edit-btn"
                                                    data-bs-toggle="modal" data-bs-target="#editModal"
                                                    data-rocket='<?=json_encode($rocket->getArray(), JSON_FORCE_OBJECT)?>'>
                                                <i class="bi bi-pen"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <button type="button" class="btn btn-primary d-flex align-items-center justify-content-center"
                                                                    data-bs-toggle="modal" data-bs-target="#addModal-<?php echo $i;?>">
                        <i class="bi bi-plus d-flex align-items-center"></i>
                    </button>
                    <!-- The Modal -->
                    <div class="modal" id="addModal-<?php echo $i;?>">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title text-dark">Pridaj novú raketu</h4>
                                    <button type="button" class="btn-close"
                                            data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body text-dark">
                                    <div class="input-group">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="custom-file">
                                                <input name="file" type="file" class="form-control mb-1" id="customFile" accept=".jpg,.png,.jpeg,.bmp" maxlength="255" required/>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control mb-1" id="name" name="name" type="text" placeholder="Názov" maxlength="20" pattern="[A-Za-z0-9 _-]+" required
                                                       oninvalid="setCustomValidity('Zadajte platný názov. Názov môže obsahovať len písmená, čísla a &quot; -_&quot; .')"
                                                       oninput="setCustomValidity('')" >
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-1">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="human_rated">Posádka:</label>
                                                    </div>
                                                    <select class="custom-select" id="human_rated" name="human_rated">
                                                        <option value="0">Nie</option>
                                                        <option value="1">Áno</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
<!--                                                <input class="form-control mb-1" name="manufacturer_id" type="number" placeholder="Výrobca" min="1" step="1" max="13" required>-->
                                                <div class="input-group mb-1">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="manufacturer_id">Výrobca:</label>
                                                    </div>
                                                    <select class="custom-select" id="manufacturer_id" name="manufacturer_id">
                                                        <?php foreach ($app->getAllManufacturersFromCountry($i) as $manufacturer) { ?>
                                                            <option value="<?= $manufacturer->getId()?>"><?= $manufacturer->getName()?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control mb-1" name="payload" type="number" placeholder="Nosnosť"  min="0" step="0.01" max="999" required>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control mb-1" name="height" type="number" placeholder="Výška" min="0" step="0.01" max="999" required>
                                            </div>
                                            <input type="submit" class="btn btn-primary" id="submit" name="rocket" value="Odoslať">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- The Edit Modal -->
                    <div class="modal" id="editModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title text-dark">Uprav raketu</h4>
                                    <button type="button" class="btn-close"
                                            data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body text-dark">
                                    <div class="input-group">
                                        <form method="post" enctype="multipart/form-data">
                                            <input type="hidden" id="rocket-edit-id" name="rocket-edit-id">
                                            <div class="form-group">
                                                <input class="form-control mb-1" name="rocket-edit-name" type="text" placeholder="Názov" id="rocket-edit-name"
                                                       maxlength="20" pattern="[A-Za-z0-9 _-]+" required
                                                       oninvalid="setCustomValidity('Zadajte platný názov. Názov môže obsahovať len písmená, čísla a &quot; -_&quot; .')"
                                                       oninput="setCustomValidity('')" >
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-1">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="rocket-edit-human-rated">Posádka:</label>
                                                    </div>
                                                    <select class="custom-select" name="rocket-edit-human-rated" id="rocket-edit-human-rated">
                                                        <option value="0">Nie</option>
                                                        <option value="1">Áno</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
<!--                                                <input class="form-control mb-1" name="rocket-edit-manufacturer" type="number" placeholder="Výrobca" id="rocket-edit-manufacturer" min="1" max="13" step="1" required>-->
                                                <div class="input-group mb-1">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="manufacturer_id">Výrobca:</label>
                                                    </div>
                                                    <select class="custom-select" name="rocket-edit-manufacturer" id="rocket-edit-manufacturer">
                                                        <?php foreach ($app->getAllManufacturers() as $manufacturer) { ?>
                                                            <option value="<?= $manufacturer->getId()?>"><?= $manufacturer->getName()?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control mb-1" name="rocket-edit-payload" type="number" placeholder="Nosnosť" id="rocket-edit-payload" min="0" step="0.01" max="999" required>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control mb-1" name="rocket-edit-height" type="number" placeholder="Výška" id="rocket-edit-height" min="0" step="0.01" max="999" required>
                                            </div>
                                            <input type="submit" class="btn btn-primary" name="rocket-edit" value="Odoslať">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>
            <?php } ?>
        </div>
        <!--    Right panel menu    -->
        <div class="col-lg-1 d-none d-lg-block">
            <nav id="side-vertical-nav">
                <ul class="nav nav-stacked flex-sm-column">
                    <?php for ($i = 1; $i <= intval($app->getNumberOfCountries()); ++$i) { ?>
                        <?php if ($app->getAllRocketsFromCountry($i) == null) {
                            continue;
                        } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#<?= $app->getAllAgencyNames()[$i-1] ?>"><?= $app->getAllRocketPrefixesNames()[$i-1] ?> rakety</a>
                        </li>
                    <?php }?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<footer class="bg-light text-center text-lg-start">
    <p class="text-center p-3 footer-text">
        © 2021 Copyright &emsp; Vytvoril: Filip Sudora
    </p>
</footer>
<script src="../js/editRocket.js"></script>
</body>
</html>