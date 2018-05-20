<?php

/**
 * ======================================================================
 * LICENSE: This file is subject to the terms and conditions defined in *
 * file 'license.txt', which is part of this source code package.       *
 * ======================================================================
 */

/**
 * Backend core settings
 * 
 * @package AAM
 * @author Vasyl Martyniuk <vasyl@vasyltech.com>
 */
class AAM_Backend_Feature_Settings_Core extends AAM_Backend_Feature_Abstract {
    
    /**
     * @inheritdoc
     */
    public static function getTemplate() {
        return 'settings/core.phtml';
    }
    
    /**
     * 
     * @return type
     */
    protected function getList() {
        $settings = array(
            'manage-capability' => array(
                'title' => __('Edit/Delete Capabilities', AAM_KEY),
                'descr' => AAM_Backend_View_Helper::preparePhrase('Allow to edit or delete any existing capability on the Capabilities tab. [Warning!] For experienced users only. Changing or deleting capability may result in loosing access to some features or the entire website.', 'b'),
                'value' => AAM_Core_Config::get('manage-capability', false)
            ),
            'backend-access-control' => array(
                'title' => __('Backend Access Control', AAM_KEY),
                'descr' => __('Allow AAM to manage access to the backend. Keep this option disabled if there is no needs to restrict backend features for other users. This option may reduce your website backend performance.', AAM_KEY),
                'value' => AAM_Core_Config::get('backend-access-control', true)
            ),
            'frontend-access-control' => array(
                'title' => __('Frontend Access Control', AAM_KEY),
                'descr' => __('Allow AAM to manage access to frontend resources. If there is no need to manage access to the website frontend then keep this option unchecked as it may increase your webiste performance.', AAM_KEY),
                'value' => AAM_Core_Config::get('frontend-access-control', true)
            ),
            'api-access-control' => array(
                'title' => __('API Access Control', AAM_KEY),
                'descr' => __('Allow AAM to manage access to the website resources that are invoked with WordPress core API (currently only for RESTful API). If there is no need to manage access to the website API then keep this option unchecked as it may increase your webiste performance.', AAM_KEY),
                'value' => AAM_Core_Config::get('api-access-control', true)
            ),
            'render-access-metabox' => array(
                'title' => __('Render Access Manager Metabox', AAM_KEY),
                'descr' => __('Render Access Manager metabox on all post and category edit pages. Access Manager metabox is the quick way to manage access to any post or category without leaving an edit page.', AAM_KEY),
                'value' => AAM_Core_Config::get('render-access-metabox', true),
            ),
            'show-access-link' => array(
                'title' => __('Render Access Link', AAM_KEY),
                'descr' => __('Render Access shortcut link under any post, page, custom post type, category, custom taxonomy title or user name.', AAM_KEY),
                'value' => AAM_Core_Config::get('show-access-link', true),
            ),
            'secure-login' => array(
                'title' => __('Secure Login', AAM_KEY),
                'descr' => __('AAM comes with its own user login handler. With this feature you can add AJAX login widget to your frontend page that significantly enhance your website security.', AAM_KEY),
                'value' => AAM_Core_Config::get('secure-login', true)
            ),
            'core.xmlrpc' => array(
                'title' => __('XML-RPC WordPress API', AAM_KEY),
                'descr' => sprintf(AAM_Backend_View_Helper::preparePhrase('Remote procedure call (RPC) interface is used to manage WordPress website content and features. For more information check %sXML-RPC Support%s article.', 'b'), '<a href="https://codex.wordpress.org/XML-RPC_Support">', '</a>'),
                'value' => AAM_Core_Config::get('core.xmlrpc', true)
            ),
            'core.restful' => array(
                'title' => __('RESTful WordPress API', AAM_KEY),
                'descr' => sprintf(AAM_Backend_View_Helper::preparePhrase('RESTful interface that is used to manage WordPress website content and features. For more information check %sREST API handbook%s.', 'b'), '<a href="https://developer.wordpress.org/rest-api/">', '</a>'),
                'value' => AAM_Core_Config::get('core.restful', true)
            ),
            'jwt-authentication' => array(
                'title' => __('JWT Authentication', AAM_KEY),
                'descr' => sprintf(AAM_Backend_View_Helper::preparePhrase('[Note!] PHP 5.4 or higher is required for this feature. Enable the ability to authenticate user with WordPress RESTful API and JWT token. For more information, check %sHow to authenticate WordPress user with JWT token%s article', 'b'), '<a href="https://aamplugin.com/help/how-to-authenticate-wordpress-user-with-jwt-token">', '</a>'),
                'value' => AAM_Core_Config::get('jwt-authentication', false)
            )
        );
        
        return apply_filters('aam-settings-filter', $settings, 'core');
    }
    
    /**
     * Register Contact/Hire feature
     * 
     * @return void
     * 
     * @access public
     */
    public static function register() {
        AAM_Backend_Feature::registerFeature((object) array(
            'uid'        => 'settings-core',
            'position'   => 1,
            'title'      => __('Core Settings', AAM_KEY),
            'capability' => 'aam_manage_settings',
            'type'       => 'settings',
            'view'       => __CLASS__
        ));
    }

}