
<div id='calendar' class="calendario">
    
    <ul class="calendario__cabecalho">
        <li class="calendario__cabecalho__item">DOM</li>
        <li class="calendario__cabecalho__item">SEG</li>
        <li class="calendario__cabecalho__item">TER</li>
        <li class="calendario__cabecalho__item">QUA</li>
        <li class="calendario__cabecalho__item">QUI</li>
        <li class="calendario__cabecalho__item">SEX</li>
        <li class="calendario__cabecalho__item">SAB</li>
    </ul>
    <!-- saltando dias até o mês começar -->
    <?php
    // saltando dias até o mês começar
    for($d = 0 ; $d < $inicioDoMes ; $d++){
        ?>
        <div class="calendario__dia calendario__dia--outro-mes">
            <p>-</p>
        </div>

        <?php
    }

    //outros dias do mês


    $diasDessaSemana = $inicioDoMes;

    for($d = 1 ; $d <= $totalDiasMes ; $d++){

        $dataFormatada = $anoAtual."-".$mesAtual."-".str_pad($d , 2 , '0' , STR_PAD_LEFT);


        //verificando se por acaso o dia em questão é hoje
        $classHoje = "";
        if($dataFormatada == date("Y-m-d")){
            $classHoje = " calendario__dia--hoje ";
        }

        //verificando se tem consultas na data em questão
        $classEvento = "";
        if( isset($consultas[$dataFormatada]) ){
            $classEvento = " calendario__dia--com-evento";
        }

        ?>
        <div class="calendario__dia <?=$classHoje.$classEvento;?>" >
            <p><?=$d;?></p>
        </div>

        <?php
        $diasDessaSemana++;
        if($diasDessaSemana == 7){
            //acabou uma semana
            echo "<br>";
            echo "<br>";
            echo "<br>";
            $diasDessaSemana = 0;
        }

    }

    //terminando a última semana
    for($d = $diasDessaSemana ; $d < 7 ; $d++){
        ?>
        <div class="calendario__dia calendario__dia--outro-mes">
            <p>-</p>
        </div>

        <?php
    }
?>
</div>