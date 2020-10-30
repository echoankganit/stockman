
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="css/design.css">
    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    $(document).ready(function(){
        $("select.country").change(function(){
            var selectedCountry = $(".country option:selected").val();
            $.ajax({
                type: "POST",
                url: "process-request.php",
                data: { country : selectedCountry } 
            }).done(function(data){
                $("#response").html(data);
            });
        });
    });
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Rice Stock Management - Sri Sri Foods</title>
</head>
<body class="d-flex flex-column">
    <div class="flex-grow-1 flex-shrink-0">
        <div class="d-flex justify-content-center">
            <p class="h1">Rice Management Stock</p>
        </div>
        <div class="container col-4">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="ricetype">Rice Type</label>
                    <select class="form-control" id="ricetype1" name="ricetype">
                    <option value="Loose">Loose</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="riceweight">weight</label>
                    <select class="form-control" id="weight1" name="riceweight">
                    <option value="1">1 KG</option>
                    <option value="5">5 KG</option>
                    <option value="10">10 KG</option>
                    <option value="15">15 KG</option>
                    <option value="20">20 KG</option>
                    <option value="50">50 KG</option>
                    <option value="60">60 KG</option>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="units">Units</label>
                        <input type="number" class="form-control col-6" id="units" name="units" min="1" value="1">
                    </div>
                    <div class="form-group col-6">
                        <div>Entry</div>
                        <div class="form-check form-check-inline py-2">
                            <input class="form-check-input" type="radio" name="rsmentry" id="rsmin" value="in" checked>
                            <label class="form-check-label" for="rsmin">
                                In
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rsmentry" id="rsmout" value="out">
                            <label class="form-check-label" for="rsmout">
                                Out
                            </label>
                        </div>
                    </div>
                </div>
                <div>
                <table>
                    <tr>
                        <td>
                            <label>Country:</label>
                            <select class="country">
                                <option>Select</option>
                                <option value="usa">United States</option>
                                <option value="india">India</option>
                                <option value="uk">United Kingdom</option>
                            </select>
                        </td>
                        <td id="response">
                            <!--Response will be inserted here-->
                        </td>
                    </tr>
                </table>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary mr-3" name="rsmsubmit" id="rsmsubmit">Submit</button>
                    <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
                    <button type="home" onclick='window.location="dashboard.php";return false;' class="btn btn-secondary mr-3">Home</button>
                    <button type="submit" class="btn btn-primary" name="available">Available</button>
                </div>
            </form>
        </div>
    <?php include("includes/footer.php");?>
</body>
</html>