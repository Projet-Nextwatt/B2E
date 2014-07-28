<!--<div class="page-header">-->
<!--    <h1 align="center">-->
<!--        CALCUL DU MASQUE</br>-->
<!--        <small><i class="ace-icon fa fa-angle-double-right"></i> Calculer le masque</small>-->
<!--    </h1>-->
<!--</div>-->

<div style="width:100%;" class="center">
    <img id="img_ID"
         src="<?php echo $masquesolaire ?>"
         usemap="#map" width="60%"/>
</div>
<map id="map_ID" name="map">
    <area shape="poly"
          coords="215,290,222,276,232,260,239,247,247,235,251,228,256,233,260,239,262,242,256,249,250,259,244,268,239,276,235,284,230,292,226,299,224,302,219,296"
          masque="faible 1" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="224,302,235,284,245,267,252,256,259,245,262,242,273,260,281,274,286,285,289,289,283,298,277,305,272,313,266,321,260,331,253,342,250,348"
          masque="faible 2" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="272,392,279,379,287,367,295,355,302,347,309,337,299,314,294,300,289,290,277,306,268,320,260,332,253,343,250,348,257,362,263,373,268,385"
          masque="faible 3" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="310,339,315,355,319,368,322,377,325,385,327,392,318,401,310,411,304,420,299,428,292,439,289,443,284,428,280,416,277,408,273,398,271,393,281,377,290,365,296,356,302,348"
          masque="faible 4" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="299,172,286,184,277,195,267,207,258,219,252,228,258,237,262,241,268,232,275,223,283,215,292,204,301,195,308,188,310,186,307,181,304,176,299,171"
          masque="moyen 1" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="310,187,319,203,326,216,329,224,333,232,336,239,325,249,318,256,309,265,297,279,289,290,280,273,276,266,270,255,265,249,262,242,269,232,286,212,298,199,306,191"
          masque="moyen 2" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="336,240,342,252,346,265,350,279,353,288,355,293,345,300,337,308,330,314,323,322,313,333,309,340,307,332,301,320,298,310,292,300,290,294,289,290,295,281,305,270,320,255,330,246"
          masque="moyen 3" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="370,352,364,327,359,309,356,294,338,307,327,318,317,330,309,339,316,355,320,365,323,378,328,391,338,380,352,365,364,356"
          masque="faible 5" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="370,353,374,371,379,391,382,401,371,410,362,418,353,428,344,437,342,440,338,425,331,402,328,393,336,384,348,370"
          masque="faible 6" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="300,171,310,162,323,152,341,141,354,134,364,128,369,127,371,126,378,140,379,144,363,151,341,162,328,171,318,181,311,185"
          masque="fort 1" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="379,145,388,173,394,192,397,204,381,210,363,222,342,235,337,240,326,216,321,203,314,191,310,186,323,176,332,169,348,159,363,150"
          masque="fort 2" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="397,204,402,229,405,247,408,263,390,270,373,280,365,286,354,294,349,273,342,249,338,242,336,242,349,232,356,225,369,219,378,214,387,208"
          masque="moyen 4" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="408,262,411,280,414,301,417,319,417,325,406,329,393,337,385,342,372,351,370,352,364,324,355,295,355,293,366,284,382,275,398,267"
          masque="moyen 5" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="417,325,419,342,422,359,422,372,424,378,412,383,399,389,391,394,381,402,379,387,375,371,372,359,370,351,384,342,396,335,405,329"
          masque="faible 7" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="372,125,383,120,398,116,410,113,425,111,436,109,448,107,458,107,468,107,468,127,459,127,445,128,425,131,401,136,382,143,379,144"
          masque="fort 3" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="468,127,469,191,453,191,440,193,419,197,405,201,397,204,379,144,395,138,418,134,437,129,453,128"
          masque="fort 4" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="469,191,468,251,457,252,444,253,427,256,414,260,408,261,398,205,413,199,430,195,444,193,454,191"
          masque="fort 5" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="468,251,469,314,456,314,437,318,425,321,417,323,409,262,422,257,438,253,450,251"
          masque="moyen 6" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="468,315,468,370,457,370,442,372,429,375,422,378,417,324,431,319,447,316"
          masque="faible 8" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="468,107,492,109,513,112,534,116,548,119,559,123,566,126,556,144,540,138,518,133,500,129,479,127,468,127"
          masque="fort 6" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="557,145,538,204,519,197,504,194,490,192,480,191,471,191,468,191,468,127,483,128,509,130,531,135,543,139"
          masque="fort 7" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="538,204,528,262,513,257,506,256,493,253,483,252,481,251,468,251,468,191,479,191,491,192,506,194,518,197,531,202"
          masque="fort 8" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="469,251,469,314,484,316,494,318,510,322,519,325,528,261,517,258,507,256,497,254,486,252"
          masque="moyen 7" href="javascript:;" class="areamasque"/>
    <area shape="poly" coords="519,325,513,381,500,376,489,373,483,372,473,370,469,371,469,314,481,315,495,318,506,320"
          masque="faible 9" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="515,380,529,387,541,394,554,404,566,352,555,343,543,336,530,329,523,326,519,326,516,356,513,381"
          masque="faible 10" href="javascript:;" class="areamasque"/>
    <area shape="poly" coords="566,351,581,293,566,282,548,272,535,266,527,262,520,325,531,329,546,337"
          masque="moyen 8" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="539,205,533,233,530,251,528,262,550,273,564,281,579,292,581,294,589,269,595,251,599,241,575,222,560,214"
          masque="moyen 9" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="558,143,547,176,540,203,538,204,557,212,571,220,586,230,599,240,613,212,621,195,626,187,610,173,594,163,576,153,564,147"
          masque="fort 9" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="558,143,566,125,582,133,599,143,614,153,625,160,636,171,626,187,612,174,595,163,577,152,563,145"
          masque="fort 10" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="636,171,648,182,665,202,675,216,685,228,674,241,661,224,645,205,631,192,626,188"
          masque="moyen 10" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="647,290,660,266,675,242,659,221,642,203,625,187,600,240,613,252,626,265,632,271"
          masque="moyen 11" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="648,290,627,338,610,318,595,305,585,296,581,293,589,266,598,245,600,241,611,250,620,258,630,268,638,278"
          masque="moyen 12" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="628,339,608,392,596,378,582,365,571,354,566,351,582,294,591,301,602,311,610,320"
          masque="faible 11" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="566,352,580,363,595,377,605,390,607,392,593,441,579,424,567,412,555,403"
          masque="faible 12" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="685,229,700,252,710,271,716,280,721,290,712,302,703,286,690,265,683,253,674,243"
          masque="faible 13" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="675,242,693,270,703,286,711,301,702,318,693,336,686,348,676,329,666,315,657,302,650,293,648,290,660,267,669,253"
          masque="faible 14" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="648,291,660,307,673,327,685,347,677,367,668,387,666,392,651,370,638,352,630,340,627,339,635,321,643,301"
          masque="faible 15" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="628,340,641,358,652,373,660,383,666,393,646,444,610,392,615,377,621,359"
          masque="faible 16" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="347,458,361,444,380,424,385,422,383,403,363,419,354,426,346,436,343,440"
          masque="faible 17" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="422,380,425,398,406,408,395,415,386,423,385,422,382,403,392,397,402,389,414,384"
          masque="faible 18" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="469,371,469,390,460,390,451,391,433,395,424,399,423,379,434,376,446,372,460,372"
          masque="faible 19" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="469,370,470,389,480,389,490,391,500,394,509,396,512,398,512,379,501,376,494,373,483,371,473,370,468,370"
          masque="faible 20 " href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="513,380,513,398,523,402,530,406,539,412,549,419,551,422,556,403,549,399,534,389,524,384"
          masque="faible 21" href="javascript:;" class="areamasque"/>
    <area shape="poly"
          coords="555,404,551,420,557,426,564,433,579,449,587,459,591,463,596,443,584,429,571,415"
          masque="faible 22" href="javascript:;" class="areamasque"/>
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
<!---->
<!--        <div align="center">-->
<!--            --><?php
//            echo form_submit('envoiratioc', 'Valider', 'class="btn btn-success btn-sm"');
//
//            ?>
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
        <a href="<?php echo site_url("pv/calculprod"); ?>"><h4>Calculer Production →</h4></a>
    </li>
</ul>

