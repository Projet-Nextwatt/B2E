<div class="page-header">
    <h1 align="center">
        CALCUL DU MASQUE</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Calculer le masque</small>
    </h1>
</div>

<fieldset style="display: inline-block">
    <legend>Pertes dues au masques</legend>
    <span> Ratio C (100% - perte): </span>
    <?php
    $value = '100';

    if(isset($this->session->userdata['Ratioc'])){
        $value = $this->session->userdata['Ratioc'];
    }


    $ratioc = array(

        'name' => 'ratioc',

        'id' => 'ratioc',

        'placeholder' => '100%',

        'value' => $value

    );
    echo form_input($ratioc);
    echo form_submit('envoiratioc', 'valider');
    ?>
    <br/>
    <span class="resultratioc">
        <?php
        if(isset($this->session->userdata['Ratioc'])){
            echo "Ration C : <span id='resultratioc'>" . $this->session->userdata['Ratioc'] . " %</span>";
        }
        ?>

    </span>
</fieldset>



<ul class="pager">
    <li class="previous">
        <a href="<?php echo site_url("pv/choixorientation"); ?>">← Orientation</a>
    </li>

    <li class="next">
        <a href="<?php echo site_url("pv/calculhepp"); ?>"#">Calculer HEPP →</a>
    </li>
</ul>