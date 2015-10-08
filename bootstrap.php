<?php

\Event::register_function('novius_renderers.hasmany_fieldset', function ($args) {
    $index    = $args['index'];
    $relation = $args['relation'];
    switch ($relation) {
        case 'partners':
            $args['replaces']['"partners[]"'] = '"' . $relation . '[' . $index . '][partners][]"';
            break;
        case 'groups':
            $args['replaces']['"partners[]"'] = '"' . $relation . '[' . $index . '][partners][]"';
            break;
    }

});
