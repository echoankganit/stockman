<?php
    include('../includes/session.php');
    $sql1 = "SELECT * FROM `ssf_party`";
    $result1 = mysqli_query($db,$sql1);
    $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
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

    <?php echo("<title>Party View $page_title</title>"); ?>
</head>
<body>
    <!-- VIEW POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> View Party Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form>
                    <div class="modal-body" id="viewparty">
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
                    <h5 class="modal-title" id="exampleModalLabel"> Update Party Details </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="ssf_party_edit.php" method="POST">
                    <div class="modal-body">
                    <input type="hidden" name="epid" id="epid">
                        <div class="form-group">
                            <label for="pname">Party ID</label>
                            <input type="text" class="form-control" name="epid" id="epid1" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pname">Party Name</label>
                            <input type="text" class="form-control" id="epname" name="epname">
                        </div>
                        <div class="form-group">
                            <label for="paddress">Party Address</label>
                            <input type="text" class="form-control" id="epaddress" name="epaddress">
                        </div>
                        <div class="form-group">
                            <label for="pgstin">GSTIN</label>
                            <input type="text" class="form-control" id="epgstin" name="epgstin">
                        </div>
                        <div class="form-group">
                            <label for="pcategory">Party Category</label>
                            <select class="form-control" id="epcategory" name="epcategory">
                            <?php foreach($pcategories as $item){
                                echo "<option value='$item'>$item</option>";
                            }?>
                            </select>
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
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Party Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="ssf_party_delete.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="dpid" id="dpid">
                        <h4> Do you want to Delete this Data ??</h4>
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
                        <td><i class="far fa-eye viewbtn text-success pl-5"></i>
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
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
        } );
 
        table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );
    </script>
    <script>
        $(document).ready(function () {
            $('#example').on('click', '.viewbtn', function () {
                $tr = $(this).closest('tr');
                //var pid = $(this).attr("partyid");
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                var pid=data[0];
                $('#epid').val(data[0]);
                $.ajax({ //create an ajax request to display.php
                    method: "POST",
                    url: "../ssf/ssf_party_display.php",
                    data: {pid:pid}, //expect html to be returned                
                    success: function (data) {
                        $("#viewparty").html(data);
                        $('#viewmodal').modal('show');
                        //alert(response);
                    }
                });

            });
        });
    </script>


    <script>
        $(document).ready(function () {

            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }
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
                $('#dpid').val(data[0]);
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
                $('#epid').val(data[0]);
                $('#epid1').val(data[0]);
                $('#epname').val(data[1]);
                $('#epaddress').val(data[2]);
                $('#epgstin').val(data[3]);
                $('#epcategory').val(data[4]);
            });
        });
    </script>
    <?php include("../includes/footer.php");?>
</body>
</html>