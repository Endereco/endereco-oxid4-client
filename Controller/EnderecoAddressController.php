<?php

class EnderecoAddressController extends oxUBase
{
    public function render()
    {
        $oConfig = $this->getConfig();
        $sOxId = $oConfig->getRequestParameter('oxid');
        $data = json_decode(file_get_contents('php://input'), true);
        if ('editBillingAddress' == $data['method']) {
            // Save billing address.
            $oUser = oxNew('oxuser');

            if (!$oConfig->isUtf()) {
                $data['params']['address']['postalCode'] = iconv('UTF-8', 'ISO-8859-1', $data['params']['address']['postalCode']);
                $data['params']['address']['locality'] = iconv('UTF-8', 'ISO-8859-1', $data['params']['address']['locality']);
                $data['params']['address']['streetName'] = iconv('UTF-8', 'ISO-8859-1',  $data['params']['address']['streetName']);
                $data['params']['address']['buildingNumber'] = iconv('UTF-8', 'ISO-8859-1',  $data['params']['address']['buildingNumber']);
                $data['params']['address']['additionalInfo'] = iconv('UTF-8', 'ISO-8859-1', $data['params']['address']['additionalInfo']);
            }

            if ($oUser->load($data['params']['addressId'])) {
                $oUser->oxuser__oxzip->rawValue = $data['params']['address']['postalCode']?$data['params']['address']['postalCode']:$oUser->oxuser__oxzip->rawValue;
                $oUser->oxuser__oxcity->rawValue = $data['params']['address']['locality']?$data['params']['address']['locality']:$oUser->oxuser__oxcity->rawValue;
                $oUser->oxuser__oxstreet->rawValue = $data['params']['address']['streetName']?$data['params']['address']['streetName']:$oUser->oxuser__oxstreet->rawValue;
                $oUser->oxuser__oxstreetnr->rawValue = $data['params']['address']['buildingNumber']?$data['params']['address']['buildingNumber']:$oUser->oxuser__oxstreetnr->rawValue;
                $oUser->oxuser__oxaddinfo->rawValue = $data['params']['address']['additionalInfo']?$data['params']['address']['additionalInfo']:$oUser->oxuser__oxaddinfo->rawValue;
                $status = implode(',', $data['params']['enderecometa']['status']);
                $oUser->oxuser__mojoamsstatus->rawValue = $status;
                $oUser->oxuser__mojoamsts->rawValue = $data['params']['enderecometa']['ts'];
                $predictions = json_encode($data['params']['enderecometa']['predictions']);
                $oUser->oxuser__mojoamspredictions->rawValue = $predictions;
                $oUser->save();
            }
        }

        if ('editShippingAddress' == $data['method']) {
            // Save shipping address.
            $oAddress = oxNew("oxaddress");

            if (!$oConfig->isUtf()) {
                $data['params']['address']['postalCode'] = iconv('UTF-8', 'ISO-8859-1', $data['params']['address']['postalCode']);
                $data['params']['address']['locality'] = iconv('UTF-8', 'ISO-8859-1', $data['params']['address']['locality']);
                $data['params']['address']['streetName'] = iconv('UTF-8', 'ISO-8859-1',  $data['params']['address']['streetName']);
                $data['params']['address']['buildingNumber'] = iconv('UTF-8', 'ISO-8859-1',  $data['params']['address']['buildingNumber']);
                $data['params']['address']['additionalInfo'] = iconv('UTF-8', 'ISO-8859-1', $data['params']['address']['additionalInfo']);
            }

            if ($oAddress->load($data['params']['addressId'])) {
                $oAddress->oxaddress__oxzip->rawValue = $data['params']['address']['postalCode']?$data['params']['address']['postalCode']:$oAddress->oxaddress__oxzip->rawValue;
                $oAddress->oxaddress__oxcity->rawValue = $data['params']['address']['locality']?$data['params']['address']['locality']:$oAddress->oxaddress__oxcity->rawValue;
                $oAddress->oxaddress__oxstreet->rawValue = $data['params']['address']['streetName']?$data['params']['address']['streetName']:$oAddress->oxaddress__oxstreet->rawValue;
                $oAddress->oxaddress__oxstreetnr->rawValue = $data['params']['address']['buildingNumber']?$data['params']['address']['buildingNumber']:$oAddress->oxaddress__oxstreetnr->rawValue;
                $oAddress->oxaddress__oxaddinfo->rawValue = $data['params']['address']['additionalInfo']?$data['params']['address']['additionalInfo']:$oAddress->oxaddress__oxaddinfo->rawValue;
                $status = implode(',', $data['params']['enderecometa']['status']);
                $oAddress->oxaddress__mojoamsstatus->rawValue = $status;
                $oAddress->oxaddress__mojoamsts->rawValue = $data['params']['enderecometa']['ts'];
                $predictions = json_encode($data['params']['enderecometa']['predictions']);
                $oAddress->oxaddress__mojoamspredictions->rawValue = $predictions;
                $oAddress->save();
            }
        }
    }
}
