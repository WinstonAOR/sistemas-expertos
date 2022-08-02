<?php
include ("config/connection.php");
        //Probabilidades de estilo_recinto
        $probabiEstiloRecinto = "SELECT * FROM probabilidad_estilo_recinto";
        $conexionEstiloRecinto = mysqli_query($connection, $probabiEstiloRecinto);

        //Frecuencias de estilo_recinto
        $frecuEstiloRecinto = "SELECT * FROM frecuencia_estilo_recinto";
        $conexionFrecuenciaEstiloRecinto = mysqli_query($connection, $frecuEstiloRecinto);

         //Probabilidad estilo_sexo
         $probabilidadEstiloSexo = "SELECT * FROM  probabilidad_estilo_sexo";
         $conexionEstilo = mysqli_query($connection, $probabilidadEstiloSexo);
     
         //Probabilidades promedio
         $probabilidadPromedio = "SELECT * FROM  probabilidad_promedio";
         $conexionPromedio = mysqli_query($connection, $probabilidadPromedio);
     
         //Probabilidades sexo
         $probabilidadSexo = "SELECT * FROM  probabilidad_sexos";
         $conexionSexo = mysqli_query($connection, $probabilidadSexo);
     
         //Frecuencias de recinto
         $frecuenciasRecinto = "SELECT * FROM frecuencia_recinto";
         $conexionFrecuenciaRecinto = mysqli_query($connection, $frecuenciasRecinto);
      
        //Probabilidades recinto
        $probabilidadRecinto = "SELECT * FROM  probabilidad_recintos";
        $conexionRecinto = mysqli_query($connection, $probabilidadRecinto);
      
        //Frecuencias estilo_sexo
        $frecuenciaEstiloSexo = "SELECT * FROM frecuencia_estilo_sexo";
        $conexionFrecuenciaEsiloSexo = mysqli_query($connection, $frecuenciaEstiloSexo);

        //Frecuencias sexo
        $frecuenciasSexo = "SELECT * FROM frecuencia_sexo";
        $conexionFrecuenciaSexo = mysqli_query($connection, $frecuenciasSexo);


        //Probabilidades profesores
        $probabilidadProfesores = "SELECT * FROM probabilidad_profesores";
        $conexionProfesores = mysqli_query( $connection, $probabilidadProfesores );
        
        //Frecuencias profesores
        $frecuenciaProfesores = "SELECT * FROM frecuencia_profesores";
        $conexionFrecuenciaProfesores = mysqli_query($connection, $frecuenciaProfesores);

        //Probabilidad redes
        $probabilidadRedes = "SELECT * FROM  probabilidad_redes";
        $conexionRedes = mysqli_query($connection, $probabilidadRedes);
      
        //Frecuencias redes
        $frecuenciaRedes = "SELECT * FROM frecuencia_redes";
        $conexionFrecuenciaRedes = mysqli_query($connection, $frecuenciaRedes);
?>