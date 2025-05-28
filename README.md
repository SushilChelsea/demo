## REQUIREMENTS

-   The application should utilize a mysql database,
-   and you should have vite.js available on the frontend.
-   The app should utilize standard blade files for views.

## Create a Model, Controller and declare properties for Card

Each card should have:

-   name,
-   date created and modified,
-   tags(like keywords, this can be stored as a json array in a column
-   description
    And an optional field
-   highlighted - which should be a boolean switch, this is later on going to give the card that has it set to true, a halo effect.

## Implement required logic for creating a card, implement the required UI in a blade file

## Implement the required logic for rendering multiple cards in a grid layout

## Implement required logic for editing an existing card, re-use the UI for creating, by populating its fields with the value of the selected card. Utilize AJAX for this

## Implement required logic for deleting an existing card, once the card is deleted, show a temporary toast(2s duration), use AJAX and remove the card.

## User Guide

-   http://localhost:8000/ or http://localhost:8000/cards [Renders multiple cards in a grid layout]
-   Click on card 'Read More' button to View, Edit and Delete Card
-   As Read More button is pressed you are navigated to individual card info page. Initial the Card is readonly.
-   Edit and Delete Functionality is implemented with Ajax call.
-   To Edit, press **'Edit'** button then replace the card information you want. After that the Save Button is enable to save your changes.
-   To Delete, press **'Delete'** button a temporary toast 2s duration is displayed in bottom right side of the screen with message Card deleted successfully.
