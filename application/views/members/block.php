<?php
/**
 * @file frontend_block.php
 *
 * Template view for the current member information block.
 *
 * Available variables:
 * $member: current member information, for anonymous this is bool(FALSE).
 * $orders_list: current member / anonymous order item list in HTML.
 */
?>
<?php if ($member): ?>
<div class="member-information well">
    Welcome, <?php print $member->firstname . ' ' . $member->lastname; ?>
    <p>You have <?php print count($orders); ?> unpaid orders.</p>
    <div class="btn-group">
        <?php
        $member = Member::get_current_profile($authenticate = FALSE);
        if ($member->role == 'admin'): ?>
        <a class="btn btn-primary" href="<?php print base_url('admin'); ?>">Admin dashboard</a>
        <?php endif; ?>
        <!-- <a class="btn" href="<?php print base_url('members/my_orders'); ?>">Track orders</a> -->
        <a class="btn" href="<?php print base_url('members/edit_profile'); ?>">Change profile</a>
        <a class="btn" href="<?php print base_url('members/logout'); ?>">Log out</a>
    </div>
</div>
<?php endif; ?>

<?php if ($wait_orders_list): ?>
    <div class="orders page-header">
        <h3>My orders</h3>
        <?php print $wait_orders_list; ?>
        <p class="order-actions">
            <!--
            <a class="btn" href="<?php print base_url('orders/history'); ?>">Track all orders</a> or  
            -->
            <a class="btn btn-danger" href="<?php print base_url('orders/bill'); ?>">Bill these orders</a>
        </p>
    </div>
<?php endif; ?>
