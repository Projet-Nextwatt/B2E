<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        CATALOGUE</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Page d'accueil Catalogue</small>
    </h1>

    <div id="nav-search" class="nav-search">
        <form class="form-search">
          <span class="input-icon">
            <input type="text" class="nav-search-input" id="nav-search-input" autocomplete="off"
                   placeholder="Search ..."/>
            <i class="ace-icon fa fa-search nav-search-icon"></i>
          </span>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="btn-group">
            <a href="<?php echo site_url("CI_catalogue/lier_type_produit"); ?>">
                <button type="button" class="btn btn-white btn-sm btn-primary">Lier type au produit</button>
            </a>
            <a href="<?php echo site_url("CI_catalogue/consult_soustype"); ?>">
                <button type="button" class="btn btn-white btn-sm btn-primary">Gérer liste types</button>
            </a>
            <button type="button" class="btn btn-white btn-sm btn-primary">Lier options</button>
            <a href="<?php echo site_url("CI_catalogue/upload_catalogue_form"); ?>">
                <button type="button" class="btn btn-white btn-sm btn-primary">Charger Catalogue</button>
            </a>
        </div>
        <br/><br/>
        <?php
        $this->load->library('fonctionspersos');
        $entete = $this->fonctionspersos->set_entete_catalogue_mini();

             //   $this->fonctionspersos->creerTableau($tableau, $entete,'CI_catalogue/aff_fiche_produit');
        ?>
        <div id="sidebar" class="sidebar                  responsive">
        <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
        </script>


        <ul class="nav nav-list" style="top: 0px;">
        <li class="">
            <a href="index.html">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="active open hsub">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text"> UI &amp; Elements </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="hsub">
                    <a href="##help" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>

                        Layouts
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu nav-hide" style="display: none;">
                        <li class="">
                            <a href="top-menu.html">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Top Menu
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="">
                            <a href="mobile-menu-1.html">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Default Mobile Menu
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="">
                            <a href="mobile-menu-2.html">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Mobile Menu 2
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="">
                            <a href="mobile-menu-3.html">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Mobile Menu 3
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="typography.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Typography
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="elements.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Elements
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="buttons.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Buttons &amp; Icons
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="treeview.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Treeview
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="jquery-ui.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        jQuery UI
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="active">
                    <a href="nestable-list.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Nestable Lists
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="hsub open">
                    <a href="##help" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>

                        Three Level Menu
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu nav-show" style="display: block;">
                        <li class="">
                            <a href="#">
                                <i class="menu-icon fa fa-leaf"></i>
                                Item #1
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="hsub">
                            <a href="#" class="dropdown-toggle">
                                <i class="menu-icon fa fa-pencil"></i>

                                4th level
                                <b class="arrow fa fa-angle-down"></b>
                            </a>

                            <b class="arrow"></b>

                            <ul class="submenu">
                                <li class="">
                                    <a href="#">
                                        <i class="menu-icon fa fa-plus"></i>
                                        Add Product
                                    </a>

                                    <b class="arrow"></b>
                                </li>

                                <li class="">
                                    <a href="#">
                                        <i class="menu-icon fa fa-eye"></i>
                                        View Products
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>


        <!--        <div class="accordion-style1 panel-group" id="accordion">-->
<!--            <div class="panel panel-default">-->
<!--                <div class="panel-heading">-->
<!--                    <h4 class="panel-title">-->
<!--                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion"-->
<!--                           href="#collapseOne">-->
<!--                            <i data-icon-show="ace-icon fa fa-angle-right" data-icon-hide="ace-icon fa fa-angle-down"-->
<!--                               class="bigger-110 ace-icon fa fa-angle-right"></i>-->
<!--                            Group Item #1-->
<!--                        </a>-->
<!--                    </h4>-->
<!--                </div>-->
<!--                <div id="collapseOne" class="panel-collapse collapse">-->
<!--                    <div class="panel-body">-->
<!--                        <div class="col-sm-6">-->
<!--                            <div class="dd" id="nestable">-->
<!--                                <ol class="dd-list">-->
<!--                                    <li class="dd-item" data-id="1">-->
<!--                                        <div class="dd-handle">-->
<!--                                            Item 1-->
<!--                                            <i class="pull-right bigger-130 ace-icon fa fa-exclamation-triangle orange2"></i>-->
<!--                                        </div>-->
<!--                                    </li>-->
<!--                                </ol>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->





    </div>
</div>


            
