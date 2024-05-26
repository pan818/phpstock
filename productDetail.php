<?php
session_start();
if (isset($_SESSION['a_username'])) {

    if (isset($_GET["p_id"])) { ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Crud By Php Mysqli พี่เจมส์ ตาโต</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png"
        href="https://scontent.fkkc3-1.fna.fbcdn.net/v/t1.0-9/119980752_337785307574954_1757152202764221432_o.jpg?_nc_cat=105&ccb=2&_nc_sid=09cbfe&_nc_eui2=AeEdQ3uuMUpSNsKpHfjvpUDro1XX0a4IIyujVdfRrggjKx0oaTlnEEJRQqIYyg0KJMUxDMwjlPd-dN2hT7EGYqeo&_nc_ohc=0bT4uczorNcAX96yl_4&_nc_ht=scontent.fkkc3-1.fna&oh=6b8d05997d7e1dd2078a3062bc4a3886&oe=5FBB4911" />
    <!-- การลิ้ง css bootstrap เเบบ cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- การลิ้ง javascript ของ bootstrap เเบบ cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- การลิ้ง sweetalert2 เเบบ cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- google font -->
    <link rel="stylesheet" href="./style/style.css">
</head>

<body class="">


    <!-- การนำเข้า Navbar -->
    <?php include_once("navBar.php"); ?>

    <br>


    <!-- จบ คลาส container -->

    <div class="container my-5 px-0 1">
        <!--Section: Content-->
        <section class="p-3 p-md-5 my-md-5 text-center">

            <?php 
                    //นำเข้าไฟล์ การเชื่อมต่อฐานข้อมูล
                    include_once("config/connectDB.php");

                    $sql = "SELECT * FROM tbl_products WHERE p_id='{$_GET["p_id"]}'";
                    $result = mysqli_query($conn, $sql);

                    // เเสดงข้อมูลจากฐานข้อมูล
                    while ($item = mysqli_fetch_assoc($result)) { ?>
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center align-items-center">
                    <!-- Material form login -->
                    <div class="card" style="width: 400px;">
                        <div class="flex justify-content-center align-items-center pt-5">
                            <img src="./images/box.png" alt="" style="width: 100px;" srcset="">
                        </div>
                        <!--Card content-->
                        <div class="card-body">
                            <!-- Form -->
                            <form class="text-center" style="color: #757575;" action="" method="POST">
                                <h3 class="font-weight-bold my-4 pb-2 text-center text-primary">รายละเอียดสินค้า </h3>
                                <div class="form-group">
                                    <input type="text" readonly value="<?php echo $item["p_name"]; ?>"
                                        class="form-control" required autofocus placeholder="ชื่อสินค้า" name="p_name"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="number" readonly class="form-control"
                                        value="<?php echo $item["p_price"]; ?>" required placeholder="ราคาสินค้า"
                                        name="p_price" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" readonly class="form-control"
                                        value="<?php echo $item["p_count"]; ?>" required placeholder="จำนวนสินค้า"
                                        name="p_count" required>
                                </div>



                            </form>
                            <!-- Form -->

                        </div>

                    </div>
                    <!-- Material form login -->
                </div>
            </div>


            <?php
                    } ?>

        </section>
        <!--Section: Content-->
    </div>
    <!-- จบ คลาส container -->

</body>

</html>

<?php
    }
} else {
    header('Location: login.php');
    exit;
}
?>