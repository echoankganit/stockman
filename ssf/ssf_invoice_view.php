<?php
    include('../includes/session.php');
    $sql1 = "SELECT * FROM `ssf_invoice`";

    $result1 = mysqli_query($db,$sql1) or die(mysqli_error($db));
    $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
 
    <link rel="stylesheet" href="../includes/css/design.css">
    
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

    <?php echo("<title>$invoiceform[2] $page_title</title>"); ?>
</head>
<body>
    <!-- VIEW POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Khushboo Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form>
                    <div class="modal-body" id="viewnk">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> CLOSE </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Print POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="printmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Print Invoice Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../modules/cashbook_invoice.php" method="GET">
                    <div class="modal-body">
                        <input type="hidden" name="pinnum" id="pinnum">
                        <h4> Do you want to Print this Data ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="pinprint" class="btn btn-danger"> Yes </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /////////////////////////// -->
    <div class="d-flex justify-content-center mb-3">
        <p class="h3 bg-light px-5 py-2" style="border-radius: 25px"><?php echo strtoupper($invoiceform[2]); ?></p>
    </div>
    <div class="container">
        <table id="example" class="table table-striped table-bordered hover display" style="width:100%">
            <thead>
                <tr class="bg-dark text-white">
                    <th>Invoice No.</th>
                    <th>Date</th>
                    <th>Rate</th>
                    <th>Broker</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Invoice No.</th>
                    <th>Date</th>
                    <th>Rate</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                //$a = array("a", "b", "c");
                    foreach($result1 as $row){
                        //echo $a = $row['inrate'];
                        //array() = $row['inrate'];
                        $arrayrate = explode(": ",$row['inrate']);
                        echo'<tr class="bg-light">
                        <td>'.$row['innum'].'</td>
                        <td>'.$row['indate'].'</td>
                        <td>'.$arrayrate[0]." ".$arrayrate[1]." ".$arrayrate[2]." ".$arrayrate[3]." ".$arrayrate[4].'</td>
                        <td>'.$row['inbroker'].'</td>
                        <td><a type="button" name="inview" class="btn btn-primary viewbtn mr-4">View</a>
                        <button name="inprint" class="btn printbtn btn-dark">Print</button></td>
                        </tr>';
                        /* <td><i class="far fa-eye viewbtn text-success pl-5"></i>
                        <i class="far fa-edit editbtn text-primary px-3"></i>
                        <i class="far fa-trash-alt text-danger deletebtn" id="deletebtn"></i></td> */
                        //$i++;
                     }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
        var table = $('#example').DataTable( {
            "order": [[ 0, "desc" ]],
            select: {
                items: 'row'
            },
            //lengthChange: false,
            buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    //columns: [ 0, ':visible' ]
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    //columns: [ 0, 1, 2, 5 ]
                    columns: ':visible'
                }
            },
            'colvis'
            ],
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search",
            },
        } );

        table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );
    </script>

    <script>
        $(document).ready(function () {
            $('#example').on('click', '.printbtn', function () {
                $('#printmodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#pinnum').val(data[0]);
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#example').on('click', '.viewbtn', function () {
                $tr = $(this).closest('tr');
                //var pid = $(this).attr("khushbooid");
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                var vinnum=data[0];
                //$('#eempid').val(data[0]);
                $.ajax({ //create an ajax request to display.php
                    method: "POST",
                    url: "../ssf/ssf_invoice_display.php",
                    data: {vinnum:vinnum}, //expect html to be returned                
                    success: function (data) {
                        $("#viewin").html(data);
                        $('#viewmodal').modal('show');
                        //alert(response);
                    }
                });

            });
        });
    </script>
</body>
</html>