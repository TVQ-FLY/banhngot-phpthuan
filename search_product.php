
<?php
ob_start();
include($_SERVER['DOCUMENT_ROOT'] . "/inc/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/database/connect.php");

$itemsPerPage = 10; // Số sản phẩm trên mỗi trang
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại, mặc định là trang 1

if (isset($_POST['submit']) || isset($_POST['submit1'])) {
    $search = $_POST['search'];

    // Truy vấn sản phẩm cho trang hiện tại
    $startItem = ($currentPage - 1) * $itemsPerPage;
    $query = "SELECT * FROM Products WHERE status = 1 AND is_accept = 1 AND Name LIKE '%$search%' ORDER BY SellPrice DESC LIMIT $startItem, $itemsPerPage";
    $data = mysqli_query($conn, $query);

    if (!$data) {
        echo '<script language="javascript">';
        echo 'alert("Đặt hàng thất bại!!!")';
        echo '</script>';
        header("location: list_product.php");
    }
}

$query1 = "SELECT * FROM Category WHERE status = 1";
$Category = mysqli_query($conn, $query1);

// Truy vấn số lượng sản phẩm tổng cộng
$totalQuery = "SELECT COUNT(*) as total FROM Products WHERE status = 1 AND is_accept = 1 AND Name LIKE '%$search%'";
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult)['total'];

// Tính toán số trang
$totalPages = ceil($totalRow / $itemsPerPage);
?>

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__text">
                    <h2>Cửa hàng</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__links">
                    <a href="./index.php">Trang chủ</a>
                    <span>Cửa hàng</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="shop__option">
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <div class="shop__option__search">
                        <form action="search_product.php" method="POST">
                            <select name="id_category" id="id_category" onchange="location = this.value;">
                                <option value="">Loại bánh</option>
                                <?php foreach ($Category as $key => $value) { ?>
                                    <option value='list_product_by_category.php?id=<?php echo $value["CategoryId"] ?>'>
                                        <?php echo $value["CategoryName"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <input type="text" name="search" class="form-control rounded" placeholder="Tìm Kiếm" aria-label="Tìm Kiếm" aria-describedby="search-addon" />
                            <button type="submit1" name="submit1" class="btn btn-outline-primary">Tìm kiếm</button>
                        </form>
                    </div>

                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="shop__option__right">
                    <select onchange="document.location.href=this.value">
                            <option value="">Sắp xếp giá</option>
                            <option value="sort_high_to_low_product.php">Cao đến thấp</option>
                            <option value="sort_low_to_high_product.php">Thấp đến cao</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($data as $key => $value) : ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
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
                                    <a style="color: white" href="cart.php?id=<?php echo $value['ProductId'] ?>">Thêm giỏ hàng</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="shop__last__option">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="shop__pagination">
                  <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                          <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                  <?php } ?>
                          <a href="?page=<?php echo min($totalPages, $currentPage + 1); ?>"><span class="arrow_carrot-right"></span></a>
                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="shop__last__text">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->

<!-- Map End -->
<?php
include($_SERVER["DOCUMENT_ROOT"] . '//inc/footer.php');
?>