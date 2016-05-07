<?php namespace Multistarter\Http\Requests;

use Multistarter\Http\Requests\Request;
use Multistarter\Models\Role;

class UpdateRoleRequest extends Request {

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
