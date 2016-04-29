<div class="modal fade" <?php echo"id='healthModal_$id'";?>>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Manage Health</h4>
			</div>
			<div class="modal-body">
				<h5 class="primaryheading">Current Health:<span class="subheading relaventStat" <?php echo "id='currentHealthModal_$id'";?>><?php echo $currHp;?></span></h5>
					<div class="form-group">
						<form class="modalForm" id="dmgHealth">
							<input class="statbox" type="text" name="dmgHealthValue" id="dmgHealthValue">
							<input type="hidden" id="dmgHiddenHp" <?php echo "name='hiddenHp' value='$currHp'";?>>
							<input type="hidden" id="dmgHiddenId" <?php echo "name='hiddenId' value='$id'";?>>
							<button type="submit" class="btn-primary btn-small">Apply Damage</button>
						</form>
						<form class="modalForm" id="healHealth">
							<input class="statbox" type="text" name="healHealthValue" id="healHealthValue">
							<input type="hidden" id="healHiddenHp" <?php echo "name='hiddenHp' value='$currHp'";?>>
							<input type="hidden" id="healHiddenId" <?php echo "name='hiddenId' value='$id'";?>>
							<button type="submit" class="btn-primary btn-small">Apply Heal</button>
						</form>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>