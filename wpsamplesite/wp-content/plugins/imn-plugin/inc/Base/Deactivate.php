<?php
/**
 * @package  ImnPlugin
 */

namespace Imn_Inc\Base;

class Deactivate
{
    public function deactivate()
    {
        flush_rewrite_rules();
    }
}