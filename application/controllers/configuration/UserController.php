<?php
/*
 * Copyright 2005-2014 MERETHIS
 * Centreon is developped by : Julien Mathis and Romain Le Merlus under
 * GPL Licence 2.0.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation ; either version 2 of the License.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, see <http://www.gnu.org/licenses>.
 *
 * Linking this program statically or dynamically with other modules is making a
 * combined work based on this program. Thus, the terms and conditions of the GNU
 * General Public License cover the whole combination.
 *
 * As a special exception, the copyright holders of this program give MERETHIS
 * permission to link this program with independent modules to produce an executable,
 * regardless of the license terms of these independent modules, and to copy and
 * distribute the resulting executable under terms of MERETHIS choice, provided that
 * MERETHIS also meet, for each linked independent module, the terms  and conditions
 * of the license of that module. An independent module is a module which is not
 * derived from this program. If you modify this program, you may extend this
 * exception to your version of the program, but you are not obliged to do so. If you
 * do not wish to do so, delete this exception statement from your version.
 *
 * For more information : contact@centreon.com
 *
 */

namespace Controllers\Configuration;

use \Models\Configuration\Contact;

class UserController extends \Controllers\ObjectAbstract
{
    protected $objectDisplayName = 'User';
    protected $objectName = 'user';
    protected $objectBaseUrl = '/configuration/user';
    protected $objectClass = '\Models\Configuration\Contact';
    public static $relationMap = array(
        'contact_contactgroups' => '\Models\Configuraton\Relation\Contact\Contactgroup',
        'contact_hostcommands' => '\Models\Configuration\Relation\Contact\Hostcommand',
        'contact_servicecommands' => '\Models\Configuration\Relation\Contact\Servicecommand',
        'contact_aclgroups' => '\Models\Configuration\Relation\Aclgroup\Contact'
    );

    /**
     * List users
     *
     * @method get
     * @route /configuration/user
     */
    public function listAction()
    {
        parent::listAction();
    }

    /**
     * 
     * @method get
     * @route /configuration/user/list
     */
    public function datatableAction()
    {
        parent::datatableAction();
    }
    
    /**
     * 
     * @method get
     * @route /configuration/user/formlist
     */
    public function formListAction()
    {
        parent::formListAction();
    }
    
    /**
     * Create a new user
     *
     * @method post
     * @route /configuration/user/create
     */
    public function createAction()
    {
        parent::createAction();   
    }

    /**
     * Update a user
     *
     *
     * @method put
     * @route /configuration/user/update
     */
    public function updateAction()
    {
        parent::updateAction();    
    }
    
    /**
     * Add a user
     *
     *
     * @method get
     * @route /configuration/user/add
     */
    public function addAction()
    {
        parent::addAction();
    }
    
    /**
     * Update a user
     *
     *
     * @method get
     * @route /configuration/user/[i:id]/[i:advanced]
     */
    public function editAction()
    {
        parent::editAction();
    }

    /**
     * Get the list of massive change fields
     *
     * @method get
     * @route /configuration/user/mc_fields
     */
    public function getMassiveChangeFieldsAction()
    {
        parent::getMassiveChangeFieldsAction();
    }

    /**
     * Get the html of attribute filed
     *
     * @method get
     * @route /configuration/user/mc_fields/[i:id]
     */
    public function getMcFieldAction()
    {
        parent::getMcFieldAction();
    }

    /**
     * Duplicate contact
     *
     * @method POST
     * @route /configuration/user/duplicate
     */
    public function duplicateAction()
    {
        parent::duplicateAction();
    }

    /**
     * Apply massive change
     *
     * @method POST
     * @route /configuration/user/massive_change
     */
    public function massiveChangeAction()
    {
        parent::massiveChangeAction();
    }

    /**
     * Delete action for contact
     *
     * @method post
     * @route /configuration/user/delete
     */
    public function deleteAction()
    {
        parent::deleteAction();
    }

    /**
     * Get contact template for a specific contact
     *
     * @method get
     * @route /configuration/user/[i:id]/contacttemplate
     */
    public function contactTemplateForContactAction()
    {
        parent::getSimpleRelation('contact_template_id', '\Models\Configuration\Contact');
    }
   
    /**
     * Get host notification period for a specific contact
     *
     * @method get
     * @route /configuration/user/[i:id]/hostnotifperiod
     */
    public function hostNotifPeriodForContactAction()
    {
        parent::getSimpleRelation('timeperiod_tp_id', '\Models\Configuration\Timeperiod');
    }

    /**
     * Get host notification command for a specific contact
     *
     * @method get
     * @route /configuration/user/[i:id]/hostnotifcommand
     */
    public function hostNotifCommandForContactAction()
    {
        parent::getRelations(static::$relationMap['contact_hostcommands']);
    }

    /**
     * Get service notification period for a specific contact
     *
     * @method get
     * @route /configuration/user/[i:id]/servicenotifperiod
     */
    public function serviceNotifPeriodForContactAction()
    {
        parent::getSimpleRelation('timeperiod_tp_id2', '\Models\Configuration\Timeperiod');
    }

    /**
     * Get service notification command for a specific contact
     *
     * @method get
     * @route /configuration/user/[i:id]/servicenotifcommand
     */
    public function serviceNotifCommandForContactAction()
    {
        parent::getRelations(static::$relationMap['contact_servicecommands']);
    }

    /**
     * Get contact group for a specific contact
     *
     * @method get
     * @route /configuration/user/[i:id]/contactgroup
     */
    public function contactGroupForContactAction()
    {
        parent::getRelations(static::$relationMap['contact_contactgroups']);
    }

    /**
     * Get acl group for a specific contact
     *
     * @method get
     * @route /configuration/user/[i:id]/aclgroup
     */
    public function aclGroupForContactAction()
    {
        parent::getRelations(static::$relationMap['contact_aclgroups']);
    }
}