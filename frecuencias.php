<?php

function insertaFrecuenciaEstilo(){
   include ("config/connection.php");
    $sql = "SELECT * FROM recintoEstilo";

    $m = 4;
    $acomodador = 0;
    $asimilador = 0;
    $convergente = 0;
    $divergente = 0;
    $ca = 0;
    $ec = 0;
    $ea = 0;
    $or = 0;

    while ($row = mysqli_fetch_array( $sql )) {
        
        if($row['estilo'] == "ACOMODADOR"): 
            $acomodador++; 
        endif;
        if($row['estilo'] == "ASIMILADOR"): 
            $asimilador++;
        endif;
        if($row['estilo'] == "CONVERGENTE"): 
            $convergente++; 
        endif;
        if($row['estilo'] == "DIVERGENTE"): 
            $divergente++;
        endif;

        $ca = (array_unique[$row['ca']]);
        $ec = (array_unique[$row['ec']]);
        $ea = (array_unique[$row['ea']]);
        $or = (array_unique[$row['o_r']]);
    }

    $conn = new mysqli($host,$user,$pass,$bd);

        die("Connection failed: " . mysqli_connect_error());
    

    echo "Connected successfully";

    $sql = "INSERT INTO frecuencia_estilo_recinto (m,acomodador,asimilador,
                        convergente,divergente,ca,ec,ea,or)
            VALUES (m,acomodador,asimilador,
                    convergente,divergente,ca,ec,ea,or)";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);

}

function insertaProbabilidadEstilo1(){
   
     include ("config/connection.php");
    $sql = "SELECT * FROM recintoEstilo";

    $frecuencia_estilo_recinto = "SELECT * FROM frecuencia_estilo_recinto";


    
    $conn = new mysqli($host,$user,$pass,$bd);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";

    while ($row = mysqli_fetch_array( $frecuencia_estilo_recinto )) {
        $m = $row['m'];
        $acomodador = $row['acomodador'];
        $asimilador = $row['asimilador'];
        $convergente = $row['convergente'];
        $divergente = $row['divergente'];
        $ca = $row['ca'];
        $ec = $row['ec'];
        $ea = $row['ea'];
        $or = $row['o_r'];
    }
    $valor = 0;
    $ca = 0;
    $ec = 0;
    $ea = 0;
    $or = 0;
    $estilo = "";

    $CA = 0;
    $EC = 0;
    $EA = 0;
    $OR = 0;

    while ($row = mysqli_fetch_array( $sql )) {
        if($row['ca'] == "ca" && $row['estilo'] == "ACOMODADOR"):
            $CA++;
        endif;
        if($row['ec'] == "ec" && $row['estilo'] == "ACOMODADOR"):
            $EC++;
        endif;
        if($row['ea'] == "ea" && $row['estilo'] == "ACOMODADOR"):
            $EA++;
        endif;
        if($row['o_r'] == "o_r" && $row['estilo'] == "ACOMODADOR"):
            $OR++;
        endif;

        if($row['ca'] == "ca" && $row['estilo'] == "ASIMILADOR"):
            $CA++;
        endif;
        if($row['ec'] == "ec" && $row['estilo'] == "ASIMILADOR"):
            $EC++;
        endif;
        if($row['ea'] == "ea" && $row['estilo'] == "ASIMILADOR"):
            $EA++;
        endif;
        if($row['o_r'] == "o_r" && $row['estilo'] == "ASIMILADOR"):
            $OR++;
        endif;

        if($row['ca'] == "ca" && $row['estilo'] == "CONVERGENTE"):
            $CA++;
        endif;
        if($row['ec'] == "ec" && $row['estilo'] == "CONVERGENTE"):
            $EC++;
        endif;
        if($row['ea'] == "ea" && $row['estilo'] == "CONVERGENTE"):
            $EA++;
        endif;
        if($row['o_r'] == "o_r" && $row['estilo'] == "CONVERGENTE"):
            $OR++;
        endif;

        if($row['ca'] == "ca" && $row['estilo'] == "DIVERGENTE"):
            $CA++;
        endif;
        if($row['ec'] == "ec" && $row['estilo'] == "DIVERGENTE"):
            $EC++;
        endif;
        if($row['ea'] == "ea" && $row['estilo'] == "DIVERGENTE"):
            $EA++;
        endif;
        if($row['o_r'] == "o_r" && $row['estilo'] == "DIVERGENTE"):
            $OR++;
        endif;
    }

    while ($row = mysqli_fetch_array( $sql )) {
        foreach (range(6, 24) as $valor) {
            $row['valor'] = $valor;
            if($row['estilo'] == "ACOMODADOR"):
                $ca = (($CA + ($m * (1/$ca))) / ($acomodador + $m));
                $ea = (($EC + ($m * (1/$ec))) / ($acomodador + $m));
                $ec = (($EA + ($m * (1/$ea))) / ($acomodador + $m));
                $o_r = (($OR + ($m * (1/$or))) / ($acomodador + $m));
                $estilo = "ACOMODADOR";
            endif;

            if($row['estilo'] == "ASIMILADOR"):
                $ca = (($CA + ($m * (1/$ca))) / ($asimilador + $m));
                $ea = (($EC + ($m * (1/$ec))) / ($asimilador + $m));
                $ec = (($EA + ($m * (1/$ea))) / ($asimilador + $m));
                $o_r = (($OR + ($m * (1/$or))) / ($asimilador + $m));
                $estilo = "ASIMILADOR";
            endif;

            if($row['estilo'] == "CONVERGENTE"):
                $ca = (($CA + ($m * (1/$ca))) / ($convergente + $m));
                $ea = (($EC + ($m * (1/$ec))) / ($convergente + $m));
                $ec = (($EA + ($m * (1/$ea))) / ($convergente + $m));
                $o_r = (($OR + ($m * (1/$or))) / ($convergente + $m));
                $estilo = "CONVERGENTE";
            endif;

            if($row['estilo'] == "DIVERGENTE"):
                $ca = (($CA + ($m * (1/$ca))) / ($divergente + $m));
                $ea = (($EC + ($m * (1/$ec))) / ($divergente + $m));
                $ec = (($EA + ($m * (1/$ea))) / ($divergente + $m));
                $o_r = (($OR + ($m * (1/$or))) / ($divergente + $m));
                $estilo = "DIVERGENTE";
            endif;

            $sqlInsertar = "INSERT INTO probabilidad_recinto (valor,ca,ec,
                        ea,o_r,estilo)
            VALUES (valor,ca,ec, ea,o_r,estilo)";
        }
    }   
    
    mysqli_close($conn);
}

function insertaFrecuenciaEstilo2(){
   include ("config/connection.php");
   
    $sql = "SELECT * FROM estilosexopromediorecinto";

    $m = 3;
    $acomodador = 0;
    $asimilador = 0;
    $convergente = 0;
    $divergente = 0;
    $sexo = 0;
    $recinto = 0;
    $promedio = 0;

    while ($row = mysqli_fetch_array( $sql )) {
        
        if($row['estilo'] == "ACOMODADOR"): 
            $acomodador++; 
        endif;
        if($row['estilo'] == "ASIMILADOR"): 
            $asimilador++;
        endif;
        if($row['estilo'] == "CONVERGENTE"): 
            $convergente++; 
        endif;
        if($row['estilo'] == "DIVERGENTE"): 
            $divergente++;
        endif;
        $sexo = (array_unique[$row['sexo']]);
        $recinto = (array_unique[$row['recinto']]);
        $promedio = (array_unique[$row['promedio']]);
    }

    $conn = new mysqli($host,$user,$pass,$bd);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";

    $sql = "INSERT INTO frecuencia_estilo2 (m,acomodador,asimilador,convergente,divergente,
                        sexo,recinto,promedio)
            VALUES (m,paraiso,turrialba,
                    estilo,recinto,promedio)";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);

}

function insertaProbabilidadEstilo(){


    $sql = "SELECT * FROM estilosexopromediorecinto";

    $frecuencia_sexo = "SELECT * FROM frecuencia_estilo2";

    $conn = new mysqli($host,$user,$pass,$bd);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";

    while ($row = mysqli_fetch_array( $frecuencia_estilo2 )) {
        $m = $row['m'];
        $acomodador = $row['acomodador'];
        $asimilador = $row['asimilador'];
        $convergente = $row['convergente'];
        $divergente = $row['divergente'];
        $sexo = $row['sexo'];
        $recinto = $row['recinto'];
        $promedio = $row['promedio'];
    }

    $sexo = "";
    $probabilidad = 0;
    $valor = "";

    $P = 0;
    $T = 0;
    $M = 0;
    $F = 0;


    while ($row = mysqli_fetch_array( $frecuencia_recinto )) {
        if($row['recinto'] == "Paraiso"):
            $P++;
        endif;
        if($row['recinto'] == "Turrialba"):
            $T++;
        endif;
        if($row['sexo'] == "F"):
            $F++;
        endif;
        if($row['sexo'] == "M"):
            $M++;
        endif;
    }

    while ($row = mysqli_fetch_array( $sql )) {
        if($row['sexo'] == "F" && $row['estilo'] == "ACOMODADOR"):
            $estilo = "ACOMODADOR";
            $probabilidad = (($F + ($m * (1/$sexo))) / ($acomodador + $m));
            $valor = "F";
        endif;

        if($row['sexo'] == "M" && $row['estilo'] == "ACOMODADOR"):
            $estilo = "ACOMODADOR";
            $probabilidad = (($M + ($m * (1/$sexo))) / ($acomodador + $m));
            $valor = "M";
        endif;

        if($row['sexo'] == "F" && $row['estilo'] == "ASIMILADOR"):
            $estilo = "ASIMILADOR";
            $probabilidad = (($F + ($m * (1/$sexo))) / ($asimilador + $m));
            $valor = "F";
        endif;

        if($row['sexo'] == "M" && $row['estilo'] == "ASIMILADOR"):
            $estilo = "ASIMILADOR";
            $probabilidad = (($M + ($m * (1/$sexo))) / ($asimilador + $m));
            $valor = "M";
        endif;

        if($row['sexo'] == "F" && $row['estilo'] == "CONVERGENTE"):
            $estilo = "CONVERGENTE";
            $probabilidad = (($F + ($m * (1/$sexo))) / ($convergente + $m));
            $valor = "F";
        endif;

        if($row['sexo'] == "M" && $row['estilo'] == "CONVERGENTE"):
            $estilo = "CONVERGENTE";
            $probabilidad = (($M + ($m * (1/$sexo))) / ($convergente + $m));
            $valor = "M";
        endif;

        if($row['sexo'] == "F" && $row['estilo'] == "DIVERGENTE"):
            $estilo = "DIVERGENTE";
            $probabilidad = (($F + ($m * (1/$sexo))) / ($divergente + $m));
            $valor = "F";
        endif;

        if($row['sexo'] == "M" && $row['estilo'] == "DIVERGENTE"):
            $estilo = "DIVERGENTE";
            $probabilidad = (($M + ($m * (1/$sexo))) / ($divergente + $m));
            $valor = "M";
        endif;


        if($row['recinto'] == "Paraiso" && $row['estilo'] == "ACOMODADOR"):
            $estilo = "ACOMODADOR";
            $probabilidad = (($P + ($m * (1/$recinto))) / ($acomodador + $m));
            $valor = "Paraiso";
        endif;

        if($row['recinto'] == "Turrialba" && $row['estilo'] == "ACOMODADOR"):
            $estilo = "ACOMODADOR";
            $probabilidad = (($T + ($m * (1/$recinto))) / ($acomodador + $m));
            $valor = "Turrialba";
        endif;

        if($row['recinto'] == "Paraiso" && $row['estilo'] == "ASIMILADOR"):
            $estilo = "ASIMILADOR";
            $probabilidad = (($P + ($m * (1/$recinto))) / ($asimilador + $m));
            $valor = "Paraiso";
        endif;

        if($row['recinto'] == "Turrialba" && $row['estilo'] == "ASIMILADOR"):
            $estilo = "ASIMILADOR";
            $probabilidad = (($T + ($m * (1/$recinto))) / ($asimilador + $m));
            $valor = "Turrialba";
        endif;

        if($row['recinto'] == "Paraiso" && $row['estilo'] == "CONVERGENTE"):
            $estilo = "CONVERGENTE";
            $probabilidad = (($P + ($m * (1/$recinto))) / ($convergente + $m));
            $valor = "Paraiso";
        endif;

        if($row['recinto'] == "Turrialba" && $row['estilo'] == "CONVERGENTE"):
            $reestilocinto = "CONVERGENTE";
            $probabilidad = (($T + ($m * (1/$recinto))) / ($convergente + $m));
            $valor = "Turrialba";
        endif;

        if($row['recinto'] == "Paraiso" && $row['estilo'] == "DIVERGENTE"):
            $estilo = "DIVERGENTE";
            $probabilidad = (($P + ($m * (1/$recinto))) / ($divergente + $m));
            $valor = "Paraiso";
        endif;

        if($row['recinto'] == "Turrialba" && $row['estilo'] == "DIVERGENTE"):
            $estilo = "DIVERGENTE";
            $probabilidad = (($T + ($m * (1/$recinto))) / ($divergente + $m));
            $valor = "Turrialba";
        endif;


        
        $sqlInsertar = "INSERT INTO probabilidad_estilo_sexo (estilo,probabilidad,valor)
            VALUES (estilo,probabilidad,valor)";
    }

    mysqli_close($conn);
}


function insertaFrecuenciaProfesores(){
   include ("config/connection.php");
    $host = "163.178.107.10";
    $user = "laboratorios";
    $pass = "Uy&)&nfC7QqQau.%278UQ24/=%";
    $bd = "if7103_tarea2_b82444";
    $conexion = mysqli_connect($host,$user,$pass,$bd);
    $sql = "SELECT * FROM profesores";

    $m = 8;
    $beginner = 0;
    $intermediate = 0;
    $advaed = 0;
    $a = 0;
    $b = 0;
    $c = 0;
    $d = 0;
    $e = 0;
    $f = 0;
    $g = 0;
    $h = 0;

    while ($row = mysqli_fetch_array( $sql )) {
        
        if($row['class'] == "Beginner"): 
            $beginner++; 
        endif;
        if($row['class'] == "Intermediate"): 
            $intermediate++;
        endif;
        if($row['class'] == "Advaed"): 
            $advaed++;
        endif;

        $a = (array_unique[$row['A']]);
        $b = (array_unique[$row['B']]);
        $c = (array_unique[$row['C']]);
        $d = (array_unique[$row['D']]);
        $e = (array_unique[$row['E']]);
        $f = (array_unique[$row['F']]);
        $g = (array_unique[$row['G']]);
        $h = (array_unique[$row['H']]);
    }

    $conn = new mysqli($host,$user,$pass,$bd);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";

    $sql = "INSERT INTO frecuencia_profesores (m,beginner,intermediate,
                        advaed,a,b,c,d,e,f,g,h)
            VALUES (m,beginner,intermediate,
                    advaed,a,b,c,d,e,f,g,h)";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

function insertaProbabilidadProfesores(){
   include ("config/connection.php");

    $conexion = mysqli_connect($host,$user,$pass,$bd);

    $sql = "SELECT * FROM profesores";

    $frecuencia_profesores = "SELECT * FROM frecuencia_profesores";


    $conn = new mysqli($host,$user,$pass,$bd);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";

    while ($row = mysqli_fetch_array( $frecuencia_profesores )) {
        $m = $row['m'];
        $beginner = $row['beginner'];
        $intermediate = $row['intermediate'];
        $advaed = $row['advaed'];
        $a = $row['a'];
        $b = $row['b'];
        $c = $row['c'];
        $d = $row['d'];
        $e = $row['e'];
        $f = $row['f'];
        $g = $row['g'];
        $h = $row['h'];
    }

    $a_valor = 0;
    $a_probabilidad = 0;
    $b_valor = 0;
    $b_probabilidad = 0;
    $c_valor = 0;
    $c_probabilidad = 0;
    $d_valor = 0;
    $d_probabilidad = 0;
    $e_valor = 0;
    $e_probabilidad = 0;
    $f_valor = 0;
    $f_probabilidad = 0;
    $g_valor = 0;
    $g_probabilidad = 0;
    $h_valor = 0;
    $h_probabilidad = 0;

    $class = "";


    $A = 0;
    $B = 0;
    $C = 0;
    $D = 0;
    $E = 0;
    $F = 0;
    $G = 0;
    $H = 0;

    while ($row = mysqli_fetch_array( $profesores )) {
        if($row['A']):
            $A++;
        endif;
        if($row['B'] ):
            $B++;
        endif;
        if($row['C']):
            $C++;
        endif;
        if($row['D'] ):
            $D++;
        endif;
        if($row['E'] ):
            $E++;
        endif;
        if($row['F'] ):
            $F++;
        endif;
        if($row['G'] ):
            $G++;
        endif;
        if($row['H'] ):
            $H++;
        endif;
    }

    while ($row = mysqli_fetch_array( $sql )) {
        foreach (range(1, 3) as $valor) {
            if($row['A'] && $row['class'] == "Beginner"):
                $a_valor = "Paraiso";
                $a_probabilidad = (($A + ($m * (1/$a))) / ($beginner + $m));
                $class = "Beginner";
            endif;

            if($row['B'] && $row['class'] == "Beginner"):
                $b_valor = "Paraiso";
                $b_probabilidad = (($B + ($m * (1/$b))) / ($beginner + $m));
                $class = "Beginner";
            endif;

            if($row['C'] && $row['class'] == "Beginner"):
                $c_valor = "Paraiso";
                $c_probabilidad = (($C + ($m * (1/$c))) / ($beginner + $m));
                $class = "Beginner";
            endif;

            if($row['D'] && $row['class'] == "Beginner"):
                $d_valor = "Paraiso";
                $d_probabilidad = (($D + ($m * (1/$d))) / ($beginner + $m));
                $class = "Beginner";
            endif;

            if($row['E'] && $row['class'] == "Beginner"):
                $e_valor = "Paraiso";
                $e_probabilidad = (($E + ($m * (1/$e))) / ($beginner + $m));
                $class = "Beginner";
            endif;

            if($row['F'] && $row['class'] == "Beginner"):
                $f_valor = "Paraiso";
                $f_probabilidad = (($F + ($m * (1/$f))) / ($beginner + $m));
                $class = "Beginner";

            endif;if($row['G'] && $row['class'] == "Beginner"):
                $g_valor = "Paraiso";
                $g_probabilidad = (($G + ($m * (1/$g))) / ($beginner + $m));
                $class = "Beginner";
            endif;

            if($row['H'] && $row['class'] == "Beginner"):
                $valor_ = "Paraiso";
                $h_probabilidad = (($H + ($m * (1/$h))) / ($beginner + $m));
                $class = "Beginner";
            endif;

            if($row['A'] && $row['class'] == "Intermediate"):
                $a_valor = "Paraiso";
                $a_probabilidad = (($A + ($m * (1/$a))) / ($intermediate + $m));
                $class = "Intermediate";
            endif;

            if($row['B'] && $row['class'] == "Intermediate"):
                $b_valor = "Paraiso";
                $b_probabilidad = (($B + ($m * (1/$b))) / ($intermediate + $m));
                $class = "Intermediate";
            endif;

            if($row['C'] && $row['class'] == "Intermediate"):
                $c_valor = "Paraiso";
                $c_probabilidad = (($C + ($m * (1/$c))) / ($intermediate + $m));
                $class = "Intermediate";
            endif;

            if($row['D'] && $row['class'] == "Intermediate"):
                $d_valor = "Paraiso";
                $d_probabilidad = (($D + ($m * (1/$d))) / ($intermediate + $m));
                $class = "Intermediate";
            endif;

            if($row['E'] && $row['class'] == "Intermediate"):
                $e_valor = "Paraiso";
                $e_probabilidad = (($E + ($m * (1/$e))) / ($intermediate + $m));
                $class = "Intermediate";
            endif;

            if($row['F'] && $row['class'] == "Intermediate"):
                $f_valor = "Paraiso";
                $f_probabilidad = (($F + ($m * (1/$f))) / ($intermediate + $m));
                $class = "Intermediate";

            endif;if($row['G'] && $row['class'] == "Intermediate"):
                $g_valor = "Paraiso";
                $g_probabilidad = (($G + ($m * (1/$g))) / ($intermediate + $m));
                $class = "Intermediate";
            endif;

            if($row['H'] && $row['class'] == "Intermediate"):
                $valor_ = "Paraiso";
                $h_probabilidad = (($H + ($m * (1/$h))) / ($intermediate + $m));
                $class = "Intermediate";
            endif;

            if($row['A'] && $row['class'] == "Advaed"):
                $a_valor = "Paraiso";
                $a_probabilidad = (($A + ($m * (1/$a))) / ($advaed + $m));
                $class = "Advaed";
            endif;

            if($row['B'] && $row['class'] == "Advaed"):
                $b_valor = "Paraiso";
                $b_probabilidad = (($B + ($m * (1/$b))) / ($advaed + $m));
                $class = "Advaed";
            endif;

            if($row['C'] && $row['class'] == "Advaed"):
                $c_valor = "Paraiso";
                $c_probabilidad = (($C + ($m * (1/$c))) / ($advaed + $m));
                $class = "Advaed";
            endif;

            if($row['D'] && $row['class'] == "Advaed"):
                $d_valor = "Paraiso";
                $d_probabilidad = (($D + ($m * (1/$d))) / ($advaed + $m));
                $class = "Advaed";
            endif;

            if($row['E'] && $row['class'] == "Advaed"):
                $e_valor = "Paraiso";
                $e_probabilidad = (($E + ($m * (1/$e))) / ($advaed + $m));
                $class = "Advaed";
            endif;

            if($row['F'] && $row['class'] == "Advaed"):
                $f_valor = "Paraiso";
                $f_probabilidad = (($F + ($m * (1/$f))) / ($advaed + $m));
                $class = "Advaed";
            endif;

            if($row['G'] && $row['class'] == "Advaed"):
                $g_valor = "Paraiso";
                $g_probabilidad = (($G + ($m * (1/$g))) / ($advaed + $m));
                $class = "Advaed";
            endif;

            if($row['H'] && $row['class'] == "Advaed"):
                $valor_ = "Paraiso";
                $h_probabilidad = (($H + ($m * (1/$h))) / ($advaed + $m));
                $class = "Advaed";
            endif;

            $sqlInsertar = "INSERT INTO probabilidad_profesores (
                a_valor,
                a_probabilidad,
                b_valor,
                b_probabilidad,
                c_valor,
                c_probabilidad,
                d_valor,
                d_probabilidad,
                e_valor,
                e_probabilidad,
                f_valor,
                f_probabilidad,
                g_valor,
                g_probabilidad,
                h_valor,
                h_probabilidad,
                class
                )
                VALUES (
                    a_valor,
                    a_probabilidad,
                    b_valor,
                    b_probabilidad,
                    c_valor,
                    c_probabilidad,
                    d_valor,
                    d_probabilidad,
                    e_valor,
                    e_probabilidad,
                    f_valor,
                    f_probabilidad,
                    g_valor,
                    g_probabilidad,
                    h_valor,
                    h_probabilidad,
                    class
                    )";
        }
    } 
    
    mysqli_close($conn);
}


function insertaFrecuenciaRecinto(){
   include ("config/connection.php");

    $sql = "SELECT * FROM estilosexopromediorecinto";

    $m = 3;
    $paraiso = 0;
    $turrialba = 0;
    $sexo = 0;
    $estilo = 0;
    $promedio = 0;

    while ($row = mysqli_fetch_array( $sql )) {
        
        if($row['recinto'] == "Paraiso"): 
            $paraiso++; 
        endif;
        if($row['recinto'] == "Turrialba"): 
            $turrialba++;
        endif;
        $sexo = (array_unique[$row['sexo']]);
        $estilo = (array_unique[$row['estilo']]);
        $promedio = (array_unique[$row['promedio']]);
    }

    $conn = new mysqli($host,$user,$pass,$bd);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";

    $sql = "INSERT INTO frecuencia_recinto (m,paraiso,turrialba,
                        sexo,estilo,promedio)
            VALUES (m,paraiso,turrialba,
                    sexo,estilo,promedio)";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);

}

function insertaProbabilidadRecinto(){
   include ("config/connection.php");
     $sql = "SELECT * FROM estilosexopromediorecinto";

    $frecuencia_recinto = "SELECT * FROM frecuencia_recinto";

    $conn = new mysqli($host,$user,$pass,$bd);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";

    while ($row = mysqli_fetch_array( $frecuencia_recinto )) {
        $m = $row['m'];
        $paraiso = $row['paraiso'];
        $turrialba = $row['turrialba'];
        $sexo = $row['sexo'];
        $estilo = $row['estilo'];
        $promedio = $row['promedio'];
    }

    $recinto = "";
    $probabilidad = 0;
    $valor = "";



    while ($row = mysqli_fetch_array( $frecuencia_recinto )) {
        if($row['recinto'] == "Paraiso" && $row['sexo'] == "F"):
            $PF++;
        endif;
        if($row['recinto'] == "Turrialba" && $row['sexo'] == "M"):
            $TM++;
        endif;
        if($row['recinto'] == "Paraiso" && $row['sexo'] == "F"):
            $PM++;
        endif;
        if($row['recinto'] == "Turrialba" && $row['sexo'] == "M"):
            $TF++;
        endif;

        if($row['recinto'] == "Paraiso" && $row['estilo'] == "ACOMODADOR"):
            $acomodador++;
        endif;
        if($row['recinto'] == "Turrialba" && $row['estilo'] == "ACOMODADOR"):
            $TAcomodador++;
        endif;

        if($row['recinto'] == "Paraiso" && $row['estilo'] == "ASIMILADOR"):
            $PAsimilador++;
        endif;
        if($row['recinto'] == "Turrialba" && $row['estilo'] == "ASIMILADOR"):
            $TAsimilador++;
        endif;

        if($row['recinto'] == "Paraiso" && $row['estilo'] == "CONVERGENTE"):
            $PConvergente++;
        endif;
        if($row['recinto'] == "Turrialba" && $row['estilo'] == "CONVERGENTE"):
            $TConvergente++;
        endif;

        if($row['recinto'] == "Paraiso" && $row['estilo'] == "DIVERGENTE"):
            $PDivergente++;
        endif;
        if($row['recinto'] == "Turrialba" && $row['estilo'] == "DIVERGENTE"):
            $TDivergente++;
        endif;
    }

    while ($row = mysqli_fetch_array( $sql )) {
        if($row['sexo'] == "F" && $row['recinto'] == "Paraiso"):
            $recinto = "Paraiso";
            $probabilidad = (($PF + ($m * (1/$sexo))) / ($paraiso + $m));
            $valor = "F";
        endif;

        if($row['sexo'] == "M" && $row['recinto'] == "Paraiso"):
            $recinto = "Paraiso";
            $probabilidad = (($PF + ($m * (1/$sexo))) / ($paraiso + $m));
            $valor = "M";
        endif;

        if($row['sexo'] == "F" && $row['recinto'] == "Turrialba"):
            $recinto = "Turrialba";
            $probabilidad = (($PM + ($m * (1/$sexo))) / ($turrialba + $m));
            $valor = "F";
        endif;

        if($row['sexo'] == "M" && $row['recinto'] == "Turrialba"):
            $recinto = "Turrialba";
            $probabilidad = (($PM + ($m * (1/$sexo))) / ($turrialba + $m));
            $valor = "M";
        endif;

        if($row['estilo'] == "ACOMODADOR" && $row['recinto'] == "Paraiso"):
            $recinto = "Paraiso";
            $probabilidad = (($acomodador + ($m * (1/$estilo))) / ($paraiso + $m));
            $valor = "ACOMODADOR";
        endif;

        if($row['estilo'] == "ACOMODADOR" && $row['recinto'] == "Turrialba"):
            $recinto = "Turrialba";
            $probabilidad = (($TAcomodador + ($m * (1/$estilo))) / ($turrialba + $m));
            $valor = "ACOMODADOR";
        endif;

        if($row['estilo'] == "ASIMILADOR" && $row['recinto'] == "Paraiso"):
            $recinto = "Paraiso";
            $probabilidad = (($PAsimilador + ($m * (1/$estilo))) / ($paraiso + $m));
            $valor = "ASIMILADOR";
        endif;

        if($row['estilo'] == "ASIMILADOR" && $row['recinto'] == "Turrialba"):
            $recinto = "Turrialba";
            $probabilidad = (($TAsimilador + ($m * (1/$estilo))) / ($turrialba + $m));
            $valor = "ASIMILADOR";
        endif;

        if($row['estilo'] == "CONVERGENTE" && $row['recinto'] == "Paraiso"):
            $recinto = "Paraiso";
            $probabilidad = (($PConvergente + ($m * (1/$estilo))) / ($paraiso + $m));
            $valor = "CONVERGENTE";
        endif;

        if($row['estilo'] == "CONVERGENTE" && $row['recinto'] == "Turrialba"):
            $recinto = "Turrialba";
            $probabilidad = (($TConvergente + ($m * (1/$estilo))) / ($turrialba + $m));
            $valor = "CONVERGENTE";
        endif;

        if($row['estilo'] == "DIVERGENTE" && $row['recinto'] == "Paraiso"):
            $recinto = "Paraiso";
            $probabilidad = (($PDivergente + ($m * (1/$estilo))) / ($paraiso + $m));
            $valor = "DIVERGENTE";
        endif;

        if($row['estilo'] == "DIVERGENTE" && $row['recinto'] == "Turrialba"):
            $recinto = "Turrialba";
            $probabilidad = (($TDivergente + ($m * (1/$estilo))) / ($turrialba + $m));
            $valor = "DIVERGENTE";
        endif;

        $sqlInsertar = "INSERT INTO probabilidad_promedio (recinto,probabilidad,valor)
            VALUES (recinto,probabilidad,valor)";
    }

    mysqli_close($conn);
}

function insertaFrecuenciaRedes(){
   include ("config/connection.php");

    $sql = "SELECT * FROM redes";

    $m = 4;
    $claseA = 0;
    $claseB = 0;
    $reliability = 0;
    $links = 0;
    $capacity = 0;
    $costo = 0;

    while ($row = mysqli_fetch_array( $sql )) {
        
        if($row['class'] == "A"): 
            $claseA++; 
        endif;
        if($row['class'] == "B"): 
            $claseB++;
        endif;

        $reliability = (array_unique[$row['reliability']]);
        $links = (array_unique[$row['number_of']]);
        $capacity = (array_unique[$row['capacity']]);
        $costo = (array_unique[$row['costo']]);
    }
    $conn = new mysqli($host,$user,$pass,$bd);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";

    $sql = "INSERT INTO frecuencia_redes (m,claseA,claseB,
                        reliability,links,capacity,costo)
            VALUES (m,claseA,claseB,
                        reliability,links,capacity,costo)";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

function insertaProbabilidadRedes(){
   include ("config/connection.php");
    $sql = "SELECT * FROM redes";

    $frecuencia_redes = "SELECT * FROM frecuencia_redes";
    $conn = new mysqli($host,$user,$pass,$bd);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";
    while ($row = mysqli_fetch_array( $frecuencia_redes )) {
        $m = $row['m'];
        $claseA = $row['claseA'];
        $claseB = $row['claseB'];
        $reliability = $row['reliability'];
        $links = $row['links'];
        $capacity = $row['capacity'];
        $costo = $row['costo'];
    }

    $R = 0;
    $N = 0;
    $Ca = 0;
    $Co = 0;

    while ($row = mysqli_fetch_array( $frecuencia_redes )) {
        if($row['reliability']):
            $R++;
        endif;
        if($row['number_of'] ):
            $N++;
        endif;
        if($row['capacity']):
            $Ca++;
        endif;
        if($row['costo'] ):
            $Co++;
        endif;
    }

    
    mysqli_close($conn);
}

function insertafrecuenciaexo(){
   include ("config/connection.php");
    $sql = "SELECT * FROM estilosexopromediorecinto";

    $m = 3;
    $M = 0;
    $F = 0;
    $estilo = 0;
    $recinto = 0;
    $promedio = 0;

    while ($row = mysqli_fetch_array( $sql )) {
        if($row['sexo'] == "M"): 
            $M++; 
        endif;
        if($row['sexo'] == "F"): 
            $F++;
        endif;
        $estilo = (array_unique[$row['estilo']]);
        $recinto = (array_unique[$row['recinto']]);
        $promedio = (array_unique[$row['promedio']]);
    }

    $conn = new mysqli($host,$user,$pass,$bd);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";

    $sql = "INSERT INTO frecuencia_sexo (m,M,F,
                        estilo,recinto,promedio)
            VALUES (m,paraiso,turrialba,
                    estilo,recinto,promedio)";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);

}


function insertaProbabilidadSexo(){
   include ("config/connection.php");

    $sql = "SELECT * FROM estilosexopromediorecinto";

    $frecuencia_sexo = "SELECT * FROM frecuencia_sexo";

    $conn = new mysqli($host,$user,$pass,$bd);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";

    while ($row = mysqli_fetch_array( $frecuencia_sexo )) {
        $mS = $row['m'];
        $M = $row['M'];
        $nF = $row['nF'];
        $estilo = $row['estilo'];
        $recinto = $row['estilo'];
        $promedio = $row['promedio'];
    }

    $sexo = "";
    $probabilidad = 0;
    $valor = "";


    while ($row = mysqli_fetch_array( $frecuencia_recinto )) {
        if($row['recinto'] == "Paraiso" && $row['sexo'] == "F"):
            $PF++;
        endif;
        if($row['recinto'] == "Turrialba" && $row['sexo'] == "M"):
            $TM++;
        endif;
        if($row['recinto'] == "Paraiso" && $row['sexo'] == "F"):
            $PM++;
        endif;
        if($row['recinto'] == "Turrialba" && $row['sexo'] == "M"):
            $TF++;
        endif;

        if($row['recinto'] == "Paraiso" && $row['estilo'] == "ACOMODADOR"):
            $acomodador++;
        endif;
        if($row['recinto'] == "Turrialba" && $row['estilo'] == "ACOMODADOR"):
            $TAcomodador++;
        endif;

        if($row['recinto'] == "Paraiso" && $row['estilo'] == "ASIMILADOR"):
            $PAsimilador++;
        endif;
        if($row['recinto'] == "Turrialba" && $row['estilo'] == "ASIMILADOR"):
            $TAsimilador++;
        endif;

        if($row['recinto'] == "Paraiso" && $row['estilo'] == "CONVERGENTE"):
            $PConvergente++;
        endif;
        if($row['recinto'] == "Turrialba" && $row['estilo'] == "CONVERGENTE"):
            $TConvergente++;
        endif;

        if($row['recinto'] == "Paraiso" && $row['estilo'] == "DIVERGENTE"):
            $PDivergente++;
        endif;
        if($row['recinto'] == "Turrialba" && $row['estilo'] == "DIVERGENTE"):
            $TDivergente++;
        endif;
    }

    

    mysqli_close($conn);
}


function insertaProbabilidadPromedio(){
   include ("config/connection.php");

    $sql = "SELECT * FROM estilosexopromediorecinto";

    $sql1 = "SELECT * FROM frecuencia_recinto";
    $sql2 = "SELECT * FROM frecuencia_sexo";
    $sql3 = "SELECT * FROM frecuencia_estilo";

    $promedio = 0;
    $probabilidad = 0;
    $valor = "";
    $conn = new mysqli($host,$user,$pass,$bd);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";

    while ($row = mysqli_fetch_array( $sql1 )) {
        $mR = $row['m'];
        $paraiso = $row['paraiso'];
        $turrialba = $row['turrialba'];
        $sexo1 = $row['sexo'];
        $estilo1 = $row['estilo'];
        $promedio1 = $row['promedio'];
    }

    while ($row = mysqli_fetch_array( $sql2 )) {
        $mS = $row['m'];
        $M = $row['M'];
        $F = $row['F'];
        $estilo2 = $row['estilo'];
        $recinto1 = $row['estilo'];
        $promedio2 = $row['promedio'];
    }

    while ($row = mysqli_fetch_array( $sql3 )) {
        $m = $row['m'];
        $acomodador = $row['acomodador'];
        $asimilador = $row['asimilador'];
        $convergente = $row['convergente'];
        $divergente = $row['divergente'];
        $sexo2 = $row['sexo'];
        $recinto2 = $row['recinto'];
        $promedio3 = $row['promedio'];
    }

    $P = 0;
    $T = 0;
    $M = 0;
    $F = 0;
    $Acomodador = 0;
    $Asimilador = 0;
    $Convergente = 0;
    $Divergente = 0;

   
    mysqli_close($conn);
}

?>