<?php
echo "<p align=\"right\">".date("l") . "&nbsp;" .date("d/M/Y");
date_default_timezone_set("Asia/Calcutta");
echo " ". date("h:i:sa"). "</p>";
?>
<style type="text/css">
body {
	/* Location of the image */
	background-image:url(images/background/bg.jpg);

	/* Background image is centered vertically and horizontally at all times */
	background-position: center center;
  
	/* Background image doesn't tile */
	background-repeat: no-repeat;
	
	/* Background image is fixed in the viewport so that it doesn't move when 
		the content's height is greater than the image's height */
	background-attachment: fixed;
	
	/* This is what makes the background image rescale based
		on the container's size */
	background-size: cover;
	
	/* Set a background color that will be displayed
		while the background image is loading */
	background-color: #464646;
}
</style>
<title>Stock Management System</title>
<!-- <SCRIPT LANGUAGE="JavaScript">
var message="Sorry,Right click disabled";
///////////////////////////////////
function clickIE() {if (document.all) {alert(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {alert(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}

document.oncontextmenu=new Function("return false")
// --> 
</script>

