# Mocking

The focus of this exercise is to practice the concept of mocking. You are tasked with testing the system boundaries and the parsing mechanism used for communicating with one method of the GitHub API.

Four classes are defined in order to handle the domain logic of the exercise:

* GitHubUser: Entity representing the User class within the GitHub system.
* GitHubException: Custom exception class with a simple error message.
* GitHubConnector: Class that makes a call to the GitHub API via a certain format. In this implementation cURL is used.
* GitHubApi: Class that exposes GitHub methods.

The exercise contains a working implementation of the getUser method, that retrieves the public profile of a user and various fields regarding their account.

You can see a working example here: https://api.github.com/users/blizzard

## Steps

1. Spend a few minutes reading through the four provided classes, try to understand what their scope is. If you have questions regarding the implementation, ask the trainers.
2. Start working on the GitHubApiTest class - the GitHub API does not need to be hit for this exercise; the connection layer should instead be mocked.
3. Tip: Whenever testing JSON APIs that have a fixed specification and you want to make sure that the parsing mechanism is working correctly, you can easily mock the data returned into a local JSON file.