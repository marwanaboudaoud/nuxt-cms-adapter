import { ApolloClient, InMemoryCache, HttpLink } from '@apollo/client/core';
import { provideApolloClient } from '@vue/apollo-composable';

const httpLink = new HttpLink({
  uri: import.meta.env.VITE_GRAPHQL_URL,
});

const cache = new InMemoryCache();

const apolloClient = new ApolloClient({
  link: httpLink,
  cache,
  defaultOptions: {
    watchQuery: {
      fetchPolicy: 'cache-first',
      nextFetchPolicy: 'cache-and-network', 
    },
    query: {
      fetchPolicy: 'cache-first',
      nextFetchPolicy: 'cache-and-network', 
    },
  },
});

export default defineNuxtPlugin((nuxtApp) => {
  provideApolloClient(apolloClient);
});