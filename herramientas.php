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

        <title>Ferre Seibo - Agregados</title>
    </head>
<body>
    
<?php include 'menu.php'; ?>


   <section class="product02"> 
    <div class="container-products" id="product-container">
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                  <a href="acople.html"> <img src="img/acople-27029.jpg" alt="acople"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 165.60</p>
                   <a href="acople.html"><h3>ACOPLE RAPD. MACHO PETRUL "1/4" 27029</h3> </a> 
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="rotomartillo.html"><img src="img/ROTOMARTILLO.webp" alt="rotomartillo"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$184.38</p>
                    <a href="rotomartillo.html"> <h3>ADAPT P/ROTOMARTILLO HEX TOLSEN 1/4</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="magnetic.html"><img src="img/AA.webp" alt="P/TALADRO"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$146.25</p>
                    <a href="magnetic.html"> <h3> ADAPT P/TALADRO HEX TOLSEN 1/4</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="universal.html"><img src="img/universaljoint2.jpg" alt="ADAPTADOR TOLSEN UNIVERSAL"></a>
                   
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$92.43</p>
                    <a href="universal.html"><h3>ADAPT UNIVERSAL JOINT</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="cubomecanico.html"><img src="img/CUBOMECANICO.jpg" alt="Cubo Mecanico"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$125.31</p>
                    <a href="cubomecanico.html"><h3>ADPT CUBO MECANICO TRUPER</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatecurvo.html"><img src="img/alicate-cuervo.webp" alt="alicate curvo"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$304.51</p>
                    <a href="alicatecurvo.html"><h3> ALICATE D/PRESION CURVO</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicateirwin.html"><img src="img/irwin.webp" alt="Alicate de presion irwin"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$1,000.614</p>
                    <a href="alicateirwin.html"><h3>ALICATE D/PRESION IRWIN 10"</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="pinzatruper.html"><img src="img/pinzatruper.jpg" alt="destornilladores"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$426.40<span></p>
                    <a href="pinzatruper.html"><h3> ALICATE D/PRESION RECTO TRUPER 10"</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatevikingo.html"> <img src="img/vikingo.jpg" alt="alicate de presion vikingo"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$241.22</p>
                    <a href="alicatevikingo.html"><h3>ALICATE D/PRESION VIKINGO CURVO</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="electruper.html"><img src="img/elect.jpg" alt="pinza electrica truper"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$339.68</p>
                    <a href="electruper.html"><h3>ALICATE ELECTRICO TRUPER</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="conforttruper.html"><img src="img/confort.jpg" alt="ALICATE ELECTRICO TRUPER CONFORT"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$457.60</p>
                    <a href="conforttruper.html"><h3>ALICATE ELECTRICO TRUPER COMFORT</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatepretul.html"><img src="img/pretul.jpg" alt="pinza electrica pretul"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$201.50</p>
                    <a href="alicatepretul.html"><h3> ALICATE ELECT 8" PRETUL</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
</section>
   <section class="paginacion">
    <ul>
        <li><a href="herraminetas.html" class="active">1</a></li>
        <li><a href="pagina2.html">2</a></li>
        <li><a href="pagina3.html">3</a></li>
        <li><a href="pagina4.html">4</a></li>
        <li><a href="pagina5.html">5</a></li>
    </ul>
</section>

<?php include 'footer.php'; ?>

   <script src="js/script.js"></script>

<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>