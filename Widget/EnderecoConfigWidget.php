<?php

class EnderecoConfigWidget extends oxWidget
{
    /**
     * @var string Widget template
     */
    protected $_sThisTemplate = 'enderecoconfig_default.tpl';


    /**
     * Getter for protected property.
     *
     * @return string
     */
    public function getThisTemplate()
    {
        // If there is a custom template, return it.
        $customTemplateName = '/endereco/config.tpl';
        $templateFile = $this->getConfig()->getTemplatePath($customTemplateName, $this->isAdmin());
        if (file_exists($templateFile)) {
            return $customTemplateName;
        }

        // If there is a specific config, return it.
        $aConfigMapping = [
            'flow' => 'enderecoconfig_flow.tpl',
            'wave' => 'enderecoconfig_wave.tpl',
            'azure' => 'enderecoconfig_azure.tpl',
        ];

        $aConfigMapping = $this->extendConfigMapping($aConfigMapping);

        $oTheme = oxNew('oxtheme');
        $oTheme->load($oTheme->getActiveThemeId());

        $counter = 0;
        while (true) {
            $sThemeId = $oTheme->getId();

            if (isset($aConfigMapping[$sThemeId])) {
                return $aConfigMapping[$sThemeId];
            }

            // Get theme parent.
            $oTheme = $oTheme->getParent();

            if (null === $oTheme || (20 < $counter)) {
                break;
            }

            $counter++;
        }

        // If none of the above hits, return default config.
        return $this->_sThisTemplate;
    }

    public function extendConfigMapping($configMapping = []) {
        return $configMapping;
    }

    /**
     * Render
     *
     * @return string Template name.
     */
    public function render()
    {
        parent::render();

        $oConfig = $this->getConfig();
        $moduleVersions = $oConfig->getConfigParam('aModuleVersions');
        $sOxId = $oConfig->getRequestParameter('oxid');
        if (!$sOxId) {
            $sOxId = $oConfig->getShopId();
        }
        $this->_aViewData['enderecoclient'] = [];

        $sql = "SELECT `OXVARNAME`, DECODE( `OXVARVALUE`, ? ) AS `OXVARVALUE` FROM `oxconfig` WHERE `OXSHOPID` = ? AND `OXMODULE` = 'module:endereco-oxid4-client'";
        $resultSet = oxDB::getDb()->getAll(
            $sql,
            [$oConfig->getConfigParam('sConfigKey'), $sOxId]
        );

        foreach ($resultSet as $result) {

            $this->_aViewData['enderecoclient'][$result[0]] = $result[1];
            if ('sAllowedControllerClasses' === $result[0]) {
                $this->_aViewData['enderecoclient']['aAllowedControllerClasses'] = explode(',', $result[1]);
            }
        }

        $this->_aViewData['enderecoclient']['sControllerClass'] = $this->_aViewParams['curClass'];
        $this->_aViewData['enderecoclient']['sModuleVersion'] = $moduleVersions['endereco-oxid4-client'];

        return $this->getThisTemplate();
    }
}
