<style type="text/css">
    .head_panel{
    position: absolute;
    top: 10%;
    left: 35%;
    color: red;
    border: 2px solid red;
    padding: 3px 45px 3px 45px;
    z-index: 100;
        }
</style>
<?php include('header.php'); 

$page_name = basename($_SERVER['PHP_SELF']);


if(isset($_POST['submit'])){
$title = $_POST['title'];

$sqq = "SELECT * FROM `blog` WHERE `title` = '$title'";
$new = $con->query($sqq); 
$count = mysqli_num_rows($new);
  if($count == '1'){
echo '<h3 class="head_panel">TITLE NAME IS ALREADY EXIST</h3><br>';
}else{
$sql = "INSERT INTO `blog` (`title`) VALUES('$title')";
$nw = $con -> query($sql);
$last_id = mysqli_insert_id($con);
echo '<script>window.location.href="blog_edit.php?blog_id='.$last_id.'"</script>';
}
}
?>

    <div id="dp-container" class="column content-column">

      <div class="col-md-12" style="padding: 0px 0px 0px 0px !important">

        <div class="list-header fill">
          <div class="list-filter clearfix">

           <div class="pull-right">
            <button id="ember2179" data-toggle="modal" data-target="#myModals" class="btn btn-primary popovercontainer ember-view" data-original-title="" title="">       <i class="fa fa-plus"></i>&nbsp;New</button>
             <div class="btn-group  list-sorter">

            </div>
            </div>
            <div>

            </div>
          </div>
        </div>

        <div id="ember1921" class="scroll-y fill body scrollbox noscroll-x ember-view" style="height: 1000px;padding: 0px 0px 0px 0px ">   
        <div id="ember1922" class="ember-view"><!----></div>
        <table id="ember1923" class="table table-hover zi-table  ember-view">  <thead>
            <tr>
                  <th style="" id="ember1925" class="sortable text-left ember-view">
                    <div title="Name" class="pull-left over-flow"> Title</div>
                  </th>
                  <th style="" id="ember1925" class="sortable text-left ember-view">
                    <div title="Name" class="pull-left over-flow"> Description</div>
                  </th>
                  <th style="" id="ember1925" class="sortable text-right ember-view">
                    <div title="Name" class="pull-right over-flow"> Action</div>
                  </th>
              <th style="width: 50px;max-width:50px;" class="text-right"><i class="fa fa-search cursor-pointer" data-ember-action="" data-ember-action-1931="1931"></i></th>
            </tr>
          </thead>

        <tbody>
<?php 
$sql = "SELECT * FROM `blog` ORDER BY id DESC";
$new = $con->query($sql);
while ($blog = $new->fetch_assoc()) {
?>
                <tr data-ember-action="" data-ember-action-1946="1946">
                <td id="ember1965" class="ember-view">
                  <?php echo $blog['title']; ?>
                </td>
                <td id="ember1965" class="ember-view">
                  <?php echo substr($blog['content'], 0, 50).'...'; ?>
                </td>
                <td id="ember1964" class="ember-view text-right">
                 <a href="blog_edit.php?blog_id=<?php echo $blog['id']; ?>"><button class="btn btn-primary fa fa-pencil"> Edit</button></a>
                 <a href="delete.php?id=<?php echo $blog['id']; ?>&table_name=blog&page_name=<?php echo $page_name; ?>"><button class="btn btn-danger fa fa-trash"> Delete</button></a>
                </td>
                <td></td>
            </tr>
<?php } ?>

        <!----></tbody>
        </table>


        <div>
        </div>
        </div>     
      </div>

    </div>
</body>
</html>


<!-- --------------------- --- MODEL BOX --- -------------------- -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Open Modal</button>
<!-- --------------------- --- MODEL BOX --- -------------------- -->

<!-- ******************************** ADD MODEL *********************** -->
<div id="myModals" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Title</h4>
      </div>
      <div class="modal-body">


        <form class="form-vertical" action="" method="post">
                  <div class="modal-body">
                      <div id="ember1447" class="ember-view"><!----></div>
                      <div style="padding:0px 15px;" class="row">
          <div class="form-group">
            <label class="mLbl">Name </label>
            <input type="text" id="ember1448" class="ember-text-field form-control ember-view" required="" name="title">
          </div>



                  </div>
                      <div class="modal-footer">  
            <button type="submit" id="ember1452" class="btn btn-primary ember-view" name="submit">    Save
        </button>
              <button type="button" id="ember1453" class="btn btn-default ember-view" data-dismiss="modal">    Cancel
        </button>
        </div>
        </form>


              <div class="modal-footer">  
</div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ******************************** ADD MODEL *********************** -->