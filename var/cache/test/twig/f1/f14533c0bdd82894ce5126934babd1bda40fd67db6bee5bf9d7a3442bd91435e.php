<?php

/* SonataBlockBundle:Block:block_base.html.twig */
class __TwigTemplate_2d320079508a9b167b609a4750d13ca0b38bb61810c8855c0c59856c740fd15c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'block' => array($this, 'block_block'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_3d44fc959700a8ed6d8f0e7c09aa1d8ebdb9fcf69dca68c18538b04cc9e86f2d = $this->env->getExtension("native_profiler");
        $__internal_3d44fc959700a8ed6d8f0e7c09aa1d8ebdb9fcf69dca68c18538b04cc9e86f2d->enter($__internal_3d44fc959700a8ed6d8f0e7c09aa1d8ebdb9fcf69dca68c18538b04cc9e86f2d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataBlockBundle:Block:block_base.html.twig"));

        // line 11
        echo "<div id=\"cms-block-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "id", array()), "html", null, true);
        echo "\" class=\"cms-block cms-block-element\">
    ";
        // line 12
        $this->displayBlock('block', $context, $blocks);
        // line 13
        echo "</div>
";
        
        $__internal_3d44fc959700a8ed6d8f0e7c09aa1d8ebdb9fcf69dca68c18538b04cc9e86f2d->leave($__internal_3d44fc959700a8ed6d8f0e7c09aa1d8ebdb9fcf69dca68c18538b04cc9e86f2d_prof);

    }

    // line 12
    public function block_block($context, array $blocks = array())
    {
        $__internal_2b883128ec36e50ee85ff33b41b865f89b16fe3e391f863953002ee64e51282c = $this->env->getExtension("native_profiler");
        $__internal_2b883128ec36e50ee85ff33b41b865f89b16fe3e391f863953002ee64e51282c->enter($__internal_2b883128ec36e50ee85ff33b41b865f89b16fe3e391f863953002ee64e51282c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "block"));

        echo "EMPTY CONTENT";
        
        $__internal_2b883128ec36e50ee85ff33b41b865f89b16fe3e391f863953002ee64e51282c->leave($__internal_2b883128ec36e50ee85ff33b41b865f89b16fe3e391f863953002ee64e51282c_prof);

    }

    public function getTemplateName()
    {
        return "SonataBlockBundle:Block:block_base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 12,  30 => 13,  28 => 12,  23 => 11,);
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
/* <div id="cms-block-{{ block.id }}" class="cms-block cms-block-element">*/
/*     {% block block %}EMPTY CONTENT{% endblock %}*/
/* </div>*/
/* */
