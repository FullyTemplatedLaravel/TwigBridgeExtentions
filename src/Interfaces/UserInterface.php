<?php

namespace FTL\TBE\Interfaces;


interface UserInterface {

	/**
	 * Checks if the user has a role by its name.
	 *
	 * @param string|array $name       Role name or array of role names.
	 * @param bool         $requireAll All roles in the array are required.
	 *
	 * @return bool
	 */
	public function hasRole($name, $requireAll = false);

	/**
	 * Check if user has a permission by its name.
	 *
	 * @param string|array $permission Permission string or array of permissions.
	 * @param bool         $requireAll All permissions in the array are required.
	 *
	 * @return bool
	 */
	public function can($permission, $requireAll = false);

	/**
	 * Checks role(s) and permission(s).
	 *
	 * @param string|array $roles       Array of roles or comma separated string
	 * @param string|array $permissions Array of permissions or comma separated string.
	 * @param array        $options     validate_all (true|false) or return_type (boolean|array|both)
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return array|bool
	 */
	public function ability($roles, $permissions, $options = []);
}