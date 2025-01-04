import { gql } from '@apollo/client/core';

// WordPress Queries
export const GET_PAGES_QUERY = gql`
  query GetPages {
    pages {
      nodes {
        id
        title
        link
        content
      }
    }
  }
`;

export const GET_PAGE_QUERY = gql`
  query GetPage($slug: String!) {
    pageBy(uri: $slug) {
      id
      title
      content
    }
  }
`;

export const GET_MENU_QUERY = gql`
  query GetMenu($location: MenuLocationEnum!) {
    menuItems(where: { location: $location }) {
      nodes {
        label
        url
      }
    }
  }
`;


