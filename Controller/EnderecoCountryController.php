<?php

class EnderecoCountryController extends oxUBase
{
    public function render()
    {
        $oConfig = $this->getConfig();
        $countryId = $oConfig->getRequestParameter('countryId', true);
        $countryCode = $oConfig->getRequestParameter('countryCode', true);

        if (!empty($countryId)) {
            $oCountry = oxNew('oxCountry');
            $oCountry->load($countryId);
            die(strtolower($oCountry->oxcountry__oxisoalpha2->value));
        }

        if (!empty($countryCode)) {
            $oCountry = oxNew('oxCountry');
            die($oCountry->getIdByCode($countryCode));
        }
    }
}
