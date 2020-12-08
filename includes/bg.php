<?php
	$page_title = " - Sri Sri Foods | Stock Management System";
	$comp1 = array("Sri Sri Foods", "../ssf/ssf_contents.php");
	$comp2 = array("Shree Vardhman Foods", "../svf/svf_contents.php");

	$partyreg = array("Party Registration", "../ssf/ssf_party.php", "Party View", "../ssf/ssf_party_view.php");
	$empreg = array("Employee Registration", "../ssf/ssf_employee.php", "Employee View", "../ssf/ssf_employee_view.php");
	$contreg = array("Contractor Registration", "../ssf/ssf_contractor.php", "Contractor View", "../ssf/ssf_contractor_view.php");
	$khushreg = array("Add New Khushboo", "../ssf/ssf_new_khushboo.php", "Khushboo View", "../ssf/ssf_new_khush_view.php");

	$rsm = array("Rice Stock Management", "../ssf/ssf_rsm.php", "Rice Stock View", "../ssf/ssf_rsm_view.php");
	$empatt = array("Employee Attendance", "../ssf/ssf_attendance.php");
	$cashbook = array("Cash Book", "../ssf/ssf_cashbook.php");
	$bankbook = array("Bank Book", "../ssf/ssf_bankbook.php");

	$khushboo = array("Khushboo Management", "../ssf/ssf_khushboo.php", "Khushboo View", "../ssf/ssf_khushboo_view.php");
	$stitching = array("Stitching Management", "../ssf/ssf_stitching.php", "Stitching View", "../ssf/ssf_stitching_view.php");
	$majdoori = array("Majdoori Management", "../ssf/ssf_majdoori.php", "Majdoori View", "../ssf/ssf_majdoori_view.php");

	$logout = array("Logout", "../includes/logout.php");
	$pcategories = array("Bank Accounts","Bank OCC A/c","Bank OD A/c", "Branch / Divisons", "Capital Account", "Cash-in-hand", "Creditors - Brokers", "Creditors - Others", "Creditors - Rent", "Current Assets", "Current Liabilities", "Deposits (Asset)", "Direct Expenses", "Direct Incomes", "Duties and Taxes", "Expenses (Direct)", "Expenses (Indirect)", "Expenses Payable", "Fixed Assets", "Government Dues", "Income (Direct)", "Income (Indirect)", "Indirect Expenses", "Indirect Incomes", "Investments", "Loans and Advances (Asset)", "Loans (Liability)", "Misc. Expenses (ASSET)", "Provisions", "Purchase Accounts", "Reserves and Surplus", "Retained Earnings", "Sales Accounts", "Secured Loans", "Stock-in-hand", "Sundry Creditors", "Sundry Debtors", "Suspense A/c", "Unsecured Loans");
?>
<style type="text/css">
body {
	/* Location of the image */
	background-image:url(../images/background/bg.jpg);

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
//
</script>-->

