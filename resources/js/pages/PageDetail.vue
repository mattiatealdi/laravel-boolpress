<template>
    <div>
        <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <span class="badge badge-success custom-badge">{{ post.category.name }}</span>
                    </div>
                    <i>{{ post.created_at }}</i>
                    <p class="card-text">{{ post.content }}</p>
                    <router-link class="btn btn-primary" :to="{name: 'blog'}">Back</router-link>
                </div>
            </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'PageDetail',
    data(){
        return {
            post : {},
        }
    },
    mounted(){
        axios.get("localhost/8000/api/posts/" + this.$route.params.slug)
        .then(res =>{
            if(res.data.success){
                this.post = res.data.data;
            }/* else{
                this.$router.push({name: 'error404'});
            } */
        })
        .catch(err => {
            console.log(err);
        })
    }
}
</script>

<style>

</style>
