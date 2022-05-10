<?php
    include("db_connect.php");
    $tid = '';
    $error = '';
    $status = array('Dispatched' => '','Shipped' => '', 'Sending' => '', 'Delivered' => '', );
    $hide = 'hidden';
    session_start();
    $trackid = '';
    if(isset($_POST['track'])){
        if(empty($_POST['tid'])){
            $error = "*Required";
        }else{
            $tid = $_POST['tid'];
            $_SESSION['track_tid'] = $tid;
            if(empty($error)){
                $hide = '';
                $trackid = $_SESSION['track_tid'];
                $sql = "SELECT * FROM status WHERE TrackingID='$tid'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    $status = mysqli_fetch_assoc($result);
                    $active = array();
                    if(! is_null($status['Delivered'])){
                        $active['Delivered'] = $active['Sending'] = $active['Shipped'] = 'active';
                    }elseif(! is_null($status['Sending'])){
                        $active['Delivered'] = '';
                        $active['Sending'] = $active['Shipped'] = 'active';
                    }elseif(! is_null($status['Shipped'])){
                        $active['Delivered'] = $active['Sending'] = '';
                        $active['Shipped'] = 'active';
                    }
                }else{
                    $error = "เลขพัสดุไม่ถูกต้อง";
                }
            }
        }
    }
    $hidden = 'hidden';
    if(isset($_POST['view'])){
        $trackid = $_SESSION['track_tid'];
        $hidden = $hide = '';
    } 
    $name = $add = $contact = '';
    $errors = array('name' => '', 'add' => '', 'cont' => '');
    if(isset($_POST['update'])){
        $hidden = $hide = '';
        $trackid = $_SESSION['track_tid'];
        if(empty($_POST['fname'])){
            $errors['name'] = "*Required";
        }else{
            $name = $_POST['fname'];
        }
        if(empty($_POST['fadd'])){
            $errors['add'] = "*Required";
        }else{
            $add = $_POST['fadd'];
        }
        if(empty($_POST['fcontact'])){
            $errors['cont'] = "*Required";
        }else{
            $contact = $_POST['fcontact'];
        }
        if(! array_filter($errors)){
            $trackid = $_SESSION['track_tid'];
            $sql = "UPDATE parcel SET R_Name = '$name', R_Add = '$add', R_Contact = $contact WHERE TrackingID = $trackid";
            if(mysqli_query($conn, $sql)){
                echo '<script type="text/javascript">';
                echo "setTimeout(function () { swal('เปลี่ยนที่อยู่', 'อัปเดตที่อยู่ผู้รับเรียบร้อยแล้ว!!', 'success');";
                echo '}, 1000);</script>';
                $hide  = $hidden =  'hidden';
                $trackid = '';
            }else{
                echo 'อัปเดตผิดพลาด : '.mysqli_error($conn);
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Fast Express</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="style/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style/index_styles.css">
        <link rel="icon" type="image/png" sizes="32x32" href="Images/minilogo.png">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <body style="background-image:url(images/bbg2.jpg)">
    </head>
    <body style="font-family: Arial, Helvetica, sans-serif;">
        <div ><img src="Images/fa.png" id="logo" style="height: 150px !important;  margin-top: 5px !important; " ></div>
        <div class="background"></div> 
        <nav class="navbar navbar-toggleable-md navbar-expand-lg navbar-default navbar-light mb-10" style="background-color: rgba(105, 105, 105, 0.7); margin-top:10px !important;">
            <div class="container">
                <button class="navbar-toggler text-dark" data-toggle="collapse" data-target="#mainNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <div class="navbar-nav  " style="margin: 0 auto; font-size: large;">
                        <a class="nav-item nav-link text-dark mr-5 " href="index.php" >หน้าหลัก</a>
                        <a class="nav-item nav-link text-dark mr-5" href="index.php#about">เกี่ยวกับเรา</a>
                        <a class="nav-item nav-link text-dark mr-5 active" href="tracking.php">ติดตามพัสดุ</a>
                        <a class="nav-item nav-link text-dark mr-5 " href="branches.php">สาขา</a>
                        <a class="nav-item nav-link text-dark mr-5" href="index.php#contact">ติดต่อเรา</a>
                        <a class="nav-item nav-link text-dark" href="login.php">พนักงาน</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-10">
            <div class="row">
                <div class="col-md-4 p-4 text-center pt-0" style="background-color: rgba(255, 255, 255, 0.7); box-shadow: 0 30px 50px rgba(0,0,0,.2); margin-top: 20px;">
                    <img src="Images/track.png" style="margin:0 auto; height: 350px;">
                    <form action="" method="POST" class="form">
                        <div class="form-group">
                            <label style="font-size: 18px;">กรอกเลขพัสดุ : </label>
                            <input type="text" style="border-radius: 8px;" name="tid" value="<?php echo $tid; ?>">
                            <label class="text-danger"><?php echo $error; ?></label>
                        </div>
                        <input type="submit" name="track" class="btn btn-danger text-center" value="ติดตาม" style="font-size: 20px;">
                    </form>
                </div>
                <div class="col-md-8 p-4 " style="background-color: rgba(255, 255, 255, 0.7); margin-top: 20px;">
                    <h3 class="display-6 text-center pb-2 mb-3" style="border-bottom: 2px solid black;">สถานะการจัดส่ง</h3>
                    <label>เลขพัสดุของคุณ : <?php echo $trackid; ?></label><br>
                    <div class="track bg-info">
                        <div class="step active"> <span class="icon"> <i class="fa fa-map-marker"></i> </span> <span class="text font-weight-bold"> ฟาสเข้ารับพัสดุแล้ว </span><span><?php echo $status['Dispatched'];?></span> </div>
                        <div class="step <?php echo $active['Shipped']; ?>"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text font-weight-bold"> อยู่ระหว่างขนส่ง </span><span><?php echo $status['Shipped'];?></span> </div>
                        <div class="step <?php echo $active['Sending']; ?>"> <span class="icon"> <i class="fa fa-motorcycle"></i> </span> <span class="text font-weight-bold"> กำลังจัดส่งพัสดุ </span><span><?php echo $status['Sending'];?></span> </div>
                        <div class="step <?php echo $active['Delivered']; ?>"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text font-weight-bold"> พัสดุจัดส่งสำเร็จ </span><span><?php echo $status['Delivered'];?></span> </div>
                    </div>
                    <div <?php echo $hide; ?>>
                        <br>
                        <label>ไม่สามารถรับได้ตามวันที่คาดไว้ ?</label>
                        <form action="tracking.php" method="POST">
                            <label>ส่งให้เพื่อนที่อยู่ใกล้เคียงในเมืองของคุณ.</label>
                            <input type="submit" name="view" value="อัพเดทที่อยู่จัดส่งใหม่ ?" class="btn btn-primary">
                        </form>
                        <form action="tracking.php" method="POST" <?php echo $hidden; ?>>
                            <label>รายละเอียดผู้รับแทน</label>
                            <div class="form-group text-left">
                                <label>ชื่อ : </label>
                                <input type="text" name="fname" style="border-radius: 8px;">
                                <label class="text-danger"><?php echo $errors['name'];?></label>
                            </div>
                            <div class="form-group text-left">
                                <label>ที่อยู่ : </label>
                                <input type="text" name="fadd" style="border-radius: 8px;">
                                <label class="text-danger"><?php echo $errors['add'];?></label>
                            </div>
                            <div class="form-group text-left">
                                <label>เบอร์โทรศัพท์ : </label>
                                <input type="text" name="fcontact" style="border-radius: 8px;" >
                                <label class="text-danger"><?php echo $errors['cont'];?></label>
                            </div>
                            <input type="submit" name="update" value="อัพเดต" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center mt-5" style="background-color: rgba(105, 105, 105, 0.7); padding: 20px; position: relative;">
            <div class="i-bar" style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content:center; margin-bottom: 2em;">
                <a class="fa fa-facebook " href="#" style="border: none; text-decoration: none;  margin: 0em 1em; color:black; font-size: xx-large;"></a>
                <a class="fa fa-instagram" href="#" style="border: none; text-decoration: none;  margin: 0em 1em; color:black; font-size: xx-large;"></a>
                <a class="fa fa-envelope " href="#" style="border: none; text-decoration: none;  margin: 0em 1em; color:black; font-size: xx-large;"></a>
            </div>
            <p class="credit" style="font-size: 20px; font-stretch: 3px; text-align: center; color: black;">© Fast Express </p>
        </div>
    </body>
    </body>
</html>