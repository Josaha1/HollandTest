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
    $sql1 = "SELECT `Sum3R` as R,`SUMI3` as I,`SUMA3` as A,`SUMS3` as S,`SUME3` as E,`SUMC3` as C FROM `logtest` WHERE `Cid` = '$Cid' ORDER BY `TID` DESC LIMIT 1";
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
        <script src="jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    <h5 class="card-title"><b>หมวด 3 อาชีพ</b></h5><br>

                    <div class="row row-cols-3 row-cols-lg-2 g-2 g-lg-3">
                        <?php
                        foreach ($db->to_Obj($sql) as $rows) {
                            if (($rows['Sum3R'] != '') && ($rows['SUMI3'] != '') && ($rows['SUMA3'] != '') && ($rows['SUMS3'] != '') && ($rows['SUME3'] != '') && ($rows['SUMC3'] != '')) {
                        ?>
                                <?php
                                $arrays = $db->to_Obj($sql1)[0];
                                $i = 0;
                                arsort($arrays);

                                foreach ($arrays as $key => $rows) {
                                    $i++;
                                    if ($i > 3) {
                                        continue;
                                    }
                                ?>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control " value="<?= $key ?>" readonly>
                                    </div>
                            <?php }
                            } ?>
                        <?php } ?>
                    </div>
                </div>

                <div class="card-body">
                    <form name="frmUpadateR1" id="frmUpadateR1" action="update/updateR3.php" method="post">
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
                                                <p class="card-text">1.ช่างเทคนิคเครื่องบิน (Airplane Machine) </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3R1'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R1" id="1" class="hidebx" value="1" style="" checked required>
                                                            <label for="1" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R1" id="2" class="hidebx" value="0" style="">
                                                            <label for="2" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3R1'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R1" id="1" class="hidebx" value="1" style="" required>
                                                            <label for="1" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R1" id="2" class="hidebx" value="0" style="" checked>
                                                            <label for="2" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R1" id="1" class="hidebx" value="1" style="" required>
                                                            <label for="1" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R1" id="2" class="hidebx" value="0" style="">
                                                            <label for="2" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 1 -->
                                            <!-- ข้อ 2 -->
                                            <div class="card-asses">
                                                <p class="card-text">2.ผู้ชำนาญเรื่องสัตว์น้ำหรือสัตว์ป่า</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3R2'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R2" id="3" class="hidebx" value="1" style="" checked required>
                                                            <label for="3" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R2" id="4" class="hidebx" value="0" style="">
                                                            <label for="4" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3R2'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R2" id="3" class="hidebx" value="1" style="" required>
                                                            <label for="3" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R2" id="4" class="hidebx" value="0" style="" checked>
                                                            <label for="4" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R2" id="3" class="hidebx" value="1" style="" required>
                                                            <label for="3" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R2" id="4" class="hidebx" value="0" style="">
                                                            <label for="4" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 2 -->
                                            <!-- ข้อ 3 -->
                                            <div class="card-asses">
                                                <p class="card-text">3.ช่างเครื่องยนต์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3R3'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R3" id="5" class="hidebx" value="1" style="" checked required>
                                                            <label for="5" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R3" id="6" class="hidebx" value="0" style="">
                                                            <label for="6" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3R3'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R3" id="5" class="hidebx" value="1" style="" required>
                                                            <label for="5" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R3" id="6" class="hidebx" value="0" checked style="">
                                                            <label for="6" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R3" id="5" class="hidebx" value="1" style="" required>
                                                            <label for="5" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R3" id="6" class="hidebx" value="0" style="">
                                                            <label for="6" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 3 -->
                                            <!-- ข้อ 4 -->
                                            <div class="card-asses">
                                                <p class="card-text">4.ช่างไม้</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3R4'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R4" id="7" class="hidebx" value="1" style="" checked required>
                                                            <label for="7" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R4" id="8" class="hidebx" value="0" style="">
                                                            <label for="8" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3R4'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R4" id="7" class="hidebx" value="1" style="" required>
                                                            <label for="7" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R4" id="8" class="hidebx" value="0" checked style="">
                                                            <label for="8" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R4" id="7" class="hidebx" value="1" style="" required>
                                                            <label for="7" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R4" id="8" class="hidebx" value="0" style="">
                                                            <label for="8" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 4 -->
                                            <!-- ข้อ 5 -->
                                            <div class="card-asses">
                                                <p class="card-text">5.ผู้คุมเครื่องตักดินที่ใช้เครื่องจักร</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3R5'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R5" id="9" class="hidebx" value="1" style="" checked required>
                                                            <label for="9" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R5" id="10" class="hidebx" value="0" style="">
                                                            <label for="10" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3R5'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R5" id="9" class="hidebx" value="1" style="" required>
                                                            <label for="9" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R5" id="10" class="hidebx" value="0" checked style="">
                                                            <label for="10" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R5" id="9" class="hidebx" value="1" style="" required>
                                                            <label for="9" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R5" id="10" class="hidebx" value="0" style="">
                                                            <label for="10" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 5 -->
                                            <!-- ข้อ 6 -->
                                            <div class="card-asses">
                                                <p class="card-text">6.นักสำรวจ</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3R6'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R6" id="11" class="hidebx" value="1" style="" checked required>
                                                            <label for="11" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R6" id="12" class="hidebx" value="0" style="">
                                                            <label for="12" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3R6'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R6" id="11" class="hidebx" value="1" style="" required>
                                                            <label for="11" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R6" id="12" class="hidebx" value="0" checked style="">
                                                            <label for="12" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R6" id="11" class="hidebx" value="1" style="" required>
                                                            <label for="11" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R6" id="12" class="hidebx" value="0" style="">
                                                            <label for="12" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 6 -->
                                            <!-- ข้อ 7 -->
                                            <div class="card-asses">
                                                <p class="card-text">7.ผู้ตรวจงานก่อสร้าง </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3R7'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R7" id="13" class="hidebx" value="1" style="" checked required>
                                                            <label for="13" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R7" id="14" class="hidebx" value="0" style="">
                                                            <label for="14" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3R7'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R7" id="13" class="hidebx" value="1" style="" required>
                                                            <label for="13" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R7" id="14" class="hidebx" value="0" style="" checked>
                                                            <label for="14" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R7" id="13" class="hidebx" value="1" style="" required>
                                                            <label for="13" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R7" id="14" class="hidebx" value="0" style="">
                                                            <label for="14" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 7 -->
                                            <!-- ข้อ 8 -->
                                            <div class="card-asses">
                                                <p class="card-text">8.ผู้ควบคุมการส่งวิทยุ</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3R8'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R8" id="15" class="hidebx" value="1" style="" checked required>
                                                            <label for="15" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R8" id="16" class="hidebx" value="0" style="">
                                                            <label for="16" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3R8'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R8" id="15" class="hidebx" value="1" style="" required>
                                                            <label for="15" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R8" id="16" class="hidebx" value="0" style="" checked>
                                                            <label for="16" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R8" id="15" class="hidebx" value="1" style="" required>
                                                            <label for="15" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R8" id="16" class="hidebx" value="0" style="">
                                                            <label for="16" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 8 -->
                                            <!-- ข้อ 9 -->
                                            <div class="card-asses">
                                                <p class="card-text">9.ผู้ทำงานปั๊มน้ำมัน</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3R9'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R9" id="17" class="hidebx" value="1" style="" checked required>
                                                            <label for="17" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R9" id="18" class="hidebx" value="0" style="">
                                                            <label for="18" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3R9'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R9" id="17" class="hidebx" value="1" style="" required>
                                                            <label for="17" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R9" id="18" class="hidebx" value="0" style="" checked>
                                                            <label for="18" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R9" id="17" class="hidebx" value="1" style="" required>
                                                            <label for="17" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R9" id="18" class="hidebx" value="0" style="">
                                                            <label for="18" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 9 -->
                                            <!-- ข้อ 10 -->
                                            <div class="card-asses">
                                                <p class="card-text">10.ผู้ดูแลสวนป่า สำนักงานเพาะชำ</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3R10'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R10" id="19" class="hidebx" value="1" style="" checked required>
                                                            <label for="19" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R10" id="20" class="hidebx" value="0" style="">
                                                            <label for="20" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3R10'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R10" id="19" class="hidebx" value="1" style="" required>
                                                            <label for="19" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R10" id="20" class="hidebx" value="0" style="" checked>
                                                            <label for="20" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R10" id="19" class="hidebx" value="1" style="" required>
                                                            <label for="19" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R10" id="20" class="hidebx" value="0" style="">
                                                            <label for="20" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 10 -->
                                            <!-- ข้อ 11 -->
                                            <div class="card-asses">
                                                <p class="card-text">11.ผู้ขับรถประจำทาง </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3R11'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R11" id="21" class="hidebx" value="1" style="" checked required>
                                                            <label for="21" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R11" id="22" class="hidebx" value="0" style="">
                                                            <label for="22" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3R11'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R11" id="21" class="hidebx" value="1" style="" required>
                                                            <label for="21" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R11" id="22" class="hidebx" value="0" style="" checked>
                                                            <label for="22" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R11" id="21" class="hidebx" value="1" style="" required>
                                                            <label for="21" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R11" id="22" class="hidebx" value="0" style="">
                                                            <label for="22" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 11 -->
                                            <!-- ข้อ 12 -->
                                            <div class="card-asses">
                                                <p class="card-text">12.วิศวกรรถไฟ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3R12'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R12" id="133" class="hidebx" value="1" style="" checked required>
                                                            <label for="133" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R12" id="134" class="hidebx" value="0" style="">
                                                            <label for="134" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3R12'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R12" id="133" class="hidebx" value="1" style="" required>
                                                            <label for="133" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R12" id="134" class="hidebx" value="0" style="" checked>
                                                            <label for="134" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R12" id="133" class="hidebx" value="1" style="" required>
                                                            <label for="133" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R12" id="134" class="hidebx" value="0" style="">
                                                            <label for="134" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 12 -->
                                            <!-- ข้อ 13 -->
                                            <div class="card-asses">
                                                <p class="card-text">13.ช่างเครื่องกล </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3R13'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R13" id="135" class="hidebx" value="1" style="" checked required>
                                                            <label for="135" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R13" id="136" class="hidebx" value="0" style="">
                                                            <label for="136" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3R13'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R13" id="135" class="hidebx" value="1" style="" required>
                                                            <label for="135" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R13" id="136" class="hidebx" value="0" style="" checked>
                                                            <label for="136" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R13" id="135" class="hidebx" value="1" style="" required>
                                                            <label for="135" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R13" id="136" class="hidebx" value="0" style="">
                                                            <label for="136" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 13 -->
                                            <!-- ข้อ 14 -->
                                            <div class="card-asses">
                                                <p class="card-text">14.ช่างไฟฟ้า </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3R14'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R14" id="137" class="hidebx" value="1" style="" checked required>
                                                            <label for="137" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R14" id="138" class="hidebx" value="0" style="">
                                                            <label for="138" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3R14'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R14" id="137" class="hidebx" value="1" style="" required>
                                                            <label for="137" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R14" id="138" class="hidebx" value="0" style="" checked>
                                                            <label for="138" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R14" id="137" class="hidebx" value="1" style="" required>
                                                            <label for="137" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R14" id="138" class="hidebx" value="0" style="">
                                                            <label for="138" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 14 -->
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
                                                <p class="card-text">1.นักอุตุนิยมวิทยา </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3I1'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I1" id="23" class="hidebx" value="1" style="" checked required>
                                                            <label for="23" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I1" id="24" class="hidebx" value="0" style="">
                                                            <label for="24" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3I1'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I1" id="23" class="hidebx" value="1" style="" required>
                                                            <label for="23" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I1" id="24" class="hidebx" value="0" style="" checked>
                                                            <label for="24" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I1" id="23" class="hidebx" value="1" style="" required>
                                                            <label for="23" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I1" id="24" class="hidebx" value="0" style="">
                                                            <label for="24" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 1 -->
                                            <!-- ข้อ 2 -->
                                            <div class="card-asses">
                                                <p class="card-text">2.นักชีววิทยา </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3I2'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I2" id="25" class="hidebx" value="1" style="" checked required>
                                                            <label for="25" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I2" id="26" class="hidebx" value="0" style="">
                                                            <label for="26" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3I2'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I2" id="25" class="hidebx" value="1" style="" required>
                                                            <label for="25" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I2" id="26" class="hidebx" value="0" style="" checked>
                                                            <label for="26" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I2" id="25" class="hidebx" value="1" style="" required>
                                                            <label for="25" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I2" id="26" class="hidebx" value="0" style="">
                                                            <label for="26" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 2 -->
                                            <!-- ข้อ 3 -->
                                            <div class="card-asses">
                                                <p class="card-text">3.นักดาราศาสตร์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3I3'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I3" id="27" class="hidebx" value="1" style="" checked required>
                                                            <label for="27" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I3" id="28" class="hidebx" value="0" style="">
                                                            <label for="28" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3I3'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I3" id="27" class="hidebx" value="1" style="" required>
                                                            <label for="27" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I3" id="28" class="hidebx" value="0" style="" checked>
                                                            <label for="28" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I3" id="27" class="hidebx" value="1" style="" required>
                                                            <label for="27" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I3" id="28" class="hidebx" value="0" style="">
                                                            <label for="28" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 3 -->
                                            <!-- ข้อ 4 -->
                                            <div class="card-asses">
                                                <p class="card-text">4.นักเทคนิคการแพทย์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3I4'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I4" id="29" class="hidebx" value="1" style="" checked required>
                                                            <label for="29" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I4" id="30" class="hidebx" value="0" style="">
                                                            <label for="30" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3I4'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I4" id="29" class="hidebx" value="1" style="" required>
                                                            <label for="29" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I4" id="30" class="hidebx" value="0" style="" checked>
                                                            <label for="30" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>

                                                        <div class="p-2">
                                                            <input type="radio" name="1I4" id="29" class="hidebx" value="1" style="" required>
                                                            <label for="29" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I4" id="30" class="hidebx" value="0" style="">
                                                            <label for="30" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 4 -->
                                            <!-- ข้อ 5 -->
                                            <div class="card-asses">
                                                <p class="card-text">5.นักมานุษยวิทยา </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3I5'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I5" id="31" class="hidebx" value="1" style="" checked required>
                                                            <label for="31" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I5" id="32" class="hidebx" value="0" style="">
                                                            <label for="32" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3I5'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I5" id="31" class="hidebx" value="1" style="" required>
                                                            <label for="31" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I5" id="32" class="hidebx" value="0" style="" checked>
                                                            <label for="32" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I5" id="31" class="hidebx" value="1" style="" required>
                                                            <label for="31" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I5" id="32" class="hidebx" value="0" style="">
                                                            <label for="32" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 5 -->
                                            <!-- ข้อ 6 -->
                                            <div class="card-asses">
                                                <p class="card-text">6.นักสัตวศาสตร์</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3I6'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I6" id="33" class="hidebx" value="1" style="" checked required>
                                                            <label for="33" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I6" id="34" class="hidebx" value="0" style="">
                                                            <label for="34" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3I6'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I6" id="33" class="hidebx" value="1" style="" required>
                                                            <label for="33" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I6" id="34" class="hidebx" value="0" style="" checked>
                                                            <label for="34" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I6" id="33" class="hidebx" value="1" style="" required>
                                                            <label for="33" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I6" id="34" class="hidebx" value="0" style="">
                                                            <label for="34" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 6 -->
                                            <!-- ข้อ 7 -->
                                            <div class="card-asses">
                                                <p class="card-text">7.นักเคมี </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3I7'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I7" id="35" class="hidebx" value="1" style="" checked required>
                                                            <label for="35" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I7" id="36" class="hidebx" value="0" style="">
                                                            <label for="36" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3I7'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I7" id="35" class="hidebx" value="1" style="" required>
                                                            <label for="35" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I7" id="36" class="hidebx" value="0" style="" checked>
                                                            <label for="36" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I7" id="35" class="hidebx" value="1" style="" required>
                                                            <label for="35" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I7" id="36" class="hidebx" value="0" style="">
                                                            <label for="36" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 7 -->
                                            <!-- ข้อ 8 -->
                                            <div class="card-asses">
                                                <p class="card-text">8.นักวิจัยทางวิทยาศาสตร์ซึ่งทางานอย่างอิสระ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3I8'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I8" id="37" class="hidebx" value="1" style="" checked required>
                                                            <label for="37" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I8" id="38" class="hidebx" value="0" style="">
                                                            <label for="38" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3I8'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I8" id="37" class="hidebx" value="1" style="" required>
                                                            <label for="37" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I8" id="38" class="hidebx" value="0" style="" checked>
                                                            <label for="38" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I8" id="37" class="hidebx" value="1" style="" required>
                                                            <label for="37" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I8" id="38" class="hidebx" value="0" style="">
                                                            <label for="38" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 8 -->
                                            <!-- ข้อ 9 -->
                                            <div class="card-asses">
                                                <p class="card-text">9.ผู้เขียนเรื่อง บทความทางวิทยาศาสตร์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3I9'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I9" id="39" class="hidebx" value="1" style="" checked required>
                                                            <label for="39" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I9" id="40" class="hidebx" value="0" style="">
                                                            <label for="40" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3I9'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I9" id="39" class="hidebx" value="1" style="" required>
                                                            <label for="39" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I9" id="40" class="hidebx" value="0" style="" checked>
                                                            <label for="40" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I9" id="39" class="hidebx" value="1" style="" required>
                                                            <label for="39" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I9" id="40" class="hidebx" value="0" style="">
                                                            <label for="40" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 9 -->
                                            <!-- ข้อ 10 -->
                                            <div class="card-asses">
                                                <p class="card-text">10.บรรณาธิการ วารสารทางวิทยาศาสตร์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3I10'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I10" id="41" class="hidebx" value="1" style="" checked required>
                                                            <label for="41" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I10" id="42" class="hidebx" value="0" style="">
                                                            <label for="42" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3I10'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I10" id="41" class="hidebx" value="1" style="" required>
                                                            <label for="41" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I10" id="42" class="hidebx" value="0" style="" checked>
                                                            <label for="42" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I10" id="41" class="hidebx" value="1" style="" required>
                                                            <label for="41" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I10" id="42" class="hidebx" value="0" style="">
                                                            <label for="42" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 10 -->
                                            <!-- ข้อ 11 -->
                                            <div class="card-asses">
                                                <p class="card-text">11.นักภูมิศาสตร์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3I11'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I11" id="43" class="hidebx" value="1" style="" checked required>
                                                            <label for="43" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I11" id="44" class="hidebx" value="0" style="">
                                                            <label for="44" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3I11'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I11" id="43" class="hidebx" value="1" style="" required>
                                                            <label for="43" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I11" id="44" class="hidebx" value="0" style="" checked>
                                                            <label for="44" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I11" id="43" class="hidebx" value="1" style="" required>
                                                            <label for="43" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I11" id="44" class="hidebx" value="0" style="">
                                                            <label for="44" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 11 -->
                                            <!-- ข้อ 12 -->
                                            <div class="card-asses">
                                                <p class="card-text">12.นักพืชศาสตร์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3I12'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I12" id="139" class="hidebx" value="1" style="" checked required>
                                                            <label for="139" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I12" id="140" class="hidebx" value="0" style="">
                                                            <label for="140" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3I12'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I12" id="139" class="hidebx" value="1" style="" required>
                                                            <label for="139" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I12" id="140" class="hidebx" value="0" style="" checked>
                                                            <label for="140" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I12" id="139" class="hidebx" value="1" style="" required>
                                                            <label for="139" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I12" id="140" class="hidebx" value="0" style="">
                                                            <label for="140" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 12 -->
                                            <!-- ข้อ 13 -->
                                            <div class="card-asses">
                                                <p class="card-text">13.ผู้ทำงาน วิจัยทางด้านวิทยาศาสตร์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3I13'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I13" id="141" class="hidebx" value="1" style="" checked required>
                                                            <label for="141" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I13" id="142" class="hidebx" value="0" style="">
                                                            <label for="142" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3I13'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I13" id="141" class="hidebx" value="1" style="" required>
                                                            <label for="141" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I13" id="142" class="hidebx" value="0" style="" checked>
                                                            <label for="142" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I13" id="141" class="hidebx" value="1" style="" required>
                                                            <label for="141" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I13" id="142" class="hidebx" value="0" style="">
                                                            <label for="142" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 13 -->
                                            <!-- ข้อ 14 -->
                                            <div class="card-asses">
                                                <p class="card-text">14.นักฟิสิกส์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3I14'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I14" id="143" class="hidebx" value="1" style="" checked required>
                                                            <label for="143" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I14" id="144" class="hidebx" value="0" style="">
                                                            <label for="144" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3I14'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I14" id="143" class="hidebx" value="1" style="" required>
                                                            <label for="143" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I14" id="144" class="hidebx" value="0" style="" checked>
                                                            <label for="144" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I14" id="143" class="hidebx" value="1" style="" required>
                                                            <label for="143" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I14" id="144" class="hidebx" value="0" style="">
                                                            <label for="144" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 14 -->
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
                                                <p class="card-text">1.นักกวี </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3A1'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A1" id="145" class="hidebx" value="1" style="" checked required>
                                                            <label for="145" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A1" id="146" class="hidebx" value="0" style="">
                                                            <label for="146" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3A1'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A1" id="145" class="hidebx" value="1" style="" required>
                                                            <label for="145" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A1" id="146" class="hidebx" value="0" style="" checked>
                                                            <label for="146" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A1" id="145" class="hidebx" value="1" style="" required>
                                                            <label for="145" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A1" id="146" class="hidebx" value="0" style="">
                                                            <label for="146" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 1 -->
                                            <!-- ข้อ 2 -->
                                            <div class="card-asses">
                                                <p class="card-text">2.วาทยากร (Conductor) </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3A2'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A2" id="147" class="hidebx" value="1" style="" checked required>
                                                            <label for="147" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A2" id="148" class="hidebx" value="0" style="">
                                                            <label for="148" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3A2'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A2" id="147" class="hidebx" value="1" style="" required>
                                                            <label for="147" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A2" id="148" class="hidebx" value="0" style="" checked>
                                                            <label for="148" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A2" id="147" class="hidebx" value="1" style="" required>
                                                            <label for="147" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A2" id="148" class="hidebx" value="0" style="">
                                                            <label for="148" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 2 -->
                                            <!-- ข้อ 3 -->
                                            <div class="card-asses">
                                                <p class="card-text">3.นักดนตรี </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3A3'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A3" id="149" class="hidebx" value="1" style="" checked required>
                                                            <label for="149" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A3" id="150" class="hidebx" value="0" style="">
                                                            <label for="150" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3A3'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A3" id="149" class="hidebx" value="1" style="" required>
                                                            <label for="149" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A3" id="150" class="hidebx" value="0" style="" checked>
                                                            <label for="150" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A3" id="149" class="hidebx" value="1" style="" required>
                                                            <label for="149" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A3" id="150" class="hidebx" value="0" style="">
                                                            <label for="150" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 3 -->
                                            <!-- ข้อ 4 -->
                                            <div class="card-asses">
                                                <p class="card-text">4.นักประพันธ์นวนิยาย </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3A4'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A4" id="151" class="hidebx" value="1" style="" checked required>
                                                            <label for="151" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A4" id="152" class="hidebx" value="0" style="">
                                                            <label for="152" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3A4'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A4" id="151" class="hidebx" value="1" style="" required>
                                                            <label for="151" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A4" id="152" class="hidebx" value="0" style="" checked>
                                                            <label for="152" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>

                                                        <div class="p-2">
                                                            <input type="radio" name="1A4" id="151" class="hidebx" value="1" style="" required>
                                                            <label for="151" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A4" id="152" class="hidebx" value="0" style="">
                                                            <label for="152" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 4 -->
                                            <!-- ข้อ 5 -->
                                            <div class="card-asses">
                                                <p class="card-text">5.นักธุรกิจโฆษณา พาณิชยศิลป์</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3A5'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A5" id="153" class="hidebx" value="1" style="" checked required>
                                                            <label for="153" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A5" id="154" class="hidebx" value="0" style="">
                                                            <label for="154" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3A5'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A5" id="153" class="hidebx" value="1" style="" required>
                                                            <label for="153" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A5" id="154" class="hidebx" value="0" style="" checked>
                                                            <label for="154" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A5" id="153" class="hidebx" value="1" style="" required>
                                                            <label for="153" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A5" id="154" class="hidebx" value="0" style="">
                                                            <label for="154" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 5 -->
                                            <!-- ข้อ 6 -->
                                            <div class="card-asses">
                                                <p class="card-text">6.นักเขียน </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3A6'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A6" id="155" class="hidebx" value="1" style="" checked required>
                                                            <label for="155" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A6" id="156" class="hidebx" value="0" style="">
                                                            <label for="156" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3A6'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A6" id="155" class="hidebx" value="1" style="" required>
                                                            <label for="155" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A6" id="156" class="hidebx" value="0" style="" checked>
                                                            <label for="156" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A6" id="155" class="hidebx" value="1" style="" required>
                                                            <label for="155" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A6" id="156" class="hidebx" value="0" style="">
                                                            <label for="156" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 6 -->
                                            <!-- ข้อ 7 -->
                                            <div class="card-asses">
                                                <p class="card-text">7.นักเรียบเรียงเสียงประสาน </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3A7'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A7" id="157" class="hidebx" value="1" style="" checked required>
                                                            <label for="157" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A7" id="158" class="hidebx" value="0" style="">
                                                            <label for="158" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3A7'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A7" id="157" class="hidebx" value="1" style="" required>
                                                            <label for="157" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A7" id="158" class="hidebx" value="0" style="" checked>
                                                            <label for="158" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A7" id="157" class="hidebx" value="1" style="" required>
                                                            <label for="157" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A7" id="158" class="hidebx" value="0" style="">
                                                            <label for="158" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 7 -->
                                            <!-- ข้อ 8 -->
                                            <div class="card-asses">
                                                <p class="card-text">8.นักข่าว </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3A8'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A8" id="159" class="hidebx" value="1" style="" checked required>
                                                            <label for="159" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A8" id="160" class="hidebx" value="0" style="">
                                                            <label for="160" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3A8'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A8" id="159" class="hidebx" value="1" style="" required>
                                                            <label for="159" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A8" id="160" class="hidebx" value="0" style="" checked>
                                                            <label for="160" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A8" id="159" class="hidebx" value="1" style="" required>
                                                            <label for="159" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A8" id="160" class="hidebx" value="0" style="">
                                                            <label for="160" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 8 -->
                                            <!-- ข้อ 9 -->
                                            <div class="card-asses">
                                                <p class="card-text">9.นักเขียนรูป</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3A9'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A9" id="161" class="hidebx" value="1" style="" checked required>
                                                            <label for="161" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A9" id="162" class="hidebx" value="0" style="">
                                                            <label for="162" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3A9'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A9" id="161" class="hidebx" value="1" style="" required>
                                                            <label for="161" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A9" id="162" class="hidebx" value="0" style="" checked>
                                                            <label for="162" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A9" id="161" class="hidebx" value="1" style="" required>
                                                            <label for="161" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A9" id="162" class="hidebx" value="0" style="">
                                                            <label for="162" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 9 -->
                                            <!-- ข้อ 10 -->
                                            <div class="card-asses">
                                                <p class="card-text">10.นักร้อง </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3A10'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A10" id="163" class="hidebx" value="1" style="" checked required>
                                                            <label for="163" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A10" id="164" class="hidebx" value="0" style="">
                                                            <label for="164" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3A10'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A10" id="163" class="hidebx" value="1" style="" required>
                                                            <label for="163" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A10" id="164" class="hidebx" value="0" style="" checked>
                                                            <label for="164" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A10" id="163" class="hidebx" value="1" style="" required>
                                                            <label for="163" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A10" id="164" class="hidebx" value="0" style="">
                                                            <label for="164" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 10 -->
                                            <!-- ข้อ 11 -->
                                            <div class="card-asses">
                                                <p class="card-text">11.นักแต่งเพลง เนื้อร้อง ทำนอง </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3A11'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A11" id="165" class="hidebx" value="1" style="" checked required>
                                                            <label for="165" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A11" id="166" class="hidebx" value="0" style="">
                                                            <label for="166" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3A11'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A11" id="165" class="hidebx" value="1" style="" required>
                                                            <label for="165" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A11" id="166" class="hidebx" value="0" style="" checked>
                                                            <label for="166" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A11" id="165" class="hidebx" value="1" style="" required>
                                                            <label for="165" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A11" id="166" class="hidebx" value="0" style="">
                                                            <label for="166" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 11 -->
                                            <!-- ข้อ 12 -->
                                            <div class="card-asses">
                                                <p class="card-text">12.นักประติมากรรม ปั้นแกะสลัก </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3A12'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A12" id="167" class="hidebx" value="1" style="" checked required>
                                                            <label for="167" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A12" id="168" class="hidebx" value="0" style="">
                                                            <label for="168" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3A12'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A12" id="167" class="hidebx" value="1" style="" required>
                                                            <label for="167" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A12" id="168" class="hidebx" value="0" style="" checked>
                                                            <label for="168" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A12" id="167" class="hidebx" value="1" style="" required>
                                                            <label for="167" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A12" id="168" class="hidebx" value="0" style="">
                                                            <label for="168" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 12 -->
                                            <!-- ข้อ 13 -->
                                            <div class="card-asses">
                                                <p class="card-text">13.นักแต่งละคร </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3A13'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A13" id="169" class="hidebx" value="1" style="" checked required>
                                                            <label for="169" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A13" id="170" class="hidebx" value="0" style="">
                                                            <label for="170" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3A13'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A13" id="169" class="hidebx" value="1" style="" required>
                                                            <label for="169" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A13" id="170" class="hidebx" value="0" style="" checked>
                                                            <label for="170" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A13" id="169" class="hidebx" value="1" style="" required>
                                                            <label for="169" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A13" id="170" class="hidebx" value="0" style="">
                                                            <label for="170" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 13 -->
                                            <!-- ข้อ 14 -->
                                            <div class="card-asses">
                                                <p class="card-text">14.นักเขียนการ์ตูน </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3A14'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A14" id="171" class="hidebx" value="1" style="" checked required>
                                                            <label for="171" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A14" id="172" class="hidebx" value="0" style="">
                                                            <label for="172" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3A14'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A14" id="171" class="hidebx" value="1" style="" required>
                                                            <label for="171" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A14" id="172" class="hidebx" value="0" style="" checked>
                                                            <label for="172" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A14" id="171" class="hidebx" value="1" style="" required>
                                                            <label for="171" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A14" id="172" class="hidebx" value="0" style="">
                                                            <label for="172" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 14 -->
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>

                            <!-- End A -->

                            <!-- Start S -->
                            <button class="btn btn-lg " type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExampleS" aria-expanded="false" aria-controls="collapseWidthExample">
                                <img src="" style="">หัวข้อ S
                            </button>


                            <div class="collapse collapse-horizontal" id="collapseWidthExampleS">
                                <div class="content1">

                                    <div class="app-paper">
                                        <?php
                                        foreach ($db->to_Obj($sql) as $rows) {
                                        ?>
                                            <!-- ข้อ 1 -->
                                            <div class="card-asses">
                                                <p class="card-text">1.นักสังคมวิทยา</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3S1'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S1" id="67" class="hidebx" value="1" style="" checked required>
                                                            <label for="67" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S1" id="68" class="hidebx" value="0" style="">
                                                            <label for="68" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3S1'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S1" id="67" class="hidebx" value="1" style="" required>
                                                            <label for="67" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S1" id="68" class="hidebx" value="0" style="" checked>
                                                            <label for="68" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S1" id="67" class="hidebx" value="1" style="" required>
                                                            <label for="67" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S1" id="68" class="hidebx" value="0" style="">
                                                            <label for="68" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 1 -->
                                            <!-- ข้อ 2 -->
                                            <div class="card-asses">
                                                <p class="card-text">2.ครูโรงเรียนมัธยม</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3S2'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S2" id="69" class="hidebx" value="1" style="" checked required>
                                                            <label for="69" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S2" id="70" class="hidebx" value="0" style="">
                                                            <label for="70" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3S2'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S2" id="69" class="hidebx" value="1" style="" required>
                                                            <label for="69" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S2" id="70" class="hidebx" value="0" style="" checked>
                                                            <label for="70" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S2" id="69" class="hidebx" value="1" style="" required>
                                                            <label for="69" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S2" id="70" class="hidebx" value="0" style="">
                                                            <label for="70" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 2 -->
                                            <!-- ข้อ 3 -->
                                            <div class="card-asses">
                                                <p class="card-text">3.ผู้เชี่ยวชาญทางเยาวชนเหลือขอ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3S3'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S3" id="71" class="hidebx" value="1" style="" checked required>
                                                            <label for="71" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S3" id="72" class="hidebx" value="0" style="">
                                                            <label for="72" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3S3'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S3" id="71" class="hidebx" value="1" style="" required>
                                                            <label for="71" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S3" id="72" class="hidebx" value="0" style="" checked>
                                                            <label for="72" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S3" id="71" class="hidebx" value="1" style="" required>
                                                            <label for="71" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S3" id="72" class="hidebx" value="0" style="">
                                                            <label for="72" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 3 -->
                                            <!-- ข้อ 4 -->
                                            <div class="card-asses">
                                                <p class="card-text">4.นักบาบัดทางการพูดที่บกพร่อง </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3S4'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S4" id="73" class="hidebx" value="1" style="" checked required>
                                                            <label for="73" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S4" id="74" class="hidebx" value="0" style="">
                                                            <label for="74" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3S4'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S4" id="73" class="hidebx" value="1" style="" required>
                                                            <label for="73" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S4" id="74" class="hidebx" value="0" style="" checked>
                                                            <label for="74" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>

                                                        <div class="p-2">
                                                            <input type="radio" name="1S4" id="73" class="hidebx" value="1" style="" required>
                                                            <label for="73" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S4" id="74" class="hidebx" value="0" style="">
                                                            <label for="74" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 4 -->
                                            <!-- ข้อ 5 -->
                                            <div class="card-asses">
                                                <p class="card-text">5.ผู้ให้คาปรึกษากับคู่สมรสที่มีปัญหา </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3S5'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S5" id="75" class="hidebx" value="1" style="" checked required>
                                                            <label for="75" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S5" id="76" class="hidebx" value="0" style="">
                                                            <label for="76" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3S5'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S5" id="75" class="hidebx" value="1" style="" required>
                                                            <label for="75" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S5" id="76" class="hidebx" value="0" style="" checked>
                                                            <label for="76" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S5" id="75" class="hidebx" value="1" style="" required>
                                                            <label for="75" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S5" id="76" class="hidebx" value="0" style="">
                                                            <label for="76" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 5 -->
                                            <!-- ข้อ 6 -->
                                            <div class="card-asses">
                                                <p class="card-text">6.ผู้บริหารโรงเรียน </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3S6'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S6" id="77" class="hidebx" value="1" style="" checked required>
                                                            <label for="77" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S6" id="78" class="hidebx" value="0" style="">
                                                            <label for="78" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3S6'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S6" id="77" class="hidebx" value="1" style="" required>
                                                            <label for="77" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S6" id="78" class="hidebx" value="0" style="" checked>
                                                            <label for="78" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S6" id="77" class="hidebx" value="1" style="" required>
                                                            <label for="77" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S6" id="78" class="hidebx" value="0" style="">
                                                            <label for="78" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 6 -->
                                            <!-- ข้อ 7 -->
                                            <div class="card-asses">
                                                <p class="card-text">7.ผู้อำนวยการสถานพักผ่อน/สวนสาธารณะ/สนามเด็กเล่น </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3S7'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S7" id="79" class="hidebx" value="1" style="" checked required>
                                                            <label for="79" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S7" id="80" class="hidebx" value="0" style="">
                                                            <label for="80" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3S7'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S7" id="79" class="hidebx" value="1" style="" required>
                                                            <label for="79" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S7" id="80" class="hidebx" value="0" style="" checked>
                                                            <label for="80" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S7" id="79" class="hidebx" value="1" style="" required>
                                                            <label for="79" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S7" id="80" class="hidebx" value="0" style="">
                                                            <label for="80" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 7 -->
                                            <!-- ข้อ 8 -->
                                            <div class="card-asses">
                                                <p class="card-text">8.นักจิตวิทยาคลินิก </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3S8'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S8" id="81" class="hidebx" value="1" style="" checked required>
                                                            <label for="81" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S8" id="82" class="hidebx" value="0" style="">
                                                            <label for="82" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3S8'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S8" id="81" class="hidebx" value="1" style="" required>
                                                            <label for="81" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S8" id="82" class="hidebx" value="0" style="" checked>
                                                            <label for="82" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S8" id="81" class="hidebx" value="1" style="" required>
                                                            <label for="81" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S8" id="82" class="hidebx" value="0" style="">
                                                            <label for="82" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 8 -->
                                            <!-- ข้อ 9 -->
                                            <div class="card-asses">
                                                <p class="card-text">9.ครูสอนวิชาสังคมศาสตร์</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3S9'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S9" id="83" class="hidebx" value="1" style="" checked required>
                                                            <label for="83" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S9" id="84" class="hidebx" value="0" style="">
                                                            <label for="84" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3S9'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S9" id="83" class="hidebx" value="1" style="" required>
                                                            <label for="83" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S9" id="84" class="hidebx" value="0" style="" checked>
                                                            <label for="84" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S9" id="83" class="hidebx" value="1" style="" required>
                                                            <label for="83" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S9" id="84" class="hidebx" value="0" style="">
                                                            <label for="84" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 9 -->
                                            <!-- ข้อ 10 -->
                                            <div class="card-asses">
                                                <p class="card-text">10.ผู้อำนวยการด้านสวัสดิภาพประชาชน </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3S10'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S10" id="85" class="hidebx" value="1" style="" checked required>
                                                            <label for="85" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S10" id="86" class="hidebx" value="0" style="">
                                                            <label for="86" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3S10'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S10" id="85" class="hidebx" value="1" style="" required>
                                                            <label for="85" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S10" id="86" class="hidebx" value="0" style="" checked>
                                                            <label for="86" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S10" id="85" class="hidebx" value="1" style="" required>
                                                            <label for="85" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S10" id="86" class="hidebx" value="0" style="">
                                                            <label for="86" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 10 -->
                                            <!-- ข้อ 11 -->
                                            <div class="card-asses">
                                                <p class="card-text">11.ผู้ให้คำปรึกษาปัญหาส่วนตัว </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3S11'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S11" id="87" class="hidebx" value="1" style="" checked required>
                                                            <label for="87" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S11" id="88" class="hidebx" value="0" style="">
                                                            <label for="88" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3S11'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S11" id="87" class="hidebx" value="1" style="" required>
                                                            <label for="87" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S11" id="88" class="hidebx" value="0" style="" checked>
                                                            <label for="88" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S11" id="87" class="hidebx" value="1" style="" required>
                                                            <label for="87" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S11" id="88" class="hidebx" value="0" style="">
                                                            <label for="88" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 11 -->
                                            <!-- ข้อ 12 -->
                                            <div class="card-asses">
                                                <p class="card-text">12.ผู้ทำงานทางจิตเวช </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3S12'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S12" id="175" class="hidebx" value="1" style="" checked required>
                                                            <label for="175" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S12" id="176" class="hidebx" value="0" style="">
                                                            <label for="176" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3S12'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S12" id="175" class="hidebx" value="1" style="" required>
                                                            <label for="175" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S12" id="176" class="hidebx" value="0" style="" checked>
                                                            <label for="176" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S12" id="175" class="hidebx" value="1" style="" required>
                                                            <label for="175" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S12" id="176" class="hidebx" value="0" style="">
                                                            <label for="176" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 12 -->
                                            <!-- ข้อ 13 -->
                                            <div class="card-asses">
                                                <p class="card-text">13.ผู้ให้คำปรึกษาด้านอาชีพ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3S13'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S13" id="177" class="hidebx" value="1" style="" checked required>
                                                            <label for="177" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S13" id="178" class="hidebx" value="0" style="">
                                                            <label for="178" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3S13'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S13" id="177" class="hidebx" value="1" style="" required>
                                                            <label for="177" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S13" id="178" class="hidebx" value="0" style="" checked>
                                                            <label for="178" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S13" id="177" class="hidebx" value="1" style="" required>
                                                            <label for="177" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S13" id="178" class="hidebx" value="0" style="">
                                                            <label for="178" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 13 -->
                                            <!-- ข้อ 14 -->
                                            <div class="card-asses">
                                                <p class="card-text">14.ผู้อำนวยการค่ายเยาวชน </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3S14'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S14" id="179" class="hidebx" value="1" style="" checked required>
                                                            <label for="179" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S14" id="180" class="hidebx" value="0" style="">
                                                            <label for="180" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3S14'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S14" id="179" class="hidebx" value="1" style="" required>
                                                            <label for="179" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S14" id="180" class="hidebx" value="0" style="" checked>
                                                            <label for="180" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S14" id="179" class="hidebx" value="1" style="" required>
                                                            <label for="179" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S14" id="180" class="hidebx" value="0" style="">
                                                            <label for="180" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 14 -->
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>

                            <!-- End S -->

                            <!-- Start E -->
                            <button class="btn btn-lg " type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExampleE" aria-expanded="false" aria-controls="collapseWidthExample">
                                <img src="" style="">หัวข้อ E
                            </button>


                            <div class="collapse collapse-horizontal" id="collapseWidthExampleE">
                                <div class="content1">

                                    <div class="app-paper">
                                        <?php
                                        foreach ($db->to_Obj($sql) as $rows) {
                                        ?>
                                            <!-- ข้อ 1 -->
                                            <div class="card-asses">
                                                <p class="card-text">1.ผู้ซื้อขายหุ้น นักคาดการณ์ นักพยากรณ์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3E1'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E1" id="89" class="hidebx" value="1" style="" checked required>
                                                            <label for="89" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E1" id="90" class="hidebx" value="0" style="">
                                                            <label for="90" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3E1'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E1" id="89" class="hidebx" value="1" style="" required>
                                                            <label for="89" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E1" id="90" class="hidebx" value="0" style="" checked>
                                                            <label for="90" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E1" id="89" class="hidebx" value="1" style="" required>
                                                            <label for="89" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E1" id="90" class="hidebx" value="0" style="">
                                                            <label for="90" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 1 -->
                                            <!-- ข้อ 2 -->
                                            <div class="card-asses">
                                                <p class="card-text">2.ผู้ซื้อ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3E2'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E2" id="91" class="hidebx" value="1" style="" checked required>
                                                            <label for="91" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E2" id="92" class="hidebx" value="0" style="">
                                                            <label for="92" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3E2'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E2" id="91" class="hidebx" value="1" style="" required>
                                                            <label for="91" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E2" id="92" class="hidebx" value="0" style="" checked>
                                                            <label for="92" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E2" id="91" class="hidebx" value="1" style="" required>
                                                            <label for="91" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E2" id="92" class="hidebx" value="0" style="">
                                                            <label for="92" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 2 -->
                                            <!-- ข้อ 3 -->
                                            <div class="card-asses">
                                                <p class="card-text">3.ผู้อำนวยการฝ่ายโฆษณา </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3E3'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E3" id="93" class="hidebx" value="1" style="" checked required>
                                                            <label for="93" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E3" id="94" class="hidebx" value="0" style="">
                                                            <label for="94" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3E3'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E3" id="93" class="hidebx" value="1" style="" required>
                                                            <label for="93" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E3" id="94" class="hidebx" value="0" style="" checked>
                                                            <label for="94" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E3" id="93" class="hidebx" value="1" style="" required>
                                                            <label for="93" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E3" id="94" class="hidebx" value="0" style="">
                                                            <label for="94" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 3 -->
                                            <!-- ข้อ 4 -->
                                            <div class="card-asses">
                                                <p class="card-text">4.ตัวแทนจำหน่ายจากโรงงาน ผู้แทนฝ่ายโรงงานผู้ผลิต </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3E4'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E4" id="95" class="hidebx" value="1" style="" checked required>
                                                            <label for="95" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E4" id="96" class="hidebx" value="0" style="">
                                                            <label for="96" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3E4'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E4" id="95" class="hidebx" value="1" style="" required>
                                                            <label for="95" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E4" id="96" class="hidebx" value="0" style="" checked>
                                                            <label for="96" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>

                                                        <div class="p-2">
                                                            <input type="radio" name="1E4" id="95" class="hidebx" value="1" style="" required>
                                                            <label for="95" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E4" id="96" class="hidebx" value="0" style="">
                                                            <label for="96" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 4 -->
                                            <!-- ข้อ 5 -->
                                            <div class="card-asses">
                                                <p class="card-text">5.ผู้จัดรายการโทรทัศน์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3E5'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E5" id="97" class="hidebx" value="1" style="" checked required>
                                                            <label for="97" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E5" id="98" class="hidebx" value="0" style="">
                                                            <label for="98" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3E5'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E5" id="97" class="hidebx" value="1" style="" required>
                                                            <label for="97" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E5" id="98" class="hidebx" value="0" style="" checked>
                                                            <label for="98" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E5" id="97" class="hidebx" value="1" style="" required>
                                                            <label for="97" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E5" id="98" class="hidebx" value="0" style="">
                                                            <label for="98" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 5 -->
                                            <!-- ข้อ 6 -->
                                            <div class="card-asses">
                                                <p class="card-text">6.ผู้จัดการโรงแรม</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3E6'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E6" id="99" class="hidebx" value="1" style="" checked required>
                                                            <label for="99" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E6" id="100" class="hidebx" value="0" style="">
                                                            <label for="100" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3E6'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E6" id="99" class="hidebx" value="1" style="" required>
                                                            <label for="99" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E6" id="100" class="hidebx" value="0" style="" checked>
                                                            <label for="100" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E6" id="99" class="hidebx" value="1" style="" required>
                                                            <label for="99" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E6" id="100" class="hidebx" value="0" style="">
                                                            <label for="100" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 6 -->
                                            <!-- ข้อ 7 -->
                                            <div class="card-asses">
                                                <p class="card-text">7.ผู้จัดการด้านธุรกิจ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3E7'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E7" id="101" class="hidebx" value="1" style="" checked required>
                                                            <label for="101" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E7" id="102" class="hidebx" value="0" style="">
                                                            <label for="102" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3E7'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E7" id="101" class="hidebx" value="1" style="" required>
                                                            <label for="101" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E7" id="102" class="hidebx" value="0" style="" checked>
                                                            <label for="102" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E7" id="101" class="hidebx" value="1" style="" required>
                                                            <label for="101" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E7" id="102" class="hidebx" value="0" style="">
                                                            <label for="102" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 7 -->
                                            <!-- ข้อ 8 -->
                                            <div class="card-asses">
                                                <p class="card-text">8.ผู้จัดการภัตตาคาร </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3E8'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E8" id="103" class="hidebx" value="1" style="" checked required>
                                                            <label for="103" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E8" id="104" class="hidebx" value="0" style="">
                                                            <label for="104" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3E8'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E8" id="103" class="hidebx" value="1" style="" required>
                                                            <label for="103" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E8" id="104" class="hidebx" value="0" style="" checked>
                                                            <label for="104" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E8" id="103" class="hidebx" value="1" style="" required>
                                                            <label for="103" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E8" id="104" class="hidebx" value="0" style="">
                                                            <label for="104" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 8 -->
                                            <!-- ข้อ 9 -->
                                            <div class="card-asses">
                                                <p class="card-text">9.ผู้ดำเนินงานพิธีต่างๆ พิธีกร </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3E9'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E9" id="105" class="hidebx" value="1" style="" checked required>
                                                            <label for="105" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E9" id="106" class="hidebx" value="0" style="">
                                                            <label for="106" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3E9'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E9" id="105" class="hidebx" value="1" style="" required>
                                                            <label for="105" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E9" id="106" class="hidebx" value="0" style="" checked>
                                                            <label for="106" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E9" id="105" class="hidebx" value="1" style="" required>
                                                            <label for="105" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E9" id="106" class="hidebx" value="0" style="">
                                                            <label for="106" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 9 -->
                                            <!-- ข้อ 10 -->
                                            <div class="card-asses">
                                                <p class="card-text">10.คนขายของ พนักงานเดินตลาด </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3E10'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E10" id="107" class="hidebx" value="1" style="" checked required>
                                                            <label for="107" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E10" id="108" class="hidebx" value="0" style="">
                                                            <label for="108" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3E10'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E10" id="107" class="hidebx" value="1" style="" required>
                                                            <label for="107" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E10" id="108" class="hidebx" value="0" style="" checked>
                                                            <label for="108" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E10" id="107" class="hidebx" value="1" style="" required>
                                                            <label for="107" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E10" id="108" class="hidebx" value="0" style="">
                                                            <label for="108" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 10 -->
                                            <!-- ข้อ 11 -->
                                            <div class="card-asses">
                                                <p class="card-text">11.ผู้ดำเนินธุรกิจทางซื้อขายที่ดิน บ้านจัดสรร </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3E11'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E11" id="109" class="hidebx" value="1" style="" checked required>
                                                            <label for="109" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E11" id="110" class="hidebx" value="0" style="">
                                                            <label for="110" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3E11'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E11" id="109" class="hidebx" value="1" style="" required>
                                                            <label for="109" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E11" id="110" class="hidebx" value="0" style="" checked>
                                                            <label for="110" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E11" id="109" class="hidebx" value="1" style="" required>
                                                            <label for="109" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E11" id="110" class="hidebx" value="0" style="">
                                                            <label for="110" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 11 -->
                                            <!-- ข้อ 12 -->
                                            <div class="card-asses">
                                                <p class="card-text">12.ผู้อำนวยการฝ่ายประชาสัมพันธ์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3E12'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E12" id="181" class="hidebx" value="1" style="" checked required>
                                                            <label for="181" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E12" id="182" class="hidebx" value="0" style="">
                                                            <label for="182" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3E12'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E12" id="181" class="hidebx" value="1" style="" required>
                                                            <label for="181" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E12" id="182" class="hidebx" value="0" style="" checked>
                                                            <label for="182" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E12" id="181" class="hidebx" value="1" style="" required>
                                                            <label for="181" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E12" id="182" class="hidebx" value="0" style="">
                                                            <label for="182" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 12 -->
                                            <!-- ข้อ 13 -->
                                            <div class="card-asses">
                                                <p class="card-text">13.ผู้จัดการส่งเสริมด้านกีฬา (Sport promoter) </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3E13'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E13" id="183" class="hidebx" value="1" style="" checked required>
                                                            <label for="183" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E13" id="184" class="hidebx" value="0" style="">
                                                            <label for="184" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3E13'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E13" id="183" class="hidebx" value="1" style="" required>
                                                            <label for="183" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E13" id="184" class="hidebx" value="0" style="" checked>
                                                            <label for="184" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E13" id="183" class="hidebx" value="1" style="" required>
                                                            <label for="183" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E13" id="184" class="hidebx" value="0" style="">
                                                            <label for="184" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 13 -->
                                            <!-- ข้อ 14 -->
                                            <div class="card-asses">
                                                <p class="card-text">14.ผู้จัดการฝ่ายขาย </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3E14'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E14" id="185" class="hidebx" value="1" style="" checked required>
                                                            <label for="185" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E14" id="186" class="hidebx" value="0" style="">
                                                            <label for="186" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3E14'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E14" id="185" class="hidebx" value="1" style="" required>
                                                            <label for="185" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E14" id="186" class="hidebx" value="0" style="" checked>
                                                            <label for="186" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E14" id="185" class="hidebx" value="1" style="" required>
                                                            <label for="185" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E14" id="186" class="hidebx" value="0" style="">
                                                            <label for="186" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 14 -->
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>

                            <!-- End E -->

                            <!-- Start C -->
                            <button class="btn btn-lg " type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExampleC" aria-expanded="false" aria-controls="collapseWidthExample">
                                <img src="" style="">หัวข้อ C
                            </button>


                            <div class="collapse collapse-horizontal" id="collapseWidthExampleC">
                                <div class="content1">

                                    <div class="app-paper">
                                        <?php
                                        foreach ($db->to_Obj($sql) as $rows) {
                                        ?>
                                            <!-- ข้อ 1 -->
                                            <div class="card-asses">
                                                <p class="card-text">1.ผู้ทาบัญชีรายการต่างๆ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3C1'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C1" id="111" class="hidebx" value="1" style="" checked required>
                                                            <label for="111" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C1" id="112" class="hidebx" value="0" style="">
                                                            <label for="112" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3C1'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C1" id="111" class="hidebx" value="1" style="" required>
                                                            <label for="111" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C1" id="112" class="hidebx" value="0" style="" checked>
                                                            <label for="112" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C1" id="111" class="hidebx" value="1" style="" required>
                                                            <label for="111" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C1" id="112" class="hidebx" value="0" style="">
                                                            <label for="112" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 1 -->
                                            <!-- ข้อ 2 -->
                                            <div class="card-asses">
                                                <p class="card-text">2.ครูสอนวิชาบริหารธุรกิจ</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3C2'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C2" id="113" class="hidebx" value="1" style="" checked required>
                                                            <label for="113" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C2" id="114" class="hidebx" value="0" style="">
                                                            <label for="114" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3C2'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C2" id="113" class="hidebx" value="1" style="" required>
                                                            <label for="113" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C2" id="114" class="hidebx" value="0" style="" checked>
                                                            <label for="114" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C2" id="113" class="hidebx" value="1" style="" required>
                                                            <label for="113" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C2" id="114" class="hidebx" value="0" style="">
                                                            <label for="114" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 2 -->
                                            <!-- ข้อ 3 -->
                                            <div class="card-asses">
                                                <p class="card-text">3.ผู้คำนวณรายรับรายจ่าย ผู้พิจารณางบประมาณ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3C3'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C3" id="115" class="hidebx" value="1" style="" checked required>
                                                            <label for="115" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C3" id="116" class="hidebx" value="0" style="">
                                                            <label for="116" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3C3'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C3" id="115" class="hidebx" value="1" style="" required>
                                                            <label for="115" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C3" id="116" class="hidebx" value="0" style="" checked>
                                                            <label for="116" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C3" id="115" class="hidebx" value="1" style="" required>
                                                            <label for="115" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C3" id="116" class="hidebx" value="0" style="">
                                                            <label for="116" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 3 -->
                                            <!-- ข้อ 4 -->
                                            <div class="card-asses">
                                                <p class="card-text">4.ผู้ตรวจสอบบัญชีที่มีใบอนุญาต </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3C4'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C4" id="117" class="hidebx" value="1" style="" checked required>
                                                            <label for="117" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C4" id="118" class="hidebx" value="0" style="">
                                                            <label for="118" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3C4'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C4" id="117" class="hidebx" value="1" style="" required>
                                                            <label for="117" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C4" id="118" class="hidebx" value="0" style="" checked>
                                                            <label for="118" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>

                                                        <div class="p-2">
                                                            <input type="radio" name="1C4" id="117" class="hidebx" value="1" style="" required>
                                                            <label for="117" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C4" id="118" class="hidebx" value="0" style="">
                                                            <label for="118" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 4 -->
                                            <!-- ข้อ 5 -->
                                            <div class="card-asses">
                                                <p class="card-text">5.พนักงานตรวจหลักทรัพย์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3C5'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C5" id="119" class="hidebx" value="1" style="" checked required>
                                                            <label for="119" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C5" id="120" class="hidebx" value="0" style="">
                                                            <label for="120" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3C5'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C5" id="119" class="hidebx" value="1" style="" required>
                                                            <label for="119" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C5" id="120" class="hidebx" value="0" style="" checked>
                                                            <label for="120" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C5" id="119" class="hidebx" value="1" style="" required>
                                                            <label for="119" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C5" id="120" class="hidebx" value="0" style="">
                                                            <label for="120" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 5 -->
                                            <!-- ข้อ 6 -->
                                            <div class="card-asses">
                                                <p class="card-text">6.ผู้บันทึกในศาล </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3C6'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C6" id="121" class="hidebx" value="1" style="" checked required>
                                                            <label for="121" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C6" id="122" class="hidebx" value="0" style="">
                                                            <label for="122" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3C6'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C6" id="121" class="hidebx" value="1" style="" required>
                                                            <label for="121" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C6" id="122" class="hidebx" value="0" style="" checked>
                                                            <label for="122" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C6" id="121" class="hidebx" value="1" style="" required>
                                                            <label for="121" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C6" id="122" class="hidebx" value="0" style="">
                                                            <label for="122" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 6 -->
                                            <!-- ข้อ 7 -->
                                            <div class="card-asses">
                                                <p class="card-text">7.พนักงานธนาคาร (รับจ่ายเงินธนาคาร) </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3C7'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C7" id="123" class="hidebx" value="1" style="" checked required>
                                                            <label for="123" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C7" id="124" class="hidebx" value="0" style="">
                                                            <label for="124" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3C7'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C7" id="123" class="hidebx" value="1" style="" required>
                                                            <label for="123" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C7" id="124" class="hidebx" value="0" style="" checked>
                                                            <label for="124" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C7" id="123" class="hidebx" value="1" style="" required>
                                                            <label for="123" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C7" id="124" class="hidebx" value="0" style="">
                                                            <label for="124" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 7 -->
                                            <!-- ข้อ 8 -->
                                            <div class="card-asses">
                                                <p class="card-text">8.ผู้ชานาญทางภาษี </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3C8'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C8" id="125" class="hidebx" value="1" style="" checked required>
                                                            <label for="125" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C8" id="126" class="hidebx" value="0" style="">
                                                            <label for="126" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3C8'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C8" id="125" class="hidebx" value="1" style="" required>
                                                            <label for="125" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C8" id="126" class="hidebx" value="0" style="" checked>
                                                            <label for="126" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C8" id="125" class="hidebx" value="1" style="" required>
                                                            <label for="125" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C8" id="126" class="hidebx" value="0" style="">
                                                            <label for="126" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 8 -->
                                            <!-- ข้อ 9 -->
                                            <div class="card-asses">
                                                <p class="card-text">9.ผู้ตรวจรายการสินค้าผู้คุม Stock ของ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3C9'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C9" id="127" class="hidebx" value="1" style="" checked required>
                                                            <label for="127" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C9" id="128" class="hidebx" value="0" style="">
                                                            <label for="128" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3C9'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C9" id="127" class="hidebx" value="1" style="" required>
                                                            <label for="127" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C9" id="128" class="hidebx" value="0" style="" checked>
                                                            <label for="128" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C9" id="127" class="hidebx" value="1" style="" required>
                                                            <label for="127" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C9" id="128" class="hidebx" value="0" style="">
                                                            <label for="128" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 9 -->
                                            <!-- ข้อ 10 -->
                                            <div class="card-asses">
                                                <p class="card-text">10.ผู้ควบคุมเครื่องคอมพิวเตอร์ IBM </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3C10'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C10" id="129" class="hidebx" value="1" style="" checked required>
                                                            <label for="129" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C10" id="130" class="hidebx" value="0" style="">
                                                            <label for="130" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3C10'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C10" id="129" class="hidebx" value="1" style="" required>
                                                            <label for="129" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C10" id="130" class="hidebx" value="0" style="" checked>
                                                            <label for="130" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C10" id="129" class="hidebx" value="1" style="" required>
                                                            <label for="129" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C10" id="130" class="hidebx" value="0" style="">
                                                            <label for="130" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 10 -->
                                            <!-- ข้อ 11 -->
                                            <div class="card-asses">
                                                <p class="card-text">11.นักวิจัยการเงิน ผู้วิเคราะห์สถานภาพทางการเงิน</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3C11'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C11" id="131" class="hidebx" value="1" style="" checked required>
                                                            <label for="131" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C11" id="132" class="hidebx" value="0" style="">
                                                            <label for="132" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3C11'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C11" id="131" class="hidebx" value="1" style="" required>
                                                            <label for="131" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C11" id="132" class="hidebx" value="0" style="" checked>
                                                            <label for="132" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C11" id="131" class="hidebx" value="1" style="" required>
                                                            <label for="131" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C11" id="132" class="hidebx" value="0" style="">
                                                            <label for="132" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 11 -->
                                            <!-- ข้อ 12 -->
                                            <div class="card-asses">
                                                <p class="card-text">12.ผู้ประเมินราคาสินค้า</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3C12'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C12" id="187" class="hidebx" value="1" style="" checked required>
                                                            <label for="187" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C12" id="188" class="hidebx" value="0" style="">
                                                            <label for="188" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3C12'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C12" id="187" class="hidebx" value="1" style="" required>
                                                            <label for="187" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C12" id="188" class="hidebx" value="0" style="" checked>
                                                            <label for="188" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C12" id="187" class="hidebx" value="1" style="" required>
                                                            <label for="187" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C12" id="188" class="hidebx" value="0" style="">
                                                            <label for="188" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 12 -->
                                            <!-- ข้อ 13 -->
                                            <div class="card-asses">
                                                <p class="card-text">13.พนักงานจ่ายเงิน </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3C13'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C13" id="189" class="hidebx" value="1" style="" checked required>
                                                            <label for="189" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C13" id="190" class="hidebx" value="0" style="">
                                                            <label for="190" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3C13'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C13" id="189" class="hidebx" value="1" style="" required>
                                                            <label for="189" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C13" id="190" class="hidebx" value="0" style="" checked>
                                                            <label for="190" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C13" id="189" class="hidebx" value="1" style="" required>
                                                            <label for="189" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C13" id="190" class="hidebx" value="0" style="">
                                                            <label for="190" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 13 -->
                                            <!-- ข้อ 14 -->
                                            <div class="card-asses">
                                                <p class="card-text">14.ผู้ตรวจสอบบัญชีธนาคาร </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['3C14'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C14" id="191" class="hidebx" value="1" style="" checked required>
                                                            <label for="191" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C14" id="192" class="hidebx" value="0" style="">
                                                            <label for="192" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['3C14'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C14" id="191" class="hidebx" value="1" style="" required>
                                                            <label for="191" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C14" id="192" class="hidebx" value="0" style="" checked>
                                                            <label for="192" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C14" id="191" class="hidebx" value="1" style="" required>
                                                            <label for="191" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C14" id="192" class="hidebx" value="0" style="">
                                                            <label for="192" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่สนใจ</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 14 -->
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