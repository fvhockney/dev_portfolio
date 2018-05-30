<template>
<div id="content-container" class="text-light mb-5">
  <b-container>
    <b-row>
      <b-col md>
        <div key="form-text" class="mb-4 mb-md-0">
          <h4>
            If you have made it this far, take a second to send me a message! I would particularly love to hear from you if you want to
          </h4>
          <ul>
            <li class="h5">Network</li>
            <li class="h5">Discuss a job</li>
            <li class="h5">Discuss a project</li>
            <li class="h5">Hire me for a project</li>
            <li class="h5">Just say HI!</li>
          </ul>
        </div>
      </b-col>
      <b-col md>
        <submission-alert v-if="this.status" :status="this.status"></submission-alert>
        <b-form key="form" @submit="onSubmit" novalidate>
          <b-form-group id="nameGroup" label="Name" label-for="nameInput">
            <b-form-input id="nameInput" type="text" v-model="form.name" placeholder="Enter Name"></b-form-input>
          </b-form-group>
          <b-form-group id="emailGroup" label="Email" label-for="emailInput" description="Your email will never be shared">
            <b-form-input id="emailInput" type="email" v-model="form.email" placeholder="Enter Email"></b-form-input>
          </b-form-group>
          <b-form-group>
            <b-form-textarea id="contactMessage" v-model="form.message" placeholder="Enter Message" :rows="6"></b-form-textarea>
          </b-form-group>
          <div class="d-flex justify-content-start">
            <span :class="isValidatedClass" class="mr-3 align-self-center">{{isValidated}}</span>
            <b-button type="submit" variant="outline-primary" :disabled="isDisabled">Send</b-button>
          </div>
        </b-form>
      </b-col>
    </b-row>
  </b-container>
</div>
</template>

<script>
import {
  validationMixin
}
from "vuelidate";
import {
  required,
  email
}
from "vuelidate/lib/validators";
import SubmissionAlert from './SubmissionAlert';

export default {
  name: 'Contact',
  components: { SubmissionAlert },
  mixins: [ validationMixin ],
  data() {
    return {
      status: null,
      form: {
        name: '',
        email: '',
        message: '',
      }
    }
  },

  validations: {
    form: {
      name: {
        required
      },
      email: {
        required,
        email
      },
      message: {
        required
      }
    }
  },

  computed: {
    isValidated: function() {
      return this.$v.form.$invalid ? 'All Fields Required' : 'Good to Go'
    },
    isValidatedClass: function() {
      return this.$v.form.$invalid ? 'text-muted' : 'text-success'
    },
    isDisabled: function() {
      return this.$v.form.$invalid === true || this.status !== null
    },

  },

  methods: {
    resetForm() {
      _( this.form )
        .forOwn( ( val, prop ) => this.form[ prop ] = '' )
        setTimeout(() => { this.status = null }, 2005)
    },

    onSubmit: function() {
      this.status = {"status":"sending","message":"Sending Mail. Please be patient."}
      axios.post('/send-mail', this.form)
      .then( (response)=>{
        this.status = response.data
        response.data.status !== 'error' ? this.resetForm() : null
      })
    }
  },
}
</script>

<style lang="scss" scoped>
</style>
