<?php
/**
 * This file contains user extension.
 *
 * PHP Version 7
 *
 * @package   Endereco\OxidClient\Model
 * @author    Ilja Weber <ilja.weber@mobilemojo.de>
 * @copyright 2019 mobilemojo – Apps & eCommerce UG (haftungsbeschränkt) & Co. KG
 *            (https://www.mobilemojo.de/)
 * @license   http://opensource.org/licenses/gpl-3.0 GNU General Public License,
 *            version 3 (GPLv3)
 * @link      https://www.endereco.de/
 */


/**
 * User
 *
 *
 * PHP Version 7
 *
 * @package   Endereco\OxidClient\Model
 * @author    Ilja Weber <ilja.weber@mobilemojo.de>
 * @copyright 2019 mobilemojo – Apps & eCommerce UG (haftungsbeschränkt) & Co. KG
 *            (https://www.mobilemojo.de/)
 * @license   http://opensource.org/licenses/gpl-3.0 GNU General Public License,
 *            version 3 (GPLv3)
 * @link      https://www.endereco.de/
 */

class EnderecoUser extends enderecouser_parent
{

    /**
     * Overrides default save function.
     *
     * @return bool
     * @throws oxSystemComponentException
     */
    public function save()
    {
        $blRet = parent::save();

        if ($blRet) {
            $oEnderecoService = oxNew('EnderecoService');
            $bAnyDoAccounting = false;
            $sSessionIds = array();
            if ($_POST) {
                foreach ($_POST as $sVarName => $sVarValue) {
                    if ((strpos($sVarName, '_session_counter') !== false) && 0 < intval($sVarValue)) {
                        $sSessionIdName = str_replace('_session_counter', '', $sVarName) . '_session_id';
                        $sSessionIds[] = $_POST[$sSessionIdName];
                        $bAnyDoAccounting = true;
                    }
                }
            }

            if ($sSessionIds) {
                $oEnderecoService->closeSessions($sSessionIds);
            }

            if ($bAnyDoAccounting) {
                $oEnderecoService->closeConversion();
            }
        }

        return $blRet;
    }

    /**
     * Performs user login by username and password. Fetches user data from DB.
     * Registers in session. Returns true on success, FALSE otherwise.
     *
     * @param string $sUser     User username
     * @param string $sPassword User password
     * @param bool   $blCookie  (default false)
     *
     * @throws object
     * @throws oxCookieException
     * @throws oxUserException
     *
     * @return bool
     */
    public function login($sUser, $sPassword, $blCookie = false)
    {
        $blRet = parent::login($sUser, $sPassword, $blCookie);

        if ($blRet && !$this->isAdmin()) {
            $sOxId = oxRegistry::getConfig()->getShopId();
            $bCheckExisting = oxRegistry::getConfig()->getShopConfVar('sCHECKALL', $sOxId, 'module:endereco-oxid4-client');
            if (1 === intval($bCheckExisting)) {
                $oEnderecoService = oxNew('EnderecoService');

                $oLang = oxRegistry::getLang();
                $localLanguage = $oLang->getLanguageAbbr();

                $oCountry = oxNew('oxCountry');
                $oCountry->load($this->oxuser__oxcountryid->value);
                $countryCode = strtolower($oCountry->oxcountry__oxisoalpha2->value);

                $billingAddress = array(
                    'countryCode' => $countryCode,
                    '__language' => $localLanguage,
                    'additionalInfo' => $this->oxuser__oxaddinfo->value,
                    'postalCode' => $this->oxuser__oxzip->value,
                    'locality' => $this->oxuser__oxcity->value,
                    'streetName' => $this->oxuser__oxstreet->value,
                    'buildingNumber' => $this->oxuser__oxstreetnr->value,
                    '__status' => (('' !== $this->oxuser__mojoamsstatus->value) ? $this->oxuser__mojoamsstatus->value : 'address_not_checked'),
                    '__predictions' => '',
                    '__timestamp' => '',
                );

                if (
                    $oEnderecoService->shouldBeChecked(explode(',', $billingAddress['__status']))
                ) {
                    // Check.
                    $checkedBillingAddress = $oEnderecoService->checkAddress($billingAddress);

                    // Save.
                    $this->oxuser__mojoamsstatus->value = $checkedBillingAddress['__status'];
                    $this->oxuser__mojoamsts->rawValue = $checkedBillingAddress['__timestamp'];
                    $this->oxuser__mojoamspredictions->rawValue = $checkedBillingAddress['__predictions'];
                    $this->save();
                }

                // check delivery addresses.
                $aAddresses = $this->getUserAddresses();
                $aAddressList = $aAddresses->getArray();
                foreach ($aAddressList as $oAddress) {

                    $oCountry = oxNew('oxCountry');
                    $oCountry->load($oAddress->oxaddress__oxcountryid->value);
                    $countryCode = strtolower($oCountry->oxcountry__oxisoalpha2->value);

                    $shippingAddress = array(
                        'countryCode' => $countryCode,
                        '__language' => $localLanguage,
                        'additionalInfo' => $oAddress->oxaddress__oxaddinfo->value,
                        'postalCode' => $oAddress->oxaddress__oxzip->value,
                        'locality' => $oAddress->oxaddress__oxcity->value,
                        'streetName' => $oAddress->oxaddress__oxstreet->value,
                        'buildingNumber' => $oAddress->oxaddress__oxstreetnr->value,
                        '__status' => (('' !== $oAddress->oxaddress__mojoamsstatus->value) ? $oAddress->oxaddress__mojoamsstatus->value : 'address_not_checked'),
                        '__predictions' => '',
                        '__timestamp' => '',
                    );

                    if (
                        $oEnderecoService->shouldBeChecked(explode(',', $shippingAddress['__status']))
                    ) {
                        // Check.
                        $checkedShippingAddress = $oEnderecoService->checkAddress($shippingAddress);

                        // Save.
                        $oAddress->oxaddress__mojoamsstatus->value = $checkedShippingAddress['__status'];
                        $oAddress->oxaddress__mojoamsts->rawValue = $checkedShippingAddress['__timestamp'];
                        $oAddress->oxaddress__mojoamspredictions->rawValue = $checkedShippingAddress['__predictions'];
                        $oAddress->save();
                    }
                }
            }
        }

        return $blRet;
    }
}
