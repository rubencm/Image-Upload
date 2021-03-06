<?php
/**
*
* @package phpBB Extension - Image Upload
* @copyright (c) 2017 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\imageupload\migrations;

class imageupload_v102 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array(
			'\dmzx\imageupload\migrations\imageupload_install',
		);
	}

	public function update_data()
	{
		return array(
			array('config.update', array('imageupload_system_version', '1.0.2')),
		);
	}
}
