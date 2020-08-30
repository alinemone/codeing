<template>
    <div class="col-md-12 p-0">
        <form class="d-flex" action="/search" method="get">
            <input class="form-control pt-4 pb-4 search-input" name="search" type="text" placeholder="مثلا : وردپرس" v-model="query">
            <button class="btn text-muted text-left btn-search" type="submit" :disabled="isDisable(query)">
                <i class="fas fa-search"></i>
            </button>
        </form>
       <div class=" position-absolute w-100 bg-white z-index-2">
           <ul class="list-unstyled rounded-bottom m-0 overflow-y-scroll max-height-search" v-if="results.length > 0 && query">
               <li v-for="result in results.slice(0,10)" :key="result.id">
                   <a class="d-flex align-items-center pb-2 pt-2 pr-3 border-bottom" :href="result.url">
                     <img :src="result.image" class="rounded" height="50">
                       <div class="text-right pr-3">
                             <span class="mt-0 mb-1 text-dark" v-text="result.title"></span>
                       </div>
                   </a>
               </li>

           </ul>
       </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                query: "",
                results: []
            };
        },

        watch: {
            query(after, before) {
                this.searchMembers();
            }
        },
        methods: {
            searchMembers() {
                axios.get('products/search', { params: { query: this.query } })
                    .then(response => this.results = response.data)
                    .catch(error => {});
            },
            isDisable(text) {
                return text.length < 3;
            }
        }

    }
</script>
