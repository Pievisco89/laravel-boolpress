<template>
    <div class="card mb-4">

      <div class="card-body">

        <div class="d-flex justify-content-between">
          <h5 class="card-title"> {{ title }} </h5>
          <span class="badge badge-info pv-badge">{{ category }}</span>
        </div>
        <i> {{ date }} </i>
        <p class="card-text mt-2">{{ content }}</p>
            <router-link :to="{name: 'pagedetail', params:{slug}}" class="card-link btn btn-success">Vedi il post</router-link>
            
      </div>

    </div>
</template>

<script>
export default {
  name: 'Card',
  props: [
    'title', 
    'category', 
    'date', 
    'content', 
    'slug'
  ]
}
</script>

<style>

</style>