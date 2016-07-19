<?php

/**
 * Read and array and return a html table
 * 
 * @param array $array
 * @return string 
 */
function DibujaTabla($array)
{
    $html = "<a href=\"?controller=crud&action=insert\">Insert</a>";
    $html.= '<table border=1>';  
    for($i=0; $i<sizeof($array)-1;$i++)
    {
        $html .= "<tr>";
        for($j=0; $j<sizeof($array[0]); $j++)
        {
            if(isset($array[$i][$j]))
                $html .= "<td>".$array[$i][$j]."</td>";
            else
                $html .= "<td></td>";
        }
        $html .= "<td><a href=\"?controller=crud&action=update&iduser=".$array[$i]['iduser']."\">Update</a>
                      <a href=\"?controller=crud&action=delete&iduser=".$array[$i]['iduser']."\">Delete</a>
                    </td>";
        $html .= "</tr>";
    }
    $html .= '</table>';
    return $html;
}

