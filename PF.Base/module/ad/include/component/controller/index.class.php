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
 * @version 		$Id: index.class.php 3182 2011-09-26 14:44:28Z Raymond_Benc $
 */
class Ad_Component_Controller_Index extends Phpfox_Component
{
	/**
	 * Controller
	 */
	public function process()
	{
	    (($sPlugin = Phpfox_Plugin::get('ad.component_controller_process__start')) ? eval($sPlugin) : false);
		if (($iAd = $this->request()->getInt('id')))
		{
			if (($sUrl = Ad_Service_Ad::instance()->getAdRedirect($iAd)))
			{
				$this->url()->forward($sUrl);
			}
		}
		
		$this->url()->send('ad.manage');
		
		Ad_Service_Ad::instance()->getSectionMenu();
		
		$this->template()->setTitle(Phpfox::getPhrase('ad.advertise'))
			->setBreadcrumb(Phpfox::getPhrase('ad.advertise'), $this->url()->makeUrl('ad'))							
			->assign(array(
					
				)
			);			
		
	    (($sPlugin = Phpfox_Plugin::get('ad.component_controller_process__start')) ? eval($sPlugin) : false);
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('ad.component_controller_index_clean')) ? eval($sPlugin) : false);
	}
}

?>