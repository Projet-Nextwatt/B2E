<fieldset style="display: inline-block">
    <legend>Pertes dues au masques</legend>
    <span> Ratio C (100% - perte): </span>
    <?php
    $ratioc = array(

        'name' => 'ratioc',

        'id' => 'ratioc',

        'placeholder' => '100%',

        'value' => '100'

    );
    echo form_input($ratioc);
    echo form_submit('envoiratioc', 'valider');
    ?>
    <br/>
    <span class="resultratioc"></span>
</fieldset>



<ul class="pager">
    <li class="previous">
        <a href="<?php echo site_url("pv/choixorientation"); ?>">← Orientation</a>
    </li>

    <li class="next">
        <a href="<?php echo site_url("pv/calculhepp"); ?>"#">Calculer HEPP →</a>
    </li>
</ul>