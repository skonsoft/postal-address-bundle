<?php
namespace Skonsoft\PostalAddressBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressType extends AbstractType
{
    private $dataClass;

    public function __construct($dataClass = 'Skonsoft\PostalAddressBundle\Entity\Address')
    {
        $this->dataClass = $dataClass;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('street', null, array('label' => 'form.street', 'translation_domain' => 'SkonsoftPostalAddressBundle'))
            ->add('complement', null, array('label' => 'form.complement', 'translation_domain' => 'SkonsoftPostalAddressBundle'))
            ->add('postalCode', null, array('label' => 'form.postalCode', 'translation_domain' => 'SkonsoftPostalAddressBundle'))
            ->add('city', null, array('label' => 'form.city', 'translation_domain' => 'SkonsoftPostalAddressBundle'))
            ->add('name', null, array('label' => 'form.name', 'translation_domain' => 'SkonsoftPostalAddressBundle'))
            ->add('state', null, array('label' => 'form.state', 'translation_domain' => 'SkonsoftPostalAddressBundle'))
            ->add('country', 'country', array('label' => 'form.country', 'translation_domain' => 'SkonsoftPostalAddressBundle'))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->dataClass
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'skonsoft_postaladdressbundle_address';
    }

}