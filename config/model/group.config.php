<?php

$options = \Arr::assoc_to_keyval(
    \Novius\Partners\Model_Partner::findContextOrMain((string) \Input::get('nosContext')),
    'part_id',
    'part_title'
);

return array(
    'fieldset_fields' => array(
        'group_id'    => array(
            'label' => '',
            'form'  => array(
                'type' => 'hidden',
            )
        ),
        'group_order' => array(
            'label' => '',
            'form'  => array(
                'type' => 'hidden',
            )
        ),
        'group_title' => array(
            'label' => __('Group title')
        ),
        'partners'    => array(
            'label'            => __('Partners'),
            'renderer'         => 'Novius\Renderers\Renderer_Multiselect',
            'renderer_options' => array(
                'sortable' => true
            ),
            'form'             => array(
                'options' => $options
            ),
            'populate'         => function ($item) {
                return array_keys($item->partners);
            },
        )
    )
);
