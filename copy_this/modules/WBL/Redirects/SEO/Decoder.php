<?php
    /**
     * ./modules/WBL/Redirects/SEO/Dcoder.php
     * @author     blange <code@wbl-konzept.de>
     * @category   modules
     * @package    WBL_Redirects
     * @subpackage SEO
     * @version    SVN: $Id$
     */

    /**
     * SEO-Decoder um alte URLs aufzulösen.
     * @author     blange <code@wbl-konzept.de>
     * @category   modules
     * @package    WBL_Redirects
     * @subpackage SEO
     * @version    SVN: $Id$
     */
    class WBL_Redirects_SEO_Decoder extends WBL_Redirects_SEO_Decoder_parent
    {
        /**
         * Checks if a url is found in the config.
         * @param string $sParams
         * @return string|void
         */
        protected function _decodeSimpleUrl($sParams)
        {
            if (!$mReturn = parent::_decodeSimpleUrl($sParams)) {
                $mReturn = $this->findWBLRedirect($sParams);
            } // if

            return $mReturn;
        } // function

        /**
         * Checks the config if there is a matching url.
         * @param string $sParams
         * @return mixed|null
         */
        protected function findWBLRedirect($sParams)
        {
            $aConfig = $this->getConfig()->getConfigParam('aWBLRedirectsMap');
            $mHit    = null;

            if ($aConfig) {
                if (array_keys($sParams, $aConfig)) {
                    $mHit = $aConfig[$sParams];
                } else {
                    /** @var $oStr oxStrMb|oxStrRegular */
                    $oStr = getStr();
                    $sDiv = '#';

                    foreach ($aConfig as $sOld => $sNew) {
                        if ($oStr->preg_match($sDiv . $sOld . $sDiv . 'U', $sParams, $aMatches)) {
                            $mHit = $sNew;

                            array_shift($aMatches);

                            if ($aMatches) {
                                $aSearches = array();

                                foreach ($aMatches as $iRound => $sPatternHit) {
                                    $aSearches[] = '$' . ++$iRound;
                                } // foreach

                                $mHit = str_replace($aSearches, $aMatches, $mHit);
                            } // if

                            break;
                        } // if
                    } // foreach
                } // else
            } // if

            return $mHit;
        } // function
    } // class