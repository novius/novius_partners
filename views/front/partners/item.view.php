<span>
<?php
if (!empty($partner->part_link) && !empty($config['show_link'])) {
?>
    <a href="<?= $partner->part_link ?>" target="_blank"
       class="partner">
        <?php
        }
        echo \View::forge('novius_partners::front/partners/media', array('config' => $config, 'partner' => $partner));
        if (!empty($partner->part_link) && !empty($config['show_link'])) {
        ?>
    </a>
<?php
}
?>
</span>