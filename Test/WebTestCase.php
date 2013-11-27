<?php
namespace Skonsoft\PostalAddressBundle\Test;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase as BaseWebTestCase;

/**
 * Description of WebTestCase
 *
 * @author Skander MABROUK <mabroukskander@gmail.com>
 */
class WebTestCase extends BaseWebTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager()
        ;
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        if ($this->em instanceof \Doctrine\ORM\EntityManager){
            $this->em->close();
        }
    }

}