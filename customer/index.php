<?php include('include/header.php'); 

if(!isset($_SESSION['email'])){
    header('location:../sign-in.php');
}
?>
   
    <div class="jumbotron bg-secondary">
        <h1 class="text-center text-white mt-5">Tài khoản</h1>
    </div>
     
     <div class="container mt-5 mb-5">
      
      <div class="row">

         <div class="col-md-3">
         <?php include('include/sidebar.php');?>
        </div>

         <div class="col-md-9">
          <h3>Tài khoản của tôi </h3><hr>

          <a href="orders.php"> <h6 class="text-primary">ORDERS</h6></a>
           <p>Kiểm tra trạng thái và thông tin liên quan đến đơn đặt hàng trực tuyến của bạn</p>

         
         </div>
       </div>

     </div>
      
   

<?php include('include/footer.php') ?>