<?php
return array(
    'controller_url' => 'admin/novius_partners/partner/crud',
    'model'          => 'Novius\Partners\Model_Partner',
    'layout'         => array(
        'large'   => true,
        'title'   => 'part_title',
        'medias'  => array('medias->logo->medil_media_id'),
        'content' => array(
            'properties' => array(
                'view'   => 'nos::form/expander',
                'params' => array(
                    'title'    => __('Properties'),
                    'nomargin' => true,
                    'options'  => array(
                        'allowExpand' => false,
                    ),
                    'content'  => array(
                        'view'   => 'nos::form/fields',
                        'params' => array(
                            'fields' => array(
                                'part_link'
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'fields'         => array(
        'part__id'                     => array(
            'label'     => 'ID: ',
            'form'      => array(
                'type' => 'hidden',
            ),
            'dont_save' => true,
        ),
        'part_title'                   => array(
            'label' => __('Title'),
            'form'  => array(
                'type' => 'text',
            ),
        ),
        'part_link'                    => array(
            'label' => __('Link'),
            'form'  => array(
                'type' => 'text',
            ),
        ),
        'medias->logo->medil_media_id' => array(
            'label'            => '',
            'renderer'         => 'Nos\Media\Renderer_Media',
            'renderer_options' => array(
                'mode'           => 'image',
                'inputFileThumb' => array(
                    'title' => __('Logo'),
                ),
            ),
            'form'             => array(
                'title' => __('Logo'),
            ),
        ),
    )
);
