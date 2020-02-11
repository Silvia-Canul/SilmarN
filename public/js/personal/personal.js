var urlPer='http://localhost/Silmar/public/apiPer';
var urlR='http://localhost/Silmar/public/apiRol';

new Vue({
	http: {
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	el:'#perrol',

	data:{
		personales:[],
		nick:'',
    	password:'',
    	nombre:'',
    	apellido_p:'',
    	apellido_m:'',
    	celular:'',
    	correo:'',
    	municipio:'',
    	calle:'',
    	numero:'',
    	cruzamiento:'',
    	fecha_nac:'',
    	foto:'',
    	editar:false,
    	preview:'',
    	id_rol:'',
    	//Traer datos de rol
    	roles:[],
    	nom_rol:'',
    	permisos:'',
    	editarRol:false,
		datos:null
	},
	created:function(){
		this.getPersonal();
		this.getRol();
	},
	methods:{
		getPersonal:function(){
			this.$http.get(urlPer)
			.then(function(json){
				this.personales=json.data;
			});
		},
		getRol:function(){
			this.$http.get(urlR)
			.then(function(json){
				this.roles=json.data;
			});
		},
		showModal:function(){
			$('#add_P').modal('show');
		},
		showModalRol:function(){
			$('#add_R').modal('show');
		},
		alSeleccionar(event){
			this.foto=event.target.files[0];
			this.preview=URL.createObjectURL(this.foto);
		},
		agregarPer:function(){
			//Se utiliza esta estrucctura cuando se requiere imagen o pdf
			var data = new FormData();

			data.append('nick',this.nick);
			data.append('password',this.password);
			data.append('nombre',this.nombre);
			data.append('apellido_p',this.apellido_p);
			data.append('apellido_m',this.apellido_m);
			data.append('celular',this.celular);
			data.append('correo',this.correo);
			data.append('municipio',this.municipio);
			data.append('calle',this.calle);
			data.append('numero',this.numero);
			data.append('cruzamiento',this.cruzamiento);
			data.append('fecha_nac',this.fecha_nac);
			data.append('foto',this.foto);
			data.append('id_rol',this.id_rol);

			var config={
				header:{'Content-Type':'image/jpg'}
			}
			this.$http.post(urlPer,data,config)
			.then(function(json){
				// alert('Usuario agregado');
				this.getPersonal();
				this.salir();
				Swal.fire({
						  position: 'top-end',
						  type: 'success',
						  title: 'Usuario agregado',
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
				// this.salir();

			});
		},
		editarPer:function(id){
			this.editar=true;
			this.$http.get(urlPer + '/' + id)
			.then(function(json){
				this.nick=json.data.nick
				this.password=json.data.password
				this.nombre=json.data.nombre
				this.apellido_p=json.data.apellido_p
				this.apellido_m=json.data.apellido_m
				this.fecha_nac=json.data.fecha_nac
				this.celular=json.data.celular
				this.correo=json.data.correo
				this.municipio=json.data.municipio
				this.calle=json.data.calle
				this.numero=json.data.numero
				this.cruzamiento=json.data.cruzamiento
				this.foto=json.data.foto
				this.id_rol=json.data.id_rol
				$('#add_P').modal('show');
			});
		},
		actualizarP:function(){

			var persona = {
				
				nick:this.nick,
				password:this.password,
				nombre:this.nombre,
				apellido_p:this.apellido_p,
				apellido_m:this.apellido_m,
				fecha_nac:this.fecha_nac,
				celular:this.celular,
				correo:this.correo,
				municipio:this.municipio,
				calle:this.calle,
				numero:this.numero,
				cruzamiento:this.cruzamiento,
				foto:this.foto,
				id_rol:this.id_rol,

			};

			this.$http.put(urlPer + '/'+ this.nick,persona)
			.then(function(json){
				alert('Usuario agregado');
				this.getPersonal();
				Swal.fire({
						  position: 'top-end',
						  type: 'success',
						  title: 'Usuario actualizado',
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
		eliminarPer:function(id){
			var a=confirm('¿Esta seguro que desea eliminar?');
			if(a==true)
				this.$http.delete(urlPer+'/'+id)
				.then(function(json){
					this.getPersonal();
					Swal.fire({
						  position: 'top-end',
						  type: 'success',
						  title: 'Usuario eliminado',
						  showConfirmButton: false,
						  timer: 1500
						});
					}, function(reason){
						Swal.fire({
						  type: 'error',
						  title: 'Error',
						  text: 'Algo salió mal',
						  footer: 'No se puede eliminar el Usuario'
						});
				});
		},
		agregarR:function(){
			var r = {
				nom_rol:this.nom_rol,
			 	permisos:this.permisos
			 };

				this.$http.post(urlR,r)
				.then(function(json){
					this.getRol();
					this.salirR();
					Swal.fire({
						  position: 'top-end',
						  type: 'success',
						  title: 'Rol agregado',
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
		},
		editarR:function(id){
			this.editarRol = true;
			$('#add_R').modal('show');

				this.$http.get(urlR + '/' + id)
				.then(function(json){
				this.nom_rol = json.data.nom_rol;
				this.permisos = json.data.permisos;
				this.id_rol = json.data.id_rol;
			});
		},
		actualizarR(){
			var rol = {
				nom_rol:this.nom_rol, 
				permisos:this.permisos
			};
				this.nom_rol = '';
				this.permisos = '';
				
				this.$http.patch(urlR + '/' + this.id_rol,rol)
				.then(function(json){
				this.getRol();
				$('#add_R').modal('hide');
				this.editarRol = false;
				
				Swal.fire({
						  position: 'top-end',
						  type: 'success',
						  title: 'Rol actualizado con éxito',
						  showConfirmButton: false,
						  timer: 1500
						});
				}, function(reason){
					$('#add_R').modal('hide');
					Swal.fire({
					  type: 'error',
					  title: 'Error',
					  text: 'Algo salió mal',
					  footer: 'Revise los valores ingresados'
					});
				});

		},
		eliminarRol:function(id){
			var confirmar = confirm('¿Está seguro de eliminar el rol?')

				if (confirmar) 
				{
					this.$http.delete(urlR + '/'+ id)
					.then(function(response){
						console.log(id);
						this.getRol();
						
						Swal.fire({
						  position: 'top-end',
						  type: 'success',
						  title: 'Rol eliminado',
						  showConfirmButton: false,
						  timer: 1500
						});
					}, function(reason){
						Swal.fire({
						  type: 'error',
						  title: 'Error',
						  text: 'Algo salió mal',
						  footer: 'No se puede eliminar el rol'
						});
					});
				}

		},
		salirR:function(){
			this.editarRol=false;
			this.nom_rol='';
			this.permisos='';

			$('#add_R').modal('hide');
		},


		salir:function(){
			this.editar=false;
			
			this.nick='';
			this.password='';
			this.nombre='';
			this.apellido_p='';
			this.apellido_m='';
			this.celular='';
			this.correo='';
			this.municipio='';
			this.calle='';
			this.numero='';
			this.cruzamiento='';
			this.fecha_nac='';
			this.foto='';
			this.id_rol='';

			$('#add_P').modal('hide');

		}

	}
});