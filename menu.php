<?php


?>

<div class="sidebar">
    <div class="hdn-head">
        <?php if (isset($_SESSION['user_id'])) { ?>
            <h2><i class="fa-solid fa-circle-user"></i> Hola, <?php echo $_SESSION['user_name']; ?></h2></a>

        <?php } else { ?>
            <h2><a href="login.php" class="ca"><i class="fa-solid fa-circle-user"></i> Iniciar sesión</a></h2>

        <?php } ?>
    </div>
    <div class="hdn-content">
        <h3>Todas las categorías</h3>
        <ul>
            <div>
                <a href="herraminetas.php">
                    <li>Herramientas</li>
                </a><i class="fa-solid fa-angle-right"></i>
            </div>
            <div>
                <a href="herreria.php">
                    <li>Herreria</li>
                </a><i class="fa-solid fa-angle-right"></i>
            </div>
            <div>
                <a href="jardineria.php">
                    <li>Jardinería</li>
                </a><i class="fa-solid fa-angle-right"></i>
            </div>
            <div>
                <a href="quimico.php">
                    <li>Químico</li>
                </a><i class="fa-solid fa-angle-right"></i>
            </div>
            <div>
                <a href="madera.php">
                    <li>Madera</li>
                </a><i class="fa-solid fa-angle-right"></i>
            </div>
            <div>
                <a href="refrigeracion.php">
                    <li>Refrigeración</li>
                </a> <i class="fa-solid fa-angle-right"></i>
            </div>

            <div>
                <a href="pintura.php">
                    <li>Pintura</li>
                </a><i class="fa-solid fa-angle-right"></i>
            </div>

            <div>
                <a href="pinturasking.php">
                    <li>Pinturas King</li>
                </a><i class="fa-solid fa-angle-right"></i>
            </div>

            <div>
                <a href="ebanisteria.php">
                    <li>Ebanisteria</li>
                </a><i class="fa-solid fa-angle-right"></i>
            </div>
            <div>
                <a href="plomeria.php">
                    <li>Plomería</li>
                </a><i class="fa-solid fa-angle-right"></i>
            </div>
            <div>
                <a href="cerrajeria.php">
                    <li>Cerrajería</li>
                </a><i class="fa-solid fa-angle-right"></i>
            </div>
            <div>
                <a href="accesoriosbano.php">
                    <li>Accesorios de Baño</li>
                </a><i class="fa-solid fa-angle-right"></i>
            </div>

            <div>
                <a href="construccion.php">
                    <li>Construcción Ligera</li>
                </a><i class="fa-solid fa-angle-right"></i>
            </div>
            <div>
                <a href="agregados.php">
                    <li>Agregados</li>
                </a><i class="fa-solid fa-angle-right"></i>
            </div>
            <div>
                <a href="accesoriospintura.php">
                    <li>Accesorios de Pintura</li>
                </a><i class="fa-solid fa-angle-right"></i>
            </div>
            <div>
                <a href="generales.php">
                    <li>Productos Generales</li>
                </a><i class="fa-solid fa-angle-right"></i>
            </div>
            <div>
                <a href="electricidad.php">
                    <li>Electricidad</li>
                </a><i class="fa-solid fa-angle-right"></i>
            </div>

            <?php if (isset($_SESSION['user_id'])) { ?>
                <div>
                    <h2><a href="logout.php" class="ca">Cerrar sesion <i class="fa-solid fa-arrow-right-from-bracket"></i></a></h2>

                <?php } else { ?>
                </div>
            <?php } ?>
        </ul>
    </div>
</div>
<i class="fa-solid fa-xmark"></i>

<div class="black"></div>
<header>
    <div class="first">
        <div class="flex logo">
            <a href="index.php"><img src="img/Logo.png"></a>
        </div>
        <div class="flex input">
            <input type="text" placeholder="Buscar">
            <i class="fas fa-search"></i>
        </div>
        <div class="flex right">

            <div class="flex cart">
                <a href="checkout.php" class="btn btn-warning"><i class="fas fa-shopping-cart"></i>Carrito
                    <p id="num_cart"><?php echo $num_cart; ?></p>
                </a>
            </div>

            <a class="nav-icon position-relative text-decoration-none btn btn-warning mb-2 p-1" href="wishlist.php">
                <i class="fas fa-fw fa-heart text-dark mr-1"></i>
                <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill text-white" id="num_whislist" id="btnCantidadDeseo"><?php echo $num_whislist; ?></span>
            </a>

            <div class="sign">
                <div class="flex ac">


                    <?php if (isset($_SESSION['user_id'])) { ?>

                        <div class="dropdown">

                            <button class="btn btn-warning  dropdown-toggle" type="button" id="btn_session" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-circle-user"></i> <?php echo $_SESSION['user_name']; ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btn_session">
                                <li><a class="dropdown-item" href="logout.php">Mi cuenta</a></li>
                                <li><a class="dropdown-item" href="compras.php">Mis pedidos</a></li>
                                <li><a class="dropdown-item" href="lista_deseo.php">Lista de deseos</a></li>
                                <hr>
                                <li><a class="dropdown-item" href="#">Configuración</a></li>
                                <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>

                            </ul>
                        </div>

                    <?php } else { ?>

                        <a href="login.php" class="btn btn-warning"><i class="fa-solid fa-circle-user"></i> Ingresar</a>

                    <?php } ?>

                    </span>
                    </button>
                </div>

            </div>

        </div>
    </div>
    <div class="second">
        <div class="second-1">
            <div>
                <i class="fas fa-bars"></i>
                <p class="menu-icon">Menú</p>
                <span>Todas las categorías</span>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
        </div>
        <div class="second-2">
            <ul>
                <i class="fa-solid fa-headset"></i>
                <a href="tel:8095523071" target="_blank">
                    <li>Servicio al cliente</li>
                </a>
                <i class="fa-solid fa-book-open"></i>
                <a href="blog.php">
                    <li>Blogs</li>
                </a>
                <i class="fa-solid fa-phone"></i>
                <a href="contactanos.php">
                    <li>Contacto</li>
                </a>
            </ul>
        </div>
    </div>
</header>