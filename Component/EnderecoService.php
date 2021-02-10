<?php

class EnderecoService
{
    private $_apiKey;
    private $_endpoint;
    private $_moduleVer;

    public function __construct() {
        $oConfig = oxRegistry::getConfig();
        $sOxId = $oConfig->getShopId();
        $this->_apiKey = $oConfig->getShopConfVar('sAPIKEY', $sOxId, 'module:endereco-oxid4-client');
        $this->_endpoint = $oConfig->getShopConfVar('sSERVICEURL', $sOxId, 'module:endereco-oxid4-client');
        $moduleVersions = $oConfig->getConfigParam('aModuleVersions');
        $this->_moduleVer  = "Endereco Oxid4 Client v" . $moduleVersions['endereco-oxid4-client'];
    }

    public function closeSession($sessionId)
    {
        $data = array(
            'jsonrpc' => '2.0',
            'method'  => 'doAccounting',
            'params' => array(
                'sessionId' => $sessionId
            )
        );
        $data_string = json_encode($data);
        $tried_http = false;
        $api_url = $this->_endpoint;

        while (true) {
            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);
            curl_setopt($ch, CURLOPT_TIMEOUT, 4);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    'Content-Type: application/json',
                    'X-Auth-Key: ' . trim($this->_apiKey),
                    'X-Transaction-Id: ' . $sessionId,
                    'X-Transaction-Referer: ' . $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:__FILE__,
                    'X-Agent: ' . $this->_moduleVer,
                    'Content-Length: ' . strlen($data_string))
            );
            $chret = curl_exec($ch);
            $ch_error = curl_errno($ch);

            // Timeout error. Service is not working.
            if (28 === $ch_error) {
                return;
            }

            // Could not connect and havent tried http yet.
            if ((0 !== $ch_error) && !$tried_http) {
                // Try replacing https with http, maybe ssl is dead for some reason.
                $api_url = str_replace('https://', 'http://', $api_url);
                $tried_http = true;
                continue;
            }
            curl_close($ch);

            break;
        }
    }

    public function closeSessions($sessionIds = array())
    {
        foreach($sessionIds as $sessionId) {
            $this->closeSession($sessionId);
        }
    }

    public function closeConversion()
    {
        $data = array(
            'jsonrpc' => '2.0',
            'method'  => 'doConversion',
        );
        $data_string = json_encode($data);
        $tried_http = false;
        $api_url = $this->_endpoint;
        // (Shop Version; active Theme)

        while (true) {
            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2); // 4 seconds
            curl_setopt($ch, CURLOPT_TIMEOUT, 2); // 4 seconds
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    'Content-Type: application/json',
                    'X-Auth-Key: ' . trim($this->_apiKey),
                    'X-Transaction-Id: not_required',
                    'X-Transaction-Referer: ' . $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:__FILE__,
                    'X-Agent: ' . $this->_moduleVer,
                    'Content-Length: ' . strlen($data_string))
            );
            curl_exec($ch);
            $ch_error = curl_errno($ch);

            // Timeout error. Service is not working.
            if (28 === $ch_error) {
                return;
            }

            // Could not connect and havent tried http yet.
            if ((0 !== $ch_error) && !$tried_http) {
                // Try replacing https with http, maybe ssl is dead for some reason.
                $api_url = str_replace('https://', 'http://', $api_url);
                $tried_http = true;
                continue;
            }
            curl_close($ch);

            break;
        }
    }

    public function checkAddress($address)
    {
        $oConfig = oxRegistry::getConfig();
        try {
            $message = [
                'jsonrpc' => '2.0',
                'id' => 1,
                'method' => 'addressCheck',
                'params' => [
                    'country' => $address['countryCode'],
                    'language' => $address['__language'],
                    'postCode' => $address['postalCode'],
                    'cityName' => $address['locality'],
                    'street' => $address['streetName'],
                    'houseNumber' => $address['buildingNumber'],
                ]
            ];

            if (!$oConfig->isUtf()) {
                $message['params']['postCode'] = iconv('ISO-8859-1', 'UTF-8', $message['params']['postCode']);
                $message['params']['cityName'] = iconv('ISO-8859-1', 'UTF-8', $message['params']['cityName']);
                $message['params']['street'] = iconv('ISO-8859-1', 'UTF-8', $message['params']['street']);
                $message['params']['houseNumber'] = iconv('ISO-8859-1', 'UTF-8', $message['params']['houseNumber']);
            }

            $data_string = json_encode($message);

            $tried_http = false;
            $api_url = $this->_endpoint;
            $sReturnJson = '';

            while (true) {
                $ch = curl_init($api_url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4); // 4 seconds
                curl_setopt($ch, CURLOPT_TIMEOUT, 4); // 4 seconds
                curl_setopt(
                    $ch,
                    CURLOPT_HTTPHEADER,
                    array(
                        'Content-Type: application/json',
                        'X-Auth-Key: ' . trim($this->_apiKey),
                        'X-Transaction-Id: ' . $this->generateSessionId(),
                        'X-Transaction-Referer: ' . $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:__FILE__,
                        'X-Agent: ' . $this->_moduleVer,
                        'Content-Length: ' . strlen($data_string))
                );
                $sReturnJson = curl_exec($ch);
                $ch_error = curl_errno($ch);

                // Timeout error. Service is not working.
                if (28 === $ch_error) {
                    return;
                }

                // Could not connect and havent tried http yet.
                if ((0 !== $ch_error) && !$tried_http) {
                    // Try replacing https with http, maybe ssl is dead for some reason.
                    $api_url = str_replace('https://', 'http://', $api_url);
                    $tried_http = true;
                    continue;
                }
                curl_close($ch);

                break;
            }

            if (!empty($sReturnJson)) {
                $reponseArray = json_decode($sReturnJson, true);
                if (array_key_exists('result', $reponseArray)) {
                    $result = $reponseArray['result'];

                    $predictions = array();
                    $maxPredictions = 6;
                    $counter = 0;
                    foreach ($result['predictions'] as $prediction) {
                        $tempAddress = array(
                            'countryCode' => $prediction['countryCode']?$prediction['countryCode']:$address['countryCode'],
                            'postalCode' => $prediction['postCode'],
                            'locality' => $prediction['cityName'],
                            'streetName' => $prediction['street'],
                            'buildingNumber' => $prediction['houseNumber']
                        );
                        if (array_key_exists('additionalInfo', $prediction)) {
                            $tempAddress['additionalInfo'] = $prediction['additionalInfo'];
                        }

                        $predictions[] = $tempAddress;
                        $counter++;
                        if ($counter >= $maxPredictions) {
                            break;
                        }
                    }

                    $address['__predictions'] = json_encode($predictions);
                    $address['__timestamp'] = time();
                    $address['__status'] = implode(',', $this->normalizeStatusCodes($result['status']));
                }
            }
        } catch(\Exception $e) {
            // Do nothing.
            die($e->getMessage());
        }

        return $address;
    }

    public function generateSessionId()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    public function normalizeStatusCodes($statusCodes) {
        // Create an array of statuses.
        if (
            in_array('A1000', $statusCodes) &&
            !in_array('A1100', $statusCodes)
        ) {
            $statusCodes[] = 'address_correct';
            if (($key = array_search('A1000', $statusCodes)) !== false) {
                unset($statusCodes[$key]);
            }
        }
        if (
            in_array('A1000', $statusCodes) &&
            in_array('A1100', $statusCodes)
        ) {
            $statusCodes[] = 'address_needs_correction';
            if (($key = array_search('A1000', $statusCodes)) !== false) {
                unset($statusCodes[$key]);
            }
            if (($key = array_search('A1100', $statusCodes)) !== false) {
                unset($statusCodes[$key]);
            }
        }
        if (
            in_array('A2000', $statusCodes)
        ) {
            $statusCodes[] = 'address_multiple_variants';
            if (($key = array_search('A2000', $statusCodes)) !== false) {
                unset($statusCodes[$key]);
            }
        }
        if (
            in_array('A3000', $statusCodes)
        ) {
            $statusCodes[] = 'address_not_found';
            if (($key = array_search('A3000', $statusCodes)) !== false) {
                unset($statusCodes[$key]);
            }
        }
        if (
            in_array('A3100', $statusCodes)
        ) {
            $statusCodes[] = 'address_is_packstation';
            if (($key = array_search('A3100', $statusCodes)) !== false) {
                unset($statusCodes[$key]);
            }
        }

        return $statusCodes;
    }

    public function shouldBeChecked($statusCodes) {
        if (empty($statusCodes)) {
            $statusCodes[] = 'address_not_checked';
        }

        return !in_array('address_selected_by_customer', $statusCodes) &&
        (
            in_array('address_not_checked', $statusCodes) ||
            in_array('address_needs_correction', $statusCodes) ||
            in_array('address_multiple_variants', $statusCodes)
        );
    }

    public function checkConnection() {
        // Check connection
        $data = array(
            'jsonrpc' => '2.0',
            'id' => 1,
            'method' => 'readinessCheck',
        );
        $data_string = json_encode($data);
        $tried_http = false;
        $api_url = $this->_endpoint;
        $result = '';

        while (true) {
            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2); // 2 seconds
            curl_setopt($ch, CURLOPT_TIMEOUT, 2); // 2 seconds
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    'Content-Type: application/json',
                    'X-Auth-Key: ' . trim($this->_apiKey),
                    'X-Transaction-Id: ' . 'not_required',
                    'X-Transaction-Referer: ' . $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:__FILE__,
                    'X-Agent: ' . $this->_moduleVer,
                    'Content-Length: ' . strlen($data_string))
            );

            $result = curl_exec($ch);
            $ch_info = curl_getinfo($ch);
            $ch_error = curl_errno($ch);

            // Could not connect and havent tried http yet.
            if ((0 !== $ch_error) && !$tried_http) {
                // Try replacing https with http, maybe ssl is dead for some reason.
                $api_url = str_replace('https://', 'http://', $api_url);
                $tried_http = true;
                continue;
            }

            // Still connection error?. Break then.
            if (0 !== $ch_error) {
                $result = '';
                return 0;
                break;
            }

            break;
        }

        curl_close($ch);

        if ('' !== $result) {
            $resultArray = json_decode($result, true);
            if (isset($resultArray['result'])) {
                return 1;
            }
        }
        return 0;
    }
}
