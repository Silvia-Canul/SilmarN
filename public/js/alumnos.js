var urlAlumnos='http://localhost/global/public/apiAlumnos';
new Vue({
	el:'#alumnos',

	http:{
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},



	data:{
		nombre:'hola mundo',
		alumnos:[],
		matricula:'',
		nombre:'',
		apellidop:'',
		apellidom:'',
		calificacion:'',
	},

	created:function(){
		this.getAlumnos();
	},
	
	methods:{

		getAlumnos:function(){
			this.$http.get(urlAlumnos)
			.then(function(json){
				this.alumnos=json.data;

			});
		},

		eliminar:function(id){

			var resp=confirm("¿estas seguro de eliminar")
			if(resp==true)
			{
				this.$http.delete('http://localhost/global/public/apiAlumnos/' + id)
				.then(function(json){
				this.getAlumnos();
				});
			}
			
		},

		agregarAlumno:function()
		{

			// construir un objeto que necesitamos por el api
			var alumno={matricula:this.matricula,
				nombre:this.nombre,
				apellidop:this.apellidop,
				apellidom:this.apellidom,
				calificacion:this.calificacion}
				// limpiar campos
				this.matricula='';
				this.nombre='';
				this.apellidop='';
				this.apellidom='';
				this.calificacion='';
				// para un metodo store se necesita un post
				this.$http.post(urlAlumnos,alumno)
				.then(function(json){
					this.getAlumnos();
					window.location.href = "editar"
				});

		},

		showAlumno:function(id){
			this.$http.get('http://localhost/global/public/apiAlumnos/' + id)
			.then(function(json){
				this.matricula=json.data.matricula;
				this.nombre=json.data.nombre;
				this.apellidop=json.data.apellidop;
				this.apellidom=json.data.apellidom;
				this.calificacion=json.data.calificacion;
			});
		},

		updateAlumno:function(id){
			//crear un json
			var alumno={nombre:this.nombre,
					apellidop:this.apellidop,
					apellidom:this.apellidom,
					calificacion:this.calificacion}

			this.$http.patch('http://localhost/global/public/apiAlumnos/' + id,alumno)
				.then(function(json){
					this.getAlumnos();
			});
		},

		limpiar:function(){

			this.matricula='';
			this.nombre='';
			this.apellidop='';
			this.apellidom='';
			this.calificacion='';
		}
		
	}
})
