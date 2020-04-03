@extends('layouts.admin')

@section('contenido')

<div class="container">
	<div id="capi">
		<div class="table-responsive col-md-11">
			<h2>Lista de capillas</h2>
			<table class="table table-sm table-hover">
				<thead class="thead-dark">
					<th>Numero Capilla</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Municipio</th>
					<th>Calle</th>
					<th>Numero</th>
					<th>Cruzamientos</th>
					<th>Opciones</th>
				</thead>
		<!-- p es una variable   parroquias es el array del js... id de la tabla  -->
				<tbody>
					<tr v-for="(ca,index) in capillas">
						<td>@{{index+1}}</td>
						<td>@{{ca.capilla}}</td>
						<td>@{{ca.descripcion}}</td>
						<td>@{{ca.municipio}}</td>
						<td>@{{ca.calle}}</td>
						<td>@{{ca.numero}}</td>
						<td>@{{ca.cruzamiento}}</td>
						
						<td>
							<span class="glyphicon glyphicon-pencil btn btn-xs btn-primary" @click="editarC(ca.id_capilla)"></span>
							<span class="glyphicon glyphicon-trash btn btn-xs btn-danger" @click="eliminarC(ca.id_capilla)"></span>

						</td>
					</tr>
				</tbody>
			</table>

		<button class="btn btn-info" v-on:click="showModal()">Agregar</button>

		<!-- ventana modal .............................................-->

		<div class="modal fade" tabindex="-1" role="dialog" id="add_cap">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close" v-on:click="salir()"><span aria-hidden="true">x</span></button>
                <h4 class="modal-title" v-if="editar">Editar Parroquias</h4>
                 <h4 class="modal-title" v-if="!editar">Guardar Parroquia</h4>
              </div>
            <div class="modal-body">
              	
                <input type="text" placeholder="Nombre" v-model="capilla" class="form-control">
                <br>
                <input type="text" placeholder="Descripción" v-model="descripcion" class="form-control">
                <br>
                <input type="text" placeholder="Municipio" v-model="municipio" class="form-control">
                <br>
                <input type="text" placeholder="Calle" v-model="calle" class="form-control">
                <br>
                <input type="text" placeholder="Numero" v-model="numero" class="form-control">
                <br>
                <input type="text" placeholder="Cruzamientos" v-model="cruzamiento" class="form-control">
				</div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-success" v-on:click="actualizarC()" v-if="editar">Actualizar</button>

                <button type="submit" class="btn btn-success" v-on:click="agregarC()" v-if="!editar">Guardar</button>
                <button type="submit" class="btn btn-warning" @click="salir()">Cancelar</button>
			  </div>

            </div>
          </div>
        </div>
     <!-- FIN DEL MODAL ............................................-->
		</div>
	</div>
</div>


@endsection

@push('scripts')
	
	
	
<!-- 	<script type="js/vue-resource.min"></script>
	<script type="js/vue.js"></script> -->
	<script src="{{ asset('js/capilla.js') }}"></script>
	<!-- <script src="js/moment-with-locales.min.js"></script> -->
@endpush

