<?php
include($_SERVER['DOCUMENT_ROOT'] . "/inc/header.php");

include($_SERVER['DOCUMENT_ROOT'] . "/database/connect.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT a.ProductId, a.Name, a.Image, c.CategoryName, b.BrandName, a.BuyPrice,a.SellPrice, a.CountView, a.Status,a.Description,a.Quantity
                FROM `products` a, category c, brands b 
                WHERE a.CategoriId = c.CategoryId and a.BrandId = b.BrandId and a.ProductId = '$id'";

    $data = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($data);

    //Hiển thị sản phẩm tương tự
    $query1 = "SELECT *from products where status = 1 and is_accept = 1 ORDER BY RAND()";
    $data1 = mysqli_query($conn, $query1);


    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $query2 = "UPDATE products set CountView = CountView+1 where ProductId = '$id'";
        $data2 = mysqli_query($conn, $query2);
    }

    
}

?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__text">
                    <h2>Chi tiết sản phẩm</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__links">
                    <a href="./index.php">Trang chủ</a>
                    <a href="./shop.html">Cửa hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product__details__img">
                    <div class="product__details__big__img">
                        <img class="big_img" src="..//admin//uploads//<?php echo $product['Image'] ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form action="cart.php" method="GET">
                    <div class="product__details__text">
                        <h4><?php echo $product['Name'] ?></h4>
                        <h5>Giá: <?php echo $product['SellPrice']. ' VND'?></h5>
                        <p><?php echo $product['Description'] ?></p>
                        <ul>
                            <li>Số lượng: <span><?php echo $product['Quantity'] ?></span></li>
                            <li>Loại: <span><?php echo $product['CategoryName'] ?></span></li>
                            <li>Thương hiệu: <span><?php echo $product['BrandName'] ?></span></li>
                        </ul>
                        <div class="product__details__option">
                            <div class="quantity">
                                <div>
                                    <input class="pro-qty" type="number" value="1" name="quantity" min="1" max="<?php echo $product['Quantity']; ?>">
                                    <input type="hidden" name="id" value="<?php echo $product['ProductId'] ?>"> 
                                    
                                </div>
                            </div>
                          <p>
                          <button style="color: white; " type="submit" class="btn primary-btn" >Thêm vào giỏ hàng</button>
                        </p>
                     
                        </div>
                    </div>
                </form> 
            
            </div>
        </div>
    </div>
</section>

<section class="related-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Sản phẩm gợi ý cho bạn</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="related__products__slider owl-carousel">

                <?php foreach ($data1 as $key => $value) : ?>
                    <div class="col-lg-3">
                        <div class="product__item">
                            <div class="product__item__pic set-bg">
                                <a href="product_detail.php?id=<?php echo $value['ProductId'] ?> ">
                                    <img src="..//admin//uploads//<?php echo $value['Image'] ?>" alt="Chi tiết sản phẩm">
                                </a>
                                <div class="product__label">
                                    <!-- <span>Cupcake</span> -->
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6> <a href="product_detail.php?id=<?php echo $value['ProductId'] ?>"><?php echo $value['Name'] ?></a></h6>
                                <h5>Giá <?php echo $value['SellPrice'] . ' VND' ?></h5>
                                <div>
                                    <button class="btn primary-btn mt-4">
                                        <a style="color: white" href="product_detail.php?id=<?php echo $value['ProductId'] ?> ">Chi tiết sản phẩm</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>

<?php
include($_SERVER["DOCUMENT_ROOT"] . '//inc/footer.php');
?>