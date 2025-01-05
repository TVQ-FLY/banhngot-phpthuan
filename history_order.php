<?php
ob_start();
error_reporting(E_ERROR | E_PARSE);

// Kết nối tới database và các file cần thiết
include($_SERVER['DOCUMENT_ROOT'] . "/inc/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/database/connect.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/cart.php");

// Kiểm tra người dùng đăng nhập hay chưa
if (isset($_SESSION['user'])) {
    // Lấy thông tin người dùng đăng nhập
    $user = $_SESSION['user'];
    $id_user = $user['CustomerId'];

    // Truy vấn để lấy tất cả các đơn hàng của người dùng
    $query = "SELECT o.order_date, o.status, a.Quantity, p.Name, a.Price, p.Image FROM `oders` o, orderdetails a, products p, customers c
              where o.OderId = a.Order_Detail_Id and p.ProductId = a.ProductId and o.CustomerId = c.CustomerId  and o.CustomerId = '$id_user'";
    
    // Thực hiện truy vấn
    $result = mysqli_query($conn, $query);

    // Kiểm tra xem có đơn hàng nào hay không
    if (mysqli_num_rows($result) > 0) {
        // Bắt đầu hiển thị thông tin đơn hàng
        echo '<div class="breadcrumb-option">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="breadcrumb__text">
                                <h2>Lịch sử đơn hàng</h2>
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
            
            <section class="shop spad">
                <div class="container">
                    <div class="row">
                        <div class="table-responsive text-nowrap">
                            <table class="table" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Ảnh</th>
                                        <th>Thời gian đặt</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Thành tiền</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">';
        
        // Khởi tạo biến để tính tổng giá
        $stt = 1;
        $total_price = 0;

        // Lặp qua từng đơn hàng và hiển thị thông tin
        while ($order = mysqli_fetch_assoc($result)) {
            $total_price += $order['Price'] * $order['Quantity'];

            echo '<tr>
                    <td>' . $stt++ . '</td>
                    <td>' . $order['Name'] . '</td>
                    <td><img src="../admin/uploads/' . $order['Image'] . '" alt="" width="120"></td>
                    <td>' . $order['order_date'] . '</td>
                    <td>' . $order['Quantity'] . '</td>
                    <td>' . $order['Price'] . '</td>
                    <td>' . ($order['Price'] * $order['Quantity']) . ' vnd</td>
                    <td>';

            // Hiển thị trạng thái dựa trên giá trị trong cột 'status'
            if ($order['status'] == 0) {
                echo 'Chưa duyệt';
            } else if ($order['status'] == 1) {
                echo 'Đã duyệt';
            } else if ($order['status'] == 2) {
                echo 'Thành công';
            }

            echo '</td></tr>';
        }

        // Hiển thị tổng giá và đóng các thẻ HTML
        echo '<tr>
                <td>Tổng số tiền: </td>
                <td colspan="6">' . $total_price . ' vnd</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</section>';
    } else {
        // Nếu không có đơn hàng nào
        echo '<div class="alert alert-info">
                <strong>Hiện không có đơn hàng nào!</strong>
            </div>';
    }
} else {
    // Nếu người dùng chưa đăng nhập
    echo '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Vui lòng đăng nhập để xem đơn hàng gần đây.</strong>
            <a href="login.php">Đăng nhập</a>
        </div>';
}

// Bao gồm phần footer
include($_SERVER["DOCUMENT_ROOT"] . '//inc/footer.php');
?>