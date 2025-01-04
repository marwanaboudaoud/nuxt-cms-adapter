import { gql } from '@apollo/client/core';

export const GET_CONTACT_ENTRIES = gql`
  query {
    entries(section: "contactForms") {
      ... on contactForm_Entry {
        title
        firstName
        lastName
        phoneNumber
        city
        customuri
      }
    }
  }
`;
