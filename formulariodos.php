<?php include("template/cabecera.php")?>

<?php


function calc(){
  //echo("hola");
  $sexo2=(isset($_POST['sexo2']))?$_POST['sexo2']:"";
  $aprendizaje2=(isset($_POST['aprendizaje2']))?$_POST['aprendizaje2']:"";
  $promedio2=(isset($_POST['promedio2']))?$_POST['promedio2']:"";
  include("config/connection.php");
//echo($user);
  $sentencia = $connection->prepare("SELECT * FROM estilo_sexo_promedio_recinto");
  $sentencia->execute();

$lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);


foreach($lista as $datos2){
  echo $datos2['sexo'];
}

  //$listaestilo=$sentencia->fetchAll(PDO::FETCH_ASSOC);
  //echo($listaprofes);


// while($datos2 = mysqli_fecth_array($sentencia) ){
//   $select_datos[$row['id']] = array('ca' => $row['ca'], 'ec' => $row['ec'], 'ea' => $row['ea'], 'or' => $row['or']);

// }
// print_r($select_datos);


  // foreach($prueba as $key => $datos2){
  //   //echo();
  //   $sexo=$datos2["sexo"];
  //   echo$sexo;
  // }

}

if(array_key_exists('calculo2', $_POST)) {
  calc();
}


// print_r($_POST);

// echo($sexo2);
// echo($aprendizaje2);
// echo($promedio2);



?>

<big><big><br>
Adivinar el Recinto</big></big>
<form name="estilo" autocomplete="on" method="POST" enctype="multipart/form-data">
  <table style="text-align: left; width: 100%;" cellspacing="100" cellpadding="10" border="1">
    <tbody>
      <tr>

        <td style="vertical-align: top; width: 25%;">
        Sexo:<select name="sexo2" value="sexo" autocomplete="on">
        <option value="f">Femenino</option>
        <option value="m">Masculino</option>
        </select><br>
        </td>
</tr>
<tr>
        <td style="vertical-align: top; width: 25%;">
        Estilo de aprendizaje:<select name="aprendizaje2" value="Aprendizaje" autocomplete="on">
        <option value="d">Divergente</option>
        <option value="c">Convergente</option>
        <option value="a">Asimilador</option>
        <option value="ac">Acomodador</option>
        </select><br>
        </td>

       


        <td style="vertical-align: top; width: 25%;">
        <label class="col-form-label">Último promedio para matrícula</label>
      <div class="col-sm-10">
        <input type="text" name="promedio2" maxlength="4" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=46 && event.charCode<=57" required>
      </div>
        </td>
       

      </tr>

    </tbody>
  </table>
  <br>
  <button type="submit" name="calculo2" class="btn btn-success">Calcular</button>
  <font color="#ff0000"><font size="4"> ------------------</font></font><input value="CALCULAR" onclick="calc()" type="button" autocomplete="on">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</form>


<?php include("template/piepagina.php")?>