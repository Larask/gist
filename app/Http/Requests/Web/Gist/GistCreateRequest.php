<?php
namespace Gist\Http\Requests\Web\Gist;

use Gist\Http\Requests\Request;

class GistCreateRequest extends Request
{
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
		return [
			'content' => 'required|min:10',
            'title' => 'min:5'
		];
	}
}
