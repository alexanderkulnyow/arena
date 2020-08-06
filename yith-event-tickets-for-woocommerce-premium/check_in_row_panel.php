<div class="list_row_panel">
    <div class="row_header">
        <div class="list_colum ticket_status">
			<?php
			if ( 'yi-checked' == $ticket_status ) {
				?>
                <span class="ticket_status_icon fa fa-thumbs-o-up status_checked" title="Проверен"></span>
				<?php
			} elseif ( 'yi-cancelled' == $ticket_status ) {
				?>
                <span class="ticket_status_icon fa fa-ban status_cancelled" title="Cancelled"></span>
				<?php
			} else {
				?>
                <span class="ticket_status_icon fa fa-hand-paper-o status_pending_check" title="Pending check"></span>
				<?php
			}
			?>
        </div>
        <div class="list_colum ticket_id">
            <span> <b><?php echo '#' . $ticket_id; ?></b><small><?php echo ', ' . __( 'purchased by', 'yith-event-tickets-for-woocommerce' ) . ' ' ?></small><b><?php echo $purchased_by['display_name']; ?></b>  </span>
        </div>
        <div class="list_colum row_actions">
            <span class="item_action toggle fa fa-caret-down" aria-hidden="true"></span>
			<?php
			if ( 'yi-pending-check' == $ticket_status ) {
				?>
                <button class="item_action make_checkin_button fa fa-thumbs-o-up tips" title="<?php echo __( 'Make check in', 'yith-event-tickets-for-woocommerce' ); ?>" aria-hidden="true" data-ticket_id="<?php echo $ticket_id; ?>" data-status="yi-checked" href=""></button>
				<?php
			}
			?>
        </div>
    </div>
    <div class="row_more_info">
        <div class="row_more_info_header">
            <div class="fields_info">
                <span><b><?php echo __( 'Fields', 'yith-event-tickets-for-woocommerce' ); ?></b></span>
            </div>
            <div class="services_info">
                <span><b><?php echo __( 'Services', 'yith-event-tickets-for-woocommerce' ); ?></b></span>
            </div>
        </div>
        <div class="fields_info">
			<?php
			if ( ! empty( $fields ) ) {
				foreach ( $fields as $field ) {
					?>
                    <span class="field_item"><small><b><?php echo $field['label']; ?>:</b> <?php echo $field['value'] ?></small></span>
					<?php
				}
			} else {
				?>
                <span class="field_item"><small><?php echo __( 'This ticket not have fields', 'yith-event-tickets-for-woocommerce' ) ?></small></span>
				<?php
			}
			?>
        </div>
        <div class="services_info">
			<?php
			if ( ! empty( $services ) ) {
				foreach ( $services as $service ) {
					?>
                    <span class="service_item"><small><b><?php echo $service['label']; ?>:</b> <?php echo $service['value'] ?></small></span>
					<?php
				}
			} else {
				?>
                <span class="service_item"><small><?php echo __( 'This ticket not have services', 'yith-event-tickets-for-woocommerce' ) ?></small></span>
				<?php

			} ?>
        </div>
    </div>
</div>
