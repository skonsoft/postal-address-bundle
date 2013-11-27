<?php
namespace Skonsoft\PostalAddressBundle\Test\Entity;

use Skonsoft\PostalAddressBundle\Test\WebTestCase;
use Skonsoft\PostalAddressBundle\Entity\Address;

/**
 * Description of AddressTest
 *
 * @author Skander MABROUK <mabroukskander@gmail.com>
 */
class AddressTest extends WebTestCase
{

    protected function getObjectFromArray($data)
    {
        $entity = new Address();
        $entity->setStreet($data['street']);
        $entity->setComplement($data['complement']);
        $entity->setPostalCode($data['postalCode']);
        $entity->setCity($data['city']);
        $entity->setState($data['state']);
        $entity->setCountry($data['country']);
        $entity->setName($data['name']);

        return $entity;
    }

    /**
     * @dataProvider getValidTestData
     */
    public function testIsValid($data)
    {

        $entity = $this->getObjectFromArray($data);

        $validator = static::$kernel->getContainer()->get('validator');

        $errors = $validator->validate($entity);

        $this->assertEquals(0, count($errors));
    }
    
    /**
     * @dataProvider getInvalidTestData
     */
    public function testNotValid($data)
    {

        $entity = $this->getObjectFromArray($data);

        $validator = static::$kernel->getContainer()->get('validator');

        $errors = $validator->validate($entity);

        $this->assertGreaterThan(0, count($errors));
    }

    public function getValidTestData()
    {
        return array(
            array(
                'data' => array(
                    'street' => 'test',
                    'complement' => 'test',
                    'postalCode' => 92400,
                    'city' => 'test',
                    'state' => 'test',
                    'country' => 'FR',
                    'name' => 'test',
                ),
            ),
            array(
                'data' => array(
                    'street' => '22 rue des roses',
                    'complement' => '',
                    'postalCode' => 75001,
                    'city' => 'Paris',
                    'state' => 'Ile de France',
                    'country' => 'FR',
                    'name' => null
                ),
            ),
            array(
                'data' => array(
                    'street' => '71 rue de la liberté',
                    'complement' => 'Lafayette',
                    'postalCode' => 1001,
                    'city' => 'Tunis',
                    'state' => null,
                    'country' => 'TUN',
                    'name' => 'adresse de TV Tunisienne',
                ),
            ),
        );
    }
    
    public function getInvalidTestData()
    {
        return array(
            array(
                'data' => array(
                    'street' => '',
                    'complement' => '',
                    'postalCode' => '',
                    'city' => '',
                    'state' => '',
                    'country' => '',
                    'name' => '',
                ),
            ),
            array(
                'data' => array(
                    'street' => '22 rue des roses',
                    'complement' => '',
                    'postalCode' => '75001',//check postal code, should be numeric
                    'city' => 'Paris',
                    'state' => 'Ile de France',
                    'country' => 'FR',
                    'name' => null
                ),
            ),
            array(
                'data' => array(
                    'street' => '71 rue de la liberté',
                    'complement' => 'Lafayette',
                    'postalCode' => 1001,
                    'city' => 'Tunis',
                    'state' => null,
                    'country' => 'TUNI', //check country should be less than 4 chars
                    'name' => 'adresse de TV Tunisienne',
                ),
            ),
            array(
                'data' => array(
                    'street' => '71 rue de la liberté',
                    'complement' => 'Lafayette',
                    'postalCode' => 1001,
                    'city' => 'Tunis',
                    'state' => null,
                    'country' => 'T', //check country should be more than than 2 chars
                    'name' => 'adresse de TV Tunisienne',
                ),
            ),
        );
    }

}