<?php
$arr = array(1, 0, 5, 0, 3, 0, 9, 2);

$newArr = array();
$zeroCount = 0;

for($i = 0; $i < count($arr); $i++)
{
    if($arr[$i] != 0)
    {
        $newArr[] = $arr[$i];
    }
    else
    {
        $zeroCount++;
    }
}
for($i = 1; $i <= $zeroCount; $i++)
{
    $newArr[] = 0;
}
echo "Original Array: ";
print_r($arr);
echo "\nUpdated Array: ";
print_r($newArr);
?>
