<?php
include($_SERVER['DOCUMENT_ROOT'] . "/inc/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/database/connect.php");

$query = "SELECT products.ProductId, products.Name, products.Image ,products.Quantity ,products.Description ,products.BuyPrice ,products.SellPrice ,products.Status, products.CountView ,products.CategoriId ,products.BrandId ,products.is_accept, orderdetails.Quantity 
from products 
JOIN orderdetails 
ON products.ProductId = orderdetails.ProductId 
ORDER BY orderdetails.Quantity DESC LIMIT 8";
$Products = mysqli_query($conn, $query);

?>
<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        <div class="hero__item set-bg" data-setbg="img/hero/anh1.jpg">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="hero__text">
                            <h2>Làm cho cuộc sống của bạn ngọt ngào hơn</h2>
                            <a href="#" class="primary-btn" >Bánh của chúng tôi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__item set-bg" data-setbg="img/hero/anh1.jpg">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="hero__text">
                            <h2>Hãy khám phá những bí mật nho nhỏ cùng Cake Shop nhé!</h2>
                            <a href="#" class="primary-btn">Cake Shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Hero Section End -->

<!-- About Section Begin -->
<section class="about spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="about__text">
                    <div class="section-title">
                        <span>Giới thiệu về tiệm bánh</span> <br> 
                        <h2>Làm bánh là nghệ thuật, là cách để thư giãn <br>  và tận hưởng cuộc sống!</h2>
                    </div>
                    <p> Cake Shop với hành trình 16 năm hình thành và phát triển,  <br> dưới sự nỗ lực không ngừng nghỉ Cake Shop đã mang lại <br> những dấu ấn khó phai trong lòng khách hàng.</p>
                    <p>“ Chúng tôi tự tin dẫn đầu với uy tín và chất lượng,<br>
                         Chúng tôi am hiểu ẩm thực bánh và khẩu vị khách hàng,<br>
                         Chúng tôi không ngừng đổi mới và sáng tạo”.</p>
                </div>
            </div>
                    <div >
                            <img src="img/instagram/anh2.jpg" alt="" width="500" height="400" hspace="10%">
                    </div>                                   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Categories Section Begin -->
<!-- Categories Section End -->
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="section-title">
                <span>Sản phẩm nổi bật</span>
            </div>
        </div>
    </div>
</div>
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <?php foreach ($Products as $key => $value) : ?>
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
                                    <a style="color: white" href="product_detail.php?id=<?php echo $value['ProductId'] ?> ">Chi tiết sản phẩm</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Team Section End -->

<!-- Testimonial Section Begin -->
<section class="testimonial spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <span>CẢM NHẬN CỦA KHÁCH HÀNG</span>
                    <h2>Khách hàng của chúng tôi nói</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="testimonial__slider owl-carousel">
                <div class="col-lg-6">
                    <div class="testimonial__item">
                        <div class="testimonial__author">
                            <div class="testimonial__author__pic">
                                <img src="img/testimonial/ta-1.jpg" alt="">
                            </div>
                            <div class="testimonial__author__text">
                                <h5>Thu Hương</h5>
                                <span>Nghi Phú</span>
                            </div>
                        </div>
                        <div class="rating">
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star-half_alt"></span>
                        </div>
                        <p>Thử vì tiệm gần nhà và mê đến giờ. Nhân viên thân thiện, nhiệt tình và đặc biệt là bánh ngon</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testimonial__item">
                        <div class="testimonial__author">
                            <div class="testimonial__author__pic">
                                <img src="img/testimonial/ta-2.jpg" alt="">
                            </div>
                            <div class="testimonial__author__text">
                                <h5>Thanh Thúy</h5>
                                <span>Trung Đô</span>
                            </div>
                        </div>
                        <div class="rating">
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star-half_alt"></span>
                        </div>
                        <p>Ghiền thật sự. Mình không thích ngọt mấy, nên chưa thử qua bánh ngọt ở đây nhưng mà cái bánh nhân chà bông phải nói là đỉnh. Mấy loại bánh khác cũng ngon. </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testimonial__item">
                        <div class="testimonial__author">
                            <div class="testimonial__author__pic">
                                <img src="img/testimonial/ta-1.jpg" alt="">
                            </div>
                            <div class="testimonial__author__text">
                                <h5>Trà Giang</h5>
                                <span>Hà Huy Tập</span>
                            </div>
                        </div>
                        <div class="rating">
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star-half_alt"></span>
                        </div>
                        <p>Cảm ơn Cake Shop. Bánh ở đây rất ngon và giao hàng cũng nhanh.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testimonial__item">
                        <div class="testimonial__author">
                            <div class="testimonial__author__pic">
                                <img src="img/testimonial/ta-2.jpg" alt="">
                            </div>
                            <div class="testimonial__author__text">
                                <h5>Nhật Anh</h5>
                                <span>Hưng Dũng</span>
                            </div>
                        </div>
                        <div class="rating">
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star-half_alt"></span>
                        </div>
                        <p>Hiiiii bánh ngon quá. Trang trí đơn giản mà đẹp.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testimonial__item">
                        <div class="testimonial__author">
                            <div class="testimonial__author__pic">
                                <img src="img/testimonial/ta-1.jpg" alt="">
                            </div>
                            <div class="testimonial__author__text">
                                <h5>Phương Anh</h5>
                                <span>Trung Đô</span>
                            </div>
                        </div>
                        <div class="rating">
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star-half_alt"></span>
                        </div>
                        <p>Bánh vừa đẹp vừa ngon. Mình sẽ quay lại mua thêm nữa. </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testimonial__item">
                        <div class="testimonial__author">
                            <div class="testimonial__author__pic">
                                <img src="img/testimonial/ta-2.jpg" alt="">
                            </div>
                            <div class="testimonial__author__text">
                                <h5>Minh Thư</h5>
                                <span>Nghi Kim</span>
                            </div>
                        </div>
                        <div class="rating">
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star-half_alt"></span>
                        </div>
                        <p>Cảm ơn Cake Shop nhé. Bánh ở đây rất ngon và rẻ tymmmm.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Section End -->

<!-- Instagram Section Begin -->
<section class="instagram spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 p-0">
                <div class="instagram__text">
                    <div class="section-title">
                        <span >Hãy theo dõi </span>
                        <h2>Những khoảnh khắc ngọt <br> ngào được lưu lại làm kỷ <br> niệm.</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                        <div class="instagram__pic">
                            <img src="img/instagram/instagram-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                        <div class="instagram__pic middle__pic">
                            <img src="img/instagram/instagram-2.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                        <div class="instagram__pic">
                            <img src="img/instagram/instagram-3.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                        <div class="instagram__pic">
                            <img src="img/instagram/instagram-4.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                        <div class="instagram__pic middle__pic">
                            <img src="img/instagram/instagram-5.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                        <div class="instagram__pic">
                            <img src="img/instagram/instagram-3.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Instagram Section End -->

<!-- Map Begin -->
<div class="map">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-7">
                <div class="map__inner">
                    <h6>Cake Shop</h6>
                    <ul>
                        <li>số 11, Nghi Phú, Tp.Vinh, Nghệ An</li>
                        <li>cakeshop@gmail.com</li>
                        <li>0364383435</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="map__iframe">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30231.667056892187!2d105.66215846313152!3d18.71068132278218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139d1fe7c3779eb%3A0xdc076f1bb1825ca9!2zTmdoaSBQaMO6LCBUcC4gVmluaCwgTmdo4buHIEFuLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2sus!4v1699533679073!5m2!1svi!2sus" height="300" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
</div>
<!-- Map End -->
<?php
include($_SERVER["DOCUMENT_ROOT"] . '//inc/footer.php');
?>