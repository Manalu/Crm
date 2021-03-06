<?php ob_start(); ?>
<?php 
/**
* 
*/
class cTareas extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('crm/mTareas');
		$this->load->model('crm/mNotificaciones');
	}
	public function index(){
		$Tareas_tmp = array();
		if($this->session->userdata('s_login')==1){
			$Tareas = $this->mTareas->getTareas_deEmpresas_PorUsuario();

			foreach ($Tareas as $Tarea) {

				$idTarea=$Tarea->idTarea;
//Config Contactos
          if ($Tarea->idEmpresaE>0) {
            $data['verContacto'][$idTarea] = base_url().'cEmpresa/verEmpresa/'.$Tarea->idEmpresaE;
            $data['NombreContacto'][$idTarea] = $Tarea->NombreEmpresa;
            if ($Tarea->idNegociacion!==null) {
              $data['ObjetivoSignal'][$idTarea]= '<span class=""><a href="'.base_url().'cPersona/verNegociacion/'.$Tarea->idNegociacion.'">OBJETIVO</a></span>';
            }
          }
          else if($Tarea->idPersonaPer>0){//Si es tarea de  una persona
            $data['verContacto'][$idTarea] = base_url().'cPersona/verPersona/'.$Tarea->idPersonaPer;
            $data['NombreContacto'][$idTarea] = $Tarea->Nombre;
              if ($Tarea->idNegociacion!==null) {
              $data['ObjetivoSignal'][$idTarea]= '<span class=""><a href="'.base_url().'cPersona/verNegociacion/'.$Tarea->idNegociacion.'">OBJETIVO</a></span>';
            }
          }else if($Tarea->emp_part!==''){
            $data['verContacto'][$idTarea] = base_url().'cPersona/verTarea/'.$Tarea->idTarea;
            $data['NombreContacto'][$idTarea] = '<span data-toggle="tooltip" title="Consulte la ficha de la tarea">TAREA GRUPAL</span>';
          }
//Fin configuracion Contactos

				$idTarea = $Tarea->idTarea;
					$data['row_Administrador'][$idTarea]['Administrador']=$this->mTareas->getAsignados($Tarea->idTarea);
			}
			$data['row_Tareas']=$Tareas;
			
			$this->load->view('crm/header');
			$this->load->view('crm/menu');
			$this->load->view('crm/vTareas',$data);
			$this->load->view('crm/footer');
		}
		else{redirect(base_url().cLogin);}
	}
	public function getTareas_deEmpresas_PorUsuario(){
		$s = $this->input->post('idUsuarioActivo');
		$resultado = $this->mTareas->getTareas_deEmpresas_PorUsuario($s);
		echo json_encode($resultado);
	}
	public function getTareas_deEmpresas_PorUsuarioGrupales(){
		$s = $this->input->post('idUsuarioActivo');
		$resultado = $this->mTareas->getTareas_deEmpresas_PorUsuarioGrupales($s);
		echo json_encode($resultado);
	}
	public function getTareas_dePersonas_PorUsuario(){
		$s = $this->input->post('idUsuarioActivo');
		$resultado = $this->mTareas->getTareas_dePersonas_PorUsuario($s);
		echo json_encode($resultado);
	}
	public function getTareas_dePersonasGrupales_PorUsuario(){
		$s = $this->input->post('idUsuarioActivo');
		$resultado = $this->mTareas->getTareas_dePersonas_PorUsuarioGrupales($s);
		echo json_encode($resultado);
	}
	public function getTareas_deObjetivos(){
		$s = $this->input->post('idNegociacion');
		$resultado = $this->mTareas->getTareas_deObjetivos($s);
		echo json_encode($resultado);
	}
	public function StatusRealizada(){
		$id = $this->input->post('idTarea');
		$status = $this->input->post('StatusFinal');
		$resultado = $this->mTareas->StatusRealizada($id,$status);
	}
	public function StatusCancelar(){
		$id = $this->input->post('idTarea');
		$status = $this->input->post('StatusFinal');
		$resultado = $this->mTareas->StatusCancelar($id,$status);
	}
	public function StatusAceptar(){
		$id = $this->input->post('idTarea');
		$this->GenerarNotificacion($id,'Tarea Aceptada');
		$resultado = $this->mTareas->StatusAceptar($id);
	}
	public function StatusRechazar(){
		$id = $this->input->post('idTarea');
		$status = $this->input->post('StatusFinalRechazada');
		$this->GenerarNotificacion($id,'Tarea Rechazada',$status);
		$resultado = $this->mTareas->StatusRechazar($id,$status);
	}
	public function GenerarNotificacion($idTarea,$Encabezado,$status=null)
	{
		$tarea = $this->mTareas->getTarea($idTarea);
		$pusher = $this->ci_pusher->get_pusher();

		// Set message
		$data['Encabezado']=$Encabezado;
		$data['message'] = $tarea->TituloTarea;
		if ($status==null) {
		$data['message2']= '';
		$data['type']='success';
		$TituloNotificacion='Tarea Aceptada:';
		}else {
		$data['type']='danger';
		$data['message2']= 'Razon: '.$status.'.';
		$TituloNotificacion='Tarea Rechazada:';
		}
		

		// Send message
		$canal = 'User'.$tarea->idUsuarioCrea;
		$event = $pusher->trigger($canal, 'Notificacion', $data);

		if ($event === TRUE)
		{
			echo 'Event triggered successfully!';
		}
		else
		{
			echo 'Ouch, something happend. Could not trigger event.';
		}
		$this->mNotificaciones->crearNotificacion($tarea,$TituloNotificacion);
	}
	public function actNotificacionesRechazada_Leida(){
		$id = $this->input->post('idTarea');
		$idUsuarioActivo = $this->input->post('idUduarioActivo');
		$resultado = $this->mNotificaciones->actNotificacionesRechazada_Leida($id,$idUsuarioActivo);
	}
	public function getTareas(){
		$tareas = $this->mTareas->getTareas_deObjetivosAll();
		echo json_encode($tareas);
	}
	public function GuardarCambiosTarea(){
		$idTarea=$this->input->post('idTarea');
		$Categoria=$this->input->post('Categoria');
		$Descripcion=$this->input->post('Descripcion');
		$resultado = $this->mTareas->GuardarCambiosTarea($idTarea,$Categoria,$Descripcion);
	}
	

}