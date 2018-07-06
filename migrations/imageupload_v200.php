<?php
/**
*
* @package phpBB Extension - Image Upload
* @copyright (c) 2017 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\imageupload\migrations;

class imageupload_v200 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array(
			'\dmzx\imageupload\migrations\imageupload_v105',
			//'\phpbb\db\migration\data\v330\storage_track',
		);
	}

	public function update_data()
	{
		return array(
			array('config.add', array('storage\dmzx.imageupload\provider', 'phpbb\storage\provider\local')),
			array('config.add', array('storage\dmzx.imageupload\config\path', 'ext/dmzx/imageupload/files')),
			array('config.add', array('storage\dmzx.imageupload\config\depth', '0')),
			//array('custom', array(array($this, 'track'))),
		);
	}

	public function track()
	{
		/** @var storage $storage */
		$storage = $this->container->get('dmzx.imageupload.storage');

		$sql = 'SELECT imageupload_realname
			FROM ' . $this->table_prefix . 'image_upload';

		$result = $this->db->sql_query($sql);

		while ($row = $this->db->sql_fetchrow($result))
		{
			$storage->track_file($row['imageupload_realname']);
		}

		$this->db->sql_freeresult($result);
	}
}
