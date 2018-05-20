<template>
<div id="content-container" class="text-light">
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
            <b-button type="submit" variant="outline-primary" :disabled="$v.form.$invalid">Send</b-button>
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

export default {
  name: 'Contact',
  mixins: [ validationMixin ],
  data() {
    return {
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
    }
  },

  methods: {
    onSubmit: function() {
      // form submit logic
    }
  },
}
</script>

<style lang="scss" scoped>
</style>
