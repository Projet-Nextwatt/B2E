<div class="page-header">
    <h1 align="center">
        CALCUL DU MASQUE</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Calculer le masque</small>
    </h1>
</div>
<div class="row form-horizontal">
    <h4 align="center">Pertes dues au masques.</h4>

    <div class="col-sm-12 ">
        <div class='form-group'>
            <label class="col-sm-6 no-padding-right control-label" for='ratioc'>Ratio C (100% - perte): </label>

            <div class="col-sm-6">
                <?php
                $value = '100';

                if (isset($this->session->userdata['Ratioc'])) {
                    $value = $this->session->userdata['Ratioc'];
                }


                $ratioc = array(

                    'name' => 'ratioc',

                    'id' => 'ratioc',

                    'placeholder' => '100%',

                    'value' => $value

                );
                echo form_input($ratioc); ?>
            </div>
        </div>

        <div align="center">
            <?php
            echo form_submit('envoiratioc', 'Valider','class="btn btn-success btn-sm"');
            ?>
        </div>
        <br/>
    <h3 class="resultratioc" align="center">
        <?php
        if (isset($this->session->userdata['Ratioc']) && $this->session->userdata['Ratioc'] != '') {
            echo "Ration C : <span id='resultratioc'>" . $this->session->userdata['Ratioc'] . " %</span>";
        }
        ?>

    </h3>
    </div>
</div>


<ul class="pager">
    <li class="previous">
        <a href="<?php echo site_url("pv/choixorientation"); ?>">← Orientation</a>
    </li>

    <li class="next">
        <a href="<?php echo site_url("pv/calculhepp"); ?>"#">Calculer HEPP →</a>
    </li>
</ul>