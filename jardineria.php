<?php 

require 'php/config.php';

$db = new Database();
$con = $db->conectar();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
        <link rel="icon" type="image/png" sizes="128x128"  href="img/favicon.ico">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/css.css">

        <title>Ferre Seibo - jardinería</title>
    </head>
<body>
    
<?php include 'menu.php'; ?>

   <div class="banner-especial -1r">
   <a href="http://www.pinturastropical.com.do/site/?page_id=165" target="_blank"><img class="img-responsive vdk" src="img/jardineria.png" alt="Pintura" width="100%" height="auto" ></a> 
    </div>
   <section class="product02"> 
    <div class="container-products" id="product-container">
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                  <a href="acople.html"> <img src="img/alambrepua.jpg" alt="Alambre D/Puas Kinnox 250mts"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 2,091.71</p>
                   <a href="acople.html"><h3>Alambre D/Puas Kinnox 250mts</h3> </a> 
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="rotomartillo.html"><img src="img/aspersor3b.jpg" alt="Aspersor Best Value 3 Brazos"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 238.40</p>
                    <a href="rotomartillo.html"> <h3>Aspersor Best Value 3 Brazos</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="magnetic.html"><img src="img/aspersormetalico.jpg" alt="Aspersor Metalico Santul"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 539.49</p>
                    <a href="magnetic.html"> <h3>Aspersor Metalico Santul</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="universal.html"><img src="img/aspersorplastico.jpg" alt="Aspersor Plastico Santul"></a>
                   
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 324.29</p>
                    <a href="universal.html"><h3>Aspersor Plastico Santul</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="cubomecanico.html"><img src="img/aspersornegro.jpg" alt="Aspersor Plastico V/Colores-Negro"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 38.83</p>
                    <a href="cubomecanico.html"><h3>Aspersor Plastico V/Colores-Negro</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatecurvo.html"><img src="img/aspersorpretul.jpg" alt="Aspersor Pretul 20065 3 Brazos Plastico"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 182.00</p>
                    <a href="alicatecurvo.html"><h3>Aspersor Pretul 20065 3 Brazos Plastico</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicateirwin.html"><img src="img/aspersortruper.jpg" alt="Aspersor Truper C/Estaca Asp-11"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 653.89</p>
                    <a href="alicateirwin.html"><h3>Aspersor Truper C/Estaca Asp-11</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="pinzatruper.html"><img src="img/Vonder.webp" alt="Carretel Comp. P/Cortadora Vonder"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 904.79<span></p>
                    <a href="pinzatruper.html"><h3>Carretel Comp. P/Cortadora Vonder</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatevikingo.html"> <img src="img/carretillaroja.jpg" alt="Carretilla Truper Roja Aire 6 G/Solido"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 7,590.00</p>
                    <a href="alicatevikingo.html"><h3>Carretilla Truper Roja Aire "6" G/Solido</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="electruper.html"><img src="img/cavadoracoa.png" alt="Cavadora (Coa Doble) Vikingo C/Mango"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 1,262.43</p>
                    <a href="electruper.html"><h3>Cavadora (Coa Doble) Vikingo C/Mango</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="conforttruper.html"><img src="img/coabellota.jpg" alt="Coa Bellota 5651-E"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 737.36</p>
                    <a href="conforttruper.html"><h3>Coa Bellota 5651-E</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatepretul.html"><img src="img/escobavonder22.jpg" alt="Escoba Plast D/Jardin Vonder 22 Dientes"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 485.54</p>
                    <a href="alicatepretul.html"><h3>Escoba Plast D/Jardin Vonder 22 Dientes</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatepretul.html"><img src="img/escobavonder26.jpg" alt="Escoba Plast D/Jardin Vonder 26 Dientes"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 713.70</p>
                    <a href="alicatepretul.html"><h3>Escoba Plast D/Jardin Vonder 26 Dientes</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatepretul.html"><img src="img/escoba-metalica.jpg" alt="Escoba Truper P/Jardin Metal C/M Em-22"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 301.60</p>
                    <a href="alicatepretul.html"><h3>Escoba Truper P/Jardin Metal C/M Em-22</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatepretul.html"><img src="img/escoba-metalica.jpg" alt="Escoba Truper P/Jardin Plast C/Mango"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 331.50</p>
                    <a href="alicatepretul.html"><h3>Escoba Truper P/Jardin Plast C/Mango</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
</section>
   <section class="paginacion">
    <ul>
        <li><a href="jardineria.html" class="active">1</a></li>
        <li><a href="jardineriapag2.html">2</a></li>
        <li><a href="jardineriapag3.html">3</a></li>
        <li><a href="jardineriapag4.html">4</a></li>
        
    </ul>
</section>

<?php include 'footer.php'; ?>

   <script src="js/script.js"></script>

<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>