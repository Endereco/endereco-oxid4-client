<?php
/**
 * This file contains translations.
 *
 * PHP Version 7
 *
 * @package   Endereco\OxidClient\Translations
 * @author    Ilja Weber <ilja.weber@mobilemojo.de>
 * @copyright 2019 mobilemojo ? Apps & eCommerce UG (haftungsbeschr�nkt) & Co. KG
 *            (https://www.mobilemojo.de/)
 * @license   http://opensource.org/licenses/gpl-3.0 GNU General Public License,
 *            version 3 (GPLv3)
 * @link      https://www.endereco.de/
 */

$sLangName  = "English";
// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------
$aLang = [
    'charset' => 'ISO-8859-1',
    'ENDERECO_OXID4_CLIENT_MAIN' => 'Endereco',
    'ENDERECO_OXID4_CLIENT_HOME' => 'Endereco Module',
    'ENDERECO_OXID4_CLIENT_SETTINGS' => 'Settings',
    'ENDERECOCLIENTOX_SETTINGS_STATUS' => 'Status:',
    'ENDERECOCLIENTOX_SETTINGS_STATUS_OK' => 'Ok',
    'ENDERECOCLIENTOX_SETTINGS_STATUS_OK_LONG' => ' - The connection to Endereco-Server was successfully established.',
    'ENDERECOCLIENTOX_SETTINGS_STATUS_OK_HELP' => 'You are now connected to Endereco server',
    'ENDERECOCLIENTOX_SETTINGS_STATUS_FAIL' => 'Error',
    'ENDERECOCLIENTOX_SETTINGS_STATUS_FAIL_LONG' => ' - Connection to Endereco-Server failed. Please check API-Key.',
    'ENDERECOCLIENTOX_SETTINGS_STATUS_FAIL_HELP' => 'Connection failed. Please check the API-Key. If you have no API-Key, make sure to contact Endereco service provider at info@endereco.de.',

    'SHOP_MODULE_GROUP_ACCESS' => 'Access Data',
    'SHOP_MODULE_sAPIKEY' => 'Api Key',
    'SHOP_MODULE_sSERVICEURL' => 'Service Server Url',

    'SHOP_MODULE_GROUP_AMS' => 'AMS',
    'SHOP_MODULE_sUSEAMS' => 'Adresscheck and InputAssistant is active',
    'SHOP_MODULE_sCHECKALL' => 'Check existing customers with unchecked address',
    'HELP_SHOP_MODULE_sCHECKALL' => 'Existing customers with incorrect unchecked address will receive address check predictions automatically',
    'SHOP_MODULE_sAMSBLURTRIGGER' => 'Trigger AddressCheck immediately after entering or changing the address',
    'SHOP_MODULE_sAMSSubmitTrigger' => 'Check address on submit',
    'SHOP_MODULE_sAMSResumeSubmit' => 'Continue submit after the address has been selected',
    'SHOP_MODULE_sSMARTFILL' => 'Fill fields when input is obvious (SmartFill)',
    'SHOP_MODULE_bChangeFieldsOrder' => 'Optimize address fields order',

    'SHOP_MODULE_GROUP_EmailServices' => 'Emailservice',
    'SHOP_MODULE_bUseEmailservice'=> 'Emailcheck is active',
    'SHOP_MODULE_bShowEmailserviceErrors' => 'Display eMail status messages',
    'SHOP_MODULE_GROUP_PersonalService'=> 'Personservice',
    'SHOP_MODULE_bUsePersonalService'=> 'Check salutation',
    'SHOP_MODULE_GROUP_VISUAL'=> 'Visual',
    'SHOP_MODULE_bUseCss'=> 'Use provided CSS',
    'SHOP_MODULE_sMainColor'=> 'Dropdown color',
    'SHOP_MODULE_sErrorColor'=> 'Modal error color',
    'SHOP_MODULE_sSelectionColor'=> 'Modal selection color',
    'SHOP_MODULE_GROUP_ADVANCED'=> 'Advanced',
    'SHOP_MODULE_bAllowControllerFilter' => 'Whitelist for controller classes is active',
    'SHOP_MODULE_sAllowedControllerClasses'=> 'Whitelist for controller classes',
    'SHOP_MODULE_bShowDebug'=> 'Show debug infos in browser console',

    'SHOP_MODULE_bPreselectCountry' => 'Preselect default country',
    'SHOP_MODULE_sPreselectableCountries' => 'Default country',
    'SHOP_MODULE_sPreselectableCountries_af' => 'Afghanistan',
    'SHOP_MODULE_sPreselectableCountries_ax' => '�land Islands',
    'SHOP_MODULE_sPreselectableCountries_al' => 'Albania',
    'SHOP_MODULE_sPreselectableCountries_dz' => 'Algeria',
    'SHOP_MODULE_sPreselectableCountries_as' => 'American Samoa',
    'SHOP_MODULE_sPreselectableCountries_ad' => 'Andorra',
    'SHOP_MODULE_sPreselectableCountries_ao' => 'Angola',
    'SHOP_MODULE_sPreselectableCountries_ai' => 'Anguilla',
    'SHOP_MODULE_sPreselectableCountries_aq' => 'Antarctica',
    'SHOP_MODULE_sPreselectableCountries_ag' => 'Antigua and Barbuda',
    'SHOP_MODULE_sPreselectableCountries_ar' => 'Argentina',
    'SHOP_MODULE_sPreselectableCountries_am' => 'Armenia',
    'SHOP_MODULE_sPreselectableCountries_aw' => 'Aruba',
    'SHOP_MODULE_sPreselectableCountries_au' => 'Australia',
    'SHOP_MODULE_sPreselectableCountries_at' => 'Austria',
    'SHOP_MODULE_sPreselectableCountries_az' => 'Azerbaijan',
    'SHOP_MODULE_sPreselectableCountries_bs' => 'Bahamas',
    'SHOP_MODULE_sPreselectableCountries_bh' => 'Bahrain',
    'SHOP_MODULE_sPreselectableCountries_bd' => 'Bangladesh',
    'SHOP_MODULE_sPreselectableCountries_bb' => 'Barbados',
    'SHOP_MODULE_sPreselectableCountries_by' => 'Belarus',
    'SHOP_MODULE_sPreselectableCountries_be' => 'Belgium',
    'SHOP_MODULE_sPreselectableCountries_bz' => 'Belize',
    'SHOP_MODULE_sPreselectableCountries_bj' => 'Benin',
    'SHOP_MODULE_sPreselectableCountries_bm' => 'Bermuda',
    'SHOP_MODULE_sPreselectableCountries_bt' => 'Bhutan',
    'SHOP_MODULE_sPreselectableCountries_bo' => 'Bolivia (Plurinational State of)',
    'SHOP_MODULE_sPreselectableCountries_bq' => 'Bonaire, Sint Eustatius and Saba',
    'SHOP_MODULE_sPreselectableCountries_ba' => 'Bosnia and Herzegovina',
    'SHOP_MODULE_sPreselectableCountries_bw' => 'Botswana',
    'SHOP_MODULE_sPreselectableCountries_bv' => 'Bouvet Island',
    'SHOP_MODULE_sPreselectableCountries_br' => 'Brazil',
    'SHOP_MODULE_sPreselectableCountries_io' => 'British Indian Ocean Territory',
    'SHOP_MODULE_sPreselectableCountries_bn' => 'Brunei Darussalam',
    'SHOP_MODULE_sPreselectableCountries_bg' => 'Bulgaria',
    'SHOP_MODULE_sPreselectableCountries_bf' => 'Burkina Faso',
    'SHOP_MODULE_sPreselectableCountries_bi' => 'Burundi',
    'SHOP_MODULE_sPreselectableCountries_cv' => 'Cabo Verde',
    'SHOP_MODULE_sPreselectableCountries_kh' => 'Cambodia',
    'SHOP_MODULE_sPreselectableCountries_cm' => 'Cameroon',
    'SHOP_MODULE_sPreselectableCountries_ca' => 'Canada',
    'SHOP_MODULE_sPreselectableCountries_ky' => 'Cayman Islands',
    'SHOP_MODULE_sPreselectableCountries_cf' => 'Central African Republic',
    'SHOP_MODULE_sPreselectableCountries_td' => 'Chad',
    'SHOP_MODULE_sPreselectableCountries_cl' => 'Chile',
    'SHOP_MODULE_sPreselectableCountries_cn' => 'China',
    'SHOP_MODULE_sPreselectableCountries_cx' => 'Christmas Island',
    'SHOP_MODULE_sPreselectableCountries_cc' => 'Cocos (Keeling) Islands',
    'SHOP_MODULE_sPreselectableCountries_co' => 'Colombia',
    'SHOP_MODULE_sPreselectableCountries_km' => 'Comoros',
    'SHOP_MODULE_sPreselectableCountries_cg' => 'Congo',
    'SHOP_MODULE_sPreselectableCountries_cd' => 'Congo, Democratic Republic of the',
    'SHOP_MODULE_sPreselectableCountries_ck' => 'Cook Islands',
    'SHOP_MODULE_sPreselectableCountries_cr' => 'Costa Rica',
    'SHOP_MODULE_sPreselectableCountries_ci' => 'C�te d\'Ivoire',
    'SHOP_MODULE_sPreselectableCountries_hr' => 'Croatia',
    'SHOP_MODULE_sPreselectableCountries_cu' => 'Cuba',
    'SHOP_MODULE_sPreselectableCountries_cw' => 'Cura�ao',
    'SHOP_MODULE_sPreselectableCountries_cy' => 'Cyprus',
    'SHOP_MODULE_sPreselectableCountries_cz' => 'Czechia',
    'SHOP_MODULE_sPreselectableCountries_dk' => 'Denmark',
    'SHOP_MODULE_sPreselectableCountries_dj' => 'Djibouti',
    'SHOP_MODULE_sPreselectableCountries_dm' => 'Dominica',
    'SHOP_MODULE_sPreselectableCountries_do' => 'Dominican Republic',
    'SHOP_MODULE_sPreselectableCountries_ec' => 'Ecuador',
    'SHOP_MODULE_sPreselectableCountries_eg' => 'Egypt',
    'SHOP_MODULE_sPreselectableCountries_sv' => 'El Salvador',
    'SHOP_MODULE_sPreselectableCountries_gq' => 'Equatorial Guinea',
    'SHOP_MODULE_sPreselectableCountries_er' => 'Eritrea',
    'SHOP_MODULE_sPreselectableCountries_ee' => 'Estonia',
    'SHOP_MODULE_sPreselectableCountries_sz' => 'Eswatini',
    'SHOP_MODULE_sPreselectableCountries_et' => 'Ethiopia',
    'SHOP_MODULE_sPreselectableCountries_fk' => 'Falkland Islands (Malvinas)',
    'SHOP_MODULE_sPreselectableCountries_fo' => 'Faroe Islands',
    'SHOP_MODULE_sPreselectableCountries_fj' => 'Fiji',
    'SHOP_MODULE_sPreselectableCountries_fi' => 'Finland',
    'SHOP_MODULE_sPreselectableCountries_fr' => 'France',
    'SHOP_MODULE_sPreselectableCountries_gf' => 'French Guiana',
    'SHOP_MODULE_sPreselectableCountries_pf' => 'French Polynesia',
    'SHOP_MODULE_sPreselectableCountries_tf' => 'French Southern Territories',
    'SHOP_MODULE_sPreselectableCountries_ga' => 'Gabon',
    'SHOP_MODULE_sPreselectableCountries_gm' => 'Gambia',
    'SHOP_MODULE_sPreselectableCountries_ge' => 'Georgia',
    'SHOP_MODULE_sPreselectableCountries_de' => 'Germany',
    'SHOP_MODULE_sPreselectableCountries_gh' => 'Ghana',
    'SHOP_MODULE_sPreselectableCountries_gi' => 'Gibraltar',
    'SHOP_MODULE_sPreselectableCountries_gr' => 'Greece',
    'SHOP_MODULE_sPreselectableCountries_gl' => 'Greenland',
    'SHOP_MODULE_sPreselectableCountries_gd' => 'Grenada',
    'SHOP_MODULE_sPreselectableCountries_gp' => 'Guadeloupe',
    'SHOP_MODULE_sPreselectableCountries_gu' => 'Guam',
    'SHOP_MODULE_sPreselectableCountries_gt' => 'Guatemala',
    'SHOP_MODULE_sPreselectableCountries_gg' => 'Guernsey',
    'SHOP_MODULE_sPreselectableCountries_gn' => 'Guinea',
    'SHOP_MODULE_sPreselectableCountries_gw' => 'Guinea-Bissau',
    'SHOP_MODULE_sPreselectableCountries_gy' => 'Guyana',
    'SHOP_MODULE_sPreselectableCountries_ht' => 'Haiti',
    'SHOP_MODULE_sPreselectableCountries_hm' => 'Heard Island and McDonald Islands',
    'SHOP_MODULE_sPreselectableCountries_va' => 'Holy See',
    'SHOP_MODULE_sPreselectableCountries_hn' => 'Honduras',
    'SHOP_MODULE_sPreselectableCountries_hk' => 'Hong Kong',
    'SHOP_MODULE_sPreselectableCountries_hu' => 'Hungary',
    'SHOP_MODULE_sPreselectableCountries_is' => 'Iceland',
    'SHOP_MODULE_sPreselectableCountries_in' => 'India',
    'SHOP_MODULE_sPreselectableCountries_id' => 'Indonesia',
    'SHOP_MODULE_sPreselectableCountries_ir' => 'Iran (Islamic Republic of)',
    'SHOP_MODULE_sPreselectableCountries_iq' => 'Iraq',
    'SHOP_MODULE_sPreselectableCountries_ie' => 'Ireland',
    'SHOP_MODULE_sPreselectableCountries_im' => 'Isle of Man',
    'SHOP_MODULE_sPreselectableCountries_il' => 'Israel',
    'SHOP_MODULE_sPreselectableCountries_it' => 'Italy',
    'SHOP_MODULE_sPreselectableCountries_jm' => 'Jamaica',
    'SHOP_MODULE_sPreselectableCountries_jp' => 'Japan',
    'SHOP_MODULE_sPreselectableCountries_je' => 'Jersey',
    'SHOP_MODULE_sPreselectableCountries_jo' => 'Jordan',
    'SHOP_MODULE_sPreselectableCountries_kz' => 'Kazakhstan',
    'SHOP_MODULE_sPreselectableCountries_ke' => 'Kenya',
    'SHOP_MODULE_sPreselectableCountries_ki' => 'Kiribati',
    'SHOP_MODULE_sPreselectableCountries_kp' => 'Korea (Democratic People\'s Republic of)',
    'SHOP_MODULE_sPreselectableCountries_kr' => 'Korea, Republic of',
    'SHOP_MODULE_sPreselectableCountries_kw' => 'Kuwait',
    'SHOP_MODULE_sPreselectableCountries_kg' => 'Kyrgyzstan',
    'SHOP_MODULE_sPreselectableCountries_la' => 'Lao People\'s Democratic Republic',
    'SHOP_MODULE_sPreselectableCountries_lv' => 'Latvia',
    'SHOP_MODULE_sPreselectableCountries_lb' => 'Lebanon',
    'SHOP_MODULE_sPreselectableCountries_ls' => 'Lesotho',
    'SHOP_MODULE_sPreselectableCountries_lr' => 'Liberia',
    'SHOP_MODULE_sPreselectableCountries_ly' => 'Libya',
    'SHOP_MODULE_sPreselectableCountries_li' => 'Liechtenstein',
    'SHOP_MODULE_sPreselectableCountries_lt' => 'Lithuania',
    'SHOP_MODULE_sPreselectableCountries_lu' => 'Luxembourg',
    'SHOP_MODULE_sPreselectableCountries_mo' => 'Macao',
    'SHOP_MODULE_sPreselectableCountries_mg' => 'Madagascar',
    'SHOP_MODULE_sPreselectableCountries_mw' => 'Malawi',
    'SHOP_MODULE_sPreselectableCountries_my' => 'Malaysia',
    'SHOP_MODULE_sPreselectableCountries_mv' => 'Maldives',
    'SHOP_MODULE_sPreselectableCountries_ml' => 'Mali',
    'SHOP_MODULE_sPreselectableCountries_mt' => 'Malta',
    'SHOP_MODULE_sPreselectableCountries_mh' => 'Marshall Islands',
    'SHOP_MODULE_sPreselectableCountries_mq' => 'Martinique',
    'SHOP_MODULE_sPreselectableCountries_mr' => 'Mauritania',
    'SHOP_MODULE_sPreselectableCountries_mu' => 'Mauritius',
    'SHOP_MODULE_sPreselectableCountries_yt' => 'Mayotte',
    'SHOP_MODULE_sPreselectableCountries_mx' => 'Mexico',
    'SHOP_MODULE_sPreselectableCountries_fm' => 'Micronesia (Federated States of)',
    'SHOP_MODULE_sPreselectableCountries_md' => 'Moldova, Republic of',
    'SHOP_MODULE_sPreselectableCountries_mc' => 'Monaco',
    'SHOP_MODULE_sPreselectableCountries_mn' => 'Mongolia',
    'SHOP_MODULE_sPreselectableCountries_me' => 'Montenegro',
    'SHOP_MODULE_sPreselectableCountries_ms' => 'Montserrat',
    'SHOP_MODULE_sPreselectableCountries_ma' => 'Morocco',
    'SHOP_MODULE_sPreselectableCountries_mz' => 'Mozambique',
    'SHOP_MODULE_sPreselectableCountries_mm' => 'Myanmar',
    'SHOP_MODULE_sPreselectableCountries_na' => 'Namibia',
    'SHOP_MODULE_sPreselectableCountries_nr' => 'Nauru',
    'SHOP_MODULE_sPreselectableCountries_np' => 'Nepal',
    'SHOP_MODULE_sPreselectableCountries_nl' => 'Netherlands',
    'SHOP_MODULE_sPreselectableCountries_nc' => 'New Caledonia',
    'SHOP_MODULE_sPreselectableCountries_nz' => 'New Zealand',
    'SHOP_MODULE_sPreselectableCountries_ni' => 'Nicaragua',
    'SHOP_MODULE_sPreselectableCountries_ne' => 'Niger',
    'SHOP_MODULE_sPreselectableCountries_ng' => 'Nigeria',
    'SHOP_MODULE_sPreselectableCountries_nu' => 'Niue',
    'SHOP_MODULE_sPreselectableCountries_nf' => 'Norfolk Island',
    'SHOP_MODULE_sPreselectableCountries_mk' => 'North Macedonia',
    'SHOP_MODULE_sPreselectableCountries_mp' => 'Northern Mariana Islands',
    'SHOP_MODULE_sPreselectableCountries_no' => 'Norway',
    'SHOP_MODULE_sPreselectableCountries_om' => 'Oman',
    'SHOP_MODULE_sPreselectableCountries_pk' => 'Pakistan',
    'SHOP_MODULE_sPreselectableCountries_pw' => 'Palau',
    'SHOP_MODULE_sPreselectableCountries_ps' => 'Palestine, State of',
    'SHOP_MODULE_sPreselectableCountries_pa' => 'Panama',
    'SHOP_MODULE_sPreselectableCountries_pg' => 'Papua New Guinea',
    'SHOP_MODULE_sPreselectableCountries_py' => 'Paraguay',
    'SHOP_MODULE_sPreselectableCountries_pe' => 'Peru',
    'SHOP_MODULE_sPreselectableCountries_ph' => 'Philippines',
    'SHOP_MODULE_sPreselectableCountries_pn' => 'Pitcairn',
    'SHOP_MODULE_sPreselectableCountries_pl' => 'Poland',
    'SHOP_MODULE_sPreselectableCountries_pt' => 'Portugal',
    'SHOP_MODULE_sPreselectableCountries_pr' => 'Puerto Rico',
    'SHOP_MODULE_sPreselectableCountries_qa' => 'Qatar',
    'SHOP_MODULE_sPreselectableCountries_re' => 'R�union',
    'SHOP_MODULE_sPreselectableCountries_ro' => 'Romania',
    'SHOP_MODULE_sPreselectableCountries_ru' => 'Russian Federation',
    'SHOP_MODULE_sPreselectableCountries_rw' => 'Rwanda',
    'SHOP_MODULE_sPreselectableCountries_bl' => 'Saint Barth�lemy',
    'SHOP_MODULE_sPreselectableCountries_sh' => 'Saint Helena, Ascension and Tristan da Cunha',
    'SHOP_MODULE_sPreselectableCountries_kn' => 'Saint Kitts and Nevis',
    'SHOP_MODULE_sPreselectableCountries_lc' => 'Saint Lucia',
    'SHOP_MODULE_sPreselectableCountries_mf' => 'Saint Martin (French part)',
    'SHOP_MODULE_sPreselectableCountries_pm' => 'Saint Pierre and Miquelon',
    'SHOP_MODULE_sPreselectableCountries_vc' => 'Saint Vincent and the Grenadines',
    'SHOP_MODULE_sPreselectableCountries_ws' => 'Samoa',
    'SHOP_MODULE_sPreselectableCountries_sm' => 'San Marino',
    'SHOP_MODULE_sPreselectableCountries_st' => 'Sao Tome and Principe',
    'SHOP_MODULE_sPreselectableCountries_sa' => 'Saudi Arabia',
    'SHOP_MODULE_sPreselectableCountries_sn' => 'Senegal',
    'SHOP_MODULE_sPreselectableCountries_rs' => 'Serbia',
    'SHOP_MODULE_sPreselectableCountries_sc' => 'Seychelles',
    'SHOP_MODULE_sPreselectableCountries_sl' => 'Sierra Leone',
    'SHOP_MODULE_sPreselectableCountries_sg' => 'Singapore',
    'SHOP_MODULE_sPreselectableCountries_sx' => 'Sint Maarten (Dutch part)',
    'SHOP_MODULE_sPreselectableCountries_sk' => 'Slovakia',
    'SHOP_MODULE_sPreselectableCountries_si' => 'Slovenia',
    'SHOP_MODULE_sPreselectableCountries_sb' => 'Solomon Islands',
    'SHOP_MODULE_sPreselectableCountries_so' => 'Somalia',
    'SHOP_MODULE_sPreselectableCountries_za' => 'South Africa',
    'SHOP_MODULE_sPreselectableCountries_gs' => 'South Georgia and the South Sandwich Islands',
    'SHOP_MODULE_sPreselectableCountries_ss' => 'South Sudan',
    'SHOP_MODULE_sPreselectableCountries_es' => 'Spain',
    'SHOP_MODULE_sPreselectableCountries_lk' => 'Sri Lanka',
    'SHOP_MODULE_sPreselectableCountries_sd' => 'Sudan',
    'SHOP_MODULE_sPreselectableCountries_sr' => 'Suriname',
    'SHOP_MODULE_sPreselectableCountries_sj' => 'Svalbard and Jan Mayen',
    'SHOP_MODULE_sPreselectableCountries_se' => 'Sweden',
    'SHOP_MODULE_sPreselectableCountries_ch' => 'Switzerland',
    'SHOP_MODULE_sPreselectableCountries_sy' => 'Syrian Arab Republic',
    'SHOP_MODULE_sPreselectableCountries_tw' => 'Taiwan, Province of China',
    'SHOP_MODULE_sPreselectableCountries_tj' => 'Tajikistan',
    'SHOP_MODULE_sPreselectableCountries_tz' => 'Tanzania, United Republic of',
    'SHOP_MODULE_sPreselectableCountries_th' => 'Thailand',
    'SHOP_MODULE_sPreselectableCountries_tl' => 'Timor-Leste',
    'SHOP_MODULE_sPreselectableCountries_tg' => 'Togo',
    'SHOP_MODULE_sPreselectableCountries_tk' => 'Tokelau',
    'SHOP_MODULE_sPreselectableCountries_to' => 'Tonga',
    'SHOP_MODULE_sPreselectableCountries_tt' => 'Trinidad and Tobago',
    'SHOP_MODULE_sPreselectableCountries_tn' => 'Tunisia',
    'SHOP_MODULE_sPreselectableCountries_tr' => 'Turkey',
    'SHOP_MODULE_sPreselectableCountries_tm' => 'Turkmenistan',
    'SHOP_MODULE_sPreselectableCountries_tc' => 'Turks and Caicos Islands',
    'SHOP_MODULE_sPreselectableCountries_tv' => 'Tuvalu',
    'SHOP_MODULE_sPreselectableCountries_ug' => 'Uganda',
    'SHOP_MODULE_sPreselectableCountries_ua' => 'Ukraine',
    'SHOP_MODULE_sPreselectableCountries_ae' => 'United Arab Emirates',
    'SHOP_MODULE_sPreselectableCountries_gb' => 'United Kingdom of Great Britain and Northern Ireland',
    'SHOP_MODULE_sPreselectableCountries_us' => 'United States of America',
    'SHOP_MODULE_sPreselectableCountries_um' => 'United States Minor Outlying Islands',
    'SHOP_MODULE_sPreselectableCountries_uy' => 'Uruguay',
    'SHOP_MODULE_sPreselectableCountries_uz' => 'Uzbekistan',
    'SHOP_MODULE_sPreselectableCountries_vu' => 'Vanuatu',
    'SHOP_MODULE_sPreselectableCountries_ve' => 'Venezuela (Bolivarian Republic of)',
    'SHOP_MODULE_sPreselectableCountries_vn' => 'Viet Nam',
    'SHOP_MODULE_sPreselectableCountries_vg' => 'Virgin Islands (British)',
    'SHOP_MODULE_sPreselectableCountries_vi' => 'Virgin Islands (U.S.)',
    'SHOP_MODULE_sPreselectableCountries_wf' => 'Wallis and Futuna',
    'SHOP_MODULE_sPreselectableCountries_eh' => 'Western Sahara',
    'SHOP_MODULE_sPreselectableCountries_ye' => 'Yemen',
    'SHOP_MODULE_sPreselectableCountries_zm' => 'Zambia',
    'SHOP_MODULE_sPreselectableCountries_zw' => 'Zimbabwe',

];

