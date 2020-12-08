<footer class="footer">
    <div class="container d-flex">
        <div class="mr-auto d-flex justify-content-center">
            Developed by <a href="http://anthemitsol.com" class="text-muted"> &nbsp;Anthem IT Solutions.</a>
        </div>
        <?php
            echo "<div>".date("l") . "&nbsp;" .date("d/M/Y");
            date_default_timezone_set("Asia/Calcutta");
            echo " ". date("h:i:sa"). "</div>";
        ?>
    </div>
</footer>