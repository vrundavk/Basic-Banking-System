<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
  
</head>
<body>
    <?php
    include 'navbar.php';
    ?>
    
    <div class="container">
        <div class="row" style="padding: 50px;">
        <div class="col-12 col-sm-10 offset-sm-1 text-center">
            <h2>Customer Details</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Balance</th>
                            <th>Transfer</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        include 'connection.php';
                        
                        $sql= 'SELECT * FROM users ORDER BY id';
                        $result= mysqli_query($con,$sql);
                        $users= mysqli_fetch_all($result, MYSQLI_ASSOC);
                        //free the memory 
                        mysqli_free_result($result);
                        mysqli_close($con);
                        

                        foreach($users as $user){ ?>

                            <tr>
                                <td><?php echo htmlspecialchars($user['id']);?></td>
                                <td><?php echo htmlspecialchars($user['name']);?></td>
                                <td><?php echo htmlspecialchars($user['email']);?></td>
                                <td><span class="fa fa-inr "></span><?php echo htmlspecialchars($user['balance']);?></td>
                                <td><a href="transfer_money.php ?id=<?php  echo $user['id']; ?>" ><i class=" fa fa-user-circle fa-lg" aria-hidden="true" style="color:#52ab98;"></i></a></td>
                                </tr>

                        <?php } ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        
    </div>


    <?php
    include 'footer.php';
    ?>
<!-- jQuery first, then Popper.js, then Bootstrap JS. -->
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
