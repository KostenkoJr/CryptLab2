<?php

function permutation($num, $p)
{
    $result = [];
    for ($i = 0; $i < strlen($p); $i++)
    {
        $result[$i] = $num[$p[$i] - 1];
    }
    return $result;
}

