<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>Login Page - Ace Admin</title>

    <meta name="description" content="User login page"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <link rel="stylesheet" href="<?php echo $bootstrapmincss ?>"/>
    <link rel="stylesheet" href="<?php echo $acefonts ?>"/>
    <link rel="stylesheet" href="<?php echo $acemincss ?>"/>
    <link rel="stylesheet" href="<?php echo $acertl ?>"/>
    <link rel="stylesheet" href="<?php echo $aceskins ?>"/>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="SHORTCUT ICON" href="<?php echo img_url('favicon.ico'); ?>">
</head>

<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <p>
                                <!--                    <i class="ace-icon fa fa-leaf green"></i>-->
                                <img src="<?php echo $minilogonextwatt ?>" alt="Nextwatt"
                                     title="Logo Nextwatt"/></a>
                            </p>
                            <!--                <span class="green">Nextwatt</span>-->
                            <!--                <span class="white" id="id-text2">B2E</span>-->
                        </h1>
                        <!--                <h4 class="blue" id="id-company-text">&copy; Company Name</h4>-->
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header dark lighter bigger">
                                        <i class="ace-icon fa fa-power-off green"></i>
                                        Connexion au site B2E
                                    </h4>

                                    <div class="space-6"></div>

                                    <form>
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right ">
															<input type="text" class="form-control input-lg"
                                                                   placeholder="Nom de compte" id="login"
                                                                   onKeyPress="if (event.keyCode == 13) connec()"
                                                                />
															<i class="ace-icon fa fa-user"></i>
														</span>

                                                <div id="errlogin"></div>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control input-lg"
                                                                   placeholder="Mot de passe" id="motdepasse"
                                                                   onKeyPress="if (event.keyCode == 13) connec()"
                                                                />
															<i class="ace-icon fa fa-lock"></i>
														</span>

                                                <div id="errpsw"></div>
                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <label class="inline">
                                                    <input type="checkbox" class="ace" id="rememberme"/>
                                                    <span class="lbl"> Se souvenir</span>
                                                </label>

                                                <button type="button"
                                                        class="width-60 pull-right btn  btn-success btn-lg"
                                                        id="connexion"
                                                        onclick="connec()"
                                                    >
                                                    <i class="ace-icon fa fa-key"></i>
                                                    <span class="bigger-110">Connexion</span>
                                                </button>
                                            </div>
                                            <div class="space-4"></div>
                                            <div id="alertconnec">


                                            </div>
                                            <div class="space-4"></div>
                                        </fieldset>
                                    </form>


                                </div>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.login-box -->


                        <!-- /.forgot-box -->


                        <!-- /.signup-box -->
                    </div>
                    <!-- /.position-relative -->

                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.main-content -->
</div>
<!-- /.main-container -->

<!-- basic scripts -->
<script type="text/javascript" src="<?php echo $jquerymin ?>"></script>
<script type="text/javascript" src="<?php echo $bootstrapmin ?>"></script>
<script type="text/javascript" src="<?php echo $acemin ?>"></script>
<script type="text/javascript" src="<?php echo $aceelementsmin ?>"></script>
<script type="text/javascript" src="<?php echo $login ?>"></script>


</body>
</html>
