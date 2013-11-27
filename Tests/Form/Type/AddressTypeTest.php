<?php
namespace Skonsoft\PostalAddressBundle\Tests\Form\Type;

use Skonsoft\PostalAddressBundle\Form\Type\AddressType,
    Skonsoft\PostalAddressBundle\Entity\Address;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Description of AddressTypeTest
 *
 * @author Skander MABROUK <mabroukskander@gmail.com>
 */
class AddressTypeTest extends TypeTestCase
{

    public function testSubmitValidData()
    {
        $formData = array(
            'street' => 'test',
            'complement' => 'test',
            'postalCode' => 92400,
            'city' => 'test',
            'state' => 'test',
            'country' => 'FR',
            'name' => 'test',
        );

        $type = new AddressType();


        $object = new Address();
        $object->setStreet($formData['street']);
        $object->setComplement($formData['complement']);
        $object->setPostalCode($formData['postalCode']);
        $object->setCity($formData['city']);
        $object->setState($formData['state']);
        $object->setCountry($formData['country']);
        $object->setName($formData['name']);

        $form = $this->factory->create($type);

        // submit the data to the form directly
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($object, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }

}