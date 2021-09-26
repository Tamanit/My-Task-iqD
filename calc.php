<?php
	

		//инициализация переменных и их проверка
		//		0    1   2   3   4   5   6   7   8   9  10  11
	$DaysMMod4True = Array( 31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 );	
	$DaysMMod4False = Array( 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 );

	

	$sum = $_POST["sum"]; // сумма вклада, она же A1 и An
	If ($sum < 0) {echo "Сумма вклада не может быть равна 0или отрицателена!";};
	
	$i = $_POST["term"]; // N в прогрессии
	If ($i <= 0) {echo "Срок вклада не может быть равен 0или отрицателен!";};
	$Percent = $_POST["percent"];
	If ($i < 0) {echo "Процент вклада не может быть равен 0 или отрицателен!";};

	$d = $_POST["sumAdd"];
	If ($i < 0) {echo "Взносы не могут быть отриуательны!";};

	$DayMonthYear = explode(".", $_POST["startDate"]);
	if ($DayMonthYear[0]<1 && $DayMonthYear[0]>31) {echo "День не может быть меньше 1 и больше 31!";};
	if ($DayMonthYear[1]<1 && $DayMonthYear[1]>12) {echo "Месяц не может быть меньше 1 и больше 12!";};
	if ($DayMonthYear[2]<1) {echo "Нелья открыть вклад в 0 год или раньше";};

//main  
if ($DayMonthYear[2] % 4 == 0)
{
	$sum = $sum + ($sum + $d) * ($DaysMMod4True[$DayMonthYear[1] - 1] - $DayMonthYear[0]+1) * ($Percent/366);
}
else
{
	$sum = $sum + ($sum + $d) * ($DaysMMod4False[$DayMonthYear[1] - 1] - $DayMonthYear[0]+1) * ($Percent/365);
	
}$sum = round ($sum, -3);
echo json_encode ($sum);
?>