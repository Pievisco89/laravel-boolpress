<template>
    <div class="mt-2">

      <h2>Blog</h2>

      <!-- loader -->
      <div 
        v-if="!loaded"
        class="text-center mt-4"
      >
        <Loader />
      </div>

      <!-- lista post -->
      <div v-if="loaded">

        <Card 
          v-for="post in posts"
          :key="'p'+post.id"
          :title="post.title"
          :category="post.category"
          :date="formatDate(post.date)"
          :slug="post.slug"    
        />

        <!-- pagination -->
        <nav 
          aria-label="Page navigation example"
        >
          <ul class="pagination">
            <li 
              :class="{'disabled': pagination.current === 1}"
              class="page-item"
            >
              <button 
                @click="getPost(pagination.current - 1)"
                class="page-link" href="#"
              >Previous</button>
            </li>
            <li 
              v-for="i in pagination.last"
              :key="'i' + i"
              :class="{'active' : pagination.current === i}"              
              class="page-item"
            >
              <button
                @click="getPost(i)" 
                class="page-link" href="#"
              > 
                {{i}} 
              </button>
            </li>
            
            <li 
              :class="{'disabled': pagination.current === pagination.last}"
              class="page-item"
            >
              <button 
                @click="getPost(pagination.current + 1)"
                class="page-link" href="#"
              >Next</button>
            </li>
          </ul>
        </nav>
      
      </div>

    </div>
</template>

<script>

  import axios from 'axios';
  import Loader from '../components/Loader.vue';
  import Card from '../components/Card.vue';
  

  export default {
    name: 'Blog',
    
    components: {
      Loader,
      Card
    },
  
  
    data(){
      return {
        posts: [],
        pagination: {},
        loaded: false
      }
    },
    methods:{
      getPost(page = 1){
        this.loaded = false;
        axios.get('http://127.0.0.1:8000/api/posts',{
          params: {
            page: page,
          }
        })
          .then(res => {
            //console.log(res.data.data);
            this.posts = res.data.data;
            this.pagination = {
              current: res.data.current_page,
              last: res.data.last_page,
            }
            this.loaded = true;
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