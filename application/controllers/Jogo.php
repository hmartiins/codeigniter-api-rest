<?php
defined("BASEPATH") OR die("No direct scripts allowed");

require APPPATH . "/libraries/REST_Controller.php";
use Restserver\Libraries\REST_Controller;

class Jogo extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function index_get($id = 0){
        $data = [];
        if(!empty($id) && $id >= 0){
            $data = $this->db->query("SELECT * FROM tb_jogo WHERE cd_jogo = ?", [$id])->result();
        }
        else{
            $data = $this->db->get("tb_jogo")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post(){
        $data = $this->input->post();
        $this->db->query("INSERT INTO tb_jogo (nome, descricao, preco, genero) VALUES (?, ?, ?, ?)"
        , [$data["nome"], $data["descricao"], $data["preco"], $data["genero"]]);
        $this->response("Registrado com Sucesso", REST_Controller::HTTP_OK);
    }

    public function index_put($id){
        $data = $this->put();
        $this->db->query("UPDATE tb_jogo SET nome = ?, descricao = ?, preco = ?, genero = ? WHERE cd_jogo = ? ",
        [$data["nome"], $data["descricao"], $data["preco"], $data["genero"], $id]);
        $this->response("Atualizado com sucesso", REST_Controller::HTTP_OK);
    }

    public function index_delete($id){
        $this->db->query("DELETE FROM tb_jogo WHERE cd_jogo = ?", [$id]);
        $this->response("Deletado com sucesso", REST_Controller::HTTP_OK);
    }
}
?>
