<template>
    <div class="flex">
        <nav-bar/>
        <div class="container">
            <div class="container mt-2">
                <h1 class="h1 text-center">Categories</h1>
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
                            <tr v-for="category in categories" :key="category.id">
                                <td class="pt-3">
                                    {{ category.id }}
                                </td>
                                <td class="pt-3 ">
                                    {{ category.name }}
                                </td>
                                <td>
                                    <button class="btn btn-success">
                                        <Link :href="route('categories.show',category.id)">
                                            Open
                                        </Link>

                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-primary">
                                        <Link :href="route('categories.edit',category.id)">
                                            Edit
                                        </Link>

                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-danger">
                                        <Link :href="route('categories.destroy',category.id)" method="Delete">
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
        categories: Array,
    }
}
</script>

<style scoped>

</style>
