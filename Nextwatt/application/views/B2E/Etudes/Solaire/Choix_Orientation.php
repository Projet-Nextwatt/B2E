

<div class="page-header">
    <h1 align="center">
        CHOIX DE L'ORIENTATION</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Définition de l'orientation et de l'inclinaison du toit de la maison</small>
    </h1>
</div>

<div class="panel-default">
    <div class="panel-heading">Cliquer sur l'orientation désirée</div>
    <div class="table-responsive">


        <table id="sample-table-1" class="table table-striped table-bordered table-hover text-center">
            <thead>
            <tr>
                <th></th>
                <th class="text-center">
                    <canvas id="angle15" class="hidden-xs hidden-sm" height="100" width="150"></canvas>
                    <h2 class="bolder">15°</h2>
                </th>
                <th class="text-center">
                    <canvas id="angle20" class="hidden-xs hidden-sm" height="100" width="150"></canvas>
                    <h2 class="bolder">20°</h2>
                </th>
                <th class="text-center">
                    <canvas id="angle30" class="hidden-xs hidden-sm" height="100" width="150"></canvas>
                    <h2 class="bolder">30°</h2>
                </th>
                <th class="text-center">
                    <canvas id="angle45" class="hidden-xs hidden-sm" height="100" width="100"></canvas>
                    <h2 class="bolder">45°</h2>
                </th>
                <th class="text-center">
                    <canvas id="angle60" class="hidden-xs hidden-sm" height="100" width="57"></canvas>
                    <h2 class="bolder">60°</h2>
                </th>
            </tr>
            </thead>

            <tbody>
            <tr>

                <td><b> SUD</b></td>
                <td id="sud15"><button type="button" class="orientation btn btn-default  btn-lg btn-block">
                      <span  style="color:black">98 %</span></td></button>
                <td id="sud20"><button type="button" class="orientation btn btn-default  btn-lg btn-block">
                        <span  style="color:black">100 %</span></td></button>
                <td id="sud30"><button type="button" class="orientation btn btn-default  btn-lg btn-block">
                        <span  style="color:black">100 %</span></td></button>
                <td id="sud45"><button type="button" class="orientation btn btn-default  btn-lg btn-block">
                        <span  style="color:black">100 %</span></td></button>
                <td id="sud60"><button type="button" class="orientation btn btn-default  btn-lg btn-block">
                        <span  style="color:black">91 %</span></td></button>
            </tr>

            <tr>

                <td><b> SUD-EST / SUD-OUEST</b></td>
                <td id="sud-est15"><button type="button" class="orientation btn btn-default  btn-lg btn-block">
                        <span  style="color:black">93 %</span></td></button>
                <td id="sud-est20"><button type="button" class="orientation btn btn-default  btn-lg btn-block">
                        <span  style="color:black">96 %</span></td></button>
                <td id="sud-est30"><button type="button" class="orientation btn btn-default  btn-lg btn-block">
                        <span  style="color:black">95 %</span></td></button>
                <td id="sud-est45"><button type="button" class="orientation btn btn-default  btn-lg btn-block">
                        <span  style="color:black">91 %</span></td></button>
                <td id="sud-est60"><button type="button" class="orientation btn btn-default  btn-lg btn-block">
                        <span  style="color:black">84 %</span></td></button>
            </tr>

            <tr>
                <td><b> EST / OUEST</b></td>
                <td id="est15"><button type="button" class="orientation btn btn-default  btn-lg btn-block">
                        <span  style="color:black">85 %</span></td></button>
                <td id="est20"><button type="button" class="orientation btn btn-default  btn-lg btn-block">
                        <span  style="color:black">88 %</span></td></button>
                <td id="est30"><button type="button" class="orientation btn btn-default  btn-lg btn-block">
                        <span  style="color:black">84 %</span></td></button>
                <td id="est45"><button type="button" class="orientation btn btn-default  btn-lg btn-block">
                        <span  style="color:black">77 %</span></td></button>
                <td id="est60"><button type="button" class="orientation btn btn-default  btn-lg btn-block">
                        <span  style="color:black">68 %</span></td></button>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<br/>
<h3 class="choixorient" align="center">
    <?php
    if($this->session->userdata('Orientation'))
    {
        echo "Orientation choisie : " . $listorientation[$this->session->userdata('ChoixOrientation')];
        echo "<br/>Soit : ".$this->session->userdata('Orientation'). "% d'exposition";
    }
    ?>

</h3>

<ul class="pager">
    <li class="previous">
        <a href="<?php echo site_url("pv/choixstation"); ?>"><h4>← Choix Station</h4></a>
    </li>

    <li class="next">
        <a href="<?php echo site_url("pv/calculmasque"); ?>"><h4>Masque →</h4></a>
    </li>
</ul>