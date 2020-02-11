var route =document.querySelector("[name=route]").value;

var urlvendedor = 'http://localhost/DemoSari/public/apiVendedor'
var urlrutas = 'http://localhost/DemoSari/public/getRutas/';
new Vue({
	el:'#cascada',

	data:{
		nombre:'Hola',
		vendedores:[],
		rutas:[],
		id_vendedor:''
	},

	created:function(){
		this.getVendedores();
	},

	methods:{
		getVendedores:function(){
			this.$http.get(urlvendedor)
			.then(function(json){
				// console.log(json);
				this.vendedores=json.data;
			})
		},
		getRutas(event){
			var id = event.target.value;

			this.$http.get(urlrutas + id)
			.then(function(json){
				// console.log(json);
				this.rutas=json.data;
			});

			
		}
	}
})