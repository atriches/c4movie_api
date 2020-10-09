### DESCRIPTION
You have been tasked with creating an API module that will connect to another API.
The purpose of the module is to list the movies of this API in a personalized way.
The first release of the API will be very limited in scope, but will serve as the foundation for
future releases.
**You will only do the backend application**

### FUNCTIONAL REQUIREMENTS

It's expected that user will be able to:

- Endpoint to get a list of upcoming movies.
- The same endpoint should return the list of the next 20 movies as page param is given.
 http://localhost/c4MovieApi/upcoming/listar/<pagina>

- Endpoint to get a list of top rated movies.
- The same endpoint should return the list of the next 20 movies as page param is given.
  http://localhost/c4MovieApi/popular/listar/<pagina>

- Endpoint to get a specific single movie.
    http://localhost/c4MovieApi/pesquisa/listar/<nome do filme>
    

- The same endpoint should return all movie related videos with a single request.
    http://localhost/c4MovieApi/relacionado/listar/<nome do filme>
    
- Endpoint to get a list of genres.
- The same endpoint should return a single genre by id.
 http://localhost/c4MovieApi/genero/listar/<id optional>

### TECHNICAL REQUIREMENTS

You should see this project as an opportunity to create an app following modern development
best practices, but also feel free to use your own app architecture preferences (coding
standards, code organization, third-party libraries, etc).

The API documentation and examples of use can be found here:

https://developers.themoviedb.org/3

- You can use any combination of backend technology
- You should create your own backend API layer, which will be responsible to send
requests to the TMDb API
- Feel free to use any package/dependency managers if you see fit
- Need to use a public version control system
- You have to guarantee at least 50% unit test coverage
- You should to package your project as a Docker Image

### Nice to have (optional)

**The following items are not mandatory**, but would be cool: 

- You should automate at least one process with a bash script
- The project should be analyzed with a Static Code Analyzer (phpcs, code-climate, sonar, etc)
- The project should have an automated pipeline for testing and continuous integration
- The project should follow Twelve-factor-app rules
- The project should have Dependency Injection (it can be through a framework or library, you don't need to write your own dependency injection tool)

### Evaluation Criteria

Endpoint validation will be done using CURL for each one.
Key aspects that will be validated:

- Clean Code;
- Version Control;
- Chosen Architecture;
- Features running correctly;
