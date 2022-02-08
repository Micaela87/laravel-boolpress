<template>
    <div class="container-series">
        <h1>Update TV Series</h1>
        <form>
            <label for="title">Titolo</label><br>
            <input type="text" name="title" v-model="postTitle"><br>
            <label for="author">Autore</label><br>
            <input type="text" name="author" v-model="postAuthor"><br>
            <textarea name="content" cols="30" rows="10" v-model="postContent"></textarea>
            <label for="release_date">Data di rilascio</label><br>
            <input type="date" name="release_date" v-model="postReleaseDate"><br>
            <label for="rating">Rating</label>
            <input type="number" name="rating" min="1" max="5" v-model="postRating">
            <input type="button" value="Submit" @click="updatePost()">
        </form>
    </div>
</template>

<script>
    import { getDetails } from "../utils";

    export default {
        data() {
            return {
                singlePost: {},
                urlToPost: "http://localhost:8000/api/posts/update/" + this.$route.params.id
            }
        },
        created() {
            this.showDetails();
        },
        computed: {
            postTitle: {
                get() {
                    return this.singlePost.title;
                },
                set(value) {
                    if (value) {
                        this.singlePost.title = value;
                        return this.singlePost.title;
                    }

                    return this.singlePost.title;
                }
            },
            postAuthor: {
                get() {
                    return this.singlePost.author;
                },
                set(value) {
                    if (value) {
                        this.singlePost.author = value;
                        return this.singlePost.author;
                    }

                    return this.singlePost.author;
                }
            },
            postContent: {
                get() {
                    return this.singlePost.content;
                },
                set(value) {
                    if (value) {
                        this.singlePost.content = value;
                        return this.singlePost.content;
                    }

                    return this.singlePost.content;
                }
            },
            postRating: {
                get() {
                    return this.singlePost.rating;
                },
                set(value) {
                    if (value) {
                        this.singlePost.rating = value;
                        return this.singlePost.rating;
                    }

                    return this.singlePost.rating;
                }
            },
            postReleaseDate: {
                get() {
                    return this.singlePost.release_date;
                },
                set(value) {
                    if (value) {
                        this.singlePost.release_date = value;
                        return this.singlePost.release_date;
                    }

                    return this.singlePost.release_date;
                }
            }
        },
        methods: {
            showDetails: async function() {
                this.singlePost = await getDetails(this.$route.params.id);
                console.log(this.singlePost);
            },
            updatePost: async function() {

                let data = JSON.stringify({
                    title: this.postTitle,
                    author: this.postAuthor,
                    content: this.postContent,
                    release_date: this.postReleaseDate,
                    rating: this.postRating
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
                        this.$router.push({ name: 'posts' });
                    }

                } catch(err) {
                    console.log(err);
                }
            }
        }
    }
</script>
