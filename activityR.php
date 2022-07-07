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
                    <a href="logout.php" class="btn btn-danger py-4 px-lg-5  d-lg-block">Log Out <i class="fa fa-arrow-right ms-3"></i></a>
                </div>

            </div>
        </nav>
        <!-- Navbar End -->

        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><b>หมวด 1 กิจกรรม</b></h5>
                </div>

                <div class="card-body">
                    <form name="frmUpadateR1" id="frmUpadateR1" action="update/updateR1.php" method="post">
                        <center>
                            <!-- Start R -->
                            <button class="btn btn-lg " type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExampleR" aria-expanded="false" aria-controls="collapseWidthExample">
                                <img src="" style="">หัวข้อ R
                            </button>


                            <div class="collapse collapse-horizontal" id="collapseWidthExampleR">
                                <div class="content1">

                                    <div class="app-paper">
                                        <?php
                                        foreach ($db->to_Obj($sql) as $rows) {
                                        ?>
                                            <!-- ข้อ 1 -->
                                            <div class="card-asses">
                                                <p class="card-text">1.แก้เครื่องไฟฟ้า</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1R1'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R1" id="1" class="hidebx" value="1" style="" checked required>
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
                                                    <?php } elseif ($rows['1R1'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R1" id="1" class="hidebx" value="1" style="" required>
                                                            <label for="1" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R1" id="2" class="hidebx" value="0" style="" checked>
                                                            <label for="2" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
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
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 1 -->
                                            <!-- ข้อ 2 -->
                                            <div class="card-asses">
                                                <p class="card-text">2.แก้เครื่องยนต์</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1R2'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R2" id="3" class="hidebx" value="1" style="" checked required>
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
                                                    <?php } elseif ($rows['1R2'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R2" id="3" class="hidebx" value="1" style="" required>
                                                            <label for="3" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R2" id="4" class="hidebx" value="0" style="" checked>
                                                            <label for="4" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
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
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 2 -->
                                            <!-- ข้อ 3 -->
                                            <div class="card-asses">
                                                <p class="card-text">3.แก้เครื่องจักรกลต่างๆ</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1R3'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R3" id="5" class="hidebx" value="1" style="" checked required>
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
                                                    <?php } elseif ($rows['1R3'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R3" id="5" class="hidebx" value="1" style="" required>
                                                            <label for="5" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R3" id="6" class="hidebx" value="0" checked style="">
                                                            <label for="6" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
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
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 3 -->
                                            <!-- ข้อ 4 -->
                                            <div class="card-asses">
                                                <p class="card-text">4.สร้างสิ่งต่างๆ ด้วยไม้</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1R4'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R4" id="7" class="hidebx" value="1" style="" checked required>
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
                                                    <?php } elseif ($rows['1R4'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R4" id="7" class="hidebx" value="1" style="" required>
                                                            <label for="7" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R4" id="8" class="hidebx" value="0" checked style="">
                                                            <label for="8" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
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
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 4 -->
                                            <!-- ข้อ 5 -->
                                            <div class="card-asses">
                                                <p class="card-text">5.ขับรถบรรทุกรถแทรกเตอร์</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1R5'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R5" id="9" class="hidebx" value="1" style="" checked required>
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
                                                    <?php } elseif ($rows['1R5'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R5" id="9" class="hidebx" value="1" style="" required>
                                                            <label for="9" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R5" id="10" class="hidebx" value="0" checked style="">
                                                            <label for="10" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
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
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 5 -->
                                            <!-- ข้อ 6 -->
                                            <div class="card-asses">
                                                <p class="card-text">6.ใช้วัตถุโลหะหรือทำงานเกี่ยวกับโลหะ ใช้เครื่องมือแกะสลักโลหะ หรือเครื่องมือที่เป็นเครื่องจักร</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1R6'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R6" id="11" class="hidebx" value="1" style="" checked required>
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
                                                    <?php } elseif ($rows['1R6'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R6" id="11" class="hidebx" value="1" style="" required>
                                                            <label for="11" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R6" id="12" class="hidebx" value="0" checked style="">
                                                            <label for="12" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
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
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 6 -->
                                            <!-- ข้อ 7 -->
                                            <div class="card-asses">
                                                <p class="card-text">7.แก้ซ่อมรถจักรยานยนต์</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1R7'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R7" id="13" class="hidebx" value="1" style="" checked required>
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
                                                    <?php } elseif ($rows['1R7'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R7" id="13" class="hidebx" value="1" style="" required>
                                                            <label for="13" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R7" id="14" class="hidebx" value="0" style="" checked>
                                                            <label for="14" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
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
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 7 -->
                                            <!-- ข้อ 8 -->
                                            <div class="card-asses">
                                                <p class="card-text">8.เรียนวิชาประเภทแก้ซ่อม</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1R8'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R8" id="15" class="hidebx" value="1" style="" checked required>
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
                                                    <?php } elseif ($rows['1R8'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R8" id="15" class="hidebx" value="1" style="" required>
                                                            <label for="15" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R8" id="16" class="hidebx" value="0" style="" checked>
                                                            <label for="16" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
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
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 8 -->
                                            <!-- ข้อ 9 -->
                                            <div class="card-asses">
                                                <p class="card-text">9.เรียนวิชาช่างไม้</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1R9'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R9" id="17" class="hidebx" value="1" style="" checked required>
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
                                                    <?php } elseif ($rows['1R9'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R9" id="17" class="hidebx" value="1" style="" required>
                                                            <label for="17" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R9" id="18" class="hidebx" value="0" style="" checked>
                                                            <label for="18" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
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
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 9 -->
                                            <!-- ข้อ 10 -->
                                            <div class="card-asses">
                                                <p class="card-text">10.เรียนช่างเขียนแบบเครื่องยนต์</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1R10'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R10" id="19" class="hidebx" value="1" style="" checked required>
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
                                                    <?php } elseif ($rows['1R10'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R10" id="19" class="hidebx" value="1" style="" required>
                                                            <label for="19" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R10" id="20" class="hidebx" value="0" style="" checked>
                                                            <label for="20" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
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
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 10 -->
                                            <!-- ข้อ 11 -->
                                            <div class="card-asses">
                                                <p class="card-text">11.เรียนวิชาเครื่องจักรกล ช่างเครื่องยนต์</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1R3'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R11" id="21" class="hidebx" value="1" style="" checked required>
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
                                                    <?php } elseif ($rows['1R3'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R11" id="21" class="hidebx" value="1" style="" required>
                                                            <label for="21" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R11" id="22" class="hidebx" value="0" style="" checked>
                                                            <label for="22" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
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
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 11 -->
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>

                            <!-- End R -->

                            <!-- Start I -->
                            <button class="btn btn-lg " type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExampleI" aria-expanded="false" aria-controls="collapseWidthExample">
                                <img src="" style="">หัวข้อ I
                            </button>


                            <div class="collapse collapse-horizontal" id="collapseWidthExampleI">
                                <div class="content1">

                                    <div class="app-paper">
                                        <?php
                                        foreach ($db->to_Obj($sql) as $rows) {
                                        ?>
                                            <!-- ข้อ 1 -->
                                            <div class="card-asses">
                                                <p class="card-text">1.อ่านหนังสือวารสารทางวิทยาศาสตร์</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1I1'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I1" id="23" class="hidebx" value="1" style="" checked required>
                                                            <label for="23" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I1" id="24" class="hidebx" value="0" style="">
                                                            <label for="24" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1I1'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I1" id="23" class="hidebx" value="1" style="" required>
                                                            <label for="23" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I1" id="24" class="hidebx" value="0" style="" checked>
                                                            <label for="24" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I1" id="23" class="hidebx" value="1" style="" required>
                                                            <label for="23" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I1" id="24" class="hidebx" value="0" style="">
                                                            <label for="24" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 1 -->
                                            <!-- ข้อ 2 -->
                                            <div class="card-asses">
                                                <p class="card-text">2.ทำงานในห้องปฏิบัติการ ห้องทดลอง</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1I2'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I2" id="25" class="hidebx" value="1" style="" checked required>
                                                            <label for="25" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I2" id="26" class="hidebx" value="0" style="">
                                                            <label for="26" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1I2'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I2" id="25" class="hidebx" value="1" style="" required>
                                                            <label for="25" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I2" id="26" class="hidebx" value="0" style="" checked>
                                                            <label for="26" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I2" id="25" class="hidebx" value="1" style="" required>
                                                            <label for="25" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I2" id="26" class="hidebx" value="0" style="">
                                                            <label for="26" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 2 -->
                                            <!-- ข้อ 3 -->
                                            <div class="card-asses">
                                                <p class="card-text">3.ทำงานในโครงการด้านวิทยาศาสตร์</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1I3'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I3" id="27" class="hidebx" value="1" style="" checked required>
                                                            <label for="27" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I3" id="28" class="hidebx" value="0" style="">
                                                            <label for="28" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1I3'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I3" id="27" class="hidebx" value="1" style="" required>
                                                            <label for="27" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I3" id="28" class="hidebx" value="0" style="" checked>
                                                            <label for="28" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I3" id="27" class="hidebx" value="1" style="" required>
                                                            <label for="27" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I3" id="28" class="hidebx" value="0" style="">
                                                            <label for="28" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 3 -->
                                            <!-- ข้อ 4 -->
                                            <div class="card-asses">
                                                <p class="card-text">4.สร้างจรวดทดลอง</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1I4'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I4" id="29" class="hidebx" value="1" style="" checked required>
                                                            <label for="29" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I4" id="30" class="hidebx" value="0" style="">
                                                            <label for="30" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1I4'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I4" id="29" class="hidebx" value="1" style="" required>
                                                            <label for="29" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I4" id="30" class="hidebx" value="0" style="" checked>
                                                            <label for="30" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>

                                                        <div class="p-2">
                                                            <input type="radio" name="1I4" id="29" class="hidebx" value="1" style="" required>
                                                            <label for="29" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I4" id="30" class="hidebx" value="0" style="">
                                                            <label for="30" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 4 -->
                                            <!-- ข้อ 5 -->
                                            <div class="card-asses">
                                                <p class="card-text">5.ทำงานกับอุปกรณ์ทางเคมี</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1I5'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I5" id="31" class="hidebx" value="1" style="" checked required>
                                                            <label for="31" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I5" id="32" class="hidebx" value="0" style="">
                                                            <label for="32" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1I5'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I5" id="31" class="hidebx" value="1" style="" required>
                                                            <label for="31" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I5" id="32" class="hidebx" value="0" style="" checked>
                                                            <label for="32" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I5" id="31" class="hidebx" value="1" style="" required>
                                                            <label for="31" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I5" id="32" class="hidebx" value="0" style="">
                                                            <label for="32" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 5 -->
                                            <!-- ข้อ 6 -->
                                            <div class="card-asses">
                                                <p class="card-text">6.อ่านเรื่องความรู้ที่น่าสนใจ</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1I6'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I6" id="33" class="hidebx" value="1" style="" checked required>
                                                            <label for="33" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I6" id="34" class="hidebx" value="0" style="">
                                                            <label for="34" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1I6'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I6" id="33" class="hidebx" value="1" style="" required>
                                                            <label for="33" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I6" id="34" class="hidebx" value="0" style="" checked>
                                                            <label for="34" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I6" id="33" class="hidebx" value="1" style="" required>
                                                            <label for="33" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I6" id="34" class="hidebx" value="0" style="">
                                                            <label for="34" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 6 -->
                                            <!-- ข้อ 7 -->
                                            <div class="card-asses">
                                                <p class="card-text">7.แก้ปัญหาทางคณิตศาสตร์ ปัญหาอักษรไขว้ ฯลฯ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1I7'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I7" id="35" class="hidebx" value="1" style="" checked required>
                                                            <label for="35" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I7" id="36" class="hidebx" value="0" style="">
                                                            <label for="36" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1I7'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I7" id="35" class="hidebx" value="1" style="" required>
                                                            <label for="35" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I7" id="36" class="hidebx" value="0" style="" checked>
                                                            <label for="36" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I7" id="35" class="hidebx" value="1" style="" required>
                                                            <label for="35" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I7" id="36" class="hidebx" value="0" style="">
                                                            <label for="36" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 7 -->
                                            <!-- ข้อ 8 -->
                                            <div class="card-asses">
                                                <p class="card-text">8.เรียนวิชาฟิสิกส์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1I8'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I8" id="37" class="hidebx" value="1" style="" checked required>
                                                            <label for="37" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I8" id="38" class="hidebx" value="0" style="">
                                                            <label for="38" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1I8'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I8" id="37" class="hidebx" value="1" style="" required>
                                                            <label for="37" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I8" id="38" class="hidebx" value="0" style="" checked>
                                                            <label for="38" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I8" id="37" class="hidebx" value="1" style="" required>
                                                            <label for="37" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I8" id="38" class="hidebx" value="0" style="">
                                                            <label for="38" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 8 -->
                                            <!-- ข้อ 9 -->
                                            <div class="card-asses">
                                                <p class="card-text">9.เรียนวิชาเคมี</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1I9'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I9" id="39" class="hidebx" value="1" style="" checked required>
                                                            <label for="39" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I9" id="40" class="hidebx" value="0" style="">
                                                            <label for="40" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1I9'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I9" id="39" class="hidebx" value="1" style="" required>
                                                            <label for="39" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I9" id="40" class="hidebx" value="0" style="" checked>
                                                            <label for="40" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I9" id="39" class="hidebx" value="1" style="" required>
                                                            <label for="39" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I9" id="40" class="hidebx" value="0" style="">
                                                            <label for="40" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 9 -->
                                            <!-- ข้อ 10 -->
                                            <div class="card-asses">
                                                <p class="card-text">10.เรียนวิชาเรขาคณิต</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1I10'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I10" id="41" class="hidebx" value="1" style="" checked required>
                                                            <label for="41" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I10" id="42" class="hidebx" value="0" style="">
                                                            <label for="42" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1I10'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I10" id="41" class="hidebx" value="1" style="" required>
                                                            <label for="41" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I10" id="42" class="hidebx" value="0" style="" checked>
                                                            <label for="42" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I10" id="41" class="hidebx" value="1" style="" required>
                                                            <label for="41" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I10" id="42" class="hidebx" value="0" style="">
                                                            <label for="42" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 10 -->
                                            <!-- ข้อ 11 -->
                                            <div class="card-asses">
                                                <p class="card-text">11.เรียนวิชาทางชีววิทยา </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1I11'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I11" id="43" class="hidebx" value="1" style="" checked required>
                                                            <label for="43" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I11" id="44" class="hidebx" value="0" style="">
                                                            <label for="44" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1I11'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I11" id="43" class="hidebx" value="1" style="" required>
                                                            <label for="43" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I11" id="44" class="hidebx" value="0" style="" checked>
                                                            <label for="44" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I11" id="43" class="hidebx" value="1" style="" required>
                                                            <label for="43" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I11" id="44" class="hidebx" value="0" style="">
                                                            <label for="44" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 11 -->
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>

                            <!-- End I -->

                            <!-- Start A -->
                            <button class="btn btn-lg " type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExampleA" aria-expanded="false" aria-controls="collapseWidthExample">
                                <img src="" style="">หัวข้อ A
                            </button>


                            <div class="collapse collapse-horizontal" id="collapseWidthExampleA">
                                <div class="content1">

                                    <div class="app-paper">
                                        <?php
                                        foreach ($db->to_Obj($sql) as $rows) {
                                        ?>
                                            <!-- ข้อ 1 -->
                                            <div class="card-asses">
                                                <p class="card-text">1.ร่าง วาด ระบาย</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1A1'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A1" id="45" class="hidebx" value="1" style="" checked required>
                                                            <label for="45" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A1" id="46" class="hidebx" value="0" style="">
                                                            <label for="46" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1A1'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A1" id="45" class="hidebx" value="1" style="" required>
                                                            <label for="45" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A1" id="46" class="hidebx" value="0" style="" checked>
                                                            <label for="46" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A1" id="45" class="hidebx" value="1" style="" required>
                                                            <label for="45" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A1" id="46" class="hidebx" value="0" style="">
                                                            <label for="46" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 1 -->
                                            <!-- ข้อ 2 -->
                                            <div class="card-asses">
                                                <p class="card-text">2.ดูละคร</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1A2'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A2" id="47" class="hidebx" value="1" style="" checked required>
                                                            <label for="47" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A2" id="48" class="hidebx" value="0" style="">
                                                            <label for="48" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1A2'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A2" id="47" class="hidebx" value="1" style="" required>
                                                            <label for="47" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A2" id="48" class="hidebx" value="0" style="" checked>
                                                            <label for="48" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A2" id="47" class="hidebx" value="1" style="" required>
                                                            <label for="47" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A2" id="48" class="hidebx" value="0" style="">
                                                            <label for="48" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 2 -->
                                            <!-- ข้อ 3 -->
                                            <div class="card-asses">
                                                <p class="card-text">3.ออกแบบเครื่องเฟอร์นิเจอร์ อาคาร</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1A3'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A3" id="49" class="hidebx" value="1" style="" checked required>
                                                            <label for="49" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A3" id="50" class="hidebx" value="0" style="">
                                                            <label for="50" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1A3'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A3" id="49" class="hidebx" value="1" style="" required>
                                                            <label for="49" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A3" id="50" class="hidebx" value="0" style="" checked>
                                                            <label for="50" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A3" id="49" class="hidebx" value="1" style="" required>
                                                            <label for="49" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A3" id="50" class="hidebx" value="0" style="">
                                                            <label for="50" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 3 -->
                                            <!-- ข้อ 4 -->
                                            <div class="card-asses">
                                                <p class="card-text">4.เล่นในวงดนตรีหรือวงดุริยางค์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1A4'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A4" id="51" class="hidebx" value="1" style="" checked required>
                                                            <label for="51" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A4" id="52" class="hidebx" value="0" style="">
                                                            <label for="52" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1A4'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A4" id="51" class="hidebx" value="1" style="" required>
                                                            <label for="51" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A4" id="52" class="hidebx" value="0" style="" checked>
                                                            <label for="52" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>

                                                        <div class="p-2">
                                                            <input type="radio" name="1A4" id="51" class="hidebx" value="1" style="" required>
                                                            <label for="51" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A4" id="52" class="hidebx" value="0" style="">
                                                            <label for="52" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 4 -->
                                            <!-- ข้อ 5 -->
                                            <div class="card-asses">
                                                <p class="card-text">5.ซ้อมดนตรี</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1A5'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A5" id="53" class="hidebx" value="1" style="" checked required>
                                                            <label for="53" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A5" id="32" class="hidebx" value="0" style="">
                                                            <label for="32" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1A5'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A5" id="53" class="hidebx" value="1" style="" required>
                                                            <label for="53" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A5" id="54" class="hidebx" value="0" style="" checked>
                                                            <label for="54" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A5" id="53" class="hidebx" value="1" style="" required>
                                                            <label for="53" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A5" id="54" class="hidebx" value="0" style="">
                                                            <label for="54" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 5 -->
                                            <!-- ข้อ 6 -->
                                            <div class="card-asses">
                                                <p class="card-text">6.ไปฟังดนตรีหรือคอนเสิร์ต</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1A6'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A6" id="55" class="hidebx" value="1" style="" checked required>
                                                            <label for="55" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A6" id="56" class="hidebx" value="0" style="">
                                                            <label for="56" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1A6'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A6" id="55" class="hidebx" value="1" style="" required>
                                                            <label for="55" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A6" id="56" class="hidebx" value="0" style="" checked>
                                                            <label for="56" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A6" id="55" class="hidebx" value="1" style="" required>
                                                            <label for="55" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A6" id="56" class="hidebx" value="0" style="">
                                                            <label for="56" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 6 -->
                                            <!-- ข้อ 7 -->
                                            <div class="card-asses">
                                                <p class="card-text">7.อ่านนวนิยายที่นิยมแพร่หลาย </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1A7'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A7" id="57" class="hidebx" value="1" style="" checked required>
                                                            <label for="57" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A7" id="36" class="hidebx" value="0" style="">
                                                            <label for="36" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1A7'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A7" id="57" class="hidebx" value="1" style="" required>
                                                            <label for="57" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A7" id="58" class="hidebx" value="0" style="" checked>
                                                            <label for="58" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A7" id="57" class="hidebx" value="1" style="" required>
                                                            <label for="57" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A7" id="58" class="hidebx" value="0" style="">
                                                            <label for="58" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 7 -->
                                            <!-- ข้อ 8 -->
                                            <div class="card-asses">
                                                <p class="card-text">8.วาดรูปเหมือน </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1A8'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A8" id="59" class="hidebx" value="1" style="" checked required>
                                                            <label for="59" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A8" id="60" class="hidebx" value="0" style="">
                                                            <label for="60" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1A8'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A8" id="59" class="hidebx" value="1" style="" required>
                                                            <label for="59" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A8" id="60" class="hidebx" value="0" style="" checked>
                                                            <label for="60" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A8" id="59" class="hidebx" value="1" style="" required>
                                                            <label for="59" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A8" id="60" class="hidebx" value="0" style="">
                                                            <label for="60" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 8 -->
                                            <!-- ข้อ 9 -->
                                            <div class="card-asses">
                                                <p class="card-text">9.อ่านบทละคร</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1A9'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A9" id="61" class="hidebx" value="1" style="" checked required>
                                                            <label for="61" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A9" id="62" class="hidebx" value="0" style="">
                                                            <label for="62" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1A9'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A9" id="61" class="hidebx" value="1" style="" required>
                                                            <label for="61" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A9" id="62" class="hidebx" value="0" style="" checked>
                                                            <label for="62" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A9" id="61" class="hidebx" value="1" style="" required>
                                                            <label for="61" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A9" id="62" class="hidebx" value="0" style="">
                                                            <label for="62" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 9 -->
                                            <!-- ข้อ 10 -->
                                            <div class="card-asses">
                                                <p class="card-text">10.อ่านหรือแต่งโคลง กลอน</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1A10'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A10" id="63" class="hidebx" value="1" style="" checked required>
                                                            <label for="63" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A10" id="64" class="hidebx" value="0" style="">
                                                            <label for="64" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1A10'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A10" id="63" class="hidebx" value="1" style="" required>
                                                            <label for="63" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A10" id="64" class="hidebx" value="0" style="" checked>
                                                            <label for="64" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A10" id="63" class="hidebx" value="1" style="" required>
                                                            <label for="63" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A10" id="64" class="hidebx" value="0" style="">
                                                            <label for="64" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 10 -->
                                            <!-- ข้อ 11 -->
                                            <div class="card-asses">
                                                <p class="card-text">11.เรียนวิชาศิลปะ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1A11'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A11" id="65" class="hidebx" value="1" style="" checked required>
                                                            <label for="65" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A11" id="66" class="hidebx" value="0" style="">
                                                            <label for="66" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1A11'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A11" id="65" class="hidebx" value="1" style="" required>
                                                            <label for="65" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A11" id="66" class="hidebx" value="0" style="" checked>
                                                            <label for="66" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A11" id="65" class="hidebx" value="1" style="" required>
                                                            <label for="65" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A11" id="66" class="hidebx" value="0" style="">
                                                            <label for="66" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 11 -->
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>

                            <!-- End A -->

                            <!-- Start S -->
                            <button class="btn btn-lg " type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExampleE" aria-expanded="false" aria-controls="collapseWidthExample">
                                <img src="" style="">หัวข้อ S
                            </button>


                            <div class="collapse collapse-horizontal" id="collapseWidthExampleE">
                                <div class="content1">

                                    <div class="app-paper">
                                        <?php
                                        foreach ($db->to_Obj($sql) as $rows) {
                                        ?>
                                            <!-- ข้อ 1 -->
                                            <div class="card-asses">
                                                <p class="card-text">1.เขียนจดหมายถึงเพื่อน</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1S1'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S1" id="67" class="hidebx" value="1" style="" checked required>
                                                            <label for="67" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S1" id="68" class="hidebx" value="0" style="">
                                                            <label for="68" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1S1'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S1" id="67" class="hidebx" value="1" style="" required>
                                                            <label for="67" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S1" id="68" class="hidebx" value="0" style="" checked>
                                                            <label for="68" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S1" id="67" class="hidebx" value="1" style="" required>
                                                            <label for="67" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S1" id="68" class="hidebx" value="0" style="">
                                                            <label for="68" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 1 -->
                                            <!-- ข้อ 2 -->
                                            <div class="card-asses">
                                                <p class="card-text">2.เข้าร่วมทาบุญและฟังเทศน์ หรือพิธีทางศาสนา</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1S2'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S2" id="69" class="hidebx" value="1" style="" checked required>
                                                            <label for="69" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S2" id="70" class="hidebx" value="0" style="">
                                                            <label for="70" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1S2'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S2" id="69" class="hidebx" value="1" style="" required>
                                                            <label for="69" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S2" id="70" class="hidebx" value="0" style="" checked>
                                                            <label for="70" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S2" id="69" class="hidebx" value="1" style="" required>
                                                            <label for="69" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S2" id="70" class="hidebx" value="0" style="">
                                                            <label for="70" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 2 -->
                                            <!-- ข้อ 3 -->
                                            <div class="card-asses">
                                                <p class="card-text">3.เป็นสมาชิกขององค์การหรือสโมสรทางสังคม</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1S3'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S3" id="71" class="hidebx" value="1" style="" checked required>
                                                            <label for="71" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S3" id="72" class="hidebx" value="0" style="">
                                                            <label for="72" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1S3'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S3" id="71" class="hidebx" value="1" style="" required>
                                                            <label for="71" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S3" id="72" class="hidebx" value="0" style="" checked>
                                                            <label for="72" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S3" id="71" class="hidebx" value="1" style="" required>
                                                            <label for="71" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S3" id="72" class="hidebx" value="0" style="">
                                                            <label for="72" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 3 -->
                                            <!-- ข้อ 4 -->
                                            <div class="card-asses">
                                                <p class="card-text">4.ช่วยคนมีปัญหาทางจิตใจ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1S4'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S4" id="73" class="hidebx" value="1" style="" checked required>
                                                            <label for="73" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S4" id="74" class="hidebx" value="0" style="">
                                                            <label for="74" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1S4'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S4" id="73" class="hidebx" value="1" style="" required>
                                                            <label for="73" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S4" id="74" class="hidebx" value="0" style="" checked>
                                                            <label for="74" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>

                                                        <div class="p-2">
                                                            <input type="radio" name="1S4" id="73" class="hidebx" value="1" style="" required>
                                                            <label for="73" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S4" id="74" class="hidebx" value="0" style="">
                                                            <label for="74" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 4 -->
                                            <!-- ข้อ 5 -->
                                            <div class="card-asses">
                                                <p class="card-text">5.ดูแลเด็กๆ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1S5'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S5" id="75" class="hidebx" value="1" style="" checked required>
                                                            <label for="75" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S5" id="76" class="hidebx" value="0" style="">
                                                            <label for="76" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1S5'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S5" id="75" class="hidebx" value="1" style="" required>
                                                            <label for="75" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S5" id="76" class="hidebx" value="0" style="" checked>
                                                            <label for="76" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S5" id="75" class="hidebx" value="1" style="" required>
                                                            <label for="75" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S5" id="76" class="hidebx" value="0" style="">
                                                            <label for="76" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 5 -->
                                            <!-- ข้อ 6 -->
                                            <div class="card-asses">
                                                <p class="card-text">6.ไปงานปาร์ตี้หรืองานสังคม งานเลี้ยงสังสรรค์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1S6'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S6" id="77" class="hidebx" value="1" style="" checked required>
                                                            <label for="77" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S6" id="78" class="hidebx" value="0" style="">
                                                            <label for="78" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1S6'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S6" id="77" class="hidebx" value="1" style="" required>
                                                            <label for="77" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S6" id="78" class="hidebx" value="0" style="" checked>
                                                            <label for="78" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S6" id="77" class="hidebx" value="1" style="" required>
                                                            <label for="77" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S6" id="78" class="hidebx" value="0" style="">
                                                            <label for="78" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 6 -->
                                            <!-- ข้อ 7 -->
                                            <div class="card-asses">
                                                <p class="card-text">7.เต้นรำ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1S7'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S7" id="79" class="hidebx" value="1" style="" checked required>
                                                            <label for="79" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S7" id="80" class="hidebx" value="0" style="">
                                                            <label for="80" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1S7'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S7" id="79" class="hidebx" value="1" style="" required>
                                                            <label for="79" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S7" id="80" class="hidebx" value="0" style="" checked>
                                                            <label for="80" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S7" id="79" class="hidebx" value="1" style="" required>
                                                            <label for="79" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S7" id="80" class="hidebx" value="0" style="">
                                                            <label for="80" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 7 -->
                                            <!-- ข้อ 8 -->
                                            <div class="card-asses">
                                                <p class="card-text">8.ชอบอ่านหนังสือจิตวิทยา </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1S8'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S8" id="81" class="hidebx" value="1" style="" checked required>
                                                            <label for="81" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S8" id="82" class="hidebx" value="0" style="">
                                                            <label for="82" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1S8'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S8" id="81" class="hidebx" value="1" style="" required>
                                                            <label for="81" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S8" id="82" class="hidebx" value="0" style="" checked>
                                                            <label for="82" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S8" id="81" class="hidebx" value="1" style="" required>
                                                            <label for="81" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S8" id="82" class="hidebx" value="0" style="">
                                                            <label for="82" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 8 -->
                                            <!-- ข้อ 9 -->
                                            <div class="card-asses">
                                                <p class="card-text">9.เข้าร่วมประชุมทางวิชาการ</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1S9'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S9" id="83" class="hidebx" value="1" style="" checked required>
                                                            <label for="83" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S9" id="84" class="hidebx" value="0" style="">
                                                            <label for="84" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1S9'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S9" id="83" class="hidebx" value="1" style="" required>
                                                            <label for="83" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S9" id="84" class="hidebx" value="0" style="" checked>
                                                            <label for="84" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S9" id="83" class="hidebx" value="1" style="" required>
                                                            <label for="83" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S9" id="84" class="hidebx" value="0" style="">
                                                            <label for="84" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 9 -->
                                            <!-- ข้อ 10 -->
                                            <div class="card-asses">
                                                <p class="card-text">10.ไปดูการแข่งขันกีฬา</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1S10'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S10" id="85" class="hidebx" value="1" style="" checked required>
                                                            <label for="85" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S10" id="86" class="hidebx" value="0" style="">
                                                            <label for="86" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1S10'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S10" id="85" class="hidebx" value="1" style="" required>
                                                            <label for="85" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S10" id="86" class="hidebx" value="0" style="" checked>
                                                            <label for="86" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S10" id="85" class="hidebx" value="1" style="" required>
                                                            <label for="85" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S10" id="86" class="hidebx" value="0" style="">
                                                            <label for="86" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 10 -->
                                            <!-- ข้อ 11 -->
                                            <div class="card-asses">
                                                <p class="card-text">11.รู้จักเพื่อนใหม่ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1S11'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S11" id="87" class="hidebx" value="1" style="" checked required>
                                                            <label for="87" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S11" id="88" class="hidebx" value="0" style="">
                                                            <label for="88" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1S11'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S11" id="87" class="hidebx" value="1" style="" required>
                                                            <label for="87" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S11" id="88" class="hidebx" value="0" style="" checked>
                                                            <label for="88" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S11" id="87" class="hidebx" value="1" style="" required>
                                                            <label for="87" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S11" id="88" class="hidebx" value="0" style="">
                                                            <label for="88" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 11 -->
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>

                            <!-- End S -->

                            <!-- Start E -->
                            <button class="btn btn-lg " type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExampleS" aria-expanded="false" aria-controls="collapseWidthExample">
                                <img src="" style="">หัวข้อ E
                            </button>


                            <div class="collapse collapse-horizontal" id="collapseWidthExampleS">
                                <div class="content1">

                                    <div class="app-paper">
                                        <?php
                                        foreach ($db->to_Obj($sql) as $rows) {
                                        ?>
                                            <!-- ข้อ 1 -->
                                            <div class="card-asses">
                                                <p class="card-text">1.โน้มน้าวจิตใจผู้อื่น</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1E1'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E1" id="67" class="hidebx" value="1" style="" checked required>
                                                            <label for="67" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E1" id="68" class="hidebx" value="0" style="">
                                                            <label for="68" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1E1'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E1" id="67" class="hidebx" value="1" style="" required>
                                                            <label for="67" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E1" id="68" class="hidebx" value="0" style="" checked>
                                                            <label for="68" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E1" id="67" class="hidebx" value="1" style="" required>
                                                            <label for="67" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E1" id="68" class="hidebx" value="0" style="">
                                                            <label for="68" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 1 -->
                                            <!-- ข้อ 2 -->
                                            <div class="card-asses">
                                                <p class="card-text">2.ขายของ</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1E2'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E2" id="69" class="hidebx" value="1" style="" checked required>
                                                            <label for="69" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E2" id="70" class="hidebx" value="0" style="">
                                                            <label for="70" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1E2'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E2" id="69" class="hidebx" value="1" style="" required>
                                                            <label for="69" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E2" id="70" class="hidebx" value="0" style="" checked>
                                                            <label for="70" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E2" id="69" class="hidebx" value="1" style="" required>
                                                            <label for="69" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E2" id="70" class="hidebx" value="0" style="">
                                                            <label for="70" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 2 -->
                                            <!-- ข้อ 3 -->
                                            <div class="card-asses">
                                                <p class="card-text">3.อภิปรายเรื่องการเมือง</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1E3'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E3" id="71" class="hidebx" value="1" style="" checked required>
                                                            <label for="71" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E3" id="72" class="hidebx" value="0" style="">
                                                            <label for="72" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1E3'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E3" id="71" class="hidebx" value="1" style="" required>
                                                            <label for="71" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E3" id="72" class="hidebx" value="0" style="" checked>
                                                            <label for="72" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E3" id="71" class="hidebx" value="1" style="" required>
                                                            <label for="71" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E3" id="72" class="hidebx" value="0" style="">
                                                            <label for="72" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 3 -->
                                            <!-- ข้อ 4 -->
                                            <div class="card-asses">
                                                <p class="card-text">4.จัดการธุรกิจส่วนตัว  </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1E4'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E4" id="73" class="hidebx" value="1" style="" checked required>
                                                            <label for="73" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E4" id="74" class="hidebx" value="0" style="">
                                                            <label for="74" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1E4'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E4" id="73" class="hidebx" value="1" style="" required>
                                                            <label for="73" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E4" id="74" class="hidebx" value="0" style="" checked>
                                                            <label for="74" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>

                                                        <div class="p-2">
                                                            <input type="radio" name="1E4" id="73" class="hidebx" value="1" style="" required>
                                                            <label for="73" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E4" id="74" class="hidebx" value="0" style="">
                                                            <label for="74" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 4 -->
                                            <!-- ข้อ 5 -->
                                            <div class="card-asses">
                                                <p class="card-text">5.เข้าร่วมการประชุม </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1E5'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E5" id="75" class="hidebx" value="1" style="" checked required>
                                                            <label for="75" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E5" id="76" class="hidebx" value="0" style="">
                                                            <label for="76" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1E5'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E5" id="75" class="hidebx" value="1" style="" required>
                                                            <label for="75" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E5" id="76" class="hidebx" value="0" style="" checked>
                                                            <label for="76" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E5" id="75" class="hidebx" value="1" style="" required>
                                                            <label for="75" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E5" id="76" class="hidebx" value="0" style="">
                                                            <label for="76" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 5 -->
                                            <!-- ข้อ 6 -->
                                            <div class="card-asses">
                                                <p class="card-text">6.แสดงปาฐกถา การอภิปราย</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1E6'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E6" id="77" class="hidebx" value="1" style="" checked required>
                                                            <label for="77" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E6" id="78" class="hidebx" value="0" style="">
                                                            <label for="78" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1E6'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E6" id="77" class="hidebx" value="1" style="" required>
                                                            <label for="77" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E6" id="78" class="hidebx" value="0" style="" checked>
                                                            <label for="78" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E6" id="77" class="hidebx" value="1" style="" required>
                                                            <label for="77" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E6" id="78" class="hidebx" value="0" style="">
                                                            <label for="78" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 6 -->
                                            <!-- ข้อ 7 -->
                                            <div class="card-asses">
                                                <p class="card-text">7.ทำงานมีตำแหน่งในหรือกลุ่มองค์การ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1E7'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E7" id="79" class="hidebx" value="1" style="" checked required>
                                                            <label for="79" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E7" id="80" class="hidebx" value="0" style="">
                                                            <label for="80" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1E7'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E7" id="79" class="hidebx" value="1" style="" required>
                                                            <label for="79" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E7" id="80" class="hidebx" value="0" style="" checked>
                                                            <label for="80" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E7" id="79" class="hidebx" value="1" style="" required>
                                                            <label for="79" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E7" id="80" class="hidebx" value="0" style="">
                                                            <label for="80" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 7 -->
                                            <!-- ข้อ 8 -->
                                            <div class="card-asses">
                                                <p class="card-text">8.ให้คาปรึกษาเรื่องงานแก่ผู้อื่น  </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1E8'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E8" id="81" class="hidebx" value="1" style="" checked required>
                                                            <label for="81" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E8" id="82" class="hidebx" value="0" style="">
                                                            <label for="82" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1E8'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E8" id="81" class="hidebx" value="1" style="" required>
                                                            <label for="81" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E8" id="82" class="hidebx" value="0" style="" checked>
                                                            <label for="82" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E8" id="81" class="hidebx" value="1" style="" required>
                                                            <label for="81" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E8" id="82" class="hidebx" value="0" style="">
                                                            <label for="82" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 8 -->
                                            <!-- ข้อ 9 -->
                                            <div class="card-asses">
                                                <p class="card-text">9.พบบุคคลสาคัญ</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1E9'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E9" id="83" class="hidebx" value="1" style="" checked required>
                                                            <label for="83" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E9" id="84" class="hidebx" value="0" style="">
                                                            <label for="84" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1E9'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E9" id="83" class="hidebx" value="1" style="" required>
                                                            <label for="83" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E9" id="84" class="hidebx" value="0" style="" checked>
                                                            <label for="84" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E9" id="83" class="hidebx" value="1" style="" required>
                                                            <label for="83" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E9" id="84" class="hidebx" value="0" style="">
                                                            <label for="84" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 9 -->
                                            <!-- ข้อ 10 -->
                                            <div class="card-asses">
                                                <p class="card-text">10.นำกลุ่มให้บรรลุเป้าหมาย </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1E10'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E10" id="85" class="hidebx" value="1" style="" checked required>
                                                            <label for="85" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E10" id="86" class="hidebx" value="0" style="">
                                                            <label for="86" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1E10'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E10" id="85" class="hidebx" value="1" style="" required>
                                                            <label for="85" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E10" id="86" class="hidebx" value="0" style="" checked>
                                                            <label for="86" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E10" id="85" class="hidebx" value="1" style="" required>
                                                            <label for="85" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E10" id="86" class="hidebx" value="0" style="">
                                                            <label for="86" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 10 -->
                                            <!-- ข้อ 11 -->
                                            <div class="card-asses">
                                                <p class="card-text">11.มีส่วนร่วมในการรณรงค์ทางการเมือง</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['1E11'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E11" id="87" class="hidebx" value="1" style="" checked required>
                                                            <label for="87" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E11" id="88" class="hidebx" value="0" style="">
                                                            <label for="88" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['1E11'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E11" id="87" class="hidebx" value="1" style="" required>
                                                            <label for="87" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E11" id="88" class="hidebx" value="0" style="" checked>
                                                            <label for="88" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E11" id="87" class="hidebx" value="1" style="" required>
                                                            <label for="87" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E11" id="88" class="hidebx" value="0" style="">
                                                            <label for="88" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ชอบ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 11 -->
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>

                            <!-- End E -->
                        </center>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" name="update" value="update" type="submit">ต่อไป</button>
                    </form>
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