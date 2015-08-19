<?php
/**
 * Part of starter project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Listener;

use Windwalker\Core\View\HtmlView;
use Windwalker\Event\Event;

/**
 * The SystemListener class.
 *
 * NOTE: This listener has been registered after onAfterInitialise event. So the first event is onAfterRouting.
 *
 * @since  {DEPLOY_VERSION}
 */
class SystemListener
{
	/**
	 * onBeforeRouting
	 *
	 * @param Event $event
	 *
	 * @return  void
	 */
	public function onRegisterRouting(Event $event)
	{
		$app = $event['app'];

		if ($app->get('system.offline', false))
		{
			$view = new HtmlView;

			$view->setLayout('windwalker.offline.offline');

			echo $view->render();

			die;
		}
	}
}