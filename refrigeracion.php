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
   <img class="img-responsive vdk" src="img/refrigeracion.png" alt="Pintura" width="100%" height="auto" >
    </div>
   <section class="product02"> 
    <div class="container-products" id="product-container">
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                  <a href="acople.html"> <img src="https://www.ochoa.com.do/media/product/6655871.jpg" alt="Bandeja Grande Atlas 9 15230"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 32.10</p>
                   <a href="acople.html"><h3>Cola Plast P/Freg 1-1/2*8 Eastman</h3> </a> 
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="rotomartillo.html"><img src="https://ochoa.com.do/media/product/_MG_0031_copy.jpg" alt="Bandeja P/Pintar Atlas Negra "></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 84.49</p>
                    <a href="rotomartillo.html"> <h3>Filtro P/Nevera 15 Gramos 1/4</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="magnetic.html"><img src="https://http2.mlstatic.com/D_NQ_NP_893272-MLV41711511524_052020-O.webp" alt="Bandeja Vonder P/Pintar"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 93.84</p>
                    <a href="magnetic.html"> <h3>Filtro P/Nevera 25 Gramos 1/4</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="universal.html"><img src="https://ochoa.com.do/media/product/IMG_91811.JPG" alt="Brocha Atlas 1 Marron"></a>
                   
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 358.80</p>
                    <a href="universal.html"><h3>Filtro Roscable Azul P/Refrige</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="cubomecanico.html"><img src="https://s3.us-east-2.amazonaws.com/mgpanel/1692130589695_9171-817-865-b130-TBc.jpg" alt="Brocha Atlas 1/2 Marron"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 1,529.99</p>
                    <a href="cubomecanico.html"><h3>Protector A/A Y Refr. Avek 120v-12000b</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatecurvo.html"><img src="https://s3.us-east-2.amazonaws.com/mgpanel/1692130703255_5920-979-865-b130-fTW.jpg" alt="Brocha Atlas 1-1/2 Marron"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 1,607.90</p>
                    <a href="alicatecurvo.html"><h3>Protector A/A Y Refr. Avek 220v-48000b</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicateirwin.html"><img src="https://ochoa.com.do/media/product/WhatsApp_Image_2021-09-22_at_2_48_51_PM.jpg" alt="Brocha Atlas 2 Marron"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 609.61</p>
                    <a href="alicateirwin.html"><h3>Protector P/Nevera Fermetal</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="pinzatruper.html"><img src="https://procontratista.com/wp-content/uploads/2020/09/AGAINA06.png" alt="Brocha Atlas 2-1/2 Marron"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 812.50<span></p>
                    <a href="pinzatruper.html"><h3>Refrigerante 410 R-Harto</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatevikingo.html"> <img src="https://m.media-amazon.com/images/I/61m6QJpNyhL._AC_SL1200_.jpg" alt="Brocha Atlas 3 Marron"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 555.75</p>
                    <a href="alicatevikingo.html"><h3>Switch P/Bomba Presion D/Aire Braddy</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="electruper.html"><img src="https://m.media-amazon.com/images/I/81Kz2dPgJDL._AC_SL1500_.jpg" alt="Brocha Atlas 3/4 Marron"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 108.45</p>
                    <a href="electruper.html"><h3>Tuberia De Cobre 1/2*50 Pies</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="conforttruper.html"><img src="https://www.ochoa.com.do/media/product/656589824.jpg" alt="Brocha Atlas 4 Marron"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 5,422.83</p>
                    <a href="conforttruper.html"><h3>Tuberia De Cobre 1/2*50 Pies Roll</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatepretul.html"><img src="https://www.ochoa.com.do/media/product/656589824.jpg" alt="Brocha Atlas 5"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 88.00</p>
                    <a href="alicatepretul.html"><h3>Tuberia De Cobre 1/4*50 Pies</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatepretul.html"><img src="https://www.ochoa.com.do/media/product/656589824.jpg" alt="Brocha B&P De 1 M/Marron"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 4,399.99</p>
                    <a href="alicatepretul.html"><h3>Tuberia De Cobre 1/4*50 Pies Roll</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatepretul.html"><img src="https://www.ochoa.com.do/media/product/656589824.jpg" alt="Brocha B&P De 1 M/Marron"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 1,500.00</p>
                    <a href="alicatepretul.html"><h3>Tuberia De Cobre 3/16*50 Pies Roll</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatepretul.html"><img src="https://www.ochoa.com.do/media/product/656589824.jpg" alt="Brocha Costa Master 1-1/2"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 3,577.61</p>
                    <a href="alicatepretul.html"><h3>Tuberia De Cobre 3/8*50 Pies Roll</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatepretul.html"><img src="https://www.ochoa.com.do/media/product/656589824.jpg" alt="Brocha Costa Master 1-1/2"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 3,262.50</p>
                    <a href="alicatepretul.html"><h3>Tuberia De Cobre 5/16*50 Pies Roll</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
</section>
   <section class="paginacion">
    <ul>
        <li><a href="refrigeracion.html"class="active">1</a></li>
        
        
    </ul>
</section>

<?php include 'footer.php'; ?>

   <script src="js/script.js"></script>

<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>