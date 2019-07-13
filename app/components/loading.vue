<template lang="html">
    <transition name="fade" v-if="loading">
        <div class="uk-container uk-container-expand loading-animation">
            <div class="ldr">
                <div class="ldr-blk"></div>
                <div class="ldr-blk an_delay"></div>
                <div class="ldr-blk an_delay"></div>
                <div class="ldr-blk"></div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        data: () => ({
            loading: false
        }),
        methods: {
            start () {
                this.loading = true
            },
            finish () {
                this.loading = false
            }
        }
    }
</script>