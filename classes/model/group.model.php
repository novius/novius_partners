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

    protected static $_behaviours = array();

    protected static $_belongs_to = array();
    protected static $_has_one = array();
    protected static $_has_many = array();
    protected static $_many_many = array(
        'partners' => array( // key must be defined, relation will be loaded via $groupement->key
            'table_through'     => 'novius_partner_group_partner', // intermediary table must be defined
            'key_from'          => 'group_id', // Column on this model
            'key_through_from'  => 'grpa_group_id', // Column "from" on the intermediary table
            'key_through_to'    => 'grpa_part_id', // Column "to" on the intermediary table
            'key_to'            => 'part_id', // Column on the other model
            'key_through_order' => 'grpa_order',
            'cascade_save'      => false,
            'cascade_delete'    => false,
            'model_to'          => 'Novius\Partners\Model_Partner', // Model to be defined
            'conditions'        => array(
                'order_by' =>
                    array(
                        'novius_partner_group_partner.grpa_order' => 'ASC'
                    )
            )
        ),
    );

    protected static $_twinnable_belongs_to = array();
    protected static $_twinnable_has_one = array();
    protected static $_twinnable_has_many = array();
    protected static $_twinnable_many_many = array();
    protected static $_attachment = array();
}
