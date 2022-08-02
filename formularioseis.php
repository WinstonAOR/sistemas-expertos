<?php include("template/cabecera.php")?>




<big><big><br>
Determinar la clasificacion de la red</big></big>
<form name="estilo" autocomplete="on">
  <table style="text-align: left; width: 100%;" cellspacing="100" cellpadding="10" border="1">
    <tbody>
      <tr>
       
        <td style="vertical-align: top; width: 25%;">
        La confiabilidad de la red:
        <select name="red" value="red" autocomplete="on">
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select><br>
        </td>
        <td style="vertical-align: top; width: 25%;">
        Número de links
        <select name="link" id="link">
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        </td>
        <td style="vertical-align: top; width: 25%;">
        Capacidad total de la red:
        <select name="capacidad" value="capacidad" autocomplete="on">
        <option value="Low">Baja</option>
        <option value="Medium">Media</option>
        <option value="High">Alta</option>
        </select><br>
        </td>
        <td style="vertical-align: top; width: 25%;">
        Costo de la red:
        <select name="costo" value="costo" autocomplete="on">
        <option value="Low">Bajo</option>
        <option value="Medium">Medio</option>
        <option value="High">Alto</option>
        </select><br>
        </td>
        
      </tr>
    </tbody>
  </table>
  <br>
  <?php 

    include "algoritmos.php";

    $red=(isset($_POST['red']))?$_POST['red']:"";
    $links=(isset($_POST['link']))?$_POST['link']:"";
    $capacidad=(isset($_POST['capacidad']))?$_POST['capacidad']:"";
    $costo=(isset($_POST['costo']))?$_POST['costo']:"";

    $result = metodo_naive_bayes($red,$links,$capacidad,$costo);


?>
  <font color="#ff0000"><font size="4"> ------------------</font></font><input value="CALCULAR" type="submit" autocomplete="on">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="result" value="<?php echo "$result"?>">
</form>


</form>




<?php include("template/piepagina.php")?>