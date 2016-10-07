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

	'NewMedicineForm' => array(
						array(
								'field' => 'Name',
								'label' => 'Name',
								'rules' => 'required|trim|callback_Check_Is_Unique',
						),
						array(
								'field' => 'Category',
								'label' => 'Category',
								'rules' => 'required|trim',
						),
						array(
								'field' => 'BatchNumber',
								'label' => 'Batch number',
								'rules' => 'required|trim',
						),
						array(
								'field' => 'Manufacturer',
								'label' => 'Manufacturer',
								'rules' => 'required|trim',
						),
						array(
								'field' => 'Quantity',
								'label' => 'Quantity',
								'rules' => 'required|trim|callback_Check_Is_Float',
						),
						array(
								'field' => 'EntryDate',
								'label' => 'Medicine entry date',
								'rules' => 'required|trim|date',
						),
						array(
								'field' => 'ProductionDate',
								'label' => 'Medicine production date',
								'rules' => 'required|trim|date',
						),
						array(
								'field' => 'ExpireDate',
								'label' => 'Medicine expire date',
								'rules' => 'required|trim|date',
						),
						array(
								'field' => 'BuyingPrice',
								'label' => 'Medicine buying price',
								'rules' => 'required|trim|callback_Check_Is_Float',
						),
						array(
								'field' => 'SellingPrice',
								'label' => 'Medicine selling date',
								'rules' => 'required|trim|callback_Check_Is_Float',
						),
				   ),
);

