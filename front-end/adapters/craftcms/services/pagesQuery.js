import { gql } from '@apollo/client/core';

export const GET_PAGE = gql`
query GetPage($slug: [String!]) {
    entries(slug: $slug, section: "pages") {
      id
      title
      slug
      ... on pagesDefault_Entry {
          blogLinks {
            ... on blogPost_Entry {
              title
              subtitle
              description
              slug
              image{
                filename
                id
                url
                filename
                extension
                size
              }
            }
            }
            contactforms {
              ... on contactForm_Entry {
                title
                firstName
                lastName
                phoneNumber
                city
                customuri
              }
            }
             components {
              ... on textBlock_Entry {
                 slug
                 title
                 subtitle
                 description
                 stats {
                   name
                   value
                   description
              }
            }
              ... on headerBlock_Entry {
                  title
                  description
            }
          }
        }
      }
    }
`;
