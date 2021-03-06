<div class="page-header">
    <h1 align="center">
        HEPP NETTE</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Résultat HEPP nette</small>
    </h1>
</div>

<div class="row form-horizontal">
        <div class="col-sm-12 text-center" align="center">
            <div class="form-group">
                <div class="
<?php
                if (isset($this->session->userdata['HEPP']) || isset($this->session->userdata['Orientation']) || isset($this->session->userdata['Orientation'])) {
                    echo "col-sm-4";
                } else {
                    echo "col-sm-3";
                }?>
">
                    <table class="table table-bordered ">
                        <tr>
                            <th>HEPP :</th>
                            <td>
            <span id="valeurhepp">
            <?php
            if (isset($this->session->userdata['HEPP']) && $this->session->userdata['HEPP'] != '') {
                echo $this->session->userdata['HEPP'];
            } else {
                ?>
                <span>Aucun HEPP :</span>
                <a href="<?php echo site_url("pv/choixstation") ?>">Choisir station</a>
            <?php } ?></span>
                            </td>
                            <?php if (isset($this->session->userdata['HEPP']) && $this->session->userdata['HEPP'] != '') { ?>
                                <td>
                                    <a href="<?php echo site_url("pv/choixstation") ?>">Changer HEPP</a>
                                </td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <th>Orientation :</th>
                            <td>
            <span id="choixorient"><?php
                if (isset($this->session->userdata['Orientation']) && $this->session->userdata['Orientation'] != '') {
                    echo $this->session->userdata['Orientation'];
                } else {
                    ?>
                    <span>Aucune orientation :</span>
                    <a href="<?php echo site_url("pv/choixorientation") ?>">Choisir orientation</a>
                <?php } ?></span>
                            </td>
                            <?php if (isset($this->session->userdata['Orientation']) && $this->session->userdata['Orientation'] != '') { ?>
                                <td>
                                    <a href="<?php echo site_url("pv/choixorientation") ?>">Changer orientation</a>
                                </td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <th>Ratio C :</th>
                            <td>
            <span id="resultratioc"><?php
                if (isset($this->session->userdata['Ratioc']) && $this->session->userdata['Ratioc'] != '') {
                    echo $this->session->userdata['Ratioc'];
                } else {
                    ?>
                    <span>Aucun masque (ratio C) :</span>
                    <a href="<?php echo site_url("pv/calculmasque") ?>">Calculer le masque</a>
                <?php } ?></span>
                            </td>
                            <?php if (isset($this->session->userdata['Ratioc']) && $this->session->userdata['Ratioc'] != '') { ?>
                                <td>
                                    <a href="<?php echo site_url("pv/calculmasque") ?>">Changer masque</a>
                                </td>
                            <?php } ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="form-group">
            <h3 align="center" id="heppnette"></h3>
        </div>
    <ul class="pager">
        <li class="previous">
            <a href="<?php echo site_url("pv/calculmasque"); ?>">← Calculer HEPP</a>
        </li>

        <li class="next">
            <a href="<?php echo site_url("pv/calculprod"); ?>">Calculer Production →</a>
        </li>
    </ul>
</div>