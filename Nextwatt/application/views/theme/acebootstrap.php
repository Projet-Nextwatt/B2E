<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test sidebar</title>
    <link rel="stylesheet" href="<?php echo $acebootstrap ?>">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $OpenSans ?>">
    <link rel="stylesheet" href="<?php echo $acemin ?>">
    <link rel="stylesheet" href="<?php echo $aceskins ?>">
    <link rel="stylesheet" href="<?php echo $acertl ?>">
</head>
<body>
<div id="navbar" class="navbar navbar-default">
<script type="text/javascript">
    try {
        ace.settings.check('navbar', 'fixed')
    } catch (e) {
    }
</script>

<div class="navbar-container" id="navbar-container">
<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
    <span class="sr-only">Toggle sidebar</span>

    <span class="icon-bar"></span>

    <span class="icon-bar"></span>

    <span class="icon-bar"></span>
</button>

<div class="navbar-header pull-left">
    <a href="#" class="navbar-brand">
        <small>
            <i class="fa fa-leaf"></i>
            Ace Admin
        </small>
    </a>
</div>

<div class="navbar-buttons navbar-header pull-right" role="navigation">
<ul class="nav ace-nav">
<li class="grey">
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <i class="ace-icon fa fa-tasks"></i>
        <span class="badge badge-grey">4</span>
    </a>

    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
        <li class="dropdown-header">
            <i class="ace-icon fa fa-check"></i>
            4 Tasks to complete
        </li>

        <li>
            <a href="#">
                <div class="clearfix">
                    <span class="pull-left">Software Update</span>
                    <span class="pull-right">65%</span>
                </div>

                <div class="progress progress-mini">
                    <div style="width:65%" class="progress-bar"></div>
                </div>
            </a>
        </li>

        <li>
            <a href="#">
                <div class="clearfix">
                    <span class="pull-left">Hardware Upgrade</span>
                    <span class="pull-right">35%</span>
                </div>

                <div class="progress progress-mini">
                    <div style="width:35%" class="progress-bar progress-bar-danger"></div>
                </div>
            </a>
        </li>

        <li>
            <a href="#">
                <div class="clearfix">
                    <span class="pull-left">Unit Testing</span>
                    <span class="pull-right">15%</span>
                </div>

                <div class="progress progress-mini">
                    <div style="width:15%" class="progress-bar progress-bar-warning"></div>
                </div>
            </a>
        </li>

        <li>
            <a href="#">
                <div class="clearfix">
                    <span class="pull-left">Bug Fixes</span>
                    <span class="pull-right">90%</span>
                </div>

                <div class="progress progress-mini progress-striped active">
                    <div style="width:90%" class="progress-bar progress-bar-success"></div>
                </div>
            </a>
        </li>

        <li class="dropdown-footer">
            <a href="#">
                See tasks with details
                <i class="ace-icon fa fa-arrow-right"></i>
            </a>
        </li>
    </ul>
</li>

<li class="purple">
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
        <span class="badge badge-important">8</span>
    </a>

    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
        <li class="dropdown-header">
            <i class="ace-icon fa fa-exclamation-triangle"></i>
            8 Notifications
        </li>

        <li>
            <a href="#">
                <div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
												New Comments
											</span>
                    <span class="pull-right badge badge-info">+12</span>
                </div>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="btn btn-xs btn-primary fa fa-user"></i>
                Bob just signed up as an editor ...
            </a>
        </li>

        <li>
            <a href="#">
                <div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
												New Orders
											</span>
                    <span class="pull-right badge badge-success">+8</span>
                </div>
            </a>
        </li>

        <li>
            <a href="#">
                <div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
												Followers
											</span>
                    <span class="pull-right badge badge-info">+11</span>
                </div>
            </a>
        </li>

        <li class="dropdown-footer">
            <a href="#">
                See all notifications
                <i class="ace-icon fa fa-arrow-right"></i>
            </a>
        </li>
    </ul>
</li>

<li class="green">
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
        <span class="badge badge-success">5</span>
    </a>

    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
        <li class="dropdown-header">
            <i class="ace-icon fa fa-envelope-o"></i>
            5 Messages
        </li>

        <li class="dropdown-content ace-scroll" style="position: relative;">
            <div class="scroll-track" style="display: none;">
                <div class="scroll-bar"></div>
            </div>
            <div class="scroll-content" style="max-height: 200px;">
                <ul class="dropdown-menu dropdown-navbar">
                    <li>
                        <a href="#">
                            <img src="assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar">
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														Ciao sociis natoque penatibus et auctor ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>a moment ago</span>
													</span>
												</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <img src="assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar">
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Susan:</span>
														Vestibulum id ligula porta felis euismod ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>20 minutes ago</span>
													</span>
												</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <img src="assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar">
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Bob:</span>
														Nullam quis risus eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>3:15 pm</span>
													</span>
												</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <img src="assets/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar">
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Kate:</span>
														Ciao sociis natoque eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>1:33 pm</span>
													</span>
												</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <img src="assets/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar">
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Fred:</span>
														Vestibulum id penatibus et auctor  ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>10:09 am</span>
													</span>
												</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="dropdown-footer">
            <a href="inbox.html">
                See all messages
                <i class="ace-icon fa fa-arrow-right"></i>
            </a>
        </li>
    </ul>
</li>

<li class="light-blue">
    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
        <img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo">
								<span class="user-info">
									<small>Welcome,</small>
									Jason
								</span>

        <i class="ace-icon fa fa-caret-down"></i>
    </a>

    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
        <li>
            <a href="#">
                <i class="ace-icon fa fa-cog"></i>
                Settings
            </a>
        </li>

        <li>
            <a href="profile.html">
                <i class="ace-icon fa fa-user"></i>
                Profile
            </a>
        </li>

        <li class="divider"></li>

        <li>
            <a href="#">
                <i class="ace-icon fa fa-power-off"></i>
                Logout
            </a>
        </li>
    </ul>
</li>
</ul>
</div>
</div>
<!-- /.navbar-container -->
</div>
<div id="sidebar" class="sidebar                  responsive">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div>
    <!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list" style="top: 0px;">
        <li class="active">
            <a href="index.html">
                <i class=""> <img src=" <?php echo $nextwattico ?>"/></i>
                <span class="menu-text"> Nextwatt  </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="hsub">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text"> Catalogue </span>
            </a>
        </li>

        <li class="hsub">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> Client </span>
            </a>
        </li>

        <li class="hsub">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> Dossier </span>
            </a>
        </li>

        <li class="">
            <a href="widgets.html">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text"> Utilisateur </span>
            </a>
        </li>
    </ul>
    <!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left"
           data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        } catch (e) {
        }
    </script>
</div>
<script type="text/javascript"
        src="<?php echo base_url(); ?>application/helpers/assets/javascript/jquery.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>application/helpers/assets/javascript/ace.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>application/helpers/assets/javascript/ace-elements.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>application/helpers/assets/javascript/ace-extra.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>application/helpers/assets/javascript/jquery-ui.custom.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>application/helpers/assets/javascript/jquery.easypiechart.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>application/helpers/assets/javascript/jquery.sparkline.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>application/helpers/assets/javascript/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>application/helpers/assets/javascript/flot/jquery.flot.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>application/helpers/assets/javascript/flot/jquery.flot.pie.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>application/helpers/assets/javascript/flot/jquery.flot.resize.min.js"></script>
</body>
</html>
