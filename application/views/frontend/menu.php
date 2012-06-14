<?php
/**
 * @file menu.php
 *
 * Template view for the main menu.
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
<ul class="nav nav-pills">
<?php
foreach ($items as $menu_item):
    $url = base_url($menu_item->link);
?>
    <li<?php print $menu_item->link == uri_string(current_url()) ? ' class="active"' : ''; ?>>
        <?php print anchor($url, $menu_item->title); ?>
    </li>
<?php endforeach; ?>
</ul>
