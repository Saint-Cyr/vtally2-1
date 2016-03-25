<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/user')) {
            // user_index
            if (rtrim($pathinfo, '/') === '/user') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_user_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'user_index');
                }

                return array (  '_controller' => 'UserBundle\\Controller\\UserController::indexAction',  '_route' => 'user_index',);
            }
            not_user_index:

            // user_new
            if ($pathinfo === '/user/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_user_new;
                }

                return array (  '_controller' => 'UserBundle\\Controller\\UserController::newAction',  '_route' => 'user_new',);
            }
            not_user_new:

            // user_show
            if (preg_match('#^/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_user_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_show')), array (  '_controller' => 'UserBundle\\Controller\\UserController::showAction',));
            }
            not_user_show:

            // user_edit
            if (preg_match('#^/user/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_user_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_edit')), array (  '_controller' => 'UserBundle\\Controller\\UserController::editAction',));
            }
            not_user_edit:

            // user_delete
            if (preg_match('#^/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_user_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_delete')), array (  '_controller' => 'UserBundle\\Controller\\UserController::deleteAction',));
            }
            not_user_delete:

        }

        // user_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'user_homepage');
            }

            return array (  '_controller' => 'UserBundle:Default:index',  '_route' => 'user_homepage',);
        }

        // pa_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'pa_homepage');
            }

            return array (  '_controller' => 'PaBundle\\Controller\\DefaultController::indexAction',  '_route' => 'pa_homepage',);
        }

        // pr_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'pr_homepage');
            }

            return array (  '_controller' => 'PrBundle\\Controller\\DefaultController::indexAction',  '_route' => 'pr_homepage',);
        }

        // vtally_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'vtally_homepage');
            }

            return array (  '_controller' => 'VtallyBundle\\Controller\\DefaultController::indexAction',  '_route' => 'vtally_homepage',);
        }

        if (0 === strpos($pathinfo, '/admin')) {
            // sonata_admin_redirect
            if (rtrim($pathinfo, '/') === '/admin') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'sonata_admin_redirect');
                }

                return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  'route' => 'sonata_admin_dashboard',  'permanent' => 'true',  '_route' => 'sonata_admin_redirect',);
            }

            // sonata_admin_dashboard
            if ($pathinfo === '/admin/dashboard') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::dashboardAction',  '_route' => 'sonata_admin_dashboard',);
            }

            if (0 === strpos($pathinfo, '/admin/core')) {
                // sonata_admin_retrieve_form_element
                if ($pathinfo === '/admin/core/get-form-field-element') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:retrieveFormFieldElementAction',  '_route' => 'sonata_admin_retrieve_form_element',);
                }

                // sonata_admin_append_form_element
                if ($pathinfo === '/admin/core/append-form-field-element') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:appendFormFieldElementAction',  '_route' => 'sonata_admin_append_form_element',);
                }

                // sonata_admin_short_object_information
                if (0 === strpos($pathinfo, '/admin/core/get-short-object-description') && preg_match('#^/admin/core/get\\-short\\-object\\-description(?:\\.(?P<_format>html|json))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sonata_admin_short_object_information')), array (  '_controller' => 'sonata.admin.controller.admin:getShortObjectDescriptionAction',  '_format' => 'html',));
                }

                // sonata_admin_set_object_field_value
                if ($pathinfo === '/admin/core/set-object-field-value') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:setObjectFieldValueAction',  '_route' => 'sonata_admin_set_object_field_value',);
                }

            }

            // sonata_admin_search
            if ($pathinfo === '/admin/search') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::searchAction',  '_route' => 'sonata_admin_search',);
            }

            // sonata_admin_retrieve_autocomplete_items
            if ($pathinfo === '/admin/core/get-autocomplete-items') {
                return array (  '_controller' => 'sonata.admin.controller.admin:retrieveAutocompleteItemsAction',  '_route' => 'sonata_admin_retrieve_autocomplete_items',);
            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_security_login;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }
                not_fos_user_security_login:

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_security_logout;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }
            not_fos_user_security_logout:

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_profile_edit;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }
            not_fos_user_profile_edit:

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_registration_register;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }
                not_fos_user_registration_register:

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/vtally')) {
                if (0 === strpos($pathinfo, '/admin/vtally/co')) {
                    if (0 === strpos($pathinfo, '/admin/vtally/constituency')) {
                        // admin_vtally_constituency_list
                        if ($pathinfo === '/admin/vtally/constituency/list') {
                            return array (  '_controller' => 'VtallyBundle\\Controller\\ConstituencyAdminController::listAction',  '_sonata_admin' => 'vtally.admin.constituency',  '_sonata_name' => 'admin_vtally_constituency_list',  '_route' => 'admin_vtally_constituency_list',);
                        }

                        // admin_vtally_constituency_create
                        if ($pathinfo === '/admin/vtally/constituency/create') {
                            return array (  '_controller' => 'VtallyBundle\\Controller\\ConstituencyAdminController::createAction',  '_sonata_admin' => 'vtally.admin.constituency',  '_sonata_name' => 'admin_vtally_constituency_create',  '_route' => 'admin_vtally_constituency_create',);
                        }

                        // admin_vtally_constituency_batch
                        if ($pathinfo === '/admin/vtally/constituency/batch') {
                            return array (  '_controller' => 'VtallyBundle\\Controller\\ConstituencyAdminController::batchAction',  '_sonata_admin' => 'vtally.admin.constituency',  '_sonata_name' => 'admin_vtally_constituency_batch',  '_route' => 'admin_vtally_constituency_batch',);
                        }

                        // admin_vtally_constituency_edit
                        if (preg_match('#^/admin/vtally/constituency/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_vtally_constituency_edit')), array (  '_controller' => 'VtallyBundle\\Controller\\ConstituencyAdminController::editAction',  '_sonata_admin' => 'vtally.admin.constituency',  '_sonata_name' => 'admin_vtally_constituency_edit',));
                        }

                        // admin_vtally_constituency_delete
                        if (preg_match('#^/admin/vtally/constituency/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_vtally_constituency_delete')), array (  '_controller' => 'VtallyBundle\\Controller\\ConstituencyAdminController::deleteAction',  '_sonata_admin' => 'vtally.admin.constituency',  '_sonata_name' => 'admin_vtally_constituency_delete',));
                        }

                        // admin_vtally_constituency_show
                        if (preg_match('#^/admin/vtally/constituency/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_vtally_constituency_show')), array (  '_controller' => 'VtallyBundle\\Controller\\ConstituencyAdminController::showAction',  '_sonata_admin' => 'vtally.admin.constituency',  '_sonata_name' => 'admin_vtally_constituency_show',));
                        }

                        // admin_vtally_constituency_export
                        if ($pathinfo === '/admin/vtally/constituency/export') {
                            return array (  '_controller' => 'VtallyBundle\\Controller\\ConstituencyAdminController::exportAction',  '_sonata_admin' => 'vtally.admin.constituency',  '_sonata_name' => 'admin_vtally_constituency_export',  '_route' => 'admin_vtally_constituency_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/vtally/collationcenter')) {
                        // admin_vtally_collationcenter_list
                        if ($pathinfo === '/admin/vtally/collationcenter/list') {
                            return array (  '_controller' => 'VtallyBundle\\Controller\\CollationCenterAdminController::listAction',  '_sonata_admin' => 'vtally.admin.collation_center',  '_sonata_name' => 'admin_vtally_collationcenter_list',  '_route' => 'admin_vtally_collationcenter_list',);
                        }

                        // admin_vtally_collationcenter_create
                        if ($pathinfo === '/admin/vtally/collationcenter/create') {
                            return array (  '_controller' => 'VtallyBundle\\Controller\\CollationCenterAdminController::createAction',  '_sonata_admin' => 'vtally.admin.collation_center',  '_sonata_name' => 'admin_vtally_collationcenter_create',  '_route' => 'admin_vtally_collationcenter_create',);
                        }

                        // admin_vtally_collationcenter_batch
                        if ($pathinfo === '/admin/vtally/collationcenter/batch') {
                            return array (  '_controller' => 'VtallyBundle\\Controller\\CollationCenterAdminController::batchAction',  '_sonata_admin' => 'vtally.admin.collation_center',  '_sonata_name' => 'admin_vtally_collationcenter_batch',  '_route' => 'admin_vtally_collationcenter_batch',);
                        }

                        // admin_vtally_collationcenter_edit
                        if (preg_match('#^/admin/vtally/collationcenter/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_vtally_collationcenter_edit')), array (  '_controller' => 'VtallyBundle\\Controller\\CollationCenterAdminController::editAction',  '_sonata_admin' => 'vtally.admin.collation_center',  '_sonata_name' => 'admin_vtally_collationcenter_edit',));
                        }

                        // admin_vtally_collationcenter_delete
                        if (preg_match('#^/admin/vtally/collationcenter/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_vtally_collationcenter_delete')), array (  '_controller' => 'VtallyBundle\\Controller\\CollationCenterAdminController::deleteAction',  '_sonata_admin' => 'vtally.admin.collation_center',  '_sonata_name' => 'admin_vtally_collationcenter_delete',));
                        }

                        // admin_vtally_collationcenter_show
                        if (preg_match('#^/admin/vtally/collationcenter/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_vtally_collationcenter_show')), array (  '_controller' => 'VtallyBundle\\Controller\\CollationCenterAdminController::showAction',  '_sonata_admin' => 'vtally.admin.collation_center',  '_sonata_name' => 'admin_vtally_collationcenter_show',));
                        }

                        // admin_vtally_collationcenter_export
                        if ($pathinfo === '/admin/vtally/collationcenter/export') {
                            return array (  '_controller' => 'VtallyBundle\\Controller\\CollationCenterAdminController::exportAction',  '_sonata_admin' => 'vtally.admin.collation_center',  '_sonata_name' => 'admin_vtally_collationcenter_export',  '_route' => 'admin_vtally_collationcenter_export',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/vtally/pollingstation')) {
                    // admin_vtally_pollingstation_list
                    if ($pathinfo === '/admin/vtally/pollingstation/list') {
                        return array (  '_controller' => 'VtallyBundle\\Controller\\PollingStationAdminController::listAction',  '_sonata_admin' => 'vtally.admin.polling_station',  '_sonata_name' => 'admin_vtally_pollingstation_list',  '_route' => 'admin_vtally_pollingstation_list',);
                    }

                    // admin_vtally_pollingstation_create
                    if ($pathinfo === '/admin/vtally/pollingstation/create') {
                        return array (  '_controller' => 'VtallyBundle\\Controller\\PollingStationAdminController::createAction',  '_sonata_admin' => 'vtally.admin.polling_station',  '_sonata_name' => 'admin_vtally_pollingstation_create',  '_route' => 'admin_vtally_pollingstation_create',);
                    }

                    // admin_vtally_pollingstation_batch
                    if ($pathinfo === '/admin/vtally/pollingstation/batch') {
                        return array (  '_controller' => 'VtallyBundle\\Controller\\PollingStationAdminController::batchAction',  '_sonata_admin' => 'vtally.admin.polling_station',  '_sonata_name' => 'admin_vtally_pollingstation_batch',  '_route' => 'admin_vtally_pollingstation_batch',);
                    }

                    // admin_vtally_pollingstation_edit
                    if (preg_match('#^/admin/vtally/pollingstation/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_vtally_pollingstation_edit')), array (  '_controller' => 'VtallyBundle\\Controller\\PollingStationAdminController::editAction',  '_sonata_admin' => 'vtally.admin.polling_station',  '_sonata_name' => 'admin_vtally_pollingstation_edit',));
                    }

                    // admin_vtally_pollingstation_delete
                    if (preg_match('#^/admin/vtally/pollingstation/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_vtally_pollingstation_delete')), array (  '_controller' => 'VtallyBundle\\Controller\\PollingStationAdminController::deleteAction',  '_sonata_admin' => 'vtally.admin.polling_station',  '_sonata_name' => 'admin_vtally_pollingstation_delete',));
                    }

                    // admin_vtally_pollingstation_show
                    if (preg_match('#^/admin/vtally/pollingstation/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_vtally_pollingstation_show')), array (  '_controller' => 'VtallyBundle\\Controller\\PollingStationAdminController::showAction',  '_sonata_admin' => 'vtally.admin.polling_station',  '_sonata_name' => 'admin_vtally_pollingstation_show',));
                    }

                    // admin_vtally_pollingstation_export
                    if ($pathinfo === '/admin/vtally/pollingstation/export') {
                        return array (  '_controller' => 'VtallyBundle\\Controller\\PollingStationAdminController::exportAction',  '_sonata_admin' => 'vtally.admin.polling_station',  '_sonata_name' => 'admin_vtally_pollingstation_export',  '_route' => 'admin_vtally_pollingstation_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/vtally/region')) {
                    // admin_vtally_region_list
                    if ($pathinfo === '/admin/vtally/region/list') {
                        return array (  '_controller' => 'VtallyBundle\\Controller\\RegionAdminController::listAction',  '_sonata_admin' => 'vtally.admin.region',  '_sonata_name' => 'admin_vtally_region_list',  '_route' => 'admin_vtally_region_list',);
                    }

                    // admin_vtally_region_create
                    if ($pathinfo === '/admin/vtally/region/create') {
                        return array (  '_controller' => 'VtallyBundle\\Controller\\RegionAdminController::createAction',  '_sonata_admin' => 'vtally.admin.region',  '_sonata_name' => 'admin_vtally_region_create',  '_route' => 'admin_vtally_region_create',);
                    }

                    // admin_vtally_region_batch
                    if ($pathinfo === '/admin/vtally/region/batch') {
                        return array (  '_controller' => 'VtallyBundle\\Controller\\RegionAdminController::batchAction',  '_sonata_admin' => 'vtally.admin.region',  '_sonata_name' => 'admin_vtally_region_batch',  '_route' => 'admin_vtally_region_batch',);
                    }

                    // admin_vtally_region_edit
                    if (preg_match('#^/admin/vtally/region/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_vtally_region_edit')), array (  '_controller' => 'VtallyBundle\\Controller\\RegionAdminController::editAction',  '_sonata_admin' => 'vtally.admin.region',  '_sonata_name' => 'admin_vtally_region_edit',));
                    }

                    // admin_vtally_region_delete
                    if (preg_match('#^/admin/vtally/region/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_vtally_region_delete')), array (  '_controller' => 'VtallyBundle\\Controller\\RegionAdminController::deleteAction',  '_sonata_admin' => 'vtally.admin.region',  '_sonata_name' => 'admin_vtally_region_delete',));
                    }

                    // admin_vtally_region_show
                    if (preg_match('#^/admin/vtally/region/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_vtally_region_show')), array (  '_controller' => 'VtallyBundle\\Controller\\RegionAdminController::showAction',  '_sonata_admin' => 'vtally.admin.region',  '_sonata_name' => 'admin_vtally_region_show',));
                    }

                    // admin_vtally_region_export
                    if ($pathinfo === '/admin/vtally/region/export') {
                        return array (  '_controller' => 'VtallyBundle\\Controller\\RegionAdminController::exportAction',  '_sonata_admin' => 'vtally.admin.region',  '_sonata_name' => 'admin_vtally_region_export',  '_route' => 'admin_vtally_region_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/vtally/setting')) {
                    // admin_vtally_setting_list
                    if ($pathinfo === '/admin/vtally/setting/list') {
                        return array (  '_controller' => 'VtallyBundle\\Controller\\SettingAdminController::listAction',  '_sonata_admin' => 'vtally.admin.setting',  '_sonata_name' => 'admin_vtally_setting_list',  '_route' => 'admin_vtally_setting_list',);
                    }

                    // admin_vtally_setting_create
                    if ($pathinfo === '/admin/vtally/setting/create') {
                        return array (  '_controller' => 'VtallyBundle\\Controller\\SettingAdminController::createAction',  '_sonata_admin' => 'vtally.admin.setting',  '_sonata_name' => 'admin_vtally_setting_create',  '_route' => 'admin_vtally_setting_create',);
                    }

                    // admin_vtally_setting_batch
                    if ($pathinfo === '/admin/vtally/setting/batch') {
                        return array (  '_controller' => 'VtallyBundle\\Controller\\SettingAdminController::batchAction',  '_sonata_admin' => 'vtally.admin.setting',  '_sonata_name' => 'admin_vtally_setting_batch',  '_route' => 'admin_vtally_setting_batch',);
                    }

                    // admin_vtally_setting_edit
                    if (preg_match('#^/admin/vtally/setting/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_vtally_setting_edit')), array (  '_controller' => 'VtallyBundle\\Controller\\SettingAdminController::editAction',  '_sonata_admin' => 'vtally.admin.setting',  '_sonata_name' => 'admin_vtally_setting_edit',));
                    }

                    // admin_vtally_setting_delete
                    if (preg_match('#^/admin/vtally/setting/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_vtally_setting_delete')), array (  '_controller' => 'VtallyBundle\\Controller\\SettingAdminController::deleteAction',  '_sonata_admin' => 'vtally.admin.setting',  '_sonata_name' => 'admin_vtally_setting_delete',));
                    }

                    // admin_vtally_setting_show
                    if (preg_match('#^/admin/vtally/setting/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_vtally_setting_show')), array (  '_controller' => 'VtallyBundle\\Controller\\SettingAdminController::showAction',  '_sonata_admin' => 'vtally.admin.setting',  '_sonata_name' => 'admin_vtally_setting_show',));
                    }

                    // admin_vtally_setting_export
                    if ($pathinfo === '/admin/vtally/setting/export') {
                        return array (  '_controller' => 'VtallyBundle\\Controller\\SettingAdminController::exportAction',  '_sonata_admin' => 'vtally.admin.setting',  '_sonata_name' => 'admin_vtally_setting_export',  '_route' => 'admin_vtally_setting_export',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/p')) {
                if (0 === strpos($pathinfo, '/admin/pr/pr')) {
                    if (0 === strpos($pathinfo, '/admin/pr/prnotification')) {
                        // admin_pr_prnotification_list
                        if ($pathinfo === '/admin/pr/prnotification/list') {
                            return array (  '_controller' => 'PrBundle\\Controller\\PrNotificationAdminController::listAction',  '_sonata_admin' => 'pr.admin.pr_notification',  '_sonata_name' => 'admin_pr_prnotification_list',  '_route' => 'admin_pr_prnotification_list',);
                        }

                        // admin_pr_prnotification_create
                        if ($pathinfo === '/admin/pr/prnotification/create') {
                            return array (  '_controller' => 'PrBundle\\Controller\\PrNotificationAdminController::createAction',  '_sonata_admin' => 'pr.admin.pr_notification',  '_sonata_name' => 'admin_pr_prnotification_create',  '_route' => 'admin_pr_prnotification_create',);
                        }

                        // admin_pr_prnotification_batch
                        if ($pathinfo === '/admin/pr/prnotification/batch') {
                            return array (  '_controller' => 'PrBundle\\Controller\\PrNotificationAdminController::batchAction',  '_sonata_admin' => 'pr.admin.pr_notification',  '_sonata_name' => 'admin_pr_prnotification_batch',  '_route' => 'admin_pr_prnotification_batch',);
                        }

                        // admin_pr_prnotification_edit
                        if (preg_match('#^/admin/pr/prnotification/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pr_prnotification_edit')), array (  '_controller' => 'PrBundle\\Controller\\PrNotificationAdminController::editAction',  '_sonata_admin' => 'pr.admin.pr_notification',  '_sonata_name' => 'admin_pr_prnotification_edit',));
                        }

                        // admin_pr_prnotification_delete
                        if (preg_match('#^/admin/pr/prnotification/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pr_prnotification_delete')), array (  '_controller' => 'PrBundle\\Controller\\PrNotificationAdminController::deleteAction',  '_sonata_admin' => 'pr.admin.pr_notification',  '_sonata_name' => 'admin_pr_prnotification_delete',));
                        }

                        // admin_pr_prnotification_show
                        if (preg_match('#^/admin/pr/prnotification/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pr_prnotification_show')), array (  '_controller' => 'PrBundle\\Controller\\PrNotificationAdminController::showAction',  '_sonata_admin' => 'pr.admin.pr_notification',  '_sonata_name' => 'admin_pr_prnotification_show',));
                        }

                        // admin_pr_prnotification_export
                        if ($pathinfo === '/admin/pr/prnotification/export') {
                            return array (  '_controller' => 'PrBundle\\Controller\\PrNotificationAdminController::exportAction',  '_sonata_admin' => 'pr.admin.pr_notification',  '_sonata_name' => 'admin_pr_prnotification_export',  '_route' => 'admin_pr_prnotification_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/pr/prvotecast')) {
                        // admin_pr_prvotecast_list
                        if ($pathinfo === '/admin/pr/prvotecast/list') {
                            return array (  '_controller' => 'PrBundle\\Controller\\PrVoteCastAdminController::listAction',  '_sonata_admin' => 'pr.admin.pr_vote_cast',  '_sonata_name' => 'admin_pr_prvotecast_list',  '_route' => 'admin_pr_prvotecast_list',);
                        }

                        // admin_pr_prvotecast_create
                        if ($pathinfo === '/admin/pr/prvotecast/create') {
                            return array (  '_controller' => 'PrBundle\\Controller\\PrVoteCastAdminController::createAction',  '_sonata_admin' => 'pr.admin.pr_vote_cast',  '_sonata_name' => 'admin_pr_prvotecast_create',  '_route' => 'admin_pr_prvotecast_create',);
                        }

                        // admin_pr_prvotecast_batch
                        if ($pathinfo === '/admin/pr/prvotecast/batch') {
                            return array (  '_controller' => 'PrBundle\\Controller\\PrVoteCastAdminController::batchAction',  '_sonata_admin' => 'pr.admin.pr_vote_cast',  '_sonata_name' => 'admin_pr_prvotecast_batch',  '_route' => 'admin_pr_prvotecast_batch',);
                        }

                        // admin_pr_prvotecast_edit
                        if (preg_match('#^/admin/pr/prvotecast/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pr_prvotecast_edit')), array (  '_controller' => 'PrBundle\\Controller\\PrVoteCastAdminController::editAction',  '_sonata_admin' => 'pr.admin.pr_vote_cast',  '_sonata_name' => 'admin_pr_prvotecast_edit',));
                        }

                        // admin_pr_prvotecast_delete
                        if (preg_match('#^/admin/pr/prvotecast/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pr_prvotecast_delete')), array (  '_controller' => 'PrBundle\\Controller\\PrVoteCastAdminController::deleteAction',  '_sonata_admin' => 'pr.admin.pr_vote_cast',  '_sonata_name' => 'admin_pr_prvotecast_delete',));
                        }

                        // admin_pr_prvotecast_show
                        if (preg_match('#^/admin/pr/prvotecast/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pr_prvotecast_show')), array (  '_controller' => 'PrBundle\\Controller\\PrVoteCastAdminController::showAction',  '_sonata_admin' => 'pr.admin.pr_vote_cast',  '_sonata_name' => 'admin_pr_prvotecast_show',));
                        }

                        // admin_pr_prvotecast_export
                        if ($pathinfo === '/admin/pr/prvotecast/export') {
                            return array (  '_controller' => 'PrBundle\\Controller\\PrVoteCastAdminController::exportAction',  '_sonata_admin' => 'pr.admin.pr_vote_cast',  '_sonata_name' => 'admin_pr_prvotecast_export',  '_route' => 'admin_pr_prvotecast_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/pr/prp')) {
                        if (0 === strpos($pathinfo, '/admin/pr/prpinksheet')) {
                            // admin_pr_prpinksheet_list
                            if ($pathinfo === '/admin/pr/prpinksheet/list') {
                                return array (  '_controller' => 'PrBundle\\Controller\\PrPinkSheetAdminController::listAction',  '_sonata_admin' => 'pr.admin.pr_pink_sheet',  '_sonata_name' => 'admin_pr_prpinksheet_list',  '_route' => 'admin_pr_prpinksheet_list',);
                            }

                            // admin_pr_prpinksheet_create
                            if ($pathinfo === '/admin/pr/prpinksheet/create') {
                                return array (  '_controller' => 'PrBundle\\Controller\\PrPinkSheetAdminController::createAction',  '_sonata_admin' => 'pr.admin.pr_pink_sheet',  '_sonata_name' => 'admin_pr_prpinksheet_create',  '_route' => 'admin_pr_prpinksheet_create',);
                            }

                            // admin_pr_prpinksheet_batch
                            if ($pathinfo === '/admin/pr/prpinksheet/batch') {
                                return array (  '_controller' => 'PrBundle\\Controller\\PrPinkSheetAdminController::batchAction',  '_sonata_admin' => 'pr.admin.pr_pink_sheet',  '_sonata_name' => 'admin_pr_prpinksheet_batch',  '_route' => 'admin_pr_prpinksheet_batch',);
                            }

                            // admin_pr_prpinksheet_edit
                            if (preg_match('#^/admin/pr/prpinksheet/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pr_prpinksheet_edit')), array (  '_controller' => 'PrBundle\\Controller\\PrPinkSheetAdminController::editAction',  '_sonata_admin' => 'pr.admin.pr_pink_sheet',  '_sonata_name' => 'admin_pr_prpinksheet_edit',));
                            }

                            // admin_pr_prpinksheet_delete
                            if (preg_match('#^/admin/pr/prpinksheet/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pr_prpinksheet_delete')), array (  '_controller' => 'PrBundle\\Controller\\PrPinkSheetAdminController::deleteAction',  '_sonata_admin' => 'pr.admin.pr_pink_sheet',  '_sonata_name' => 'admin_pr_prpinksheet_delete',));
                            }

                            // admin_pr_prpinksheet_show
                            if (preg_match('#^/admin/pr/prpinksheet/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pr_prpinksheet_show')), array (  '_controller' => 'PrBundle\\Controller\\PrPinkSheetAdminController::showAction',  '_sonata_admin' => 'pr.admin.pr_pink_sheet',  '_sonata_name' => 'admin_pr_prpinksheet_show',));
                            }

                            // admin_pr_prpinksheet_export
                            if ($pathinfo === '/admin/pr/prpinksheet/export') {
                                return array (  '_controller' => 'PrBundle\\Controller\\PrPinkSheetAdminController::exportAction',  '_sonata_admin' => 'pr.admin.pr_pink_sheet',  '_sonata_name' => 'admin_pr_prpinksheet_export',  '_route' => 'admin_pr_prpinksheet_export',);
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/pr/prparty')) {
                            // admin_pr_prparty_list
                            if ($pathinfo === '/admin/pr/prparty/list') {
                                return array (  '_controller' => 'PrBundle\\Controller\\PrPartyAdminController::listAction',  '_sonata_admin' => 'pr.admin.pr_party',  '_sonata_name' => 'admin_pr_prparty_list',  '_route' => 'admin_pr_prparty_list',);
                            }

                            // admin_pr_prparty_create
                            if ($pathinfo === '/admin/pr/prparty/create') {
                                return array (  '_controller' => 'PrBundle\\Controller\\PrPartyAdminController::createAction',  '_sonata_admin' => 'pr.admin.pr_party',  '_sonata_name' => 'admin_pr_prparty_create',  '_route' => 'admin_pr_prparty_create',);
                            }

                            // admin_pr_prparty_batch
                            if ($pathinfo === '/admin/pr/prparty/batch') {
                                return array (  '_controller' => 'PrBundle\\Controller\\PrPartyAdminController::batchAction',  '_sonata_admin' => 'pr.admin.pr_party',  '_sonata_name' => 'admin_pr_prparty_batch',  '_route' => 'admin_pr_prparty_batch',);
                            }

                            // admin_pr_prparty_edit
                            if (preg_match('#^/admin/pr/prparty/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pr_prparty_edit')), array (  '_controller' => 'PrBundle\\Controller\\PrPartyAdminController::editAction',  '_sonata_admin' => 'pr.admin.pr_party',  '_sonata_name' => 'admin_pr_prparty_edit',));
                            }

                            // admin_pr_prparty_delete
                            if (preg_match('#^/admin/pr/prparty/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pr_prparty_delete')), array (  '_controller' => 'PrBundle\\Controller\\PrPartyAdminController::deleteAction',  '_sonata_admin' => 'pr.admin.pr_party',  '_sonata_name' => 'admin_pr_prparty_delete',));
                            }

                            // admin_pr_prparty_show
                            if (preg_match('#^/admin/pr/prparty/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pr_prparty_show')), array (  '_controller' => 'PrBundle\\Controller\\PrPartyAdminController::showAction',  '_sonata_admin' => 'pr.admin.pr_party',  '_sonata_name' => 'admin_pr_prparty_show',));
                            }

                            // admin_pr_prparty_export
                            if ($pathinfo === '/admin/pr/prparty/export') {
                                return array (  '_controller' => 'PrBundle\\Controller\\PrPartyAdminController::exportAction',  '_sonata_admin' => 'pr.admin.pr_party',  '_sonata_name' => 'admin_pr_prparty_export',  '_route' => 'admin_pr_prparty_export',);
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/pr/prcomplaint')) {
                        // admin_pr_prcomplaint_list
                        if ($pathinfo === '/admin/pr/prcomplaint/list') {
                            return array (  '_controller' => 'PrBundle\\Controller\\PrComplaintAdminController::listAction',  '_sonata_admin' => 'pr.admin.pr_complaint',  '_sonata_name' => 'admin_pr_prcomplaint_list',  '_route' => 'admin_pr_prcomplaint_list',);
                        }

                        // admin_pr_prcomplaint_create
                        if ($pathinfo === '/admin/pr/prcomplaint/create') {
                            return array (  '_controller' => 'PrBundle\\Controller\\PrComplaintAdminController::createAction',  '_sonata_admin' => 'pr.admin.pr_complaint',  '_sonata_name' => 'admin_pr_prcomplaint_create',  '_route' => 'admin_pr_prcomplaint_create',);
                        }

                        // admin_pr_prcomplaint_batch
                        if ($pathinfo === '/admin/pr/prcomplaint/batch') {
                            return array (  '_controller' => 'PrBundle\\Controller\\PrComplaintAdminController::batchAction',  '_sonata_admin' => 'pr.admin.pr_complaint',  '_sonata_name' => 'admin_pr_prcomplaint_batch',  '_route' => 'admin_pr_prcomplaint_batch',);
                        }

                        // admin_pr_prcomplaint_edit
                        if (preg_match('#^/admin/pr/prcomplaint/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pr_prcomplaint_edit')), array (  '_controller' => 'PrBundle\\Controller\\PrComplaintAdminController::editAction',  '_sonata_admin' => 'pr.admin.pr_complaint',  '_sonata_name' => 'admin_pr_prcomplaint_edit',));
                        }

                        // admin_pr_prcomplaint_delete
                        if (preg_match('#^/admin/pr/prcomplaint/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pr_prcomplaint_delete')), array (  '_controller' => 'PrBundle\\Controller\\PrComplaintAdminController::deleteAction',  '_sonata_admin' => 'pr.admin.pr_complaint',  '_sonata_name' => 'admin_pr_prcomplaint_delete',));
                        }

                        // admin_pr_prcomplaint_show
                        if (preg_match('#^/admin/pr/prcomplaint/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pr_prcomplaint_show')), array (  '_controller' => 'PrBundle\\Controller\\PrComplaintAdminController::showAction',  '_sonata_admin' => 'pr.admin.pr_complaint',  '_sonata_name' => 'admin_pr_prcomplaint_show',));
                        }

                        // admin_pr_prcomplaint_export
                        if ($pathinfo === '/admin/pr/prcomplaint/export') {
                            return array (  '_controller' => 'PrBundle\\Controller\\PrComplaintAdminController::exportAction',  '_sonata_admin' => 'pr.admin.pr_complaint',  '_sonata_name' => 'admin_pr_prcomplaint_export',  '_route' => 'admin_pr_prcomplaint_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/pr/prfootprint')) {
                        // admin_pr_prfootprint_list
                        if ($pathinfo === '/admin/pr/prfootprint/list') {
                            return array (  '_controller' => 'PrBundle\\Controller\\PrFootPrintAdminController::listAction',  '_sonata_admin' => 'pr.admin.pr_foot_print',  '_sonata_name' => 'admin_pr_prfootprint_list',  '_route' => 'admin_pr_prfootprint_list',);
                        }

                        // admin_pr_prfootprint_create
                        if ($pathinfo === '/admin/pr/prfootprint/create') {
                            return array (  '_controller' => 'PrBundle\\Controller\\PrFootPrintAdminController::createAction',  '_sonata_admin' => 'pr.admin.pr_foot_print',  '_sonata_name' => 'admin_pr_prfootprint_create',  '_route' => 'admin_pr_prfootprint_create',);
                        }

                        // admin_pr_prfootprint_batch
                        if ($pathinfo === '/admin/pr/prfootprint/batch') {
                            return array (  '_controller' => 'PrBundle\\Controller\\PrFootPrintAdminController::batchAction',  '_sonata_admin' => 'pr.admin.pr_foot_print',  '_sonata_name' => 'admin_pr_prfootprint_batch',  '_route' => 'admin_pr_prfootprint_batch',);
                        }

                        // admin_pr_prfootprint_edit
                        if (preg_match('#^/admin/pr/prfootprint/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pr_prfootprint_edit')), array (  '_controller' => 'PrBundle\\Controller\\PrFootPrintAdminController::editAction',  '_sonata_admin' => 'pr.admin.pr_foot_print',  '_sonata_name' => 'admin_pr_prfootprint_edit',));
                        }

                        // admin_pr_prfootprint_delete
                        if (preg_match('#^/admin/pr/prfootprint/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pr_prfootprint_delete')), array (  '_controller' => 'PrBundle\\Controller\\PrFootPrintAdminController::deleteAction',  '_sonata_admin' => 'pr.admin.pr_foot_print',  '_sonata_name' => 'admin_pr_prfootprint_delete',));
                        }

                        // admin_pr_prfootprint_show
                        if (preg_match('#^/admin/pr/prfootprint/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pr_prfootprint_show')), array (  '_controller' => 'PrBundle\\Controller\\PrFootPrintAdminController::showAction',  '_sonata_admin' => 'pr.admin.pr_foot_print',  '_sonata_name' => 'admin_pr_prfootprint_show',));
                        }

                        // admin_pr_prfootprint_export
                        if ($pathinfo === '/admin/pr/prfootprint/export') {
                            return array (  '_controller' => 'PrBundle\\Controller\\PrFootPrintAdminController::exportAction',  '_sonata_admin' => 'pr.admin.pr_foot_print',  '_sonata_name' => 'admin_pr_prfootprint_export',  '_route' => 'admin_pr_prfootprint_export',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/pa/pa')) {
                    if (0 === strpos($pathinfo, '/admin/pa/pacomplaint')) {
                        // admin_pa_pacomplaint_list
                        if ($pathinfo === '/admin/pa/pacomplaint/list') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaComplaintAdminController::listAction',  '_sonata_admin' => 'pa.admin.pa_complaint',  '_sonata_name' => 'admin_pa_pacomplaint_list',  '_route' => 'admin_pa_pacomplaint_list',);
                        }

                        // admin_pa_pacomplaint_create
                        if ($pathinfo === '/admin/pa/pacomplaint/create') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaComplaintAdminController::createAction',  '_sonata_admin' => 'pa.admin.pa_complaint',  '_sonata_name' => 'admin_pa_pacomplaint_create',  '_route' => 'admin_pa_pacomplaint_create',);
                        }

                        // admin_pa_pacomplaint_batch
                        if ($pathinfo === '/admin/pa/pacomplaint/batch') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaComplaintAdminController::batchAction',  '_sonata_admin' => 'pa.admin.pa_complaint',  '_sonata_name' => 'admin_pa_pacomplaint_batch',  '_route' => 'admin_pa_pacomplaint_batch',);
                        }

                        // admin_pa_pacomplaint_edit
                        if (preg_match('#^/admin/pa/pacomplaint/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_pacomplaint_edit')), array (  '_controller' => 'PaBundle\\Controller\\PaComplaintAdminController::editAction',  '_sonata_admin' => 'pa.admin.pa_complaint',  '_sonata_name' => 'admin_pa_pacomplaint_edit',));
                        }

                        // admin_pa_pacomplaint_delete
                        if (preg_match('#^/admin/pa/pacomplaint/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_pacomplaint_delete')), array (  '_controller' => 'PaBundle\\Controller\\PaComplaintAdminController::deleteAction',  '_sonata_admin' => 'pa.admin.pa_complaint',  '_sonata_name' => 'admin_pa_pacomplaint_delete',));
                        }

                        // admin_pa_pacomplaint_show
                        if (preg_match('#^/admin/pa/pacomplaint/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_pacomplaint_show')), array (  '_controller' => 'PaBundle\\Controller\\PaComplaintAdminController::showAction',  '_sonata_admin' => 'pa.admin.pa_complaint',  '_sonata_name' => 'admin_pa_pacomplaint_show',));
                        }

                        // admin_pa_pacomplaint_export
                        if ($pathinfo === '/admin/pa/pacomplaint/export') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaComplaintAdminController::exportAction',  '_sonata_admin' => 'pa.admin.pa_complaint',  '_sonata_name' => 'admin_pa_pacomplaint_export',  '_route' => 'admin_pa_pacomplaint_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/pa/pavotecast')) {
                        // admin_pa_pavotecast_list
                        if ($pathinfo === '/admin/pa/pavotecast/list') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaVoteCastAdminController::listAction',  '_sonata_admin' => 'pa.admin.pa_vote_cast',  '_sonata_name' => 'admin_pa_pavotecast_list',  '_route' => 'admin_pa_pavotecast_list',);
                        }

                        // admin_pa_pavotecast_create
                        if ($pathinfo === '/admin/pa/pavotecast/create') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaVoteCastAdminController::createAction',  '_sonata_admin' => 'pa.admin.pa_vote_cast',  '_sonata_name' => 'admin_pa_pavotecast_create',  '_route' => 'admin_pa_pavotecast_create',);
                        }

                        // admin_pa_pavotecast_batch
                        if ($pathinfo === '/admin/pa/pavotecast/batch') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaVoteCastAdminController::batchAction',  '_sonata_admin' => 'pa.admin.pa_vote_cast',  '_sonata_name' => 'admin_pa_pavotecast_batch',  '_route' => 'admin_pa_pavotecast_batch',);
                        }

                        // admin_pa_pavotecast_edit
                        if (preg_match('#^/admin/pa/pavotecast/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_pavotecast_edit')), array (  '_controller' => 'PaBundle\\Controller\\PaVoteCastAdminController::editAction',  '_sonata_admin' => 'pa.admin.pa_vote_cast',  '_sonata_name' => 'admin_pa_pavotecast_edit',));
                        }

                        // admin_pa_pavotecast_delete
                        if (preg_match('#^/admin/pa/pavotecast/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_pavotecast_delete')), array (  '_controller' => 'PaBundle\\Controller\\PaVoteCastAdminController::deleteAction',  '_sonata_admin' => 'pa.admin.pa_vote_cast',  '_sonata_name' => 'admin_pa_pavotecast_delete',));
                        }

                        // admin_pa_pavotecast_show
                        if (preg_match('#^/admin/pa/pavotecast/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_pavotecast_show')), array (  '_controller' => 'PaBundle\\Controller\\PaVoteCastAdminController::showAction',  '_sonata_admin' => 'pa.admin.pa_vote_cast',  '_sonata_name' => 'admin_pa_pavotecast_show',));
                        }

                        // admin_pa_pavotecast_export
                        if ($pathinfo === '/admin/pa/pavotecast/export') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaVoteCastAdminController::exportAction',  '_sonata_admin' => 'pa.admin.pa_vote_cast',  '_sonata_name' => 'admin_pa_pavotecast_export',  '_route' => 'admin_pa_pavotecast_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/pa/paparty')) {
                        // admin_pa_paparty_list
                        if ($pathinfo === '/admin/pa/paparty/list') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaPartyAdminController::listAction',  '_sonata_admin' => 'pa.admin.pa_party',  '_sonata_name' => 'admin_pa_paparty_list',  '_route' => 'admin_pa_paparty_list',);
                        }

                        // admin_pa_paparty_create
                        if ($pathinfo === '/admin/pa/paparty/create') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaPartyAdminController::createAction',  '_sonata_admin' => 'pa.admin.pa_party',  '_sonata_name' => 'admin_pa_paparty_create',  '_route' => 'admin_pa_paparty_create',);
                        }

                        // admin_pa_paparty_batch
                        if ($pathinfo === '/admin/pa/paparty/batch') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaPartyAdminController::batchAction',  '_sonata_admin' => 'pa.admin.pa_party',  '_sonata_name' => 'admin_pa_paparty_batch',  '_route' => 'admin_pa_paparty_batch',);
                        }

                        // admin_pa_paparty_edit
                        if (preg_match('#^/admin/pa/paparty/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_paparty_edit')), array (  '_controller' => 'PaBundle\\Controller\\PaPartyAdminController::editAction',  '_sonata_admin' => 'pa.admin.pa_party',  '_sonata_name' => 'admin_pa_paparty_edit',));
                        }

                        // admin_pa_paparty_delete
                        if (preg_match('#^/admin/pa/paparty/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_paparty_delete')), array (  '_controller' => 'PaBundle\\Controller\\PaPartyAdminController::deleteAction',  '_sonata_admin' => 'pa.admin.pa_party',  '_sonata_name' => 'admin_pa_paparty_delete',));
                        }

                        // admin_pa_paparty_show
                        if (preg_match('#^/admin/pa/paparty/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_paparty_show')), array (  '_controller' => 'PaBundle\\Controller\\PaPartyAdminController::showAction',  '_sonata_admin' => 'pa.admin.pa_party',  '_sonata_name' => 'admin_pa_paparty_show',));
                        }

                        // admin_pa_paparty_export
                        if ($pathinfo === '/admin/pa/paparty/export') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaPartyAdminController::exportAction',  '_sonata_admin' => 'pa.admin.pa_party',  '_sonata_name' => 'admin_pa_paparty_export',  '_route' => 'admin_pa_paparty_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/pa/pacandidate')) {
                        // admin_pa_pacandidate_list
                        if ($pathinfo === '/admin/pa/pacandidate/list') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaCandidateAdminController::listAction',  '_sonata_admin' => 'pa.admin.pa_candidate',  '_sonata_name' => 'admin_pa_pacandidate_list',  '_route' => 'admin_pa_pacandidate_list',);
                        }

                        // admin_pa_pacandidate_create
                        if ($pathinfo === '/admin/pa/pacandidate/create') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaCandidateAdminController::createAction',  '_sonata_admin' => 'pa.admin.pa_candidate',  '_sonata_name' => 'admin_pa_pacandidate_create',  '_route' => 'admin_pa_pacandidate_create',);
                        }

                        // admin_pa_pacandidate_batch
                        if ($pathinfo === '/admin/pa/pacandidate/batch') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaCandidateAdminController::batchAction',  '_sonata_admin' => 'pa.admin.pa_candidate',  '_sonata_name' => 'admin_pa_pacandidate_batch',  '_route' => 'admin_pa_pacandidate_batch',);
                        }

                        // admin_pa_pacandidate_edit
                        if (preg_match('#^/admin/pa/pacandidate/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_pacandidate_edit')), array (  '_controller' => 'PaBundle\\Controller\\PaCandidateAdminController::editAction',  '_sonata_admin' => 'pa.admin.pa_candidate',  '_sonata_name' => 'admin_pa_pacandidate_edit',));
                        }

                        // admin_pa_pacandidate_delete
                        if (preg_match('#^/admin/pa/pacandidate/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_pacandidate_delete')), array (  '_controller' => 'PaBundle\\Controller\\PaCandidateAdminController::deleteAction',  '_sonata_admin' => 'pa.admin.pa_candidate',  '_sonata_name' => 'admin_pa_pacandidate_delete',));
                        }

                        // admin_pa_pacandidate_show
                        if (preg_match('#^/admin/pa/pacandidate/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_pacandidate_show')), array (  '_controller' => 'PaBundle\\Controller\\PaCandidateAdminController::showAction',  '_sonata_admin' => 'pa.admin.pa_candidate',  '_sonata_name' => 'admin_pa_pacandidate_show',));
                        }

                        // admin_pa_pacandidate_export
                        if ($pathinfo === '/admin/pa/pacandidate/export') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaCandidateAdminController::exportAction',  '_sonata_admin' => 'pa.admin.pa_candidate',  '_sonata_name' => 'admin_pa_pacandidate_export',  '_route' => 'admin_pa_pacandidate_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/pa/pafootprint')) {
                        // admin_pa_pafootprint_list
                        if ($pathinfo === '/admin/pa/pafootprint/list') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaFootPrintAdminController::listAction',  '_sonata_admin' => 'pa.admin.pa_foot_print',  '_sonata_name' => 'admin_pa_pafootprint_list',  '_route' => 'admin_pa_pafootprint_list',);
                        }

                        // admin_pa_pafootprint_create
                        if ($pathinfo === '/admin/pa/pafootprint/create') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaFootPrintAdminController::createAction',  '_sonata_admin' => 'pa.admin.pa_foot_print',  '_sonata_name' => 'admin_pa_pafootprint_create',  '_route' => 'admin_pa_pafootprint_create',);
                        }

                        // admin_pa_pafootprint_batch
                        if ($pathinfo === '/admin/pa/pafootprint/batch') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaFootPrintAdminController::batchAction',  '_sonata_admin' => 'pa.admin.pa_foot_print',  '_sonata_name' => 'admin_pa_pafootprint_batch',  '_route' => 'admin_pa_pafootprint_batch',);
                        }

                        // admin_pa_pafootprint_edit
                        if (preg_match('#^/admin/pa/pafootprint/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_pafootprint_edit')), array (  '_controller' => 'PaBundle\\Controller\\PaFootPrintAdminController::editAction',  '_sonata_admin' => 'pa.admin.pa_foot_print',  '_sonata_name' => 'admin_pa_pafootprint_edit',));
                        }

                        // admin_pa_pafootprint_delete
                        if (preg_match('#^/admin/pa/pafootprint/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_pafootprint_delete')), array (  '_controller' => 'PaBundle\\Controller\\PaFootPrintAdminController::deleteAction',  '_sonata_admin' => 'pa.admin.pa_foot_print',  '_sonata_name' => 'admin_pa_pafootprint_delete',));
                        }

                        // admin_pa_pafootprint_show
                        if (preg_match('#^/admin/pa/pafootprint/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_pafootprint_show')), array (  '_controller' => 'PaBundle\\Controller\\PaFootPrintAdminController::showAction',  '_sonata_admin' => 'pa.admin.pa_foot_print',  '_sonata_name' => 'admin_pa_pafootprint_show',));
                        }

                        // admin_pa_pafootprint_export
                        if ($pathinfo === '/admin/pa/pafootprint/export') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaFootPrintAdminController::exportAction',  '_sonata_admin' => 'pa.admin.pa_foot_print',  '_sonata_name' => 'admin_pa_pafootprint_export',  '_route' => 'admin_pa_pafootprint_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/pa/panotification')) {
                        // admin_pa_panotification_list
                        if ($pathinfo === '/admin/pa/panotification/list') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaNotificationAdminController::listAction',  '_sonata_admin' => 'pa.admin.pa_notification',  '_sonata_name' => 'admin_pa_panotification_list',  '_route' => 'admin_pa_panotification_list',);
                        }

                        // admin_pa_panotification_create
                        if ($pathinfo === '/admin/pa/panotification/create') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaNotificationAdminController::createAction',  '_sonata_admin' => 'pa.admin.pa_notification',  '_sonata_name' => 'admin_pa_panotification_create',  '_route' => 'admin_pa_panotification_create',);
                        }

                        // admin_pa_panotification_batch
                        if ($pathinfo === '/admin/pa/panotification/batch') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaNotificationAdminController::batchAction',  '_sonata_admin' => 'pa.admin.pa_notification',  '_sonata_name' => 'admin_pa_panotification_batch',  '_route' => 'admin_pa_panotification_batch',);
                        }

                        // admin_pa_panotification_edit
                        if (preg_match('#^/admin/pa/panotification/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_panotification_edit')), array (  '_controller' => 'PaBundle\\Controller\\PaNotificationAdminController::editAction',  '_sonata_admin' => 'pa.admin.pa_notification',  '_sonata_name' => 'admin_pa_panotification_edit',));
                        }

                        // admin_pa_panotification_delete
                        if (preg_match('#^/admin/pa/panotification/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_panotification_delete')), array (  '_controller' => 'PaBundle\\Controller\\PaNotificationAdminController::deleteAction',  '_sonata_admin' => 'pa.admin.pa_notification',  '_sonata_name' => 'admin_pa_panotification_delete',));
                        }

                        // admin_pa_panotification_show
                        if (preg_match('#^/admin/pa/panotification/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_panotification_show')), array (  '_controller' => 'PaBundle\\Controller\\PaNotificationAdminController::showAction',  '_sonata_admin' => 'pa.admin.pa_notification',  '_sonata_name' => 'admin_pa_panotification_show',));
                        }

                        // admin_pa_panotification_export
                        if ($pathinfo === '/admin/pa/panotification/export') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaNotificationAdminController::exportAction',  '_sonata_admin' => 'pa.admin.pa_notification',  '_sonata_name' => 'admin_pa_panotification_export',  '_route' => 'admin_pa_panotification_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/pa/papinksheet')) {
                        // admin_pa_papinksheet_list
                        if ($pathinfo === '/admin/pa/papinksheet/list') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaPinkSheetAdminController::listAction',  '_sonata_admin' => 'pa.admin.pa_pink_sheet',  '_sonata_name' => 'admin_pa_papinksheet_list',  '_route' => 'admin_pa_papinksheet_list',);
                        }

                        // admin_pa_papinksheet_create
                        if ($pathinfo === '/admin/pa/papinksheet/create') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaPinkSheetAdminController::createAction',  '_sonata_admin' => 'pa.admin.pa_pink_sheet',  '_sonata_name' => 'admin_pa_papinksheet_create',  '_route' => 'admin_pa_papinksheet_create',);
                        }

                        // admin_pa_papinksheet_batch
                        if ($pathinfo === '/admin/pa/papinksheet/batch') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaPinkSheetAdminController::batchAction',  '_sonata_admin' => 'pa.admin.pa_pink_sheet',  '_sonata_name' => 'admin_pa_papinksheet_batch',  '_route' => 'admin_pa_papinksheet_batch',);
                        }

                        // admin_pa_papinksheet_edit
                        if (preg_match('#^/admin/pa/papinksheet/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_papinksheet_edit')), array (  '_controller' => 'PaBundle\\Controller\\PaPinkSheetAdminController::editAction',  '_sonata_admin' => 'pa.admin.pa_pink_sheet',  '_sonata_name' => 'admin_pa_papinksheet_edit',));
                        }

                        // admin_pa_papinksheet_delete
                        if (preg_match('#^/admin/pa/papinksheet/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_papinksheet_delete')), array (  '_controller' => 'PaBundle\\Controller\\PaPinkSheetAdminController::deleteAction',  '_sonata_admin' => 'pa.admin.pa_pink_sheet',  '_sonata_name' => 'admin_pa_papinksheet_delete',));
                        }

                        // admin_pa_papinksheet_show
                        if (preg_match('#^/admin/pa/papinksheet/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_pa_papinksheet_show')), array (  '_controller' => 'PaBundle\\Controller\\PaPinkSheetAdminController::showAction',  '_sonata_admin' => 'pa.admin.pa_pink_sheet',  '_sonata_name' => 'admin_pa_papinksheet_show',));
                        }

                        // admin_pa_papinksheet_export
                        if ($pathinfo === '/admin/pa/papinksheet/export') {
                            return array (  '_controller' => 'PaBundle\\Controller\\PaPinkSheetAdminController::exportAction',  '_sonata_admin' => 'pa.admin.pa_pink_sheet',  '_sonata_name' => 'admin_pa_papinksheet_export',  '_route' => 'admin_pa_papinksheet_export',);
                        }

                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/user/user')) {
                // admin_user_user_list
                if ($pathinfo === '/admin/user/user/list') {
                    return array (  '_controller' => 'UserBundle\\Controller\\UserAdminController::listAction',  '_sonata_admin' => 'user.admin.user',  '_sonata_name' => 'admin_user_user_list',  '_route' => 'admin_user_user_list',);
                }

                // admin_user_user_create
                if ($pathinfo === '/admin/user/user/create') {
                    return array (  '_controller' => 'UserBundle\\Controller\\UserAdminController::createAction',  '_sonata_admin' => 'user.admin.user',  '_sonata_name' => 'admin_user_user_create',  '_route' => 'admin_user_user_create',);
                }

                // admin_user_user_batch
                if ($pathinfo === '/admin/user/user/batch') {
                    return array (  '_controller' => 'UserBundle\\Controller\\UserAdminController::batchAction',  '_sonata_admin' => 'user.admin.user',  '_sonata_name' => 'admin_user_user_batch',  '_route' => 'admin_user_user_batch',);
                }

                // admin_user_user_edit
                if (preg_match('#^/admin/user/user/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_user_edit')), array (  '_controller' => 'UserBundle\\Controller\\UserAdminController::editAction',  '_sonata_admin' => 'user.admin.user',  '_sonata_name' => 'admin_user_user_edit',));
                }

                // admin_user_user_delete
                if (preg_match('#^/admin/user/user/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_user_delete')), array (  '_controller' => 'UserBundle\\Controller\\UserAdminController::deleteAction',  '_sonata_admin' => 'user.admin.user',  '_sonata_name' => 'admin_user_user_delete',));
                }

                // admin_user_user_show
                if (preg_match('#^/admin/user/user/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_user_show')), array (  '_controller' => 'UserBundle\\Controller\\UserAdminController::showAction',  '_sonata_admin' => 'user.admin.user',  '_sonata_name' => 'admin_user_user_show',));
                }

                // admin_user_user_export
                if ($pathinfo === '/admin/user/user/export') {
                    return array (  '_controller' => 'UserBundle\\Controller\\UserAdminController::exportAction',  '_sonata_admin' => 'user.admin.user',  '_sonata_name' => 'admin_user_user_export',  '_route' => 'admin_user_user_export',);
                }

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
