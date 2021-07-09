<template>
        <div class="card mb-3">

                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <span v-if="post.category" class="badge badge-success custom-badge">{{ post.category.name }}</span>
                    </div>
                    <i>{{ post.created_at }}</i>
                    <p class="card-text">{{ post.content }}</p>
                    <i
                    v-for="tag in post.tags"
                    :key="'t'+tag.id"
                    >
                    {{ tag.name }}
                    </i>
                    <router-link class="btn btn-primary" :to="{name: 'blog'}">Back</router-link>
                </div>

           </div>
</template>

<script>

import axios from 'axios';
/* import Error404 from './Error404.vue' */

export default {
    name: 'PageDetail',
    data(){
        return {
            post : {},
        }
    },
    mounted(){
        axios.get("localhost/8000/api/posts/"+this.$route.params.slug)
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

<style lang="scss" scoped>

i{
    display: inline-block;
    margin-right: 20px;
}

</style>
