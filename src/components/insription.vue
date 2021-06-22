<template>
  <div class="wrapper">
    
      <div class="h5 font-weight-bold text-center mb-3">inscription</div>
      <div class="form-group d-flex align-items-center">
        <input type="text" v-model="Reference" class="form-control" placeholder="Reference"/>
      </div>
      <div class="form-group d-flex align-items-center">
        <input type="text" v-model="Nom" class="form-control" placeholder="Nom"/>
      </div>
      <div class="form-group d-flex align-items-center">
        <input type="text" v-model="Prenom" class="form-control" placeholder="Prenom"/>
      </div>
      <div class="form-group d-flex align-items-center">
        <input type="number" v-model="Age" class="form-control" placeholder="Age"/>
      </div>
      <div class="form-group d-flex align-items-center">
        <input type="tel" v-model="Tele" class="form-control" placeholder="Phone"/>
      </div>
      <bouton class="btn btn-primary mb-3" v-on:click.prevent="inscription()">S'inscrire</bouton>
  
  </div>
</template>

<script>
export default {
  data() {
    return {
      Reference:"",
      Nom: "",
      Prenom: "",
      Age: "",
      Tele: "",
     
    };
  },
  methods: {
    inscription() {
      fetch("http://localhost/brief6/Client/create",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            Reference: this.Reference,
            Nom: this.Nom,
            Prenom: this.Prenom,
            Age: this.Age,
            Tele: this.Tele,
           
           
          }),
        }
          ).then(() => {
              this.$router.push("/Rendezvous/"+this.Reference);
          })
          .catch(function (err) {
           console.log(err);
          });
    },
  },
};
</script>

<style >
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
  overflow-y: hidden;
}

.wrapper {
  max-width: 450px;
  width: 50vw;
  height: 600px;
  margin: 0px auto;
  padding-top: 90px;
  padding-left: 40px;
  padding-right: 40px;
  background-color: #ffffff27;
  border-radius: 15px;
}

.wrapper .h5 {
  color: #ddd;
}

.wrapper .form-group {
  border-bottom: 1px solid #ccc;
  margin-bottom: 1.5rem;
}

.wrapper .form-group:hover {
  border-bottom: 1px solid #eee;
}

.wrapper .form-group .form-control {
  background: inherit;
  border: none;
  border-radius: 0px;
  box-shadow: none;
  color: #e9e9e9;
}

.wrapper .form-group input::-moz-placeholder {
  color: #ccc;
}

.wrapper .form-group input:-ms-input-placeholder {
  color: #ccc;
}

.wrapper .form-group input::placeholder {
  color: #ccc;
}

.wrapper .form-group input:focus::-moz-placeholder {
  opacity: 0;
}

.wrapper .form-group input:focus:-ms-input-placeholder {
  opacity: 0;
}

.wrapper .form-group input:focus::placeholder {
  opacity: 0;
}

.wrapper .option {
  color: #ccc;
  display: block;
  position: relative;
  padding-left: 25px;
  margin-bottom: 12px;
  cursor: pointer;
}

.wrapper .option:hover {
  color: #eee;
}

body {
  min-height: 100vh;
  background: linear-gradient(to bottom, #000428, #004683);
}

.wrapper .btn.btn-primary {
  position: relative;
  color: #eee;
  margin-left: 35%;
  height: 39px;
  width: 31%;
  margin-top: 10%;
  border-radius: 20px;
  border: 1px solid #ddd;
  background-color: inherit;
  box-shadow: none;
  overflow: hidden;
}

.wrapper .btn.btn-primary:hover {
  background-color: #b4b4b433;
  color: #fff;
}
</style>