function applyDamage(formId1, formId2){
		$.ajax({
				type: "POST",
				url: "initiative/order_process.php",
				data: $("#" + formId1).serialize(),
				success: function(){
					var changeHP = document.forms[formId1]["dmgHealthValue"].value;
					var currHP = document.forms[formId1]["hiddenHp"].value;
					var id = document.forms[formId1]["hiddenId"].value;
					currHP = currHP - changeHP;
					$("#currentHealthModal_" + id).html(currHP);
					$("#healthEntry_" + id).html(currHP);
					document.forms[formId1]["hiddenHp"].value = currHP;
					document.forms[formId2]["hiddenHp"].value = currHP;
				}
			});
	return false;
}

function applyHeal(formId1, formId2){
		$.ajax({
				type: "POST",
				url: "initiative/order_process.php",
				data: $("#" + formId2).serialize(),
				success: function(){
					var changeHP = parseInt(document.forms[formId2]["healHealthValue"].value, 10);
					var currHP = parseInt(document.forms[formId2]["hiddenHp"].value, 10);
					var id = document.forms[formId2]["hiddenId"].value;
					currHP = currHP + changeHP;
					$("#currentHealthModal_" + id).html(currHP);
					$("#healthEntry_" + id).html(currHP);
					document.forms[formId1]["hiddenHp"].value = currHP;
					document.forms[formId2]["hiddenHp"].value = currHP;
				}
			});
	return false;
}