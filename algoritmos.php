<?php 


//-------Formulario 1

function metodo_bayesEstiloRecinto($ca,$ec,$ea,$or){

  // echo($ca);
  // echo($ec);
  // echo($ea);
  // echo($or);
        //tablas necesarias
        include ("tablas.php");
                
        $freAcom= 1;
        $freAsimila = 1;
        $freConver = 1;
        $freDiver = 1;

        while ($row = mysqli_fetch_array($conexionEstiloRecinto)) {
                //Comparar CA      
                if($row['valor'] == $ca && $row['estilo'] == 'ACOMODADOR'):
                        $freAcom = $freAcom * $row['ca'];
                elseif($row['valor'] == $ca && $row['estilo'] == 'ASIMILADOR'):
                        $freAsimila = $freAsimila * $row['ca'];
                elseif($row['valor'] == $ca && $row['estilo'] == 'CONVERGENTE'):
                        $freConver = $freConver * $row['ca'];
                elseif($row['valor'] == $ca && $row['estilo'] == 'DIVERGENTE'):
                        $freDiver = $freDiver * $row['ca'];
                endif;

                //Comparar EC   
                if($row['valor'] == $ec && $row['estilo'] == 'ACOMODADOR'):
                        $freAcom = $freAcom * $row['ec'];
                elseif($row['valor'] == $ec && $row['estilo'] == 'ASIMILADOR'):
                        $freAsimila = $freAsimila * $row['ec'];
                elseif($row['valor'] == $ec && $row['estilo'] == 'CONVERGENTE'):
                        $freConver = $freConver * $row['ec'];
                elseif($row['valor'] == $ec && $row['estilo'] == 'DIVERGENTE'):
                        $freDiver = $freDiver * $row['ec'];
                endif;

                //Comparar EA   
                if($row['valor'] == $ea && $row['estilo'] == 'ACOMODADOR'):
                        $freAcom = $freAcom * $row['ea'];
                elseif($row['valor'] == $ea && $row['estilo'] == 'ASIMILADOR'):
                        $freAsimila = $freAsimila * $row['ea'];
                elseif($row['valor'] == $ea && $row['estilo'] == 'CONVERGENTE'):
                        $freConver = $freConver * $row['ea'];
                elseif($row['valor'] == $ea && $row['estilo'] == 'DIVERGENTE'):
                        $freDiver = $freDiver * $row['ea'];
                endif;

                //Comparar OR  
                if($row['valor'] == $or && $row['estilo'] == 'ACOMODADOR'):
                        $freAcom = $freAcom * $row['o_r'];
                elseif($row['valor'] == $or && $row['estilo'] == 'ASIMILADOR'):
                        $freAsimila = $freAsimila * $row['o_r'];
                elseif($row['valor'] == $or && $row['estilo'] == 'CONVERGENTE'):
                        $freConver = $freConver * $row['o_r'];
                elseif($row['valor'] == $or && $row['estilo'] == 'DIVERGENTE'):
                        $freDiver = $freDiver * $row['o_r'];
                endif;
        }

        

        //Ciclo que trae las frecuencias
        while ($row = mysqli_fetch_array($conexionFrecuenciaEstiloRecinto)) { 
                $convergente = $row['convergente'];
                $asimilador = $row['asimilador'];
                $acomodador = $row['acomodador'];
                $divergente = $row['divergente'];
                
                                
        }
        echo($freAcom);
        echo($freAsimila);
        echo($freConver);
        echo($freDiver);

        $estilo = "";
        //Se busca el mayor valor caracteristico
        if((($freAcom * ($acomodador/220)) > ($freAsimila * ($asimilador/220))) && (($freAcom * ($acomodador/220)) > ($freConver * ($convergente/220))) && (($freAcom * ($acomodador/220)) > ($freDiver * ($divergente/220)))):
                $estilo = 'ACOMODADOR';
        elseif((($freAsimila * ($asimilador/220)) > ($freConver * ($convergente/220))) && (($freAsimila * ($asimilador/220)) > ($freDiver * ($divergente/220)))):
                $estilo = 'ASIMILADOR';
        elseif((($freConver * ($convergente/220)) > ($freDiver * ($divergente/220)))):
                $estilo = 'CONVERGENTE';
        else:
                $estilo = 'DIVERGENTE';
        endif;

        return $estilo;//Se devuelve el que más se repita
}


//Formulario 2
function metodo_bayesRecinto($estilo,$promedio,$sexo){

       //tablas necesarias
      include ("tablas.php");
    
        $frecuPara = 1;
        $frecuTurri = 1;

        //Comparar sexo 
        while ($row = mysqli_fetch_array($conexionSexo)) {
            if ($row['sexo'] == $sexo && $row['valor'] == 'Turrialba'): 
                $frecuTurri = $frecuTurri * $row['probabilidad'];        
            elseif ( $row['sexo'] == $sexo && $row['valor'] == 'Paraiso'):
                $frecuPara = $frecuPara * $row['probabilidad'];
            endif;
        }
        
        //Comparar estilo 
        while ($row = mysqli_fetch_array($conexionEstilo)) {
            if ($row['estilo'] == $estilo && $row['valor'] == 'Turrialba'):
                $frecuTurri = $frecuTurri * $row['probabilidad'];
            elseif ($row['estilo'] == $estilo && $row['valor'] == 'Paraiso'):
                $frecuPara = $frecuPara * $row['probabilidad'];
            endif;      
        }
        echo($frecuPara);
        echo($frecuTurri);
        //Comparar promedio 
        while ($row = mysqli_fetch_array($conexionPromedio)) {
            if ($row['promedio'] == $promedio && $row['caracteristica'] == 'Turrialba'):
                $frecuTurri = $frecuTurri * $row['probabilidad'];      
            elseif ($row['promedio'] == $promedio &&  $row['caracteristica'] == 'Paraiso'):
                $frecuPara = $frecuPara * $row['probabilidad'];
            endif;
        }

        //Ciclo que trae las frecuencias
        while ($row = mysqli_fetch_array($conexionFrecuenciaRecinto)) { 
            $paraiso = $row['paraiso'];
            $turrialba = $row['turrialba'];
        }
    
        $recinto = "";
    
        $tTurrialba = $frecuTurri * ($paraiso/77);
        $tParaiso = $frecuPara * ($turrialba/77);

        //Se busca el mayor
        if($tTurrialba > $tParaiso):
            $recinto='Turrialba';
        else:
            $recinto='Paraiso';
        endif;
    
        return $recinto;//Se devuelve el mayor
    }




//formulario 3

function metodo_bayesSexo($estilo,$promedio,$recinto){
    
        //tablas necesarias
       include ("tablas.php");
    
        $frecMas = 1;
        $frecFem = 1;
        
        //Comparar recinto 
        while ($row = mysqli_fetch_array($conexionRecinto)) {
            if ($row['recinto'] == $recinto && $row['caracteristica'] == 'M'): 
                $frecMas = $frecMas * $row['probabilidad'];        
            elseif ( $row['recinto'] == $recinto && $row['caracteristica'] == 'F'):
                $frecFem = $frecFem * $row['probabilidad'];
            endif;
        }
    
        //Comparar estilo 
        while ($row = mysqli_fetch_array($conexionEstilo)) {
            if ($row['estilo'] == $estilo && $row['valor'] == 'M'):
                $frecMas = $frecMas * $row['probabilidad'];
            elseif ($row['estilo'] == $estilo && $row['valor'] == 'F'):
                $frecFem = $frecFem * $row['probabilidad'];
            endif;        
        }
    
        //Comparar promedio 
        while ($row = mysqli_fetch_array($conexionPromedio)) {
            if ($row['promedio'] == $promedio && $row['caracteristica'] == 'M'):
                $frecMas = $frecMas * $row['probabilidad'];      
            elseif ($row['promedio'] == $promedio &&  $row['caracteristica'] == 'F'):
                $frecFem = $frecFem * $row['probabilidad'];
            endif;
        }
        
        
        //Ciclo que trae las frecuencias
        while ($row = mysqli_fetch_array($conexionFrecuenciaSexo)) { 
            $masculino = $row['masculino'];
            $femenino = $row['femenino'];
        }
        
        $sexo = "";
    
        $tMasculino = $frecMas * ($masculino/77);
        $tFemenino = $frecFem * ($femenino/77);
        //Se busca el mayor
        if($tMasculino > $tFemenino):
            $sexo='Masculino';
        else:
            $sexo='Femenino';
        endif;
    
        return $sexo;//Devuelve el mayor
    }



//Formulario 4
function metodo_bayesSexoRecintoPromedio($recinto,$promedio,$sexo){
       //tablas necesarias
       include ("tablas.php");
      
              
        $freAcom= 1;
        $freAsimila = 1;
        $freConver = 1;
        $freDiver = 1;
        
        //Comparar sexo 
        while ($row = mysqli_fetch_array($conexionSexo)) {       
          if ($row['sexo'] == $sexo && $row['valor'] == 'ACOMODADOR'):
            $freAcom = $freAcom * $row['probabilidad'];
          elseif ($row['sexo'] == $sexo && $row['valor'] == 'ASIMILADOR'):
            $freAsimila = $freAsimila * $row['probabilidad'];
          elseif ($row['sexo'] == $sexo && $row['valor'] == 'CONVERGENTE'):
            $freConver = $freConver * $row['probabilidad'];
          elseif ($row['sexo'] == $sexo && $row['valor'] == 'DIVERGENTE'):
            $freDiver = $freDiver * $row['probabilidad'];
          endif;        
        }
      
        //Comparar promedio 
        while ($row = mysqli_fetch_array($conexionPromedio)) {     
          if ($row['promedio'] == $promedio && $row['caracteristica'] == 'ACOMODADOR'):
            $freAcom = $freAcom * $row['probabilidad'];
          elseif ($row['promedio'] == $promedio && $row['caracteristica'] == 'ASIMILADOR'):
            $freAsimila = $freAsimila * $row['probabilidad'];
          elseif ($row['promedio'] == $promedio && $row['caracteristica'] == 'CONVERGENTE'):
            $freConver = $freConver * $row['probabilidad'];
          elseif ($row['promedio'] == $promedio && $row['caracteristica'] == 'DIVERGENTE'):
            $freDiver = $freDiver * $row['probabilidad'];
          endif; 
        }
      
        //Comparar recinto 
        while ($row = mysqli_fetch_array($conexionRecinto)) {     
          if ($row['recinto'] == $recinto && $row['caracteristica'] == 'ACOMODADOR'):
            $freAcom = $freAcom * $row['probabilidad'];
          elseif ($row['recinto'] == $recinto && $row['caracteristica'] == 'ASIMILADOR'):
            $freAsimila = $freAsimila * $row['probabilidad'];
          elseif ($row['recinto'] == $recinto && $row['caracteristica'] == 'CONVERGENTE'):
            $freConver = $freConver * $row['probabilidad'];
          elseif ($row['recinto'] == $recinto && $row['caracteristica'] == 'DIVERGENTE'):
            $freDiver = $freDiver * $row['probabilidad'];
          endif; 
        }
        
        //Ciclo que trae las frecuencias
        while ($row = mysqli_fetch_array($conexionFrecuenciaEsiloSexo)) { 
         
          $asimilador = $row['asimilador'];
          $divergente = $row['divergente'];
          $acomodador = $row['acomodador'];
          $convergente = $row['convergente'];
          
        }
      
        $estilo = "";
        
        //Busca mayores
        if ((($freAcom * ($acomodador/77)) > ($freAsimila * ($asimilador/77))) && (($freAcom * ($acomodador/77)) > ($freConver * ($convergente/77))) && (($freAcom * ($acomodador/77)) > ($freDiver * ($divergente/77)))):
          $estilo = 'ACOMODADOR';
        elseif ((($freAsimila * ($asimilador/77)) > ($freConver * ($convergente/77))) && (($freAsimila * ($asimilador/77)) > ($freDiver * ($divergente/77)))):
          $estilo = 'ASIMILADOR';
        elseif((($freConver * ($convergente/77)) > ($freDiver * ($divergente/77)))):
          $estilo = 'CONVERGENTE';
        else:
          $estilo = 'DIVERGENTE';
        endif;
      
        return $estilo;//Devuelve el mayor
      }





//Formulario 5
function metodo_bayesProfesores($a,$b,$c,$d,$e,$f,$g,$h){

        //tablas necesarias
       include ("tablas.php");
      
        $frecCA = 1;
        $frecCB = 1;
        $frecCI = 1;
        
      
        while ($row = mysqli_fetch_array($conexionProfesores)) {
      
          //Comparar A
          if($row['class'] == 'Beginner' && $row['a_valor'] == $a):
            $frecCB = $frecCB * $row['a_probabilidad'];
          elseif($row['class'] == 'Intermediate' && $row['a_valor'] == $a):
            $frecCI = $frecCI * $row['a_probabilidad'];
          elseif($row['class'] == 'Advanced' && $row['a_valor'] == $a):
            $frecCA = $frecCA * $row['a_probabilidad'];
          endif;
      
          //Comparar B
          if($row['class'] == 'Beginner' && $row['b_valor'] == $b):
            $frecCB = $frecCB * $row['b_probabilidad'];
          elseif($row['class'] == 'Intermediate' && $row['b_valor'] == $b):
           $frecCI = $frecCI *  $row['b_probabilidad'];
          elseif($row['class'] == 'Advanced' && $row['b_valor'] == $b):
            $frecCA = $frecCA * $row['b_probabilidad'];
          endif;
      
          //Comparar C
          if ($row['class'] == 'Beginner'&& $row['c_valor'] == $c):
            $frecCB = $frecCB * $row['c_probabilidad'];
          elseif($row['class'] == 'Intermediate' && $row['c_valor'] == $c):
            $frecCI = $frecCI * $row['c_probabilidad'];
          elseif($row['class'] == 'Advanced' && $row['c_valor'] == $c):
            $frecCA = $frecCA * $row['c_probabilidad'];
          endif;
      
          //Comparar D
          if ($row['class'] == 'Beginner' && $row['d_valor'] == $d):
            $frecCB = $frecCB * $row['d_probabilidad'];
          elseif($row['class'] == 'Intermediate' && $row['d_valor'] == $d):
            $frecCI = $frecCI * $row['d_probabilidad'];
          elseif($row['class'] == 'Advanced' && $row['d_valor'] == $d):
            $frecCA = $frecCA *$row['d_probabilidad'];
          endif;
      
          //Comparar E
          if ($row['class'] == 'Beginner' && $row['e_valor'] == $e):
            $frecCB = $frecCB * $row['e_probabilidad'];
          elseif( $row['class'] ==' Intermediate' && $row['e_valor'] == $e):
            $frecCI = $frecCI * $row['e_probabilidad'];
          elseif($row['class'] == 'Advanced' && $row['e_valor'] == $e):
            $frecCA = $frecCA * $row['e_probabilidad'];
          endif;
      
          //Comparar F
          if ($row['class'] == 'Beginner' && $row['f_valor'] == $f):
            $frecCB = $frecCB * $row['f_probabilidad'];
          elseif($row['class'] == 'Intermediate' && $row['f_valor'] == $f):
            $frecCI = $frecCI * $row['f_probabilidad'];
          elseif($row['class'] == 'Advanced' && $row['f_valor'] == $f):
            $frecCA = $frecCA * $row['f_probabilidad'];
          endif;
      
          //Comparar G
          if ($row['class'] == 'Beginner' && $row['g_valor'] == $g):
            $frecCB = $frecCB * $row['g_probabilidad'];
          elseif($row['class'] == 'Intermediate' && $row['g_valor'] == $g):
            $frecCI = $frecCI * $row['g_probabilidad'];
          elseif($row['class'] == 'Advanced' && $row['g_valor'] == $g):
            $frecCA = $frecCA * $row['g_probabilidad'];
          endif;
      
          //Comparar H
          if ($row['class'] == 'Beginner' && $row['h_valor'] == $h):
            $frecCB = $frecCB * $row['h_probabilidad'];
          elseif($row['class'] == 'Intermediate' && $row['h_valor'] == $h):
            $frecCI = $frecCI * $row['h_probabilidad'];
          elseif($row['class'] == 'Advanced' && $row['h_valor'] == $h):
            $frecCA = $frecCA * $row['h_probabilidad'];
          endif;
        } 
      
      
        //Ciclo que trae las frecuencias
        while ($row = mysqli_fetch_array($conexionFrecuenciaProfesores)) { 
          $claseA = $row['advanced'];
          $claseB = $row['beginner'];
          $claseI = $row['intermediate'];
          
        }
      
        $profesor = "";
      
        //Busca el mayor
        if(($frecCB * ($claseB/9)) > ($frecCI * ($claseI/9)) && ($frecCB * ($claseB/9)) > ($frecCA * ($claseA/9))):
            $profesor = 'BEGINNER';
        elseif(($frecCI * ($claseI/9)) > ($frecCA  * ($claseA/9))):
            $profesor = 'INTERMEDIATE';
        else:
            $profesor = 'ADVANCED';
        endif;
      
        return $profesor; //Devuelve el mayor
      }


//Formulario 6

function metodo_naive_bayes($reliability,$number_of,$capacity,$costo){

        //tablas necesarias
       include ("tablas.php");
        
        $frecCA = 1;
        $frecCB = 1;

        while ($row = mysqli_fetch_array($conexionRedes)) {

            //Comparar Reliability 
            if($row['class'] == 'A' && $row['reliability'] == $reliability):
              $frecCA = $frecCA * $row['reliability_probabilidad'];
            elseif($row['class'] == 'B' && $row['reliability'] == $reliability):
              $frecCB = $frecCB * $row['reliability_probabilidad'];
            endif;
      
            //Comparar Links 
            if ($row['class'] == 'A' && $row['links'] == $number_of):
              $frecCA = $frecCA * $row['links_probabilidad'];
            elseif($row['class'] == 'B' && $row['links'] == $number_of):
              $frecCB = $frecCB * $row['links_probabilidad'];
            endif;
      
            //Comparar Capacity 
            if($row['class'] == 'A' && $row['capacity'] == $capacity):
              $frecCA = $frecCA * $row['capacity_probabilidad'];
            elseif($row['class'] == 'B' && $row['capacity'] == $capacity):
              $frecCB = $frecCB * $row['capacity_probabilidad'];
            endif;
      
            //Comparar Costo 
            if($row['class'] == 'A' && $row['costo'] == $costo):
              $frecCA = $frecCA * $row['costo_probabilidad'];
            elseif($row['class'] == 'B' && $row['costo'] == $costo):
              $frecCB = $frecCB * $row['costo_probabilidad'];
            endif;        
        }
      
        //Ciclo que trae las frecuencias
        while ($row = mysqli_fetch_array($conexionFrecuenciaRedes)) { 
          $claseA = $row['clase_a'];
          $claseB = $row['clase_b'];
        }
      
        $redes = "";
        //Busca el mayor
        if(($frecCA * (18/35)) > ($frecCB * (19/35))):
          $redes = 'A';
        else:
          $redes = 'B';
        endif;
      
        return $redes;//Devuelve el mayor
      }





?>