<?php
    include('../includes/session.php');
    include('../includes/allfunctions.php');

    $sql1 = "SELECT * FROM `ssf_cashbook`";
    $result1 = mysqli_query($db,$sql1) or die(mysqli_error($db));
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
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">-->
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">

    <link rel="stylesheet" href="../includes/css/design.css">
    <link rel="stylesheet" href="../includes/css/tabledesign.css">

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

    <?php echo("<title>$cashbook[2] $page_title</title>"); ?>
</head>
<body>
    <!-- VIEW POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Cashbook Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form>
                    <div class="modal-body" id="viewcashbook">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> CLOSE </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Cashbook Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="ssf_cashbook_edit.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="ecbid">Cashbook ID</label>
                            <input type="text" class="form-control" id="ecbid" name="ecbid" readonly>
                        </div>
                        <!-- <div class="form-group">
                            <label for="ecbpurpose">Purpose</label>
                            <input type="text" class="form-control" id="ecbpurpose" name="ecbpurpose" required>
                        </div>
                        <div class="form-group">
                            <label for="ecbsource">Source</label>
                            <input type="text" class="form-control" id="ecbsource" name="ecbsource" required>
                        </div> -->
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ecbdate">Date</label>
                                    <input type="date" class="form-control" id="ecbdate" name="ecbdate">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ecbamount">Amount</label>
                                    <input type="number" class="form-control" id="ecbamount" step="0.01" min="0.01" name="ecbamount" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ecbreceivedby">Received By</label>
                                    <input type="text" class="form-control" id="ecbreceivedby" name="ecbreceivedby" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>Amount Entry</div>
                                <div class="form-check form-check-inline py-2">
                                    <input class="form-check-input" type="radio" name="ecbentry" id="eamountin" value="in">
                                    <label class="form-check-label" for="amountin">
                                        In
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ecbentry" id="eamountout" value="out">
                                    <label class="form-check-label" for="amountout">
                                        Out
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ecblocation">Location</label>
                            <textarea class="form-control" id="ecblocation" rows="3" name="ecblocation"></textarea>
                        </div>
                        <p class="text-white bg-danger p-3">If you want to change linked Party details please enter the ID of party else leave as it is.</p>
                        <div class="form-group">
                            <label for="ecbpid">New Party ID</label>
                            <input type="number" min=0 step=1 class="form-control" id="ecbpid" name="ecbpid">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    
     <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
     <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Cashbook Entry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="ssf_cashbook_delete.php" method="POST">
                    <div class="modal-body">
                        <input type="text" name="dcashbookid" id="dcashbookid" readonly>
                        <h4> Do you want to Delete this Data ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-danger"> Yes !! Delete it. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- /////////////////////////// -->
    <div class="d-flex justify-content-center mb-3">
        <p class="h3 bg-light px-4 py-2" style="border-radius: 25px"><?php echo strtoupper($cashbook[2]); ?></p>
    </div>
    <div class="mx-4">
        <table id="example" class="table table-striped table-bordered hover display" style="width:100%">
            <thead>
                <tr class="bg-dark text-white">
                    <th>CB ID</th>
                    <!-- <th>Purpose</th>
                    <th>Source</th> -->
                    <th>Entry Date</th>
                    <th>Amount</th>
                    <th>Received by</th>
                    <th>Amount Entry</th>
                    <th>Location</th>
                    <th>Party ID</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>CB ID</th>
                    <!-- <th>Purpose</th>
                    <th>Source</th> -->
                    <th>Date of Entry</th>
                    <th>Amount</th>
                    <th>Received by</th>
                    <th>Amount Entry</th>
                    <th>Location</th>
                    <th>Party ID</th>
                </tr>
            </tfoot>
            <tbody>
                <?php 
                    foreach($result1 as $row){
                        echo'<tr class="bg-light">
                        <td>'.$row['cbid'].'</td>
                        <td>'.$row['cbdate'].'</td>
                        <td>'.$row['cbamount'].'</td>
                        <td>'.$row['cbreceivedby'].'</td>
                        <td>'.$row['cbentry'].'</td>
                        <td>'.$row['cblocation'].'</td>
                        <td>'.$row['cbpid'].'</td>
                        <td><i class="far fa-eye viewbtn text-success"></i>
                        <i class="far fa-edit editbtn text-primary px-3"></i>
                        <i class="far fa-trash-alt text-danger deletebtn" id="deletebtn"></i>
                        </tr>';
                 }
                ?>
                </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
        var table = $('#example').DataTable( {
            "columns": [
                {"width": "7%"},
                {"width": "10%"},
                {"width": "10%"},
                {"width": "10%"},
                {"width": "10%"},
                {"width": "10%"},
                {"width": "8%"},
                {"width": "10%"}
            ],
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
            $('#example').on('click', '.viewbtn', function () {
                $tr = $(this).closest('tr');
                //var pid = $(this).attr("cashbookid");
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                var vcashbookid=data[0];
                //$('#eempid').val(data[0]);
                $.ajax({ //create an ajax request to display.php
                    method: "POST",
                    url: "../ssf/ssf_cashbook_display.php",
                    data: {vcashbookid:vcashbookid}, //expect html to be returned                
                    success: function (data) {
                        $("#viewcashbook").html(data);
                        $('#viewmodal').modal('show');
                        //alert(response);
                    }
                });

            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#example').on('click', '.deletebtn', function () {
                $('#deletemodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#dcashbookid').val(data[0]);
            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $('#example').on('click', '.editbtn', function () {
                $('#editmodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#ecbid').val(data[0]);
                /* $('#ecbpurpose').val(data[1]);
                $('#ecbsource').val(data[2]); */
                $('#ecbdate').val(data[1]);
                $('#ecbamount').val(data[2]);
                $('#ecbreceivedby').val(data[3]);
                //var jcashbookentry=data[4];
                //console.log(data[4]);
                //$('#ecashbooke').val(data[4]);
                //var RadeoButtonStatusCheck = $('form input[type=radio]:checked').val();
                //$("input[name='ecashbookentry']:checked").val(data[4]);
                //$('#ecashbookentry').val(RadeoButtonStatusCheck);
                $('[name="ecbentry"]').val([data[4]]);
                //$('input[name=ecashbookentry]:checked').val();
                $('#ecblocation').val(data[5]);
                $('#ecbpid').val(data[6]);
            });
        });
    </script>
</body>
</html>