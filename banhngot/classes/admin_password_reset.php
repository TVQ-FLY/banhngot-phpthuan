<?php include($_SERVER['DOCUMENT_ROOT'] . "/lib/database.php");
 include($_SERVER['DOCUMENT_ROOT'] . "/helpers/format.php"); ?>
<?php
class admin_reset_pass {
  private $db;
  private $fm;

  public function __construct() {
    $this->db = new database();
    $this->fm = new format();
  }

  public function reset_pass($Email) {
    $Email = $this->fm->validation($Email);
    $Token = md5(rand());
    $Email = mysqli_real_escape_string($this->db->link, $Email);

    if (empty($Email)) {
      $alert = "Email không được để trống";
      return $alert;
    } else {
      $query = "SELECT * FROM admin WHERE Email = '$Email' LIMIT 1";
      $result = $this->db->select($query);
    }

    if (mysqli_num_rows($result) == 0) {
      $_SESSION['status'] = "Không tìm thấy email";
      header("Location: quên_password.php");
      exit(0);
    } else {
      $row = mysqli_fetch_array($result);
      $get_name = $row['Tên người dùng'];
      $get_email = $row['Email'];
      $update_token = "UPDATE admin SET Token = '$Token' WHERE Email = '$Email'";
      $this->db->update($update_token);

      $subject = "Khôi phục mật khẩu";
      $message = "Xin chào $get_name,
                   Bạn đã yêu cầu khôi phục mật khẩu. Để đặt lại mật khẩu của mình, vui lòng truy cập liên kết sau: http://localhost/reset_password.php?token=$Token
                   Lưu ý rằng liên kết này sẽ hết hạn sau 24 giờ.
                   Trân trọng,
                   Admin";
      mail($get_email, $subject, $message);
      $alert = "Chúng tôi đã gửi email hướng dẫn cách đặt lại mật khẩu của bạn. Vui lòng kiểm tra hộp thư đến của bạn.";
      return $alert;
    }
  }
}
?>