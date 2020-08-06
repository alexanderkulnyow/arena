<?php
$title = isset( $product['title'] ) ? $product['title'] : _x( 'all events', 'define the title to checkin for all events', 'yith-event-tickets-for-woocommerce' ); //@since 1.1.3
?>
<div class="yith_wcevti_check_in">
    <form id="yith_wcevti_check_in_form" name="yith_wcevti_check_in_form"
          method="post">
        <div class="check_in_panel search_panel">
            <header class="check_in_panel_header">

                <label for="_search_ticket_number" class="search_panel_label"><?php echo _x( 'Check in for',
							'title for checking system',
							'yith-event-tickets-for-woocommerce' ) . ' ' . $title; //@since 1.1.3?>
                </label>

            </header>

            <?php
//            echo do_shortcode ( '[add__qrcsanner]' );
            ?>
            <div class="check_in_panel_body">
                <input type="text"
                       id="result"
                       name="_search_ticket_number"
                       class="search_ticket_number"
                       value=""
                       placeholder="<?php _e( 'Enter the ticket number here', 'yith-event-tickets-for-woocommerce' ); ?>">

                <input type="hidden" class="search_ticket_value" >
                <button class="button fa fa-search search_ticket_button" aria-hidden="true"></button>
            </div>

        </div>
        <div id="check_in_form_dialog" class="check_in_panel dialog_panel">
            <span class="message"></span>
            <a href="" class="fa fa-times-circle back_search_button" aria-hidden="true"></a>
        </div>
        <div class="check_in_panel list_panel">
            <div class="list_header_panel">
                <div class="list_colum ticket_status">
                    <span class="ticket_status_icon_header fa fa-hand-paper-o" title="Ticket Status"></span>
                </div>
                <div class="list_colum ticket_info">
                    <span><b><?php echo __( 'Ticket info', 'yith-event-tickets-for-woocommerce' ); ?></b></span>
                </div>
                <div class="list_colum enable_automatic">
                    <input type="checkbox" id="enable_automatic_checkin" name="enable_automatic_checkin">
                    <span><small><?php echo __( 'Automatic check in', 'yith-event-tickets-for-woocommerce' ); ?></small></span>
                </div>
            </div>
            <div class="list_rows_panel">
            </div>
        </div>
        <a href="" class="export_csv_ahref fa fa-file-excel-o" target="_blank"
           aria-hidden="true"> <?php echo __( 'Export CSV', 'yith-event-tickets-for-woocommerce' ); ?></a>
        <a href="" class="print_result fa fa-print" target="_blank"
           aria-hidden="true"><?php echo __( 'Print', 'yith-event-tickets-for-woocommerce' ); ?></a>
    </form>
</div>
