<?php
/**
 * [Nulled by DarkGoth - NCP TEAM] - 2015
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox_Component
 * @version 		$Id: group.class.php 1339 2009-12-19 00:37:55Z Raymond_Benc $
 */
class Forum_Component_Controller_Group extends Phpfox_Component
{
	/**
	 * Controller
	 */
	public function process()
	{
		Phpfox::getUserParam('forum.can_view_forum', true);
		
		$aGroup = $this->getParam('aGroup');		
				
		if (!Phpfox::getService('group')->hasAccess($aGroup['group_id'], 'can_use_forum'))
		{
			return Phpfox_Error::display(Phpfox::getPhrase('forum.forum_section_is_closed'));
		}			
		
		$this->template()->setFullSite();
		
		if ($this->request()->get('req4'))
		{
			$this->setParam('aCallback', array(
					'group_id' => $aGroup['group_id'],
					'url_home' => 'group.' . $aGroup['title_url'] . '.forum',
					'title' => $aGroup['title']					
				)
			);			
			
			return Phpfox_Module::instance()->setController('forum.thread');
		}
		
		$this->setParam('aCallback', array(
				'group_id' => $aGroup['group_id'],
				'url_home' => 'group.' . $aGroup['title_url'] . '.forum',
				'title' => $aGroup['title']
			)
		);
		
		return Phpfox_Module::instance()->setController('forum.forum');
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('forum.component_controller_group_clean')) ? eval($sPlugin) : false);
	}
}

?>