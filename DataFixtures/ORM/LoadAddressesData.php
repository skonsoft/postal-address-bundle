<?php
namespace Skonsoft\PostalAddressBundle\DataFixtures\ORM;

use Skonsoft\PostalAddressBundle\Entity\Address;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface,
    Doctrine\Common\Persistence\ObjectManager,
    Doctrine\Common\DataFixtures\AbstractFixture;

/**
 * Description of LoadAddressesData
 *
 * @author Skander MABROUK <mabroukskander@gmail.com>
 */
class LoadAddressesData extends AbstractFixture implements OrderedFixtureInterface
{
    protected $addresses = array(
        'address_bnp_defense' => array(
            'state_ref' => 'state_fr_haut_de_seine',
            'street' => '5 Rue Bellini',
            'city' => 'Puteaux',
            'postalCode' => '92800',
            'name' => 'BNP Paribas, Puteaux Agency'
        ),
        'address_person_paris' => array(
            'state_ref' => 'state_fr_paris',
            'street' => '13 Rue des roses',
            'city' => 'Paris 2e',
            'postalCode' => '75002',
            'name' => 'Mr Jacques François'
        ),
        'address_person_tunis' => array(
            'state_ref' => 'state_tn_tunis',
            'street' => '13 Rue des imazighen',
            'city' => 'Chartage',
            'postalCode' => '1003',
            'name' => 'Mr Akseel ayt Tihia'
        ),
        'address_airport_orly' => array(
            'state_ref' => 'state_fr_val_de_marne',
            'street' => 'Orly Sud 103',
            'complement' => 'Orly Aérogares cedex',
            'postalCode' => '94396',
            'name' => 'Aereport de Orly'
        ),
    );

    /**
     *  {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->addresses as $reference => $address) {
            $a = new Address();
            $a->setStreet($address['street']);
            $a->setPostalCode($address['postalCode']);
            $a->setCity(isset($address['city']) ? $address['city'] : null );
            $a->setName(isset($address['name']) ? $address['name'] : null );
            $a->setComplement(isset($address['complement']) ? $address['complement'] : null );
            $a->setState($this->getReference($address['state_ref']));

            $manager->persist($a);

            $this->addReference($reference, $a);
        }
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3;
    }

}