<?php
	Square Loop:-
	
	for($i=1; $i<=5; $i++)
	{
		for($j=1; $j<=5; $j++)
		{
			echo "* ";
		}
		echo "\n";
	}
?>

	Right loop:-
	<?php
	for($i=1; $i<=5; $i++)
	{
		for($j=1; $j<=$i; $j++)
		{
			echo "* ";
		}
		echo "\n";
	}
	?>

	Invented Right Loop:-
	<?php
	for($i=5; $i>=1; $i--)
	{
		for($j=1; $j<=$i; $j++)
		{
			echo "* ";
		}
		echo "\n";
	}
	?>
	
	Pyramid Pattern
	<?php
	for($i=1; $i<=5; $i++)
	{
		for($space=5; $space>$i; $space--)
		{
			echo " ";
		}

		for($j=1; $j<=(2*$i-1); $j++)
		{
			echo "*";
		}
		echo "\n";
	}
	?>
	
	Number Triangle Pattern									
	<?php
	for($i=1; $i<=5; $i++)				
	{
		for($j=1; $j<=$i; $j++)
		{
			echo $j . " ";
		}
		echo "\n";
	}
	?>
	
	Same Number Pattern
	<?php
	for($i=1; $i<=5; $i++)
	{
		for($j=1; $j<=$i; $j++)
		{
			echo $i . " ";
		}
		echo "\n";
	}
	?>
	
	Floyd’s Triangle
	<?php
	$num = 1;

	for($i=1; $i<=5; $i++)
	{
		for($j=1; $j<=$i; $j++)
		{
			echo $num . " ";
			$num++;
		}
		echo "\n";
	}
	?>
	
	8.Diamond Pattern:-
	<?php
	$n = 5;

	for($i=1; $i<=$n; $i++)
	{
		for($space=$n; $space>$i; $space--)
		{
			echo " ";
		}

		for($j=1; $j<=(2*$i-1); $j++)
		{
			echo "*";
		}
		echo "\n";
	}

	for($i=$n-1; $i>=1; $i--)
	{
		for($space=$n; $space>$i; $space--)
		{
			echo " ";
		}

		for($j=1; $j<=(2*$i-1); $j++)
		{
			echo "*";
		}
		echo "\n";
	}
	?>
