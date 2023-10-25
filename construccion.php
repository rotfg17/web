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

        <title>Ferre Seibo - Construccion Ligera</title>
    </head>
<body>
   
    <?php  include 'menu.php'; ?>

   <div class="banner-especial -1r">
   <img class="img-responsive vdk" src="img/construccion.png" alt="Pintura" width="100%" height="auto" >
    </div>
   <section class="product02"> 
    <div class="container-products" id="product-container">
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                  <a href="acople.html"> <img src="https://www.ochoa.com.do/media/product/angular-galvanizado-de-dos-cuarentayocho-ocho-abajo-removebg-preview_(1)_-_copia.png" alt="Aluzinc Acan Nat Cal.26 4*20"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 105.33</p>
                   <a href="acople.html"><h3>Angular D/Metal Blanco</h3> </a> 
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="rotomartillo.html"><img src="https://ochoa.com.do/media/product/04-52-0528.JPG" alt="Bandeja P/Pintar Atlas Negra "></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 921.47</p>
                    <a href="rotomartillo.html"> <h3>Caja D/Masilla P/Sheetrock High Pro</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="magnetic.html"><img src="https://www.ochoa.com.do/media/product/IMG_8806.JPG" alt="Bandeja Vonder P/Pintar"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 121.98</p>
                    <a href="magnetic.html"> <h3>Canal/Durmiente P/Sheet Rock 1-5/8x10</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="universal.html"><img src="https://www.ochoa.com.do/media/product/IMG_8806.JPG" alt="Brocha Atlas 1 Marron"></a>
                   
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 160.88</p>
                    <a href="universal.html"><h3>Canal/Durmiente P/Sheet Rock 2-1/2"X10</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="cubomecanico.html"><img src="https://ochoa.com.do/media/product/clavo-con-arandela-de-1_(2).jpg" alt="Brocha Atlas 1/2 Marron"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 5.96</p>
                    <a href="cubomecanico.html"><h3>Clavo C/Arandela P/Sheetrock</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatecurvo.html"><img src="https://ochoa.com.do/media/product/clavo-con-arandela-de-1_(2).jpg" alt="Brocha Atlas 1-1/2 Marron"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 596.69</p>
                    <a href="alicatecurvo.html"><h3>Clavo C/Arandela P/Sheetrock Cien</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicateirwin.html"><img src="https://www.ochoa.com.do/media/product/crossTee3.jpg" alt="Brocha Atlas 2 Marron"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 29.33</p>
                    <a href="alicateirwin.html"><h3>Cross Tee P/Sheet Rock 2”</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="pinzatruper.html"><img src="https://www.ochoa.com.do/media/product/crossTee3.jpg" alt="Brocha Atlas 2-1/2 Marron"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 58.71<span></p>
                    <a href="pinzatruper.html"><h3>Cross Tee P/Sheet Rock 4”</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatevikingo.html"> <img src="https://ochoa.com.do/media/product/04-52-0528.JPG" alt="Brocha Atlas 3 Marron"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 1,508.99</p>
                    <a href="alicatevikingo.html"><h3>Cub Masilla P/Sheet Rock-High Pro</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="electruper.html"><img src="https://procontratista.com/wp-content/uploads/2020/09/19293020200909145130CESPRO03.jpg" alt="Brocha Atlas 3/4 Marron"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 289.00</p>
                    <a href="electruper.html"><h3>Esquinero "J" P/Sheet Rock 1/2*10</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="conforttruper.html"><img src="https://www.ochoa.com.do/media/product/01-19-112.JPG" alt="Brocha Atlas 4 Marron"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 98.49</p>
                    <a href="conforttruper.html"><h3>Esquinero 3cmx10' D/Metal P/Sheet Rock</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatepretul.html"><img src="https://supermastick.com/assets/productos/masilla.jpg" alt="Brocha Atlas 5"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 522.25</p>
                    <a href="alicatepretul.html"><h3>Gl Masilla P/Sheet Rock-Supermastick</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatepretul.html"><img src="https://procontratista.com/wp-content/uploads/2020/09/paral-1-5_8_-x-1-1_4_-x-3.05m-cal.26-1.jpg" alt="Brocha B&P De 1 M/Marron"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 150.64</p>
                    <a href="alicatepretul.html"><h3>Paral P/Sheet Rock 1-5/8x10”</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatepretul.html"><img src="https://ochoa.com.do/media/product/250mm-White-Color-PVC-Faux-Plafond-Cielo-Raso-En-PVC-Blanco1.jpg" alt="Brocha B&P De 1 M/Marron"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 201.61</p>
                    <a href="alicatepretul.html"><h3>Plafond Pvc Blanco 24"X48"X7mm</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatepretul.html"><img src="https://procontratista.com/wp-content/uploads/2020/09/19422820200909144605CPYCYC01.png" alt="Brocha Costa Master 1-1/2"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 1,990.12</p>
                    <a href="alicatepretul.html"><h3>Plancha D/Sheetrock P/Exter Knauf</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
</section>
   <section class="paginacion">
    <ul>
        <li><a href="construccion.html"class="active">1</a></li>
        <li><a href="construccionpag2.html">2</a></li>
        
        
    </ul>
</section>

<?php include 'footer.php'; ?>

   <script src="js/script.js"></script>

<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>