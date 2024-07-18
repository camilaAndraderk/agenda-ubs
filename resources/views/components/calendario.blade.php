<?php 


        

        $totalDiasMes = cal_days_in_month(CAL_GREGORIAN, $mesAtual, $anoAtual);


        










    ?>
    <div id='calendar'>
      
      <!-- saltando dias até o mês começar -->
      <?php
        // saltando dias até o mês começar
        for($d = 0 ; $d < $inicioDoMes ; $d++){
          ?>
          <div class="diaOutroMes">
            -
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
            $classHoje = " hoje ";
          }


          //verificando se tem consultas na data em questão
          $classEvento = "";
          if( isset($consultas[$dataFormatada]) ){
            $classEvento = " diaComEvento ";
          }



          ?>
          <div class="itemDia <?=$classHoje.$classEvento;?>" >
            <?=$d;?>
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
          <div class="diaOutroMes">
            -
          </div>

          <?php
        }
