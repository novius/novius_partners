<?php
if (empty($partners)) {
    return '';
}
?>
<ul class="<?= \Arr::get($config, 'class') ?>">
    <?php
    foreach ($partners as $partner) {
        ?>
        <li>
            <?= \View::forge('novius_partners::front/partners/item', array('config' => $config, 'partner' => $partner)); ?>
        </li>
    <?php
    }
    ?>
</ul>