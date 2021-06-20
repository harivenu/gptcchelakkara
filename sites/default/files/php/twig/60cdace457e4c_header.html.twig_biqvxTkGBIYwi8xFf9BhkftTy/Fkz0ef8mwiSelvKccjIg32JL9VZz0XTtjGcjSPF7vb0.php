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

/* @platon/layout/header.html.twig */
class __TwigTemplate_917d2535b116ec592c0911c13cb17fa29b3155abfa09c46e5af2f034200f2944 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 3, "for" => 56];
        $filters = ["escape" => 5, "t" => 14];
        $functions = ["path" => 109, "attach_library" => 131, "url" => 181];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['escape', 't'],
                ['path', 'attach_library', 'url']
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
        // line 1
        echo "<header id=\"site-header\">
  <div class=\"container d-flex align-items-center\">
    ";
        // line 3
        if ($this->getAttribute(($context["page"] ?? null), "branding", [])) {
            // line 4
            echo "      <div id=\"header-left\">
        ";
            // line 5
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "branding", [])), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 8
        echo "    ";
        if (($context["logged_in"] ?? null)) {
            // line 9
            echo "      <div id=\"header-right\" class=\"ml-auto d-flex\">
        ";
            // line 10
            if ($this->getAttribute(($context["page"] ?? null), "admin_opigno", [])) {
                // line 11
                echo "          <div class=\"admin-opigno-block d-none d-md-block dropdown\">
            <a href=\"#\" class=\"d-flex align-items-center\" data-toggle=\"dropdown\">
              <i class=\"icon-settings menu-icon\"></i>
              <span class=\"sr-only\">";
                // line 14
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Admin menu"));
                echo "</span>
            </a>
            <div class=\"dropdown-menu dropdown-menu-right\">
              <div class=\"info d-flex\">
                <div class=\"flex-1\">
                  <div><strong class=\"text-uppercase\">";
                // line 19
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("administration"));
                echo "</strong></div>
                </div>
                <button class=\"close-dropdown\">
                  <i class=\"icon-close\"></i>
                  <span class=\"sr-only\">
                    ";
                // line 24
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Close"));
                echo "
                  </span>
                </button>
              </div>
              <div class=\"px-4 d-flex menu-wrapper\">
                ";
                // line 29
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "admin_opigno", [])), "html", null, true);
                echo "
              </div>
            </div>
          </div>
        ";
            }
            // line 34
            echo "        <div class=\"user-ilts dropdown d-none d-md-block ml-3\">
          <a href=\"#\" class=\"d-flex align-items-center\" data-toggle=\"dropdown\">
            <i class=\"icon-ilt menu-icon\"></i>
            ";
            // line 37
            if (($context["upcoming_ilts_count"] ?? null)) {
                // line 38
                echo "              <div class=\"unread\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["upcoming_ilts_count"] ?? null)), "html", null, true);
                echo "</div>
            ";
            }
            // line 40
            echo "            <span class=\"sr-only\"> ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Instructor-Led Trainings"));
            echo "</span>
          </a>
          <div class=\"dropdown-menu dropdown-menu-right\">
            <div class=\"info d-flex\">
              <div class=\"flex-1\">
                <div><strong class=\"text-uppercase\">";
            // line 45
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Instructor-Led Training"));
            echo "</strong></div>
              </div>
              <button class=\"close-dropdown\">
                <i class=\"icon-close\"></i>
                <span class=\"sr-only\">
                  ";
            // line 50
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Close"));
            echo "
                </span>
              </button>
            </div>
            ";
            // line 54
            if (($context["upcoming_ilts_count"] ?? null)) {
                // line 55
                echo "              <div id=\"ilts-wrapper\">
                ";
                // line 56
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["upcoming_ilts"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["ilt"]) {
                    // line 57
                    echo "                  <div class=\"dropdown-item notification\">
                    <a href=\"";
                    // line 58
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["ilt"], "link", [], "array")), "html", null, true);
                    echo "\">
                      <span>";
                    // line 59
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["ilt"], "title", [], "array")), "html", null, true);
                    echo "</span>
                    </a>
                  </div>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ilt'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 63
                echo "              </div>
            ";
            } else {
                // line 65
                echo "              <div id=\"ilts-wrapper-empty\">
                <span>";
                // line 66
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("No upcoming ILT"));
                echo "</span>
              </div>
            ";
            }
            // line 69
            echo "          </div>
        </div>
        <div class=\"user-live-meetings dropdown d-none d-md-block ml-3\">
          <a href=\"#\" class=\"d-flex align-items-center\" data-toggle=\"dropdown\">
            <i class=\"icon-live-meeting menu-icon\"></i>
            ";
            // line 74
            if (($context["upcoming_live_meetings_count"] ?? null)) {
                // line 75
                echo "              <div class=\"unread\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["upcoming_live_meetings_count"] ?? null)), "html", null, true);
                echo "</div>
            ";
            }
            // line 77
            echo "            <span class=\"sr-only\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Live meetings"));
            echo "</span>
          </a>
          <div class=\"dropdown-menu dropdown-menu-right\">
            <div class=\"info d-flex\">
              <div class=\"flex-1\">
                <div><strong class=\"text-uppercase\">";
            // line 82
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Live Meeting"));
            echo "</strong></div>
              </div>
              <button class=\"close-dropdown\">
                <i class=\"icon-close\"></i>
                <span class=\"sr-only\">
                  ";
            // line 87
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Close"));
            echo "
                </span>
              </button>
            </div>
            ";
            // line 91
            if (($context["upcoming_live_meetings_count"] ?? null)) {
                // line 92
                echo "              <div id=\"live-meetings-wrapper\">
                ";
                // line 93
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["upcoming_live_meetings"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["meeting"]) {
                    // line 94
                    echo "                  <div class=\"dropdown-item notification\">
                    <a href=\"";
                    // line 95
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["meeting"], "link", [], "array")), "html", null, true);
                    echo "\">
                      <span>";
                    // line 96
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["meeting"], "title", [], "array")), "html", null, true);
                    echo "</span>
                    </a>
                  </div>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meeting'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 100
                echo "              </div>
            ";
            } else {
                // line 102
                echo "              <div id=\"live-meetings-wrapper-empty\">
                <span>";
                // line 103
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("No upcoming live meeting"));
                echo "</span>
              </div>
            ";
            }
            // line 106
            echo "          </div>
        </div>
        <div class=\"user-notifications dropdown ml-3\">
          <a href=\"";
            // line 109
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getPath("view.opigno_notifications.page_all"));
            echo "\" class=\"d-flex align-items-center\" data-toggle=\"dropdown\">
            <i class=\"icon-user-notifications menu-icon\"></i>
            <div class=\"unread ";
            // line 111
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(((($context["notifications_unread_count"] ?? null)) ? ("") : ("hidden")));
            echo "\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["notifications_unread_count"] ?? null)), "html", null, true);
            echo "</div>
            <span class=\"sr-only\">";
            // line 112
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Notifications"));
            echo "</span>
          </a>
          <div class=\"dropdown-menu dropdown-menu-right\">
            <div class=\"info d-flex\">
              <div class=\"flex-1\">
                <div><strong class=\"text-uppercase\">";
            // line 117
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("notifications"));
            echo "</strong></div>
              </div>
              <button class=\"close-dropdown\">
                <i class=\"icon-close\"></i>
                <span class=\"sr-only\">
                  ";
            // line 122
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Close"));
            echo "
                </span>
              </button>
            </div>
            <a id=\"read-all-notifications\" class=\"mark-as-read\" href=\"#\">";
            // line 126
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Mark as all read"));
            echo "</a>
            <div id=\"notifications-wrapper\">";
            // line 127
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["notifications_unread"] ?? null)), "html", null, true);
            echo "</div>
            <a id=\"show-all-notifications\" class=\"dropdown-item primary text-center\" href=\"";
            // line 128
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getPath("view.opigno_notifications.page_all"));
            echo "\">
              <span>";
            // line 129
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("See all notifications"));
            echo "</span>
            </a>
            ";
            // line 131
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->attachLibrary("opigno_notification/opigno_notification"), "html", null, true);
            echo "
          </div>
        </div>
        <div class=\"user-messages dropdown ml-3\">
          <a href=\"";
            // line 135
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getPath("private_message.private_message_page"));
            echo "\" class=\"d-flex align-items-center\" data-toggle=\"dropdown\">
            <i class=\"icon-user-messages menu-icon\"></i>
            <div class=\"unread ";
            // line 137
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(((($context["unread_thread_count"] ?? null)) ? ("") : ("hidden")));
            echo "\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["unread_thread_count"] ?? null)), "html", null, true);
            echo "</div>
            <span class=\"sr-only\">";
            // line 138
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Messages"));
            echo "</span>
          </a>
          <div class=\"dropdown-menu dropdown-menu-right\">
            <div class=\"info d-flex\">
              <div class=\"flex-1\">
                <div><strong class=\"text-uppercase\">";
            // line 143
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("messages"));
            echo "</strong></div>
              </div>
              <button class=\"close-dropdown\">
                <i class=\"icon-close\"></i>
                <span class=\"sr-only\">
                  ";
            // line 148
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Close"));
            echo "
                </span>
              </button>
            </div>
            <a id=\"read-all-messages\" class=\"mark-as-read\" href=\"#\">";
            // line 152
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Mark as all read"));
            echo "</a>
            <div id=\"messages-wrapper\">";
            // line 153
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["private_messages"] ?? null)), "html", null, true);
            echo "</div>
            <a class=\"dropdown-item primary text-center\" href=\"";
            // line 154
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getPath("private_message.private_message_page"));
            echo "\">
              <span>";
            // line 155
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("See all messages"));
            echo "</span>
            </a>
          </div>
        </div>
        <div class=\"user-block ml-3 dropdown\">
          <a href=\"#\" class=\"d-flex align-items-center\" data-toggle=\"dropdown\">
            ";
            // line 161
            if (($context["user_picture"] ?? null)) {
                // line 162
                echo "              <span class=\"picto\" style=\"background-image:url('";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["user_picture"] ?? null)), "html", null, true);
                echo "')\"></span>
            ";
            } else {
                // line 164
                echo "              <i class=\"icon-user menu-icon\"></i>
            ";
            }
            // line 166
            echo "            <span class=\"sr-only\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("My account"));
            echo "</span>
          </a>
          <div class=\"dropdown-menu dropdown-menu-right\">
            <div class=\"info d-flex\">
              <div class=\"flex-1\">
                <div><strong class=\"text-uppercase\">";
            // line 171
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["user"] ?? null), "username", [])), "html", null, true);
            echo "</strong></div>
                <div class=\"user-status text-uppercase\"><i class=\"icon-user-status\"></i>";
            // line 172
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("online"));
            echo "</div>
              </div>
              <button class=\"close-dropdown\">
                <i class=\"icon-close\"></i>
                <span class=\"sr-only\">
                   ";
            // line 177
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Close"));
            echo "
                </span>
              </button>
            </div>
            <a class=\"dropdown-item\" href=\"";
            // line 181
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("entity.user.canonical", ["user" => $this->getAttribute(($context["user"] ?? null), "id", [])]), "html", null, true);
            echo "\">
              <span>";
            // line 182
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("User profile"));
            echo "</span>
            </a>
            <a class=\"dropdown-item\" href=\"";
            // line 184
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("entity.user.edit_form", ["user" => $this->getAttribute(($context["user"] ?? null), "id", [])]), "html", null, true);
            echo "\">
              <span>";
            // line 185
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Settings"));
            echo "</span>
            </a>
            <a class=\"dropdown-item\" href=\"https://www.opigno.org\" target=\"_blank\">
              <span>";
            // line 188
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Help"));
            echo "</span>
            </a>
            ";
            // line 190
            if (($context["is_admin"] ?? null)) {
                // line 191
                echo "              <button type=\"button\" class=\"dropdown-item about\" data-toggle=\"modal\" data-target=\"#aboutModal\">
                <span>";
                // line 192
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("About"));
                echo "</span>
              </button>
            ";
            }
            // line 195
            echo "            <a class=\"dropdown-item primary text-center\" href=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("user.logout"));
            echo "\">
              <span>";
            // line 196
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Logout"));
            echo "</span>
            </a>
          </div>
        </div>
        <button class=\"navbar-toggler\">
          <i class=\"icon-menu\"></i>
          <span class=\"sr-only\">";
            // line 202
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Menu"));
            echo "</span>
        </button>
      </div>
    ";
        }
        // line 206
        echo "  </div>
  <div class=\"search-trigger d-flex align-items-center\">
    <button type=\"button\" id=\"search-trigger\">
      <i class=\"icon-search\"></i>
      <span class=\"sr-only\">";
        // line 210
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Open search form"));
        echo "</span>
    </button>
  </div>
  <div id=\"search-form\" style=\"display: none;\">
      ";
        // line 214
        if ((isset($context["opigno_search_form"]) || array_key_exists("opigno_search_form", $context))) {
            // line 215
            echo "        ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["opigno_search_form"] ?? null)), "html", null, true);
            echo "
      ";
        } else {
            // line 217
            echo "        ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["search_form"] ?? null)), "html", null, true);
            echo "
      ";
        }
        // line 219
        echo "  </div>
</header>

";
        // line 222
        if (($context["is_admin"] ?? null)) {
            // line 223
            echo "  <div class=\"modal\" id=\"aboutModal\">
    <div class=\"modal-dialog\" role=\"document\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <div class=\"flex-1\">
            <div><strong class=\"text-uppercase\">";
            // line 228
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("About"));
            echo "</strong></div>
          </div>
          <button type=\"button\" class=\"close-dropdown\" data-dismiss=\"modal\">
            <i class=\"icon-close\"></i>
            <span class=\"sr-only\">
              ";
            // line 233
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Close"));
            echo "
            </span>
          </button>
        </div>
        <div class=\"modal-body\">
          <div class=\"d-flex\">
            <div class=\"left-col mr-4\">
              <img src=\"";
            // line 240
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["opigno_logo"] ?? null)), "html", null, true);
            echo "\" alt=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("opigno logo"));
            echo "\">
            </div>
            <div class=\"right-col\">
              <p class=\"text mb-4\">
                ";
            // line 244
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Opigno™ is a Trademark of Connect-i Sàrl, based in Préverenges, Switzerland. For more information regarding Opigno™ please consult the website"));
            echo " <a href=\"https://www.opigno.org\" target=\"_blank\">www.opigno.org</a>.
              </p>
              <p class=\"version d-flex align-items-center flex-wrap\">
                <span class=\"mr-3\">";
            // line 247
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Version :"));
            echo "</span>
                ";
            // line 248
            if (($context["opigno_lms_release"] ?? null)) {
                // line 249
                echo "                  <span class=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["opigno_lms_updates"] ?? null)), "html", null, true);
                echo "\">";
                // line 250
                echo "                    ";
                if ((($context["opigno_lms_updates"] ?? null) == "ok")) {
                    // line 251
                    echo "                      <i class=\"icon-ok mr-2\"></i>
                    ";
                } elseif ((                // line 252
($context["opigno_lms_updates"] ?? null) == "nok")) {
                    // line 253
                    echo "                      <i class=\"icon-close mr-2\"></i>
                    ";
                }
                // line 255
                echo "
                    Opigno ";
                // line 256
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["opigno_lms_release"] ?? null)), "html", null, true);
                echo "
                  </span>
                ";
            } else {
                // line 259
                echo "                  <span>";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("N/A"));
                echo "</span>
                ";
            }
            // line 261
            echo "              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
";
        }
        // line 269
        echo "
";
        // line 270
        if ($this->getAttribute(($context["page"] ?? null), "menu", [])) {
            // line 271
            echo "  <div id=\"menu-wrapper\" class=\"container\" role=\"complementary\">
    <div class=\"bg-faded\">
      ";
            // line 273
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "menu", [])), "html", null, true);
            echo "
      <div class=\"d-md-none\">
        <nav id=\"mobile-menu\">
          <ul>
            <li>
              <a href=\"";
            // line 278
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("view.search_content.page_1"));
            echo "\" class=\"search ";
            if ((($context["route_name"] ?? null) == "view.search_content.page_1")) {
                echo "is-active";
            }
            echo "\">
                ";
            // line 279
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Search"));
            echo "
              </a>
            </li>
            ";
            // line 282
            if (($context["logged_in"] ?? null)) {
                // line 283
                echo "              <li>
                <a href=\"";
                // line 284
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("entity.user.canonical", ["user" => $this->getAttribute(($context["user"] ?? null), "id", [])]), "html", null, true);
                echo "\" class=\"user ";
                if ((($context["route_name"] ?? null) == "entity.user.canonical")) {
                    echo "is-active";
                }
                echo "\">
                  <span>";
                // line 285
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("User profile"));
                echo "</span>
                </a>
              </li>
              <li>
                <a href=\"";
                // line 289
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("entity.user.edit_form", ["user" => $this->getAttribute(($context["user"] ?? null), "id", [])]), "html", null, true);
                echo "\" class=\"administration ";
                if ((($context["route_name"] ?? null) == "entity.user.edit_form")) {
                    echo "is-active";
                }
                echo "\">
                  <span>";
                // line 290
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Settings"));
                echo "</span>
                </a>
              </li>
              <li>
                <a href=\"https://www.opigno.org\" target=\"_blank\" class=\"help\">
                  <span>";
                // line 295
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Help"));
                echo "</span>
                </a>
              </li>
              <li>
                <a href=\"";
                // line 299
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("user.logout"));
                echo "\" class=\"logout\">
                  <span>";
                // line 300
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Logout"));
                echo "</span>
                </a>
              </li>
            ";
            }
            // line 304
            echo "          </ul>
        </nav>
      </div>
    </div>
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "@platon/layout/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  689 => 304,  682 => 300,  678 => 299,  671 => 295,  663 => 290,  655 => 289,  648 => 285,  640 => 284,  637 => 283,  635 => 282,  629 => 279,  621 => 278,  613 => 273,  609 => 271,  607 => 270,  604 => 269,  594 => 261,  588 => 259,  582 => 256,  579 => 255,  575 => 253,  573 => 252,  570 => 251,  567 => 250,  563 => 249,  561 => 248,  557 => 247,  551 => 244,  542 => 240,  532 => 233,  524 => 228,  517 => 223,  515 => 222,  510 => 219,  504 => 217,  498 => 215,  496 => 214,  489 => 210,  483 => 206,  476 => 202,  467 => 196,  462 => 195,  456 => 192,  453 => 191,  451 => 190,  446 => 188,  440 => 185,  436 => 184,  431 => 182,  427 => 181,  420 => 177,  412 => 172,  408 => 171,  399 => 166,  395 => 164,  389 => 162,  387 => 161,  378 => 155,  374 => 154,  370 => 153,  366 => 152,  359 => 148,  351 => 143,  343 => 138,  337 => 137,  332 => 135,  325 => 131,  320 => 129,  316 => 128,  312 => 127,  308 => 126,  301 => 122,  293 => 117,  285 => 112,  279 => 111,  274 => 109,  269 => 106,  263 => 103,  260 => 102,  256 => 100,  246 => 96,  242 => 95,  239 => 94,  235 => 93,  232 => 92,  230 => 91,  223 => 87,  215 => 82,  206 => 77,  200 => 75,  198 => 74,  191 => 69,  185 => 66,  182 => 65,  178 => 63,  168 => 59,  164 => 58,  161 => 57,  157 => 56,  154 => 55,  152 => 54,  145 => 50,  137 => 45,  128 => 40,  122 => 38,  120 => 37,  115 => 34,  107 => 29,  99 => 24,  91 => 19,  83 => 14,  78 => 11,  76 => 10,  73 => 9,  70 => 8,  64 => 5,  61 => 4,  59 => 3,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@platon/layout/header.html.twig", "/var/www/html/profiles/opigno_lms/themes/contrib/platon/templates/layout/header.html.twig");
    }
}
