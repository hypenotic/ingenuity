<template></template>

<script>
    export default {
        created: function () {
            console.log("hello");
            this.$store.dispatch("getMenu", {'type': 'initial-load'});
            this.$store.dispatch("getPages", {'type': 'initial-load'});
            this.$store.dispatch("getProjects", {'type': 'initial-load'});
            this.$store.dispatch("getBlogPosts", {'type': 'initial-load'});
            this.$store.dispatch("getContacts", {'type': 'initial-load'});
            this.$store.dispatch("getServices", {'type': 'initial-load'});
            this.$store.dispatch("getTeam", {'type': 'initial-load'});
        }
    }
</script>
