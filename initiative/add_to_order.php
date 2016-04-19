<div class="container col-sm-4" id="add_to_order">
	<div class="panel panel-default">
		<div class="panel-heading"><h4>Add to Order</h4></div>
		<div class="panel-body">
			<form action="initiative/order_process.php" method="post">
				<div class="form-group">
					<label for="creatureName">Creature Name</label>
					<input type="text" name="creatureName" class="form-control" id="creatureName" placeholder="Larry the Last">
				</div>
				<div class="form-group">
					<label for="iv">Initiative Value</label>
					<input type="text" name="iv" class="form-control" id="iv" placeholder="1">
				</div>
				<div class="form-group">
					<label for="hp">HP</label>
					<input type="text" name="hp" class="form-control" id="hp" placeholder="10">
				</div>
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>