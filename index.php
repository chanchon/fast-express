<?php
    include("db_connect.php");
    
    $sql = "SELECT * FROM staff WHERE credits = (SELECT MAX(credits) FROM staff)";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $empmonth = mysqli_fetch_all($result, MYSQLI_ASSOC);

    }else{
        echo "Error : ". mysqli_error($conn);
    }

    $name = $email = $msg = '';
    $error = array('name' => '', 'email' => '', 'msg' => '');
    if(isset($_POST['submit'])){
        if(empty($_POST['name'])){
            $error['name'] = "*Required";
        }else{
            $name = mysqli_real_escape_string($conn, $_POST['name']);
        }
        if(empty($_POST['email'])){
            $error['email'] = "*Required";
        }else{
            if(email_validation($_POST['email'])){
                $email =  mysqli_real_escape_string($conn, $_POST['email']);
            }else{
                $error['email'] = "*Invalid email";
            }
        }
        if(empty($_POST['msg'])){
            $error['msg'] = "*Required";
        }else{
            $msg = mysqli_real_escape_string($conn, $_POST['msg']);
        }
        if(! array_filter($error)){
            $sql = "INSERT INTO feedback (Cust_name, Cust_mail, Cust_msg) VALUES ('$name', '$email', '$msg')";
            if(mysqli_query($conn, $sql)){
                echo '<script type="text/javascript">';
                echo "setTimeout(function () { swal('ขอบคุณสำหรับคำถาม', 'เราบันทึกคำตอบของคุณเรียบร้อยแล้ว!!', 'success');";
                echo '}, 1000);</script>';
                $name = $email = $msg = '';
            }else{
                echo "Insert Error : " . mysqli_error($conn);
            }
            
        }
    }
    function email_validation($str) {
        return (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str)) ? FALSE : TRUE;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Fast Express</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="style/bootstrap.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style/index_styles.css">
        <link rel="icon" type="image/png" sizes="50x50" href="Images/minilogo.png">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .carousel-inner img {
              width: 100%;
              height: 100%;
            }
        </style>
        <body style="background-image:url(images/bbg2.jpg)">
    </head>
    <body style="font-family: Arial, Helvetica, sans-serif;">
        <div ><img src="Images/fa.png" id="logo" style="height: 200px !important;  margin-top: 5px !important;"  ></div>
        <div class="background"></div> 
        <nav class="navbar navbar-toggleable-md navbar-expand-lg navbar-default navbar-light mb-10" style="background-color: rgba(105, 105, 105, 0.7); margin-bottom: 20px; margin-top:10px !important;">
            <div class="container">
                <button class="navbar-toggler text-dark" data-toggle="collapse" data-target="#mainNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <div class="navbar-nav  " style="margin: 0 auto; font-size: large;">
                        <a class="nav-item nav-link text-dark mr-5 active" href="index.php" >หน้าหลัก</a>
                        <a class="nav-item nav-link text-dark mr-5" href="#about">เกี่ยวกับเรา</a>
                        <a class="nav-item nav-link text-dark mr-5" href="tracking.php">ติดตามพัสดุ</a>
                        <a class="nav-item nav-link text-dark mr-5" href="branches.php">สาขา</a>
                        <a class="nav-item nav-link text-dark mr-5" href="#contact">ติดต่อเรา</a>
                        <a class="nav-item nav-link text-dark" href="login.php">พนักงาน</a>                        
                    </div>
                </div>
            </div>
        </nav>
        <div class = "container-fluid" style="width: 100%; padding: 0; margin: 0;">
            <div id = "carouselwithIndicators" class = "carousel slide container-fluid mt-10" data-ride = "carousel" style="width: 85%; height: 100%; border-radius: 15px;">
               <ol class = "carousel-indicators ">
                  <li data-target = "#carouselExampleIndicators" data-slide-to = "0" class = "active"></li>
                  <li data-target = "#carouselExampleIndicators" data-slide-to = "1"></li>
                  <li data-target = "#carouselExampleIndicators" data-slide-to = "2s"></li>
               </ol>
               
               <div class =" carousel-inner">
                  <div class = "carousel-item active">
                     <img class = "d-block " 
                        src = "Images/c2.jpg" 
                        alt = "First slide" style="height: 80vh; width: fit-content;">
                  </div>
                  
                  <div class = "carousel-item">
                     <img class = "d-block " 
                        src = "Images/c3.jpg" 
                        alt = "Second slide" style="height: 80vh; width: fit-content;">
                  </div>
                  <div class = "carousel-item">
                     <img class = "d-block " 
                        src = "Images/c4.jpg" 
                        alt = "Third slide" style="height: 80vh; width: fit-content;">
                  </div>
               </div>
               
               <a class = "carousel-control-prev" href = "#carouselwithIndicators" role = "button" data-slide = "prev">
                  <span class = "carousel-control-prev-icon" aria-hidden = "true" style="color: black;"></span>
                  <span class = "sr-only">Previous</span>
               </a>
               
               <a class = "carousel-control-next " href = "#carouselwithIndicators" role = "button" data-slide = "next">
                  <span class = "carousel-control-next-icon" aria-hidden = "true" style="color: black;"></span>
                  <span class = "sr-only">Next</span>
               </a>
             </div>
         </div>
         <div class="container" id="about" style="margin-top: 20px; width: 85%;">
             <div class="row">
                <div class="col-md-6 p-5" style="background-color: rgba(192, 192, 192, 0.7); box-shadow: 0 30px 50px rgba(0,0,0,.2); color: black; border-radius: 15px; ">
                    <h2 class="display-5 text-center mb-3 pb-2" style="border-bottom: 2px solid black;">เกี่ยวกับเรา</h2>
                    <br><p>การเปิดตัว Fast Express 
                  ได้รับการออกแบบมาโดยเฉพาะเพื่อตอบสนองความต้องการในการขนส่งเชิงพาณิชย์และส่วนบุคคลของลูกค้าของเราทั้งในปลายทางในเมืองและในชนบท เรากำลังก้าวขึ้นเป็นจุดสุดยอดของการขนส่งยอดนิยมสำหรับการขนส่ง "ภายในวัน 2 วัน" และให้บริการลูกค้าอย่างต่อเนื่องทุกวันตลอด 24 ชั่วโมงทุกวันไม่เว้นวันหยุด เราขยายทรัพยากรของเราอย่างต่อเนื่องเพื่อตอบสนองความคาดหวังของลูกค้าของเราและเพื่อตอบสนองความต้องการของตลาดที่ไม่เหมือนใคร.</p>  
                </div>
                <div class="col-md-6">
                    <img src="Images/p1.png" style="height: 500px; width: 100%; padding-top: 5%;" >
                </div>
             </div>
         </div>
         <div class="container" style="margin-top: 20px; width: 85%;">
            <div class="row">
                <div class="col-md-6 text-center p-5" style="background-color: rgba(192, 192, 192, 0.7); box-shadow: 0 30px 50px rgba(0,0,0,.2); color: black; ">
                    <img src="Images/employee.png" style="width: 100%; border-top:2px solid black;" >
                    <?php foreach($empmonth as $emp) : ?>
                        <div style="margin:auto !important; border-bottom:2px solid black;">
                            <p class="text-center pt-2" style="font-family: 'Times New Roman', Times, serif !important; font-size:x-large;"><?php echo $emp['Name'] ?></p>
                            <p>ไอดีพนักงาน : <?php echo $emp['StaffID'] ?> </p>
                            <p>เครดิต : <?php echo $emp['Credits'] ?> </p>
                        </div>
                    <?php endforeach; ?>              
                </div>
                <div class="col-md-6 text-center p-5" style="background-color: rgba(192, 192, 192, 0.7); box-shadow: 0 30px 50px rgba(0,0,0,.2); color: black;  "  id='contact'>
                        <h4 style="border-bottom:2px solid black; padding-bottom:2px;">ติดต่อเรา</h4>
                        <form action="index.php" class="form text-left" method = "POST">
                            <div class="form-group">
                                <label>ชื่อ : </label>
                                <input class="form-contact"  type="text" name = "name" value=<?php echo $name; ?>>
                                <span class="text-danger"><?php echo $error['name']; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Email : </label>
                                <input class="form-contact"  type="text" name = "email" value=<?php echo $email; ?>>
                                <span class="text-danger"><?php echo $error['email']; ?></span>
                            </div>
                            <div class="form-group">
                                <label>ข้อความ : </label>
                                <textarea class="form-contact" name = "msg" required><?php echo $msg; ?></textarea>
                                <span class="text-danger"><?php echo $error['msg']; ?></span>
                            </div>
                            <input type="submit" name="submit" value="ส่ง"class="btn btn-primary">
                        </form>
                </div>
             </div>
            
         </div>
         <div class="container-fluid text-center mt-5" style="background-color: rgba(105, 105, 105, 0.7); padding: 20px; position: relative; ">
            <div class="i-bar" style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content:center; margin-bottom: 2em;">
                <a class="fa fa-facebook " href="#" style="border: none; text-decoration: none;  margin: 0em 1em; color:black; font-size: xx-large;"></a>
                <a class="fa fa-instagram" href="#" style="border: none; text-decoration: none;  margin: 0em 1em; color:black; font-size: xx-large;"></a>
                <a class="fa fa-envelope " href="#" style="border: none; text-decoration: none;  margin: 0em 1em; color:black; font-size: xx-large;"></a>
            </div>
            <p class="credit" style="font-size: 20px; font-stretch: 3px; text-align: center; color: black;">© Fast Express</p>
        </div>
    </body>
    </body>
</html>