function nextTurn($p1){
	{
		$.ajax({
			type: "POST",
			url: "initiative/order_process.php",
			data: ("advanceOrder=" + $p1),
			success: function(){
				var currentTurn;
				var oldCurrentTurn;
				var i;
				if($p1 == "start"){
					currentTurn = document.getElementsByClassName("topOrder")[0];
					oldCurrentTurn = document.getElementsByClassName("currentTurn")[0];
					$(oldCurrentTurn).removeClass("currentTurn");
					$(currentTurn).addClass("currentTurn");
				}
				else if($p1 == "next"){
					currentTurn = document.getElementsByClassName("creatureRow");
					$(currentTurn).each(function (index, value){
						if($(value).hasClass("currentTurn")){
							i = index;
							$(value).removeClass("currentTurn")
						}
					});
					i = i + 1;
					if(i == currentTurn.length){
						i = 0;
					}
					currentTurn = currentTurn[i];
					$(currentTurn).addClass("currentTurn");
				}
			}
		})
		return false;
	}
}