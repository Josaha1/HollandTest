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
    $sql1 = "SELECT (`Sum1R`+`Sum2R`+`Sum3R`) as R ,(`SUMI1`+`SumI2`+`SumI3`) as I ,(`SUMA1`+`SumA2`+`SumA3`) as A ,(`SUMS1`+`SumS2`+`SumS3`) as S ,(`SUME1`+`SumE2`+`SumE3`) as E ,(`SUMC1`+`SumC2`+`SumC3`) as C FROM `logtest` WHERE `Cid` = '$Cid' ORDER BY `TID` DESC LIMIT 1; ";
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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/indexAdmin.css" rel="stylesheet">
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
                    <div class="table-responsive" style="display: block;">
                        <table id="example" class="table table-bordered">
                            <thead class="table-bordered">
                                <th>ลำดับ</th>
                                <th>เลขประจำตัวประชาชน</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>วันที่ทดสอบ</th>
                                <th>ผลการทดสอบ</th>
                            </thead>

                        </table>
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
                <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
                <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
                <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#example').DataTable({
                            "fnCreatedRow": function(nRow, aData, iDataIndex) {
                                $(nRow).attr('Cid', aData[0]);
                            },
                            'serverSide': 'true',
                            'processing': 'true',
                            'paging': 'true',
                            'order': [],
                            'ajax': {
                                'url': 'fetch_dataIndex.php',
                                'type': 'post',
                            },
                            "aoColumnDefs": [{
                                    "bSortable": false,
                                    "aTargets": [3]
                                },

                            ]
                        });
                    });
                </script>
    </body>

    </html>
<?php } ?>