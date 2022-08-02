<?php include("template/cabecera.php")?>


<big><big><br>
Adivinar estilo de aprendizaje de un estudiante</big></big>
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

        <td style="vertical-align: top; width: 25%;">
        <label class="col-form-label">Último promedio para matrícula</label>
      <div class="col-sm-10">
      <input min="1" max="10" maxlength="4" type="number" name="promedio2" value=1  required>
      </div>
        </td>
</tr>
<tr>
      
       
<td style="vertical-align: top; width: 25%;">
        Sexo:<select name="sexo" value="sexo" autocomplete="on">
        <option value="F">Femenino</option>
        <option value="M">Masculino</option>
        </select><br>
        </td>       

      </tr>

    </tbody>
  </table>
  <br>
  <?php 

include("algoritmos.php");

$recinto=(isset($_POST['recinto']))?$_POST['recinto']:"";
$promedio=(isset($_POST['promedio2']))?$_POST['promedio2']:"";
$sexo=(isset($_POST['sexo']))?$_POST['sexo']:"";

$result =  metodo_bayesSexoRecintoPromedio($recinto,$promedio,$sexo);

?>
  <font color="#ff0000"><font size="4"> ------------------</font></font><input value="CALCULAR" type="submit" autocomplete="on">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="result" value="<?php echo "$result"?>">
</form>


</form>




<?php include("template/piepagina.php")?>