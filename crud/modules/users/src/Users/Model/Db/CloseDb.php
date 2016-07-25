<?php

function CloseDb($link)
{
    mysqli_close($link);
    return;
}