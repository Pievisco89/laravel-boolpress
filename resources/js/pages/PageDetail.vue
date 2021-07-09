<template>
  
  <div class="card mb-4">

    <div 
      class="text-center p-5"
      v-if="!loaded"
    >
      <Loader />
    </div>

    <div v-else class="card-body">

      <div class="d-flex justify-content-between">
        <h5 class="card-title"> {{ post.title }} </h5>
        <span 
          v-if="post.category"
          class="badge badge-info pv-badge"
        >
          {{ post.category.name }}
        </span>
      </div>
      <i> {{ formatDate(post.created_at) }} </i>
      <p class="card-text mt-2">{{ post.content }}</p>
      <div>
        <i
          v-for="tag in post.tags"
          :key="'t'+ tag.id"
          class="badge badge-primary mb-2 mr-2"
        >
          {{tag.name}}
        </i>
      </div>
      <router-link :to="{name: 'blog'}" class="card-link btn btn-success">Torna indietro</router-link>
            
    </div>

  </div>

</template>

<script>

  import axios from 'axios';
  import Loader from '../components/Loader.vue';

  export default {
    name: 'PageDetail',
    components: {
      Loader
    },
    data(){
      return{
        post: {},
        loaded: false
      }
    },
          
    mounted(){
      //console.log(this.$route.params.slug);
      axios.get('http://127.0.0.1:8000/api/posts/' + this.$route.params.slug)
        .then(res =>{
          //console.log(res.data);
          if(res.data.success){
            this.post = res.data.data
          }else{
            this.$router.push({name: 'error404'})
          }
          this.loaded = true;
        })
        .catch(err =>{
          console.log(err);
        })
    },

    methods:{

      formatDate(date){
        let d = new Date(date);
        let day = d.getDate();
        let month = d.getMonth() + 1;
        let year = d.getFullYear();
        if(day < 10) day = '0' + day;
        if(month < 10) month = '0' + month;

        return `${day}/${month}/${year}`
        
      }
    }

  }
</script>

<style>

</style>