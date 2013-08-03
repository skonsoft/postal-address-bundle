<?php
namespace Skonsoft\PostalAddressBundle\DataFixtures\ORM;

use Skonsoft\PostalAddressBundle\Entity\Country;
use Doctrine\Common\DataFixtures\FixtureInterface,
    Doctrine\Common\Persistence\ObjectManager,
    Doctrine\Common\DataFixtures\AbstractFixture;

/**
 * Description of LoadCountriesData
 *
 * @author Skander MABROUK <mabroukskander@gmail.com>
 */
class LoadCountriesData extends AbstractFixture implements FixtureInterface
{
    protected $countries = array(
        'country_fr' => array('isoName' => 'FR', 'name' => 'France'),
        'country_es' => array('isoName' => 'ES', 'name' => 'Spain'),
        'country_tn' => array('isoName' => 'TN', 'name' => 'Tunisia'),
        'country_it' => array('isoName' => 'IT', 'name' => 'Italy'),
    );

    /**
     *  {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->countries as $reference => $country) {
            $c = new Country();
            $c->setIsoName($country['isoName']);
            $c->setName($country['name']);
            $manager->persist($c);

            $this->addReference($reference, $c);
        }
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }

}