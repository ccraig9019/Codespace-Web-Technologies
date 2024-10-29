//Block to log in before every test
beforeEach(() => {
  cy.visit('http://localhost/EC%20Web%20Technologies/mktime%20webstore%20project/login.php');
  cy.get('input[name="emailAddress"').type('test_profile@test.com');
  cy.get('input[name="password"]').type('test123');
  cy.get('button').contains('Log in').click();
});


describe('Add item to cart', () => {
  it('Add a Ricochet to cart', () => {
    //Find Add to cart button for Ricochet and click
    cy.get('a[name="Ricochetbutton"]').click();
    //Check URL
    cy.url()
      .should('include', 'add_to_cart.php?id=9');
    //Check for text
    cy.get('p')
      .should('contain', 'A Ricochet has been added to your cart');
    cy.get('a')
      .should('exist')
      .and('contain', 'Continue shopping');//How would you check these elements exist and are correct?
    

  })
})