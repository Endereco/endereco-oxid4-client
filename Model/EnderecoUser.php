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

        return $blRet;
    }
}
