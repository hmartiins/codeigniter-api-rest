<?php
defined("BASEPATH") OR die("No direct scripts allowed");

require APPPATH . "/libraries/REST_Controller.php";
use Restserver\Libraries\REST_Controller;

class Anime extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function index_get($id = 0){
        $data = [];
        if(!empty($id) && $id > 0){
            $data = $this->db->query("SELECT * FROM tb_anime WHERE cd_anime = ?", [$id])->result();
        }
        else{
            $data = $this->db->get("tb_anime")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post(){
        $data = $this->input->post();
        $this->db->query("INSERT INTO tb_anime (nm_anime, vl_ano, vl_genero, vl_rating) VALUES (?, ?, ?, ?)"
        , [$data["anime"], $data["ano"], $data["genero"], $data["rating"]]);
        // DEBUG: $this->response($data["anime"], REST_Controller::HTTP_OK);
        $this->response("DONE", REST_Controller::HTTP_OK);
    }

    public function index_put($id){
        $data = $this->put();
        $this->db->query("UPDATE tb_anime SET nm_anime = ?, vl_genero = ?, vl_ano = ?, vl_rating = ? WHERE cd_anime = ? ",
         [$data["anime"], $data["genero"], $data["ano"], $data["rating"], $id]);
        $this->response("Done", REST_Controller::HTTP_OK);
    }

    public function index_delete($id){
        $this->db->query("DELETE FROM tb_anime WHERE cd_anime = ?", [$id]);
        $this->response("Done", REST_Controller::HTTP_OK);
    }
}
 ?>
