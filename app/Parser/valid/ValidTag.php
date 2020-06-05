<?php

use System\ORM;

class ValidTag {

    public $db_data;
    public $parse_data;

    public $result;

    public function __construct($parse_data)
    {
        $this->parse_data = $parse_data;
        $this->get_db_tag();
        $this->unset_if_exist();
    }

    public function get_db_tag()
    {
        $new_data = new ORM('tag');
        $new_data->select();
        $this->db_data = $new_data->run();
    }

    public function add_new_tag($arr)
    {
        $new_tag = new ORM('tag');
        $new_tag->insert($arr);
        $new_tag->run();

        return $new_tag::lastID();
    }

    public function unset_if_exist()
    {
        foreach ($this->parse_data as $key_ln => $items){
            foreach ($items as $k => $v){
                if($b = array_search($v, $this->db_data[0])){
//                    $this->parse_data[$key_ln][$b] = $v ;
//                    unset($this->parse_data[$key_ln][$b]);
                    echo 'find '.$v.'<br>'.' in '.$key_ln;
                }else{
//                    $id = $this->add_new_tag([$key_ln => $v]);
//
//                    $this->parse_data[$key_ln][$id] = $v ;
//                    unset($this->parse_data[$key_ln][$id]);
                    echo 'not find '.$v.' in '.$key_ln.'<br>';
                }
            }
        }

        $this->result = $this->parse_data;
    }


}

