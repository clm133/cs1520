<tr>
	<div class="accordian-body collapse" <?php creatureOptionsId($id);?>>
		<table class="table">
			<form action='initiative/order_process.php' method='post'>
				<button type='submit' class='btn btn-danger btn-sm' name='remove' value='$id'>Remove from Order</button>
			</form>
		</table>
	</div>
</tr>