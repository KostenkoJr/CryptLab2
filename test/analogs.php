<?php
require_once  __DIR__ . '/functions.php';

$analogs_s1 = [
    '0001' =>
    [
        '011' => '0.75', '101' => '0.75'
    ],
    '0011' =>
    [
        '011' => '0.25', '101' => '0.75'
    ],
    '0100' =>
    [
        '010' => '0'
    ],
    '0101' =>
    [
        '001' => '0.25', '111' => '0.25'
    ],
    '0111' =>
    [
        '001' => '0.75', '111' => '0.25'
    ],
    '1000' =>
    [
        '110' => '0'
    ],
    '1001' =>
    [
        '011' => '0.25', '101' => '0.25'
    ],
    '1011' =>
    [
        '011' => '0.25', '101' => '0.75'
    ],
    '1100' =>
    [
        '100' => '1'
    ],
    '1101' =>
    [
        '001' => '0.75', '111' => '0.75'
    ],
    '1111' =>
    [
        '001' => '0.75', '111' => '0.25'
    ]
];
$analogs_s2 = [
    '0010' =>
        [
            '101' => '0'
        ],
    '0100' =>
        [
            '001' => '0.25', '100' => '0.75'
        ],
    '0101' =>
        [
            '010' => '0.25', '111' => '0.25'
        ],
    '0110' =>
        [
            '001' => '0.25', '100' => '0.75'
        ],
    '0111' =>
        [
            '010' => '0.75', '111' => '0.75'
        ],
    '1000' =>
        [
            '110' => '1'
        ],
    '1010' =>
        [
            '011' => '0'
        ],
    '1100' =>
        [
            '010' => '0.75', '111' => '0.25'
        ],
    '1101' =>
        [
            '001' => '0.25', '100' => '0.25'
        ],
    '1110' =>
        [
            '010' => '0.75', '111' => '0.25'
        ],
    '1111' =>
        [
            '001' => '0.75', '100' => '0.75'
        ]
];
$analogs_s3 = [
    '0100' =>
        [
            '11' => '1'
        ],
    '1000' =>
        [
            '01' => '0'
        ],
    '1100' =>
        [
            '10' => '0'
        ]
];
$arr_X = permutation(['X9', 'X10', 'X11', 'X12', 'X13', 'X14', 'X15', 'X16'], '528761438614');
$arr_K = ['K1', 'K2',  'K3',  'K4', 'K5', 'K6', 'K7', 'K8', 'K9', 'K10', 'K11', 'K12'];

$arrX_S1 = array_slice($arr_X, 0, 4);
$arrK_S1 = array_slice($arr_K, 0, 4);
$arrC_S1 = ['X7 + B7', 'X4 + B4', 'X3 + B3'];

$arrK_S2 = array_slice($arr_K, 4, 4);
$arrX_S2 = array_slice($arr_X, 4, 4);
$arrC_S2 = ['X6 + B6', 'X5 + B5', 'X8 + B8'];


$arrK_S3 = array_slice($arr_K, 8, 4);
$arrX_S3 = array_slice($arr_X, 8, 4);
$arrC_S3 = ['X2 + B2', 'X1 + B1'];


echo '<h1>' . '1 раунд S1 блок' . '</h1>';

var_dump($arrX_S1);
var_dump($arrK_S1);
var_dump($arrC_S1);

$arr_analogs_information1 = [];
$arr_analogs1_keys1 = [];
$arr_analogs_probability1 = [];
$arr_analogs_S1 = [];
foreach ($analogs_s1 as $alfa => $item)
{
    $alfa = (string)$alfa;
    $analog = '';
    $keys = '';
    for ($i = 0; $i < 4; $i++)
    {
        if ($alfa[$i] == 1)
        {
            $analog = $analog . $arrX_S1[$i] . ' + ';
            $keys = $keys . $arrK_S1[$i] . ' + ';
        }
    }
    foreach ($item as $beta => $probability)
    {
        $beta = (string)$beta;
        $analog_result = $analog;
        for ($i = 0; $i < 3; $i++)
        {
            if ((string)$beta[$i] == 1)
            {
                $analog_result = $analog_result . $arrC_S1[$i] . ' + ';
            }
        }
        $arr_analogs1_keys1[] = substr($keys, 0, -3);
        $arr_analogs_information1[] = 'a = ' . $alfa . ' b = ' . $beta . ' p = ' . $probability;
        $arr_analogs_probability1[] = (float)$probability;
        $arr_analogs_S1[] = substr($analog_result, 0, -3);
    }
}
var_dump($arr_analogs_information1);
var_dump($arr_analogs_probability1);
var_dump($arr_analogs_S1);
var_dump($arr_analogs1_keys1);


//foreach ($analogs_s1 as $alfa => $item)
//{
//    foreach ($item as $beta => $probability)
//    {
//        echo 'a = ' . $alfa . ' b = ' . $beta . ' p = ' . $probability;
//        echo '<br>';
//    }
//}
echo '----------------------------------------------------------------------' . '<br>';

echo '<h1>' . '1 раунд S2 блок' . '</h1>';
var_dump($arrX_S2);
var_dump($arrK_S2);
var_dump($arrC_S2);
$arr_analogs1_keys2 = [];
$arr_analogs_information2 = [];
$arr_analogs_probability2 = [];
$arr_analogs_S2 = [];
foreach ($analogs_s2 as $alfa => $item)
{
    $alfa = (string)$alfa;
    $analog = '';
    $keys = '';
    for ($i = 0; $i < 4; $i++)
    {
        if ($alfa[$i] == 1)
        {
            $analog = $analog . $arrX_S2[$i] . ' + ';
            $keys = $keys . $arrK_S2[$i] . ' + ';
        }
    }
    foreach ($item as $beta => $probability)
    {
        $beta = (string)$beta;
        $analog_result = $analog;
        for ($i = 0; $i < 3; $i++)
        {
            if ((string)$beta[$i] == 1)
            {
                $analog_result = $analog_result . $arrC_S2[$i] . ' + ';
            }
        }
        $arr_analogs1_keys2[] = substr($keys, 0, -3);
        $arr_analogs_probability2[] = (float)$probability;
        $arr_analogs_information2[] = 'a = ' . $alfa . ' b = ' . $beta . ' p = ' . $probability;
        $arr_analogs_S2[] =substr($analog_result, 0, -3);
    }
}
var_dump($arr_analogs_information2);
var_dump($arr_analogs_probability2);
var_dump($arr_analogs_S2);
var_dump($arr_analogs1_keys2);


//foreach ($analogs_s2 as $alfa => $item)
//{
//    foreach ($item as $beta => $probability)
//    {
//        echo 'a = ' . $alfa . ' b = ' . $beta . ' p = ' . $probability;
//        echo '<br>';
//    }
//}

echo '----------------------------------------------------------------------' . '<br>';
echo '<h1>' . '1 раунд S3 блок' . '</h1>';
var_dump($arrX_S3);
var_dump($arrK_S3);
var_dump($arrC_S3);
$arr_analogs1_keys3 = [];
$arr_analogs_information3 = [];
$arr_analogs_probability3 = [];
$arr_analogs_S3 = [];
foreach ($analogs_s3 as $alfa => $item)
{
    $alfa = (string)$alfa;
    $analog = '';
    $keys = '';
    for ($i = 0; $i < 4; $i++)
    {
        if ($alfa[$i] == 1)
        {
            $analog = $analog . $arrX_S3[$i] . ' + ';
            $keys = $keys . $arrK_S3[$i] . ' + ';
        }
    }
    foreach ($item as $beta => $probability)
    {
        $beta = (string)$beta;
        $analog_result = $analog;
        for ($i = 0; $i < 3; $i++)
        {
            if ((string)$beta[$i] == 1)
            {
                $analog_result = $analog_result . $arrC_S3[$i] . ' + ';
            }
        }
        $arr_analogs1_keys3[] = substr($keys, 0, -3);
        $arr_analogs_probability3[] = (float)$probability;
        $arr_analogs_information3[] = 'a = ' . $alfa . ' b = ' . $beta . ' p = ' . $probability;
        $arr_analogs_S3[] = substr($analog_result, 0, -3);
    }
}
var_dump($arr_analogs_information3);
var_dump($arr_analogs_probability3);
var_dump($arr_analogs_S3);
var_dump($arr_analogs1_keys3);

//foreach ($analogs_s3 as $alfa => $item)
//{
//    foreach ($item as $beta => $probability)
//    {
//        echo 'a = ' . $alfa . ' b = ' . $beta . ' p = ' . $probability;
//        echo '<br>';
//    }
//}
/**----------------------------------------------- 3 -------------------------------------------------------раунд */
$arr3_X = permutation(['Y9', 'Y10', 'Y11', 'Y12', 'Y13', 'Y14', 'Y15', 'Y16'], '528761438614');
$arr3_K = ['K13', 'K14', 'K15', 'K16', 'K17', 'K18', 'K19', 'K20', 'K21', 'K22', 'K23', 'K24'];

$arrX3_S1 = array_slice($arr3_X, 0, 4);
$arrK3_S1 = array_slice($arr3_K, 0, 4);
$arrC3_S1 = ['Y7 + B7', 'Y4 + B4', 'Y3 + B3'];

$arrK3_S2 = array_slice($arr3_K, 4, 4);
$arrX3_S2 = array_slice($arr3_X, 4, 4);
$arrC3_S2 = ['Y6 + B6', 'Y5 + B5', 'Y8 + B8'];


$arrK3_S3 = array_slice($arr3_K, 8, 4);
$arrX3_S3 = array_slice($arr3_X, 8, 4);
$arrC3_S3 = ['Y2 + B2', 'Y1 + B1'];

echo '<h1>' . '3 раунд S1 блок' . '</h1>';

var_dump($arrX3_S1);
var_dump($arrK3_S1);
var_dump($arrC3_S1);

$arr_analogs3_information1 = [];
$arr_analogs3_probability1 = [];
$arr_analogs3_keys1 = [];
$arr_analogs3_S1 = [];
foreach ($analogs_s1 as $alfa => $item) {
    $alfa = (string)$alfa;
    $analog = '';
    $keys = '';
    for ($i = 0; $i < 4; $i++) {
        if ($alfa[$i] == 1) {
            $analog = $analog . $arrX3_S1[$i] . ' + ';
            $keys = $keys . $arrK3_S1[$i] . ' + ';
        }
    }
    foreach ($item as $beta => $probability) {
        $beta = (string)$beta;
        $analog_result = $analog;
        for ($i = 0; $i < 3; $i++) {
            if ((string)$beta[$i] == 1) {
                $analog_result = $analog_result . $arrC3_S1[$i] . ' + ';
            }
        }
        $arr_analogs3_information1[] = 'a = ' . $alfa . ' b = ' . $beta . ' p = ' . $probability;
        $arr_analogs3_probability1[] = (float)$probability;
        $arr_analogs3_S1[] = substr($analog_result, 0, -3);
        $arr_analogs3_keys1[] = substr($keys, 0, -3);
    }
}

var_dump($arr_analogs3_information1);
var_dump($arr_analogs3_probability1);
var_dump($arr_analogs3_S1);
var_dump($arr_analogs3_keys1);
/** ----------------------------------------------------------------- */
echo '<h1>' . '3 раунд S2 блок' . '</h1>';
var_dump($arrX3_S2);
var_dump($arrK3_S2);
var_dump($arrC3_S2);
$arr_analogs3_keys2 = [];
$arr_analogs3_information2 = [];
$arr_analogs3_probability2 = [];
$arr_analogs3_S2 = [];
foreach ($analogs_s2 as $alfa => $item) {
    $alfa = (string)$alfa;
    $analog = '';
    $keys = '';
    for ($i = 0; $i < 4; $i++) {
        if ($alfa[$i] == 1) {
            $analog = $analog . $arrX3_S2[$i] . ' + ';
            $keys = $keys . $arrK3_S2[$i] . ' + ';
        }
    }
    foreach ($item as $beta => $probability) {
        $beta = (string)$beta;
        $analog_result = $analog;
        for ($i = 0; $i < 3; $i++) {
            if ((string)$beta[$i] == 1) {
                $analog_result = $analog_result . $arrC3_S2[$i] . ' + ';
            }
        }
        $arr_analogs3_keys2[] = substr($keys, 0, -3);
        $arr_analogs3_information2[] = 'a = ' . $alfa . ' b = ' . $beta . ' p = ' . $probability;
        $arr_analogs3_probability2[] = (float)$probability;
        $arr_analogs3_S2[] = substr($analog_result, 0, -3);
    }
}
var_dump($arr_analogs3_information2);
var_dump($arr_analogs3_probability2);
var_dump($arr_analogs3_S2);
var_dump($arr_analogs3_keys2);
/** ------------------------------------------------------------------------------------------- */
echo '<h1>' . '3 раунд S3 блок' . '</h1>';
var_dump($arrX3_S3);
var_dump($arrK3_S3);
var_dump($arrC3_S3);
$arr_analogs3_keys3 = [];
$arr_analogs3_information3 = [];
$arr_analogs3_probability3 = [];
$arr_analogs3_S3 = [];
foreach ($analogs_s3 as $alfa => $item) {
    $alfa = (string)$alfa;
    $analog = '';
    $keys = '';
    for ($i = 0; $i < 4; $i++) {
        if ($alfa[$i] == 1) {
            $analog = $analog . $arrX3_S3[$i] . ' + ';
            $keys = $keys . $arrK3_S3[$i] . ' + ';
        }
    }
    foreach ($item as $beta => $probability) {
        $beta = (string)$beta;
        $analog_result = $analog;
        for ($i = 0; $i < 3; $i++) {
            if ((string)$beta[$i] == 1) {
                $analog_result = $analog_result . $arrC3_S3[$i] . ' + ';
            }
        }
        $arr_analogs3_keys3[] = substr($keys, 0, -3);
        $arr_analogs3_information3[] = 'a = ' . $alfa . ' b = ' . $beta . ' p = ' . $probability;
        $arr_analogs3_probability3[] = (float)$probability;
        $arr_analogs3_S3[] =substr($analog_result, 0, -3);
    }
}
var_dump($arr_analogs3_information3);
var_dump($arr_analogs3_probability3);
var_dump($arr_analogs3_S3);
var_dump($arr_analogs3_keys3);


/** ------------------------------------------------------------------------------------------------------------------------- */
/**----------------------------------------------- 2 -------------------------------------------------------раунд */

$arr2_X = permutation(['B1', 'B2', 'B3', 'B4', 'B5', 'B6', 'B7', 'B8'], '528761438614');
$arr2_K = ['K7', 'K8', 'K9', 'K10', 'K11', 'K12', 'K13', 'K14', 'K15', 'K16', 'K17', 'K18'];

$arrX2_S1 = array_slice($arr2_X, 0, 4);
$arrK2_S1 = array_slice($arr2_K, 0, 4);
$arrC2_S1 = ['X15 + Y15', 'X12 + Y12', 'X1 + Y11'];

$arrK2_S2 = array_slice($arr2_K, 4, 4);
$arrX2_S2 = array_slice($arr2_X, 4, 4);
$arrC2_S2 = ['X14 + Y14', 'X13 + Y13', 'X16 + Y16'];


$arrK2_S3 = array_slice($arr2_K, 8, 4);
$arrX2_S3 = array_slice($arr2_X, 8, 4);
$arrC2_S3 = ['X10 + Y10', 'X9 + Y9'];

echo '<h1>' . '2 раунд S1 блок' . '</h1>';

var_dump($arrX2_S1);
var_dump($arrK2_S1);
var_dump($arrC2_S1);

$arr_analogs2_information1 = [];
$arr_analogs2_probability1 = [];
$arr_analogs2_keys1 = [];
$arr_analogs2_S1 = [];
foreach ($analogs_s1 as $alfa => $item) {
    $alfa = (string)$alfa;
    $analog = '';
    $keys = '';
    for ($i = 0; $i < 4; $i++) {
        if ($alfa[$i] == 1) {
            $analog = $analog . $arrX2_S1[$i] . ' + ';
            $keys = $keys . $arrK2_S1[$i] . ' + ';
        }
    }
    foreach ($item as $beta => $probability) {
        $beta = (string)$beta;
        $analog_result = $analog;
        for ($i = 0; $i < 3; $i++) {
            if ((string)$beta[$i] == 1) {
                $analog_result = $analog_result . $arrC2_S1[$i] . ' + ';
            }
        }
        $arr_analogs2_information1[] = 'a = ' . $alfa . ' b = ' . $beta . ' p = ' . $probability;
        $arr_analogs2_probability1[] = (float)$probability;
        $arr_analogs2_S1[] = substr($analog_result, 0, -3);
        $arr_analogs2_keys1[] = substr($keys, 0, -3);
    }
}

var_dump($arr_analogs2_information1);
var_dump($arr_analogs2_probability1);
var_dump($arr_analogs2_S1);
var_dump($arr_analogs2_keys1);
/** ----------------------------------------------------------------- */
echo '<h1>' . '2 раунд S2 блок' . '</h1>';
var_dump($arrX2_S2);
var_dump($arrK2_S2);
var_dump($arrC2_S2);
$arr_analogs2_keys2 = [];
$arr_analogs2_information2 = [];
$arr_analogs2_probability2 = [];
$arr_analogs2_S2 = [];
foreach ($analogs_s2 as $alfa => $item) {
    $alfa = (string)$alfa;
    $analog = '';
    $keys = '';
    for ($i = 0; $i < 4; $i++) {
        if ($alfa[$i] == 1) {
            $analog = $analog . $arrX2_S2[$i] . ' + ';
            $keys = $keys . $arrK2_S2[$i] . ' + ';
        }
    }
    foreach ($item as $beta => $probability) {
        $beta = (string)$beta;
        $analog_result = $analog;
        for ($i = 0; $i < 3; $i++) {
            if ((string)$beta[$i] == 1) {
                $analog_result = $analog_result . $arrC2_S2[$i] . ' + ';
            }
        }
        $arr_analogs2_keys2[] = substr($keys, 0, -3);
        $arr_analogs2_information2[] = 'a = ' . $alfa . ' b = ' . $beta . ' p = ' . $probability;
        $arr_analogs2_probability2[] = (float)$probability;
        $arr_analogs2_S2[] = substr($analog_result, 0, -3);
    }
}
var_dump($arr_analogs2_information2);
var_dump($arr_analogs2_probability2);
var_dump($arr_analogs2_S2);
var_dump($arr_analogs2_keys2);
/** ------------------------------------------------------------------------------------------- */
echo '<h1>' . '2 раунд S3 блок' . '</h1>';
var_dump($arrX2_S3);
var_dump($arrK2_S3);
var_dump($arrC2_S3);
$arr_analogs2_keys3 = [];
$arr_analogs2_information3 = [];
$arr_analogs2_probability3 = [];
$arr_analogs2_S3 = [];
foreach ($analogs_s3 as $alfa => $item) {
    $alfa = (string)$alfa;
    $analog = '';
    $keys = '';
    for ($i = 0; $i < 4; $i++) {
        if ($alfa[$i] == 1) {
            $analog = $analog . $arrX2_S3[$i] . ' + ';
            $keys = $keys . $arrK2_S3[$i] . ' + ';
        }
    }
    foreach ($item as $beta => $probability) {
        $beta = (string)$beta;
        $analog_result = $analog;
        for ($i = 0; $i < 3; $i++) {
            if ((string)$beta[$i] == 1) {
                $analog_result = $analog_result . $arrC2_S3[$i] . ' + ';
            }
        }
        $arr_analogs2_keys3[] = substr($keys, 0, -3);
        $arr_analogs2_information3[] = 'a = ' . $alfa . ' b = ' . $beta . ' p = ' . $probability;
        $arr_analogs2_probability3[] = (float)$probability;
        $arr_analogs2_S3[] =substr($analog_result, 0, -3);
    }
}
var_dump($arr_analogs2_information3);
var_dump($arr_analogs2_probability3);
var_dump($arr_analogs2_S3);
var_dump($arr_analogs2_keys3);



echo '-----------------------------------------------------------------------------Итоговые аналоги----------------------------------------------------------------------------';

echo 'S1' . '<br>';
for ($i = 0; $i < count($arr_analogs_S1); $i++)
{
    $result = $arr_analogs_S1[$i] . ' + ' . $arr_analogs3_S1[$i]. ' = ' . $arr_analogs1_keys1[$i] . ' + ' . $arr_analogs3_keys1[$i];
    if ($arr_analogs_probability1[$i] == $arr_analogs3_probability1[$i])
    {
        $result_p = (1 - 2*$arr_analogs_probability1[$i] + 2*$arr_analogs_probability1[$i]*$arr_analogs_probability1[$i]);
    }
    else
    {
        $result_p = (1 - $arr_analogs_probability1[$i] - $arr_analogs3_probability1[$i] + 2*$arr_analogs3_probability1[$i]*$arr_analogs_probability1[$i]);
    }
    echo $i+1;
    var_dump($arr_analogs_information1[$i]);
    var_dump($arr_analogs_probability1[$i]);
    var_dump($arr_analogs_S1[$i] . ' = ' . $arr_analogs1_keys1[$i]);

    var_dump($arr_analogs3_information1[$i]);
    var_dump($arr_analogs3_probability1[$i]);
    var_dump($arr_analogs3_S1[$i] . ' = ' . $arr_analogs3_keys1[$i]);

    var_dump($result_p);
    var_dump($result);
}
echo 'S2' . '<br>';
for ($i = 0; $i < count($arr_analogs_S2); $i++)
{
    $result = $arr_analogs_S2[$i] . ' + ' . $arr_analogs3_S2[$i]. ' = ' . $arr_analogs1_keys2[$i] . ' + ' . $arr_analogs3_keys2[$i];
    if ($arr_analogs_probability2[$i] == $arr_analogs3_probability2[$i])
    {
        $result_p = (1 - 2*$arr_analogs_probability2[$i] + 2*$arr_analogs_probability2[$i]*$arr_analogs_probability2[$i]);
    }
    else
    {
        $result_p = (1 - $arr_analogs_probability2[$i] - $arr_analogs3_probability2[$i] + 2*$arr_analogs3_probability2[$i]*$arr_analogs_probability2[$i]);
    }
    echo $i+1;
    var_dump($arr_analogs_information2[$i]);
    var_dump($arr_analogs_probability2[$i]);
    var_dump($arr_analogs_S2[$i] . ' = ' . $arr_analogs1_keys2[$i]);

    var_dump($arr_analogs3_information2[$i]);
    var_dump($arr_analogs3_probability2[$i]);
    var_dump($arr_analogs3_S2[$i] . ' = ' . $arr_analogs3_keys2[$i]);
    var_dump($result_p);
    var_dump($result);
}

echo 'S3' . '<br>';
for ($i = 0; $i < count($arr_analogs_S3); $i++)
{
    $result = $arr_analogs_S3[$i] . ' + ' . $arr_analogs3_S3[$i]. ' = ' . $arr_analogs1_keys3[$i] . ' + ' . $arr_analogs3_keys3[$i];
    if ($arr_analogs_probability3[$i] == $arr_analogs3_probability3[$i])
    {
        $result_p = (1 - 2*$arr_analogs_probability3[$i] + 2*$arr_analogs_probability3[$i]*$arr_analogs_probability3[$i]);
    }
    else
    {
        $result_p = (1 - $arr_analogs_probability3[$i] - $arr_analogs3_probability3[$i] + 2*$arr_analogs3_probability3[$i]*$arr_analogs_probability3[$i]);
    }
    echo $i+1;
    var_dump($arr_analogs_information3[$i]);
    var_dump($arr_analogs_probability3[$i]);
    var_dump($arr_analogs_S3[$i] . ' = ' . $arr_analogs1_keys3[$i]);

    var_dump($arr_analogs3_information3[$i]);
    var_dump($arr_analogs3_probability3[$i]);
    var_dump($arr_analogs3_S3[$i] . ' = ' . $arr_analogs3_keys3[$i]);
    var_dump($result_p);
    var_dump($result);
}
