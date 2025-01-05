<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

ob_start();
include($_SERVER['DOCUMENT_ROOT'] . "/database/connect.php");
include($_SERVER['DOCUMENT_ROOT'] . "/inc/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/cart.php");
?>

<?php
$user = $_SESSION['user'];
$class = new Cart();
$cart_totals = $class->total_price($cart);

if (isset($_POST['submit'])) {
    $id_user = $user['CustomerId'];
    $address = $_POST['address'];
    $number_phone = $_POST['number_phone'];
    $note = $_POST['note'];
    $email =  $_POST['email'];
    $fullname = $_POST['full_name'];

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $current_date = new DateTime('now');
    $date_order = $current_date->format("Y-m-d H:i:s");

    $sql = "INSERT INTO oders(CustomerId, Note, order_date, address, number_phone, total_price) VALUES ('$id_user','$note','$date_order','$address','$number_phone','$cart_totals')";
    $result = mysqli_query($conn, $sql);
    $content = "<table width='500' border='1'>";
    $content .="<tr><th>#</th><th>Tên sản phẩm</th><th>Số lượng</th><th>Giá</th><th>Thành tiền</th></tr>";
    if ($result) {
        $id_order = mysqli_insert_id($conn);
        $i= 0;
        foreach ($cart as $value) {
            $i++;
            $price = $value['sellprice'];
            $num = $value['quantity'];
            $intro_money = $num * $price;
            $insert_order_detail = "INSERT INTO `orderdetails`(`Order_Detail_Id`,`ProductId`, `Price`, `Quantity`) VALUES ('$id_order','$value[id]', $value[sellprice], '$value[quantity]')";
            mysqli_query($conn, $insert_order_detail);
            $content .= "<tr><td>$i</td><td>".$value['name']."</td><td>".$value['quantity']."</td><td>".$value['sellprice']."</td><td>$intro_money</td></tr>";
        }
        $content .="<p>Tổng tiền: $cart_totals</p>";
        $content .="<table>";
        header("location:index.php");

        // Load Composer's autoloader
        require '..//PHPMailer/src/Exception.php';
        require '..//PHPMailer/src/PHPMailer.php';
        require '..//PHPMailer/src/SMTP.php';

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPSecure = "ssl";
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = '465';
            $mail->Username   = 'cake.sale.php@gmail.com';  // SMTP account username
            $mail->Password   = 'futsgvclaskmvsiw';
            $mail->SMTPKeepAlive = true;
            $mail->Mailer = "smtp";
            $mail->IsSMTP(); // telling the class to use SMTP  
            $mail->SMTPAuth   = true;                  // enable SMTP authentication  
            $mail->CharSet = 'utf-8';
            $mail->SMTPDebug  = 0;

            //Recipients
            $mail->setFrom('cake@gmail.com', 'cake- shop');
            $mail->addAddress($email, $fullname);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Thông tin chi tiết đơn đặt hàng';
            $mail->Body    = $content;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        unset($_SESSION['cart']);
        header("location:index.php");
    } else {
        echo '<script language="javascript">';
        echo 'alert("Đặt hàng thất bại!!!")';
        echo '</script>';
    }
}
?>

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__text">
                    <h2>Thanh toán</h2>
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
    <?php if (isset($_SESSION['user'])) {  ?>
        <div class="container">
            <div class="shop__option">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <form method="post">
                            <div class="form-group">
                                <label for="full_name">Tên tài khoản</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $user['Fullname'] ?>" required placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['Email'] ?>" required placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address" required placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="number_phone">SDT </label>
                                <input type="text" class="form-control" id="number_phone" name="number_phone" required placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="note">Ghi chú</label>
                                <textarea type="text" class="form-control" id="note" name="note" required placeholder="Hàng dễ vỡ xin nhẹ tay !!!"> </textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success" name="submit">Thanh toán</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-1 col-md-1">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="table-responsive text-nowrap">
                            <h4 class="mb-4">Thông tin chi tiết sản phẩm</h4>
                            <table class="table" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php
                                    $stt = 1;
                                    foreach ($cart as $key => $value) : ?>
                                        <tr>
                                            <td><?php echo $stt++ ?></td>
                                            <td><?php echo $value['name'] ?></td>
                                            <td><?php echo $value['quantity'] ?></td>
                                            <td><?php echo $value['sellprice'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td>Tổng cộng</td>
                                        <td colspan="6" class="text-center bg-infor"><?php echo $cart_totals ?> VND</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Đăng nhập để mua hàng</strong>
            <a href="login.php?action=checkout">Đăng nhập</a>
        </div>
    <?php } ?>
</section>
<!-- Shop Section End -->

<!-- Map End -->
<?php
include($_SERVER["DOCUMENT_ROOT"] . '//inc/footer.php');
?>