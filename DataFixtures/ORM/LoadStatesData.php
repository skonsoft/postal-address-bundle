<?php
namespace Skonsoft\PostalAddressBundle\DataFixtures\ORM;

use Skonsoft\PostalAddressBundle\Entity\State;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface,
    Doctrine\Common\Persistence\ObjectManager,
    Doctrine\Common\DataFixtures\AbstractFixture;

/**
 * Description of LoadStatesData
 *
 * @author Skander MABROUK <mabroukskander@gmail.com>
 */
class LoadStatesData extends AbstractFixture implements OrderedFixtureInterface
{
    protected $states = array(
        'state_fr_paris' => array('country_ref' => 'country_fr', 'name' => 'Paris'),
        'state_fr_haut_de_seine' => array('country_ref' => 'country_fr', 'name' => 'Haut de seine'),
        'state_fr_val_de_marne' => array('country_ref' => 'country_fr', 'name' => 'Val de marne'),
        'state_fr_grenoble' => array('country_ref' => 'country_fr', 'name' => 'Grenoble'),
        'state_fr_marseille' => array('country_ref' => 'country_fr', 'name' => 'Marseille'),
        'state_fr_lyon' => array('country_ref' => 'country_fr', 'name' => 'Lyon'),
        'state_es_barcelona' => array('country_ref' => 'country_es', 'name' => 'Barcelona'),
        'state_es_madrid' => array('country_ref' => 'country_es', 'name' => 'Madrid'),
        'state_it_milan' => array('country_ref' => 'country_it', 'name' => 'Milan'),
        'state_it_torino' => array('country_ref' => 'country_it', 'name' => 'Torino'),
        'state_it_roma' => array('country_ref' => 'country_it', 'name' => 'Roma'),
        'state_tn_tunis' => array('country_ref' => 'country_tn', 'name' => 'Tunis'),
        'state_tn_sousse' => array('country_ref' => 'country_tn', 'name' => 'Sousse'),
        'state_tn_gafsa' => array('country_ref' => 'country_tn', 'name' => 'Gafsa'),
    );

    /**
     *  {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->states as $reference => $state) {
            $s = new State();
            $s->setName($state['name']);
            $s->setCountry($this->getReference($state['country_ref']));
            $manager->persist($s);

            $this->addReference($reference, $s);
        }
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }

}