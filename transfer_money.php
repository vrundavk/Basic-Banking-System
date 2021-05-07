
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function preback(){window.history.forward();}
        setTimeout("preback()",0);
        window.onunload = function(){null};
    </script>
</head>
<body>
<?php
    include 'navbar.php';
    
    ?>


<div class="container">
        <div class="row justify-content-center" style="padding-top: 20px;">             
            <div class="col-12 col-sm-8 offset-sm-2 text-center" >
                <h2>Transfer money!  <strong>Simple. Fast. Safe.</strong> </h2>             
            </div>
            <div class="col-12 col-sm-2 ">
            
            </div>
        </div>
<?php

include 'connection.php';
$sql= "SELECT * FROM users WHERE id = '{$_GET['id']}' ";
$result= mysqli_query($con,$sql);
$data= mysqli_fetch_array($result,MYSQLI_ASSOC);

?> 
<form method="POST">
        <div class="row" style="padding: 30px;">
            <div class="col-12 col-sm-5">
                <div class="card">
                  <h5 class="card-header text-white ">Sender Details</h5>
                    <div class="card-body bg-light">
                       
                            <div class="form-group">
                                <label for="name1">Full Name</label>
                                <input type="text" name="name1"  value="<?php echo $data['name']; ?>" class="form-control"  placeholder="Enter full name">
                            </div>
                            <div class="form-group">
                                <label for="email1">Email ID</label>
                                <input type="text" name="email1" value="<?php echo $data['email']; ?>" class="form-control"   placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="balance1">Balance</label>
                                <input type="text" name="balance1" value="<?php echo $data['balance']; ?>" class="form-control"   placeholder="Your balance">
                            </div>
                            <div class="form-group" >
                                <label for="amount1">Amount</label>
                                <input type="text" name="amount" class="form-control" id="amount"  placeholder="Enter amount to transfer" required>
                            </div>
                        
                        
                    </div>
                </div>               
            </div>
            <div class="col-12 col-sm-2 align-self-center " >
                <i class="fa fa-exchange fa-lg" style="padding-left: 50%;"></i>
            </div>
            <div class="col-12 col-sm-5 align-self-center">
                <div class="card">
                  <h5 class="card-header text-white ">Receiver Details</h5>
                    <div class="card-body bg-light">
                        
                            <!-- <div class="form-group">
                                <label for="name2">Full Name</label>
                                <input type="text" class="form-control" name="name2"  placeholder="Enter full name">
                            </div>
                            <div class="form-group">
                                <label for="email2">Email ID</label>
                                <input type="text" class="form-control" name="email2"  placeholder="Enter email">
                            </div>                 -->
                            <select name="to" class="form-control" required>
                                <option value="" disabled selected>Choose</option>
                                <?php
                                    include 'connection.php';
                                    $sid=$_GET['id'];
                                    $sql = "SELECT * FROM users where id!=$sid";
                                    $result=mysqli_query($con,$sql);
                                    if(!$result)
                                    {
                                        echo "Error ".$sql."<br>".mysqli_error($con);
                                    }
                                    while($rows = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option class="table" value="<?php echo $rows['id'];?>" >
                                    
                                        <?php echo $rows['name'] ;?> (Balance: 
                                        <?php echo $rows['balance'] ;?> ) 
                                
                                    </option>
                                <?php 
                                    } 
                                ?>
                                <div>
                            </select>
                        
                    </div>
                </div>  
            </div>
        </div>
        <div class="row justify-content-center">             
            <div class="col-auto" style="padding-bottom: 20px;">
                <button  name="submit" class="btn  btn-lg btn-block" style="background-color: #ab6777; color:#ffffff">Transfer Money</button>
            </div>
        </div>
</form>

</div>
<?php

include 'connection.php';
if(isset($_POST['submit']))
{
    

     
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];



    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($con,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($con,$sql);
    $sql2 = mysqli_fetch_array($query);

    

    if($sql1['balance'] >= $amount)
    {
      $decrease_sender=$sql1['balance'] - $amount;
      $sql="UPDATE users SET  balance=$decrease_sender  where id=$from ";
      mysqli_query($con,$sql);

       $increase_receiver=$sql2['balance'] + $amount;
       $sql="UPDATE users SET balance= $increase_receiver where  id=$to ";
       mysqli_query($con,$sql);
      
      
       //transaction history
        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        
        $tran = "INSERT INTO transactions(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($con,$tran);
      
        if($query){
            ?>
            <script>
                swal({
                        icon: "success",
                        title: "Successful!",
                        text: "Trasaction completed"
                    }).then(function(){
                        window.location = "transaction_history.php";
                    });
            
                </script> 
            
            <?php
        
        }else{
            ?>
            <script>
            swal({
                icon: "error",
                title: "Transaction Failed!",
                text: "Fill in all details of the customers"
            }).then(function(){
                window.location = "users.php";
            });
            </script>

            <?php
      
        }
    }else{
    ?>
    <script>
      swal({
                icon: "warning",
                title: "Insufficient Balance!",
                text: "Cannot complete transaction"
      }).then(function(){
                window.location = "users.php";
            });
        </script> 
  <?php
   
 }
 
}
?>

<?php
    include 'footer.php';
    ?>


<!-- jQuery first, then Popper.js, then Bootstrap JS. -->
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>