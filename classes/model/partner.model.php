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

    protected static $_behaviours = array();

    protected static $_belongs_to = array();
    protected static $_has_one = array();
    protected static $_has_many = array();
    protected static $_many_many = array(
        'groups' => array( // key must be defined, relation will be loaded via $partenaire->key
            'table_through'    => 'novius_partner_group_partner', // intermediary table must be defined
            'key_from'         => 'part_id', // Column on this model
            'key_through_from' => 'grpa_part_id', // Column "from" on the intermediary table
            'key_through_to'   => 'grpa_group_id', // Column "to" on the intermediary table
            'key_to'           => 'group_id', // Column on the other model
            'cascade_save'     => false,
            'cascade_delete'   => false,
            'model_to'         => 'Novius\Partners\Model_Group', // Model to be defined
        ),
    );

    protected static $_twinnable_belongs_to = array();
    protected static $_twinnable_has_one = array();
    protected static $_twinnable_has_many = array();
    protected static $_twinnable_many_many = array();
    protected static $_attachment = array();
}
