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
              <a href="#">
                <i class="fa fa-inbox fa-lg"></i>
                <span class="m-left-xs">Inbox</span>
                <span class="badge badge-success pull-right">19</span>
              </a>
            </li>
            <li class="active">
              <a href="#">
                <i class="fa fa-archive fa-lg"></i>
                <span class="m-left-xs">Archive</span>
              </a>
            </li>
          </ul>
        </div><!-- /.col -->
        <div class="col-sm-9">
          <div class="panel panel-default inbox-panel">
            <div class="panel-heading">
              <div class="input-group">
                <input type="text" class="form-control input-sm" placeholder="Search here...">
                  <span class="input-group-btn">
                  <button class="btn btn-default btn-sm" type="button"><i class="fa fa-search"></i></button>
                </span>
              </div><!-- /input-group -->
            </div>
            <div class="panel-body">
              <label class="label-checkbox inline">
                <input type="checkbox" id="chk-all">
                 <span class="custom-checkbox"></span>
              </label>
              <a class="btn btn-sm btn-danger"><i class="fa fa-check"></i> Make Readed</a>
              <a class="btn btn-sm btn-default"><i class="fa fa-trash-o"></i> Delete</a>
            </div>
            <ul class="list-group">
              <li class="list-group-item clearfix inbox-item">
                <label class="label-checkbox inline">
                  <input type="checkbox" class="chk-item">
                  <span class="custom-checkbox"></span>
                </label>
                <span class="from">Admin</span>

                <span class="detail">
                  <span class="label label-danger">Important</span>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor suscipit lobortis.
                </span>
                <span class="inline-block pull-right">
                  <span class="time">2:32 Am</span>
                </span>
              </li>
              <li class="list-group-item clearfix inbox-item">
                <label class="label-checkbox inline">
                  <input type="checkbox" class="chk-item">
                  <span class="custom-checkbox"></span>
                </label>
                <span class="from">My friend</span>
                <span class="detail">
                  <span class="label label-warning">Private</span>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor suscipit lobortis.
                </span>
                <span class="inline-block pull-right">
                  <span class="time">Oct 9</span>
                </span>
              </li>
              <li class="list-group-item clearfix inbox-item">
                <label class="label-checkbox inline">
                  <input type="checkbox" class="chk-item">
                  <span class="custom-checkbox"></span>
                </label>
                <span class="from">John Doe</span>
                <span class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor suscipit lobortis.</span>
                <span class="inline-block pull-right">
                  <span class="time">Sep 27</span>
                </span>
              </li>
              <li class="list-group-item clearfix inbox-item">
                <label class="label-checkbox inline">
                  <input type="checkbox" class="chk-item">
                  <span class="custom-checkbox"></span>
                </label>
                <span class="from">Jane Doe</span>
                <span class="detail">Nunc vel lorem volutpat, placerat erat ut, pulvinar mi.</span>
                <span class="inline-block pull-right">
                  <span class="time">Sep 25</span>
                </span>
              </li>
              <li class="list-group-item clearfix inbox-item">
                <label class="label-checkbox inline">
                  <input type="checkbox" class="chk-item">
                   <span class="custom-checkbox"></span>
                </label>
                <span class="from">My business</span>
                <span class="detail">
                  <span class="label label-info">Work</span>
                  Phasellus ac feugiat mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                </span>
                <span class="inline-block pull-right">
                  <span class="time">Sep 1</span>
                </span>
              </li>
              <li class="list-group-item clearfix inbox-item">
                <label class="label-checkbox inline">
                  <input type="checkbox" class="chk-item">
                   <span class="custom-checkbox"></span>
                </label>
                <span class="from">John Doe</span>
                <span class="detail">Suspendisse tristique ullamcorper sapien id pulvinar.</span>
                <span class="inline-block pull-right">
                  <span class="time">Aug 30</span>
                </span>
              </li>
              <li class="list-group-item clearfix inbox-item">
                <label class="label-checkbox inline">
                  <input type="checkbox" class="chk-item">
                  <span class="custom-checkbox"></span>
                </label>
                <span class="from">Bill Doe</span>
                <span class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor suscipit lobortis.</span>
                <span class="inline-block pull-right">
                  <span class="time">Aug 18</span>
                </span>
              </li>
              <li class="list-group-item clearfix inbox-item">
                <label class="label-checkbox inline">
                  <input type="checkbox" class="chk-item">
                  <span class="custom-checkbox"></span>
                </label>
                <span class="from">My friend</span>
                <span class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor suscipit lobortis.</span>
                <span class="inline-block pull-right">
                  <span class="time">Aug 17</span>
                </span>
              </li>
              <li class="list-group-item clearfix inbox-item">
                <label class="label-checkbox inline">
                  <input type="checkbox" class="chk-item">
                  <span class="custom-checkbox"></span>
                </label>
                <span class="from">Jane Doe</span>
                <span class="detail">Nunc vel lorem volutpat, placerat erat ut, pulvinar mi.</span>
                <span class="inline-block pull-right">
                  <span class="time">July 13</span>
                </span>
              </li>
              <li class="list-group-item clearfix inbox-item">
                <label class="label-checkbox inline">
                  <input type="checkbox" class="chk-item">
                   <span class="custom-checkbox"></span>
                </label>
                <span class="from">My business</span>
                <span class="detail">Phasellus ac feugiat mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus.</span>
                <span class="inline-block pull-right">
                  <span class="time">July 13</span>
                </span>
              </li>
              <li class="list-group-item clearfix inbox-item">
                <label class="label-checkbox inline">
                  <input type="checkbox" class="chk-item">
                   <span class="custom-checkbox"></span>
                </label>
                <span class="from">John Doe</span>
                <span class="detail">Suspendisse tristique ullamcorper sapien id pulvinar.</span>
                <span class="inline-block pull-right">
                  <span class="time">July 11</span>
                </span>
              </li>
              <li class="list-group-item clearfix inbox-item">
                <label class="label-checkbox inline">
                  <input type="checkbox" class="chk-item">
                  <span class="custom-checkbox"></span>
                </label>
                <span class="from">Bill Doe</span>
                <span class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor suscipit lobortis.</span>
                <span class="inline-block pull-right">
                  <span class="time">July 8</span>
                </span>
              </li>
              <li class="list-group-item clearfix inbox-item">
                <label class="label-checkbox inline">
                  <input type="checkbox" class="chk-item">
                  <span class="custom-checkbox"></span>
                </label>
                <span class="from">My friend</span>
                <span class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor suscipit lobortis.</span>
                <span class="inline-block pull-right">
                  <span class="time">July 4</span>
                </span>
              </li>
            </ul><!-- /list-group -->
            <div class="panel-footer clearfix">
              <div class="pull-left">112 messages</div>
              <div class="pull-right">
                <span class="middle">Page 1 of 8 </span>
                <ul class="pagination middle">
                  <li class="disabled"><a href="#"><i class="fa fa-step-backward"></i></a></li>
                  <li class="disabled"><a href="#"><i class="fa fa-caret-left large"></i></a></li>
                  <li><a href="#"><i class="fa fa-caret-right large"></i></a></li>
                  <li><a href="#"><i class="fa fa-step-forward"></i></a></li>
                </ul>
              </div>
            </div>
          </div><!-- /panel -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /main-container -->

    <!--Modal-->
    <div class="modal fade" id="newFolder">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4>Create new folder</h4>
              </div>
            <div class="modal-body">
                <form>
              <div class="form-group">
                <label for="folderName">Folder Name</label>
                <input type="text" class="form-control input-sm" id="folderName" placeholder="Folder name here...">
              </div>
            </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
            <a href="#" class="btn btn-danger btn-sm">Save changes</a>
            </div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  </div><!-- /wrapper -->

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

  </body>
</html>