<?php

class mForo extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function guardarTema($param){
		$campos = array(
				'TituloTema' => $param['TituloTema'],
				'seccion' => $param['seccion'],
				'AsuntoTema' => $param['AsuntoTema'],
				'idUsuarioCrea' => $param['idUsuarioCrea']);
		$this->db->insert('TemasForo',$campos);
		return $this->db->insert_id();
	}
	public function getTemas(){
		$this->db->select('*');
		$this->db->from('TemasForo');
		$s = $this->db->get();
		return $s->result();
	}
	public function getComentariosPorTema($s){
		$this->db->select('*');
		$this->db->from('Comentarios c');
		$this->db->join('Usuarios u','u.idUsuario = c.idUsuarioc');
		$this->db->where('c.idTemaForo',$s);
		$this->db->order_by('Fecha_Creacion','DESC');
		$s = $this->db->get();
		return $s->result();
	}
	public function guardarComentario($param){
		$campos = array(
			'idUsuarioc' => $param['idUsuarioc'],
			'Comentario' => $param['Comentario'],
			'idPersona' => null,
			'idEmpresa' => null,
			'idNegociacion' => null,
			'idTarea' => null,
			'idComent' => null,
			'idTemaForo' => $param['idTema']
			);
			$this->db->insert("Comentarios",$campos);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
			else{
				return false;
			}
	}
	public function ActualizarComentario($idComentario,$comentario){
		$data = array(
				'Comentario' => $comentario);
			$this->db->where('idComentario',$idComentario);
			$this->db->update('Comentarios',$data);
			return true;
	}
	public function getTema($idTema){
		$this->db->select('*');
		$this->db->from('TemasForo');
		$this->db->where('idTemasForo',$idTema);
		$r = $this->db->get();
		return $r->row();
	}
	public function ActualizarVisto($idTema,$estado){
		$data = array('Visto'=>$estado);
		$this->db->where('idComentario',$idTema);
		$this->db->update('Comentarios',$data);
		return true;
	}
	public function AddTareaForo($idComentario,$comentario){

		$this->db->where('descripcion',$comentario);
		$this->db->from('TareasForo');
		$r =  $this->db->count_all_results(); 
		if ($r<1) {
			$data = array(
			'idComentario' => $idComentario,
			'descripcion' => $comentario);
			$this->db->insert('TareasForo',$data);
			return true;
		}
	}
	public function getTareaForo($idComentario=null){
		if ($idComentario!==null) {
			$this->db->select('*');
			$this->db->from('TareasForo');
			$this->db->where('idComentario',$idComentario);
			$r= $this->db->get();
			return $r->row();
		}else{
			$this->db->select('*');
			$this->db->from('TareasForo');
			$r = $this->db->get();
			return $r->result();
		}
		}
	public function actTareaForo($idTareaForo,$status){
		$data = array('status'=>$status);
		$this->db->where('idTareaForo',$idTareaForo);
		$this->db->update('TareasForo',$data);
	}
	}