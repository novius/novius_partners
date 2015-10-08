# Novius Partners

Partners is an application used to display logos from different partners in a list or in a collection of groups.


A partner is an entity composed of an image, a title and a link, a group is an entity composed of a title and numerous
partners.

The application add a launcher and two renderers.

## Configuration

The configuration of the display can be set in the config/partners file.

Common properties can be set for each rendering mode, (ie 'list', 'groups').

### Common

#### class
The class of the container

#### size
An associative array 'width', 'height' that can be used to restrict the size of the image.

### show_link

Display or not a link around each item of the list.

### Groups

There are some extra properties for the 'groups' rendering mode.

#### title_tag / title_tag_closing

The tags used display the title of the group.


## Integration in an existing model

It is made easy to integrate partners in an existing model.

First, you need to add a relationship.

```php
protected static $_has_many = array(
    'groups'   => array(
        'key_from'       => 'model_id', // Column on this model
        'model_to'       => 'Novius\Partners\Model_Group',
        'key_to'         => 'group_foreign_id',
        'cascade_save'   => true,
        'cascade_delete' => true,
        'conditions'     => array(
            'where'    => array(array('group_foreign_model', '=', __CLASS__)),
            'order_by' => array('group_order')
        )
    ),
);
```

And then you can add it in your CRUD.


```php
'groups'                                      => array(
    'label'            => '',
    'renderer'         => 'Novius\Renderers\Renderer_HasMany',
    'renderer_options' => array(
        'model' => 'Novius\Partners\Model_Group',
        'order' => true,
    ),
    'template'         => '{field}',
    'before_save'      => function ($item, $data) {
        $values       = (array)\Input::post('groups');
        $item->groups = array();
        foreach ($values as $v) {
            if (empty($v['group_title']) && empty($v['partners'])) {
                continue;
            }
            if (!empty($v['group_id'])) {
                $g = \Novius\Partners\Model_Group::find($v['group_id']);
            } else {
                $g = \Novius\Partners\Model_Group::forge();
            }
            $g->group_order         = $v['group_order'];
            $g->group_title         = $v['group_title'];
            $g->group_foreign_model = get_class($item);
            $g->partners            = array();
            if (!empty($v['partners'])) {
                $g->partners = \Novius\Partners\Model_Partner::query()->where('part_id', 'IN', $v['partners'])->get(); //@todo change to sort after
                usort($g->partners, function ($a, $b) use ($v) {
                    return array_search($a->part_id, $v['partners']) - array_search($b->part_id, $v['partners']);
                });
            }
            if (!empty($v['group_id'])) {
                $item->groups[$v['group_id']] = $g;
            } else {
                $item->groups[] = $g;
            }
        }
    }
),

```