<template>
<div class="flex">
    <nav-bar/>
    <div class="container">
        <h1 class="h1 text-center">
            Edit
        </h1>
        <div class="px-4">
            <form @submit.prevent="submit">
                <div class="row">
                    <div class="col-12 col-md-5 mb-3">
                        <label class="form-label" for="name">Name: </label>
                        <input class="form-control" id='name' type="text" v-model="form.name">
                    </div>
                </div>
                <button class="btn btn-primary">Submit</button>
                <div :class="[boolean ? 'text-success' : 'text-danger']">{{this.message}}</div>
            </form>
        </div>
    </div>
</div>
</template>

<script>
import NavBar from "../../Components/Nav-bar/NavBar.vue";
export default {
    name: "Edit",
    components:{
        NavBar,
    },
    props:{
      category:Object,
    },
    data(){
        return{
            form: this.$inertia.form({
                name:this.category.name
            }),
            message:'',
            boolean:false,
        }
    },
    methods:{
        submit(){
            // its much better to use form helper method .post. For ex. this.form.post(route('categories.store')
            this.$inertia.put(route('categories.update',this.category),this.form,{
                onSuccess:()=>{
                    this.message="Edited successfully"
                    this.boolean=true
                },
                onError:()=>{
                    this.message="There was an error"
                    this.boolean=false
                }
            })
        }
    }
}
</script>

<style scoped>

</style>
