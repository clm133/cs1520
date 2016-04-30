<div class="modal fade" <?php echo"id='healthModal_$id'";?>>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Manage Health</h4>
			</div>
			<div class="modal-body">
				<h5 class="primaryheading">Current Health:<span class="subheading relaventStat" <?php echo "id='currentHealthModal_$id'";?>><?php echo $currHp;?></span></h5>
					<div class="form-group">
						<form class="modalForm" onsubmit="return applyDamage('<?php echo "dmgHealth_$id";?>','<?php echo "healHealth_$id";?>')" <?php echo "id='dmgHealth_$id'";?>>
							<input class="statbox" type="text" name="dmgHealthValue">
							<input type="hidden" name="hiddenId" <?php echo "value='$id'";?>>
							<input type="hidden" name="hiddenHp" <?php echo "value='$currHp'";?>>
							<button type="submit" class="btn-primary btn-small">Apply Damage</button>
						</form>
						<form class="modalForm" onsubmit="return applyHeal('<?php echo "dmgHealth_$id";?>','<?php echo "healHealth_$id";?>')" <?php echo "id='healHealth_$id'";?>>
							<input class="statbox" type="text" name="healHealthValue">
							<input type="hidden" name="hiddenId" <?php echo "value='$id'";?>>
							<input type="hidden" name="hiddenHp" <?php echo "value='$currHp'";?>>
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