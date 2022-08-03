<?php include("template/cabecera.php")?>


<big><big><br>
Adivinar Género</big></big>
<form name="estilo" autocomplete="on">
  <table style="text-align: left; width: 100%;" cellspacing="100" cellpadding="10" border="1">
    <tbody>
      <tr>
       
        <td style="vertical-align: top; width: 25%;">
        Escoja su recinto:<select name="recinto" value="Recinto" autocomplete="on">
        <option value="Paraiso">Paraíso</option>
        <option value="Turrialba">Turrialba</option>
        </select><br>
        </td>

       
</tr>
<tr>
        <td style="vertical-align: top; width: 25%;">
        Estilo de aprendizaje:<select name="aprendizaje" value="Aprendizaje" autocomplete="on">
        <option value="DIVERGENTE">Divergente</option>
        <option value="CONVERGENTE">Convergente</option>
        <option value="ASIMILADOR">Asimilador</option>
        <option value="ACOMODADOR">Acomodador</option>
        </select><br>
        </td>

       


        <td style="vertical-align: top; width: 25%;">
        <label class="col-form-label">Último promedio para matrícula</label>
      <div class="col-sm-10">
      <input min="1" max="10" maxlength="4" type="number" step="any" name="promedio2" value=1  required>
      </div>
        </td>
       

      </tr>

    </tbody>
  </table>
  <br>

  <?php 

include("algoritmos.php");
$estilo=(isset($_POST['aprendizaje']))?$_POST['estilo']:"";
$promedio=(isset($_POST['promedio2']))?$_POST['promedio']:"";
$recinto=(isset($_POST['recinto']))?$_POST['recinto']:"";

$result = metodo_bayesSexo($estilo,$promedio,$recinto);

?>

  <font color="#ff0000"><font size="4"> ------------------</font></font><input value="CALCULAR" type="submit" autocomplete="on">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="result" value="<?php echo "$result"?>">
</form>



<?php include("template/piepagina.php")?>