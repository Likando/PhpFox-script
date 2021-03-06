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
 * @version 		$Id: controller.class.php 103 2009-01-27 11:32:36Z Raymond_Benc $
 */
class Theme_Component_Controller_Admincp_Template_Add extends Phpfox_Component
{
	/**
	 * Controller
	 */
	public function process()
	{
		if (Phpfox::getParam('core.phpfox_is_hosted'))
		{
			$this->url()->send('admincp');
		}			
		
		if (($aVals = $this->request()->getArray('val')))
		{
			if (Phpfox::getService('theme.template.process')->add($aVals))
			{
				$this->url()->send('admincp.theme.template.add', null, Phpfox::getPhrase('theme.template_successfully_added'));
			}
		}

		if (Phpfox::getParam('core.enabled_edit_area'))
		{
			$this->template()->setHeader(array(
					'editarea/edit_area_full.js' => 'static_script',
					'<script type="text/javascript">				
						editAreaLoader.init({
							id: "js_template_content"	
							,start_highlight: true
							,allow_resize: "both"
							,allow_toggle: false
							,word_wrap: false
							,language: "en"
							,syntax: "html"
						});		
					</script>'
				)
			);			
		}
		
		$this->template()->setTitle(Phpfox::getPhrase('theme.create_a_new_template'))
			->setBreadcrumb(Phpfox::getPhrase('theme.create_new_template'))		
			->assign(array(
					'aThemes' => Theme_Service_Theme::instance()->get(),
					'aModules' => Phpfox_Module::instance()->getModules()
				)
			);	
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('theme.component_controller_admincp_template_add_clean')) ? eval($sPlugin) : false);
	}
}

?>