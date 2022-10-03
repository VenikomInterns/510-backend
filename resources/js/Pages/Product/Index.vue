<template>
    <div class="flex">
        <nav-bar/>
        <div class="container">
            <div class="container mt-2">
                <h1 class="h1 text-center">Products</h1>
                <div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-primary">
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Open
                                </th>
                                <th>
                                    Edit
                                </th>
                                <th>
                                    Delete
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="product in products" :key="product.id">
                                <td class="pt-3">
                                    {{ product.id }}
                                </td>
                                <td class="pt-3 ">
                                    {{ product.name }}
                                </td>
                                <td class="pt-3 ">
                                    {{ product.description }}
                                </td>
                                <td class="pt-3 ">
                                    {{ product.price }}
                                </td>
                                <td class="pt-3 ">
                                    <img height="200" :src="'storage'+product.image.substring(6)">
                                </td>
                                <td>
                                    <button class="btn btn-success">
                                        <Link :href="route('products.show',product.id)">
                                            Open
                                        </Link>
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-primary">
                                        <Link :href="route('products.edit',product.id)">
                                            Edit
                                        </Link>

                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-danger">
                                        <Link :href="route('products.destroy',product.id)" method="Delete">
                                            Delete
                                        </Link>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import NavBar from "../../Components/Nav-bar/NavBar.vue";

export default {
    name: "Index",
    components: {
        NavBar,
    },
    props: {
        products: Array,
    }
}
</script>

<style scoped>

</style>
