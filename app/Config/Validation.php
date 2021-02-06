<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $user = [
		'username' => [
			'rules' => 'required|min_length[5]|is_unique[user.username]'
		],
		'password' => [
			'rules' => 'required'
		],
		'reapetPassword' => [
			'rules' => 'required|matches[password]'
		],
		'nama' => [
			'rules' => 'required'
		],
		'email' => [
			'rules' => 'required|valid_email'
		],
		'tgl_lahir' => [
			'rules' => 'required'
		],
		'alamat' => [
			'rules' => 'required'
		],
		'no_telp' => [
			'rules' => 'required'
		],
		'avatar' => [
			'rules' => 'uploaded[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/gif,image/png]max_size[avatar,1024]'
		]
	];

	public $userupdate = [
		'username' => [
			'rules' => 'required|min_length[5]'
		],
		'nama' => [
			'rules' => 'required'
		],
		'email' => [
			'rules' => 'required|valid_email'
		],
		'tgl_lahir' => [
			'rules' => 'required|valid_date'
		],
		'alamat' => [
			'rules' => 'required'
		],
		'no_telp' => [
			'rules' => 'required|is_natural'
		],
		'avatar' => [
			'rules' => 'if_exist|uploaded[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/gif,image/png]max_size[avatar,1024]'
		]
	];

	public $login = [
		'username' => [
			'rules' => 'required'
		],
		'password' => [
			'rules' => 'required'
		]
	];

	public $thread = [
		'judul' => [
			'rules' => 'required'
		],
		'id_kategori' => [
			'rules' => 'required'
		],
		'isi' => [
			'rules' => 'required'
		],
	];
}
