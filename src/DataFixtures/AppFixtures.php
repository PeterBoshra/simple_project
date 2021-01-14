<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $admin = new Admin();
         $admin->setEmail("admin@admin.com");
         $admin->setPassword('$argon2id$v=19$m=65536,t=4,p=1$+aQYD8FNjA+5eMvSxubCSA$60jyNp/et67AgcKILScNC1kiljZe8IXdtGop7luNuDY');
         $admin->setUsername('admin');
         $admin->setRoles(['ROLE_ADMIN']);
         $manager->persist($admin);

        $manager->flush();
    }
}
