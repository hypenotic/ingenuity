<aside id="left"> 
	<?php if ($client) { ?>
	    <p><span class="stats_label">Client</span>: <?php echo $client; ?></p>
	<?php } ?>
	<?php if ($sqft) { ?>
	    <p><span class="stats_label">SF</span>: <?php echo $sqft; ?></p>
	<?php } ?>
	<?php if ($duration) { ?>
	    <p><span class="stats_label">Duration</span>: <?php echo $duration; ?></p>
	<?php } ?>
	<?php if ($location) { ?>
	    <p><span class="stats_label">Location</span>: <?php echo $location; ?></p>
	<?php } ?>
</aside>

