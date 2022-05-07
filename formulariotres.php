<?php include("template/cabecera.php")?>


<big><big><br>
Adivinar Género</big></big>
<form name="estilo" autocomplete="on">
  <table style="text-align: left; width: 100%;" cellspacing="100" cellpadding="10" border="1">
    <tbody>
      <tr>
       
        <td style="vertical-align: top; width: 25%;">
        Escoja su recinto:<select name="recinto" value="Recinto" autocomplete="on">
        <option value="p">Paraíso</option>
        <option value="t">Turrialba</option>
        </select><br>
        </td>

       
</tr>
<tr>
        <td style="vertical-align: top; width: 25%;">
        Estilo de aprendizaje:<select name="aprendizaje" value="Aprendizaje" autocomplete="on">
        <option value="d">Divergente</option>
        <option value="c">Convergente</option>
        <option value="a">Asimilador</option>
        <option value="ac">Acomodador</option>
        </select><br>
        </td>

       


        <td style="vertical-align: top; width: 25%;">
        <label class="col-form-label">Último promedio para matrícula</label>
      <div class="col-sm-10">
        <input type="text" maxlength="2" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57" required>
      </div>
        </td>
       

      </tr>

    </tbody>
  </table>
  <br>
  <font color="#ff0000"><font size="4"> ------------------</font></font><input value="CALCULAR" onclick="calcular()" type="button" autocomplete="on">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</form>


</form>




<?php include("template/piepagina.php")?>