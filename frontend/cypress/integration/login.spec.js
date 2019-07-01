context( 'Login', () => {
    beforeEach(() => {
        cy.visit('')
    })

    it('Expects a email input', () => {
        cy.getByPlaceholderText('Email')
            .type('test@gmail.com')
    })

    it('Submits Complete Login', () => {
        cy.server()
        cy.route({
            method: 'POST',
            url: '/auth/login',
            response: {
                result: 'success',
                redirect: 'home',
                user: {
                    id: 0,
                    firstName: 'User',
                    lastName: 'Object',
                    email: 'a@b.com',
                    password: '12345'
                }
            }
        })
            .as('loginMethod')

        cy.getByPlaceholderText('Email')
            .type('test@gmail.com')
        cy.getByPlaceholderText('Password')
            .type('asdasdas')
        cy.getByText('Login')
            .click({
                force: true
            })

        cy.wait('@loginMethod')

        cy.get('@loginMethod')
            .should(xhr => {
                // debugger;
                expect(xhr.requestBody).to.have.property('email')
                expect(xhr.requestBody).to.have.property('password')
            })

        cy.url()
            .should('include', 'home')


    })

    it('Has has a title', () => {
        cy.getByText('Welcome To Blippz.', {
            exact: false
        })
    })
})