<?php
/**
 * @file bill.php
 *
 * Template view for the billing form / page.
 *
 * Available variables:
 * $orders_list: current member / anonymous order item list in HTML.
 * $shipping_cost: array of costs for shipping (normal / ems) for calculation.
 */
?>
<?php if ($bills_history): ?>
    <div class="orders bill-history page-header">
        <h3>Bill history</h3>
        <table class="table table-condensed table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Bank</th>
                    <th>Amount</th>
                    <th>Shipping type</th>
                    <th>Transfer date</th>
                    <th>Transfer time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($bills_history as $index => $bill): ?>
                <tr>
                    <td><?php print $index + 1; ?></td>
                    <td><?php print $bill->bank; ?></td>
                    <td><?php print number_format($bill->amount, 2); ?></td>
                    <td><?php print $bill->shipping_type; ?></td>
                    <td>
                        <?php print $bill->transfer_date->format('j F Y'); ?> 
                    </td>
                    <td>
                        <?php print date('H:i', strtotime($bill->transfer_time)); ?> 
                    </td>
                    <td><?php print $bill->status; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
<?php if ($orders_list): ?>
    <div class="orders">
        <h3>Unpaid orders</h3>
        <?php print $orders_list; ?>
    </div>
<?php endif; ?>
<?php print $bill_form; ?>
