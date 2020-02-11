var urlEstacionamiento='http://localhost/DemoSari/public/apiEstacionamiento';
new Vue({
	el:'#parqueo',

	http:{
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	data:{
		nombre:'HOLA MUNDO',
		saludo:'hola',
		estacionamiento:[],
		id_cliente:'',
		cliente:'',
		fecha:'',
		activo:'',
		hora:'',
		tipo_vehiculo:'',
		lugar:'',
		editando:false,
	},

	created:function(){
		this.getEstacionamiento();
	},

	methods:{
		getEstacionamiento:function(){
			this.$http.get(urlEstacionamiento)
			.then(function(json){
				this.estacionamiento=json.data
			});
		},

		showEstacionamiento:function(id){
			this.$http.get('http://localhost/DemoSari/public/apiEstacionamiento/' + id)
			.then(function(json){
				this.id_cliente=json.data.id_cliente;
				this.cliente=json.data.cliente;
				this.fecha=json.data.activo;
				this.hora=json.data.hora;
				this.tipo_vehiculo=json.data.tipo_vehiculo;
				this.lugar=json.data.lugar;
				this.editando=true;
			})
		},

		eliminarEstacionamiento:function(id){
			var resp=confirm("¿estas seguro de eliminar el estacionamiento?")
			if(resp==true)
			{
				this.$http.delete('http://localhost/DemoSari/public/apiEstacionamiento/' + id)
				.then(function(json){
				this.getEstacionamiento();
				});
			}
			
		},

		updateEstacionamiento:function(id){
			// crear un json 
			var estacionamiento={id_cliente:this.id_cliente,
					  cliente:this.cliente,
					  fecha:this.fecha,
					  activo:this.activo,
					  hora:this.hora,
					  tipo_vehiculo:this.tipo_vehiculo,
					  lugar:this.lugar, }
		    console.log();

			this.$http.patch('http://localhost/DemoSari/public/apiEstacionamiento' + '/' + id,estacionamiento)
			.then(function(json){
				this.getEstacionamiento();
				this.limpiar();
			});
		},
		limpiar:function(){
			this.id_cliente='';
			this.cliente='';
			this.fecha='';
			this.activo='';
			this.hora='';
			this.tipo_vehiculo='';
			this.lugar='';
			this.editando=false;
		}
	}
});