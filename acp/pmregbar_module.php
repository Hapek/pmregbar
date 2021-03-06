<?php
/**
*
* @package phpBB Extension - PM Notify & Guest Register bar
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author Stoker - http://www.phpbb3bbcodes.com
*
*/

namespace dmzx\pmregbar\acp;

class pmregbar_module
{
var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache, $request;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;

		$this->tpl_name = 'acp_pmregbar_config';
		$this->page_title = $user->lang['ACP_PMREGBAR_CONFIG_SETTINGS'];
		add_form_key('acp_pmregbar_config');
		
		$submit = $request->is_set_post('submit');
		if ($submit)
		{
			if (!check_form_key('acp_pmregbar_config'))
			{
				trigger_error('FORM_INVALID');
			}
			$config->set('pmregbar_enablepm', $request->variable('pmregbar_enablepm', 0));
			$config->set('pmregbar_enablereg', $request->variable('pmregbar_enablereg', 0));
		

			trigger_error($user->lang['PMREGBAR_CONFIG_SAVED'] . adm_back_link($this->u_action));
		}
		$template->assign_vars(array(
			'PMREGBAR_VERSION'			=> (isset($config['pmregbar_version'])) ? $config['pmregbar_version'] : '',
			'PMREGBAR_ENABLEPM'			=> (!empty($config['pmregbar_enablepm'])) ? true : false,
			'PMREGBAR_ENABLEREG'		=> (!empty($config['pmregbar_enablereg'])) ? true : false,
			'U_ACTION'					=> $this->u_action,
		));
	}
}
