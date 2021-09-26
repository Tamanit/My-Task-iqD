<? php

function fValidateDate ($Variable, $VariablePOST )
{//Валидация и инициализация даты

	$Variable = explode(".", $VariablePOST);

	if ( $Variable[0] < 1 || $Variable[0] > 31 )
	{
		$Variable = -404;
		echo json_encode ( $Variable);
	}
	if ( $Variable[1] < 1 || $Variable[0] > 12 )
	{
		$Variable = -404;
		echo json_encode ( $Variable);
	}
	if ( $Variable[2] < 1 || $Variable[2] > 9999 )
	{
		$Variable = -404;
		echo json_encode ( $Variable);
	}
	return $Variable;
}

function fValidateData ($minValue, $maxValue, $Variable, $VariablePOST )
{//Валидация и инициализация данных
	if ( $Variable < $minValue || $Variable > $maxValue )
	{
		$Variable = -404;
		echo json_encode ( $Variable);
	}
	else
	{
		$Variable = $VariablePOST;
	}
	return $Variable;
}

function fCalculation ($sum, $sumAdd, $DaysY, $percent, $yearD, $startDate, $DaysMMod4 )
{// формула
		$sum = $sum + ( $sum + $sumAdd ) * $DaysY * (percent/YearD);
	$startDate[1]++;
	if ($startDate[1] = 13)
	{
		$startDate[1] = 1;
		$startDate[2]++;
	}
	$DaysY = $DaysMMod4[$startDate[1] - 1];
}

				//		0    1   2   3   4   5   6   7   8   9  10  11
$DaysMMod4True = Array( 31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 );	
$DaysMMod4False = Array( 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 );

//инициализация
$startDate = fValidateDate($startDate, $_POST["startDate"]);
$sum = fValidateData (1000, 3000000, $sum, $_POST["sum"] );
$term = fValidateData (1, 60, $term, $_POST["term"] );
$percent = fValidateData (3, 100, percent, $_POST["percent"] );
$sumAdd = fValidateData (0, 3000000, $sumAdd, $_POST["sumAdd"] );
if ($startDate % 4 == 0)
{ //DaysY инициализация
	$DaysY = $DaysMMod4True[$startDate[1]-1] - $DaysMMod4True[0];
}
else
{
	$DaysY = $DaysMMod4False[$startDate[1]-1] - $DaysMMod4False[0];
}

for ($term; $term > 0; $term-- )
{
	if ($startDate[2] % 4 == 0)
	{
		fCalculation ($sum, $sumAdd, $DaysY, $percent, 366, $startDate, $DaysMMod4True );
	}
	else
	{
		fCalculation ($sum, $sumAdd, $DaysY, $percent, 365, $startDate, $DaysMMod4False );
	}
	
}

?>
