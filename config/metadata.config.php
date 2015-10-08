<?php
return array(
    'name'       => __('Partners'),
    'version'    => '1.0',
    'provider'   => array(
        'name' => 'Smeeckaert Martin',
    ),
    'namespace'  => "Novius\Partners",
    'permission' => array(),
    'requires'   => array('novius_renderers'),
    'icons'      => array(
        64 => 'static/apps/novius_partners/img/icon/64.png',
        32 => 'static/apps/novius_partners/img/icon/32.png',
        16 => 'static/apps/novius_partners/img/icon/16.png',
    ),
    'launchers'  => array(
        'Novius\Partners::Partners' => array(
            'name'   => __('Partners'), // displayed name of the launcher
            'action' => array(
                'action' => 'nosTabs',
                'tab'    => array(
                    'url' => 'admin/novius_partners/partner/appdesk', // url to load
                ),
            ),
        ),
    ),
    'enhancers'  => array(
        'novius_partners_group' => array( // key must be defined
            'title'    => 'Partners - Groups',
            'desc'     => '',
            'enhancer' => 'novius_partners/front/partner/main', // URL of the enhancer
            'dialog'   => array(
                'contentUrl' => 'admin/novius_partners/partner/enhancer/popup',
                'width'      => 800,
                'height'     => 500,
                'ajax'       => true,
            ),
        ),
        'novius_partners_list'  => array( // key must be defined
            'title'    => 'Partners List',
            'desc'     => '',
            'enhancer' => 'novius_partners/front/partner/list', // URL of the enhancer
            'dialog'   => array(
                'contentUrl' => 'admin/novius_partners/partner/list/popup',
                'width'      => 800,
                'height'     => 500,
                'ajax'       => true,
            ),
        ),
    ),
);
