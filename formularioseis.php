<?php include("template/cabecera.php")?>




<big><big><br>
Determinar la clasificacion de la red</big></big>
<form name="estilo" autocomplete="on">
  <table style="text-align: left; width: 100%;" cellspacing="100" cellpadding="10" border="1">
    <tbody>
      <tr>
       
        <td style="vertical-align: top; width: 25%;">
        La confiabilidad de la red:<select name="recinto" value="Recinto" autocomplete="on">
        <option value="re">Paraíso</option>
        <option value="t">Turrialba</option>
        </select><br>
        </td>

        <td style="vertical-align: top; width: 25%;">
        <label class="col-form-label">Último promedio para matrícula</label>
      <div class="col-sm-10">
        <input type="text" maxlength="2" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57" required>
      </div>
        </td>
</tr>
<tr>
      
       
<td style="vertical-align: top; width: 25%;">
        Sexo:<select name="aprendizaje" value="Aprendizaje" autocomplete="on">
        <option value="f">Femenino</option>
        <option value="m">Masculino</option>
        </select><br>
        </td>       

      </tr>

    </tbody>
  </table>
  <br>
  <font color="#ff0000"><font size="4"> ------------------</font></font><input value="CALCULAR" onclick="calcular()" type="button" autocomplete="on">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</form>


</form>




<?php include("template/piepagina.php")?>