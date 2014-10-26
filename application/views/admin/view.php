<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>KNT Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Pace -->
    <link href="css/pace.css" rel="stylesheet">

    <!-- Endless -->
    <link href="css/endless.css" rel="stylesheet">
    <link href="css/endless-skin.css" rel="stylesheet">
  </head>

  <body class="overflow-hidden">
  <!-- Overlay Div -->
  <div id="overlay" class="transparent"></div>

  <div id="wrapper" class="preload sidebar-hide">
    <div id="top-nav" class="skin-6 fixed">
      <div class="brand">
        <span>KNT-Taiwan</span>
        <span class="text-toggle"> Admin</span>
      </div><!-- /brand -->
      <button type="button" class="navbar-toggle pull-left" id="sidebarToggle">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <button type="button" class="navbar-toggle pull-left hide-menu" id="menuToggle">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <ul class="nav-notification clearfix">
        <li class="profile dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <strong>Administrator</strong>
            <span><i class="fa fa-chevron-down"></i></span>
          </a>
          <ul class="dropdown-menu">
            <li><a tabindex="-1" class="main-link logoutConfirm_open" href="#logoutConfirm"><i class="fa fa-lock fa-lg"></i> Log out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /top-nav-->

    <div id="main-container">
      <div class="row row-merge">
        <div class="col-sm-3 bg-primary custom-grid menu-grid">
          <button type="button" class="navbar-toggle" id="inboxMenuToggle" >
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="menu-header">
            Folder
          </div>
          <ul class="inbox-menu" id="inboxMenu">
            <li class="active">
              <a href="index.php?/admin/index">
                <i class="fa fa-inbox fa-lg"></i>
                <span class="m-left-xs">Inbox</span>
                <span class="badge badge-success pull-right">{inbox_count}</span>
              </a>
            </li>
            <li class="active">
              <a href="index.php?/admin/archive">
                <i class="fa fa-archive fa-lg"></i>
                <span class="m-left-xs">Archive</span>
                <span class="badge badge-default pull-right">{archive_count}</span>
              </a>
            </li>
          </ul>
        </div><!-- /.col -->
        <div class="col-sm-9">
          <div class="panel panel-default inbox-panel">
            <div class="panel-body">
              <div class="padding-md">
                <div class="clearfix">
                  <div class="pull-left">
                    <div class="pull-left m-left-sm">
                      <h3 class="m-bottom-xs m-top-xs"><?= $item['title'] ?></h3>
                    </div>
                  </div>
                  <div class="pull-right">
                    <h5><strong>#<?= $item['id'] ?></strong></h5>
                    <strong><?= $item['created_at'] ?></strong>
                  </div>
                </div>
                <hr>
                <div class="clearfix">
                  <div class="pull-right text-right">
                    <h4>Client Information</h4>
                    <address>
                      <strong><?= $item['name'] ?></strong><br>
                      <br>
                      <?= $item['email'] ?><br>
                      <abbr title="Phone">P:</abbr> <?= $item['tel'] ?>
                    </address>
                  </div>
                </div>

                <table class="table table-striped m-top-md" id="dataTable">
                  <thead>
                    <tr class="bg-theme">
                      <th>No</th>
                      <th>Product</th>
                      <th>Unit Price</th>
                      <th class="hidden-xs">Quantity</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $row_data = json_decode($item['row_data']);
                      $total_price = 0;
                      if(@$row_data->airline){
                        echo "<tr>";
                        echo "<td>#".$row_data->airline_id."</td>";
                        echo "<td>".$row_data->airline."</td>";
                        echo "<td>$".$row_data->airline_price."</td>";
                        echo "<td class='hidden-xs'>1</td>";
                        echo "<td>$".$row_data->airline_price."</td>";
                        $total_price += $row_data->airline_price;
                        echo "</tr>";
                      }
                      if(@$row_data->tour){
                        foreach($row_data->tour as $index => $t):
                          echo "<tr>";
                          echo "<td>#".$row_data->tour_id[$index]."</td>";
                          echo "<td>".$t."</td>";
                          echo "<td>$".$row_data->tour_price[$index]."</td>";
                          echo "<td class='hidden-xs'>1</td>";
                          echo "<td>$".$row_data->tour_price[$index]."</td>";
                          $total_price += $row_data->tour_price[$index];
                          echo "</tr>";
                        endforeach;
                      }
                      if(@$row_data->hotel){
                        foreach($row_data->hotel as $index => $t):
                          echo "<tr>";
                          echo "<td>#".$t->id."</td>";
                          echo "<td>".$t->name."</td>";
                          echo "<td>$".$t->price."</td>";
                          echo "<td class='hidden-xs'>".$t->day."</td>";
                          echo "<td>$".($t->price * $t->day)."</td>";
                          $total_price += ($t->price * $t->day);
                          echo "</tr>";
                        endforeach;
                      }
                      if(@$row_data->plus){
                        echo "<tr>";
                        echo "<td>#".$row_data->plus->id."</td>";
                        echo "<td>".$row_data->plus->name."</td>";
                        echo "<td>$".$row_data->plus->price."</td>";
                        echo "<td class='hidden-xs'>";
                        if($row_data->plus->id == 65){echo '三日';}else{echo '二日';}
                        echo "</td>";
                        echo "<td>$".$row_data->plus->price."</td>";
                        $total_price += $row_data->plus->price;
                        echo "</tr>";
                      }
                      if(@$row_data->ticket){
                        echo "<tr>";
                        echo "<td>#".$row_data->ticket_id."</td>";
                        echo "<td>".$row_data->ticket."</td>";
                        echo "<td>$".$row_data->ticket_price."</td>";
                        echo "<td class='hidden-xs'>1</td>";
                        echo "<td>$".$row_data->ticket_price."</td>";
                        $total_price += $row_data->ticket_price;
                        echo "</tr>";
                      }
                    ?>
                  </tbody>
                </table>

                <div class="pull-right">
                  <table class="table m-top-md">
                    <tbody>
                      <tr class="no-border">
                        <td class="no-border"></td>
                        <td class="no-border"></td>
                        <td class="no-border"></td>
                        <td class="text-right no-border"><strong>Total</strong></td>
                        <td><strong class="text-danger">$<?= $total_price ?></strong></td>
                      </tr>
                    </tbody>
                  </table>
                  <a class="btn btn-warning hidden-print" href="javascript:history.back()"><i class="fa fa-reply"></i> Back</a>
                  <?php if(!$item['readed']):?>
                    <a class="btn btn-success hidden-print" id="set_readed"><i class="fa fa-check"></i> Mark as Readed</a>
                  <?php endif;?>
                </div>
              </div><!-- /.padding20 -->
            </div>
          </div><!-- /panel -->
        </div><!-- /.col -->
      </div>
    </div><!-- /main-container -->

  <a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>

  <!-- Logout confirmation -->
  <div class="custom-popup width-100" id="logoutConfirm">
    <div class="padding-md">
      <h4 class="m-top-none"> Do you want to logout?</h4>
    </div>

    <div class="text-center">
      <a class="btn btn-success m-right-sm" href="login.html">Logout</a>
      <a class="btn btn-danger logoutConfirm_close">Cancel</a>
    </div>
  </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  <!-- Jquery -->
  <script src="js/jquery-1.10.2.min.js"></script>

  <!-- Bootstrap -->
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <!-- Modernizr -->
  <script src='js/modernizr.min.js'></script>

    <!-- Pace -->
  <script src='js/pace.min.js'></script>

  <!-- Popup Overlay -->
  <script src='js/jquery.popupoverlay.min.js'></script>

    <!-- Slimscroll -->
  <script src='js/jquery.slimscroll.min.js'></script>

  <!-- Cookie -->
  <script src='js/jquery.cookie.min.js'></script>

  <!-- Endless -->
  <script src="js/endless/endless.js"></script>
  <script type="text/javascript">
  $(function(){
    $('#set_readed').click(function(){
      var flag = confirm('確定要此項目設為已讀？');
      if(flag){
        var ids = [<?= $item['id'] ?>];
        $.ajax({
          url:'index.php?/admin/set_readed',
          type: 'post',
          data: {'ids':ids},
          success: function(){
            location.href = 'index.php?/admin/index';
          }
        });
      }
    });
  });
  </script>
  </body>
</html>