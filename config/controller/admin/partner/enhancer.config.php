<?php

return array(
    'popup'  => array(
        'layout' => array(
            'view' => 'novius_partners::admin/enhancer/popup',
        ),
    ),
    'fields' => array(
        'partners' => array(
            'label'            => __('Partners'),
            'renderer'         => 'Novius\Renderers\Renderer_HasMany',
            'renderer_options' => array(
                'model' => 'Novius\Partners\Model_Group',
                'order' => true,
            ),
        ),
    ),
);
