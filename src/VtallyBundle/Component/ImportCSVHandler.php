<?php

// src/Fungus/ShortyBundle/Block/ImportCSVService.php

namespace VtallyBundle\Component;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\BlockBundle\Block\BlockContextInterface;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Validator\ErrorElement;
use Sonata\BlockBundle\Block\BaseBlockService;
use VtallyBundle\Component\CSVTypes;

class ImportCSVHandler extends BaseBlockService
{

    private $container = null;

    public function __construct($name, $templating, $container=null)
    {
        parent::__construct($name, $templating);
        $this->container = $container;  
    }

    public function getName()
    {
        return 'Import CSV';
    }

    public function getDefaultSettings()
    {
        return array();
    }

    public function validateBlock(ErrorElement $errorElement, BlockInterface $block)
    {
    }

    public function buildEditForm(FormMapper $formMapper, BlockInterface $block)
    {
    }

    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        // merge settings
        $settings = array_merge($this->getDefaultSettings(), $blockContext->getSettings());

        $curBlock='VtallyBundle:Block:block_importCSV.html.twig';
        //if (!$this->container->get('security.context')->isGranted("ROLE_SUPER_ADMIN")) {
            $curBlock='VtallyBundle:Block:block_importCSV.html.twig';
            //$curBlock='VtallyBundle:Block:block_empty.html.twig';
        //}

        return $this->renderResponse($curBlock, array(
            'block'     => $blockContext->getBlock(),
            'allTypes'  => CSVTypes::getTypesAndIds(),
            'settings'  => $settings
            ), $response);
    }
}