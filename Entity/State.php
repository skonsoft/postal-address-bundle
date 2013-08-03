<?php
namespace Skonsoft\PostalAddressBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * State
 *
 * @ORM\Table(name="ss_address__state")
 * @ORM\Entity(repositoryClass="Skonsoft\PostalAddressBundle\Entity\StateRepository")
 */
class State
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var Country
     *
     * @ORM\ManyToOne(targetEntity="Skonsoft\PostalAddressBundle\Entity\Country")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id", nullable=false)
     */
    private $country;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Skonsoft\PostalAddressBundle\Entity\Address", mappedBy="state", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $addresses;

    public function __construct()
    {
        $this->addresses = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return State
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \Skonsoft\PostalAddressBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param \Skonsoft\PostalAddressBundle\Entity\Country $country
     *
     * @return \Skonsoft\PostalAddressBundle\Entity\State
     */
    public function setCountry(Country $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Set addresses
     *
     * @param \Doctrine\Common\Collections\ArrayCollection\ArrayCollection $addresses
     *
     * @return \Skonsoft\PostalAddressBundle\Entity\State
     */
    public function setAddresses(ArrayCollection $addresses)
    {
        $this->addresses = $addresses;

        return $this;
    }

    /**
     * Get addresses
     *
     * @return ArrayCollection
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param Address $address
     *
     * @return \Skonsoft\PostalAddressBundle\Entity\State
     */
    public function addAddress(Address $address)
    {
        $address->setState($this);
        $this->addresses->add($address);

        return $this;
    }

    /**
     * @param Address $address
     *
     * @return \Skonsoft\PostalAddressBundle\Entity\State
     */
    public function removeAddress(Address $address)
    {
        $this->addresses->removeElement($address);
        unset($address);

        return $this;
    }
}
