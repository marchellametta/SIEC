<section id="content">
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->form_builder->open_form(array('action' => 'form'));

$defaults_object_or_array_from_db = NULL;
$data1 = array(
  'name'          => 'username',
  'id'            => 'username',
  'label'         => 'What would you want to be remembered as? What would you want to be remembered as? What would you want to be remembered as?',
  'value'         => 'johndoe',
  'maxlength'     => '100',
  'size'          => '500',
  'style'         => 'width:100%'
);
$data2 = array(
  'name'          => 'keterangan',
  'id'            => 'username',
  'label'         => 'Keterangan',
  'type'          => 'textarea',
  'class'         => 'wysihtml5',
  'value'         => 'johndoe',
  'maxlength'     => '100',
  'size'          => '50',
  'style'         => 'width:100%'
);
echo $this->form_builder->build_form_horizontal(
  array(
    $data1, $data2, array(/* RADIO */
			'id' => 'radio_group',
			'label' => 'Radio buttons',
			'type' => 'radio',
			'options' => array(
					array(
							'id' => 'radio_button_yes',
							'value' => 1,
							'label' => 'Yes'
					),
					array(
							'id' => 'radio_button_no',
							'value' => 0,
							'label' => 'No'
					)
			)
	),array(/* SUBMIT */
			'id' => 'submit',
			'type' => 'submit'
	)
  ,$defaults_object_or_array_from_db
));
echo $this->form_builder->close_form();
?>
</section>
