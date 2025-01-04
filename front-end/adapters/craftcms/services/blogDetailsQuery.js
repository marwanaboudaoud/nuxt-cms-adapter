import { gql } from '@apollo/client/core';

export const GET_BLOG_DETAIL = gql`
  query GetBlogDetail($slug: [String!]) {
    entries(slug: $slug, section: "blogs") {
      id
      title
      ... on blogPost_Entry {
        subtitle
        description
      }
    }
  }
`;
