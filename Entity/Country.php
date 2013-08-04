<?php
namespace Skonsoft\PostalAddressBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * Country
 *
 * @ORM\Table(name="ss_address__country", uniqueConstraints={@ORM\UniqueConstraint(name="ison_name_idx", columns={"iso_name"})} )
 * @ORM\Entity(repositoryClass="Skonsoft\PostalAddressBundle\Entity\CountryRepository")
 */
class Country
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
     * @var string
     *
     * @ORM\Column(name="iso_name", type="string", length=3, nullable=true)
     */
    private $isoName;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Skonsoft\PostalAddressBundle\Entity\State", mappedBy="country", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $states;

    public function __construct()
    {
        $this->states = new ArrayCollection();
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
     *
     * @return Country
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
     * Set isoName
     *
     * @param string $isoName
     *
     * @return Country
     */
    public function setIsoName($isoName)
    {
        $this->isoName = $isoName;

        return $this;
    }

    /**
     * Get isoName
     *
     * @return string
     */
    public function getIsoName()
    {
        return $this->isoName;
    }

    /**
     * Set states
     *
     * @param \Doctrine\Common\Collections\ArrayCollection\ArrayCollection $states
     *
     * @return \Skonsoft\PostalAddressBundle\Entity\Country
     */
    public function setStates(ArrayCollection $states)
    {
        $this->states = $states;

        return $this;
    }

    /**
     * Get states
     *
     * @return ArrayCollection
     */
    public function getStates()
    {
        return $this->states;
    }

    /**
     * @param State $state
     *
     * @return \Skonsoft\PostalAddressBundle\Entity\Country
     */
    public function addState(State $state)
    {
        $state->setCountry($this);
        $this->states->add($state);

        return $this;
    }

    /**
     * @param State $state
     *
     * @return \Skonsoft\PostalAddressBundle\Entity\Country
     */
    public function removeState(State $state)
    {
        $this->states->removeElement($state);
        unset($state);

        return $this;
    }
}
