
<?php // show this page only if logged in
include("index.php");

// ~~~~~~~~~~~~~~~~~~~
// include("session.php");

// $user_check = $_SESSION['login_user'];

// if( $user_check == "" ) {
//   header("location: index.php");
//   exit;
// }
// ~~~~~~~~~~~~~~~~~~~

?>

<div class = "container" style = "background-color: white; margin-top: 3%;">
  <h3>Default Question Block</h3>
  <form>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Program Name</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Briefly describe your program or state your mission</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <p>Below, please think of the populations you serve (e.g. mothers, infants, homeless etc.) You will be asked several questions regarding each population you serve.</p>
    <div id="populationtable-placeholder"></div>
    <div id="populationtable-placeholder2"></div>
  </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(function(){
  $("#populationtable-placeholder").load("_populationtable.html");
});
$(function(){
  $("#yesExtra").click(function(){
    $("#populationtable-placeholder2").load("_populationtable2.html");
  });
});

</script>
