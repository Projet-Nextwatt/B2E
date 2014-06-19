<div class="panel-default">
    <div class="panel-heading">Cliquer sur l'orientation désirée</div>
    <div class="table-responsive">


        <table id="sample-table-1" class="table table-striped table-bordered table-hover text-center">
            <thead>
            <tr>
                <th></th>
                <th class="text-center">
                    <canvas id="angle15" class="hidden-480" height="100" width="150"></canvas>
                    <h2 class="bolder">15°</h2>
                </th>
                <th class="text-center">
                    <canvas id="angle20" class="hidden-480" height="100" width="150"></canvas>
                    <h2 class="bolder">20°</h2>
                </th>
                <th class="text-center">
                    <canvas id="angle30" class="hidden-480" height="100" width="150"></canvas>
                    <h2 class="bolder">30°</h2>
                </th>
                <th class="text-center">
                    <canvas id="angle45" class="hidden-480" height="100" width="100"></canvas>
                    <h2 class="bolder">45°</h2>
                </th>
                <th class="text-center">
                    <canvas id="angle60" class="hidden-480" height="100" width="57"></canvas>
                    <h2 class="bolder">60°</h2>
                </th>
            </tr>
            </thead>

            <tbody>
            <tr>

                <td><b> SUD</b></td>
                <td><span class="orientation btn-link"> 98 %</span></td>
                <td><span class="orientation btn-link"> 100 %</span></td>
                <td><span class="orientation btn-link"> 100 %</span></td>
                <td><span class="orientation btn-link"> 100 %</span></td>
                <td><span class="orientation btn-link"> 91 %</span></td>

            </tr>

            <tr>

                <td><b> SUD-EST / SUD-OUEST</b></td>
                <td><span class="orientation btn-link"> 93 %</span></td>
                <td><span class="orientation btn-link"> 96 %</span></td>
                <td><span class="orientation btn-link"> 95 %</span></td>
                <td><span class="orientation btn-link"> 91 %</span></td>
                <td><span class="orientation btn-link"> 84 %</span></td>
            </tr>

            <tr>
                <td><b> EST / OUEST</b></td>
                <td><span class="orientation btn-link"> 85 %</span></td>
                <td><span class="orientation btn-link"> 88 %</span></td>
                <td><span class="orientation btn-link"> 84 %</span></td>
                <td><span class="orientation btn-link"> 77 %</span></td>
                <td><span class="orientation btn-link"> 68 %</span></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<br/>
<span class="choixorient"></span>

<ul class="pager">
    <li class="previous">
        <a href="<?php echo site_url("pv/choixstation"); ?>">← Choix Station</a>
    </li>

    <li class="next">
        <a href="<?php echo site_url("pv/calculmasque"); ?>"#">Masque →</a>
    </li>
</ul>