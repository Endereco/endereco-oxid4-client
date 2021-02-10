<?php
$sMetadataVersion = '1.1';
$aModule = [
    'id'            => 'endereco-oxid4-client',
    'title'         => 'Endereco Adress-Services für Oxid',
    'description'   => array(
        'en' => 'Customer master data validation and correction suggestions',
        'de' => 'Kundenstammdaten-Validierung und Korrekturvorschläge.',
    ),
    'thumbnail'     => 'endereco.png',
    'version'       => '4.2.0',
    'author'        => 'Endereco UG (Haftungsbeschränkt) - Gesellschaft für Master Data Quality Management',
    'email'         => 'info@endereco.de',
    'url'           => 'https://www.endereco.de',
    'files' => [
        'EnderecoConfigWidget' => 'endereco-oxid4-client/Widget/EnderecoConfigWidget.php',
        'EnderecoColorWidget' => 'endereco-oxid4-client/Widget/EnderecoColorWidget.php',
        'EnderecoCountryController' => 'endereco-oxid4-client/Controller/EnderecoCountryController.php',
        'EnderecoInstaller' => 'endereco-oxid4-client/Core/EnderecoInstaller.php',
        'EnderecoUser' => 'endereco-oxid4-client/Model/EnderecoUser.php',
        'EnderecoService' => 'endereco-oxid4-client/Component/EnderecoService.php',
        'EnderecoAddressController' => 'endereco-oxid4-client/Controller/EnderecoAddressController.php',
        'EnderecoSettings' => 'endereco-oxid4-client/Controller/Admin/EnderecoSettings.php',
    ],
    'templates'  => [
        'enderecocolor.tpl' => 'endereco-oxid4-client/application/views/enderecocolor.tpl',
        'enderecoconfig_default.tpl' => 'endereco-oxid4-client/application/configs/enderecoconfig_default.tpl',
        'enderecoconfig_flow.tpl' => 'endereco-oxid4-client/application/configs/enderecoconfig_flow.tpl',
        'enderecoconfig_wave.tpl' => 'endereco-oxid4-client/application/configs/enderecoconfig_wave.tpl',
        'enderecoconfig_azure.tpl' => 'endereco-oxid4-client/application/configs/enderecoconfig_azure.tpl',
        'endereco_settings.tpl' => 'endereco-oxid4-client/application/views/admin/tpl/endereco_settings.tpl',
    ],
    'blocks' => [
        [
            'template' => 'layout/base.tpl',
            'block' => 'base_js',
            'file' => '/application/views/agent-include.tpl',
        ],
        [
            'template' => 'form/fieldset/user_billing.tpl',
            'block' => 'form_user_billing_country',
            'file' => '/application/views/hidden_fields/endereco_form_user_billing_country.tpl',
        ],
        [
            'template' => 'form/fieldset/user_shipping.tpl',
            'block' => 'form_user_shipping_country',
            'file' => '/application/views/hidden_fields/endereco_form_user_shipping_country.tpl',
        ],
        [
            'template' => 'form/fieldset/user_noaccount.tpl',
            'block' => 'user_noaccount_email',
            'file' => '/application/views/hidden_fields/endereco_form_user_noaccount.tpl',
        ],
        [
            'template' => 'form/fieldset/user_account.tpl',
            'block' => 'user_account_username',
            'file' => '/application/views/hidden_fields/endereco_form_user_account.tpl',
        ],
        [
            'template' => 'page/checkout/order.tpl',
            'block' => 'checkout_order_address',
            'file' => '/application/views/hidden_fields/endereco_checkout_checkout_order_address.tpl',
        ],
    ],
    'events' => [
        'onActivate'   => 'EnderecoInstaller::onActivate',
        'onDeactivate' => 'EnderecoInstaller::onDeactivate',
    ],
    'extend'       => [
        'oxuser' => 'endereco-oxid4-client/Model/EnderecoUser',
    ],
    'settings' => [
        ['group' => 'ACCESS', 'name' => 'sAPIKEY', 'type' => 'str', 'value' => ''],
        ['group' => 'ACCESS', 'name' => 'sSERVICEURL', 'type' => 'str', 'value' => 'https://endereco-service.de/rpc/v1'],
        ['group' => 'AMS', 'name' => 'bPreselectCountry', 'type' => 'bool', 'value' => true],
        ['group' => 'AMS', 'name' => 'sPreselectableCountries', 'type' => 'select', 'value' => 'de', 'constraints' => 'de|ad|ae|af|ag|ai|al|am|ao|aq|ar|as|at|au|aw|ax|az|ba|bb|bd|be|bf|bg|bh|bi|bj|bl|bm|bn|bo|bq|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|cr|cu|cv|cw|cx|cy|cz|dj|dk|dm|do|dz|ec|ee|eg|eh|er|es|et|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gg|gh|gi|gl|gm|gn|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|im|in|io|iq|ir|is|it|je|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mf|mg|mh|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|mv|mw|mx|my|mz|na|nc|ne|nf|ng|ni|nl|no|np|nr|nu|nz|om|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|ps|pt|pw|py|qa|re|ro|rs|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|ss|st|sv|sx|sy|sz|tc|td|tf|tg|th|tj|tk|tl|tm|tn|to|tr|tt|tv|tw|tz|ua|ug|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|za|zm|zw', 'position' => 3],
        ['group' => 'AMS', 'name' => 'sUSEAMS', 'type' => 'bool', 'value' => true],
        ['group' => 'AMS', 'name' => 'sCHECKALL', 'type' => 'bool', 'value' => true],
        ['group' => 'AMS', 'name' => 'sAMSBLURTRIGGER', 'type' => 'bool', 'value' => 'true'],
        ['group' => 'AMS', 'name' => 'sAMSResumeSubmit', 'type' => 'bool', 'value' => 'true'],
        ['group' => 'AMS', 'name' => 'sSMARTFILL', 'type' => 'bool', 'value' => 'true'],
        ['group' => 'AMS', 'name' => 'bChangeFieldsOrder', 'type' => 'bool', 'value' => 'true'],
        ['group' => 'EmailServices', 'name' => 'bUseEmailservice', 'type' => 'bool', 'value' => true],
        ['group' => 'EmailServices', 'name' => 'bShowEmailserviceErrors', 'type' => 'bool', 'value' => true],
        ['group' => 'PersonalService', 'name' => 'bUsePersonalService', 'type' => 'bool', 'value' => true],
        ['group' => 'VISUAL', 'name' => 'bUseCss', 'type' => 'bool', 'value' => 'true'],
        ['group' => 'VISUAL', 'name' => 'sMainColor', 'type' => 'str', 'value' => ''],
        ['group' => 'VISUAL', 'name' => 'sErrorColor', 'type' => 'str', 'value' => ''],
        ['group' => 'VISUAL', 'name' => 'sSelectionColor', 'type' => 'str', 'value' => ''],
        ['group' => 'ADVANCED', 'name' => 'bAllowControllerFilter', 'type' => 'bool', 'value' => false],
        ['group' => 'ADVANCED', 'name' => 'sAllowedControllerClasses', 'type' => 'str', 'value' => 'account_user,user,register'],
        ['group' => 'ADVANCED', 'name' => 'sAMSSubmitTrigger', 'type' => 'bool', 'value' => 'true'],
        ['group' => 'ADVANCED', 'name' => 'bShowDebug', 'type' => 'bool', 'value' => false],
    ]
];
