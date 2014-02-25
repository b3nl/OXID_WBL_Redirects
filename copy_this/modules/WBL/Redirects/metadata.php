<?php
    /**
     * Module-Metadata for the WBL Redirects.
     * @author     blange <code@wbl-konzept.de>
     * @category   modules
     * @package    WBL_Redirects
     * @subpackage oxAutoload
     * @version    SVN: $Id$
     */

    $sMetadataVersion     = '1.1';
    $aWBLRedirectsClasses = array(
        'oxSeoDecoder' => 'WBL_Redirects_SEO_Decoder'
    );
    $aWBLRedirectsFiles   = array();

    foreach ($aWBLRedirectsFiles as &$sFile) {
        $sFile = str_replace('_', '/', $sClass) . '.php';
    } // foreach

    foreach ($aWBLRedirectsClasses as $sClass) {
        // OXID needs the slash
        $aWBLRedirectsFiles[$sClass] = str_replace('_', '/', $sClass) . '.php';
    } // foreach

    $aModule = array(
        'author'      => 'WBL Konzept',
        'description' => array(
            'de' => 'Spezielle zusätzliche Redirects for the shop',
            'en' => 'Special Redirects for the shop'
        ),
        'email'       => 'code@wbl-konzept.de',
        'extend'      => $aWBLRedirectsClasses,
        'files'       => $aWBLRedirectsFiles,
        'id'          => 'WBL_Redirects',
        'settings'    => array(
            array('group' => 'WBL_REDIRECTS_MAIN', 'name' => 'aWBLRedirectsMap', 'value' => array(), 'type' => 'aarr')
        ),
        'title'       => 'WBL Modules Redirects',
        'thumbnail'   => 'wbl_logo.jpg',
        'url'         => 'http://wbl-konzept.de',
        'version'     => '1.0.0'
    );