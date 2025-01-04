<template>
  <form @submit.prevent="submitForm" class="p-4">
    <div class="mb-4">
      <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
      <input v-model="form.title" id="title" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
    </div>
    <div class="mb-4">
      <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
      <input v-model="form.firstName" id="firstName" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
    </div>
    <div class="mb-4">
      <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
      <input v-model="form.lastName" id="lastName" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
    </div>
    <div class="mb-4">
      <label for="phoneNumber" class="block text-sm font-medium text-gray-700">Phone Number</label>
      <input v-model="form.phoneNumber" id="phoneNumber" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
    </div>
    <div class="mb-4">
      <label for="city" class="block text-sm font-medium text-gray-700">City</label>
      <input v-model="form.city" id="city" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
    </div>
    <div class="mb-4">
      <label for="customUri" class="block text-sm font-medium text-gray-700">Custom URI</label>
      <input v-model="form.customuri" id="customUri" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
    </div>
    <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md">Submit</button>
  </form>
</template>

<script>
import gql from 'graphql-tag';

export default {
  data() {
    return {
      form: {
        title: '',
        firstName: '',
        lastName: '',
        phoneNumber: '',
        city: '',
        customuri: ''
      }
    };
  },
  methods: {
    async submitForm() {
      const mutation = gql`
        mutation saveContactFormEntry(
          $title: String!,
          $firstName: String!,
          $lastName: String!,
          $phoneNumber: String!,
          $city: String!,
          $customuri: String!
        ) {
          save_contactformsField_contactForm_Entry(
            title: $title,
            firstName: $firstName,
            lastName: $lastName,
            phoneNumber: $phoneNumber,
            city: $city,
            customuri: $customuri
          ) {
            title
            firstName
            lastName
            phoneNumber
            city
            customuri
          }
        }
      `;
      try {
        await this.$apollo.mutate({
          mutation,
          variables: this.form
        });
        this.$emit('formSubmitted'); 
        this.resetForm();
      } catch (error) {
        console.error('Error submitting form', error);
      }
    },
    resetForm() {
      this.form = {
        title: '',
        firstName: '',
        lastName: '',
        phoneNumber: '',
        city: '',
        customuri: ''
      };
    }
  }
};
</script>
