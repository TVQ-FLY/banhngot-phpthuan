<?php
ob_start();
error_reporting(E_ERROR | E_PARSE);
include($_SERVER['DOCUMENT_ROOT'] . "/inc/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/database/connect.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/cart.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
        echo "Dữ liệu rỗng";
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $query = "INSERT INTO Contacts (UserName,Email,Message) Value('$name','$email','$message')";
        $data = mysqli_query($conn, $query);

        if ($data) {
            echo '<script language="javascript">';
            echo 'alert("Gửi phản hồi thành công !!!")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Gửi phản hồi thất bại !!!")';
            echo '</script>';
        }
    }
}
?>

<section class="contact spad">
        <div class="container">
            <!-- <div class="map">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-4 col-md-7">
                            <div class="map__inner">
                                <h6>COlorado</h6>
                                <ul>
                                    <li>1000 Lakepoint Dr, Frisco, CO 80443, USA</li>
                                    <li>Sweetcake@support.com</li>
                                    <li>+1 800-786-1000</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="map__iframe">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d10784.188505644011!2d19.053119335158936!3d47.48899529453826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1543907528304" height="300" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div> -->
            <div class="contact__address">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="contact__address__item">
                            <h6>Bánh Ngọt</h6>
                            <ul>
                                <li>
                                    <span class="icon_pin_alt"></span>
                                    <p>Số 234, Phương Mai, Đống Đa, Hà Nội</p>
                                </li>
                                <li><span class="icon_headphones"></span>
                                    <p>0364383999</p>
                                </li>
                                <li><span class="icon_mail_alt"></span>
                                    <p>banhngot@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="contact__address__item">
                            <h6>Cake</h6>
                            <ul>
                                <li>
                                    <span class="icon_pin_alt"></span>
                                    <p>12 Liên Ấp 1, Bình Chánh, Tp. Hồ Chí Minh</p>
                                </li>
                                <li><span class="icon_headphones"></span>
                                    <p>0344333435</p>
                                </li>
                                <li><span class="icon_mail_alt"></span>
                                    <p>lethithaothanh2001@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="contact__address__item">
                            <h6>Cake Shop</h6>
                            <ul>
                                <li>
                                    <span class="icon_pin_alt"></span>
                                    <p>số 11, Nghi Phú, Tp. Vinh, Nghệ An</p>
                                </li>
                                <li><span class="icon_headphones"></span>
                                    <p>0364383435</p>
                                </li>
                                <li><span class="icon_mail_alt"></span>
                                    <p>cakeshop@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact__text">
                        <h3>Liên hệ với chúng tôi</h3>
                        <ul>
                            <li>Thứ hai - Thứ sáu: 5:00am - 9:00pm</li>
                            <li>Thứ bảy - Chủ nhật: 6:00am - 9:00pm</li>
                        </ul>
                        <img src="img/cake-piece.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact__form">

                    <form action="contact_add.php" method="POST">
                    <div class="row">
                    <div class="col-lg-6">
                                <label class="form-label" for="name">Tên tài khoản</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="" required />
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="" required />
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label" for="message">Nội dung</label>
                                <input type="text" class="form-control" id="message" name="message" placeholder="" required />
                            </div>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>





<!-- Map End -->
<?php
include($_SERVER["DOCUMENT_ROOT"] . '//inc/footer.php');
?>