<?php
    include('../includes/session.php');
    $sql1 = "SELECT * FROM `ssf_party`";
    $result1 = mysqli_query($db,$sql1);
    //$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>

    <?php echo("<title>Party View $page_title</title>"); ?>
</head>
<body>
    <div class="container">
    <table id="example" class="table table-striped table-bordered hover" style="width:100%">
            <thead>
                <tr class="bg-dark text-white">
                    <th>Party ID</th>
                    <th>Party Name</th>
                    <th>Address</th>
                    <th>GSTIN</th>
                    <th>Party Category</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Party ID</th>
                    <th>Party Name</th>
                    <th>Address</th>
                    <th>GSTIN</th>
                    <th>Party Category</th>
                </tr>
            </tfoot>
            <tbody>
                <?php 
                    foreach($result1 as $row){
                        echo'<tr class="bg-light">
                        <td>'.$row['partyid'].'</td>
                        <td>'.$row['pname'].'</td>
                        <td>'.$row['paddress'].'</td>
                        <td>'.$row['pgstin'].'</td>
                        <td>'.$row['pcategory'].'</td>
                        <td class="bg-light"><a href="view.php?id='. $row['partyid'] .'" title="View Record" data-toggle="tooltip"><i class="far fa-eye"></i></a>
                        <a href="edit.php?id='. $row['partyid'] .'" title="Edit Record" data-toggle="tooltip" class="px-3"><i class="far fa-edit"></i></a>
                        <a href="delete.php?id='. $row['partyid'] .'" title="Delete Record" data-toggle="tooltip"><i class="far fa-trash-alt"></i></a></td>
                        </tr>';
                 }
                ?>
                </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
        var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
        } );
 
        table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );
    </script>
    <?php include("../includes/footer.php");?>
</body>
</html>