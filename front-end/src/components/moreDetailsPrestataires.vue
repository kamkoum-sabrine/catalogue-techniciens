<template>
  <div>More details</div>
</template>
<script>
export default {
  name: "moreDetailsPrestataire",
  data: () => ({}),
  created() {
    console.log(this.$route.params.id);
  },
};
</script>
