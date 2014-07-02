<div class="page-header">
    <h1 align="center">
        CALCUL DU MASQUE</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Calculer le masque</small>
    </h1>
</div>

<div style="width:100%;" class="center">
    <img id="img_ID"
         src="http://3.bp.blogspot.com/_vIKA10EhyKQ/SBh8eudiIuI/AAAAAAAAABE/0A81keT-G4U/s1600/Diagramme%2Bsolaire%2Blatitude%2B45%2BLyon.jpg"
         usemap="#map" border="0" width="50%" alt=""/>
</div>
<map id="map_ID" name="map">
    <area shape="poly"
          coords="61,45,68,395
          ,80,36,91,36,98,39,108,44,103,54,99,51,95,49,93,57,85,56,76,58,75,49,69,52,66,54"
          href="javascript:;" alt="Bandcamp" title="Bandcamp" id="maparea"/>
    <area shape="poly" coords="30,50,62,50,46,82" href="javascript:;" alt="Facebook" title="Facebook" id />
    <area shape="poly" coords="66,50,98,50,82,82" href="javascript:;" alt="Soundcloud" title="Soundcloud"/>
</map>
<div class="row form-horizontal">
    <h4 align="center">Pertes dues au masques.</h4>


    <div class="col-sm-12">
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

        <!--        <div align="center">-->
        <!--            --><?php
        //            echo form_submit('envoiratioc', 'Valider','class="btn btn-success btn-sm"');
        //
        ?>
        <!--        </div>-->
        <br/>

        <h3 class="resultratioc" align="center">
            <?php
            if (isset($this->session->userdata['Ratioc']) && $this->session->userdata['Ratioc'] != '') {
                echo "Ratio C : <span id='resultratioc'>" . $this->session->userdata['Ratioc'] . " %</span>";
            }
            ?>

        </h3>
    </div>
</div>


<ul class="pager">
    <li class="previous">
        <a href="<?php echo site_url("pv/choixorientation"); ?>"><h4>← Orientation</h4></a>
    </li>

    <li class="next">
        <a href="<?php echo site_url("pv/calculhepp"); ?>"><h4>Calculer HEPP →</h4></a>
    </li>
</ul>

