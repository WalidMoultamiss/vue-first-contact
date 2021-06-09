<template>
   <div>
     <h2> Filter LearnVue Articles </h2>
     <input 
      type='text' 
      placeholder='Filter Search' 
      v-model='query'
    />
    <br>
    <button @click='reset'> Reset </button>
    <search-results/>
   </div>
</template>


<script>
  import { ref } from 'vue'
  import SearchResults from './SearchResults.vue'
  export default {
    components: {
      SearchResults
    },
    // ...
  }
</script>