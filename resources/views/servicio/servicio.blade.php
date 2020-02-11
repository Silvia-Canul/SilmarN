@extends('layouts.admin')

@section('contenido')

<div class="container">
	<div id="servi">
		<div class="table-responsive col-md-11">
			<h2>Lista de</h2>
			<table class="table table-sm table-hover">
				<thead class="thead-dark">
					<th>No. Servicio</th>
					<th>Servicio</th>
					<th>Hora</th>
					<th>Fecha</th>
					<th>Costo</th>
				
					<th>Opciones</th>
				</thead>
		<!-- p es una variable   parroquias es el array del js... id de la tabla  -->
				<tbody>
					<tr v-for="(s,index) in catalogo">
						<td>@{{index+1}}</td>
						<td>@{{s.servicio}}</td>
						<td>@{{s.fecha_ser}}</td>
						<td>@{{s.hora_serv}}</td>
						<td>$ @{{s.costo}}</td>
						
						
						<td>
							<span class="glyphicon glyphicon-pencil btn btn-xs btn-primary" @click="editarS(s.id_servicio)"></span>
							<span class="glyphicon glyphicon-trash btn btn-xs btn-danger" @click="eliminarS(s.id_servicio)"></span>

						</td>
					</tr>
				</tbody>
			</table>

		<button class="btn btn-info" v-on:click="showModal()">Agregar</button>

		<!-- ventana modal .............................................-->

		<div class="modal fade" tabindex="-1" role="dialog" id="add_s">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close" v-on:click=""><span aria-hidden="true">x</span></button>
                <h4 class="modal-title" v-if="editar">Editar Parroquias</h4>
                 <h4 class="modal-title" v-if="!editar">Guardar Parroquia</h4>
              </div>
            <div class="modal-body">
              	
                <input type="text" placeholder="Servicio" v-model="servicio" class="form-control">
                <br>
                <input type="date" placeholder="Fecha de evento" v-model="fecha_ser" class="form-control">
                <br>
                <input type="time" placeholder="Hora de evento" v-model="hora_serv" class="form-control">
                <br>
                <input type="text" placeholder="Costo" v-model="costo" class="form-control">
                

              <div class="modal-footer">
                <button type="submit" class="btn btn-success" v-on:click="actualizarS()" v-if="editar">Actualizar</button>

                <button type="submit" class="btn btn-success" v-on:click="agregarS()" v-if="!editar">Guardar</button>
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
	<script src="{{ asset('js/servicio/servicio.js') }}"></script>
	<!-- <script src="js/moment-with-locales.min.js"></script> -->
@endpush

