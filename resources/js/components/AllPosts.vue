<template>
    <div class="container-series">
        <h1>TV Series Currently Available</h1>
        <div v-for="(post, i) in posts"  class="item">
            <div>Title: {{ post.title }}</div>
            <div>Author: {{ post.author }}</div>
            <router-link :to="{ name: 'edit', params: { id: post.id }}">
                <button class="edit-btn">Edit</button>
            </router-link>
            <button class="delete-btn" @click="deleteRecord(post.id)">Delete</button>
            <router-link :to="{ name: 'show', params: { id: post.id }}">
                <button class="details-btn">More Details</button>
            </router-link>
        </div>
        <router-link :to="{ name: 'add'}">
            <button class="add-btn">Add new TV Series</button>
        </router-link>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: ''
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.callToHome();
        },
        methods: {
            callToHome: async function() {
                try {

                    let response = await fetch('http://localhost:8000/api/posts');
                    let responseToJson = await response.json();
                    this.posts = responseToJson.data;
                    
                } catch(err) {
                    console.log(err)
                }
            },
            deleteRecord: async function(id) {
                try {

                    let response = await fetch('http://localhost:8000/api/posts/delete/' + id);
                    let responseToJson = await response.json();
                    this.posts = responseToJson.data;

                } catch(err) {
                    console.log(err);
                }
            }
        },
    }
</script>
