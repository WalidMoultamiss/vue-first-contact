
<template>
<div>
   <div>
     <h2> Filter LearnVue Articles </h2>
     <input 
      type='text' 
      placeholder='Filter Search' 
      v-model='query'
    />
    <p>
      {{ query }}
    </p>
   </div>
  <div>
    <button @click=reset>clear</button>
  </div>
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
</div>
</template>

<script>
import {ref } from 'vue'
import SearchResults from './SearchResults.vue'

export default{ setup (){
  components: {
      SearchResults
    }

      const query = ref('')

      const reset = (evt) => {
        query.value = '' 
      }

      return {
        query,
        reset
      }
    }
}

</script>

<style scoped>
a {
  color: #42b983;
}
</style>
