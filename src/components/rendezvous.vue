<template>
<div class="general">
  <div class="container mt-4">
        <h2 class="text-center">Rendez-vous</h2>
        <p> Reference :{{ $route.params.reference }}</p>
        <router-link to="/" tag="button" class="btn btn-sm btn-primary mr-2 mb-2" name="submit"> 
                        <i class="material-icons">home</i>
                    </router-link>
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
                <template v-if="idrdv== result.Id">
                  <td>{{result.Id}}</td>
                    <td><input v-model="DateConsult" type="date"></td>
                    <td>
                        <select class="form-select input"  v-model="editClient.Horaire">
                        <option></option>
                        <option v-for="Horaire in Horaires" :key="Horaire.value" :disabled="Horaire.etat">{{Horaire.value}}</option>
                        </select>
                    </td>
                    <td><input v-model="editClient.TypeConsult" type="text"></td>
                    <td><button class="btn btn-success btn-sm" @click="save();" ><i class="material-icons">save</i></button>&nbsp;
                    <button class="btn btn-success btn-sm" @click="cancel();"><i class="material-icons">cancel </i></button>
                    </td>
                </template>

              <template v-else>
                <td>{{result.Id}}</td>
                <td>{{result.DateConsult}}</td>
                <td>{{result.Horaire}}</td>
                <td>{{result.TypeConsult}}</td>
                <td><button class="btn btn-success btn-sm" v-on:click="getid(result.Id);del()"><i class="material-icons">delete </i> </button> &nbsp;
                <button class="btn btn-success btn-sm" v-on:click="edit(result.Id)"> <i class="material-icons">edit</i> </button></td>
              </template>
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
    idrdv:'',
    HorairesAPI:[],
    Horaires:[
      {
        value:"8-10",
        etat:false
      },
      {
        value:"10-12",
        etat:false
      },
        {
        value:"14-16",
        etat:false
      },
      {
        value:"16-18",
        etat:false
      }
    ],

    ref:this.$route.params.reference,
    DateConsult: '',
    editClient:{
        Id:'',
        DateConsult:'',
        Horaire:'',
        TypeConsult:''
    }

    }
  },
  mounted(){
  this.getAll();
},
methods:{
  async getHoraire(DateCon){
    console.log("im in geth");
   await fetch("http://localhost/brief6/Rendezvous/selectHorai/"+DateCon)
         .then(res => res.json())
         .then(data => this.HorairesAPI = data)
         .catch(err =>console.log(err.message))
    },
  
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

  //update un rendezvous :
   async edit(x){
        await fetch("http://localhost/brief6/Rendezvous/select/"+x)
        .then(response => response.json())
        .then(data =>{
           
            this.editClient.Id=data[0].Id;
            this.editClient.DateConsult=data[0].DateConsult;
            this.DateConsult=data[0].DateConsult;
            this.editClient.Horaire=data[0].Horaire;
            this.editClient.TypeConsult=data[0].TypeConsult;
            this.idrdv=data[0].Id;
            this.filerD();
        })
      
    },

    //save update rendezvous :
      async save(){
        console.log(JSON.stringify(this.editClient));
       await fetch('http://localhost/brief6/Rendezvous/saveupdate',{
            method: 'PUT',
            headers:{
                'Content-Type': 'application/json',
            },
           body: JSON.stringify({
                    Id : this.editClient.Id,
                    DateConsult: this.editClient.DateConsult,
                    Horaire: this.editClient.Horaire,
                    TypeConsult: this.editClient.TypeConsult,
                 
            })
        });
      

       await this.getAll();
         this.idrdv='';
          this.editClient.Id='';
          this.editClient.DateConsult='';
          this.editClient.Horaire='';
          this.editClient.TypeConsult='';
       },


  // annuler :
  cancel(){
          this.idrdv='';
          this.editClient.Id='';
          this.editClient.DateConsult='';
          this.editClient.Horaire='';
          this.editClient.TypeConsult='';
    },
    async filerD(){
       for (let i = 0; i < this.Horaires.length; i++) {
         this.Horaires[i].etat=false;
          for (let j = 0; j < this.HorairesAPI.length; j++) {
            if(this.Horaires[i].value == this.HorairesAPI[j].Horaire ){
              this.Horaires[i].etat=true;
            }        
      }
    }},
  },
  watch :{
    DateConsult : async function(val){
      await this.getHoraire(val);
      this.editClient.DateConsult=val;
      this.filerD();        
      }
      
    
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