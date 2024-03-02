<?php
	$id = 0;
	$accID = $id + 1;
	$accItems = $accordion;
?>
<div class="accordion" id="accordion_<?=$accID ?>">
	<?php
		foreach( $accItems as $accItem ): //var_dump($accItem);
			$accItemCaption = $accItem['accordion_items']['accordion_title'];
			$accItemContent = $accItem['accordion_items']['accordion_content'];
			$id++;
	?>
		<div class="accordion-item">
			<h2 class="accordion-header" id="heading-<?=$id?>">
				<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?=$id?>" aria-expanded="true" aria-controls="collapse-<?=$id?>">
					<span class="content"><?=$accItemCaption?></span><i class="bt"></i>
				</button>
			</h2>
			<div id="collapse-<?=$id?>" class="accordion-collapse collapse" aria-labelledby="heading-<?=$id?>" data-bs-parent="#accordion_<?=$accID?>">
			<div class="accordion-body"><?=$accItemContent?></div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
