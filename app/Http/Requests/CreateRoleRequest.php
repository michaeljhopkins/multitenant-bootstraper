<?php namespace Multi\Http\Requests;

use Multi\Http\Requests\Request;
use Multi\Models\Role;

class CreateRoleRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return Role::$rules;
	}

}
