<?php

/* @Framework/Form/form_rest.html.php */
class __TwigTemplate_ba399968277defde2bcbc3234053392ef5bf799a87e38c9a1ce75ba2fbc5207a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_1f0dbb87617a0b59b011c6030071f8cce81b3be380a0bb53b5d35222ce7c143c = $this->env->getExtension("native_profiler");
        $__internal_1f0dbb87617a0b59b011c6030071f8cce81b3be380a0bb53b5d35222ce7c143c->enter($__internal_1f0dbb87617a0b59b011c6030071f8cce81b3be380a0bb53b5d35222ce7c143c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_rest.html.php"));

        // line 1
        echo "<?php foreach (\$form as \$child): ?>
    <?php if (!\$child->isRendered()): ?>
        <?php echo \$view['form']->row(\$child) ?>
    <?php endif; ?>
<?php endforeach; ?>
";
        
        $__internal_1f0dbb87617a0b59b011c6030071f8cce81b3be380a0bb53b5d35222ce7c143c->leave($__internal_1f0dbb87617a0b59b011c6030071f8cce81b3be380a0bb53b5d35222ce7c143c_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_rest.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php foreach ($form as $child): ?>*/
/*     <?php if (!$child->isRendered()): ?>*/
/*         <?php echo $view['form']->row($child) ?>*/
/*     <?php endif; ?>*/
/* <?php endforeach; ?>*/
/* */
