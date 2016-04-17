<?php
	echo"<div class='modal fade' id='changeHealth' role='dialog'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<h4>Change Health</h4>
				</div>
				<div class='modal-body'>
					<form action='initiative/order_process.php' method='post'>
						<div class='form-group'>
							<label for='hpValue'>New HP</label>
							<input type='text' name='newhp' class='form-control' id='hpValue' placeholder='New HP value'>
						</div>
						<button type='submit' name='creatureName' value='$creatureName' class='btn btn-default'>Change HP</button>
					</form>
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-default' data-dismiss='modal'>
							Close
					</button>
				</div>
			</div>
		</div>
	</div>";
?>