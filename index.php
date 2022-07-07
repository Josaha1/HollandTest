<?php
ob_start();
session_start();
if (!$_SESSION["Cid"]) {  //check session

    Header("Location: Login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else {
?>
    <?php include("class_lib/db_conf.php"); ?>
    <?php include("class_lib/database.php"); ?>
    <?php $db = new Database(); ?>
    <?php
    $Cid = $_SESSION['Cid'];
    $sql = "SELECT * FROM `logtest` WHERE `Cid` = '$Cid' ORDER BY `TID` DESC LIMIT 1";
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Hollnad Test</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                    .forEach(function(form) {
                        form.addEventListener('submit', function(event) {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }

                            form.classList.add('was-validated')
                        }, false)
                    })
            })()
        </script>
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
                <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Hollnad Test</h2>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="logout.php" class="btn btn-danger py-4 px-lg-5  d-lg-block">Log Out <i class="fa fa-arrow-right ms-3"></i></a>

                </div>

            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="content">
                    <form name="frmReset" id="frmReset" action="UpDate.php" method="post">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-lg btn-success" name="btnReset" id="btnReset" value="Reset">เริ่มประเมินใหม่ <i class="fa-solid fa-arrow-rotate-left"></i> </button>
                        </div>
                    </form>
                </div>
                <br>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php
                    foreach ($db->to_Obj($sql) as $rows) {
                    ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-img">
                                    <img src="https://www.pngmart.com/files/21/Activities-PNG-File.png" class="card-img-top" style="width:100%;max-width: 350px;" alt="...">
                                </div>
                                <div class="card-header">
                                    <h5 class="card-title">หมวดที่ 1 กิจกรรม</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">ขอให้ท่านเลือก "ชอบ" สำหรับกิจกรรมที่ท่านชอบทำ และช่อง "ไม่ชอบ" ในกิจกรรมที่ท่านไม่ชอบ หรือรู้สึกเฉยๆ ต่อไปนี้</p>
                                </div>
                                <div class="card-footer">
                                    <a href="activityR.php"><button class="btn btn-primary">ไปตอบแบบทดสอบ</button></a>
                                </div>
                            </div>

                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-img2">
                                    <img src="https://png.pngtree.com/png-vector/20220531/ourmid/pngtree-ability-access-balance-banking-businessman-png-image_4770617.png" style="width:100%;max-width: 350px;" class="card-img-top" alt="...">
                                </div>
                                <div class="card-header">
                                    <h5 class="card-title">หมวดที่ 2 ความสามารถ</h5>
                                </div>
                                <div class="card-body">

                                    <p class="card-text">ขอให้ท่านเลือก "ใช่" สำหรับความสามารถที่ท่านมีทักษะ และช่อง "ไม่ใช่" หมายความทั้งทักษะที่ท่านไม่มี หรือถ้ามีก็ทาได้ไม่ชำนาญ</p>
                                </div>
                                <div class="card-footer">
                                    <?php if ($rows['Sum1R'] != '') { ?>
                                        <a href="activity2.php"><button class="btn btn-primary">ไปตอบแบบทดสอบ</button></a>
                                    <?php } else { ?>
                                        <button class="btn btn-primary" disabled>ไปตอบแบบทดสอบ</button>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-img">
                                    <img src="https://cdn.pixabay.com/photo/2017/08/27/21/42/man-2687628_1280.png" style="width:100%;max-width: 350px;height: 250px;" class="card-img-top" alt="...">
                                </div>
                                <div class="card-header">
                                    <h5 class="card-title">หมวดที่ 3 อาชีพ</h5>
                                </div>
                                <div class="card-body">

                                    <p class="card-text">แบบทดสอบนี้ จะสำรวจความรู้สึกและเจตคติของท่านเกี่ยวกับงานหลากหลายชนิด หากอาชีพใดที่ท่านรู้สึกชอบ หรือสนใจ ขอให้ท่านเลือก "สนใจ" และหากท่านไม่ชอบอาชีพใด ขอให้ท่านเลือก "ไม่สนใจ"</p>
                                </div>
                                <div class="card-footer">
                                    <?php if ($rows['Sum2R'] != '') { ?>
                                        <a href="activity3.php"><button class="btn btn-primary">ไปตอบแบบทดสอบ</button></a>
                                    <?php } else { ?>
                                        <button class="btn btn-primary" disabled>ไปตอบแบบทดสอบ</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Service End -->




        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-danger btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

    </html>
<?php } ?>