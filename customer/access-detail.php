<?php 
include('include/header.php');

if(!isset($_SESSION['email'])){
    header('location:../sign-in.php');
}

if(isset($_SESSION['email'])){
  $customer_id    = $_SESSION['id'];
}
?>

   <div class="jumbotron bg-secondary">
      <h1 class="text-center text-white mt-5">Chi tiết</h1>
    </div>

   <div class="container mt-5">
       <div class="row">

        <div class="col-md-3">
          <?php include('include/sidebar.php');?>
        </div>

        <div class="col-md-9">
          <h3>Chi tiết</h3><hr>
          <h6>THAY ĐỔI MẬT KHẨU</h6>
           <p>Nếu bạn muốn thay đổi mật khẩu để truy cập tài khoản của mình, vui lòng cung cấp Các thông tin sau:</p>
          
            
              <?php
              if(isset($_POST['update'])){
                $old_pass     = $_POST['old_pass'];
                $new_pass     = $_POST['new_pass'];
                $confirm_pass = $_POST['conf_pass'];

               $query = "SELECT cust_pass FROM customer Where cust_id=$customer_id";
               $run   = mysqli_query($con,$query);

               if(mysqli_num_rows($run) > 0 ){
                  $row = mysqli_fetch_array($run);
                  $cust_pass  = $row['cust_pass'];
                   if(!empty($old_pass) && !empty($new_pass) && !empty($confirm_pass)){
                      if($old_pass === $cust_pass){
                         if($new_pass===$confirm_pass){

                          $up_query = "UPDATE customer SET cust_pass = '$confirm_pass'";
  
                           if(mysqli_query($con,$up_query)){
                             $msg ="<div class='alert alert-success alert-dismissible fade show pt-1 pb-1 pl-3'  role='alert'>
                             <strong><i class='fas fa-check-circle'></i> Congratulation! </strong> your password has been changed.
                             <button type='button' class='close p-2' data-dismiss='alert' aria-label='Close'>
                              <span  aria-hidden='true'>&times;</span>
                             </button>
                              </div>";
                           
                                  }
                            } 
                            else {
                           $error="<div class='alert alert-danger alert-dismissible fade show pt-1 pb-1 pl-3'  role='alert'>
                           <strong><i class='fas fa-info-circle'></i> Ooh! </strong>New password and confirm password must be matched.
                           <button type='button' class='close p-2' data-dismiss='alert' aria-label='Close'>
                            <span  aria-hidden='true'>&times;</span>
                           </button>
                            </div>";
                            }
                      }
                      else{
                        $error="<div class='alert alert-danger alert-dismissible fade show pt-1 pb-1 pl-3'  role='alert'>
                           <strong><i class='fas fa-info-circle'></i> Ooh! </strong>Old password is wrong!.
                           <button type='button' class='close p-2' data-dismiss='alert' aria-label='Close'>
                            <span  aria-hidden='true'>&times;</span>
                           </button>
                            </div>";
                      }


                      



                       }else{
                          $error="<div class='alert alert-danger alert-dismissible fade show pt-1 pb-1 pl-3'  role='alert'>
                          <strong><i class='fas fa-info-circle'></i> Sorry! </strong>All(*) Fields Are Required.
                          <button type='button' class='close p-2' data-dismiss='alert' aria-label='Close'>
                            <span  aria-hidden='true'>&times;</span>
                          </button>
                            </div>";
                   }
                }
              }

              if(isset($msg)){
                echo $msg;
              }
              else if(isset($error)){
                echo $error;
              }
              ?>
              
            <form  method="post" class="w-50">

                <div class="form-group">
                  <label>Mật khẩu cũ: *</label>
                  <input type="text" name="old_pass" placeholder="Mật khẩu cũ: *" class="form-control" >
               </div>

                <div class="form-group">
                  <label>Mật khẩu mới: *</label>
                  <input type="text" name="new_pass" placeholder="Mật khẩu mới: *" class="form-control" >
                </div>

                <div class="form-group">
                  <label>Mật khẩu xác nhận: *</label>
                  <input type="text" name="conf_pass" placeholder="Mật khẩu xác nhận: *"  class="form-control" >
              </div>

              <div class="form-group text-center mt-4">
                <input type="submit" name="update" class="btn btn-primary" value="Update">
              </div>
         
          </form> 
             
            
           
         </div>
       </div>
   </div>
   
   <?php include('include/footer.php');?>