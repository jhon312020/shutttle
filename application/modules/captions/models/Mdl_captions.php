<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Mdl_captions extends Response_Model {

    public $table               = 'captions';
    public $primary_key         = 'captions.id';
    //public $date_created_field  = 'date_created';
    //public $date_modified_field = 'date_modified';

    

    public function default_order_by()
    {
        $this->db->order_by('captions.id');
    }

    public function validation_rules()
    {
        return array(
            'title_en' => array(
                'field' => 'title_en',
                'label' => 'Title (EN)',
                'rules' => 'required'
            ),
            'title_es' => array(
                'field' => 'title_es',
                'label' => 'Title (ES)',
                'rules' => 'required'
            ),
			'subtitle_en' => array(
                'field' => 'subtitle_en',
                'label' => 'SubTitle (EN)',
                'rules' => 'required'
            ),
            'subtitle_es' => array(
                'field' => 'subtitle_es',
                'label' => 'SubTitle (ES)',
                'rules' => 'required'
            ),
            /* 'content_en' => array(
                'field' => 'content_en',
                'label' => 'Content (EN)',
                'rules' => 'required'
            ),
            'content_es' => array(
                'field' => 'content_es',
                'label' => 'Content (ES)',
                'rules' => 'required'
            ),
            'subcontent_en' => array(
                'field' => 'subcontent_en',
                'label' => 'SubContent (EN)',
                'rules' => 'required'
            ),
            'subcontent_es' => array(
                'field' => 'subcontent_es',
                'label' => 'Sub Content (ES)',
                'rules' => 'required'
            ), */
        );
    }
  
  public function getRow($type, $lang)
	{
    $this->db->select('subcontent_en, subcontent_es, content_en, content_es, image');
		$this->db->where('type', $type);
		$query = $this->db->get('captions');
    $data = array(); 
    if ($query->row()) {
      $content = $query->row();
      if ($lang == '' || $lang == 'es'){
        $data['content'] = $content->content_es;
        $data['subcontent'] = $content->subcontent_es;
      } else {
        $data['content'] = $content->content_en;
        $data['subcontent'] = $content->subcontent_en;
      }
      $data['image'] = $content->image;
    }
    return $data; 
	}
}

?>
