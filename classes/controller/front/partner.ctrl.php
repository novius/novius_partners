<?php

namespace Novius\Partners;

use Nos\Controller_Front_Application;

class Controller_Front_Partner extends Controller_Front_Application
{

    public function action_main($args = array())
    {
        $groups = array();
        if (!empty($args['partners'])) {
            $data = $args['partners'];
            usort($data, function ($a, $b) {
                return $a['group_order'] - $b['group_order'];
            });
            if (!empty($data)) {
                foreach ($data as $groupe) {
                    $iGroup = new \stdClass();
                    foreach ($groupe as $key => $value) {
                        $iGroup->$key = $value;
                    }
                    if (!empty($iGroup->partners)) {
                        $partList         = $iGroup->partners;
                        $iGroup->partners = array();
                        foreach ($partList as $part) {
                            $model                             = Model_Partner::find($part);
                            $iGroup->partners[$model->part_id] = $model;
                        }
                    }
                    $groups[] = $iGroup;
                }
            }
        }
        $config      = \Config::load('novius_partners::partners', true);
        $groupConfig = \Arr::get($config, 'groups', array());
        return \View::forge('novius_partners::front/partners', array('groups' => $groups, 'config' => $groupConfig), false);
    }

    public function action_list($args)
    {
        if (!empty($args['partners'])) {
            $partners = array();
            foreach ($args['partners'] as $partId) {
                $partners[] = Model_Partner::find($partId);
            }
        }
        $config     = \Config::load('novius_partners::partners', true);
        $listConfig = \Arr::get($config, 'list', array());
        return \View::forge('novius_partners::front/list', array('partners' => $partners, 'config' => $listConfig), false);

    }

}
