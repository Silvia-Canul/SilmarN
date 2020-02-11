var urlCap='http://localhost/Silmar/public/apiCap';

new Vue({

	http: {
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},
	el:'#capi',

	data:{

		nom:'j',
		capillas:[],
		capilla:'',
		descripcion:'',
		municipio:'',
		calle:'',
		numero:'',
		cruzamiento:'',
		id_auxi:'',
		editar:false
	},

	created:function(){
		this.getCapillas();
	},
	methods:{

		getCapillas:function(){
			this.$http.get(urlCap)
			.then(function(json){
				this.capillas=json.data;
			// }).catch(function(json){
			// 	console.log(json);
			});
		},
		showModal:function(){
			$('#add_cap').modal('show');
		},

		agregarC:function(){
				var ca = {
					
					capilla:this.capilla,
					descripcion:this.descripcion,
					municipio:this.municipio,
					calle:this.calle,
					numero:this.numero,
					cruzamiento:this.cruzamiento
				};
				
				this.$http.post(urlCap,ca)
				.then(function(json){
					// alert('agregar con exito');
					this.getCapillas();
					Swal.fire({
						  position: 'top-end',
						  type: 'success',
						  title: 'Capilla agregada',
						  showConfirmButton: false,
						  timer: 1500
						});
					}, function(reason){
						Swal.fire({
						  type: 'error',
						  title: 'Error',
						  text: 'Algo salió mal',
						  footer: 'No se pudo agregar'
						});
					// $('#add_p').modal('hide');
					this.salir();
				});
		},

		editarC:function(id){
			this.editar=true;
			this.$http.get(urlCap + '/' + id)
			.then(function(json){
				this.capilla=json.data.capilla;
				this.descripcion=json.data.descripcion;
				this.municipio=json.data.municipio;
				this.calle=json.data.calle;
				this.numero=json.data.numero;
				this.cruzamiento=json.data.cruzamiento;

				this.id_auxi=json.data.id_capilla;	
				
				$('#add_cap').modal('show');
			});
		},

		actualizarC:function(){
		var c={
					capilla:this.capilla,
					descripcion:this.descripcion,
					municipio:this.municipio,
					calle:this.calle,
					numero:this.numero,
					cruzamiento:this.cruzamiento
				};

				this.$http.patch(urlCap + '/'+ this.id_auxi,c)
				.then(function(json) {
					this.getCapillas();
					Swal.fire({
						  position: 'top-end',
						  type: 'success',
						  title: 'Capilla actualizada',
						  showConfirmButton: false,
						  timer: 1500
						});
					}, function(reason){
						Swal.fire({
						  type: 'error',
						  title: 'Error',
						  text: 'Algo salió mal',
						  footer: 'Revise los datos ingresados'
						});
					
				});
				this.salir();
					
		},
		eliminarC:function(id){
			var a=confirm('¿Esta seguro que desea eliminar?');
			if(a==true)
				this.$http.delete(urlCap+'/'+id)
				.then(function(json){
					this.getCapillas();

					Swal.fire({
						  position: 'top-end',
						  type: 'success',
						  title: 'Capilla eliminada',
						  showConfirmButton: false,
						  timer: 1500
						});
					}, function(reason){
						Swal.fire({
						  type: 'error',
						  title: 'Error',
						  text: 'Algo salió mal',
						  footer: 'No se puede eliminar'
						});
				});

		},

		salir:function(){
			this.editar=false;
			
				this.capilla='';
				this.descripcion='';
				this.municipio='';
				this.calle='';
				this.numero='';
				this.cruzamiento='';
			$('#add_cap').modal('hide');
		}

	}

});