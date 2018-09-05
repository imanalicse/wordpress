<?php

class ImnPluginDeactivate
{

    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}