<template>
    <div class="container-series">
        <h1>Update TV Series</h1>
        <div v-if="singleTvSeries">
            <form>
                <label for="title">Titolo</label><br>
                <input type="text" name="title" v-model="tvSeriesTitle"><br>
                <label for="author">Autore</label><br>
                <input type="text" name="author" v-model="tvSeriesAuthor"><br>
                <label for="release_date">Data di rilascio</label><br>
                <input type="date" name="release_date" v-model="tvSeriesReleaseDate"><br>
                <label for="rating">Rating</label>
                <input type="number" name="rating" min="1" max="5" v-model="tvSeriesRating">
                <input type="button" value="Submit" @click="updateTvSeries()">
            </form>
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
                singleTvSeries: {},
                urlToPost: "http://localhost:8000/api/tvseries/update/" + this.$route.params.id
            }
        },
        created() {
            this.showSeriesDetails();
        },
        computed: {
            tvSeriesTitle: {
                get() {
                    return this.singleTvSeries.title;
                },
                set(value) {
                    if (value) {
                        this.singleTvSeries.title = value;
                        return this.singleTvSeries.title;
                    }

                    return this.singleTvSeries.title;
                }
            },
            tvSeriesAuthor: {
                get() {
                    return this.singleTvSeries.author;
                },
                set(value) {
                    if (value) {
                        this.singleTvSeries.author = value;
                        return this.singleTvSeries.author;
                    }

                    return this.singleTvSeries.author;
                }
            },
            tvSeriesRating: {
                get() {
                    return this.singleTvSeries.rating;
                },
                set(value) {
                    if (value) {
                        this.singleTvSeries.rating = value;
                        return this.singleTvSeries.rating;
                    }

                    return this.singleTvSeries.rating;
                }
            },
            tvSeriesReleaseDate: {
                get() {
                    return this.singleTvSeries.release_date;
                },
                set(value) {
                    if (value) {
                        this.singleTvSeries.release_date = value;
                        return this.singleTvSeries.release_date;
                    }

                    return this.singleTvSeries.release_date;
                }
            }
        },
        methods: {
            showSeriesDetails: async function() {
                this.singleTvSeries = await getSeriesDetails(this.$route.params.id);
                console.log(this.singleTvSeries);
            },
            updateTvSeries: async function() {

                let data = JSON.stringify({
                    title: this.tvSeriesTitle,
                    author: this.tvSeriesAuthor,
                    release_date: this.tvSeriesReleaseDate,
                    rating: this.tvSeriesRating
                });

                try {

                    let response = await fetch(this.urlToPost, {
                        method: 'POST',
                        headers: {
                        'Content-Type': 'application/json'
                        },
                        body: data
                    });

                    if (response.ok) {
                        this.$router.push({ name: 'tvseries' });
                    }

                } catch(err) {
                    console.log(err);
                }
            }
        }
    }
</script>
