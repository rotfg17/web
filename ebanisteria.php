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

   <div class="banner-especial -1r">
   <a href="http://www.pinturastropical.com.do/site/?page_id=165" target="_blank"><img class="img-responsive vdk" src="img/Ebanistería.png" alt="Pintura" width="100%" height="auto" ></a> 
    </div>
   <section class="product02"> 
    <div class="container-products" id="product-container">
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                  <a href="acople.html"> <img src="img/barnizcaoba1-4.png" alt="Barniz Natural Gl Tropical"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 995.00</p>
                   <a href="acople.html"><h3>Barniz Natural Gl Tropical</h3> </a> 
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="rotomartillo.html"><img src="img/Tubular.PNG" alt="Cerradura Tubular Negro New Prof Np-2030 Np-230"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 500.50</p>
                    <a href="rotomartillo.html"> <h3>Cerradura Tubular Negro New Prof Np-2030 Np-230</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="magnetic.html"><img src="https://www.ochoa.com.do/media/product/IMG_97984.JPG" alt="Cola 8 Onz. Universal Poliuretano"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 413.88</p>
                    <a href="magnetic.html"> <h3>Cola 8 Onz. Universal Poliuretano</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="universal.html"><img src="https://fesa.do/wp-content/uploads/2022/04/item-145-1.jpg" alt="Cola Amar 1/2 Gl Univ A"></a>
                   
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 708.70</p>
                    <a href="universal.html"><h3>Cola Amar 1/2 Gl Univ A</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="cubomecanico.html"><img src="https://martur.do/wp-content/uploads/2023/09/item-138-1-1-1-1-1-1.jpg" alt="Cola Amar 16 Onz Univ A"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 244.42</p>
                    <a href="cubomecanico.html"><h3>Cola Amar 16 Onz Univ A</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatecurvo.html"><img src="https://martur.do/wp-content/uploads/2023/09/item-139-1-1-1-1-1-1.jpg" alt="Cola Amar 32 Onz Universal A"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 517.83</p>
                    <a href="alicatecurvo.html"><h3>Cola Amar 32 Onz Universal A</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicateirwin.html"><img src="https://martur.do/wp-content/uploads/2023/09/item-139-1-1-1-1-1-1.jpg" alt="Cola Amar 4 Onz Univ A"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 110.44</p>
                    <a href="alicateirwin.html"><h3>Cola Amar 4 Onz Univ A</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="pinzatruper.html"><img src="https://ferreteriacima.com.do/cdn/shop/products/718594050584_400x.jpg?v=1619101638" alt="Cola Amar 4 Onz Wa 505-8"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 111.05<span></p>
                    <a href="pinzatruper.html"><h3>Cola Amar 4 Onz Wa 505-8</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatevikingo.html"> <img src="https://www.innovacentro.com.do/product/image/medium/003740_0.jpg" alt="Cola Amar 8 Onz Lanco Wa-505-7 A"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 177.33</p>
                    <a href="alicatevikingo.html"><h3>Cola Amar 8 Onz Lanco Wa-505-7 A</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="electruper.html"><img src="https://fesa.do/wp-content/uploads/2022/04/item-143-1.jpg" alt="Cola Amar 8 Onz Universal A"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 138.67</p>
                    <a href="electruper.html"><h3>Cola Amar 8 Onz Universal A</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="conforttruper.html"><img src="https://fesa.do/wp-content/uploads/2022/04/item-145-1.jpg" alt="Cola Amar Gl Univ A"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 1,282.42</p>
                    <a href="conforttruper.html"><h3>Cola Amar Gl Univ A</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatepretul.html"><img src="https://assets-ferremix.tiendagoshop.com/rails/active_storage/representations/proxy/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBBa0lyIiwiZXhwIjpudWxsLCJwdXIiOiJibG9iX2lkIn19--55830c037055a82ae138de9021030cc75d6467c4/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJY0c1bkJqb0dSVlE2QzNKbGMybDZaVWtpRERVME1IZzNOakFHT3daVU9nOWlZV05yWjNKdmRXNWtTU0lKYm05dVpRWTdCbFE2REdkeVlYWnBkSGxKSWd0alpXNTBaWElHT3daVU9ndGxlSFJsYm5SQUJ6b0pZM0p2Y0VraUVEVTBNSGczTmpBck1Dc3dCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--6acef44bd344055fd9c237e0ca7d42e2e7a58baf/Cola%20Universal%202.png" alt="Cola Amarilla Univ Detalle"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 66.26</p>
                    <a href="alicatepretul.html"><h3>Cola Amarilla Univ Detalle</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatepretul.html"><img src="https://canoindustrial.com/canoind/wp-content/uploads/2020/11/cola-blanca-301-silbond-Cano.jpg" alt="Cola Blanca Silbond 301 32oz Fl"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 179.76</p>
                    <a href="alicatepretul.html"><h3>Cola Blanca Silbond 301 32oz Fl</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatepretul.html"><img src="https://fontanasrl.odoo.com/web/image/product.product/18578/image_1024/%5B1720%5D%20CORREDERAS%20PUSH%20EXT%20TOTAL%20400MM%2016%27%27?unique=80882a3" alt="Corred Full Ext Push 16 New Prof"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 403.00</p>
                    <a href="alicatepretul.html"><h3>Corred Full Ext Push 16" New Prof</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <a href="alicatepretul.html"><img src="https://assets-ferremix.tiendagoshop.com/rails/active_storage/representations/proxy/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBBcm90IiwiZXhwIjpudWxsLCJwdXIiOiJibG9iX2lkIn19--e87d2432609af4f71a71b61506a4411cdf3cbc42/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJY0c1bkJqb0dSVlE2QzNKbGMybDZaVWtpRGpFd01EQjRNVEF3TUFZN0JsUTZER2R5WVhacGRIbEpJZ3RqWlc1MFpYSUdPd1pVT2d0bGVIUmxiblJBQnpvSlkzSnZjRWtpRWpFd01EQjRNVEF3TUNzd0t6QUdPd1pVT2c5aVlXTnJaM0p2ZFc1a1NTSUpibTl1WlFZN0JsUT0iLCJleHAiOm51bGwsInB1ciI6InZhcmlhdGlvbiJ9fQ==--1f7eadae8e3ddef12e0d4863530d14f5465df1ce/13339.png" alt="Corred Full Ext Push 18 New Prof"></a>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">RD$ 435.50</p>
                    <a href="alicatepretul.html"><h3>Corred Full Ext Push 18" New Prof</h3></a>
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                </div>
            </div>
        </div>
</section>
   <section class="paginacion">
    <ul>
        <li><a href="ebanisteria.html" class="active">1</a></li>
        <li><a href="ebanisteriapag2.html">2</a></li>
        <li><a href="ebanisteriapag3.html">3</a></li>
        <li><a href="ebanisteriapag4.html">4</a></li>
        
    </ul>
</section>

<?php include 'footer.php'; ?>

   <script src="js/script.js"></script>

<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>