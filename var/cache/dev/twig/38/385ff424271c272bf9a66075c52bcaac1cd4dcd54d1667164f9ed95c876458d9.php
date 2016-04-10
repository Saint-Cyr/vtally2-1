<?php

/* SonataAdminBundle::empty_layout.html.twig */
class __TwigTemplate_5ade57203f72b3f6219e7fd438a448227855ac47515eea1e61043831017854e1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        $this->parent = $this->loadTemplate("SonataAdminBundle::standard_layout.html.twig", "SonataAdminBundle::empty_layout.html.twig", 12);
        $this->blocks = array(
            'sonata_header' => array($this, 'block_sonata_header'),
            'sonata_left_side' => array($this, 'block_sonata_left_side'),
            'sonata_nav' => array($this, 'block_sonata_nav'),
            'sonata_breadcrumb' => array($this, 'block_sonata_breadcrumb'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'sonata_wrapper' => array($this, 'block_sonata_wrapper'),
            'sonata_page_content' => array($this, 'block_sonata_page_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle::standard_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e2246a89d4e8eb35aa671fb22206c442fbd73942574ca8bf12b13741fe138c94 = $this->env->getExtension("native_profiler");
        $__internal_e2246a89d4e8eb35aa671fb22206c442fbd73942574ca8bf12b13741fe138c94->enter($__internal_e2246a89d4e8eb35aa671fb22206c442fbd73942574ca8bf12b13741fe138c94_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle::empty_layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e2246a89d4e8eb35aa671fb22206c442fbd73942574ca8bf12b13741fe138c94->leave($__internal_e2246a89d4e8eb35aa671fb22206c442fbd73942574ca8bf12b13741fe138c94_prof);

    }

    // line 14
    public function block_sonata_header($context, array $blocks = array())
    {
        $__internal_45e6a8d8e8d1d66af6b7e8038f569466f1dde29c2bb3e6d39505d84ce684b5b8 = $this->env->getExtension("native_profiler");
        $__internal_45e6a8d8e8d1d66af6b7e8038f569466f1dde29c2bb3e6d39505d84ce684b5b8->enter($__internal_45e6a8d8e8d1d66af6b7e8038f569466f1dde29c2bb3e6d39505d84ce684b5b8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_header"));

        
        $__internal_45e6a8d8e8d1d66af6b7e8038f569466f1dde29c2bb3e6d39505d84ce684b5b8->leave($__internal_45e6a8d8e8d1d66af6b7e8038f569466f1dde29c2bb3e6d39505d84ce684b5b8_prof);

    }

    // line 15
    public function block_sonata_left_side($context, array $blocks = array())
    {
        $__internal_7ddbe8ce574285b982631090d9e6f0327b97784ae1005b7b11d2f52c9fa6bd6f = $this->env->getExtension("native_profiler");
        $__internal_7ddbe8ce574285b982631090d9e6f0327b97784ae1005b7b11d2f52c9fa6bd6f->enter($__internal_7ddbe8ce574285b982631090d9e6f0327b97784ae1005b7b11d2f52c9fa6bd6f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_left_side"));

        
        $__internal_7ddbe8ce574285b982631090d9e6f0327b97784ae1005b7b11d2f52c9fa6bd6f->leave($__internal_7ddbe8ce574285b982631090d9e6f0327b97784ae1005b7b11d2f52c9fa6bd6f_prof);

    }

    // line 16
    public function block_sonata_nav($context, array $blocks = array())
    {
        $__internal_71f19c9eb5319c6f54b42ea3a27ccd9c9645d1567a019f97e98a195eb3ffde7e = $this->env->getExtension("native_profiler");
        $__internal_71f19c9eb5319c6f54b42ea3a27ccd9c9645d1567a019f97e98a195eb3ffde7e->enter($__internal_71f19c9eb5319c6f54b42ea3a27ccd9c9645d1567a019f97e98a195eb3ffde7e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_nav"));

        
        $__internal_71f19c9eb5319c6f54b42ea3a27ccd9c9645d1567a019f97e98a195eb3ffde7e->leave($__internal_71f19c9eb5319c6f54b42ea3a27ccd9c9645d1567a019f97e98a195eb3ffde7e_prof);

    }

    // line 17
    public function block_sonata_breadcrumb($context, array $blocks = array())
    {
        $__internal_3c529aae720504c6bb5ae2c690ae23d44876b54ac32329ed7a7247a1dcae4cf5 = $this->env->getExtension("native_profiler");
        $__internal_3c529aae720504c6bb5ae2c690ae23d44876b54ac32329ed7a7247a1dcae4cf5->enter($__internal_3c529aae720504c6bb5ae2c690ae23d44876b54ac32329ed7a7247a1dcae4cf5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_breadcrumb"));

        
        $__internal_3c529aae720504c6bb5ae2c690ae23d44876b54ac32329ed7a7247a1dcae4cf5->leave($__internal_3c529aae720504c6bb5ae2c690ae23d44876b54ac32329ed7a7247a1dcae4cf5_prof);

    }

    // line 19
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_40dd49bd382c9dad2df0cebd78a75919464b7133ba41bc6b4002df652b5a7f4e = $this->env->getExtension("native_profiler");
        $__internal_40dd49bd382c9dad2df0cebd78a75919464b7133ba41bc6b4002df652b5a7f4e->enter($__internal_40dd49bd382c9dad2df0cebd78a75919464b7133ba41bc6b4002df652b5a7f4e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 20
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "

    <style>
        .content {
            margin: 0px;
            padding: 0px;
        }
    </style>

";
        
        $__internal_40dd49bd382c9dad2df0cebd78a75919464b7133ba41bc6b4002df652b5a7f4e->leave($__internal_40dd49bd382c9dad2df0cebd78a75919464b7133ba41bc6b4002df652b5a7f4e_prof);

    }

    // line 31
    public function block_sonata_wrapper($context, array $blocks = array())
    {
        $__internal_66054440cc964239bc8e4d1b30ce07635ac2a407284a76421722fd9e0efaba0e = $this->env->getExtension("native_profiler");
        $__internal_66054440cc964239bc8e4d1b30ce07635ac2a407284a76421722fd9e0efaba0e->enter($__internal_66054440cc964239bc8e4d1b30ce07635ac2a407284a76421722fd9e0efaba0e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_wrapper"));

        // line 32
        echo "    ";
        $this->displayBlock('sonata_page_content', $context, $blocks);
        
        $__internal_66054440cc964239bc8e4d1b30ce07635ac2a407284a76421722fd9e0efaba0e->leave($__internal_66054440cc964239bc8e4d1b30ce07635ac2a407284a76421722fd9e0efaba0e_prof);

    }

    public function block_sonata_page_content($context, array $blocks = array())
    {
        $__internal_6b080ec97db5ab7f1073b528e0dc95e099f5a61896dbffb8817b67fbaee3e0f4 = $this->env->getExtension("native_profiler");
        $__internal_6b080ec97db5ab7f1073b528e0dc95e099f5a61896dbffb8817b67fbaee3e0f4->enter($__internal_6b080ec97db5ab7f1073b528e0dc95e099f5a61896dbffb8817b67fbaee3e0f4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_page_content"));

        // line 33
        echo "        ";
        $this->displayParentBlock("sonata_page_content", $context, $blocks);
        echo "
    ";
        
        $__internal_6b080ec97db5ab7f1073b528e0dc95e099f5a61896dbffb8817b67fbaee3e0f4->leave($__internal_6b080ec97db5ab7f1073b528e0dc95e099f5a61896dbffb8817b67fbaee3e0f4_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle::empty_layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 33,  114 => 32,  108 => 31,  90 => 20,  84 => 19,  73 => 17,  62 => 16,  51 => 15,  40 => 14,  11 => 12,);
    }
}
/* {#*/
/* */
/* This file is part of the Sonata package.*/
/* */
/* (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>*/
/* */
/* For the full copyright and license information, please view the LICENSE*/
/* file that was distributed with this source code.*/
/* */
/* #}*/
/* */
/* {% extends 'SonataAdminBundle::standard_layout.html.twig' %}*/
/* */
/* {% block sonata_header %}{% endblock %}*/
/* {% block sonata_left_side %}{% endblock %}*/
/* {% block sonata_nav %}{% endblock %}*/
/* {% block sonata_breadcrumb %}{% endblock %}*/
/* */
/* {% block stylesheets %}*/
/*     {{ parent() }}*/
/* */
/*     <style>*/
/*         .content {*/
/*             margin: 0px;*/
/*             padding: 0px;*/
/*         }*/
/*     </style>*/
/* */
/* {% endblock %}*/
/* */
/* {% block sonata_wrapper %}*/
/*     {% block sonata_page_content %}*/
/*         {{ parent() }}*/
/*     {% endblock %}*/
/* {% endblock %}*/
/* */
