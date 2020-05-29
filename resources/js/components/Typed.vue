<template>
    <div class="typed-text mt-5">
        <vue-typed-js
            :strings="[
                'This is text ^1000 which gets paused for 1 second',
                'wow, interesting',
                'Why you can ^1000 trust BBC News'
            ]"
            :loop="true"
            :showCursor="false"
        >
            <h2 class="typing"></h2>
        </vue-typed-js>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.typing {
    color: whitesmoke;
    font-weight: 600;
    font-size: 3em;
    margin: 0 auto;
    background-color: #212125;
    padding: 10px 10px;
}
@media screen and (max-width: 380px) {
    .typed-text {
        display: none;
    }
}
</style>
