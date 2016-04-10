<?php

/* @Framework/Form/choice_widget.html.php */
class __TwigTemplate_440df20668b97b32a90569870101441a1c793db61fcb9142fc1d57e975ae8ac1 extends Twig_Template
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
        $__internal_db9f2d1788eb8f63e30ee674ecd4a023686c78ca1c50532781dc0ece6362a89d = $this->env->getExtension("native_profiler");
        $__internal_db9f2d1788eb8f63e30ee674ecd4a023686c78ca1c50532781dc0ece6362a89d->enter($__internal_db9f2d1788eb8f63e30ee674ecd4a023686c78ca1c50532781dc0ece6362a89d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/choice_widget.html.php"));

        // line 1
        echo "<?php if (\$expanded): ?>
<?php echo \$view['form']->block(\$form, 'choice_widget_expanded') ?>
<?php else: ?>
<?php echo \$view['form']->block(\$form, 'choice_widget_collapsed') ?>
<?php endif ?>
";
        
        $__internal_db9f2d1788eb8f63e30ee674ecd4a023686c78ca1c50532781dc0ece6362a89d->leave($__internal_db9f2d1788eb8f63e30ee674ecd4a023686c78ca1c50532781dc0ece6362a89d_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/choice_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if ($expanded): ?>*/
/* <?php echo $view['form']->block($form, 'choice_widget_expanded') ?>*/
/* <?php else: ?>*/
/* <?php echo $view['form']->block($form, 'choice_widget_collapsed') ?>*/
/* <?php endif ?>*/
/* */
