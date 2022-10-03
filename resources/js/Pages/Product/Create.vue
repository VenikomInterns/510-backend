<template>
    <div class="d-flex">
        <NavBar/>
        <div class="container">
            <h1 class="text-center h1">
                Create Product
            </h1>

            <form class="container">
                <div class="row">
                    <form @submit.prevent="submit">
                        <div class="row">
                            <div class="col-12 col-md-5 mb-3">
                                <label class="form-label" for="name">Name: </label>
                                <input class="form-control" id='name' type="text" v-model="form.name">
                            </div>

                            <div class="col-12 col-md-5 mb-3">
                                <label class="form-label" for="description">Description: </label>
                                <input class="form-control" id='description' type="text" v-model="form.description">
                            </div>

                            <div class="col-12 col-md-5 mb-3">
                                <label class="form-label" for="price">Price: </label>
                                <input class="form-control" id='price' type="number" v-model="form.price"/>
                            </div>
                            <div class="col-12 col-md-5 mb-3">
                                <label class="form-label" for="category">Category: </label>
                                <select class="form-select" id="category" v-model="form.category_id">
                                    <option v-for="category in categories"  :value="category.id">{{category.name}}</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-5 mb-3">
                                <label class="form-label" for="image">Image: </label>
                                <input
                                    name="image"
                                    id="image"
                                    type="file"
                                    ref="photo"
                                    @change="onFileSelected"/>
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
    props: {
        categories: Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                description: '',
                price: '',
                image: '',
                category_id: '',
            }),
            message: '',
            boolean: false,
        }
    },
    methods: {
        onFileSelected(e){
            this.form.image = e.target.files[0];
        },
        submit() {
            this.$inertia.post(route('products.store'), this.form, {
                onSuccess: () => {
                    this.message = "Created product successfully"
                    this.boolean = true
                    this.form.reset()
                },
                onError: () => {
                    this.boolean = false
                    this.message = "Product was not created"
                }
            })
        }
    }

}
</script>

<style scoped>

</style>
