<?php

/* @Framework/Form/choice_widget_expanded.html.php */
class __TwigTemplate_accb3d1c98a698c2436ffa3fb1ea684f7fa4a2456f1c2643bb519935c83f07e7 extends Twig_Template
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
        $__internal_2a34529887f8a5d50e305898f7d14c368cd5da383f5b666b5d8f09ce38e84722 = $this->env->getExtension("native_profiler");
        $__internal_2a34529887f8a5d50e305898f7d14c368cd5da383f5b666b5d8f09ce38e84722->enter($__internal_2a34529887f8a5d50e305898f7d14c368cd5da383f5b666b5d8f09ce38e84722_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/choice_widget_expanded.html.php"));

        // line 1
        echo "<div <?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>>
<?php foreach (\$form as \$child): ?>
    <?php echo \$view['form']->widget(\$child) ?>
    <?php echo \$view['form']->label(\$child, null, array('translation_domain' => \$choice_translation_domain)) ?>
<?php endforeach ?>
</div>
";
        
        $__internal_2a34529887f8a5d50e305898f7d14c368cd5da383f5b666b5d8f09ce38e84722->leave($__internal_2a34529887f8a5d50e305898f7d14c368cd5da383f5b666b5d8f09ce38e84722_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/choice_widget_expanded.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <div <?php echo $view['form']->block($form, 'widget_container_attributes') ?>>*/
/* <?php foreach ($form as $child): ?>*/
/*     <?php echo $view['form']->widget($child) ?>*/
/*     <?php echo $view['form']->label($child, null, array('translation_domain' => $choice_translation_domain)) ?>*/
/* <?php endforeach ?>*/
/* </div>*/
/* */
