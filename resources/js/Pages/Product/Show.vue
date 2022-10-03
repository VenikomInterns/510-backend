<template>
    <div class="d-flex">
        <nav-bar/>
        <div class="container">
            <h1 class="h1 text-center mb-5">You opened this product</h1>
            <div class="justify-content-center d-flex">
                <div class="card" style="width: 18rem;">
                    <img :src="'/storage/'+product.image.substring(6)" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{product.name}}</h5>
                        <p class="card-text">{{product.description}}</p>
                        <button class="btn btn-danger">
                            <Link :href="route('products.destroy',product.id)" method="Delete">
                                Delete
                            </Link>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import NavBar from "../../Components/Nav-bar/NavBar.vue";
export default {
    name: "Show",
    components:{
        NavBar,
    },
    props:{
        product:Object,
    }
}
</script>

<style scoped>

</style>
