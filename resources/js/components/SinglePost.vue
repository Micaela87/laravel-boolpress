<template>
    <div class="container-series">
        <div v-if="singleTvSeries">
            <h2>Title: {{ singleTvSeries.title }}</h2>
            <h3>Author: {{ singleTvSeries.author }}</h3>
            <h4>Rating: {{ singleTvSeries.rating }}</h4>
            <h4>Release Date: {{ singleTvSeries.release_date }}</h4>
        </div>
        <div v-else>
            Loading...
        </div>
    </div>

</template>

<script>

    import { getSeriesDetails } from "../utils";

    export default {
        data() {
            return {
                singleTvSeries: ''
            }
        },
        created() {
            this.showSeriesDetails();
        },
        methods: {
            showSeriesDetails: async function() {
                this.singleTvSeries = await getSeriesDetails(this.$route.params.id);
            }
        },
    }
</script>
