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
 * @version 		$Id: album-info.class.php 1166 2009-10-09 11:38:32Z Raymond_Benc $
 */
class Music_Component_Block_Album_Info extends Phpfox_Component
{
	/**
	 * Controller
	 */
	public function process()
	{
		return false;

		$this->template()->assign(array(
				'sHeader' => Phpfox::getPhrase('music.basic_info')
			)
		);
		
		return 'block';
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('music.component_block_album_info_clean')) ? eval($sPlugin) : false);
	}
}

?>