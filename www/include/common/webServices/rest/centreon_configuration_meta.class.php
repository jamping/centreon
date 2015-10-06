<?php
/*
 * Copyright 2005-2015 Centreon
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
 * As a special exception, the copyright holders of this program give Centreon
 * permission to link this program with independent modules to produce an executable,
 * regardless of the license terms of these independent modules, and to copy and
 * distribute the resulting executable under terms of Centreon choice, provided that
 * Centreon also meet, for each linked independent module, the terms  and conditions
 * of the license of that module. An independent module is a module which is not
 * derived from this program. If you modify this program, you may extend this
 * exception to your version of the program, but you are not obliged to do so. If you
 * do not wish to do so, delete this exception statement from your version.
 *
 * For more information : contact@centreon.com
 *
 * SVN : $URL$
 * SVN : $Id$
 *
 */

global $centreon_path;
require_once $centreon_path . "/www/class/centreonBroker.class.php";
require_once $centreon_path . "/www/class/centreonDB.class.php";
require_once dirname(__FILE__) . "/centreon_configuration_objects.class.php";

class CentreonConfigurationMeta extends CentreonConfigurationObjects
{
    /**
     *
     * @var type 
     */
    protected $pearDBMonitoring;

    /**
     * 
     */
    public function __construct()
    {
        parent::__construct();
        $brk = new CentreonBroker($this->pearDB);
        if ($brk->getBroker() == 'broker') {
            $this->pearDBMonitoring = new CentreonDB('centstorage');
        } else {
            $this->pearDBMonitoring = new CentreonDB('ndo');
        }
    }
    
    /**
     * 
     * @return array
     */
    public function getList()
    {
        // Check for select2 'q' argument
        if (false === isset($this->arguments['q'])) {
            $q = '';
        } else {
            $q = $this->arguments['q'];
        }
        
        $queryMeta = "SELECT meta_id, meta_name "
            . "FROM meta_service "
            . "WHERE meta_name LIKE '%$q%' "
            . "ORDER BY meta_name";
        
        $DBRESULT = $this->pearDB->query($queryMeta);
        
        $metaList = array();
        while ($data = $DBRESULT->fetchRow()) {
            $metaList[] = array('id' => $data['meta_id'], 'text' => $data['meta_name']);
        }
        
        return $metaList;
    }
}