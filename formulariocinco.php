<?php include("template/cabecera.php")?>


<big><big><br>
Determinar el tipo de profesor</big></big>
<form name="estilo" autocomplete="on">
  <table style="text-align: left; width: 100%;" cellspacing="100" cellpadding="10" border="1">
    <tbody>
      <tr>
       
        <td style="vertical-align: top; width: 25%;">
        Edad:<select name="edad" value="Edad" autocomplete="on">
        <option value="mI30">Mayor o igual a 30</option>
        <option value="30a55">Mayor a 30 e inferior o igual a 55</option>
        <option value="m55">Mayor a 55</option>
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
        Sexo:<select name="sexo" value="Sexo" autocomplete="on">
        <option value="f">Femenino</option>
        <option value="m">Masculino</option>
        <option value="na">No disponible</option>
        </select><br>
        </td>  

        <td style="vertical-align: top; width: 25%;">
        Habilidad o experiencia en la enseñanza de la materia:<select name="aprendizaje" value="Aprendizaje" autocomplete="on">
        <option value="b">Principiante</option>
        <option value="i">Intermedio</option>
        <option value="a">Avanzado</option>
        </select><br>
        </td>  

        <td style="vertical-align: top; width: 25%;">
        Número de veces que ha impartido el curso:<select name="aprendizaje" value="Aprendizaje" autocomplete="on">
        <option value="1">Nunca</option>
        <option value="2">1 a 5 veces</option>
        <option value="3">Más de 5 veces</option>
        </select><br>
        </td> 

        <td style="vertical-align: top; width: 25%;">
        Conocimientos anteriores o areas de experiencia:<select name="aprendizaje" value="Aprendizaje" autocomplete="on">
        <option value="dm">Toma de decisiones</option>
        <option value="nd">Diseño de red</option>
        <option value="o">Otros</option>
        </select><br>
        </td> 

        <td style="vertical-align: top; width: 25%;">
        Habilidades usando computadoras:<select name="aprendizaje" value="Aprendizaje" autocomplete="on">
        <option value="l">Bajas</option>
        <option value="a">Promedio</option>
        <option value="h">Altas</option>
        </select><br>
        </td>

        <td style="vertical-align: top; width: 25%;">
        Experiencia usando tecnología web para enseñar:<select name="aprendizaje" value="Aprendizaje" autocomplete="on">
        <option value="n">Nunca</option>
        <option value="s">A veces</option>
        <option value="o">Regularmente</option>
        </select><br>
        </td>

        <td style="vertical-align: top; width: 25%;">
        Experiencia usando sitios web:<select name="aprendizaje" value="Aprendizaje" autocomplete="on">
        <option value="n">Nunca</option>
        <option value="s">A veces</option>
        <option value="o">Regularmente</option>
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