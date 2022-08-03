<?php include("template/cabecera.php")?>

<big><big><br>
Adivinar el Recinto</big></big>
<form name="estilo" autocomplete="on" method="POST" enctype="multipart/form-data">
  <table style="text-align: left; width: 100%;" cellspacing="100" cellpadding="10" border="1">
    <tbody>
      <tr>

        <td style="vertical-align: top; width: 25%;">
        Sexo:<select name="sexo2" value="sexo" autocomplete="on">
        <option value="F">Femenino</option>
        <option value="M">Masculino</option>
        </select><br>
        </td>
</tr>
<tr>
        <td style="vertical-align: top; width: 25%;">
        Estilo de aprendizaje:<select name="aprendizaje2" value="Aprendizaje" autocomplete="on">
        <option value="DIVERGENTE">Divergente</option>
        <option value="CONVERGENTE">Convergente</option>
        <option value="ASIMILADOR">Asimilador</option>
        <option value="ACOMODADOR">Acomodador</option>
        </select><br>
        </td>

       


        <td style="vertical-align: top; width: 25%;">
        <label class="col-form-label">Último promedio para matrícula</label>
      <div class="col-sm-10">
        <input min="1" max="10" maxlength="4" type="number" name="promedio2" value=1  required>
      </div>
        </td>
       

      </tr>

    </tbody>
  </table>
  <br>
  <?php
    include("algoritmos.php");
    $estilo=(isset($_POST['aprendizaje2']))?$_POST['aprendizaje2']:"";
    $promedio=(isset($_POST['promedio2']))?$_POST['promedio2']:"";
    $sexo=(isset($_POST['sexo2']))?$_POST['sexo2']:"";
    $result = metodo_bayesRecinto($estilo,$promedio,$sexo);
  ?>
  <font color="#ff0000"><font size="4"> ------------------</font></font><button type="submit" name="accion" value="Calcular" >Calcular</button>
  <input type="text" name="result" value="<?php echo "$result"?>">
  
</form>



<?php include("template/piepagina.php")?>