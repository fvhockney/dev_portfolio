<template>
  <b-alert :variant="classNames" dismissible :show="showDismissibleAlert" @dismissed="showDismissibleAlert=false">
    {{ status.message }}
  </b-alert>
</template>

<script>
export default {
  name: "SubmissionAlert",
  props: ['status'],
  data() {
    return {
      showDismissibleAlert: true
    }
  },
  computed: {
    classNames() {
      return status.status === 'error' ?
       'danger' : status.status === 'sending' ?
       'info' :
       'success'
    }
  },
}
</script>

<style lang="scss">
</style>
