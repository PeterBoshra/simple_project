<?php

namespace App\DataFixtures;

use App\Entity\Currency;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CurrencyFixtures extends Fixture
{
    /*
     * INSERT INTO `admin` (`id`, `email`, `roles`, `password`, `username`)
VALUES
	(1, 'admin@admin.com', X'5B22524F4C455F41444D494E225D', '$argon2id$v=19$m=65536,t=4,p=1$+aQYD8FNjA+5eMvSxubCSA$60jyNp/et67AgcKILScNC1kiljZe8IXdtGop7luNuDY', 'admin@admin.com');

     * */
    public const DEFAULT_CURRENCY = 'EGP';

    public function load(ObjectManager $manager)
    {

        // create 5 currencies! Bam!
        for ($i = 0; $i < 5; $i++) {
            $currency = new Currency();
            $currency->setName('CU'.$i);
            $manager->persist($currency);
        }
        $this->addReference(self::DEFAULT_CURRENCY, $currency);

        $manager->flush();
    }
}
