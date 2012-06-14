<?php
/**
 * @file waiting_list.php
 *
 * Template view for the waiting orders list.
 *
 * Available variables:
 * $orders: current member / anonymous order items array contains some properties:
 * -- id: order id, for anonymous it would be temporary id reference to current session.
 * -- product: product items array like $product, but reference with current member orders.
 * ---- id: product id which refer to unique product.
 * ---- title: product name.
 * ---- detail: product details eg. specifications, some product reviews, etc.
 * ---- status: sale status for this product (available, sold_out, pre_order, promotion.)
 * ---- price: product price.
 * ---- price_sale: special product price which would be used on promotion products.
 * ---- stock: current available pieces of this product.
 * ---- stock_sold: current sold out pieces of this product.
 * ---- created_at / updated_at: product information create / update date.
 * ---- category_id: refer to this product's category.
 * ---- attachment_id: refer to this product's attachment (eg. cover image, review photo).
 * ---- attribute: attribute item array which contains:
 * ------ label: attribute description shown in product page.
 * ------ notes: attribute notes, eg. next lot / pre-order date for specific attribute.
 * 
 *     Other properties are available only logged in member:
 * -- member: current member's information.
 * -- attribute: product's attribute which current member decide to order.
 * -- shipping_address: shipping information (name, address, tel, mobile) specific only for this order.
 * -- status: current order's status ('wait','notify','checking','approve','packing','done','received','deadline','problem','reserve','refund')
 * -- created_at / updated_at: order's create / update date.
 */
?>
<?php if (count($orders) > 0): ?>
    <table class="table table-condensed table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Order date</th>
                <th colspan="2">Name</th>
                <th class="price">Price (บาท)</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total_price = 0;
            foreach ($orders as $id => $order):
            ?>
                <tr class="item">
                    <td><?php print ++$id; ?></td>
                    <td><?php print $order->created_at->format('j F Y'); ?></td>
                    <td>
                        <?php print $order->product->title; ?>
                        <?php print $order->product->price_sale > 0 ? '<span class="status status-promotion">(promotion)</span>' : ''; ?>
                    </td>
                    <td>
                        <a class="action-cancel" onclick="return confirm('Are you sure to delete?');" href="<?php print base_url('orders/delete/' . $order->id); ?>">
                        <i class="icon-trash"></i>
                        </a>
                    </td>
                    <td class="price"><?php print number_format($order->product->price_sale > 0 ? $order->product->price_sale : $order->product->price, 2); ?></td>
                </tr>
            <?php
            $total_price += $order->product->price_sale > 0 ? $order->product->price_sale : $order->product->price;
            endforeach; 
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="summary" colspan="4">รวม</td>
                <td class="price"><?php print number_format($total_price, 2); ?></td>
            </tr>
        <?php if (isset($shipping_costs)): ?>
            <tr id="shipping">
                <td class="summary separator" colspan="4">ค่าจัดส่งแบบลงทะเบียน</td>
                <td class="price separator" ><?php print number_format($shipping_costs['normal'], 2); ?></td>
            </tr>
            <tr id="final_price">
                <td class="summary" colspan="4">รวมทั้งหมด</td>
                <td class="total-price price"><?php print number_format($total_price + $shipping_costs['normal'], 2); ?></td>
            </tr>
            <tr>
                <td class="summary separator" colspan="4">ค่าจัดส่งแบบ EMS</td>
                <td class="price separator" ><?php print number_format($shipping_costs['ems'], 2); ?></td>
            </tr>
            <tr>
                <td class="summary" colspan="4">รวมทั้งหมด</td>
                <td class="total-price price"><?php print number_format($total_price + $shipping_costs['ems'], 2); ?></td>
            </tr>
        <?php endif; ?>
        </tfoot>
    </table>
<?php endif; ?>
