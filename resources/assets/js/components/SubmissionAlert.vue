<template>
  <b-alert :variant="classNames" dismissible :show="showDismissibleAlert" @dismissed="showDismissibleAlert=false" fade>
    {{ status.message }}
  </b-alert>
</template>

<script>
export default {
  name: "SubmissionAlert",
  props: ['status'],
  data() {
    return {
      showDismissibleAlert: true,
      classNames: 'secondary'
    }
  },
  watch: {
    status: function() {
      this.classNames = this.status.status === 'error' ? 'danger' : 'success'
      console.log(status.status);

      this.showDismissibleAlert = this.status.status === 'success' ?
      2 : true
    }
  },

}
</script>

<style lang="scss">
</style>
