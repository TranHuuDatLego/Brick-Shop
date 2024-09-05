<?php
include '../php/login.php';
// Chưa đăng nhập 
if (isset($_SESSION["userID"])) {
    $userID = $_SESSION["userID"];
    // print_r($userName);
    $sqlLogin = "SELECT * FROM `User` WHERE userID = '$userID' ";
    $queryLogin = mysqli_query($conn, $sqlLogin);
    // print_r($queryLogin);
    // Kiểm tra kết quả truy vấn

    // Duyệt qua từng hàng dữ liệu từ kết quả truy vấn
    $row = $queryLogin->fetch_assoc();
    // Thêm thông tin từng hàng vào mảng $userLogin
    $userLogin = array(
        "userID" => $row["userID"],
        "userName" => $row["userName"],
        "email" => $row["email"],
        "image" => $row["image"],
        "loginpassword" => $row["loginpassword"],
        "birthday" => $row["birthday"],
        "bio" => $row["bio"],
        "country" => $row["country"],
        "phone" => $row["phone"]
    );
} else {
    // Chưa đăng nhập 
    header('Location: ../php/form_login_en.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Account Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include '../php/head.php'; ?>

    <?php include '../php/ListCountries.php'; ?>

    <!-- Thêm jQuery và jQuery UI CSS và JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- Important -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Thêm favicon vào đây -->
    <link rel="icon" href="../images/keeppley_logo.webp" type="image/x-icon">
    <style type="text/css">
        body {
            background: #f5f5f5;
            margin-top: 20px;
        }

        .ui-w-80 {
            width: 80px !important;
            height: auto;
        }

        .btn-default {
            border-color: rgba(24, 28, 33, 0.1);
            background: rgba(0, 0, 0, 0);
            color: #4E5155;
        }

        label.btn {
            margin-bottom: 0;
        }

        .btn-outline-primary {
            border-color: #26B4FF;
            background: transparent;
            color: #26B4FF;
        }

        .btn {
            cursor: pointer;
        }

        .text-light {
            color: #babbbc !important;
        }

        .btn-facebook {
            border-color: rgba(0, 0, 0, 0);
            background: #3B5998;
            color: #fff;
        }

        .btn-instagram {
            border-color: rgba(0, 0, 0, 0);
            background: #000;
            color: #fff;
        }

        .card {
            background-clip: padding-box;
            box-shadow: 0 1px 4px rgba(24, 28, 33, 0.012);
        }

        .row-bordered {
            overflow: hidden;
        }

        .account-settings-fileinput {
            position: absolute;
            visibility: hidden;
            width: 1px;
            height: 1px;
            opacity: 0;
        }

        .account-settings-links .list-group-item.active {
            font-weight: bold !important;
        }

        html:not(.dark-style) .account-settings-links .list-group-item.active {
            background: transparent !important;
        }

        .account-settings-multiselect~.select2-container {
            width: 100% !important;
        }

        .light-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }

        .light-style .account-settings-links .list-group-item.active {
            color: #4e5155 !important;
        }

        .material-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }

        .material-style .account-settings-links .list-group-item.active {
            color: #4e5155 !important;
        }

        .dark-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(255, 255, 255, 0.03) !important;
        }

        .dark-style .account-settings-links .list-group-item.active {
            color: #fff !important;
        }

        .light-style .account-settings-links .list-group-item.active {
            color: #4E5155 !important;
        }

        .light-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }

        .btn-cancel:hover {
            background-color: #f5f5f5;
        }

        .btn-setting {
            margin-bottom: 30px;
            margin-right: 30px
        }

        @media only screen and (max-width: 600px) {
            .btn-setting {
                margin-bottom: 20px;
                margin-right: 20px
            }
        }
    </style>
</head>

<body>
    <div class="headD">
        <div class="headDiv home">
            <!-- Important -->
            <div class="wal">
                <a href="../en/product.php" class="logo">
                    <img src="../images/logo.png" class="PC-Box" alt="Qman Toys">
                </a>

                <div class="lan">
                    <ul>
                        <!-- Show Icon cart  -->
                        <li><a href="../en/product.php" class="fa-solid fa-house btn-cart" style="color: #000000;"></a>
                        </li>

                        <!-- Header Account Settings -->
                        <?php
                        $website = 'Information.php';
                        include '../php/SettingUserHeader_en.php';
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Mobile-->
        <?php include '../php/mobile_en.php'; ?>

        <div style="margin-top:80px" class="container light-style flex-grow-1 container-p-y">
            <a href="../en/product.php" class="logo">
                <img src="../images/logo.png" class="Phone-Box" alt="Qman Toys" height="40">
            </a>
            <h4 class="font-weight-bold py-3 mb-4">
                Account settings
            </h4>
            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-3 pt-0">
                        <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action" href="general.php">General</a>
                            <a class="list-group-item list-group-item-action" href="Image.php">Image</a>
                            <a class="list-group-item list-group-item-action" href="ChangePassword.php">Change
                                password</a>
                            <a class="list-group-item list-group-item-action active"
                                href="Information.php">Information</a>
                            <a class="list-group-item list-group-item-action " href="SocialLinks.php">Social links</a>
                            <a class="list-group-item list-group-item-action" href="Connections.php">Connections</a>
                            <a class="list-group-item list-group-item-action "
                                href="Notifications.php">Notifications</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="account-info">
                                <form action="../php/UpdateInformation.php" method="post">
                                    <div class="card-body pb-2">
                                        <?php
                                        // session_start();
                                        if (isset($_SESSION['success_message'])) {
                                            echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
                                            unset($_SESSION['success_message']); // Xóa thông báo sau khi hiển thị
                                        }
                                        ?>
                                        <div class="form-group">
                                            <label class="form-label">Bio</label>
                                            <textarea class="form-control" name="bio"
                                                rows="5"><?php echo $userLogin['bio'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Birthday</label>
                                            <input type="date" class="form-control" name="birthday" id="birthday"
                                                value="<?php echo $userLogin['birthday'] ?>">

                                            <!-- Lấy ID -->
                                            <input type="hidden" name="userID"
                                                value="<?php echo $userLogin['userID'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Country</label>
                                            <select class="custom-select" name="country">
                                                <?php foreach ($country_list as $country): ?>
                                                    <option value="<?php echo htmlspecialchars($country); ?>" <?php echo $userLogin['country'] == $country ? 'selected' : ''; ?>>
                                                        <?php echo htmlspecialchars($country); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone"
                                                value="<?php echo $userLogin['phone'] ?>">
                                        </div>
                                    </div>
                                    <div class="text-right mt-3">
                                        <button type="submit" class="btn btn-primary btn-setting">Save
                                            changes</button>
                                        <button type="button" class="btn btn-default btn-cancel btn-setting"
                                            id="cancelButton">Cancel</button>
                                        <!-- Nút Đăng Xuất -->
                                        <a href="../php/logout.php" class="btn btn-danger btn-setting">Logout</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    $(document).ready(function () {
        $('#birthday').datepicker({
            dateFormat: "MM d, yy",
            changeMonth: true,
            changeYear: true,
            yearRange: "1900:2100",
            autoclose: true
        });
    });
</script>

</html>