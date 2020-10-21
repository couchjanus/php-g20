<?php
/**
 * class Role
 */

require_once CORE.'/Model.php';

class Role extends Model
{
    protected static $table = 'roles';
    protected static $primaryKey = 'id';
}
