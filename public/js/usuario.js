var ruta='http://localhost/DemoSari/public/';
var urlUser= ruta + 'apiUsuario';
new Vue({

http:{
	headers:{
		'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
	}
},

	el:'#usuario',
	data:{
		saludo:'Hola Mundo',
		nick:'',
		password:'',
		nombre:'',
		apellidos:'',
		foto:'',
		preview:''

	},

	methods:{
		alSeleccionar(event){
			this.foto=event.target.files[0];
			// console.log(this.foto);
			this.preview= URL.createObjectURL(this.foto);
		}, 
		guardarUser:function(){
			// si se necesita un pdf o una imagen se utiliza FormData
			var data = new FormData();
			data.append('nick',this.nick);
			data.append('password',this.password);
			data.append('nombre',this.nombre);
			data.append('apellidos',this.apellidos);
			data.append('foto',this.foto);

			var config={
				header:{'Content-Type':'image/jpg'}
			}

			this.$http.post(urlUser,data,config)
			.then(function(json){
				alert('USUARIO AGREGADO');
			})
			.catch(function(json){
				console.log(json);
			})
		}
	}
});