<template>
    <div class="container-series">
        <div v-if="singlePost">
            <h2>Title: {{ singlePost.title }}</h2>
            <h3>Author: {{ singlePost.author }}</h3>
            <p>{{ singlePost.content }}</p>
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
                singlePost: ''
            }
        },
        created() {
            this.showDetails();
        },
        methods: {
            showDetails: async function() {
                this.singlePost = await getDetails(this.$route.params.id);
            }
        },
    }
</script>
