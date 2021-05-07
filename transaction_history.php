<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking System</title>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
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
        <div class="row" style="padding: 50px;">
        <div class="col-12 col-sm-10 offset-sm-1 text-center">
            <h2>Transaction History</h2>
            <h6>(Latest First...)</h6>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Date</th>
                            <th>Sender</th>
                            <th>Receiver</th>
                            <th>Balance</th>
                           
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        include 'connection.php';
                        
                        $sql= 'SELECT * FROM transactions ORDER BY `datetime` DESC';
                        $result= mysqli_query($con,$sql);
                        $history= mysqli_fetch_all($result, MYSQLI_ASSOC);
                        //free the memory 
                        mysqli_free_result($result);
                        mysqli_close($con);
                        

                        foreach($history as $record){ ?>

                            <tr>
                                <td><?php echo htmlspecialchars($record['datetime']);?></td>
                                <td><?php echo htmlspecialchars($record['sender']);?></td>
                                <td><?php echo htmlspecialchars($record['receiver']);?></td>
                                <td><span class="fa fa-inr "></span><?php echo htmlspecialchars($record['amount']);?></td>                            
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