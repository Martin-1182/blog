<template>
    <div v-if="show" class="preloader"></div>
</template>

<script>
export default {
    name: "preloader",
    data() {
        return {
            show: true
        };
    },
    mounted() {
        this.pageLoader();
    },
    methods: {
        pageLoader() {
            document.onreadystatechange = () => {
                if (document.readyState == "complete") {
                    this.show = false;
                } else {
                    this.show = true;
                }
            };
        }
    }
};
</script>

<style lang="scss" scoped>
.preloader {
    position: absolute;
    width: 100%;
    height: 100vh;
    top: 0;
    left: 0;
    background-color: #212125;
    z-index: 1000000;
    background-image: url("../../images/831.gif");
    background-position: center;
    background-repeat: no-repeat;
}
</style>
