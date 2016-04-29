<div <?php creatureRowAttributes($id);?>>
	<div class="panel-heading">
		<div class="nameSpan col-sm-4 entry" <?php echo "id='nameEntry_$id'";?>><?php echo $name; ?></div>
		<div class="healthSpan col-sm-4 entry" <?php echo "id='healthEntry_$id'";?>><?php echo $currHp; ?></div>
		<div class="ivSpan col-sm-4 entry" <?php echo "id='ivEntry_$id'";?>><?php echo $iv; ?></div>
	</div>
	<div <?php hiddenRowAttributes($id);?>>
		<div class="panel-body">
			<div class="nameSpan col-sm-4">
				<div class="btn-group" id="statButtons">
					<?php
						viewStatsButton($id);
					?>
				</div>
			</div>
			<div class="healthSpan col-sm-4">
				<div class="btn-group" id="healthButtons">
					<?php
						manageHealthButton($id);
					?>
				</div>
			</div>
			<div class="ivSpan col-sm-4">
				<form action="initiative/order_process.php" method="post">
					<div class="btn-group" id="orderButtons">
						<?php
							upOrderButton($id);
							downOrderButton($id);
							removeButton($id);
						?>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
