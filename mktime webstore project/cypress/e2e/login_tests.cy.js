beforeEach(() => {
  cy.visit('http://localhost/EC%20Web%20Technologies/mktime%20webstore%20project/login.php');
});


describe('Check all expected elements are present', () => {
  it('check for login container and two fields', () => {
    //Check for login form
    cy.get('.login-form')
      .should('exist');
    //Check for email field
    cy.get('input[name="emailAddress"]')
      .should('exist')
      .and('have.attr', 'type', 'email')
      .and('be.empty');
    //Check for password field
    cy.get('input[name="password"]')
      .should('exist')
      .and('have.attr', 'type', 'password')
      .and('be.empty');
    //Check for log in button 
    cy.get('button')
      .should('exist')
      .and('contain', 'Log in')
  })
})

describe('Attempt login', () => {
  it('Attempt to login without entering information', () => {
    cy.get('button').contains('Log in').click();
    cy.url()
    .should('include', '/login_action.php');
  })

  it('Attempt to login with wrong information', () => {
    //Enter test email address and password that don't exist in the database
    cy.get('input[name="emailAddress"').type('testEmailAddress@mail.com');
    cy.get('input[name="password"]').type('testPassword');
    cy.get('button').contains('Log in').click();
    //Check for error message
    cy.get('h3')
      .should('contain', 'Oops! There was a problem');
    cy.get('p[name="tryagain')
      .should('contain', 'Please try again or');
    cy.get('a[name="register_link"]')
      .should('contain', 'Register')
      .and('have.attr', 'href', 'register.php');
    })
})