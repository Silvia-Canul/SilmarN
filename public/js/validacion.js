const app = new Vue({
  el: '#app',
  data: {
    errors: [],
    matricula: null,
    nombre: null,
    calificacion: null
  },
  methods:{
    checkForm: function (e) {
      if (this.matricula && this.calificacion) {
        return true;
      }

      this.errors = [];

      if (!this.matricula) {
        this.errors.push('El nombre es obligatorio.');
      }
      if (!this.calificacion) {
        this.errors.push('La edad es obligatoria.');
      }

      e.preventDefault();
    }
  }
})