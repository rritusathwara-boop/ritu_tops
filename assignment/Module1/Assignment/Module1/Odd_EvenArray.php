<?php
$arr = array(10, 15, 22, 33, 40, 55, 60, 71);
$evenCount = 0;
$oddCount = 0;
for($i = 0; $i < count($arr); $i++)
{
    if($arr[$i] % 2 == 0)
    {
        $evenCount++;
    }
    else
    {
        $oddCount++;
    }
}
echo "Even elements count = " . $evenCount . "\n";
echo "Odd elements count = " . $oddCount;
?>
