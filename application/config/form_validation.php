<?php

$config =array(

	'LoginForm' => array(
						array(
								'field' => 'Username',
								'label' => 'Username or Email',
								'rules' => 'required|trim',
						),
						array(
								'field' => 'Password',
								'label' => 'Password',
								'rules' => 'required|trim',
						)
				   ),

	'NewPasswordForm' => array(
						array(
								'field' => 'ConfirmPassword',
								'label' => 'Confirm Password',
								'rules'   => 'trim|required|matches[Password]'
						),
						array(
								'field' => 'Password',
								'label' => 'Password',
								'rules' => 'required|trim',
						)
				   ),
	
	'NewEmployeeForm' => array(
						array(
								'field' => 'FirstName',
								'label' => 'First Name',
								'rules' => 'required|trim',
						),
						array(
								'field' => 'LastName',
								'label' => 'Last Name',
								'rules' => 'required|alpha|trim',
						),
						array(
								'field' => 'Email',
								'label' => 'Email',
								'rules' => 'required|valid_email|trim',
						),
						array(
								'field' => 'PermanentAddress',
								'label' => 'Permanent Address',
								'rules' => 'required|trim',
						),
						array(
								'field' => 'PresentAddress',
								'label' => 'Present Address',
								'rules' => 'required|trim',
						),
						array(
								'field' => 'PhoneNo',
								'label' => 'Phone No',
								'rules' => 'required|trim',
						),
						array(
								'field' => 'Birthdate',
								'label' => 'Date of Birth',
								'rules' => 'required|trim',
						),
						/*array(
								'field' => 'Photo',
								'label' => 'Photo',
								'rules' => 'required|trim',
						),*/
						array(
								'field' => 'NationalIdNo',
								'label' => 'National Id No',
								'rules' => 'required|trim',
						)
				   ),

	'DealerForm' => array(
						array(
								'field' => 'DealerTitle',
								'label' => 'Dealer Title',
								'rules' => 'required|trim|callback_check_dealer_title',
						),
						array(
								'field' => 'DealerAddress',
								'label' => 'Dealer Address',
								'rules' => 'required|trim',
						),
						array(
								'field' => 'DealerCity',
								'label' => 'Dealer City Location',
								'rules' => 'required|trim',
						),
						array(
								'field' => 'DealerCountry',
								'label' => 'Dealer Country Location',
								'rules' => 'required|trim',
						),
						array(
								'field' => 'DealerPhone',
								'label' => 'Phone No',
								'rules' => 'required|trim',
						),
						array(
								'field' => 'DealerEmail',
								'label' => 'Dealer Email Address',
								'rules' => 'required|valid_email|trim|callback_check_user_email',
						),
						array(
								'field' => 'DealerFax',
								'label' => 'Dealer Fax No',
								'rules' => 'required|trim',
						)
				   ),

	'CategoryForm' => array(
						array(
								'field' => 'Title',
								'label' => 'Title',
								'rules' => 'required|alpha|trim|callback_check_category_title',
						),
						array(
								'field' => 'Remarks',
								'label' => 'Remarks',
								'rules' => 'trim|max_length[300]',
						),
				   ),

	'NewProgramForm' => array(
						array(
								'field' => 'ProgramId',
								'label' => 'Program ID',
								'rules' => 'required|is_natural_no_zero|trim|is_unique[educational_programs.ProgramId]',
						),
						array(
								'field' => 'ProgramName',
								'label' => 'Program Name',
								'rules' => 'required|alpha|trim|is_unique[educational_programs.ProgramName]',
						),
						array(
								'field' => 'Supervisor',
								'label' => 'Supervisor',
								'rules' => 'required|is_natural_no_zero|trim',
						),
						array(
								'field' => 'OpenDate',
								'label' => 'Opening Date',
								'rules' => 'required|date|valid_date[y-m-d,-]',
						)
				   ),
);

