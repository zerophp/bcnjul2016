<?php


/**
 * TBC
 * 
 * @param unknown $link
 * @param unknown $iduser
 */
function deleteUserDatabase($link, $iduser)
{
    $sql = "DELETE FROM users WHERE iduser = \"".$iduser."\"";
    return mysqli_query($link, $sql); 
}