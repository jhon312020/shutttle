<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Mdl_faq extends Response_Model {

    public $table               = 'faqs';
    public $primary_key         = 'faqs.id';
    //public $date_created_field  = 'date_created';
    //public $date_modified_field = 'date_modified';

    

    public function default_order_by()
    {
        $this->db->order_by('faqs.id');
    }

    public function validation_rules()
    {
        return array(
            'question_en' => array(
                'field' => 'question_en',
                'label' => 'Question (EN)',
                'rules' => 'required'
            ),
            'question_es' => array(
                'field' => 'question_es',
                'label' => 'Question (ES)',
                'rules' => 'required'
            ),
            'question_de' => array(
                'field' => 'question_de',
                'label' => 'Question (DE)',
                'rules' => 'required'
            ),
            'question_fr' => array(
                'field' => 'question_fr',
                'label' => 'Question (FR)',
                'rules' => 'required'
            ),
            'answer_en' => array(
                'field' => 'answer_en',
                'label' => 'Answer (EN)',
                'rules' => 'required'
            ),
            'answer_es' => array(
                'field' => 'answer_es',
                'label' => 'Answer (ES)',
                'rules' => 'required'
            ),
            'answer_de' => array(
                'field' => 'answer_de',
                'label' => 'Answer (DE)',
                'rules' => 'required'
            ),
            'answer_fr' => array(
                'field' => 'answer_fr',
                'label' => 'Answer (FR)',
                'rules' => 'required'
            ),
            'category' => array(
                'field' => 'category',
                'label' => 'Category',
                'rules' => 'required'
            )
        );
    }

}

?>
