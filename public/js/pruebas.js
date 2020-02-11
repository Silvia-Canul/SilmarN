// var route = document.querySelector("[name=route]").value;
/*var ruta='http://localhost/prueba/public/';*/
var urlImpuesto= 'http://localhost/prueba/public/apiImpuesto';
new Vue({
	el:'#pruebas',
	// token
	http:{
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	data:{
		n:'hola mundo',
		impuestos:[],
		editando:false,
		id_impuesto:'',
		nombre:'',
		tasa:'',
		
	},

	created:function(){
		this.getImpuestos();
	},


	methods:{
		getImpuestos:function(){
			this.$http.get(urlImpuesto)
			.then(function(json){
				this.impuestos=json.data
			});
		},

		showImpuestos:function(id){
			this.$http.get(urlImpuesto + '/' + id)
			.then(function(json){
				this.id_impuesto=json.data.id_impuesto;
				this.nombre=json.data.nombre;
				this.tasa=json.data.tasa;
				
				this.editando=true;
			});
		},

		eliminarImpuesto:function(id){
			var resp=confirm("¿estas seguro de eliminar el Impuesto?")
			if(resp==true)
			{
				this.$http.delete(urlAlumno + '/' + id)
				.then(function(json){
				this.getImpuestos();
				});
			}
			
		},

		updateImpuesto:function(id){
			// crear un json 
			var Impuesto={
				id_usuario:this.id_usuario,
				nombre:this.nombre,
					  tasa:this.tasa,
					   }
		    console.log();

			this.$http.patch(urlImpuesto + '/' + id,Impuesto)
			.then(function(json){
				this.getImpuestos();
				this.limpiar();
			})
		},
		agregarImpuesto:function(id){
			var impuesto={
				id_impuesto:this.id_impuesto,
				nombre:this.nombre,
				tasa:this.tasa,
				 };
					  this.id_impuesto='';
					  this.nombre='';
					  this.tasa='';
					  
		    console.log();

			this.$http.patch(urlImpuesto + '/' + id,impuesto)
			.then(function(json){
				this.getImpuesto();
				this.limpiar();
			})
			
		},


		limpiar:function(){
			this.id_impuesto='';
			this.nombre='';
			this.apellidom='';
			
			this.editando=false;
		},
	}
});