<nav id="navbar" class="container-fluid navbar navbar-expand-lg">
    <div class="container-fluid text-center">
        <img src="./public/img/logoWhite.png" id="logo" alt="logo" class="logo sm-auto d-block">

        <!-- Esto se moverá a la derecha en escritorio -->
        <div class="d-none d-lg-block ms-auto">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="dropdown p-0">
                        <button style="background-color: transparent !important; padding: 0px !important;" class="btn dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="./public/img/Buttons/espana.svg" alt="Spain Flag"> <!-- Bandera de Argentina -->
                        </button>
                        <ul class="dropdown-menu mt-2" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item" href="index.php"><img class="me-2" src="./public/img/Buttons/espana.svg" alt="Argentina Flag">Español</a></li>
                            <li><a class="dropdown-item" href="en/index.php"><img class="me-2" src="./public/img/Buttons/eeuu.svg" alt="USA Flag"> English</a></li> <!-- Bandera de Estados Unidos con enlace a la versión en inglés -->
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link textoNav" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link textoNav" href="acercaDeMi.php">SOBRE MI</a>
                </li>
                <li class="nav-item dropdown" id='dmenu'>
                    <a class="nav-link" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="textoNav">GALERÍA</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: var(--color2) !important">
                        <a class="dropdown-item" id="itemDropdown" style="color: #ffff;" href="galeria1.php">ACERO DAMASCO</a>
                        <a class="dropdown-item" id="itemDropdown" style="color: #ffff;" href="galeria2.php">MONOACERO</a>
                        <a class="dropdown-item" id="itemDropdown" style="color: #ffff;" href="galeria3.php">SAN MAI</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link textoNav" href="contacto.php">CONTACTO</a>
                </li>
            </ul>
        </div>
        <!-- Fin de la sección movida a la derecha -->

        <!-- Botón del menú para dispositivos móviles -->
        <button class="btnMenu d-md-none ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
            <img class="menu" src="./public/img/Buttons/menu.png" alt="Menu"></img>
        </button>

        <!-- Menú offcanvas para dispositivos móviles -->
        <div class="offcanvas offcanvas-end d-xxl-none d-xl-none" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="background: var(--color1);">
            <div class="offcanvas-header">
                <button class="ms-2" type="button" data-bs-dismiss="offcanvas" aria-label="Close" style="background:none; border:none;">
                    <i class="fa-solid fa-circle-chevron-left mt-4" id="btn_atras"></i>
                </button>
            </div>
            <div class="offcanvas-body d-block d-lg-none text-start">
                <ul class="container navbar-nav me-auto ps-3">
                    <li class="nav-item animate__animated animate__backInRight animate__delay-1s animate__fast">
                        <a class="nav-link textCanvas" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item animate__animated animate__backInRight animate__delay-1s animate__fast">
                        <a class="nav-link textCanvas" href="acercaDeMi.php">SOBRE MÍ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link textoNav textCanvas animate__animated animate__backInRight animate__delay-1s animate__fast" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">GALERÍA
                        </a>
                        <div class="dropdown-menu dropdownCanvas" aria-labelledby="navbarDropdown" style="background-color: var(--color2) !important">
                            <a class="dropdown-item animate__animated animate__backInRight animate__fast" id="itemDropdown" style="color: var(--link)" href="galeria1.php">ACERO DAMASCO</a>
                            <a class="dropdown-item animate__animated animate__backInRight animate__fast" id="itemDropdown" style="color: var(--link)" href="galeria2.php">MONOACERO</a>
                            <a class="dropdown-item animate__animated animate__backInRight animate__fast" id="itemDropdown" style="color: var(--link)" href="galeria3.php">SAN MAI</a>
                        </div>
                    </li>
                    <li class="nav-item animate__animated animate__backInRight animate__delay-1s animate__fast">
                        <a class="nav-link textCanvas" href="contacto.php">CONTACTO</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown p-0">
                            <button style="background-color: transparent !important; padding: 0px !important;" class="btn dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="./public/img/Buttons/espana.svg" alt="Spain Flag"> <!-- Bandera de Argentina -->
                            </button>
                            <ul class="dropdown-menu mt-2" aria-labelledby="languageDropdown">
                                <li><a class="dropdown-item" href="index.php"><img class="me-2" src="./public/img/Buttons/espana.svg" alt="Argentina Flag">Español</a></li>
                                <li><a class="dropdown-item" href="en/index.php"><img class="me-2" src="./public/img/Buttons/eeuu.svg" alt="USA Flag"> English</a></li> <!-- Bandera de Estados Unidos con enlace a la versión en inglés -->
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Fin del menú offcanvas -->
    </div>
</nav>