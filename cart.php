<?php session_start() ?>
<?php if (isset($_SESSION['user'])) {
    include "headeruser.php";
} else {
    include "header.php";
} ?>
<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="css/font-awesome.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/style1.css">
<link rel="stylesheet" href="css/responsive.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    ?>
                                    <?php foreach ($_SESSION['cart'] as $key => $qty) : ?>
                                        <?php $getAllProducts =  $product->getAllProducts() ?>
                                        <?php foreach ($getAllProducts as $value) : ?>
                                            <?php if ($value['id'] == $key) : ?>
                                                <tbody>
                                                    <tr class="cart_item">
                                                        <td class="product-remove">
                                                            <a title="Remove this item" class="remove" href="delcart.php?id=<?php echo $key ?>">×</a>
                                                        </td>

                                                        <td class="product-thumbnail">
                                                            <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="img/<?php echo $value['pro_image'] ?>"></a>
                                                        </td>

                                                        <td class="product-name">
                                                            <a href="single-product.html"><?php echo $value['name'] ?></a>
                                                        </td>

                                                        <td class="product-price">
                                                            <span class="amount"><?php echo number_format($value['price']) ?>VND</span>
                                                        </td>

                                                        <td class="product-quantity">
                                                            <div class="quantity buttons_added">
                                                                <!--     <input type="button" class="minus" value="-"> -->
                                                                <a href="subtractqty.php?id=<?php echo $value['id'] ?>"><input type="button" class="minus" value="-"></a>
                                                                <input type="text" size="1" class="input-text qty text" title="Qty" value="<?php echo $qty ?>">
                                                                <a href="addqty.php?id=<?php echo $value['id'] ?>"><input type="button" class="plus" value="+"></a>
                                                                <!--    <input type="button" class="plus" value="+"> -->
                                                            </div>
                                                        </td>

                                                        <td class="product-subtotal">
                                                            <span class="amount"><?php echo number_format($value['price'] * $qty) ?>VND</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="actions" colspan="6">

                                                            <div class="add-to-cart">
                                                                <a href="check.php"><button class="add-to-cart-btn"><i class="fa fa-credit-card"></i> Checkout</button> </a>
                                                            </div>

                                                        </td>
                                                    </tr>

                                                </tbody>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <?php endforeach ?>

                                </table>
                            </form>
                            <div class="cart-collaterals">
                                <div class="cart_totals col-lg-offset-4">
                                    <h2>Cart Totals</h2>

                                    <table cellspacing="0">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">£15.00</span></td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Shipping and Handling</th>
                                                <td>Free Shipping</td>
                                            </tr>

                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">£15.00</span></strong> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <hr size="5px" align="center" color=#e6e9ee />

                            




                            </div> -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="products-tabs">
                                        <!-- tab -->
                                        <div id="pap1" class="tab-pane active">
                                            <div class="products-slick" data-nav="#slick-nav-1">
                                                <?php
                                                $type_id = 1;
                                                $getProductsTopSellingByType1 = $product->getProductsTopSellingByType1($type_id); ?>
                                                <?php foreach ($getProductsTopSellingByType1 as $value) : ?>
                                                    <!-- product -->
                                                    <div class="product">
                                                        <div class="product-img">
                                                            <img style="width=100px" src="./img/<?php echo $value['pro_image'] ?>" alt="">
                                                            <div class="product-label">
                                                                <span class="new">TOPSELLING</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category">Category</p>
                                                            <h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
                                                            <h4 class="product-price"><?php echo number_format($value['price']) ?>VND</h4>
                                                            <div class="product-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <div class="product-btns">
                                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                            </div>
                                                        </div>
                                                        <div class="add-to-cart">
                                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                                                cart</button>
                                                        </div>
                                                    </div>
                                                    <!-- /product -->
                                                <?php endforeach ?>
                                            </div>
                                            <div id="slick-nav-1" class="products-slick-nav"></div>
                                        </div>
                                        <!-- /tab -->

                                        <!-- tab -->
                                        <div id="pap2" class="tab-pane ">
                                            <div class="products-slick">
                                                <?php
                                                $type_id = 2;
                                                $getProductsTopSellingByType1 = $product->getProductsTopSellingByType1($type_id); ?>
                                                <?php foreach ($getProductsTopSellingByType1 as $value) : ?>
                                                    <!-- product -->
                                                    <div class="product">
                                                        <div class="product-img">
                                                            <img src="./img/<?php echo $value['pro_image'] ?>" alt="">
                                                            <div class="product-label">
                                                                <span class="new">TOPSELLING</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category">Category</p>
                                                            <h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
                                                            <h4 class="product-price"><?php echo number_format($value['price']) ?>VND</h4>
                                                            <div class="product-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <div class="product-btns">
                                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                            </div>
                                                        </div>
                                                        <div class="add-to-cart">
                                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                                                cart</button>
                                                        </div>
                                                    </div>
                                                    <!-- /product -->
                                                <?php endforeach ?>
                                            </div>
                                            <div id="slick-nav-1" class="products-slick-nav"></div>
                                        </div>
                                        <!-- /tab -->

                                        <!-- tab -->
                                        <div id="pap3" class="tab-pane ">
                                            <div class="products-slick">
                                                <?php
                                                $type_id = 3;
                                                $getProductsTopSellingByType1 = $product->getProductsTopSellingByType1($type_id); ?>
                                                <?php foreach ($getProductsTopSellingByType1 as $value) : ?>
                                                    <!-- product -->
                                                    <div class="product">
                                                        <div class="product-img">
                                                            <img src="./img/<?php echo $value['pro_image'] ?>" alt="">
                                                            <div class="product-label">
                                                                <span class="new">TOPSELLING</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category">Category</p>
                                                            <h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
                                                            <h4 class="product-price"><?php echo number_format($value['price']) ?>VND</h4>
                                                            <div class="product-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <div class="product-btns">
                                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                            </div>
                                                        </div>
                                                        <div class="add-to-cart">
                                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                                                cart</button>
                                                        </div>
                                                    </div>
                                                    <!-- /product -->
                                                <?php endforeach ?>
                                            </div>
                                            <div id="slick-nav-1" class="products-slick-nav"></div>
                                        </div>
                                        <!-- /tab -->

                                        <!-- tab -->
                                        <div id="pap4" class="tab-pane ">
                                            <div class="products-slick">
                                                <?php
                                                $type_id = 4;
                                                $getProductsTopSellingByType1 = $product->getProductsTopSellingByType1($type_id); ?>
                                                <?php foreach ($getProductsTopSellingByType1 as $value) : ?>
                                                    <!-- product -->
                                                    <div class="product">
                                                        <div class="product-img">
                                                            <img src="./img/<?php echo $value['pro_image'] ?>" alt="">
                                                            <div class="product-label">
                                                                <span class="new">TOPSELLING</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category">Category</p>
                                                            <h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
                                                            <h4 class="product-price"><?php echo number_format($value['price']) ?>VND</h4>
                                                            <div class="product-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <div class="product-btns">
                                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                            </div>
                                                        </div>
                                                        <div class="add-to-cart">
                                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                                                cart</button>
                                                        </div>
                                                    </div>
                                                    <!-- /product -->

                                                <?php endforeach ?>
                                            </div>
                                            <div id="slick-nav-1" class="products-slick-nav"></div>
                                        </div>
                                        <!-- /tab -->

                                        <!-- tab -->
                                        <div id="pap5" class="tab-pane ">
                                            <div class="products-slick">
                                                <?php
                                                $type_id = 5;
                                                $getProductsTopSellingByType1 = $product->getProductsTopSellingByType1($type_id); ?>
                                                <?php foreach ($getProductsTopSellingByType1 as $value) : ?>
                                                    <!-- product -->
                                                    <div class="product">
                                                        <div class="product-img">
                                                            <img src="./img/<?php echo $value['pro_image'] ?>" alt="">
                                                            <div class="product-label">
                                                                <span class="new">TOPSELLING</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category">Category</p>
                                                            <h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
                                                            <h4 class="product-price"><?php echo number_format($value['price']) ?>VND</h4>
                                                            <div class="product-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <div class="product-btns">
                                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                            </div>
                                                        </div>
                                                        <div class="add-to-cart">
                                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                                                cart</button>
                                                        </div>
                                                    </div>
                                                    <!-- /product -->
                                                <?php endforeach ?>
                                            </div>
                                            <div id="slick-nav-1" class="products-slick-nav"></div>
                                        </div>
                                        <!-- /tab -->
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php" ?>