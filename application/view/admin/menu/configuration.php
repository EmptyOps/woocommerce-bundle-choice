<?php
defined( 'ABSPATH' ) || exit;


$form = array();

$form['id']='eowbc_configuration';
$form['title']='Configuration';
$form['method']='POST';

$form['data'] = array(

					'form_text'=>array(
						'label'=>'Form Text',
						'type'=>'text',
						'value'=>'0',
						'options'=>array(),
						'class'=>array('fluid'),
						'size_class'=>array('sixteen','wide'),
						'inline'=>true,
					),	
					'form_textare'=>array(
						'label'=>'Form Textasf asdf ',
						'type'=>'text',
						'value'=>'0',
						'options'=>array(),
						'class'=>array('fluid'),
						'size_class'=>array('eight','wide'),
						'inline'=>false,
						),
					'sele'=>array(
						'label'=>'Seletc test',
						'type'=>'select',
						'value'=>'0',
						'options'=>array('in'=>'India','pk'=>'Pakistan'),
						'class'=>array('fluid'),
						'size_class'=>array('eight','wide'),
						'inline'=>false,
						),
					'tarea'=>array(
						'label'=>'fill area',
						'type'=>'textarea',
						/*'value'=>'0',*/
						'options'=>array(),
						'class'=>array('fluid'),
						'size_class'=>array('eight','wide'),
						'inline'=>false,
						),
					'radio'=>array(
						'label'=>'Radio Check?',
						'type'=>'radio',
						'value'=>'lbl_1',
						'options'=>array('lbl_1'=>'Label 1','lbl_2'=>'Label 2','lbl_3'=>'Label 3'),
						'class'=>array('fluid'),						
						),
					'checkbox'=>array(
						'label'=>'chech Check?',
						'type'=>'checkbox',
						'value'=>array('chk_1','chk_3'),
						'options'=>array('chk_1'=>'Label 1','chk_2'=>'Label 2','chk_3'=>'Label 3'),
						'class'=>array('fluid'),						
						)
				);


wbc()->load->model('admin\form-builder');
eo\wbc\model\admin\Form_Builder::instance()->build($form);
