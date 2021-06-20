<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* profiles/opigno_lms/modules/opigno/opigno_calendar/templates/calendar-month-col.html.twig */
class __TwigTemplate_0ca51a4787478f9c33bbcf9eb01a11d9f8ffab9f9f74df57e6e6196f4a4c7452 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 26];
        $filters = ["escape" => 14, "date" => 36, "t" => 37];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'date', 't'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 12
        echo "
<td
  id=\"";
        // line 14
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "id", [])), "html", null, true);
        echo "\"
  date-date=\"";
        // line 15
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "date", [])), "html", null, true);
        echo "\"
  data-day-of-month=\"";
        // line 16
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "day_of_month", [])), "html", null, true);
        echo "\"
  headers=\"";
        // line 17
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "header_id", [])), "html", null, true);
        echo "\"
  class=\"";
        // line 18
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "class", [])), "html", null, true);
        echo "\"
  colspan=\"";
        // line 19
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "colspan", [])), "html", null, true);
        echo "\"
  rowspan=\"";
        // line 20
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "rowspan", [])), "html", null, true);
        echo "\">
  <div class=\"inner\">
    ";
        // line 22
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "entry", [])), "html", null, true);
        echo "
  </div>
</td>

";
        // line 26
        if (($this->getAttribute(($context["item"] ?? null), "class", []) == "single-day no-entry today")) {
            // line 27
            echo "  <td
    id=\"";
            // line 28
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "id", [])) . "_empty"), "html", null, true);
            echo "\"
    date-date=\"";
            // line 29
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "date", [])), "html", null, true);
            echo "\"
    data-day-of-month=\"";
            // line 30
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "day_of_month", [])), "html", null, true);
            echo "\"
    headers=\"";
            // line 31
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "header_id", [])), "html", null, true);
            echo "\"
    class=\"";
            // line 32
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "class", [])), "html", null, true);
            echo "\"
    colspan=\"";
            // line 33
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "colspan", [])), "html", null, true);
            echo "\"
    rowspan=\"";
            // line 34
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "rowspan", [])), "html", null, true);
            echo "\">
    <div class=\"inner\">
      <div class=\"date-box\"><span class=\"date-day\">";
            // line 36
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "date", [])), "d"), "html", null, true);
            echo "</span>
        <span class=\"date-month\">";
            // line 37
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t(twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "date", [])), "M")));
            echo "</span>
        <span class=\"date-year\">";
            // line 38
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "date", [])), "Y"), "html", null, true);
            echo "</span>
      </div>
      <h4 class=\"title\">";
            // line 40
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("No Event"));
            echo "</h4>
    </div>
  </td>
";
        }
    }

    public function getTemplateName()
    {
        return "profiles/opigno_lms/modules/opigno/opigno_calendar/templates/calendar-month-col.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 40,  137 => 38,  133 => 37,  129 => 36,  124 => 34,  120 => 33,  116 => 32,  112 => 31,  108 => 30,  104 => 29,  100 => 28,  97 => 27,  95 => 26,  88 => 22,  83 => 20,  79 => 19,  75 => 18,  71 => 17,  67 => 16,  63 => 15,  59 => 14,  55 => 12,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "profiles/opigno_lms/modules/opigno/opigno_calendar/templates/calendar-month-col.html.twig", "/var/www/html/profiles/opigno_lms/modules/opigno/opigno_calendar/templates/calendar-month-col.html.twig");
    }
}
