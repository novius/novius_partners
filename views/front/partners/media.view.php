<?php
$media = $partner->medias->logo;

$size = \Arr::get($config, 'size');
if (!empty($media) && !empty($size)) {
    $width  = \Arr::get($size, 'width', null);
    $height = \Arr::get($size, 'height', null);
    $media  = $media->getToolkitImage()->resize($width, $height);
}

if (!empty($media)) {
    ?>
    <img src="<?= $media->url() ?>"
         alt="<?= $partner->part_title ?>"
         title="<?= $partner->part_title ?>"/>
<?php
}

