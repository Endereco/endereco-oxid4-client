[{if $oView->getClassName() != 'oxUBase'}]
    [{oxid_include_widget cl="EnderecoConfigWidget" curClass=$oView->getClassName()}]

    [{oxid_include_widget cl="EnderecoColorWidget"}]
[{/if}]

[{$smarty.block.parent}]
