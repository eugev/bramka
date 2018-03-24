<?php include('backupdb.php');
 if(!isset($_SESSION['_admin_'])){
echo '<script>window.location.href="logout.php"</script>';
}else{
    $session_email = $_SESSION['_admin_'];
}
?>
<!DOCTYPE html>
<html>
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="zsm/config/environment" content="">

    <link href="https://d1ol71k9tej82b.cloudfront.net/zsm/assets/images/favicon.ico" rel="shortcut icon">
    <!-- <link href="./dssse3_files51351/vendor-345d4048bc35717a182f25a40da55c78.css" rel="stylesheet" type="text/css"> -->
    <link href="./dssse3_files51351/zsm-af0a019e4971711da1d6cef2f2121f6c.css" rel="stylesheet" type="text/css">
    <!-- Google web font -->
    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- -------------------------MINION CSS ------------------------------ -->

    <link href="css/dscere.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- -------------------------MINION CSS ------------------------------ -->

  <title>Dashboard </title>
  <script type="text/javascript" src="https://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">

//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>    
    <style id="custom-theme"></style>
    </head>
    <body class="ember-application" style="overflow-x: hidden;">
     

    <div class="warn-email-confirm">
      <div class="hidden-print banner-admin ">
      </div>

    <div id="ember530"  style="top: 31px;" class="column tab-column hidden-print ember-view">
      <ul class="nav nav-pills nav-stacked fill">
        <li id="ember532" class="active ember-view" style="display: none;">
          <a href="dashboard.php" id="ember533" class="active ember-view"><i class="left-pane-icons fa fa-dashboard"></i> Dashboard</a>
        </li>

        <li id="ember561" class="ember-view">
          <a href="<?php if($prd['break']=='off'){ ?>payment.php?payment_id=<?php echo $payment_id; }else{ ?> payment.php <?php } ?>" id="ember562" class="ember-view"><i class="left-pane-icons fa fa-shopping-basket"></i> Payment</a>
        </li>

        <li id="ember757" class="ember-view">
          <a href="usrauth.php" id="ember758" class="ember-view"><i class="left-pane-icons fa fa-user-md"></i>User Authentication</a>
        </li>
        
        <li class="divider"></li>
        
        <li id="ember607" class="ember-view"  style="display: none;">
          <a href="customer.php" id="ember608" class="ember-view"><i class="left-pane-icons fa fa-user-o"></i>Customers</a>
        </li>

        <li id="ember650" class="ember-view" style="display: none;">
          <a href="subscriptions.php" id="ember651" class="ember-view"><i class="left-pane-icons fa fa-refresh"></i>Subscriptions</a>
        </li>

<!--         <li id="ember686" class="ember-view">
          <a href="invoices.php" id="ember687" class="ember-view"><i class="left-pane-icons fa fa-files51351-o"></i>Invoices</a>
        </li>
 -->
        <li id="ember721" class="ember-view" style="display: none;">
          <a href="events.php" id="ember722" class="ember-view"><i class="left-pane-icons fa fa-calendar-o"></i>Events</a>
        </li>      
        
        <li class="divider"></li>
<?php if($session_role=='admin'){ ?>
        <li id="ember757" class="ember-view">
          <a href="users.php" id="ember758" class="ember-view"><i class="left-pane-icons fa fa-user"></i>Middle Man</a>
        </li>
<?php } ?>
        
        <!--<li id="ember757" class="ember-view">-->
        <!--  <a href="roles.php" id="ember758" class="ember-view"><i class="left-pane-icons fa fa-ioxhost"></i>Roles</a>-->
        <!--</li>-->
        
        <li id="ember757" class="ember-view" style="display: none;">
          <a href="blog.php" id="ember758" class="ember-view"><i class="left-pane-icons fa fa-file-word-o"></i>Blog</a>
        </li>
        
        <li id="ember757" class="ember-view" style="display: none;">
          <a href="support.php" id="ember758" class="ember-view"><i class="left-pane-icons fa fa-ticket"></i>Support</a>
        </li>
        
        <li id="ember757" class="ember-view" style="display: none;">
          <a href="reports.php" id="ember758" class="ember-view"><i class="left-pane-icons fa fa-signal"></i>Reports</a>
        </li>
        <!--<li id="ember721" class="ember-view">-->
        <!--  <a href="#" id="ember722" class="ember-view"><i class="left-pane-icons fa fa-calendar-o"></i>Support</a>-->
        <!--</li>   -->
        <li id="ember757" class="ember-view">
          <a href="#" id="ember758" class="ember-view"><i class="left-pane-icons fa fa-signal"></i>Settings</a>
        </li>        
        <li id="ember650" class="ember-view">
          <a href="logout.php" id="ember651" class="ember-view"><i class="left-pane-icons fa fa-power-off"></i>Logout</a>
        </li>
      </ul>
    </div>      
