<template>
    <div class="d-flex">
        <nav-bar/>
        <div class="container">
            <h1 class="h1 text-center">You open this category</h1>
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
                            Edit
                        </th>
                        <th>
                            Delete
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="pt-3">
                            {{ category.id }}
                        </td>
                        <td class="pt-3">
                            {{ category.name }}
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

</template>

<script>
import NavBar from "../../Components/Nav-bar/NavBar.vue";

export default {
    name: "Show",
    props: {
        category: Object,
    },
    components: {
        NavBar,
    }
}
</script>

<style scoped>

</style>
