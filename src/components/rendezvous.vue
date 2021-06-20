<template>
<div class="general">
  <div class="container mt-4">
        <h2 class="text-center">Rendez-vous</h2>
        <p> Reference :{{ $route.params.reference }}</p>
      <router-link class="btn btn-primary float-end mb-4" :to="{path: '/addrendezvous/' + $route.params.reference }"> + Ajouter Rendez-vous</router-link>
        <div class="row col-md-12 col-md-offset-2 custyle">
          <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Date</th>
                    <th>Horaire</th>
                    <th>Type de consultation</th>
                    <th class="text-center">Action</th>
                </tr>
           </thead>
           
           <tbody>
              <tr v-for="result in results" :key="result.Id">
                <th scope="row">{{result.Id}}</th>
                <td>{{result.DateConsult}}</td>
                <td>{{result.Horaire}}</td>
                <td>{{result.TypeConsult}}</td>
               
                <td><button class="btn btn-success btn-sm" v-on:click="getid(result.Id);del()"><i class="material-icons">delete </i> </button> &nbsp;
                <button class="btn btn-success btn-sm"  v-on:click="updaterendezvous(result.Id)"> <i class="material-icons">edit</i> </button></td>
              </tr>  
          </tbody>
        </table>
        </div>
    </div>
 </div> 
</template>

<script>
export default {
  name:'Rendezvous',
  data(){
    return {
      results :[],
      idR :'',
      ref:this.$route.params.reference

    }
  },
  mounted(){
  this.getAll();
},
methods:{
  //affichage rendezvous par reference:
  getAll(){
      fetch("http://localhost/brief6/Rendezvous/readRefe/"+this.ref)
         .then(res => res.json())
         .then(data => this.results = data)
         .catch(err =>console.log(err.message))
    },

  //prendre id pour deleter un rendezvous :
  getid(x){
    this.idR=x;
    console.log(this.idR);
  },

//supprimer un rendezvous:
  del(){
  fetch("http://localhost/brief6/Rendezvous/delete/"+this.idR,{
    method :"DELETE",
  })
  .then(this.getAll())

  },

  updaterendezvous(Id){
  this.$router.push("/updaterendezvous/"+Id);

  }

//update un rendezvous :



  }
}


</script>


<style scoped>
.general{
 overflow-y: hidden;
 background: linear-gradient(to bottom, #000428, #004683);
 height: 100vh;
}
 
h2{
    color:white;
}

th{
    color:white;
}

td{
    color:white;
}
.btn{
  background-color: #1f5588;
}

.btn:hover{
    background-color: white;
    color:#1f5588;
}
p{
    color:white;
}
</style>