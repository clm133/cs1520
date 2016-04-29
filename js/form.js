$(function(){
	$("#dmgHealth > button").click(function(e){
		e.preventDefault();
		$.ajax({
				type: "POST",
				url: "initiative/order_process.php",
				data: $("#dmgHealth").serialize(),
				success: function(){
						var changeHP = $("#dmgHealthValue").val();
						var currHP = $("#dmgHiddenHp").val();
						var id = "currentHealthModal_" + $("#dmgHiddenId").val();
						$("#" + id).html((currHP - changeHP));
						id = "healthEntry_" + $("#dmgHiddenId").val();
						$("#" + id).html((currHP - changeHP));
					}
			});
		  return false;
		});
	
	$("#healHealth > button").click(function(e){
		e.preventDefault();
		$.ajax({
				type: "POST",
				url: "initiative/order_process.php",
				data: $("#healHealth").serialize(),
				success: function(){
						var changeHP = $("#healHealthValue").val();
						var currHP = $("#healHiddenHp").val();
						var id = "currentHealthModal_" + $("#dhealHiddenId").val();
						$("#" + id).html((currHP + changeHP));
						id = "healthEntry_" + $("#healHiddenId").val();
						$("#" + id).html((currHP + changeHP));
					}
			});
		  return false;
		});
});