
<?php

//
// Open Web Analytics - An Open Source Web Analytics Framework
//
// Copyright 2006 Peter Adams. All rights reserved.
//
// Licensed under GPL v2.0 http://www.gnu.org/copyleft/gpl.html
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.
//
// $Id$
//

require_once(OWA_BASE_DIR.'/owa_reportController.php');

/**
 * Action Groups Report Controller
 * 
 * @author      Peter Adams <peter@openwebanalytics.com>
 * @copyright   Copyright &copy; 2006 Peter Adams <peter@openwebanalytics.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GPL v2.0
 * @category    owa
 * @package     owa
 * @version		$Revision$	      
 * @since		owa 1.3.0
 */

class owa_reportActionGroupsController extends owa_reportController {
	
	function action() {
			
		$this->setSubview('base.reportSimpleDimensional');
		$this->setTitle('动态群组');
		$this->set('metrics', 'actions,uniqueActions,actionsValue');
		$this->set('dimensions', 'actionGroup');
		$this->set('sort', 'actions-');
		$this->set('resultsPerPage', 25);
		$this->set('dimensionLink', array('linkColumn' => 'actionGroup', 
												'template' => array('do' => 'base.reportActionGroup', 'actionGroup' => '%s'), 
												'valueColumns' => 'actionGroup'));
		$this->set('trendChartMetric', 'actions');
		$this->set('trendTitle', 'There were <*= this.d.resultSet.aggregates.actions.formatted_value *> actions for all action groups.');
	}
}

?>