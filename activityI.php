<?php
ob_start();
session_start();
if (!$_SESSION["Cid"]) {  //check session

    Header("Location: Login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else {
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

        <link href="css/activity.css" rel="stylesheet">
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
                    <a href="index.php" class="nav-item nav-link active">Home</a>

                </div>
                <a href="logout.php" class="btn btn-danger py-4 px-lg-5 d-none d-lg-block">Log Out<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <!-- Navbar End -->

        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><b>หมวด 1 กิจกรรม</b></h5>
                </div>

                <div class="card-body">

                    <center>
                        <div class="content1">
                            <form name="" id="" action="" method="post">
                                <div class="app-paper">
                                    <h2>I</h2>
                                    <!-- ข้อ 1 -->
                                    <div class="card-asses">
                                        <p class="card-text">1.แก้เครื่องไฟฟ้า</p>
                                        <div class="d-grid gap-3">
                                            <div class="p-2">
                                                <input type="radio" name="1R1" id="1" class="hidebx" value="1" style="" required>
                                                <label for="1" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">A.ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="p-2">
                                                <input type="radio" name="1R1" id="2" class="hidebx" value="0" style="">
                                                <label for="2" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">B.ไม่ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- จบข้อ 1 -->
                                    <!-- ข้อ 2 -->
                                    <div class="card-asses">
                                        <p class="card-text">2.แก้เครื่องยนต์</p>
                                        <div class="d-grid gap-3">
                                            <div class="p-2">
                                                <input type="radio" name="1R2" id="3" class="hidebx" value="1" style="" required>
                                                <label for="3" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">A.ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="p-2">
                                                <input type="radio" name="1R2" id="4" class="hidebx" value="0" style="">
                                                <label for="4" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">B.ไม่ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- จบข้อ 2 -->
                                    <!-- ข้อ 3 -->
                                    <div class="card-asses">
                                        <p class="card-text">3.แก้เครื่องจักรกลต่างๆ</p>
                                        <div class="d-grid gap-3">
                                            <div class="p-2">
                                                <input type="radio" name="1R3" id="5" class="hidebx" value="1" style="" required>
                                                <label for="5" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">A.ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="p-2">
                                                <input type="radio" name="1R3" id="6" class="hidebx" value="0" style="">
                                                <label for="6" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">B.ไม่ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- จบข้อ 3 -->
                                    <!-- ข้อ 4 -->
                                    <div class="card-asses">
                                        <p class="card-text">4.สร้างสิ่งต่างๆ ด้วยไม้</p>
                                        <div class="d-grid gap-3">
                                            <div class="p-2">
                                                <input type="radio" name="1R4" id="7" class="hidebx" value="1" style="" required>
                                                <label for="7" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">A.ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="p-2">
                                                <input type="radio" name="1R4" id="8" class="hidebx" value="0" style="">
                                                <label for="8" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">B.ไม่ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- จบข้อ 4 -->
                                    <!-- ข้อ 5 -->
                                    <div class="card-asses">
                                        <p class="card-text">5.ขับรถบรรทุกรถแทรกเตอร์</p>
                                        <div class="d-grid gap-3">
                                            <div class="p-2">
                                                <input type="radio" name="1R5" id="9" class="hidebx" value="1" style="" required>
                                                <label for="9" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">A.ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="p-2">
                                                <input type="radio" name="1R5" id="10" class="hidebx" value="0" style="">
                                                <label for="10" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">B.ไม่ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- จบข้อ 5 -->
                                    <!-- ข้อ 6 -->
                                    <div class="card-asses">
                                        <p class="card-text">6.ใช้วัตถุโลหะหรือทำงานเกี่ยวกับโลหะ ใช้เครื่องมือแกะสลักโลหะ หรือเครื่องมือที่เป็นเครื่องจักร</p>
                                        <div class="d-grid gap-3">
                                            <div class="p-2">
                                                <input type="radio" name="1R6" id="11" class="hidebx" value="1" style="" required>
                                                <label for="11" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">A.ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="p-2">
                                                <input type="radio" name="1R6" id="12" class="hidebx" value="0" style="">
                                                <label for="12" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">B.ไม่ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- จบข้อ 6 -->
                                    <!-- ข้อ 7 -->
                                    <div class="card-asses">
                                        <p class="card-text">7.แก้ซ่อมรถจักรยานยนต์</p>
                                        <div class="d-grid gap-3">
                                            <div class="p-2">
                                                <input type="radio" name="1R7" id="13" class="hidebx" value="1" style="" required>
                                                <label for="13" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">A.ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="p-2">
                                                <input type="radio" name="1R7" id="14" class="hidebx" value="0" style="">
                                                <label for="14" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">B.ไม่ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- จบข้อ 7 -->
                                    <!-- ข้อ 8 -->
                                    <div class="card-asses">
                                        <p class="card-text">8.เรียนวิชาประเภทแก้ซ่อม</p>
                                        <div class="d-grid gap-3">
                                            <div class="p-2">
                                                <input type="radio" name="1R8" id="15" class="hidebx" value="1" style="" required>
                                                <label for="15" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">A.ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="p-2">
                                                <input type="radio" name="1R8" id="16" class="hidebx" value="0" style="">
                                                <label for="16" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">B.ไม่ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- จบข้อ 8 -->
                                    <!-- ข้อ 9 -->
                                    <div class="card-asses">
                                        <p class="card-text">9.เรียนวิชาช่างไม้</p>
                                        <div class="d-grid gap-3">
                                            <div class="p-2">
                                                <input type="radio" name="1R9" id="17" class="hidebx" value="1" style="" required>
                                                <label for="17" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">A.ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="p-2">
                                                <input type="radio" name="1R9" id="18" class="hidebx" value="0" style="">
                                                <label for="18" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">B.ไม่ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- จบข้อ 9 -->
                                    <!-- ข้อ 10 -->
                                    <div class="card-asses">
                                        <p class="card-text">10.เรียนช่างเขียนแบบเครื่องยนต์</p>
                                        <div class="d-grid gap-3">
                                            <div class="p-2">
                                                <input type="radio" name="1R10" id="19" class="hidebx" value="1" style="" required>
                                                <label for="19" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">A.ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="p-2">
                                                <input type="radio" name="1R10" id="20" class="hidebx" value="0" style="">
                                                <label for="20" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">B.ไม่ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- จบข้อ 10 -->
                                    <!-- ข้อ 11 -->
                                    <div class="card-asses">
                                        <p class="card-text">11.เรียนวิชาเครื่องจักรกล ช่างเครื่องยนต์</p>
                                        <div class="d-grid gap-3">
                                            <div class="p-2">
                                                <input type="radio" name="1R11" id="21" class="hidebx" value="1" style="" required>
                                                <label for="21" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">A.ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="p-2">
                                                <input type="radio" name="1R11" id="22" class="hidebx" value="0" style="">
                                                <label for="22" class="lbl-radio">
                                                    <div class="display-box">
                                                        <div class="size">B.ไม่ชอบ</div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- จบข้อ 11 -->
                                </div>
                            </form>
                        </div>
                    </center>

                </div>
            </div>
        </div>



        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


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