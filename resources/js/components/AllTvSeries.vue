<template>
    <div class="container-series">
        <h1>TV Series Currently Available</h1>
        <div v-for="(singleTvSeries, i) in tvSeries"  class="item">
            <div>Title: {{ singleTvSeries.title }}</div>
            <div>Author: {{ singleTvSeries.author }}</div>
            <router-link :to="{ name: 'edit', params: { id: singleTvSeries.id }}">
                <button class="edit-btn">Edit</button>
            </router-link>
            <button class="delete-btn" @click="deleteRecord(singleTvSeries.id)">Delete</button>
            <router-link :to="{ name: 'show', params: { id: singleTvSeries.id }}">
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
                tvSeries: ''
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.callToHome();
        },
        methods: {
            callToHome: async function() {
                try {

                    let response = await fetch('http://localhost:8000/api/tvseries');
                    let responseToJson = await response.json();
                    this.tvSeries = responseToJson.data;
                    
                } catch(err) {
                    console.log(err)
                }
            },
            deleteRecord: async function(id) {
                try {

                    let response = await fetch('http://localhost:8000/api/tvseries/delete/' + id);
                    let responseToJson = await response.json();
                    this.tvSeries = responseToJson.data;

                } catch(err) {
                    console.log(err);
                }
            }
        },
    }
</script>
