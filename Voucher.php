<?php
include("connection.php");
session_id("session3");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Scss/voucher.css?ts=<?=time()?>">
    <title>Document</title>
</head>
<body>
    <form class="section"  method="POST" action = "Voucher_Transfer.php">
        <div class="container">
            <div class="col1">
                <div class="header">
                    <div class="logo"><img src="logo.png" alt="logo"></div>
                    <h2 class="about_form">CASH RECEIPT</h2>
                    <div class="empty_header"></div>
                </div>
                <div class="body">
                    <div class="date">
                        <input type="date" name="date" id="" value="<?php echo date('Y-m-d'); ?>" readonly>
                    </div>
                    <h3>DEPOSITED BY:</h3>
                    <div class="sender_info">
                        <div class="sender_name">
                            <label for="">Name: </label>
                            <input name="depoBy_name" type="text" required>
                        </div>
                        <div class="sender_number">
                            <label for="">Number: </label>
                            <input name="depoBy_number" type="number" required>
                        </div>
                    </div>
                    <h3>DEPOSITED TO:</h3>
                    <div class="receiver_info">
                        <div class="user_name">
                            <label for="">Name: </label>
                            <input name="userName" type="text" required>
                        </div>
                        <div class="user_number">
                            <label for="">Number: </label>
                            <input name="userNumber" type="number" required>
                        </div>
                    </div>
                    <div class="error_php">
                        <?php
                        if(isset($_SESSION['empty_amount']) && isset($_SESSION['accepted']) && isset($_SESSION['no_recep']) && isset($_SESSION['wrong_name'])){
                            if($_SESSION['accepted'] == 'true'){
                                echo "<p style = 'color: green;'>This transaction has been accepted.</p>";
                                $_SESSION['accepted'] = 'false';
                            }
                            elseif($_SESSION['empty_amount'] == 'true'){
                                echo "<p style = 'color: red;'>Please put some amount to deposite.</p>";
                                $_SESSION['empty_amount'] = 'false';
                            }
                            elseif($_SESSION['no_recep'] == 'true'){
                                echo "<p style = 'color: red;'>The Recepient Number is incorrect.</p>";
                                $_SESSION['no_recep'] = 'false';
                            }
                            elseif($_SESSION['wrong_name'] == 'true'){
                                echo "<p style = 'color: red;'>The Recepient Nameis incorrect.</p>";
                                $_SESSION['wrong_name'] = 'false';
                            }
                        }
                        ?>
                    </div>
                    <div class="button">
                        <button type="submit">Send</button>
                    </div>
                </div>
                
            </div>
            <div class="col2">
                <div class="table">
                    <div class="tr">
                        <div class="td1"><input id="i1000" type="number" value="0" min="0"></div>
                        <div class="td2">X1000</div>
                        <div class="td3"><input id="r1000" type="number" value="0" readonly></div>
                    </div>
                    <div class="tr">
                        <div class="td1"><input id="i500" type="number" value="0" min="0"></div>
                        <div class="td2">X500</div>
                        <div class="td3"><input id="r500" type="number" value="0" readonly></div>
                    </div>
                    <div class="tr">
                        <div class="td1"><input id="i100" type="number" value="0" min="0"></div>
                        <div class="td2">X100</div>
                        <div class="td3"><input id="r100" type="number" value="0" readonly></div>
                    </div>
                    <div class="tr">
                        <div class="td1"><input id="i50" type="number" value="0" min="0"></div>
                        <div class="td2">X50</div>
                        <div class="td3"><input id="r50" type="number" value="0" readonly></div>
                    </div>
                    <div class="tr">
                        <div class="td1"><input id="i20" type="number" value="0" min="0"></div>
                        <div class="td2">X20</div>
                        <div class="td3"><input id="r20" type="number" value="0" readonly></div>
                    </div>
                    <div class="tr">
                        <div class="td1"><input id="i10" type="number" value="0" min="0"></div>
                        <div class="td2">X10</div>
                        <div class="td3"><input id="r10" type="number" value="0" readonly></div>
                    </div>
                    <div class="tr">
                        <div class="td1"><input id="i5" type="number" value="0" min="0"></div>
                        <div class="td2">X5</div>
                        <div class="td3"><input id="r5" type="number" value="0" readonly></div>
                    </div>
                    <div class="tr">
                        <div class="td1"><input id="i2" type="number" value="0" min="0"></div>
                        <div class="td2">X2</div>
                        <div class="td3"><input id="r2" type="number" value="0" readonly></div>
                    </div>
                    <div class="tr">
                        <div class="td1"><input id="i1" type="number" value="0" min="0"></div>
                        <div class="td2">X1</div>
                        <div class="td3"><input id="r1" type="number" value="0" readonly></div>
                    </div>
                    <div class="tr">
                        <div class="td4">Total Ammount:</div>
                        <div class="td3"><input id="total_ammount" name="tot_ammount" type="number" value="0" readonly required></div>
                    </div>
                </div>
                <h3>BENIFICIARY</h3>
                <div class="benificiary">
                    Easy Pay Pvt. Ltd.
                </div>
            </div>
        </div>
    </form>
    <script src="script/voucher.js"></script>
</body>
</html>