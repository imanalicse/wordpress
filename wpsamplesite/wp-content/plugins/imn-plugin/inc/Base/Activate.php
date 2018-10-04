<?php
/**
 * @package  ImnPlugin
 */

namespace Imn_Inc\Base;

class Activate
{

    public static function activate()
    {
        flush_rewrite_rules();
    }
}