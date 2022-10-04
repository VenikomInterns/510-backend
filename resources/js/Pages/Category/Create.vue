<template>
    <div class="d-flex">
        <nav-bar/>
        <div class="container">
            <h1 class="text-center h1">
                Create Category
            </h1>

            <form>
                <div class="row">
                    <form @submit.prevent="submit">
                        <div class="row">
                            <div class="col-12 col-md-4 mb-3">
                                <label class="form-label" for="name">Name: </label>
                                <input class="form-control" id='name' type="text" v-model="form.name">
                            </div>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                        <div :class="[boolean ? 'text-success' : 'text-danger' ]">{{ this.message }}</div>
                    </form>
                </div>
            </form>
        </div>
    </div>

</template>

<script>
import NavBar from "../../Components/Nav-bar/NavBar.vue";

export default {
    name: "Create",
    components: {
        NavBar,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: ''
            }),
            message: '',
            boolean:false,
        }
    },
    methods: {
        submit() {
            // its much better to use form helper method .post. For ex. this.form.post(route('categories.store'))
            this.$inertia.post(route('categories.store'), this.form, {
                onSuccess: () => {
                    this.message = "Created category successfully"
                    this.boolean=true
                    this.form.reset()
                },
                onError: () => {
                    this.boolean=false
                    this.message = "Category was not created"
                }
            })
        }
    }

}
</script>

<style scoped>

</style>
