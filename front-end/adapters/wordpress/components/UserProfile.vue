<template>
    <div>
        <h2 v-if="user">User Profile:</h2>
        <div v-if="user">
            <p>Hallo {{ user.firstName }} {{ user.lastName }}</p>
        </div>
        <h2 v-else-if="user === null">Loading user profile...</h2>
    </div>
</template>

<script>
import { gql } from '@apollo/client/core';

export default {
    data() {
        return {
            user: null,
        };
    },
    async created() {
        try {
            const { data } = await this.$apollo.query({
                query: gql`
          query GetUser($userId: ID!) {
            user(id: $userId) {
              firstName
              lastName
            }
          }
        `,
                variables: {
                    userId: 'dXNlcjox',
                },
            });

            this.user = data.user;
        } catch (error) {
            console.error('Failed to fetch user:', error);
            this.user = null;
        }
    },
};
</script>