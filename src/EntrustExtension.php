<?php

namespace FTL\TBE;


use FTL\TBE\Interfaces\UserInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class EntrustExtension extends \Twig_Extension
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
			new \Twig_SimpleFunction('role', [$this, 'role']),
			new \Twig_SimpleFunction('permission', [$this, 'permission']),
			new \Twig_SimpleFunction('ability', [$this, 'ability']),
		];
	}

	public function role($roles)
	{
		return ($user = self::getUser()) && $user->hasRole(explode('|', $roles));
	}

	public function permission($permissions)
	{
		return ($user = self::getUser()) && $user->can(explode('|', $permissions));
	}

	public function ability($roles, $permissions, $validateAll = false)
	{
		return ($user = self::getUser()) && $user->ability(explode('|', $roles), explode('|', $permissions), array('validate_all' => $validateAll));
	}

	/**
	 * @return bool|UserInterface
	 */
	protected static function getUser()
	{
		if (Auth::guest()) {
			return false;
		}
		$user = Input::user();
		if (!self::usesEntrustUserTrait($user)) {
			return false;
		}
		return $user;
	}

	protected static function usesEntrustUserTrait($user)
	{
		return in_array('\\Zizaco\\Entrust\\Traits\\EntrustUserTrait', self::class_uses_deep($user));
	}

	/**
	 * @see http://php.net/manual/ru/function.class-uses.php
	 * @param string|object $class
	 * @param bool $autoload
	 * @return array
	 */
	protected static function class_uses_deep($class, $autoload = true)
	{
		$traits = [];

		// Get traits of all parent classes
		do {
			$traits = array_merge(class_uses($class, $autoload), $traits);
		} while ($class = get_parent_class($class));

		// Get traits of all parent traits
		$traitsToSearch = $traits;
		while (!empty($traitsToSearch)) {
			$newTraits = class_uses(array_pop($traitsToSearch), $autoload);
			$traits = array_merge($newTraits, $traits);
			$traitsToSearch = array_merge($newTraits, $traitsToSearch);
		};

		foreach ($traits as $trait => $same) {
			$traits = array_merge(class_uses($trait, $autoload), $traits);
		}

		return array_unique($traits);
	}
}