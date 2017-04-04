<?php

namespace Novius\Partners;

class Model_Partner extends \Nos\Orm\Model
{

    protected static $_primary_key = array('part_id');
    protected static $_table_name = 'novius_partner';

    protected static $_properties = array(
        'part_id',
        'part_title',
        'part_link',
        'part_created_at',
        'part_updated_at',
        'part_context',
        'part_context_common_id',
        'part_context_is_main',
    );

    protected static $_title_property = 'part_title';

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'mysql_timestamp' => true,
            'property'        => 'part_created_at'
        ),
        'Orm\Observer_UpdatedAt' => array(
            'mysql_timestamp' => true,
            'property'        => 'part_updated_at'
        )
    );

    protected static $_behaviours = array(
        'Nos\Orm_Behaviour_Twinnable' => array(
            'context_property'   => 'part_context',
            'common_id_property' => 'part_context_common_id',
            'is_main_property'   => 'part_context_is_main',
        ),
    );

    protected static $_belongs_to = array();
    protected static $_has_one = array();
    protected static $_has_many = array();
    protected static $_many_many = array();

    protected static $_twinnable_belongs_to = array();
    protected static $_twinnable_has_one = array();
    protected static $_twinnable_has_many = array();
    protected static $_twinnable_many_many = array(
        'groups' => array(
            'table_through'    => 'novius_partner_group_partner',
            'key_from'         => 'part_context_common_id',
            'key_through_from' => 'grpa_part_id',
            'key_through_to'   => 'grpa_group_id',
            'cascade_save'     => false,
            'cascade_delete'   => false,
            'model_to'         => Model_Group::class,
        ),
    );
    protected static $_attachment = array();
}
