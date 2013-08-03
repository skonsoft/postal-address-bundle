<?php
namespace Skonsoft\PostalAddressBundle\Tests\Entity;

use Skonsoft\PostalAddressBundle\Test\WebTestCase,
    Skonsoft\PostalAddressBundle\Entity\Country;

/**
 * Test of CountryTest
 *
 * @author Skander MABROUK <mabroukskander@gmail.com>
 */
class CountryTest extends WebTestCase
{

    /**
     * @expectedException Doctrine\DBAL\DBALException
     */
    public function testUniqueIsoName()
    {
        $c = new Country();
        $c->setName('Skonsoft');
        $c->setIsoName('ss');

        $c1 = clone $c;

        $this->em->persist($c);
        $this->em->persist($c1);
        $this->em->flush();
    }

}
