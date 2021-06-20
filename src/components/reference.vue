<template>
 <div class="group">
       <div class="container">
        <form action="">
        <div class="form-group mb-3 col-10 ms-5 pt-2">
            <label for="from-label">Reference :</label>
            <input type="text" v-model="reference" class="form-control">
        </div>
        <div class="mb-3 col-10 ms-5 justify-content-center">
        <button class="btn"  type="submit" v-on:click.prevent="onsub">Login</button>
            
        </div>
    </form>
    </div> 

 </div>

</template>


<script>
export default {
	name:'reference',
    data(){
        return{
        reference:''
        }
    },
    methods: {
        onsub(){
            // this.$router.push("/Rendezvous/"+this.reference);
           fetch("http://localhost/brief6/Client/ClientReference/"+this.reference,
        {
          method: "GET",
          headers: {
            "Content-Type": "application/json",
          },
        }
      )
        .then((res) => {
          return res.json();
        })
        .then((res) => {
            if(res==1){
                this.$router.push("/rendezvous/"+this.reference);
            }else{
                alert('Reference incorrecte');
            }
        console.log(res);
        })
        .catch((err) => {
          console.log(err);
        }); 
        }
    },
}


</script>


<style scoped>

 .group{
    background: linear-gradient(to bottom, #000428, #004683);
    min-height: 100vh;
    overflow-y: hidden;
    height: 100vh;
  }

  .container{
    width: 50%;
    height: 31%;
    margin-left: 25%;
    margin-bottom: 10%;
    border-radius: 20px;
    background-color: #004683;
    color: white;
    margin-top: 15%;
  
}
    
.btn{
    background-color: white;
    color:#000428;
    margin-left:40%;
    margin-top: 5%;
    width: 30%;
}

</style>