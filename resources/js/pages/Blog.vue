<template>
    <div class="mt-2">

      <h2>Blog</h2>

      <div>

        <div 
          v-for="post in posts"
          :key="'p'+post.id"
          class="card mb-4"
        >
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h5 class="card-title"> {{ post.title }} </h5>
              <span class="badge badge-info pv-badge">{{ post.category }}</span>
            </div>
            <i> {{ formatDate(post.date) }} </i>
            <p class="card-text mt-2">{{ post.content }}</p>
            <a href="#" class="card-link">Vai</a>
            
          </div>
        </div>

        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>
      
      </div>

    </div>
</template>

<script>

  import axios from 'axios';

  export default {
    name: 'Blog',
    data(){
      return {
        posts: []
      }
    },
    methods:{
      getPost(){
        axios.get('http://127.0.0.1:8000/api/posts')
          .then(res => {
            console.log(res.data.data);
            this.posts = res.data.data;
          })
          .catch(err => {
            console.log(err);
          })
      },

      formatDate(date){
        let d = new Date(date);
        let day = d.getDate();
        let month = d.getMonth() + 1;
        let year = d.getFullYear();
        if(day < 10) day = '0' + day;
        if(month < 10) month = '0' + month;

        return `${day}/${month}/${year}`
        
      }

    },
    created(){
      this.getPost();
    }
  }
</script>

<style lang="scss">
  .pv-badge{
    display: inline-block;
    height: 2rem;
    line-height: 1.5rem;
  }
</style>