<?php include("template/cabecera.php")?>


<big><big><br>
Determinar el tipo de profesor</big></big>
<form name="estilo" autocomplete="on" method="POST" enctype="multipart/form-data">
  <table
    style="text-align: left; width: 100%;"
    cellspacing="100"
    cellpadding="10"
    border="1">
    <tbody>
        <tr>

            <td style="vertical-align: top; width: 25%;">
                Edad:<select name="edad" value="Edad" autocomplete="on">
                    <option value="1">Mayor o igual a 30</option>
                    <option value="2">Mayor a 30 e inferior o igual a 55</option>
                    <option value="3">Mayor a 55</option>
                </select>
                <br></td>
                <td style="vertical-align: top; width: 25%;">
                    Sexo:<select name="sexo" value="Sexo" autocomplete="on">
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                        <option value="NA">No disponible</option>
                    </select>
                    <br></td>
                <td style="vertical-align: top; width: 25%;">
                    Habilidad o experiencia en la enseñanza de la materia:<select name="habilidad" value="habilidad" autocomplete="on">
                        <option value="B">Principiante</option>
                        <option value="I">Intermedio</option>
                        <option value="A">Avanzado</option>
                    </select>
                    <br></td>
                    <td style="vertical-align: top; width: 25%;">
                        Número de veces que ha impartido el curso:<select name="repeticiones" value="repeticiones" autocomplete="on">
                            <option value="1">Nunca</option>
                            <option value="2">1 a 5 veces</option>
                            <option value="3">Más de 5 veces</option>
                        </select>
                        <br></td>
                    </tr>

                    <tr>
              <td style="vertical-align: top; width: 25%;">
                  Conocimientos anteriores o areas de experiencia:<select name="conocimientos" value="conocimientos" autocomplete="on">
                      <option value="DM">Toma de decisiones</option>
                      <option value="ND">Diseño de red</option>
                      <option value="O">Otros</option>
                  </select>
                  <br></td>

              <td style="vertical-align: top; width: 25%;">
                  Habilidades usando computadoras:<select name="habilidades" value="habilidades" autocomplete="on">
                      <option value="L">Bajas</option>
                      <option value="A">Promedio</option>
                      <option value="H">Altas</option>
                  </select>
                  <br></td>

              <td style="vertical-align: top; width: 25%;">
                  Experiencia usando tecnología web para enseñar:<select name="experiencia" value="experiencia" autocomplete="on">
                      <option value="N">Nunca</option>
                      <option value="S">A veces</option>
                      <option value="O">Regularmente</option>
                  </select>
                  <br></td>

                  <td style="vertical-align: top; width: 25%;">
                      Experiencia usando sitios web:<select name="web" value="web" autocomplete="on">
                          <option value="N">Nunca</option>
                          <option value="S">A veces</option>
                          <option value="O">Regularmente</option>
                      </select>
                      <br></td>

            </tr>

    </tbody>
  </table>
  <br>
  <?php 

    include "algoritmos.php";
    $a=(isset($_POST['edad']))?$_POST['edad']:"";
    $b=(isset($_POST['sexo']))?$_POST['sexo']:"";
    $c=(isset($_POST['habilidad']))?$_POST['habilidad']:"";
    $d=(isset($_POST['repeticiones']))?$_POST['repeticiones']:"";
    $e=(isset($_POST['conocimientos']))?$_POST['conocimientos']:"";
    $f=(isset($_POST['habilidades']))?$_POST['habilidades']:"";
    $g=(isset($_POST['experiencia']))?$_POST['experiencia']:"";
    $h=(isset($_POST['web']))?$_POST['web']:"";
    $result = metodo_bayesProfesores($a,$b,$c,$d,$e,$f,$g,$h);

  ?>
  <font color="#ff0000"><font size="4"> ------------------</font></font><input value="CALCULAR" type="submit" autocomplete="on">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="result" value="<?php echo "$result"?>">
</form>


</form>




<?php include("template/piepagina.php")?>