<?php
/**
 * @file sidebar_menu.php
 *
 * Template view for the sidebar menu.
 *
 * Available variables:
 * $items: menu items array contains some properties:
 * -- link: relative path (except static directory.)
 * -- title: human-readable text for the link.
 * -- weight: this value is used for sort menu items.
 * 
 * Note for developers:
 * Collect menu items with foreach() loop and create output as example below:
 * foreach ($items as $menu_item):
 *   print '<a href="' . $menu_item->link . '">' . $menu_item->title . '</a>';
 * endforeach;
 * 
 */
?>
<ul class="nav nav-list">
    <li class="nav-header"><?php print anchor(base_url('products'), 'Products'); ?></li>
<?php
foreach ($items as $menu_item):
    $path = 'products/category/' . $menu_item->id;
    $url = base_url($path);
?>
    <li<?php print $path == uri_string(current_url()) ? ' class="active"' : ''; ?>>
        <?php print anchor($url, $menu_item->title); ?>
    </li>
<?php endforeach; ?>
</ul>
