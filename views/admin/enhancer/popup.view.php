<br>
<br>
<h1><?= __('Partners configurations :'); ?></h1>
<p>
<span style="font-style:italic;">
<?= __('Please select here the partners to display.') ?>
</span>
</p>
<br/>

<?php

$fieldPartners = $fieldset->field('partners');

if (!empty($enhancer_args)) {
    $partners = \Arr::get($enhancer_args, 'partners');
    if (!empty($partners)) {
        usort($partners, function ($a, $b) {
            return $a['group_order'] - $b['group_order'];
        });
        foreach ($partners as $key => $infos) {
            $listPartners = array();
            if (!empty($infos['partners'])) {
                foreach ($infos['partners'] as $part) {
                    $partItem                         = \Novius\Partners\Model_Partner::find($part);
                    $listPartners[$partItem->part_id] = $partItem;
                }
            }
            $partners[$key]['partners'] = $listPartners;
        }
        $fieldPartners->set_value($partners);
    }
}
?>

<div>
    <?= $fieldPartners->build(); ?>
</div>
