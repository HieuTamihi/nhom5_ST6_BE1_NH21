<?php
session_start();
include "headeruser.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>



    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row"><?php
                                $getOrderByOrderID = $order->getOrderByOrderID($_GET['order_id']);
                                foreach ($getOrderByOrderID as $value) : ?>
                    <form action="addrepurchase.php?order_id=<?php echo $value['order_id'] ?>" method="post">
                        <div class="col-md-7">
                            <!-- Billing Details -->
                            <div class="billing-details">
                                <div class="section-title">
                                    <h3 class="title">Th??ng tin ng?????i nh???n</h3>
                                </div>
                                <?php if (isset($_SESSION['user'])) :
                                        $getInfoByUsername = $user->getInfoByUsername($_SESSION['user']);
                                        foreach ($getInfoByUsername as $value1) :
                                ?>
                                        <div class="form-group">
                                            <input class="input" type="text" name="full name" placeholder="Full Name" value="<?php echo $value1['First_name'] . $value1['Last_name'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="text" name="address" placeholder="?????a ch???" value="<?php echo $value['address'] ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <input class="input" type="tel" name="phone" placeholder="??i???n tho???i" value="<?php echo $value['phone'] ?>" required>
                                        </div>


                            </div>
                            <!-- /Billing Details -->



                            <!-- Order notes -->
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="order-notes">
                                        <h4>Ghi ch??</h4>
                                        <textarea style="height: 115px;" class="input" placeholder="Ghi ch??" name="note"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-3"><?php $getProductById = $product->getProductById($value['pro_id']) ?>
                                    <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="img/<?php foreach ($getProductById as $value2) {
                                                                                                                        echo $value2['pro_image'];
                                                                                                                    } ?>">
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>

                    <!-- /Order notes -->
                        </div>

                        <!-- Order Details -->
                        <div class="col-md-5 order-details">

                            <div class="section-title text-center">
                                <h3 class="title">????n h??ng c???a b???n</h3>
                            </div>
                            <div class="order-summary">
                                <div class="order-col">
                                    <div><strong>S???N PH???M</strong></div>
                                    <div><strong>????N GI??</strong></div>
                                </div>
                                <div class="order-products">
                                    <?php
                                    $getOrderByOrderID =  $order->getOrderByOrderID($_GET['order_id']);
                                    foreach ($getOrderByOrderID as $value) :
                                        $getAllProducts =  $product->getAllProducts();
                                        foreach ($getAllProducts as $value1) :
                                            if ($value['pro_id'] == $value1['id']) :
                                    ?>
                                                <div class="order-col">
                                                    <div><?php echo $value['quantity'] ?>x <?php echo $value1['name'] ?></div>
                                                    <div style="max-width:440px;"><?php echo number_format($value1['price']) ?>VND</div>
                                                </div>

                                </div>
                                <div class="order-col">
                                    
                                    <div><strong>PH?? V???N CHUY???N</strong></div>
                                    <div><strong>MI???N PH??</strong></div>
                                </div>
                                <div class="order-col">
                                    <div><strong>T???NG</strong></div>
                                    <div><strong class="order-total"><?php echo number_format($value['total']) ?>VND</strong></div>
                                </div>
                            </div>
                <?php

                                            endif;
                                        endforeach;
                                    endforeach;


                ?>

                <button class="primary-btn order-submit col-lg-offset-4" type="submit" name="submit">?????T H??NG</button>

                        </div>
                        <!-- /Order Details -->
                    </form>
                <?php endforeach ?>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

<!-- NEWSLETTER -->
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>????ng K?? ????? Nh???n <strong>TH??NG B??O</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Email c???a b???n">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> ????ng k??</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /NEWSLETTER -->

<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Ch??ng t??i</h3>
                        <p><strong>Nh??m 5-Kh??a CNC10745305-N??m h???c 2021</strong></p>
                        <ul class="footer-links">
                            <li><i class="fa fa-map-marker"></i>53 V?? V??n Ng??n - Ph?????ng Linh Chi???u- Th??nh ph??? Th??? ?????c</li>
                            <li><i class="fa fa-phone"></i>08.38970023</li>
                            <li><i class="fa fa-envelope-o"></i>fit@tdc.edu.vn</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">th??? lo???i</h3>
                        <ul class="footer-links">
                            <li><a href="products.php?type_id=1">??i???n tho???i</a></li>
                            <li><a href="products.php?type_id=2">Laptop</a></li>
                            <li><a href="products.php?type_id=3">M??y t??nh b???ng</a></li>
                            <li><a href="products.php?type_id=4">?????ng h???</a></li>
                            <li><a href="products.php?type_id=5">tai nghe</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">th??ng tin</h3>
                        <ul class="footer-links">
                            <li><strong>Th??i Minh Hi???u</strong> - Thaihieu243@gmail.com</li>
                            <li><strong>Nguy???n Anh V??</strong> - Anhvu4777@gmail.com</li>
                            <li><strong>Nguy???n Anh Khoa</strong> - nguyenanhkhoaa5@gmail.com</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">D???ch v???</h3>
                        <ul class="footer-links">
                            <li><a href="login/index.php">T??i Kho???n C???a T??i</a></li>
                            <li><a href="#">Xem Gi??? H??ng</a></li>
                            <li><a href="#">Y??u Th??ch</a></li>
                            <li><a href="#">Xem ????n H??ng</a></li>
                            <li><a href="#">Gi??p ?????</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>