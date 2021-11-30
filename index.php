<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kozmonautika</title>
    <link rel="icon" href="assets/icon-crop.png">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light sticky-top justify-content-between" style="background-color: #d5e7fc;">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="assets/icon-crop.png" alt="logo" class="d-inline-block align-text-center"/>
            Kozmonautika
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="php/vesmirne-agentury.php">Vesmírne agentúry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="php/rakety.php">Rakety</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="php/kozmodromy.php">Kozmodrómy</a>
                </li>
            </ul>
<!--            <form class="form-inline" action="#" method="post">-->
<!--                <input type="text" name="username" class="input-small" placeholder="Username...">-->
<!--                <input type="text" name="password" class="input-small" placeholder="Password...">-->
<!--                <button type="submit" class="btn btn-primary mb-2">Submit</button>-->
<!--            </form>-->
        </div>
    </div>
</nav>

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="overlay-image" style="background-image: url(assets/slide-1.jpg)"></div>
            <div class="carousel-caption d-none d-md-block">
                <h3>Vesmírne agentúry</h3>
                <p>Spoznaj navýznamnejšie vesmírne agentúry.</p>
                <a href="php/vesmirne-agentury.php" class="btn btn-lg btn-dark">Zisti viac</a>
            </div>
            <div class="carousel-caption d-md-none">
                <h3>Vesmírne agentúry</h3>
            </div>
        </div>
        <div class="carousel-item">
            <div class="overlay-image" style="background-image: url(assets/slide-2.jpg)"></div>
            <div class="carousel-caption d-none d-md-block">
                <h3>Rakety</h3>
                <p>Objav všetky aktívne, pripravované aj historické rakety.</p>
                <a href="php/rakety.php" class="btn btn-lg btn-dark">Zisti viac</a>
            </div>
            <div class="carousel-caption d-md-none">
                <h3>Rakety</h3>
            </div>
        </div>
        <div class="carousel-item">
            <div class="overlay-image" style="background-image: url(assets/slide-3.jpg)"></div>
            <div class="carousel-caption d-none d-md-block">
                <h3>Kozmodrómy</h3>
                <p>Preskúmaj rôzne kozmodrómy.</p>
                <a href="php/kozmodromy.php" class="btn btn-lg btn-dark">Zisti viac</a>
            </div>
            <div class="carousel-caption d-md-none">
                <h3>Kozmodrómy</h3>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<div class="container">
    <div class="row">
        <div class="col">
            <section class="front-page-section">
                <h1 class="main-heading">Ponor sa do sveta kozmonautiky</h1>
                <hr class="separator-line"/>
                <p><strong>Kozmonautika</strong> alebo astronautika je oblasť vedy a techniky, ktorá sa zaoberá
                    vynášaním umelých telies a cestovaním mimo zemskú atmosféru. Zahŕňa lety kozmických rakiet a
                    kozmických raketoplánov, ktoré štartujú s pomocou raketových motorov a pristávajú ako lietadlo, ale
                    aj kozmických sond a orbitálnych staníc. Kozmonautika obsahuje aj teóriu kozmických letov s
                    výpočtami dráh, technické riešenie kozmických rakiet, palív, systémov navádzania na dráhu, riadenia,
                    spojenia, komunikácie, spracúvania údajov, konštrukcie družíc a iných kozmických zariadení. Medzi
                    jej oblasti patrí aj problematika spojená s pobytom človeka v kozmickom priestore, vedecké a
                    výskumné programy v spojitosti s prieskumom kozmického priestoru okolo Zeme a okolo iných vesmírnych
                    telies, ako aj prieskum povrchu samotných vesmírnych telies. Nie je totožná s výskumom kozmického
                    priestoru a kozmických telies, keďže tento výskum je možné uskutočňovať aj zo zemského povrchu
                    pomocou teleskopov a iných zariadení. Pri každom experimente kozmonautiky ide o kozmický let. Termín
                    astronautika zodpovedá medzihviezdnym letom, kým kozmonautika letom do kozmického priestoru, napr.
                    na obežnú dráhu okolo Zeme alebo na Mesiac.

                    Teória kozmických letov zahŕňa výpočty letových parametrov, dosahovanie kozmických rýchlostí,
                    určenie elementov dráh, ich zmeny vyvolané prirodzeným pôsobením napr. atmosféry alebo umelým
                    pôsobením raketových motorov. Ďalej sem patrí výpočet životnosti umelých kozmických telies, výpočet
                    optimálnych dráh k planétam a iným telesám a zmeny dráh gravitačným pôsobením týchto telies.

                    Technika kozmických letov sa zaoberá najmä konštrukciou raketových motorov, ich jednotlivých
                    stupňov, zložením palív, spôsobom navedenia na obežnú dráhu, voľbou maximálneho preťaženia, spôsobmi
                    komunikácie, navigácie a riadenia letov. Ďalej sem patrí zabezpečenie orientácie v kozmickom
                    priestore, spojenia dvoch a viacerých kozmických lodí a orbitálnych staníc, technika návratu z
                    obežnej dráhy a spôsoby pristátia. Osobitnou kapitolou je zabezpečenie pobytu človeka v kozmickej
                    lodi. Od maximálneho preťaženia cez zvýšené nároky na stabilitu, hermetizácia, zásoby vzduchu, jedla
                    a vody až po etapu návratu (znesiteľná teplota, spôsoby brzdenia). Zložitou procedúrou je aj
                    navedenie kozmických sond na obežnú dráhu okolo iných kozmických telies, či prípadne pristátie na
                    ich povrchu a riadenie činnosti robotických povrchových častí týchto sond.
                </p>
            </section>
            <section class="front-page-section">
                <h1 class="main-heading">Krátka história</h1>
                <hr class="separator-line"/>
                <p>Za otca raketového výskumu je považovaný <strong>Konstantin Ciolkovskij</strong>. Ten v roku 1903
                    publikoval štúdiu Výskum vesmíru reaktívnymi prístrojmi. Rozvádza tu teórie o tom, že do vesmíru je
                    potrebné cestovať za pomoci raketového pohonu, nie spoliehať na lietadlá, ktoré by vo vákuu nemali
                    ani najmenšiu šancu. O niekoľko rokov neskôr sa k nemu s podobnými štúdiami pridávajú aj iní vedci z
                    odboru ako je <strong>Robert Goddard</strong> a <strong>Hermann Oberth</strong>. Hoci o sebe
                    nevedeli a nemohli svoje výskumy konzultovať, došli k úplne rovnakému záveru.
                    Éra výskumu vesmíru začala v roku 1957, keď bolo vo vtedajšom Sovietskom zväze vypustené prvé umelé
                    kozmické teleso Sputnik 1 na obežnú dráhu. Začal kozmický vek. O štyri roky neskôr sa stal Rus Jurij
                    Gagarin prvým človekom vo vesmíre a prezident Kennedy vyhlásil, že koncom desaťročia Spojené štáty
                    vyšlú človeka na Mesiac. V roku 1969 zemskou atmosférou preletela kozmická loď Apollo 11, pripevnená
                    ku doteraz najväčšiu rakete, a zamierila k Mesiacu.
                </p>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 d-flex justify-content-center text-center d-none d-lg-block img-container">
                            <img src="assets/ciolkovskij.jpg" alt="Ciolkovskij">
                            <div class="text-block">
                                <h6>Konstantin Ciolkovskij</h6>
                            </div>
                        </div>

                        <div class="col-lg-4 d-flex justify-content-center text-center d-none d-lg-block img-container">
                            <img src="assets/goddard.jpg" alt="Goddard">
                            <div class="text-block">
                                <h6>Robert Goddard</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-center text-center d-none d-lg-block img-container">
                            <img src="assets/Hermann_Oberth.jpg" alt="Oberth">
                            <div class="text-block">
                                <h6>Hermann Oberth</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<footer class="bg-light text-center text-lg-start">
    <p class="text-center p-3 footer-text">
        © 2021 Copyright &emsp; Vytvoril: Filip Sudora
    </p>
</footer>

</body>
</html>