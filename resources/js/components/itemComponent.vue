<template>
    <div>
        <li class="pl-1 list-unstyled">
            <div class="wr-item">
                <a :href="path">
                    <img class="" :src="image" width="80px" height="80px"/>
                </a>
            </div>
        </li>
    </div>
</template>

<script>
    export default {
        name: "itemComponent",
        props: ['path','image'],

        mounted() {
            console.log(this.path)
            console.log(this.image)
        },
    }
</script>

<style scoped>

</style>
