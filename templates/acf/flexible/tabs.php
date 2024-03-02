<?php 

$settings = get_fields()['flex_layouts'] ?? '';

$tabs_repeater = $settings[0]['tabs_repeater'] ?? '';

// check if the repeater field has rows of data
if( $tabs_repeater ):
	$i = 1; // Set the increment variable

    echo '<ul class="tabs">';

    foreach( $tabs_repeater as $tab ):

        $tab_header = $tab['tab_header'];
        $tab_content = $tab['tab_content'];
    
        ?>
	
        <li class="tab-header">
            <a class="tab-link <?php if($i == 1) echo 'active';?>" id="<?php echo sanitize_title($tab_header); ?>-tab" data-toggle="tab" data-tab-target=<?php echo sanitize_title($tab_header); ?> href="#<?php echo sanitize_title($tab_header); ?>" role="tab" aria-controls="<?php echo sanitize_title($tab_header); ?>" aria-selected="true"><?php echo $tab_header; ?></a>
        </li>
                    
        <?php $i++; // Increment the increment variable

    endforeach;

    echo '</ul>


    <div class="tab-content">';
	$i = 1; // Set the increment variable

    
    foreach( $tabs_repeater as $tab ):

        $tab_header = $tab['tab_header'];
        $tab_content = $tab['tab_content'];

        ?>
	
        <div class="tab-pane <?php if($i == 1) echo 'active';?>" id="<?php echo sanitize_title($tab_header); ?>" data-tab-content=<?php echo sanitize_title($tab_header); ?> aria-labelledby="<?php echo sanitize_title($tab_header); ?>-tab"><?php echo $tab_content; ?></div>
        
        <?php   $i++; // Increment the increment variable

    endforeach;

    echo '</div>';

else :

// no rows found
    
endif;



?>