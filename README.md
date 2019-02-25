# Blippz

Blippz is an app that allows people who love the outdoors to be safer.  When you create an account, you add contacts and add a blip.  When this blip ends, Blippz will check in with the blip creator to make sure they are safe.  If they do not respond, Blippz sends an email to the contacts letting them know they may need help.

# To Get It Running

1. Clone Repo
2. Run the following command: composer install && cd frontend && npm install
3. Make sure you have a localhost mysql instance up and running
4. Run the database migrations from app root: php artisan migrate
5. touch .env
6. Copy the .env.example file to .env and plug in your db user credentials for the database
5. cd frontend
6. npm run serve

You should now have a local server running.  Folow the output of the npm run serve command to view the app.
