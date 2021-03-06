﻿<style type="text/css">
.select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
  border-color: red;
}
.easy-autocomplete {
  position: relative;
  display: contents;
}
#tablaFormularioEmpresa td,
#tablaFormularioEmpresa th {
  border: 2px solid #e0e0e0;
  width: 50%;
}
/*.select2-container--default .select2-selection--multiple {
  border-color: red;
}*/
#tdEmpresaPersona .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
  border-color: #d2d6de;
}
#trTelefonosPersonas  .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
  border-color: #d2d6de;
}
</style>
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
      <div class="row">
      <div class="col-md-12 text-center">
          <div class="nav-tabs-custom" style="margin-bottom: 0px;">
          <div class="text-center bg-white" style="padding: 1px; margin: 10px 15px 0px 15px; border-radius: 20px">
           <ul class="nav nav-tabs">
            <li class="active col-md-3 text-center">
              <a class="btn" href="#tab_Empresas" data-toggle="tab" style="border-radius: 10px; margin-bottom: 3px;">
                  &nbsp;Registrar Empresas
              </a>
            </li>
            <li class="col-md-3">
              <a class="btn text-center" href="<?php echo base_url();?>cPersona" style="border-radius: 10px; margin-bottom: 3px;">
                &nbsp;Registrar Personas
              </a>
            </li>
          </ul>          
          </div>
          <div class="tab-content">
              <div class="tab-pane active" id="tab_Empresas">
                <button type="button" class="btn btn-default btn-sm pull-right" onclick="limpiarFormularioEmpresa()" style="border-radius: 10px">
                  <i class="glyphicon glyphicon-erase"></i>Limpiar Campos
                </button>
                <form method="POST" action="<?php echo base_url();?>cEmpresa/guardar" id="formEmpresa">
                <table class="table table-bordered table-responsive" id="tablaFormularioEmpresa">
                  <thead>
                    <tr style="background-color: #F0AD4E; color: white;">
                      <th colspan="2" class="text-center"><b>Información General</b></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <span class="col-md-4">Nombre Empresa</span>
                        <div id="mensaje_validar_empresa" class="alert-danger hidden col-md-8">Empresa Registrada Previamente</div>
                        <input type="text" class="form-control" id="NombreEmpresa" name="NombreEmpresa" required="true" style="border-color: red;"  onchange="Validar_Nueva_Empresa()">
                      </td>
                      <td>
                        <span class="">Abreviación</span>
                        <input type="text" class="form-control" id="Abreviacion" name="Abreviacion">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">SPP<small>(Opcional)</small></b></span>
                        <input type="text" class="form-control" id="SPP" name="SPP">
                      </td>
                      <td>
                        <div class="col-md-6">
                            <span class="">Tipo de Empresa</span>
                            <select class="form-control select2" id="Tipo" name="Tipo" required data-minimum-results-for-search="Infinity">
                              <option selected="true" disabled="false" value="">Tipo</option>
                              <option value="Comprador final">Comprador Final</option>
                              <option value="Intermediario">Intermediario</option>
                              <option value="Maquilador">Maquilador</option>
                              <option value="Organizador de Pequeños Productores">Organizador de Pequeños Productores</option>
                              <option value="Organismo de Certificacion">Organismo de Certificacion</option>
                          </select>              
                        </div>
                        <div class="col-md-6">
                          <span class="">Pais</span>
                          <select class="form-control selectpicker select2" id="Pais" name="Pais" required="true" onchange="cambiarLada()">
                        </select>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Productos que maneja</span>
                        <textarea rows="2" cols="50" class="form-control" id="Productos" name="Productos" placeholder="Productos que maneja"></textarea>
                      </td>
                      <td>
                          <span class="">Propuesto por:</span>
                          <input type="text" class="form-control" id="PresupuestoPersona" name="PresupuestoPersona" placeholder="Persona que recomienda el registro">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Nivel de Interés de la Empresa</span>
                        <select class="form-control" id="InteresEmpresa" name="InteresEmpresa" style="border-color: red;">
                          <option value="N/A" >N/A</option>
                          <option class="option" value="Bajo">Bajo</option>
                          <option class="option" value="Medio">Medio</option>
                          <option class="option" value="Alto">Alto</option>
                        </select>
                      </td>
                      <td>
                        <span class="">Nivel de Confianza</span>
                        <select class="form-control" id="ConfianzaEmpresa" name="ConfianzaEmpresa" style="border-color: red;">
                          <option class="" value="N/A" >N/A</option>
                          <option class="option" value="1">1 (Bajo)</option>
                          <option class="option" value="2">2</option>
                          <option class="option" value="3">3</option>
                          <option class="option" value="4">4</option>
                          <option class="option" value="5">5 (Alto)</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Motivo o Razón</span>
                        <textarea rows="2" cols="50" class="form-control" id="Motivo" name="Motivo" placeholder="Motivo de Registro"></textarea>
                      </td>
                      <td>
                        <span class="">Contactado en</span>
                        <textarea rows="2" cols="50" class="form-control" id="LugarContacto" name="LugarContacto" placeholder="Lugar donde se realizó el contacto"></textarea>
                      </td>
                    </tr>
                    <tr >
                      <td colspan="2" style="background-color: #F0AD4E; color: white;">
                        <b>Datos de Contacto</b>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <span class="col-md-12">Contacto Principal</span>
                        <div class="col-md-12 text-center" style="padding: 0px;">
<!--                         <input type="text" class="col-md-12 form-control" id="RepresentanteEmp" style="border-color:red;" required> -->
                          <label class="col-md-12" id="RepresentanteEmp" name="RepresentanteEmp"></label>
                        <input type="hidden" class="col-md-12 form-control" id="idRepresentanteEmp" name="idRepresentanteEmp" value="0">
                          <select class="hidden form-control selectpicker btn-info" id="Representante" name="Representante">
                            <option selected="true" disabled="true" value="0">Lista de Representantes</option>
                          </select>                    
                        </div>
                        <div class="col-md-12 text-center" style="padding: 0px;">
                          <button style="padding: 0px; border-radius: 10px;" type="button" data-toggle="modal" data-target="#ModalNPersona" id="btnAgregarNuevo" class="btn bg-blue" data-toggle="tooltip" title="AGREGAR NUEVO">&nbsp;&nbsp;<i class="fa fa-plus-square fa-2x">&nbsp;</i>Agregar Nuevo&nbsp;&nbsp;</button>
                          <button style="padding: 0px; border-radius: 10px;" type="button" id="btnBuscarExistente" class="btn bg-aqua" data-toggle="tooltip" title="BUSCAR EXISTENTE">&nbsp;<i class="fa fa-search fa-2x">&nbsp;</i>Buscar Existente&nbsp;&nbsp;</button>
                        </div>
                      </td>
                      <td>
                        <span class="col-md-12">Contacto</span>
                        <div class="col-md-12" style="padding: 0px;">
                          <select  class="select2 form-control js-example-programmatic-multi" id="ContactoEmp" name="ContactoEmp[]" multiple="multiple" maximumSelectionLength="2" >
                          </select>
                          <select class="hidden form-control formsNP js-example-programmatic-multi" id="Contacto" name="Contacto">
                            <option selected="true" disabled="true" value="0">Lista de Contactos</option>
                          </select>
                        </div>
                        <div class="col-md-12 text-center" style="padding: 0px;">
                          <button style="padding: 0px; border-radius: 10px;" type="button" data-toggle="modal" data-target="#ModalNPersona" id="btnAgregarNuevoCont" class="btn bg-blue" data-toggle="tooltip" title="AGREGAR NUEVO">&nbsp;<i class="fa fa-plus-square fa-2x">&nbsp;</i>Agregar Nuevo&nbsp;&nbsp;</button>
                          <button style="padding: 0px; border-radius: 10px;" type="button" id="btnBuscarExistenteCont" class="btn bg-aqua" data-toggle="tooltip" title="BUSCAR EXISTENTE">&nbsp;<i class="fa fa-search fa-2x"></i>Buscar Existente&nbsp;&nbsp;</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Skype</span>
                        <input type="text" class="form-control" id="Skype" name="Skype">
                      </td>
                      <td>
                        <span class="">Sitio Web</span>
                        <input type="text" class="form-control" id="SitioWeb" name="SitioWeb">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">1º Telefono</span>&nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" title="Lada generada apartir de la seleccion del pais"></i>
                        &nbsp;<i id="fa" class="fa fa-question-circle"></i>
                        <div class="input-group">
                          <div class="input-group-addon" style="padding: 0px 12px;">
                            <label id="ladaTel1"></label>
                            <input type="hidden" id="ladaTel1input" name="ladaTel1input" value="">
                          </div>                        
                          <input type="text" class="form-control" id="Telefono1" name="Telefono1"  style="height: 38px;">
                        <div class="input-group-addon" style="padding: 0px 0px;">
                            <select id="TipoTelefono1" name="TipoTelefono1" class="" data-minimum-results-for-search="Infinity">
                              <option value="Movil" selected="true">Movil</option>
                              <option value="Fijo">Fijo</option>
                            </select>
                          </div>
                        </div>
                      </td>
                      <td>
                        <span class="">2º Telefono</span>&nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" title="Lada generada apartir de la seleccion del pais"></i>
                        &nbsp;<i id="fa2" class="fa fa-question-circle"></i>

                        <div class="input-group">
                          <div class="input-group-addon" style="padding: 0px 12px;">
                            <label id="ladaTel2"></label>
                            <input type="hidden" id="ladaTel2input" name="ladaTel2input" value="">
                          </div>                        
                        <input type="text" class="form-control " id="Telefono2" name="Telefono2" style="height: 38px;">
                        <div class="input-group-addon" style="padding: 0px 0px;">
                            <select id="TipoTelefono2" name="TipoTelefono2" class="" data-minimum-results-for-search="Infinity">
                              <option value="Movil" selected="true">Movil</option>
                              <option value="Fijo">Fijo</option>
                            </select>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">1º Email</span>
                        <input type="text" class="form-control" id="Correo1" name="Correo1" required="true" style="border-color: red;">
                      </td>
                      <td>
                        <span class="">2º Email</span>
                        <input type="text" class="form-control" id="Correo2" name="Correo2">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Dirección Oficinas</span>
                        <textarea rows="2" type="text" class="form-control" id="DireccionOficina" name="DireccionOficina" placeholder="Ciudad, Calle, Número"></textarea>
                        <input type="hidden" class="form-control col-md-12 formsNP2" id="DireccionFiscal" name="DireccionFiscal" placeholder="Direccion Fiscal">
                        <input type="hidden" class="form-control col-md-6 formsNP2" id="Ciudad" name="Ciudad" placeholder="Ciudad">
                      </td>
                      <td>
                        <span>Datos Fiscales</span>
                        <textarea rows="2" cols="50" class="form-control col-md-12" id="DatosFiscales" name="DatosFiscales" placeholder="Información referente a la facturación"></textarea> 
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                      <span class="col-md-2"></span>
                      <!-- <button id="registrarEmpresa" disabled="disabled" class="btn btn-success" >Registrar Empresa</button> -->
                        <input type="submit" id="registrarEmpresa" name="registrarEmpresa" class=" btn btn-success col-md-8" value="Registrar Empresa" disabled style="border-radius: 10px;">
                        <span class="col-md-2"></span>
                      </td>
                    </tr>
                  </tbody>
                </table>
                </form>
              </div>
          </div>
      </div>
      </div>
      </div>
    </section>

<!-- Modal -->
<div id="ModalNPersona" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registrar Empresa > Registrar Persona</h4>
      </div>
      <div class="modal-body">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-center">
          <button type="button" class="btn btn-app pull-left" onclick="limpiarFormularioPersona()">
            <i class="glyphicon glyphicon-erase"></i>Limpiar
          </button> 
          <h3>REGISTRAR PERSONA</h3>
        </div>
        <form id="formPersona" method="POST" action="<?php echo base_url();?>cPersona/guardar2">
        <div class="col-md-12 divsNP">
                <table class="table table-responsive table-bordered" id="tablaRegistroPersonas">
                  <thead>
                    <tr style="background-color: #F0AD4E; color: white;">
                      <th colspan="2" class="text-center"><b>Información General</b></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <span class="">Nombre Completo</span>
                        <div id="mensaje_validar_persona" class="alert-danger hidden col-md-12">Persona Registrada Previamente</div>
                        <input  onchange="Validar_Nueva_Persona();" type="text" class="form-control " id="Nombre" name="Nombre" placeholder="Nombre(s) Apellidos" required="true" style="border-color: red;">
                      </td>
                      <td>
                        <span class="">Puesto</span>
                        <input type="text" class="form-control Puesto formsNP" id="Puesto" name="Puesto">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Tipo de Persona</span>
                        <input type="hidden" id="Cargo2" name="Cargo2" class="form-control Cargo" disabled>
                        <label type="text" id="cargo3" name="cargo3" class="form-control Cargo" disabled>
                        <select class="form-control Cargo hidden  formsNP" id="Cargo" name="Cargo">
                          <option selected="true" value="Representante">Contacto Principal</option>
                          <option selected="true" value="Contacto">Contacto</option>
                        </select>
                      </td>
                      <td>
                        <span>Pais</span>
                        <select class="Pais form-control selectpicker select2" id="Pais" name="Pais" required="true" onchange="cambiarLadaP()">
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Productos que maneja</span>
                        <textarea rows="2" cols="50" class="form-control" id="Productos" name="Productos" placeholder="Productos que maneja"></textarea>
                      </td>
                      <td>
                          <span class="">Propuesto por:</span>
                          <input type="text" class="form-control PresupuestoPersona" id="PresupuestoPersona" name="PresupuestoPersona" placeholder="Persona que recomienda el registro">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Nivel de Interés de la Persona</span>
                        <select class="form-control InteresPersona" id="InteresPersona" name="InteresPersona" required="true" style="border-color: red;">
                          <option value="N/A" disabled="true">N/A</option>
                          <option value="Bajo">Bajo</option>
                          <option value="Medio">Medio</option>
                          <option value="Alto">Alto</option>
                        </select>
                      </td>
                      <td>
                        <span class="">Nivel de Confianza</span>
                        <select class="form-control ConfianzaPersona" id="ConfianzaPersona" name="ConfianzaPersona" required="true" style="border-color: red;">
                          <option value="N/A" disabled="true">N/A</option>
                          <option value="1">1 (Bajo)</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5 (Alto)</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Motivo o Razón</span>
                        <textarea rows="2" cols="50" class="form-control Motivo" id="Motivo" name="Motivo" placeholder="Motivo de Registro"></textarea>
                      </td>
                      <td>
                        <span class="">Contactado en</span>
                        <textarea rows="2" cols="50" class="form-control LugarContacto" id="LugarContacto" name="LugarContacto" placeholder="Lugar donde se realizó el contacto"></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2" style="background-color: #F0AD4E; color: white;">
                        <b>Datos de Contacto</b>
                      </td>
                    </tr>
                    <tr>
                      <td id="tdEmpresaPersona">
                        <span class="">Empresa</span>
                        <select class="form-control select2 selectpicker" disabled="true" title="Empresa..." id="Empresa" name="Empresa" style="border: color:gray">
                          <option value="0">Sin Empresa</option>
                        </select>
                      </td>
                      <td>
                        <span class="">Skype</span>
                        <input type="text" class="form-control" id="Skype" name="Skype">
                      </td>
                    </tr>
                    <tr id="trTelefonosPersonas">
                      <td>
                        <span class="">1º Telefono</span>&nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" title="Lada generada apartir de la seleccion del pais"></i>
                        <div class="input-group">
                          <div class="input-group-addon" style="padding: 0px 12px;">
                            <label class="ladaTel1" id="ladaTel1"></label>
                            <input class="ladaTel1input" type="hidden" id="ladaTel1input" name="ladaTel1input" value="">
                          </div>                        
                          <input type="text" class="Telefono1 form-control" id="Telefono1" name="Telefono1">
                        <div class="input-group-addon" style="padding: 0px 0px;">
                            <select id="TipoTelefono1" name="TipoTelefono1" class="select2" data-minimum-results-for-search="Infinity" style="border-color: gray">
                              <option value="Movil" selected="true">Movil</option>
                              <option value="Fijo">Fijo</option>
                            </select>
                          </div>
                        </div>
                      </td>
                      <td>
                        <span class="">2º Telefono</span>&nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" title="Lada generada apartir de la seleccion del pais"></i>
                        <div class="input-group">
                          <div class="input-group-addon" style="padding: 0px 12px;">
                            <label class="ladaTel2" id="ladaTel2"></label>
                            <input class="ladaTel2input" type="hidden" id="ladaTel2input" name="ladaTel2input" value="">
                          </div>                        
                          <input type="text" class="Telefono2 form-control" id="Telefono2" name="Telefono2">
                        <div class="input-group-addon" style="padding: 0px 0px;">
                            <select id="TipoTelefono2" name="TipoTelefono2" class="select2" data-minimum-results-for-search="Infinity">
                              <option value="Movil" selected="true">Movil</option>
                              <option value="Fijo">Fijo</option>
                            </select>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">1º Email</span>
                        <input type="text" class="Correo1 form-control" id="Correo1" name="Correo1" required="true">
                      </td>
                      <td>
                        <span class="">2º Email</span>
                        <input type="text" class="Correo2 form-control" id="Correo2" name="Correo2">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Dirección</span>
                        <input type="text" class="Calle form-control" id="Calle" name="Calle" placeholder="Ciudad, Calle, Número">
                        <input type="hidden" class="form-control col-md-4 formsNP2" id="Numero" name="Numero" placeholder="Número">
                        <input type="hidden" class="form-control col-md-4 formsNP2" id="Colonia" name="Colonia" placeholder="Colonia" value="">

                        <input type="hidden" class="form-control col-md-4 formsNP2" id="Municipio" name="Municipio" placeholder="Municipio" value="">
                        <input type="hidden" class="form-control col-md-6 formsNP2" id="Estado" name="Estado" placeholder="Ciudad">
                        <input type="hidden" class="form-control col-md-4 formsNP2" id="Cp" name="Cp" placeholder="C.P:">
                      </td>
                      <td>
                        <span>Datos Fiscales</span>
                        <textarea rows="2" cols="50" class="form-control col-md-12" id="DatosFiscalesPersona" name="DatosFiscalesPersona" placeholder="Información referente a la facturación"></textarea> 
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                      <span class="col-md-2"></span>
                        <input type="submit" name="registrarPersona" id="registrarPersona" class=" btn btn-success col-md-8" value="Registrar Persona" disabled style="border-radius: 10px;">
                        <span class="col-md-2"></span>
                      </td>
                    </tr>
                  </tbody>
                </table>
        </div> 
        </form>
        </div> <!-- row -->
      </div>
      </div><!--  modal-bod7 -->
      <div class="modal-footer">
        <button id="btnCerrarModal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var baseurl = "<?php echo base_url();?>"; 
  var idUsuarioActivo = "<?php echo $this->session->userdata('s_idUsuario'); ?>";
  var idEmpresa =0;
</script>