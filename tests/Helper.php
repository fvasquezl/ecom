<?php
/**
 * Created by PhpStorm.
 * User: fvasquez
 * Date: 8/08/18
 * Time: 01:23 PM
 */

namespace Tests;


use App\User;

trait Helper
{
   protected $adminUser;
   protected $clientUser;

    public function createAdmin()
    {
        if ($this->adminUser){
            return $this->adminUser;
        }
        $admin = factory(User::class)->create([
            'role' => 'admin'
        ]);

        return $admin;
   }
}