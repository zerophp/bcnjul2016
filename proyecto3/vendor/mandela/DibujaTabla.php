<?php

/**
 * Read and array and return a html table
 * 
 * @param array $array
 * @return string 
 */
function DibujaTabla($array)
{
    $html = '<table border=1>';  
    for($i=0; $i<sizeof($array)-1;$i++)
    {
        $html .= "<tr>";
        for($j=0; $j<sizeof($array[0]); $j++)
        {
            $html .= "<td>".$array[$i][$j]."</td>";
        }
        $html .= "<td><a href=\"?action=Update&id=".$i."\">Update</a>
                      <a href=\"?action=Delete&id=".$i."\">Delete</a>
                    </td>";
        $html .= "</tr>";
    }
    $html .= '</table>';
    return $html;
}

