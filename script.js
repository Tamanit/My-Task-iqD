
window.onload = function()
{ 	
	var MAndY = document.getElementById("MonthOrYear").options.selectedIndex;
	function ChangeMY ()
	{
		MAndY = document.getElementById("MonthOrYear").options.selectedIndex;
	}

	
	
	document.getElementById("term").onclick = ChangeMY ();
	document.getElementById("MonthOrYear").onclick = ChangeMY ();

	document.getElementById("NextPayments").onclick = function ()
		{
			if(document.getElementById("NextPayments").checked)
			{
				document.getElementById("sumAdd").style.visibility = "visible";
			} 
			else
			{
				document.getElementById("sumAdd").style.visibility = "hidden";
				document.getElementById("sumAdd").value = "0";
			}
		}
    }

function clicked (MAndY)
{
	var startDate = document.getElementById("startDate").value;
	var sum = document.getElementById("sum").value;
	var term = document.getElementById("term").value * MAndY ;
	var percet = document.getElementById("percent").value;
	var sumAdd = document.getElementById("sumAdd").value;
	
	var msg   = $('#form').serialize();
	$.ajax
	({
		type: 'POST',
		url: 'calc.php',
		 dataType: 'json',
		data: {startDate, sum, term, percent, sumAdd},
		success: function(data)
		{
			 $('#results').html("₽ " + data.toLocaleString('ru'));
		}
	});
	
}
	
document.getElementById("submit").onclick = clicked (MAndY);

	
