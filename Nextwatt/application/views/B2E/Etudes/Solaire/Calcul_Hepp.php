

<div><p> HEPP : <span id="valeurhepp"><?php echo $_SESSION['Etude']['HEPP'] ?></span></p></div>
<div><p> Orientation : <span id="choixorient"><?php echo $_SESSION['Etude']['Orientation'] ?></span></p></div>
<div><p> Ratio C :<span id="resultratioc"><?php echo $_SESSION['Etude']['Ratioc'] ?></span></p></div>


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