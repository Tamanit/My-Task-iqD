window.onload = function()
{
	
	var MAndY = $(#MonthOrYear).options.selectedIndex;
	function ChangeMY (MAndY)
	{
		MAndY = $(#MonthOrYear).options.selectedIndex;
	}
	$(#MonthOrYear).onchange = ChangeMY (MAndY);
	
	$(#NextPayments).onclick = function
	{ //Если ежемесячного пополнения нет - передавать 0
		
		if ( $(#NextPayments).checked )
		{
			$(#sumAdd).style.visibility = "visible";
			$(#sumAdd).value = "";
		}
		else
		{
			$(#sumAdd).style.visibility = "hidden";
			$(#sumAdd).value = "0";
		}
		
	}
	
	$(#summit).onclick = function
	{
		// инициализация
		var startDate = $(#startDate).value;
		var sum = $(#sum).value;
		var term = $(#term).value * MAndY ;
		var percet = $(#percent).value;
		var sumAdd = $(#sumAdd).value;
		
		$.ajax
		({
			type: "Post",
			url: "calc.php",
			dataType: "JSON",
			data: {startDate, sum, term, percent, sumAdd},
			success: function(data)
			{
				$('#results').html("₽ " + data.toLocaleString('ru'));
			}
		})
	}
	
}