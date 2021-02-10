<?php

class EnderecoSettings extends oxAdminView
{
    /**
     * Current class template name.
     *
     * @var string
     */
    protected $_sThisTemplate = 'endereco_settings.tpl';

    /**
     * Executes parent method parent::render()
     *
     * @return string
     */
    public function render()
    {
        $oConfig = $this->getConfig();
        parent::render();
        $oEnderecoService = oxNew('EnderecoService');
        $sOxId = $oConfig->getRequestParameter('oxid');
        if (!$sOxId) {
            $sOxId = $oConfig->getShopId();
        }

        $this->_aViewData['oxid'] =  $sOxId;

        $this->_aViewData['cstrs'] = [];

        $sql = "SELECT `OXVARNAME`, DECODE( `OXVARVALUE`, ? ) AS `OXVARVALUE` FROM `oxconfig` WHERE `OXSHOPID` = ? AND `OXMODULE` = 'module:endereco-oxid4-client'";
        $resultSet = oxDb::getDb()->getAll(
            $sql,
            [$oConfig->getConfigParam('sConfigKey'), $sOxId]
        );

        foreach ($resultSet as $result) {
            $this->_aViewData['cstrs'][$result[0]] = $result[1];
        }

        $this->_aViewData['cstrs']['bHasConnection'] = $oEnderecoService->checkConnection();

        return $this->_sThisTemplate;
    }


    /**
     * Saves changed modules configuration parameters.
     *
     * @return void
     */
    public function save()
    {
        $oConfig = $this->getConfig();
        $checkboxes = [
            'sUSEAMS',
            'sCHECKALL',
            'sAMSBLURTRIGGER',
            'sSMARTFILL',
            'bUseEmailservice',
            'bUsePersonalService',
            'bAllowControllerFilter',
            'bPreselectCountry',
            'sAMSSubmitTrigger',
            'sAMSResumeSubmit',
            'bUseCss',
            'bShowDebug',
            'bShowEmailserviceErrors',
            'bChangeFieldsOrder'
        ];

        $sOxId = $oConfig->getRequestParameter('oxid');
        $aConfStrs = $oConfig->getRequestParameter('cstrs');

        if (is_array($aConfStrs)) {
            foreach ($aConfStrs as $sVarName => $sVarVal) {
                if (in_array($sVarName, $checkboxes)) {
                    $oConfig->saveShopConfVar('bool', $sVarName, true, $sOxId, 'module:endereco-oxid4-client');
                } else {
                    if (in_array($sVarName, array('sMainColor', 'sErrorColor', 'sSelectionColor')) && '#000000' === $sVarVal) {
                        $sVarVal = '';
                    }
                    $oConfig->saveShopConfVar('str', $sVarName, $sVarVal, $sOxId, 'module:endereco-oxid4-client');
                }

            }
        }

        foreach ($checkboxes as $checkboxname) {
            if (!isset($aConfStrs[$checkboxname])) {
                $oConfig->saveShopConfVar('bool', $checkboxname, false, $sOxId, 'module:endereco-oxid4-client');
            }
        }
    }
}
