<template>
    <div class="container-series">
        <div v-if="singlePost">
            <h2>Title: {{ singlePost.title }}</h2>
            <h3>Author: {{ singlePost.author }}</h3>
            <p>{{ singlePost.content }}</p>
            <h4>Category: {{ postCategory.name }}</h4>
            <h4>Rating: {{ singlePost.rating }}</h4>
            <h4>Release Date: {{ singlePost.release_date }}</h4>
        </div>
        <div v-else>
            Loading...
        </div>
    </div>

</template>

<script>

    import { getDetails } from "../utils";

    export default {
        data() {
            return {
                singlePost: '',
                postCategory: ''
            }
        },
        created() {
            this.showDetails();
        },
        methods: {
            showDetails: async function() {
                this.singlePost = await getDetails(this.$route.params.id);

                try {
                    let response = await fetch('http://localhost:8000/api/categories/' + this.singlePost.category_id);

                    if (response.ok) {
                        let responseToJson = await response.json();
                        this.postCategory = responseToJson.data;
                    }
                } catch(err) {
                    console.log(err);
                }
                
            }
        },
    }
</script>
