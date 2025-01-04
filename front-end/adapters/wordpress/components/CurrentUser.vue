<!-- components/CurrentUser.vue -->

<template>
  <!-- <div>
    <h1>Welcome, {{ user.firstName }} {{ user.lastName }}</h1>
    <p>Email: {{ user.email }}</p>
  </div> -->
</template>

<script>
// import { ref } from 'vue';
// import jwtDecode from 'jwt-decode'; 

// export default {
//   name: 'CurrentUser',
//   setup() {
//     // Retrieve JWT token from localStorage
//     const token = localStorage.getItem('jwt_token');
//     let user = {};

//     // Decode token and extract user information
//     if (token) {
//       try {
//         const decodedToken = jwtDecode(token);
//         user = {
//           firstName: decodedToken.user?.first_name,
//           lastName: decodedToken.user?.last_name,
//           email: decodedToken.user?.user_email,
//         };
//       } catch (error) {
//         console.error('Error decoding JWT token:', error);
//       }
//     }

//     // Define the reactive reference to user data
//     const userRef = ref(user);

//     // Return userRef for external use
//     return {
//       userRef,
//     };
//   },
// };
</script>
