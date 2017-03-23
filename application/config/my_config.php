<?php
$config = array(
	
	// Configurable API key - set this to whatever you'd like
	'fi_api_key' => '123',
	/* My Key */
  /*'STRIPE_PRIVATE_KEY'=>'sk_test_y24CWoLfkd3OOA3yIcwoIGL7',
  'STRIPE_PUBLIC_KEY'=>'pk_test_Qz5bf9AxLanq7Pedp45bbH69',*/

  /* Client Key */
 	'STRIPE_PRIVATE_KEY'=>'sk_live_fPjQjrdhomap4AU7bXoJwcEM',
  'STRIPE_PUBLIC_KEY'=>'pk_live_KxLL160dAUv9AnRhkDpZYhhA',
	
	// Works in conjunction with Fi_CRUD_Model to provide pagination style
	'pagination_style'		=> array(
		'first_link'		=> '&lsaquo;&lsaquo;',
		'next_link'			=> '&rsaquo;',
		'prev_link'			=> '&lsaquo;',
		'last_link'			=> '&rsaquo;&rsaquo;',
		'full_tag_open'		=> '<div class="pagination"><ul>',
		'full_tag_close'	=> '</ul></div>',
		'first_tag_open'	=> '<li>',
		'first_tag_close'	=> '</li>',
		'last_tag_open'		=> '<li>',
		'last_tag_close'	=> '</li>',
		'cur_tag_open'		=> '<li class="active"><a href="#">',
		'cur_tag_close'		=> '</a></li>',
		'next_tag_open'		=> '<li>',
		'next_tag_close'	=> '</li>',
		'prev_tag_open'		=> '<li>',
		'prev_tag_close'	=> '</li>',
		'num_links'			=> '10'
	),
	'menus' => array("reservation" => "book_now", "aboutus" => "about_us1", "faq" => "faq", "contacts" => "contact_us"),
	'book_now_menus' => array("faq", "aboutus")
);

?>
