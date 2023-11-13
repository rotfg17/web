

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <link rel="icon" type="image/png" sizes="128x128"  href="../img/favicon.ico">
        <meta name="author" content="" />
        <title>Dashboard - Ferre Seibo</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="<?php echo ADMIN_URL;?>css/styles.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-warning-1">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-5" href="index.php"><i class="fa-solid fa-screwdriver-wrench"></i> Ferre Seibo</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-lg order-1 order-lg-0 me-4 me-lg-0 " id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form action="buscar.php" method="GET" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input id="search"class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Configuración</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                       
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" >
                    <div class="sb-sidenav-menu bg-warning-1">
                        <div class="nav">
                            <a class="nav-link" href="<?php echo ADMIN_URL;?>configuracion">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-gears"></i></div>
                                Configuración
                            </a>

                            <a class="nav-link" href="<?php echo ADMIN_URL;?>categorias">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-folder"></i></div>
                                Categorías
                            </a>

                            <a class="nav-link collapsed" href="<?php echo ADMIN_URL;?>productos">
                                <div class="sb-nav-link-icon"><i class="fa-brands fa-shopify"></i></div>
                                Productos
                            </a>
                            <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fa-brands fa-shopify"></i></div>
                                Productos por categorías
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="<?php echo ADMIN_URL;?>acce_bano">Accesorios de baño</a>
                                    <a class="nav-link" href="<?php echo ADMIN_URL;?>prod_cate"">Accesorios de pintura</a>
                                    <a class="nav-link" href="password.html">Agregados</a>
                                    <a class="nav-link" href="login.html">Cerrajería</a>
                                    <a class="nav-link" href="register.html">Contrucción ligera</a>
                                    <a class="nav-link" href="password.html">Ebanisteria</a>
                                    <a class="nav-link" href="login.html">Electricidad</a>
                                    <a class="nav-link" href="register.html">Herramientas</a>
                                    <a class="nav-link" href="password.html">Herreria</a>
                                    <a class="nav-link" href="login.html">Jardineria</a>
                                    <a class="nav-link" href="register.html">Madera</a>
                                    <a class="nav-link" href="password.html">Pintura</a>
                                    <a class="nav-link" href="login.html">Pinturas king</a>
                                    <a class="nav-link" href="register.html">Plomeria</a>
                                    <a class="nav-link" href="password.html">Productos generales</a>
                                    <a class="nav-link" href="login.html">Quimicos</a>
                                    <a class="nav-link" href="register.html">Refrigeración</a>
                                    </a>
                                </nav>
                            </div>

                            <a class="nav-link" href="<?php echo ADMIN_URL;?>clientes">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-headset"></i></div>
                                Gestión de clientes
                            </a>

                            <a class="nav-link" href="<?php echo ADMIN_URL;?>pagos">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-wallet"></i></div>
                                Pagos
                            </a>

                            <a class="nav-link" href="<?php echo ADMIN_URL;?>pedidos">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                                Pedidos
                            </a>

                            <a class="nav-link" href="<?php echo ADMIN_URL;?>usuarios">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-user"></i></div>
                                Usuarios
                            </a>

                            <a class="nav-link" href="<?php echo ADMIN_URL;?>blogs">
                                <div class="sb-nav-link-icon"><i class="fa-brands fa-blogger"></i></div>
                                Blogs
                            </a>

                            
                          <!--  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                        </div>
                    </div>-->
                    <div class="sb-sidenav-footer">
                        <div class="small">Conectado como:</div>
                        <?php if(isset($_SESSION['user_id'])) { ?>
               <?php echo $_SESSION['user_name']; ?></h2></a>
               
               <?php } ?>
                       
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">