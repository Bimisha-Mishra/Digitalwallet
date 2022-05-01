<?php
include("connection.php");

session_start();
if(!isset($_SESSION['U_id'])){
    header("Location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Scss/MobilePay.css?ts=<?=time()?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>MobilePay</title>
</head>
<body>
<div class="history-page">
  <div class="info-container">
  <?php
      $user_id = $_SESSION['U_id'];
      $query = "select Total_balance as tb, Name as un from balance b inner join registration r on 
      r.User_ID = b.User_ID where b.User_ID = $user_id";
      $result = mysqli_query($conn, $query);
      $data = mysqli_fetch_assoc($result);
    ?>
    <div class="user_detail">
      <?php echo $data['un'] ?>
    </div>
    <div class="title">
        Total Balance
    </div>
    <div class="total_amount" id = "t_balance">
        <span>Rs. </span><?php echo $data['tb']?>
    </div>
    <button>Send Fund</button> 
    <button onclick="location.href='logout.php'">Logout</button> 
  </div> 
  
      <h1 class="history-page__title">Transaction History</h1>
      <hr />
      <div class="search">
        <div class="search__icon-background">
          <span
            class="iconify search__icon"
            data-inline="false"
            data-icon="ant-design:search-outlined"
          ></span>
        </div>
        <input class="search__input-box" type="search" />
      </div>
      <div class="history-page__purchases">
        <?php
        $number = (int) $_SESSION['U_number'];
        $query2 = "select Sender_number, Receiver_number, Amount, Date, Purpose, Send from history where (Sender_number = $number and Send = 1) or (Receiver_number = $number and Send = 0) ";
        $result2 = mysqli_query($conn, $query2);
        $data2 = array();
        $check_rows = mysqli_num_rows($result2);
        for($i = 0; $i<$check_rows; $i++){
          $data2[$i] = mysqli_fetch_assoc($result2);
        }
        for($i=0; $i<$check_rows; $i++){
        ?>
        <div class="single_transcation">
          <div class="icon">
          <?php
          if ($data2[$i]['Send'] = 0){
          ?>
            <i class="fa-solid fa-reply"></i>
          <?php
          }
          else{
          ?>
          <i class="fa-solid fa-share"></i>
          <?php
          }
          ?>
          </div>
          <div class="details">
            <div class="receiver_info">
              <?php
              if($data2[$i]['Send'] = 0){
                echo $data2[$i]['Receiver_number'];
              }
              else{
                echo $data2[$i]['Sender_number'];
              }
              ?>
            </div>
            <div class="transaction_date">
              <?php
                echo $data2[$i]['Date'];
              ?>
            </div>
            <div class="transaction_purpose">
              <?php
                echo $data2[$i]['Purpose'];
              ?>
            </div>
          </div>
          <div class="amount">
          <span>Rs. </span><?php echo $data2[$i]['Amount']?>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
    </div>
    <!-- <script src = "js/history.js"></script> -->
    <script src="https://code.iconify.design/1/1.0.3/iconify.min.js"></script>
    <script src="https://kit.fontawesome.com/91d850ff13.js" crossorigin="anonymous"></script>
    
</body>
</html>