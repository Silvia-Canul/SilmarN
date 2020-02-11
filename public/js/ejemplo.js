// creamos un objeto vue
new Vue({
	// define el area donde va actuar veu
	el:'#ejemplo',

	// definimos dos puntos de datos
	data:{
		primero:0,
		segundo:0,
		nombre:'universidad tecnologica',
		autos:[
		{placa:'abced', modelo:'march',fabricante:'nissan',precio:158000},
		{placa:'bdcd', modelo:'pointer',fabricante:'vw',precio:158000},
		{placa:'EDF789', modelo:'camey',fabricante:'toyota',precio:158000},
		{placa:'EDF790', modelo:'corola',fabricante:'toyota',precio:38000},
		{placa:'EDF791', modelo:'yaris',fabricante:'toyota',precio:28000},
		],

		fabricantes:['VW','TOYOTA','BMW','NISSAN','MASDA','MERCEDES BENZ'],
		placa:'',
		modelo:'',
		fabricante:'',
		precio:0

	},

	//se definen los metodos
	methods:{
		sumar:function(){
			var suma=0;
			suma=this.primero + this.segundo;
			alert(suma);
		},
		restar:function(){
			var restar=0;
			restar=this.primero - this.segundo;
			alert(restar);
		},
		guardarAuto:function(){
			var unAuto={placa:this.placa,
				modelo:this.modelo,
				fabricante:this.fabricante,
				precio:this.precio}

		if (this.placa!='' && this.modelo!='') 
		{
		this.autos.push(unAuto);
		this.limpiar();
		}
		else
			alert('DATOS INSUFICIENTES');
	
		},

		limpiar:function(){
			this.placa='';
			this.modelo='';
			this.fabricante='';
			this.precio='';
		}
	},
	// fin de los metodos
	// SECCION DE VALORES AUTOCALCULADOS
	computed:{

	}
});