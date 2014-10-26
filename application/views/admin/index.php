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
            <li><a tabindex="-1" class="main-link logoutConfirm_open" href="index.php?/admin/doLogout"><i class="fa fa-lock fa-lg"></i> Log out</a></li>
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
            <?php if($this->uri->segment(2) == 'index'): ?>
              <div class="panel-body">
                <label class="label-checkbox inline">
                  <input type="checkbox" id="chk-all">
                  <span class="custom-checkbox"></span>
                </label>
                <a class="btn btn-sm btn-danger" id="set_readed_all"><i class="fa fa-check"></i> Make Readed</a>
            </div>
            <?php endif; ?>
            <ul class="list-group">
              {results}
              <li class="list-group-item clearfix inbox-item">
                <?php if($this->uri->segment(2) == 'index'): ?>
                <label class="label-checkbox inline">
                  <input type="checkbox" name="items[]" class="chk-item" value="{id}">
                  <span class="custom-checkbox"></span>
                </label>
                <?php endif;?>
                <a href="index.php?/admin/view/{id}"><span class="from">{name}</span></a>
                <span class="email">{email}</span>
                <span class="tel">{tel}</span>
                <span class="detail">
                  #{id}. {title}
                </span>
                <span class="inline-block pull-right">
                  <span class="time">{created_at}</span>
                </span>
              </li>
              {/results}
            </ul><!-- /list-group -->
            <div class="panel-footer clearfix">
              <div class="pull-left">{count} messages</div>
              <!-- <div class="pull-right">
                <span class="middle">Page 1 of 8 </span>
                <ul class="pagination middle">
                  <li class="disabled"><a href="#"><i class="fa fa-step-backward"></i></a></li>
                  <li class="disabled"><a href="#"><i class="fa fa-caret-left large"></i></a></li>
                  <li><a href="#"><i class="fa fa-caret-right large"></i></a></li>
                  <li><a href="#"><i class="fa fa-step-forward"></i></a></li>
                </ul>
              </div> -->
            </div>
          </div><!-- /panel -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /main-container -->

  <a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>

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
    $('#set_readed_all').click(function(){
      objs = $('.chk-item:checked');
      if(objs.length > 0){
        var flag = confirm('確定要將勾選項目設為已讀？');
        if(flag){
          var ids = [];
          $.each(objs, function(i, e){
            ids.push($(e).val());
          });
          $.ajax({
            url:'index.php?/admin/set_readed',
            type: 'post',
            data: {'ids':ids},
            success: function(){
              location.reload();
            }
          });
        }
      }
    });
  });
  </script>
  </body>
</html>