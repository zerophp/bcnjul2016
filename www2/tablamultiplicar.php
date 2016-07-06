<table border=1>
<tr>
	<td>1</td>
	<td>2</td>
	<td>3</td>
</tr>
<tr>
	<td>2</td>
	<td>3</td>
	<td>4</td>
</tr>
</table>

<?php

$columnas=5;
$filas=4;


echo "<table border=1>";
    for($i=0; $i<=$filas; $i++)
    {         
        echo "<tr>";
        for ($b=0;$b<=$columnas;$b++)
        {
            if($i==0)
            {
                echo "<td>";
                echo $b;
                echo "</td>";
            }
            else if($b==0)
            {
                echo "<td>";
                echo $i;
                echo "</td>";
            }
            else 
            {
                echo "<td>";
                echo $i*$b;
                echo "</td>";
            }
            
        }
        echo "</tr>";
    }
echo "</table>";







