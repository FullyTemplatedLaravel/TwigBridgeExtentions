<?php

namespace FTL\TBE;


class NotificationsExtension extends \Twig_Extension
{

	/**
	 * Returns the name of the extension.
	 *
	 * @return string The extension name
	 */
	public function getName()
	{
		return str_replace('\\', '_', __CLASS__);
	}

	public function getFunctions()
	{
		return [
			new \Twig_SimpleFunction('n_info', function () { return \Notifications::byType('info')->get(); }),
			new \Twig_SimpleFunction('n_success', function () { return \Notifications::byType('success')->get(); }),
			new \Twig_SimpleFunction('n_warning', function () { return \Notifications::byType('warning')->get(); }),
			new \Twig_SimpleFunction('n_danger', function () { return \Notifications::byType('danger')->get(); }),
			new \Twig_SimpleFunction('n_error', function () { return \Notifications::byType('error')->get(); }),
		];
	}
}