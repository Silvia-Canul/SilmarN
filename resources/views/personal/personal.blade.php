@extends('layouts.admin')

@section('contenido')

<div class="container">
	<div id="perrol">
		<div class="table-responsive col-md-11">
			<h2>Lista del Personal</h2>

			<table class="table table-sm table-hover">
				<thead class="thead-dark">
					<th>Usuario</th>
					<th>Contarseña</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>celular</th>
					<th>Correo</th>
					<th>Fecha de Nacimiento</th>
	
				</thead>
		<!-- p es una variable   personales es el array del js... id de la tabla  -->
				<tbody>
					<tr v-for="(pe in personales">
						<td>@{{pe.nick}}</td>
						<td>@{{pe.password}}</td>
						<td>@{{pe.nombre}}</td>
						<td>@{{pe.apellido_p}}</td>
						<td>@{{pe.apellido_m}}</td>
						<td>@{{pe.celular}}</td>
						<td>@{{pe.correo}}</td>
						<td>@{{pe.fecha_nac}}</td>
					
					</tr>
				</tbody>
				<thead class="thead-dark">
					<th>Municipio</th>
					<th>Calle</th>
					<th>Numero</th>
					<th>Cruzamiento</th>
					<th>Tipo de Us</th>
					<th>Foto</th>
					<th>Opciones</th>
				</thead>
				<tbody>
					<tr v-for="pe in personales">
						<td>@{{pe.municipio}}</td>
						<td>@{{pe.calle}}</td>
						<td>@{{pe.numero}}</td>
						<td>@{{pe.cruzamiento}}</td>
						<td>@{{pe.nom_rol}}</td>
						<td>@{{pe.foto}}</td>
						
						<td align="center">
							<span class="glyphicon glyphicon-pencil btn btn-xs btn-primary" @click="editarPer(pe.nick)"></span>
							<span class="glyphicon glyphicon-trash btn btn-xs btn-danger" @click="eliminarPer(pe.nick)"></span>

						</td>
					</tr>
				</tbody>
			</table>
		<button class="btn btn-info" v-on:click="showModal()">Nuevo Usuario</button>

		<!-- /.tabla de roles -->
			<br><br>
			<div class="row">
				
					<div class="col-md-12">
						<h2>Lista de Roles</h2>
					</div>	
				</div>
				<table class="table table-hover">
					<thead class="thead-dark">
						<tr>
							<th>Id rol</th>
							<th>Tipo de usuario</th>
							<th>Permisos</th>
							<th>Eliminado</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for='rol in roles'>
							<td>@{{ rol.id_rol }}</td>
							<td>@{{ rol.nom_rol }}</td>
							<td>@{{ rol.permisos }}</td>
							<td v-if="rol.eliminado == 0">No</td>
							<td v-if="rol.eliminado == 1">Si</td>
							<td>

								<span class="fa fa-pencil btn btn-xs btn-primary" @click="editarR(rol.id_rol)"></span> 
								<span class="fa fa-trash btn btn-xs btn-danger" @click="eliminarRol(rol.id_rol)"></span>

							</td>
						</tr>
					</tbody>
				</table>

		<button class="btn btn-info" v-on:click="showModalRol()">Nuevo Rol</button>
		<br><br>
			

<!-- ventana modal .............................................-->

	<div class="modal fade" tabindex="-1" role="dialog" id="add_P">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close" v-on:click="salir()"><span aria-hidden="true">x</span></button>
                <h4 class="modal-title" v-if="editar">Editar Usuarios</h4>
                 <h4 class="modal-title" v-if="!editar">Guardar Usuario</h4>

              </div>
            <div class="modal-body">
            	<div class="row">
            		<div class="col-sm-6">
              	
               			<label>Usuario (REQUERIDO)</label>
               			<input type="text" placeholder="Nombre de Usuario" v-model="nick" class="form-control">
                		<br><label>Contraseña (REQUERIDO)</label>
                		<input type="text" placeholder="Contraseña" v-model="password" class="form-control">
                		<br><label>Nombre (REQUERIDO)</label>
                		<input type="text" placeholder="Nombre" v-model="nombre" class="form-control">
                		<br><label>Apellido Paterno (REQUERIDO)</label>
                		<input type="text" placeholder="Apellido Paterno" v-model="apellido_p" class="form-control">
                		<br><label>Apellido Materno (REQUERIDO)</label>
                		<input type="text" placeholder="Apellido Materno" v-model="apellido_m" class="form-control">
                		<br><label>Fecha (REQUERIDO)</label>
                		<input type="date" placeholder="Fecha de Nacimiento" v-model="fecha_nac" class="form-control">
                		<br><label>Celular</label>
                		<input type="text" placeholder="Celular" v-model="celular" class="form-control">
                		<br><label>Correo</label>
                		<input type="text" placeholder="Correo Electrónico" v-model="correo" class="form-control">
					</div>
			
					<div class="col-sm-6">
			      		<div class="form-group">

			      			<label>Municipio (REQUERIDO)</label>	
						    <input type="text" name="" placeholder="Municipio" class="form-control" v-model="municipio">
						    <br><label>Calle (REQUERIDO)</label>
						    <input type="text" name="" placeholder="Calle" class="form-control" v-model="calle">
						    <br><label>Número</label>
						    <input type="text" name="" placeholder="Numero" class="form-control" v-model="numero">
						    <br><label>Cruzamientos (REQUERIDO)</label>
						    <input type="text" name="" placeholder="Cruzamientos" class="form-control" v-model="cruzamiento">
						    <br>
						    <select class="form-control" v-model="id_rol">
						    	
						    <option disabled="Seleccione un Rol"></option>
						    <option v-for="rol in roles" v-bind:value="rol.id_rol">@{{rol.nom_rol}}</option>

						    </select>

						    <label>Foto </label>
						    <input type="file" class="form-control" accept="image/jpeg" maxlength="1024" @change="alSeleccionar">
						    
			      		</div>	
			    	</div>
			    	<div class="modal-footer">
	         		<button type="submit" class="btn btn-success" v-on:click="actualizarP()" v-if="editar">Actualizar</button>

            		<button type="submit" class="btn btn-success" v-on:click="agregarPer()" v-if="!editar">Guardar</button>
                	<button type="submit" class="btn btn-warning" @click="salir()">Cancelar</button>
				</div>
			    </div>
			 </div>
				
				
	   		</div>
    	</div>
	</div>
<!-- FIN DEL MODAL ............................................-->	
			<!-- vENTANA MODAL DE ROLES..................................... -->
		<div class="modal fade" tabindex="-1" role="dialog" id="add_R">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close" v-on:click="salir()"><span aria-hidden="true">x</span></button>
                <h4 class="modal-title" v-if="editarRol">Editar Rol</h4>
                 <h4 class="modal-title" v-if="!editarRol">Guardar Rol</h4>
                 	
              </div>
            <div class="modal-body">
            	<div class="alert alert-danger" v-if="datos == false">
		      		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      		<strong>Title!</strong>Faltan datos
		      	</div>
              	
                	<label class="">Rol (REQUERIDO)</label>
			      	<input type="text" name="" placeholder="Nombre del rol" class="form-control" v-model="nom_rol"><br>
			      	<label class="">Permisos (REQUERIDO)</label>
			      	<input type="text" name="" placeholder="Permisos" class="form-control" v-model="permisos">
			</div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-success" v-on:click="actualizarR()" v-if="editarRol">Actualizar</button>

                <button type="submit" class="btn btn-success" v-on:click="agregarR()" v-if="!editarRol">Guardar</button>
                <button type="submit" class="btn btn-warning" @click="salirR()">Cancelar</button>
			  </div>

            </div>
          </div>
        </div>
     <!-- FIN DEL MODAL rol ............................................-->
	

		</div>
	</div>
</div>


@endsection

@push('scripts')
<!-- 	<script type="js/vue-resource.min"></script>
	<script type="js/vue.js"></script> -->
	<script src="{{ asset('js/personal/personal.js') }}"></script>
	<!-- <script src="js/moment-with-locales.min.js"></script> -->
@endpush
