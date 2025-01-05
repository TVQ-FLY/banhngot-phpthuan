<?php
include($_SERVER['DOCUMENT_ROOT'] . "/inc/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/database/connect.php");

$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];




?>

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__text">
                    <h2>Xem giỏ hàng</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__links">
                    <a href="./index.php">Trang chủ</a>
                    <a href="./list_product.php">Cửa hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
        <div class="table-responsive text-nowrap">
          <table class="table" style="text-align: center">
            <thead>
              <tr>
                <th>STT</th>
                <th>tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
                <th></th>
              </tr>
            </thead>
<tbody class="table-border-bottom-0">
  <?php
  $stt = 1;
  $total_price = 0;
  foreach ($cart as $key => $value) :
    $total_price += $value['sellprice']  * $value['quantity'];
  ?>
    <tr>
      <td><?php echo $stt++ ?></td>
      <td><?php echo $value['name'] ?></td>
      <td>
        <img src="..//admin//uploads//<?php echo $value['image'] ?>" alt="" width="120">
      </td>
      <td>
        <form action="cart.php">
          <input type="hidden" name="action" value="update" >
          <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
          <input type="number" style="width: 50px" name="quantity" value="<?php echo $value['quantity'] ?>" min="1"   >
          <button class="btn btn-primary" type="submit"  >Cập nhật</button>
        </form>
      </td>
      <td><?php echo $value['sellprice'] ?></td>
      <td><?php echo $value['sellprice']  * $value['quantity'] ?> VND</td>
      <td>
        <button type="button" class="btn btn-danger">
          <a style="color: white" ; href="cart.php?id=<?php echo $value['id']?>&action=delete" onclick="return confirm('Bạn đang muốn xóa?')">Xóa</a>
        </button>
      </td>
    </tr>
  <?php endforeach; ?>
  <tr>
    <td>Tổng cộng: </td>
    <td colspan="6" class="text-center bg-infor"><?php echo $total_price ?> VND</td>
  </tr>
</tbody>
          </table>
          <button class="btn btn-danger">
            <a style="color: white;" href="checkout.php">Thanh toán</a>
          </button>
         
        </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->
<script>
    function validateUpdate(productId) {
        var updatedQuantity = parseInt(document.getElementsByName("quantity")[0].value);
        var maxQuantity = parseInt(<?php echo $value['max_quantity']; ?>);

        if (updatedQuantity > maxQuantity) {
            alert("Số lượng không đủ trong kho!");
            return false;
        }

        return true;
    }
</script>
<!-- Map End -->
<?php
include($_SERVER["DOCUMENT_ROOT"] . '//inc/footer.php');
?>