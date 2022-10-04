<template>
    <div class="d-flex">
        <nav-bar/>
        <div class="container">
            <h1 class="text-center h1">
                Edit Product
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
                                    <option :value="product.category_id">{{categoryName}}</option>
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
        </div>{{categoryName}}
    </div>

</template>

<script>
import NavBar from "../../Components/Nav-bar/NavBar.vue";
import {useForm} from "@inertiajs/inertia-vue3";
export default {
    name: "Edit",
    components: {
        NavBar,
    },
    props: {
        product: Object,
        categoryName:String,
    },
    data() {
        return {
            message: '',
            boolean: false,
        }
    },

    setup(props) {
        //why not useForm(...props.product, ...{image:null, _method:PUT})
        const form = useForm({
            _method:"PUT",
            name: props.product.name,
            description: props.product.description,
            price: props.product.price,
            category_id: props.product.category_id,
            image: null,
        });
        const submit = ()=>
        {
            form.post(route("products.update", props.product));
        }
        const onFileSelected = (e) =>{
            const file = e.target.files[0];
            if(!file) return;
            form.image = file;
        }
        return {form, submit, onFileSelected};
    }
}
</script>

<style scoped>

</style>
