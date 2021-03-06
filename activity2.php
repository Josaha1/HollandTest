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
    $sql1 = "SELECT `Sum2R` as R,`SUMI2` as I,`SUMA2` as A,`SUMS2` as S,`SUME2` as E,`SUMC2` as C FROM `logtest` WHERE `Cid` = '$Cid' ORDER BY `TID` DESC LIMIT 1";
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
                    <h5 class="card-title"><b>หมวด 2 ความสามารถ</b></h5><br>


                    <?php
                    foreach ($db->to_Obj($sql) as $rows) {
                        if (($rows['Sum2R'] != '') && ($rows['SUMI2'] != '') && ($rows['SUMA2'] != '') && ($rows['SUMS2'] != '') && ($rows['SUME2'] != '') && ($rows['SUMC2'] != '')) {
                    ?>

                            <div class="d-flex justify-content-center">
                                <h6>หัวข้อที่ได้คะแนนมากที่สุด</h6>
                            </div>

                            <div class="row row-cols-3 row-cols-lg-2 g-2 g-lg-3">
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
                            </div>
                    <?php }
                            } ?>

                <?php } ?>

                </div>

                <div class="card-body">
                    <form name="frmUpadateR1" id="frmUpadateR1" action="update/updateR2.php" method="post">
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
                                                <p class="card-text">1.ฉันสามารถใช้เครื่องมือทางช่างไม้ เช่น เลื่อย หรือเครื่องกลึง</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2R1'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R1" id="1" class="hidebx" value="1" style="" checked required>
                                                            <label for="1" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R1" id="2" class="hidebx" value="0" style="">
                                                            <label for="2" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2R1'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R1" id="1" class="hidebx" value="1" style="" required>
                                                            <label for="1" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R1" id="2" class="hidebx" value="0" style="" checked>
                                                            <label for="2" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R1" id="1" class="hidebx" value="1" style="" required>
                                                            <label for="1" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R1" id="2" class="hidebx" value="0" style="">
                                                            <label for="2" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 1 -->
                                            <!-- ข้อ 2 -->
                                            <div class="card-asses">
                                                <p class="card-text">2.ฉันใช้เครื่องมือวัดไฟฟ้า (Voltmeter) ได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2R2'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R2" id="3" class="hidebx" value="1" style="" checked required>
                                                            <label for="3" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R2" id="4" class="hidebx" value="0" style="">
                                                            <label for="4" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2R2'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R2" id="3" class="hidebx" value="1" style="" required>
                                                            <label for="3" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R2" id="4" class="hidebx" value="0" style="" checked>
                                                            <label for="4" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R2" id="3" class="hidebx" value="1" style="" required>
                                                            <label for="3" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R2" id="4" class="hidebx" value="0" style="">
                                                            <label for="4" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 2 -->
                                            <!-- ข้อ 3 -->
                                            <div class="card-asses">
                                                <p class="card-text">3.ฉันปรับคาร์บูเรเตอร์ได้</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2R3'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R3" id="5" class="hidebx" value="1" style="" checked required>
                                                            <label for="5" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R3" id="6" class="hidebx" value="0" style="">
                                                            <label for="6" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2R3'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R3" id="5" class="hidebx" value="1" style="" required>
                                                            <label for="5" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R3" id="6" class="hidebx" value="0" checked style="">
                                                            <label for="6" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R3" id="5" class="hidebx" value="1" style="" required>
                                                            <label for="5" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R3" id="6" class="hidebx" value="0" style="">
                                                            <label for="6" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 3 -->
                                            <!-- ข้อ 4 -->
                                            <div class="card-asses">
                                                <p class="card-text">4.ฉันสามารถใช้เครื่องมือไฟฟ้าในการเจาะ บด ปั่นและจักรเย็บผ้าได้</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2R4'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R4" id="7" class="hidebx" value="1" style="" checked required>
                                                            <label for="7" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R4" id="8" class="hidebx" value="0" style="">
                                                            <label for="8" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2R4'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R4" id="7" class="hidebx" value="1" style="" required>
                                                            <label for="7" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R4" id="8" class="hidebx" value="0" checked style="">
                                                            <label for="8" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R4" id="7" class="hidebx" value="1" style="" required>
                                                            <label for="7" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R4" id="8" class="hidebx" value="0" style="">
                                                            <label for="8" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 4 -->
                                            <!-- ข้อ 5 -->
                                            <div class="card-asses">
                                                <p class="card-text">5.ฉันสามารถขัด ถู ทานำมันขัดเงา หรือซ่อมแซมเครื่องเรือนได้</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2R5'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R5" id="9" class="hidebx" value="1" style="" checked required>
                                                            <label for="9" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R5" id="10" class="hidebx" value="0" style="">
                                                            <label for="10" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2R5'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R5" id="9" class="hidebx" value="1" style="" required>
                                                            <label for="9" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R5" id="10" class="hidebx" value="0" checked style="">
                                                            <label for="10" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R5" id="9" class="hidebx" value="1" style="" required>
                                                            <label for="9" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R5" id="10" class="hidebx" value="0" style="">
                                                            <label for="10" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 5 -->
                                            <!-- ข้อ 6 -->
                                            <div class="card-asses">
                                                <p class="card-text">6.ฉันอ่านพิมพ์เขียว (Blue Print) ได้</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2R6'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R6" id="11" class="hidebx" value="1" style="" checked required>
                                                            <label for="11" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R6" id="12" class="hidebx" value="0" style="">
                                                            <label for="12" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2R6'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R6" id="11" class="hidebx" value="1" style="" required>
                                                            <label for="11" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R6" id="12" class="hidebx" value="0" checked style="">
                                                            <label for="12" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R6" id="11" class="hidebx" value="1" style="" required>
                                                            <label for="11" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R6" id="12" class="hidebx" value="0" style="">
                                                            <label for="12" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 6 -->
                                            <!-- ข้อ 7 -->
                                            <div class="card-asses">
                                                <p class="card-text">7.ฉันแก้ ซ่อมเครื่องไฟฟ้าเล็กๆ น้อยๆ ในบ้านได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2R7'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R7" id="13" class="hidebx" value="1" style="" checked required>
                                                            <label for="13" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R7" id="14" class="hidebx" value="0" style="">
                                                            <label for="14" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2R7'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R7" id="13" class="hidebx" value="1" style="" required>
                                                            <label for="13" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R7" id="14" class="hidebx" value="0" style="" checked>
                                                            <label for="14" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R7" id="13" class="hidebx" value="1" style="" required>
                                                            <label for="13" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R7" id="14" class="hidebx" value="0" style="">
                                                            <label for="14" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 7 -->
                                            <!-- ข้อ 8 -->
                                            <div class="card-asses">
                                                <p class="card-text">8.ฉันซ่อมเครื่องเรือนที่ชารุดได้</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2R8'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R8" id="15" class="hidebx" value="1" style="" checked required>
                                                            <label for="15" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R8" id="16" class="hidebx" value="0" style="">
                                                            <label for="16" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2R8'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R8" id="15" class="hidebx" value="1" style="" required>
                                                            <label for="15" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R8" id="16" class="hidebx" value="0" style="" checked>
                                                            <label for="16" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R8" id="15" class="hidebx" value="1" style="" required>
                                                            <label for="15" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R8" id="16" class="hidebx" value="0" style="">
                                                            <label for="16" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 8 -->
                                            <!-- ข้อ 9 -->
                                            <div class="card-asses">
                                                <p class="card-text">9.ฉันแก้ ซ่อมทีวี เล็กๆ น้อยๆ ได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2R9'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R9" id="17" class="hidebx" value="1" style="" checked required>
                                                            <label for="17" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R9" id="18" class="hidebx" value="0" style="">
                                                            <label for="18" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2R9'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R9" id="17" class="hidebx" value="1" style="" required>
                                                            <label for="17" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R9" id="18" class="hidebx" value="0" style="" checked>
                                                            <label for="18" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R9" id="17" class="hidebx" value="1" style="" required>
                                                            <label for="17" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R9" id="18" class="hidebx" value="0" style="">
                                                            <label for="18" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 9 -->
                                            <!-- ข้อ 10 -->
                                            <div class="card-asses">
                                                <p class="card-text">10.ฉันสามารถซ่อมท่อน้ำง่ายๆ ได้</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2R10'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R10" id="19" class="hidebx" value="1" style="" checked required>
                                                            <label for="19" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R10" id="20" class="hidebx" value="0" style="">
                                                            <label for="20" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2R10'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R10" id="19" class="hidebx" value="1" style="" required>
                                                            <label for="19" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R10" id="20" class="hidebx" value="0" style="" checked>
                                                            <label for="20" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R10" id="19" class="hidebx" value="1" style="" required>
                                                            <label for="19" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R10" id="20" class="hidebx" value="0" style="">
                                                            <label for="20" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 10 -->
                                            <!-- ข้อ 11 -->
                                            <div class="card-asses">
                                                <p class="card-text">11.ฉันสามารถเขียนภาพเครื่องจักรกลได้</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2R11'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R11" id="21" class="hidebx" value="1" style="" checked required>
                                                            <label for="21" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R11" id="22" class="hidebx" value="0" style="">
                                                            <label for="22" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2R11'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R11" id="21" class="hidebx" value="1" style="" required>
                                                            <label for="21" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R11" id="22" class="hidebx" value="0" style="" checked>
                                                            <label for="22" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R11" id="21" class="hidebx" value="1" style="" required>
                                                            <label for="21" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1R11" id="22" class="hidebx" value="0" style="">
                                                            <label for="22" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
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
                                                <p class="card-text">1.ฉันเข้าใจการทำงานของทอดสุญญากาศ (Vacuum tube) </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2I1'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I1" id="23" class="hidebx" value="1" style="" checked required>
                                                            <label for="23" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I1" id="24" class="hidebx" value="0" style="">
                                                            <label for="24" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2I1'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I1" id="23" class="hidebx" value="1" style="" required>
                                                            <label for="23" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I1" id="24" class="hidebx" value="0" style="" checked>
                                                            <label for="24" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I1" id="23" class="hidebx" value="1" style="" required>
                                                            <label for="23" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I1" id="24" class="hidebx" value="0" style="">
                                                            <label for="24" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 1 -->
                                            <!-- ข้อ 2 -->
                                            <div class="card-asses">
                                                <p class="card-text">2.ฉันบอกชื่ออาหาร 3 ชนิดที่มีโปรตีนสูงได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2I2'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I2" id="25" class="hidebx" value="1" style="" checked required>
                                                            <label for="25" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I2" id="26" class="hidebx" value="0" style="">
                                                            <label for="26" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2I2'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I2" id="25" class="hidebx" value="1" style="" required>
                                                            <label for="25" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I2" id="26" class="hidebx" value="0" style="" checked>
                                                            <label for="26" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I2" id="25" class="hidebx" value="1" style="" required>
                                                            <label for="25" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I2" id="26" class="hidebx" value="0" style="">
                                                            <label for="26" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 2 -->
                                            <!-- ข้อ 3 -->
                                            <div class="card-asses">
                                                <p class="card-text">3.ฉันเข้าใจ “เวลาครึ่งชีวิต” ของสารกัมมันตภาพรังสี </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2I3'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I3" id="27" class="hidebx" value="1" style="" checked required>
                                                            <label for="27" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I3" id="28" class="hidebx" value="0" style="">
                                                            <label for="28" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2I3'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I3" id="27" class="hidebx" value="1" style="" required>
                                                            <label for="27" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I3" id="28" class="hidebx" value="0" style="" checked>
                                                            <label for="28" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I3" id="27" class="hidebx" value="1" style="" required>
                                                            <label for="27" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I3" id="28" class="hidebx" value="0" style="">
                                                            <label for="28" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 3 -->
                                            <!-- ข้อ 4 -->
                                            <div class="card-asses">
                                                <p class="card-text">4.ฉันรู้จักใช้ตารางเลขกำลังที่ใช้ในการคำนวณ (ตาราง logarithm)</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2I4'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I4" id="29" class="hidebx" value="1" style="" checked required>
                                                            <label for="29" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I4" id="30" class="hidebx" value="0" style="">
                                                            <label for="30" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2I4'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I4" id="29" class="hidebx" value="1" style="" required>
                                                            <label for="29" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I4" id="30" class="hidebx" value="0" style="" checked>
                                                            <label for="30" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>

                                                        <div class="p-2">
                                                            <input type="radio" name="1I4" id="29" class="hidebx" value="1" style="" required>
                                                            <label for="29" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I4" id="30" class="hidebx" value="0" style="">
                                                            <label for="30" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 4 -->
                                            <!-- ข้อ 5 -->
                                            <div class="card-asses">
                                                <p class="card-text">5.ฉันรู้จักใช้เครื่องมือทางคณิตศาสตร์สำหรับคูณหรือหารเช่น เครื่องคิดเลข</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2I5'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I5" id="31" class="hidebx" value="1" style="" checked required>
                                                            <label for="31" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I5" id="32" class="hidebx" value="0" style="">
                                                            <label for="32" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2I5'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I5" id="31" class="hidebx" value="1" style="" required>
                                                            <label for="31" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I5" id="32" class="hidebx" value="0" style="" checked>
                                                            <label for="32" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I5" id="31" class="hidebx" value="1" style="" required>
                                                            <label for="31" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I5" id="32" class="hidebx" value="0" style="">
                                                            <label for="32" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 5 -->
                                            <!-- ข้อ 6 -->
                                            <div class="card-asses">
                                                <p class="card-text">6.ฉันรู้จักวิธีใช้กล้องจุลทรรศน์</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2I6'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I6" id="33" class="hidebx" value="1" style="" checked required>
                                                            <label for="33" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I6" id="34" class="hidebx" value="0" style="">
                                                            <label for="34" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2I6'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I6" id="33" class="hidebx" value="1" style="" required>
                                                            <label for="33" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I6" id="34" class="hidebx" value="0" style="" checked>
                                                            <label for="34" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I6" id="33" class="hidebx" value="1" style="" required>
                                                            <label for="33" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I6" id="34" class="hidebx" value="0" style="">
                                                            <label for="34" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 6 -->
                                            <!-- ข้อ 7 -->
                                            <div class="card-asses">
                                                <p class="card-text">7.ฉันสามารถชี้บอกหมู่ดาว 3 หมู่ได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2I7'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I7" id="35" class="hidebx" value="1" style="" checked required>
                                                            <label for="35" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I7" id="36" class="hidebx" value="0" style="">
                                                            <label for="36" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2I7'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I7" id="35" class="hidebx" value="1" style="" required>
                                                            <label for="35" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I7" id="36" class="hidebx" value="0" style="" checked>
                                                            <label for="36" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I7" id="35" class="hidebx" value="1" style="" required>
                                                            <label for="35" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I7" id="36" class="hidebx" value="0" style="">
                                                            <label for="36" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 7 -->
                                            <!-- ข้อ 8 -->
                                            <div class="card-asses">
                                                <p class="card-text">8.ฉันสามารถบรรยายเกี่ยวกับหน้าที่ของเม็ดเลือดขาวได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2I8'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I8" id="37" class="hidebx" value="1" style="" checked required>
                                                            <label for="37" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I8" id="38" class="hidebx" value="0" style="">
                                                            <label for="38" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2I8'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I8" id="37" class="hidebx" value="1" style="" required>
                                                            <label for="37" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I8" id="38" class="hidebx" value="0" style="" checked>
                                                            <label for="38" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I8" id="37" class="hidebx" value="1" style="" required>
                                                            <label for="37" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I8" id="38" class="hidebx" value="0" style="">
                                                            <label for="38" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 8 -->
                                            <!-- ข้อ 9 -->
                                            <div class="card-asses">
                                                <p class="card-text">9.ฉันสามารถแปลความหมายของสูตรโครงสร้างทางเคมีง่ายๆ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2I9'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I9" id="39" class="hidebx" value="1" style="" checked required>
                                                            <label for="39" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I9" id="40" class="hidebx" value="0" style="">
                                                            <label for="40" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2I9'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I9" id="39" class="hidebx" value="1" style="" required>
                                                            <label for="39" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I9" id="40" class="hidebx" value="0" style="" checked>
                                                            <label for="40" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I9" id="39" class="hidebx" value="1" style="" required>
                                                            <label for="39" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I9" id="40" class="hidebx" value="0" style="">
                                                            <label for="40" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 9 -->
                                            <!-- ข้อ 10 -->
                                            <div class="card-asses">
                                                <p class="card-text">10.ฉันเข้าใจเหตุผลว่าทำไมดาวเทียมไม่ตกมายังโลก</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2I10'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I10" id="41" class="hidebx" value="1" style="" checked required>
                                                            <label for="41" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I10" id="42" class="hidebx" value="0" style="">
                                                            <label for="42" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2I10'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I10" id="41" class="hidebx" value="1" style="" required>
                                                            <label for="41" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I10" id="42" class="hidebx" value="0" style="" checked>
                                                            <label for="42" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I10" id="41" class="hidebx" value="1" style="" required>
                                                            <label for="41" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I10" id="42" class="hidebx" value="0" style="">
                                                            <label for="42" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 10 -->
                                            <!-- ข้อ 11 -->
                                            <div class="card-asses">
                                                <p class="card-text">11.ฉันเคยร่วมงานแสดงประกวดสิ่งของทางวิทยาศาสตร์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2I11'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I11" id="43" class="hidebx" value="1" style="" checked required>
                                                            <label for="43" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I11" id="44" class="hidebx" value="0" style="">
                                                            <label for="44" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2I11'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I11" id="43" class="hidebx" value="1" style="" required>
                                                            <label for="43" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I11" id="44" class="hidebx" value="0" style="" checked>
                                                            <label for="44" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I11" id="43" class="hidebx" value="1" style="" required>
                                                            <label for="43" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1I11" id="44" class="hidebx" value="0" style="">
                                                            <label for="44" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
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
                                                <p class="card-text">1.ฉันเล่นดนตรีบางชนิดได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2A1'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A1" id="45" class="hidebx" value="1" style="" checked required>
                                                            <label for="45" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A1" id="46" class="hidebx" value="0" style="">
                                                            <label for="46" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2A1'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A1" id="45" class="hidebx" value="1" style="" required>
                                                            <label for="45" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A1" id="46" class="hidebx" value="0" style="" checked>
                                                            <label for="46" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A1" id="45" class="hidebx" value="1" style="" required>
                                                            <label for="45" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A1" id="46" class="hidebx" value="0" style="">
                                                            <label for="46" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 1 -->
                                            <!-- ข้อ 2 -->
                                            <div class="card-asses">
                                                <p class="card-text">2.ฉันสามารถขับร้องเสียงประสานได้ ร่วมในการร้องเพลงหมู่ได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2A2'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A2" id="47" class="hidebx" value="1" style="" checked required>
                                                            <label for="47" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A2" id="48" class="hidebx" value="0" style="">
                                                            <label for="48" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2A2'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A2" id="47" class="hidebx" value="1" style="" required>
                                                            <label for="47" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A2" id="48" class="hidebx" value="0" style="" checked>
                                                            <label for="48" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A2" id="47" class="hidebx" value="1" style="" required>
                                                            <label for="47" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A2" id="48" class="hidebx" value="0" style="">
                                                            <label for="48" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 2 -->
                                            <!-- ข้อ 3 -->
                                            <div class="card-asses">
                                                <p class="card-text">3.ฉันเดี่ยวดนตรีบางชนิดได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2A3'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A3" id="49" class="hidebx" value="1" style="" checked required>
                                                            <label for="49" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A3" id="50" class="hidebx" value="0" style="">
                                                            <label for="50" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2A3'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A3" id="49" class="hidebx" value="1" style="" required>
                                                            <label for="49" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A3" id="50" class="hidebx" value="0" style="" checked>
                                                            <label for="50" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A3" id="49" class="hidebx" value="1" style="" required>
                                                            <label for="49" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A3" id="50" class="hidebx" value="0" style="">
                                                            <label for="50" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 3 -->
                                            <!-- ข้อ 4 -->
                                            <div class="card-asses">
                                                <p class="card-text">4.ฉันเล่นละครได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2A4'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A4" id="51" class="hidebx" value="1" style="" checked required>
                                                            <label for="51" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A4" id="52" class="hidebx" value="0" style="">
                                                            <label for="52" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2A4'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A4" id="51" class="hidebx" value="1" style="" required>
                                                            <label for="51" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A4" id="52" class="hidebx" value="0" style="" checked>
                                                            <label for="52" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>

                                                        <div class="p-2">
                                                            <input type="radio" name="1A4" id="51" class="hidebx" value="1" style="" required>
                                                            <label for="51" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A4" id="52" class="hidebx" value="0" style="">
                                                            <label for="52" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 4 -->
                                            <!-- ข้อ 5 -->
                                            <div class="card-asses">
                                                <p class="card-text">5.ฉันอ่านบทละครได้ตามบทบาทของผู้แสดง</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2A5'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A5" id="53" class="hidebx" value="1" style="" checked required>
                                                            <label for="53" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A5" id="32" class="hidebx" value="0" style="">
                                                            <label for="32" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2A5'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A5" id="53" class="hidebx" value="1" style="" required>
                                                            <label for="53" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A5" id="54" class="hidebx" value="0" style="" checked>
                                                            <label for="54" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A5" id="53" class="hidebx" value="1" style="" required>
                                                            <label for="53" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A5" id="54" class="hidebx" value="0" style="">
                                                            <label for="54" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 5 -->
                                            <!-- ข้อ 6 -->
                                            <div class="card-asses">
                                                <p class="card-text">6.ฉันร้องรําทําเพลงได้อย่างสนุกสนาน </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2A6'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A6" id="55" class="hidebx" value="1" style="" checked required>
                                                            <label for="55" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A6" id="56" class="hidebx" value="0" style="">
                                                            <label for="56" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2A6'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A6" id="55" class="hidebx" value="1" style="" required>
                                                            <label for="55" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A6" id="56" class="hidebx" value="0" style="" checked>
                                                            <label for="56" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A6" id="55" class="hidebx" value="1" style="" required>
                                                            <label for="55" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A6" id="56" class="hidebx" value="0" style="">
                                                            <label for="56" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 6 -->
                                            <!-- ข้อ 7 -->
                                            <div class="card-asses">
                                                <p class="card-text">7.ฉันเขียนรูปเหมือนได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2A7'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A7" id="57" class="hidebx" value="1" style="" checked required>
                                                            <label for="57" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A7" id="58" class="hidebx" value="0" style="">
                                                            <label for="58" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2A7'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A7" id="57" class="hidebx" value="1" style="" required>
                                                            <label for="57" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A7" id="58" class="hidebx" value="0" style="" checked>
                                                            <label for="58" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A7" id="57" class="hidebx" value="1" style="" required>
                                                            <label for="57" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A7" id="58" class="hidebx" value="0" style="">
                                                            <label for="58" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 7 -->
                                            <!-- ข้อ 8 -->
                                            <div class="card-asses">
                                                <p class="card-text">8.ฉันระบายสี ตกแต่ง ปั้นรูปได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2A8'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A8" id="59" class="hidebx" value="1" style="" checked required>
                                                            <label for="59" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A8" id="60" class="hidebx" value="0" style="">
                                                            <label for="60" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2A8'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A8" id="59" class="hidebx" value="1" style="" required>
                                                            <label for="59" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A8" id="60" class="hidebx" value="0" style="" checked>
                                                            <label for="60" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A8" id="59" class="hidebx" value="1" style="" required>
                                                            <label for="59" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A8" id="60" class="hidebx" value="0" style="">
                                                            <label for="60" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 8 -->
                                            <!-- ข้อ 9 -->
                                            <div class="card-asses">
                                                <p class="card-text">9.ฉันทําเครื่องปั้นดินเผาได้</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2A9'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A9" id="61" class="hidebx" value="1" style="" checked required>
                                                            <label for="61" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A9" id="62" class="hidebx" value="0" style="">
                                                            <label for="62" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2A9'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A9" id="61" class="hidebx" value="1" style="" required>
                                                            <label for="61" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A9" id="62" class="hidebx" value="0" style="" checked>
                                                            <label for="62" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A9" id="61" class="hidebx" value="1" style="" required>
                                                            <label for="61" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A9" id="62" class="hidebx" value="0" style="">
                                                            <label for="62" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 9 -->
                                            <!-- ข้อ 10 -->
                                            <div class="card-asses">
                                                <p class="card-text">10.ฉันออกแบบเครื่องแต่งกาย เครื่องเรือน ภาพโปสเตอร์แบบประกาศโฆษณาได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2A10'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A10" id="63" class="hidebx" value="1" style="" checked required>
                                                            <label for="63" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A10" id="64" class="hidebx" value="0" style="">
                                                            <label for="64" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2A10'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A10" id="63" class="hidebx" value="1" style="" required>
                                                            <label for="63" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A10" id="64" class="hidebx" value="0" style="" checked>
                                                            <label for="64" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A10" id="63" class="hidebx" value="1" style="" required>
                                                            <label for="63" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A10" id="64" class="hidebx" value="0" style="">
                                                            <label for="64" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 10 -->
                                            <!-- ข้อ 11 -->
                                            <div class="card-asses">
                                                <p class="card-text">11.ฉันแต่งเรื่องหรือโครงกลอนได้ดี </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2A11'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A11" id="65" class="hidebx" value="1" style="" checked required>
                                                            <label for="65" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A11" id="66" class="hidebx" value="0" style="">
                                                            <label for="66" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2A11'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A11" id="65" class="hidebx" value="1" style="" required>
                                                            <label for="65" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A11" id="66" class="hidebx" value="0" style="" checked>
                                                            <label for="66" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A11" id="65" class="hidebx" value="1" style="" required>
                                                            <label for="65" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1A11" id="66" class="hidebx" value="0" style="">
                                                            <label for="66" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
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
                                                <p class="card-text">1.ฉันสามารถอธิบายสิ่งต่างๆ ให้คนอื่นเข้าใจได้ดี</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2S1'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S1" id="67" class="hidebx" value="1" style="" checked required>
                                                            <label for="67" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S1" id="68" class="hidebx" value="0" style="">
                                                            <label for="68" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2S1'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S1" id="67" class="hidebx" value="1" style="" required>
                                                            <label for="67" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S1" id="68" class="hidebx" value="0" style="" checked>
                                                            <label for="68" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S1" id="67" class="hidebx" value="1" style="" required>
                                                            <label for="67" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S1" id="68" class="hidebx" value="0" style="">
                                                            <label for="68" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 1 -->
                                            <!-- ข้อ 2 -->
                                            <div class="card-asses">
                                                <p class="card-text">2.ฉันเคยมีส่วนร่วมในกิจกรรมการกุศล การบริจาค (เช่น ขับรถแข่งเพื่อหาเงินช่วยกันกุศล)</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2S2'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S2" id="69" class="hidebx" value="1" style="" checked required>
                                                            <label for="69" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S2" id="70" class="hidebx" value="0" style="">
                                                            <label for="70" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2S2'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S2" id="69" class="hidebx" value="1" style="" required>
                                                            <label for="69" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S2" id="70" class="hidebx" value="0" style="" checked>
                                                            <label for="70" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S2" id="69" class="hidebx" value="1" style="" required>
                                                            <label for="69" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S2" id="70" class="hidebx" value="0" style="">
                                                            <label for="70" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 2 -->
                                            <!-- ข้อ 3 -->
                                            <div class="card-asses">
                                                <p class="card-text">3.ฉันทํางานร่วมกับผู้อื่นได้ดี</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2S3'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S3" id="71" class="hidebx" value="1" style="" checked required>
                                                            <label for="71" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S3" id="72" class="hidebx" value="0" style="">
                                                            <label for="72" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2S3'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S3" id="71" class="hidebx" value="1" style="" required>
                                                            <label for="71" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S3" id="72" class="hidebx" value="0" style="" checked>
                                                            <label for="72" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S3" id="71" class="hidebx" value="1" style="" required>
                                                            <label for="71" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S3" id="72" class="hidebx" value="0" style="">
                                                            <label for="72" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 3 -->
                                            <!-- ข้อ 4 -->
                                            <div class="card-asses">
                                                <p class="card-text">4.ฉันสามารถทําความสนุกสนานให้คนสูงอายุกว่าได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2S4'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S4" id="73" class="hidebx" value="1" style="" checked required>
                                                            <label for="73" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S4" id="74" class="hidebx" value="0" style="">
                                                            <label for="74" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2S4'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S4" id="73" class="hidebx" value="1" style="" required>
                                                            <label for="73" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S4" id="74" class="hidebx" value="0" style="" checked>
                                                            <label for="74" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>

                                                        <div class="p-2">
                                                            <input type="radio" name="1S4" id="73" class="hidebx" value="1" style="" required>
                                                            <label for="73" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S4" id="74" class="hidebx" value="0" style="">
                                                            <label for="74" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 4 -->
                                            <!-- ข้อ 5 -->
                                            <div class="card-asses">
                                                <p class="card-text">5.ฉันเป็นเจ้าของบ้านที่ดีกับแขกของฉัน </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2S5'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S5" id="75" class="hidebx" value="1" style="" checked required>
                                                            <label for="75" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S5" id="76" class="hidebx" value="0" style="">
                                                            <label for="76" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2S5'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S5" id="75" class="hidebx" value="1" style="" required>
                                                            <label for="75" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S5" id="76" class="hidebx" value="0" style="" checked>
                                                            <label for="76" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S5" id="75" class="hidebx" value="1" style="" required>
                                                            <label for="75" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S5" id="76" class="hidebx" value="0" style="">
                                                            <label for="76" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 5 -->
                                            <!-- ข้อ 6 -->
                                            <div class="card-asses">
                                                <p class="card-text">6.ฉันชอบและรักที่จะสอนเด็กๆ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2S6'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S6" id="77" class="hidebx" value="1" style="" checked required>
                                                            <label for="77" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S6" id="78" class="hidebx" value="0" style="">
                                                            <label for="78" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2S6'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S6" id="77" class="hidebx" value="1" style="" required>
                                                            <label for="77" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S6" id="78" class="hidebx" value="0" style="" checked>
                                                            <label for="78" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S6" id="77" class="hidebx" value="1" style="" required>
                                                            <label for="77" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S6" id="78" class="hidebx" value="0" style="">
                                                            <label for="78" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 6 -->
                                            <!-- ข้อ 7 -->
                                            <div class="card-asses">
                                                <p class="card-text">7.ฉันชอบจัดและวางแผนสําหรับงานปาร์ตี้ งานเลี้ยงสังสรรค์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2S7'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S7" id="79" class="hidebx" value="1" style="" checked required>
                                                            <label for="79" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S7" id="80" class="hidebx" value="0" style="">
                                                            <label for="80" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2S7'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S7" id="79" class="hidebx" value="1" style="" required>
                                                            <label for="79" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S7" id="80" class="hidebx" value="0" style="" checked>
                                                            <label for="80" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S7" id="79" class="hidebx" value="1" style="" required>
                                                            <label for="79" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S7" id="80" class="hidebx" value="0" style="">
                                                            <label for="80" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 7 -->
                                            <!-- ข้อ 8 -->
                                            <div class="card-asses">
                                                <p class="card-text">8.ฉันชอบช่วยคนที่ไม่สบายใจให้คลายทุกข์ได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2S8'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S8" id="81" class="hidebx" value="1" style="" checked required>
                                                            <label for="81" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S8" id="82" class="hidebx" value="0" style="">
                                                            <label for="82" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2S8'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S8" id="81" class="hidebx" value="1" style="" required>
                                                            <label for="81" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S8" id="82" class="hidebx" value="0" style="" checked>
                                                            <label for="82" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S8" id="81" class="hidebx" value="1" style="" required>
                                                            <label for="81" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S8" id="82" class="hidebx" value="0" style="">
                                                            <label for="82" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 8 -->
                                            <!-- ข้อ 9 -->
                                            <div class="card-asses">
                                                <p class="card-text">9.ฉันทํางานเป็นอาสาสมัครตามโรงพยาบาล ชุมชน หรือบ้านได้</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2S9'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S9" id="83" class="hidebx" value="1" style="" checked required>
                                                            <label for="83" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S9" id="84" class="hidebx" value="0" style="">
                                                            <label for="84" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2S9'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S9" id="83" class="hidebx" value="1" style="" required>
                                                            <label for="83" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S9" id="84" class="hidebx" value="0" style="" checked>
                                                            <label for="84" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S9" id="83" class="hidebx" value="1" style="" required>
                                                            <label for="83" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S9" id="84" class="hidebx" value="0" style="">
                                                            <label for="84" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 9 -->
                                            <!-- ข้อ 10 -->
                                            <div class="card-asses">
                                                <p class="card-text">10.ฉันสามารถจัดงานโรงเรียนหรืองานกุศลให้สังคม</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2S10'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S10" id="85" class="hidebx" value="1" style="" checked required>
                                                            <label for="85" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S10" id="86" class="hidebx" value="0" style="">
                                                            <label for="86" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2S10'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S10" id="85" class="hidebx" value="1" style="" required>
                                                            <label for="85" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S10" id="86" class="hidebx" value="0" style="" checked>
                                                            <label for="86" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S10" id="85" class="hidebx" value="1" style="" required>
                                                            <label for="85" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S10" id="86" class="hidebx" value="0" style="">
                                                            <label for="86" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 10 -->
                                            <!-- ข้อ 11 -->
                                            <div class="card-asses">
                                                <p class="card-text">11.ฉันมองลักษณะของคนออก </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2S11'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S11" id="87" class="hidebx" value="1" style="" checked required>
                                                            <label for="87" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S11" id="88" class="hidebx" value="0" style="">
                                                            <label for="88" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2S11'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S11" id="87" class="hidebx" value="1" style="" required>
                                                            <label for="87" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S11" id="88" class="hidebx" value="0" style="" checked>
                                                            <label for="88" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S11" id="87" class="hidebx" value="1" style="" required>
                                                            <label for="87" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1S11" id="88" class="hidebx" value="0" style="">
                                                            <label for="88" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
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
                                                <p class="card-text">1.ฉันได้รับเลือกให้ช่วยเหลืองานในโรงเรียนหรือวิทยาลัย</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2E1'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E1" id="89" class="hidebx" value="1" style="" checked required>
                                                            <label for="89" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E1" id="90" class="hidebx" value="0" style="">
                                                            <label for="90" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2E1'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E1" id="89" class="hidebx" value="1" style="" required>
                                                            <label for="89" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E1" id="90" class="hidebx" value="0" style="" checked>
                                                            <label for="90" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E1" id="89" class="hidebx" value="1" style="" required>
                                                            <label for="89" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E1" id="90" class="hidebx" value="0" style="">
                                                            <label for="90" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 1 -->
                                            <!-- ข้อ 2 -->
                                            <div class="card-asses">
                                                <p class="card-text">2.ฉันสามารถให้คาแนะนาการทางานแก่ผู้อื่นได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2E2'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E2" id="91" class="hidebx" value="1" style="" checked required>
                                                            <label for="91" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E2" id="92" class="hidebx" value="0" style="">
                                                            <label for="92" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2E2'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E2" id="91" class="hidebx" value="1" style="" required>
                                                            <label for="91" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E2" id="92" class="hidebx" value="0" style="" checked>
                                                            <label for="92" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E2" id="91" class="hidebx" value="1" style="" required>
                                                            <label for="91" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E2" id="92" class="hidebx" value="0" style="">
                                                            <label for="92" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 2 -->
                                            <!-- ข้อ 3 -->
                                            <div class="card-asses">
                                                <p class="card-text">3.ฉันมีพลังงานเหลือหลาย และมีความกระตือรือร้นมากมาย </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2E3'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E3" id="93" class="hidebx" value="1" style="" checked required>
                                                            <label for="93" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E3" id="94" class="hidebx" value="0" style="">
                                                            <label for="94" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2E3'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E3" id="93" class="hidebx" value="1" style="" required>
                                                            <label for="93" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E3" id="94" class="hidebx" value="0" style="" checked>
                                                            <label for="94" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E3" id="93" class="hidebx" value="1" style="" required>
                                                            <label for="93" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E3" id="94" class="hidebx" value="0" style="">
                                                            <label for="94" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 3 -->
                                            <!-- ข้อ 4 -->
                                            <div class="card-asses">
                                                <p class="card-text">4.ฉันเก่งในการที่จะให้ผู้คนทางานตามแบบวิธีของฉัน </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2E4'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E4" id="95" class="hidebx" value="1" style="" checked required>
                                                            <label for="95" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E4" id="96" class="hidebx" value="0" style="">
                                                            <label for="96" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2E4'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E4" id="95" class="hidebx" value="1" style="" required>
                                                            <label for="95" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E4" id="96" class="hidebx" value="0" style="" checked>
                                                            <label for="96" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>

                                                        <div class="p-2">
                                                            <input type="radio" name="1E4" id="95" class="hidebx" value="1" style="" required>
                                                            <label for="95" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E4" id="96" class="hidebx" value="0" style="">
                                                            <label for="96" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 4 -->
                                            <!-- ข้อ 5 -->
                                            <div class="card-asses">
                                                <p class="card-text">5.ฉันเป็นคนขายของที่สามารถ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2E5'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E5" id="97" class="hidebx" value="1" style="" checked required>
                                                            <label for="97" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E5" id="98" class="hidebx" value="0" style="">
                                                            <label for="98" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2E5'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E5" id="97" class="hidebx" value="1" style="" required>
                                                            <label for="97" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E5" id="98" class="hidebx" value="0" style="" checked>
                                                            <label for="98" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E5" id="97" class="hidebx" value="1" style="" required>
                                                            <label for="97" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E5" id="98" class="hidebx" value="0" style="">
                                                            <label for="98" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 5 -->
                                            <!-- ข้อ 6 -->
                                            <div class="card-asses">
                                                <p class="card-text">6.ฉันได้แสดงตนเป็นหัวหน้าของกลุ่มคนในการให้ข้อเสนอแนะหรือข้อเรียกร้องแก่ผู้มีอำนาจได้</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2E6'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E6" id="99" class="hidebx" value="1" style="" checked required>
                                                            <label for="99" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E6" id="100" class="hidebx" value="0" style="">
                                                            <label for="100" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2E6'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E6" id="99" class="hidebx" value="1" style="" required>
                                                            <label for="99" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E6" id="100" class="hidebx" value="0" style="" checked>
                                                            <label for="100" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E6" id="99" class="hidebx" value="1" style="" required>
                                                            <label for="99" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E6" id="100" class="hidebx" value="0" style="">
                                                            <label for="100" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 6 -->
                                            <!-- ข้อ 7 -->
                                            <div class="card-asses">
                                                <p class="card-text">7.ฉันได้รับรางวัลในการทำงานในฐานะผู้จำหน่ายของหรือหัวหน้างาน </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2E7'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E7" id="101" class="hidebx" value="1" style="" checked required>
                                                            <label for="101" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E7" id="102" class="hidebx" value="0" style="">
                                                            <label for="102" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2E7'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E7" id="101" class="hidebx" value="1" style="" required>
                                                            <label for="101" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E7" id="102" class="hidebx" value="0" style="" checked>
                                                            <label for="102" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E7" id="101" class="hidebx" value="1" style="" required>
                                                            <label for="101" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E7" id="102" class="hidebx" value="0" style="">
                                                            <label for="102" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 7 -->
                                            <!-- ข้อ 8 -->
                                            <div class="card-asses">
                                                <p class="card-text">8.ฉันได้เริ่มดำเนินธุรกิจการค้า หรือบริหารการของตนเอง </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2E8'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E8" id="103" class="hidebx" value="1" style="" checked required>
                                                            <label for="103" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E8" id="104" class="hidebx" value="0" style="">
                                                            <label for="104" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2E8'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E8" id="103" class="hidebx" value="1" style="" required>
                                                            <label for="103" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E8" id="104" class="hidebx" value="0" style="" checked>
                                                            <label for="104" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E8" id="103" class="hidebx" value="1" style="" required>
                                                            <label for="103" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E8" id="104" class="hidebx" value="0" style="">
                                                            <label for="104" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 8 -->
                                            <!-- ข้อ 9 -->
                                            <div class="card-asses">
                                                <p class="card-text">9.ฉันรู้วิธีที่จะเป็นผู้นาที่ประสบความสำเร็จ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2E9'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E9" id="105" class="hidebx" value="1" style="" checked required>
                                                            <label for="105" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E9" id="106" class="hidebx" value="0" style="">
                                                            <label for="106" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2E9'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E9" id="105" class="hidebx" value="1" style="" required>
                                                            <label for="105" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E9" id="106" class="hidebx" value="0" style="" checked>
                                                            <label for="106" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E9" id="105" class="hidebx" value="1" style="" required>
                                                            <label for="105" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E9" id="106" class="hidebx" value="0" style="">
                                                            <label for="106" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 9 -->
                                            <!-- ข้อ 10 -->
                                            <div class="card-asses">
                                                <p class="card-text">10.ฉันเป็นนักถกเถียงนักโต้วาทีที่ดี </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2E10'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E10" id="107" class="hidebx" value="1" style="" checked required>
                                                            <label for="107" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E10" id="108" class="hidebx" value="0" style="">
                                                            <label for="108" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2E10'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E10" id="107" class="hidebx" value="1" style="" required>
                                                            <label for="107" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E10" id="108" class="hidebx" value="0" style="" checked>
                                                            <label for="108" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E10" id="107" class="hidebx" value="1" style="" required>
                                                            <label for="107" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E10" id="108" class="hidebx" value="0" style="">
                                                            <label for="108" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 10 -->
                                            <!-- ข้อ 11 -->
                                            <div class="card-asses">
                                                <p class="card-text">11.ฉันเป็นผู้จัดตั้งชุมชนรวมกลุ่มหรือแก๊งค์ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2E11'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E11" id="109" class="hidebx" value="1" style="" checked required>
                                                            <label for="109" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E11" id="110" class="hidebx" value="0" style="">
                                                            <label for="110" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2E11'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E11" id="109" class="hidebx" value="1" style="" required>
                                                            <label for="109" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E11" id="110" class="hidebx" value="0" style="" checked>
                                                            <label for="110" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E11" id="109" class="hidebx" value="1" style="" required>
                                                            <label for="109" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1E11" id="110" class="hidebx" value="0" style="">
                                                            <label for="110" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
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
                                                <p class="card-text">1.ฉันสามารถพิมพ์ดีด 40 คาต่อนาที</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2C1'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C1" id="111" class="hidebx" value="1" style="" checked required>
                                                            <label for="111" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C1" id="112" class="hidebx" value="0" style="">
                                                            <label for="112" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2C1'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C1" id="111" class="hidebx" value="1" style="" required>
                                                            <label for="111" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C1" id="112" class="hidebx" value="0" style="" checked>
                                                            <label for="112" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C1" id="111" class="hidebx" value="1" style="" required>
                                                            <label for="111" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C1" id="112" class="hidebx" value="0" style="">
                                                            <label for="112" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 1 -->
                                            <!-- ข้อ 2 -->
                                            <div class="card-asses">
                                                <p class="card-text">2.ฉันสามารถใช้เครื่องคิดเลข เครื่องถ่ายเอกสารได้</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2C2'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C2" id="113" class="hidebx" value="1" style="" checked required>
                                                            <label for="113" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C2" id="114" class="hidebx" value="0" style="">
                                                            <label for="114" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2C2'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C2" id="113" class="hidebx" value="1" style="" required>
                                                            <label for="113" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C2" id="114" class="hidebx" value="0" style="" checked>
                                                            <label for="114" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C2" id="113" class="hidebx" value="1" style="" required>
                                                            <label for="113" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C2" id="114" class="hidebx" value="0" style="">
                                                            <label for="114" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 2 -->
                                            <!-- ข้อ 3 -->
                                            <div class="card-asses">
                                                <p class="card-text">3.ฉันสามารถจดชวเลขได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2C3'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C3" id="115" class="hidebx" value="1" style="" checked required>
                                                            <label for="115" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C3" id="116" class="hidebx" value="0" style="">
                                                            <label for="116" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2C3'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C3" id="115" class="hidebx" value="1" style="" required>
                                                            <label for="115" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C3" id="116" class="hidebx" value="0" style="" checked>
                                                            <label for="116" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C3" id="115" class="hidebx" value="1" style="" required>
                                                            <label for="115" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C3" id="116" class="hidebx" value="0" style="">
                                                            <label for="116" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 3 -->
                                            <!-- ข้อ 4 -->
                                            <div class="card-asses">
                                                <p class="card-text">4.ฉันสามารถจัดระเบียบเอกสาร และโต้ตอบจดหมายได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2C4'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C4" id="117" class="hidebx" value="1" style="" checked required>
                                                            <label for="117" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C4" id="118" class="hidebx" value="0" style="">
                                                            <label for="118" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2C4'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C4" id="117" class="hidebx" value="1" style="" required>
                                                            <label for="117" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C4" id="118" class="hidebx" value="0" style="" checked>
                                                            <label for="118" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>

                                                        <div class="p-2">
                                                            <input type="radio" name="1C4" id="117" class="hidebx" value="1" style="" required>
                                                            <label for="117" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C4" id="118" class="hidebx" value="0" style="">
                                                            <label for="118" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 4 -->
                                            <!-- ข้อ 5 -->
                                            <div class="card-asses">
                                                <p class="card-text">5.ฉันสามารถทางานในสานักงานได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2C5'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C5" id="119" class="hidebx" value="1" style="" checked required>
                                                            <label for="119" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C5" id="120" class="hidebx" value="0" style="">
                                                            <label for="120" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2C5'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C5" id="119" class="hidebx" value="1" style="" required>
                                                            <label for="119" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C5" id="120" class="hidebx" value="0" style="" checked>
                                                            <label for="120" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C5" id="119" class="hidebx" value="1" style="" required>
                                                            <label for="119" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C5" id="120" class="hidebx" value="0" style="">
                                                            <label for="120" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 5 -->
                                            <!-- ข้อ 6 -->
                                            <div class="card-asses">
                                                <p class="card-text">6.ฉันสามารถใช้เครื่องทาบัญชีรายการต่างๆได้</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2C6'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C6" id="121" class="hidebx" value="1" style="" checked required>
                                                            <label for="121" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C6" id="122" class="hidebx" value="0" style="">
                                                            <label for="122" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2C6'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C6" id="121" class="hidebx" value="1" style="" required>
                                                            <label for="121" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C6" id="122" class="hidebx" value="0" style="" checked>
                                                            <label for="122" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C6" id="121" class="hidebx" value="1" style="" required>
                                                            <label for="121" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C6" id="122" class="hidebx" value="0" style="">
                                                            <label for="122" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 6 -->
                                            <!-- ข้อ 7 -->
                                            <div class="card-asses">
                                                <p class="card-text">7.ฉันสามารถจัดรวบรวมเอกสารเข้าที่ในเวลาอันรวดเร็ว </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2C7'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C7" id="123" class="hidebx" value="1" style="" checked required>
                                                            <label for="123" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C7" id="124" class="hidebx" value="0" style="">
                                                            <label for="124" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2C7'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C7" id="123" class="hidebx" value="1" style="" required>
                                                            <label for="123" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C7" id="124" class="hidebx" value="0" style="" checked>
                                                            <label for="124" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C7" id="123" class="hidebx" value="1" style="" required>
                                                            <label for="123" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C7" id="124" class="hidebx" value="0" style="">
                                                            <label for="124" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 7 -->
                                            <!-- ข้อ 8 -->
                                            <div class="card-asses">
                                                <p class="card-text">8.ฉันสามารถใช้เครื่องคานวณได้ดี </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2C8'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C8" id="125" class="hidebx" value="1" style="" checked required>
                                                            <label for="125" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C8" id="126" class="hidebx" value="0" style="">
                                                            <label for="126" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2C8'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C8" id="125" class="hidebx" value="1" style="" required>
                                                            <label for="125" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C8" id="126" class="hidebx" value="0" style="" checked>
                                                            <label for="126" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C8" id="125" class="hidebx" value="1" style="" required>
                                                            <label for="125" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C8" id="126" class="hidebx" value="0" style="">
                                                            <label for="126" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 8 -->
                                            <!-- ข้อ 9 -->
                                            <div class="card-asses">
                                                <p class="card-text">9.ฉันสามารถใช้เครื่องมือ และวิธีจัดการกับข้อมูลง่ายๆ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2C9'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C9" id="127" class="hidebx" value="1" style="" checked required>
                                                            <label for="127" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C9" id="128" class="hidebx" value="0" style="">
                                                            <label for="128" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2C9'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C9" id="127" class="hidebx" value="1" style="" required>
                                                            <label for="127" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C9" id="128" class="hidebx" value="0" style="" checked>
                                                            <label for="128" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C9" id="127" class="hidebx" value="1" style="" required>
                                                            <label for="127" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C9" id="128" class="hidebx" value="0" style="">
                                                            <label for="128" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 9 -->
                                            <!-- ข้อ 10 -->
                                            <div class="card-asses">
                                                <p class="card-text">10.ฉันจัดระบบรายรับรายจ่ายได้ </p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2C10'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C10" id="129" class="hidebx" value="1" style="" checked required>
                                                            <label for="129" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C10" id="130" class="hidebx" value="0" style="">
                                                            <label for="130" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2C10'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C10" id="129" class="hidebx" value="1" style="" required>
                                                            <label for="129" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C10" id="130" class="hidebx" value="0" style="" checked>
                                                            <label for="130" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C10" id="129" class="hidebx" value="1" style="" required>
                                                            <label for="129" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C10" id="130" class="hidebx" value="0" style="">
                                                            <label for="130" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- จบข้อ 10 -->
                                            <!-- ข้อ 11 -->
                                            <div class="card-asses">
                                                <p class="card-text">11.ฉันสามารถทาบันทึกการจ่ายและการขายได้</p>
                                                <div class="d-grid gap-3">
                                                    <?php if ($rows['2C11'] == '1') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C11" id="131" class="hidebx" value="1" style="" checked required>
                                                            <label for="131" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C11" id="132" class="hidebx" value="0" style="">
                                                            <label for="132" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($rows['2C11'] == '0') { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C11" id="131" class="hidebx" value="1" style="" required>
                                                            <label for="131" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C11" id="132" class="hidebx" value="0" style="" checked>
                                                            <label for="132" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C11" id="131" class="hidebx" value="1" style="" required>
                                                            <label for="131" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">A.ใช่</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="p-2">
                                                            <input type="radio" name="1C11" id="132" class="hidebx" value="0" style="">
                                                            <label for="132" class="lbl-radio">
                                                                <div class="display-box">
                                                                    <div class="size">B.ไม่ใช่</div>
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