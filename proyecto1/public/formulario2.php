
<form name="formulario" 
      action="procesar.php" 
      method="post" 
      enctype="multipart/form-data">
<ul>
    <li>
    	Id: <input type="hidden" name="id"/>
    </li>
    <li>
    	Nombre: <input type="text" name="name"/>
    </li>
    <li>
    	Email: <input type="text" name="email" />
    </li>
    <li>
    	Password: <input type="password" name="password" />
    </li>
    <li>
    	Descripción:<textarea name="description"></textarea>
    </li>
    <li>
        Transporte: 
        Bici <input type="checkbox" name="transport[]" value="bici" checked/>
        Coche <input type="checkbox" name="transport[]" value="coche"/>
        Moto <input type="checkbox" name="transport[]" value="moto"/>
    </li>
    <li>
        Sexo: 
        Mujer <input type="radio" name="gender" value="woman"/>
        Hombre <input type="radio" name="gender" value="man"/>
        Otros <input type="radio" name="gender" value="other"/>
    </li>
    <li>
        Ciudad: 
        <select name="city">
            <option value="bcn">Barcelona</option>
            <option value="grn">Girona</option>
            <option value="lld">Lleida</option>
        </select>
    </li>
    <li>
    	Idiomas: 
        <select name="languages[]" multiple>
            <option value="catala" selected>Català</option>
            <option value="castellano">Castella</option>
            <option value="mandarin">Mandarín</option>
        </select>
    </li>
    <li>
    	Foto:
    	<input type="file" name="foto"/>
    </li>
    <li>
    	<input type="submit" name="enviar" value="Enviar"/>
    </li>
</ul>

</form>



<hr/>
<hr/>
<?php 
require "formulario/createform.php";
require "user.php";

$html = createform($register,'POST','procesar.php','registro');
echo $html;

?>




