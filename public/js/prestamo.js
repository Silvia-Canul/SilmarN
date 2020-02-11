var urlP='http://localhost/Micopress/public/apiP';

new Vue({

	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}  
   	},

	el:'#prestamo',

	data:{
		prestamos:[],
		editando:false,
		id_aux:'',
		prestamo:'',
		periodo_pago:'',
		interes:''
	},
	created:function(){
		this.getPrestamo();
	},
	
	methods:{
		getPrestamo:function(){
			this.$http.get(urlP)
			.then(function(json){
				this.prestamos=json.data;
			});
		},
		showModal:function(){
			$('#add_p').modal('show');
		},

		agregarPrestamo:function(){
				var p = {
					prestamo:this.prestamo,
					periodo_pago:this.periodo_pago,
					interes:this.interes
				};
				
				this.$http.post(urlP,p)
				.then(function(json){
					// alert('agregar con exito');
					this.getPrestamo();
					// $('#add_p').modal('hide');
					this.salir();
				});
		},
		

		eliminarPrestamo:function(id){
			var res=confirm("se eliminara el prestamo?")
			if(res==true) {
				this.$http.delete(urlP + '/'+ id)
				.then(function(json) {
					this.getPrestamo();
				});
			}

		},
		editPrestamo:function(id){
			//crear json
			this.editando=true;
			this.$http.get(urlP + '/' + id)
			.then(function(json){
				this.prestamo=json.data.prestamo
				this.periodo_pago=json.data.periodo_pago
				this.interes=json.data.interes
				$('#add_p').modal('show');
			});

		},
		updatePrestamo:function(){
			//crear json
			var pr={
					prestamo:this.prestamo,
					periodo_pago:this.periodo_pago,
					interes:this.interes
				};

				this.$http.patch(urlP + '/'+ this.id_aux,pr)
				.then(function(json) {
					this.getPrestamo();
				});
				this.editando=false;
				$('#add_p').modal('hide');
				this.prestamo='';
				this.periodo_pago='';
				this.interes='';

		},
		salir:function(){
			this.editando=false;
			$('#add_p').modal('hide');
				this.prestamo='';
				this.periodo_pago='';
				this.interes='';
			
		}

	}
});