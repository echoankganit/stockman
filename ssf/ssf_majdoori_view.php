<?php
    include('../includes/session.php');
    $sql1 = "SELECT * FROM `ssf_majdoori`";
    $result1 = mysqli_query($db,$sql1);
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

    <?php echo("<title>$majdoori[2] $page_title</title>"); ?>
</head>
<body>
    <!-- VIEW POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Majdoori Entry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form>
                    <div class="modal-body" id="viewmajdoori">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Update Majdoori Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="ssf_majdoori_edit.php" method="POST">
                    <div class="modal-body">
                        <!-- <input type="hidden" name="emaid" id="emaid"> -->
                        <h3>Majdoori Entry Details</h3>
                        <div class="form-group">
                            <label for="emaid">Majdoori ID</label>
                            <input type="text" class="form-control" id="emaid" name="emaid" readonly>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <label for="emadate">Entry Date</label>
                                <input type="date" class="form-control" id="emadate" name="emadate">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <label for="emaunits">Units</label>
                                <input type="number" min=0 step=1 class="form-control" id="emaunits" name="emaunits">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emalocation">Location</label>
                            <input type="text" class="form-control" id="emalocation" name="emalocation">
                        </div>
                        <p class="text-danger">If you want to change contractor please enter the ID of contractor else leave as it is.</p>
                        <div class="form-group">
                            <label for="emacontid1">New Contractor ID</label>
                            <input type="number" min=0 step=1 class="form-control" id="emacontid1" name="emacontid1">
                        </div>

                        <hr>
                        <h3>Linked Contractor Details</h3>
                        
                        <div class="form-row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <label for="emacontid">Contractor ID</label>
                                <input type="text" class="form-control" id="emacontid" name="emacontid" readonly>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <label for="emacontname">Contractor Name</label>
                                <input type="text" class="form-control" id="emacontname" name="emacontname" disabled>
                            </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete Majdoori Entry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="ssf_majdoori_delete.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="dmaid" id="dmaid">
                        <h4>Do you want to Delete this Entry ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- /////////////////////////// -->
    <div class="d-flex justify-content-center mb-3">
        <p class="h3 bg-light px-5 py-2" style="border-radius: 25px"><?php echo strtoupper($majdoori[2]); ?></p>
    </div>
    <div class="container">
        <table id="example" class="table table-striped table-bordered hover display" style="width:100%">
            <thead>
                <tr class="bg-dark text-white">
                    <th>Majdoori ID</th>
                    <th>Entry Date</th>
                    <th>Units</th>
                    <th>Location</th>
                    <th>Contractor ID</th>
                    <th>Contractor Name</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Majdoori ID</th>
                    <th>Entry Date</th>
                    <th>Units</th>
                    <th>Location</th>
                    <th>Contractor ID</th>
                    <th>Contractor Name</th>
                </tr>
            </tfoot>
            <tbody>
                <?php 
                    foreach($result1 as $row){
                        echo'<tr class="bg-light">
                        <td>'.$row['maid'].'</td>
                        <td>'.$row['madate'].'</td>
                        <td>'.$row['maunits'].'</td>
                        <td>'.$row['malocation'].'</td>
                        <td>'.$row['macontid'].'</td>
                        <td>'.$row['macontname'].'</td>
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
                //var pid = $(this).attr("rsmid");
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                var vmaid=data[0];
                //$('#eempid').val(data[0]);
                $.ajax({ //create an ajax request to display.php
                    method: "POST",
                    url: "../ssf/ssf_majdoori_display.php",
                    data: {vmaid:vmaid}, //expect html to be returned                
                    success: function (data) {
                        $("#viewmajdoori").html(data);
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
                $('#dmaid').val(data[0]);
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
                $('#emaid').val(data[0]);
                $('#emaid1').val(data[0]);
                $('#emadate').val(data[1]);
                $('#emaunits').val(data[2]);
                $('#emalocation').val(data[3]);
                $('#emacontid').val(data[4]);
                $('#emacontid1').val(data[4]);
                $('#emacontname').val(data[5]);
                //var jrsmentry=data[4];
                //console.log(data[4]);
                //$('#ersme').val(data[4]);
                //var RadeoButtonStatusCheck = $('form input[type=radio]:checked').val();
                //$("input[name='ersmentry']:checked").val(data[4]);
                //$('#ersmentry').val(RadeoButtonStatusCheck);
                /*$('[name="ersmentry"]').val([data[4]]);
                //$('input[name=ersmentry]:checked').val();
                $('#epcategory').val(data[5]);
                $('#epid').val(data[6]);
                $('#epname').val(data[7]);*/
            });
        });
    </script>
</body>
</html>