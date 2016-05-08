<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 9/25/15
 * Time: 4:20 AM
 */

namespace Multi\Packages\Acl\Traits;


interface HasRolesContract
{
    public function roles();
    public function permissions();
    public function assignRole($role);
    public function removeRole($role);
    public function hasRole($roles);
    public function hasPermission($permission);
}