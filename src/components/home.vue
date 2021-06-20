<template>
    <div class="nav d-flex justify-content-center">
        <router-link class="btn btn-lg " to="/inscr">New user</router-link>
        <router-link class="btn BT btn-lg" to="/reference"> rendezvous</router-link>  
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.nav {
    min-height: 100vh;
    overflow-y: hidden;
    height: 100vh;
    background: linear-gradient(to bottom, #000428, #004683);
  }
  
  .btn{
    background-color: #1f5588;
    color:white;
    height: 50px;
    margin-top: 20%; 
}

 .BT{
    margin-left: 4%;
}
</style>