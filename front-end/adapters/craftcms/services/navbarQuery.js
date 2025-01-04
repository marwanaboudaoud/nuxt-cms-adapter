import { gql } from '@apollo/client/core';

export const GET_NAV_ITEMS = gql`
  query GetNavItems {
    navigation: globalSet(handle: "navigation") {
      ... on navigation_GlobalSet {
        headerLinks {
          name
          href
        }
      }
    }
  }
`;
