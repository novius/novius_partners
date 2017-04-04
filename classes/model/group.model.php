<?php

namespace Novius\Partners;

class Model_Group extends \Nos\Orm\Model
{

    protected static $_primary_key = array('group_id');
    protected static $_table_name = 'novius_partner_group';

    protected static $_properties = array(
        'group_id',
        'group_title',
        'group_created_at',
        'group_updated_at',
        'group_context',
        'group_context_common_id',
        'group_context_is_main',
    );

    protected static $_title_property = 'group_nom';

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'mysql_timestamp' => true,
            'property'        => 'group_created_at'
        ),
        'Orm\Observer_UpdatedAt' => array(
            'mysql_timestamp' => true,
            'property'        => 'group_updated_at'
        )
    );

    protected static $_behaviours = array(
        'Nos\Orm_Behaviour_Twinnable' => array(
            'context_property'   => 'group_context',
            'common_id_property' => 'group_context_common_id',
            'is_main_property'   => 'group_context_is_main',
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
        'partners' => array(
            'table_through'     => 'novius_partner_group_partner',
            'key_from'          => 'group_context_common_id',
            'key_through_from'  => 'grpa_group_id',
            'key_through_to'    => 'grpa_part_id',
            'key_through_order' => 'grpa_order',
            'cascade_save'      => false,
            'cascade_delete'    => false,
            'model_to'          => Model_Partner::class,
            'conditions'        => array(
                'order_by' => array(
                    'novius_partner_group_partner.grpa_order' => 'ASC',
                ),
            ),
        ),
    );
    protected static $_attachment = array();
}
