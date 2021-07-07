<template>
    <div class="container">
        <Header />
        <main class="container">
            <h1>I nostri Posts</h1>
            <article class="mb-2" v-for="post in posts" :key="post.id">
                <h3>{{ post.title }}</h3>
                <h6>{{ post.category }}</h6>
                <h5>{{ formatDate(post.date) }}</h5>
            </article>
            <div>
                    <button class="badge badge-primary">prev</button>
                    <button class="badge badge-primary">next</button>
                </div>
        </main>
    </div>
</template>

<script>

import Header from './components/Header.vue'
import axios from 'axios';

export default {
    name: 'App',
    components:{
         Header,
    },
    data(){
        return {
            posts : [],
            pagination : {}
        }
    },
    methods: {
        getPosts(){
            axios.get('http://localhost:8000/api/posts')
                .then(res => {
                    this.posts = res.data.data;
                    this.pagination = {
                        current: res.data.current_page,
                        last : res.data.last_page
                    }
                })
                .catch(err => {
                    console.log(err);
                })
        },
        formatDate(date){
            let d = new Date(date);
            let dy = d.getDate();
            let m = d.getMonth();
            let y = d.getFullYear();
            return `${dy}/${m}/${y}`;
        }
    },
    created(){
        this.getPosts();
    }
}
</script>

<style lang="scss">

    @import '../sass/frontoffice/_global.scss';


</style>
