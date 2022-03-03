# Has.to.be Codding challenge

This project is a piece of code for exposing an endpoint for
calculating the price of all user services. It will apply rates on user's charge detail record (CDR).

The project is developed with <a href="https://api-platform.com">Api Platform</a>, which is based on symfony.
Also, the project is delivered with a Docker definition which makes it easy to get an environment up and running.


## Getting Started

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/)
2. Run `docker-compose build --pull --no-cache` to build fresh images
3. Run `docker-compose up` (the logs will be displayed in the current shell) or `docker-compose up -d'
4. Run `docker-compose exec PHP composer update` to install project dependencies
5. Run `docker-compose exec PHP bin/phpunit` to run tests
6. Open `https://localhost/docs` (swagger UI) in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)  for documents and test /rate API

## Endpoints

I developed an API in the `/rate` route. This is post API, example input and response as well as
UI for testing exists in  `https://localhost/docs`.

I would like to mention that I've created entities for the project but since I did not know enough information
regarding business requirements, I did not run migration into a database, although docker image for a database is configured
in docker-compose configuration file.

## Improvement Suggestions

1. The first thing I'd like to learn more about project context,
   so I can design better entities and save data into database in a better way
2. Also getting more information about rates and cdr information, I think it can design better for extending in the future
3. Again, regarding project context, maybe event-driven architecture (with a rabbitmq instance) will be better than the current which I developed.
   since some time, cdr information will flood to the server, and we do not want to miss even one of them, so we need some queue
   I did not want to make it complicated at this stage.
4. As I maintained in comments, maybe there is needed to revise the calculation service procedure to get more precise results (regarding the real business cases)
5. if I had more time, I'd like to develop the project-specific exception class, so we can make it unify in the project
6. I think it is necessary to add logging and log rotation for project procedures
