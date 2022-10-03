<template>

    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 1000px;">
        <a href="/categories" class="d-flex align-items-center mb-3 mb-md-4 pt-3 ps-3 me-md-auto text-white text-decoration-none">

            <span class="fs-4">Categories</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="/categories" class="nav-link active py-3" aria-current="page">

                    Categories
                </a>
            </li>
            <li>
                <a href="/categories/create" class="nav-link text-white py-3">


                        Create category

                </a>
            </li>
            <li>
                <a href="/products" class="nav-link text-white py-3">

                   Products
                </a>
            </li>
            <li>
                <a href="/products/create" class="nav-link text-white py-3">

                    Create product
                </a>
            </li>
        </ul>
        <hr>

    </div>
</template>

<script>
export default {
    name: "NavBar",
}
</script>

<style scoped>

</style>
