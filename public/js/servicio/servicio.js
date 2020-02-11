var urlS='http://localhost/Silmar/public/apiSer';

new Vue({

	http: {
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},
	el:'#servi',

	data:{
		catalogo:[],
		servicio:'',
		fecha_ser:'',
		hora_serv:'',
		costo:0,
		editar:false
	},
	created:function(){
		this.getServicios();
	},
	methods:{
		getServicios:function(){
			this.$http.get(urlS)
			.then(function(json){
				this.catalogo=json.data;
			});
		},
		showModal:function(){
			$('#add_s').modal('show');
		},
		agregarS:function(){
			var ser={
				servicio:this.servicio,
				fecha_ser:this.fecha_ser,
				hora_serv:this.hora_serv,
				costo:this.costo
			};
			this.$http.post(urlS, ser)
			.then(function(json){
				this.getServicios();
				// Swal.fire({
				// 		  position: 'top-end',
				// 		  type: 'success',
				// 		  title: 'Servicio agregado al catálogo',
				// 		  showConfirmButton: false,
				// 		  timer: 1500
				// 		});
				// 	}, function(reason){
				// 		Swal.fire({
				// 		  type: 'error',
				// 		  title: 'Error',
				// 		  text: 'Algo salió mal',
				// 		  footer: 'No se pudo agregar'
				// 		});
					// $('#add_p').modal('hide');
					this.salir();
			});

		},
		salir:function(){
			this.editar=false;

			this.servicio='';
			this.fecha_ser='';
			this.hora_serv='';
			this.costo='';

			$('add_S').modal('hide');

		}
	}
});