<div><p> HEPP : <span id="valeurhepp">
            <?php
            if (isset($this->session->userdata['HEPP'])) {
                echo $this->session->userdata['HEPP'];
            } else {
                ?>
                <br/>
                <span>Aucun HEPP :</span>
                <a href="<?php echo site_url("pv/choixstation") ?>">Choisir station</a>
            <?php } ?></span></p></div>
<div><p> Orientation : <span id="choixorient"><?php
            if (isset($this->session->userdata['Orientation'])) {
                echo $this->session->userdata['Orientation'];
            } else {
                ?>
                <br/>
                <span>Aucune orientation :</span>
                <a href="<?php echo site_url("pv/choixorientation") ?>">Choisir orientation</a>
            <?php } ?></span></p></div>
<div><p> Ratio C :<span id="resultratioc"><?php
            if (isset($this->session->userdata['Ratioc'])) {
                echo $this->session->userdata['Ratioc'];
            } else {
                ?>
                <br/>
                <span>Aucun masque (ratio C) :</span>
                <a href="<?php echo site_url("pv/calculmasque") ?>">Calculer le masque</a>
            <?php } ?></span></p></div>


<fieldset style="display: inline-block">
    <legend>HEPP "nette"</legend>
    <button id="calculhepp">Calculer</button>
    <span id="heppnette"></span>
</fieldset>

<ul class="pager">
    <li class="previous">
        <a href="<?php echo site_url("pv/calculmasque"); ?>">← Calculer HEPP</a>
    </li>

    <li class="next">
        <a href="<?php echo site_url("pv/calculprod"); ?>">Calculer Production →</a>
    </li>
</ul>