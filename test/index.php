<?php

require_once __DIR__ . '/functions.php';

$vector_a = ['0001', '0010', '0011', '0100', '0101', '0110', '0111', '1000', '1001', '1010', '1011', '1100', '1101', '1110', '1111'];
$vector_b = ['001', '010', '011', '100', '101', '110', '111'];
$vector_b3 = ['01', '10', '11'];

$in = ['0000', '0001', '0010', '0011', '0100', '0101', '0110', '0111', '1000', '1001', '1010', '1011', '1100', '1101', '1110', '1111'];

$out1 = ['010', '011', '011', '010', '101', '100', '100', '101', '111', '110', '111', '110', '000', '001', '000', '001'];
$out2 = ['001', '001', '111', '000', '110', '110', '000', '111', '011', '011', '010', '101', '100', '100', '101', '010'];

$out3 = ['11', '11', '11', '11', '01', '01', '01', '01', '00', '00', '00', '00', '10', '10', '10', '10'];
/** --------------------------------------S1--------------------------------------- */
$verochka = [];
for ($a = 0; $a < 15; $a++)
{
    $temp = [];
    for ($b = 0; $b < 7; $b++)
    {
        $count = 0;
        for ($j = 0; $j < 16; $j++)
        {
            $left_part = 0;
            for ($i = 0; $i < 4; $i++)
            {
                $left_part = ($left_part xor ($in[$j][$i]*$vector_a[$a][$i]));
            }
            $right_part = 0;
            for ($i = 0; $i < 3; $i++)
            {
                $right_part = ($right_part xor $out1[$j][$i]*$vector_b[$b][$i]);
            }
            if(($right_part xor  $left_part) == 0)
                $count++;
        }
        $temp[$vector_b[$b]] = $count / 16;
    }
    $verochka[$vector_a[$a]] = $temp;
}

var_dump($verochka);
/** --------------------------------------S2--------------------------------------- */
$verochka = [];
for ($a = 0; $a < 15; $a++)
{
    $temp = [];
    for ($b = 0; $b < 7; $b++)
    {
        $count = 0;
        for ($j = 0; $j < 16; $j++)
        {
            $left_part = 0;
            for ($i = 0; $i < 4; $i++)
            {
                $left_part = ($left_part xor ($in[$j][$i]*$vector_a[$a][$i]));
            }
            $right_part = 0;
            for ($i = 0; $i < 3; $i++)
            {
                $right_part = ($right_part xor $out2[$j][$i]*$vector_b[$b][$i]);
            }
            if(($right_part xor  $left_part) == 0)
                $count++;
        }
        $temp[$vector_b[$b]] = $count / 16;
    }
    $verochka[$vector_a[$a]] = $temp;
}
echo 'S2';
var_dump($verochka);
/** --------------------------------------S3--------------------------------------- */
$verochka = [];
for ($a = 0; $a < 15; $a++)
{
    $temp = [];
    for ($b = 0; $b < 3; $b++)
    {
        $count = 0;
        for ($j = 0; $j < 16; $j++)
        {
            $left_part = 0;
            for ($i = 0; $i < 4; $i++)
            {
                $left_part = ($left_part xor ($in[$j][$i]*$vector_a[$a][$i]));
            }
            $right_part = 0;
            for ($i = 0; $i < 2; $i++)
            {
                $right_part = ($right_part xor $out3[$j][$i]*$vector_b3[$b][$i]);
            }
            if(($right_part xor  $left_part) == 0)
                $count++;
        }
        $temp[$vector_b3[$b]] = $count / 16;
    }
    $verochka[$vector_a[$a]] = $temp;
}
echo 'S3';
var_dump($verochka);

